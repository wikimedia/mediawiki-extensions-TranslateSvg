<?php
/**
 * This file contains classes with static helper functions for other classes.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * An essentially random collection of helper functions, similar to GlobalFunctions.php.
 */
class TranslateSvgUtils {
	/**
	 * Function used to determine if a message includes a property string
	 *
	 * @param $message \string Message which may or may not include a property string
	 * @return true
	 */
	public static function hasPropertyString( $message ) {
		global $wgTranslateSvgTemplateName;
		if ( strpos( $message, '{{' . $wgTranslateSvgTemplateName ) !== false ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Function that returns only the property string from a given message
	 *
	 * @param $message \string Message which includes a property string
	 * @return \string Just the property string, empty string on failure
	 */
	public static function extractPropertyString( $message ) {
		global $wgTranslateSvgTemplateName;
		if ( self::hasPropertyString( $message ) ) {
			return substr( $message, ( strrpos( $message, '{{' . $wgTranslateSvgTemplateName ) ) );
		}
		return '';
	}

	/**
	 * Function that returns a message minus its property string
	 * Useful for the TranslateFormatMessageBeforeTable hook
	 *
	 * @param $message \string Message which may or may not include a property string
	 * @return \string Message without property string
	 */
	public static function stripPropertyString( $message ) {
		global $wgTranslateSvgTemplateName;
		if ( self::hasPropertyString( $message ) ) {
			return substr( $message, 0, ( strrpos( $message, '{{' . $wgTranslateSvgTemplateName ) ) );
		}
		return $message;
	}

	/**
	 * Simple function that quickly whittles down whether a title is that of
	 * a file description page for an SVG file
	 *
	 * @param $title \Title The MediaWiki Title object in question
	 * @return bool True if it is, false if it isn't.
	 */
	public static function isSVGFilePage( Title $title ) {
		if ( $title->getNamespace() === NS_FILE ) {
			$file = wfFindFile( $title );
			return ( $file && $file->getMimeType() === 'image/svg+xml' );
		} else {
			// Not a file description page
			return false;
		}
	}

	/**
	 * Maps from the kind of <parameter name,value> combination used in
	 * a property string to the kind of <attribute name, value> combination
	 * used in an SVG file. Also validates to prevent arbitary input.
	 *
	 * @see self::mapFromAttribute()
	 * @param $parameter \string Parameter name (e.g. color, bold)
	 * @param $value \string Parameter value (e.g. black, yes)
	 * @return \array Numerical array, [0] = attribute name, [1] = value
	 */
	public static function mapToAttribute( $parameter, $value ) {
		global $wgTranslateSvgDefaultProperties, $wgTranslateSvgOptionalProperties;
		$parameter = trim( $parameter );
		$value = trim( $value );

		$supported = array_merge(
			array_keys( $wgTranslateSvgDefaultProperties ),
			$wgTranslateSvgOptionalProperties
		);

		if ( !in_array( $parameter, $supported ) ) {
			// Quietly drop: injection attempt?
			return array( false, false );
		}
		switch ( $parameter ) {
			case 'bold':
				$parameter = 'font-weight';
				$value = ( $value === 'yes' ) ? 'bold' : 'normal';
				break;
			case 'italic':
				$parameter = 'font-style';
				$value = ( $value === 'yes' ) ? 'italic' : 'normal';
				break;
			case 'underline':
				$parameter = 'text-decoration';
				$value = ( $value === 'yes' ) ? 'underline' : 'normal';
				break;
			case 'color':
				$parameter = 'fill';
				break;
		}
		if ( $value === '' ) {
			$value = false;
		}
		return array( $parameter, $value );
	}

	/**
	 * Maps from the kind of <attribute name, value> combination used in
	 * an SVG file to the kind of <parameter name,value> combination used in
	 * a property string. Also validates to prevent arbitary input.
	 *
	 * @see self::mapToAttribute()
	 * @param $parameter \string Attribute name (e.g. fill, font-weight)
	 * @param $value \string Attribute value (e.g. black, bold)
	 * @return \array Numerical array, [0] = parameter name, [1] = parameter value
	 */
	public static function mapFromAttribute( $parameter, $value ) {
		global $wgTranslateSvgOptionalProperties;
		$parameter = trim( $parameter );
		$value = trim( $value );

		$supported = array_merge(
			array(
				'x', 'y', 'font-size', 'font-weight', 'font-style',
				'text-decoration', 'font-family', 'fill', 'style',
				'systemLanguage'
			),
			$wgTranslateSvgOptionalProperties
		);
		if ( !in_array( $parameter, $supported ) ) {
			// Not editable, so not suitable for extraction
			return array( false, false );
		}

		switch ( $parameter ) {
			case 'font-weight':
				$parameter = 'bold';
				$value = ( $value === 'bold' ) ? 'yes' : 'no';
				break;
			case 'font-style':
				$parameter = 'italic';
				$value = ( $value === 'italic' ) ? 'yes' : 'no';
				break;
			case 'text-decoration':
				$parameter = 'underline';
				$value = ( $value === 'underline' ) ? 'yes' : 'no';
				break;
			case 'font-family':
				$map = array( 'Sans' => 'sans-serif' );
				$value = isset( $map[$value] ) ? $map[$value] : $value;
				break;
			case 'fill':
				$parameter = 'color';
				break;
		}
		if ( $value == '' ) {
			// Drop empty attributes altogether
			$value = false;
		}
		return array( $parameter, $value );
	}

	/**
	 * One of several functions used to convert between TranslateSvg's
	 * three main formats for handling data (nodes, translations and arrays).
	 * This one converts between the translation and array formats.
	 *
	 * @param $translation \string Translation to convert e.g. Blah{{Properties|foo=bar}}
	 * @return \array An associative array of properties, including 'text'
	 */
	public static function translationToArray( $translation ) {
		// Start with text
		$array = array( 'text' => self::stripPropertyString( $translation ) );

		// Build array from property string
		$propertyString = self::extractPropertyString( $translation );
		preg_match_all( '/\| *([a-z-]+) *= *([^|}]*)/', $propertyString, $parameters );
		$count = count( $parameters[0] );
		for ( $i = 0; $i < $count; $i++ ) {
			list( $attrName, $attrValue ) = self::mapToAttribute(
				$parameters[1][$i], $parameters[2][$i]
			);
			if ( $attrName !== false && $attrValue !== false && $attrValue !== 'other' ) {
				$array[$attrName] = $attrValue;
			}
		}
		if ( isset( $array['units'] ) ) {
			// Tack units onto font-size
			if ( isset( $array['font-size'] ) ) {
				$array['font-size'] .= $array['units'];
			}
			unset( $array['units'] );
		}
		return $array;
	}

	/**
	 * One of several functions used to convert between TranslateSvg's
	 * three main formats for handling data (nodes, translations and arrays).
	 * This one converts between the array and translation formats.
	 *
	 * @param $array \array An associative array of properties, inc 'text'
	 * @return \string Translation e.g. Blah{{Properties|foo=bar}}
	 */
	public static function arrayToTranslation( $array ) {
		global $wgTranslateSvgDefaultProperties, $wgTranslateSvgTemplateName;

		// Start with text
		$translation = $array['text'];
		unset( $array['text'] );

		// Fill $properties from defaults, array
		$properties = $wgTranslateSvgDefaultProperties;
		foreach ( $array as $attrName => $attrValue ) {
			list( $attrName, $attrValue ) = self::mapFromAttribute( $attrName, $attrValue );
			if ( $attrValue !== false ) {
				$properties[$attrName] = $attrValue;
			}
		}
		if ( isset( $properties['font-size'] ) ) {
			// Split font-size into font-size, units
			if ( preg_match( '/^([0-9]+)(.*)$/', $properties['font-size'], $matches ) ) {
				$properties['font-size'] = $matches[1];
				$properties['units'] = ( strlen( $matches[2] ) > 0 ) ? $matches[2] : 'px';
			}
		}

		// Build translation from properties
		$translation .= '{{' . $wgTranslateSvgTemplateName;
		foreach ( $properties as $attrName => $attrValue ) {
			$translation .= "|$attrName=$attrValue";
		}
		$translation .= '}}';
		return $translation;
	}

	/**
	 * One of several functions used to convert between TranslateSvg's
	 * three main formats for handling data (nodes, translations and arrays).
	 * This one converts between the node and array translation. The function
	 * assumes that the node does not have any child nodes that need to be
	 * converted.
	 *
	 * @param $node \DOMNode A DOMNode object (probably a <text> or <tspan>)
	 * @return \array An associative array of properties, including 'text'
	 */
	public static function nodeToArray( DOMNode $node ) {
		$array = array( 'text' => $node->textContent );
		$attributes = ( $node->hasAttributes() ) ? $node->attributes : array();
		foreach ( $attributes as $attribute ) {
			$prefix = ( $attribute->prefix === '' ) ? '' : ( $attribute->prefix . ':' );
			if ( $attribute->name === 'space' ) {
				// XML namespace prefix seems to disappear: TODO?
				$prefix = 'xml:';
			}
			list( $attrName, $attrValue ) = self::mapToAttribute(
				$prefix . $attribute->name, $attribute->value
			);
			if ( $attrName !== false && $attrValue !== false ) {
				$array[$attrName] = $attrValue;
			}
		}
		return $array;
	}

	/**
	 * One of several functions used to convert between TranslateSvg's
	 * three main formats for handling data (nodes, translations and arrays).
	 * This one converts between the array and node formats.
	 *
	 * @param $array \array An associative array of properties, inc 'text'
	 * @param $svg \DOMDocument A DOMDocument object that can be used to create the node
	 * @param $nodeName \string (optional) The name of the node (no <>), default 'text'
	 * @return \DOMNode A new DOMNode ready to be inserted, complete with text child
	 */
	public static function arrayToNode( $array, DOMDocument $svg, $nodeName = 'text' ) {
		$defaultNS = $svg->documentElement->lookupnamespaceURI( null );
		$newNode = $svg->createElementNS( $defaultNS, $nodeName );

		// Handle the text property first...
		if ( isset( $array['text'] ) ) {
			$textContent = $svg->createTextNode( $array['text'] );
			$newNode->appendChild( $textContent );
			unset( $array['text'] );
		}

		// ...then all other properties
		foreach ( $array as $attrName => $attrValue ) {
			if ( $attrName !== false && !preg_match( '/^data\-/', $attrName ) ) {
				$newNode->setAttribute( $attrName, $attrValue );
			}
		}
		return $newNode;
	}

	/**
	 * Checks whether a given DOMNode has some non-negligible text content (as
	 * opposed to just whitespace or other tags. Whitespace *between* tags
	 * counts, as it does get rendered.
	 *
	 * @param $node \DOMNode The node to check for text content
	 * @return \bool True if content found, false if not
	 */
	public static function hasActualTextContent( DOMNode $node ) {
		//No text nodes means no text content
		if ( !$node->hasChildNodes() ) {
			return false;
		}

		// Search child nodes looking for matching content
		$children = $node->childNodes;
		$numChildren = $children->length;
		for ( $i = 0; $i < $numChildren; $i++ ) {
			if ( $children->item( $i )->nodeType == XML_TEXT_NODE ) {
				// Whitespace at beginning and end doesn't count, but
				// otherwise we have a match
				if ( !( $i === 0 || $i === ( $numChildren - 1 ) )
				     || !( strlen( trim( $children->item( $i )->textContent ) ) === 0 )
				) {
					return true;
				}
			}
		}

		// Didn't find any
		return false;
	}

	/**
	 * Convert an OS locale (en_GB) to an internal language code (en-gb).
	 *
	 * @param string $os
	 * @return mixed
	 */
	public static function osToLangCode( $os ){
		return str_replace( '_', '-', strtolower( $os ) );
	}

	/**
	 * Convert an internal language code (en-gb) to an OS locale (en_GB)
	 *
	 * @see self::osToLangCode
	 * @param string $langCode
	 * @return string
	 */
	public static function langCodeToOs( $langCode ){
		if ( strpos( $langCode, '-' ) === false ) {
			// No territory specified, so no change to make (fr => fr)
			return $langCode;
		}
		list( $prefix, $suffix ) = explode( '-', $langCode, 2 );
		return $prefix . '_' . strtoupper( $suffix );
	}

	/**
	 * Recursively replaces $1, $2, etc. with text tags, if required. Text content
	 * is formalised as actual text nodes
	 *
	 * @param $text \string The text to search for $1, $2 etc.
	 * @param &$newNodes \array An array of DOMNodes, indexed by which $ number they represent
	 * @param $svg \DOMDocument A DOMDocument that can be used to create new nodes
	 * @param &$parentNode \DOMNode A node to fill with the generated content
	 * @return \void
	 */
	public static function replaceIndicesRecursive( $text, &$newNodes, DOMDocument $svg, DOMNode &$parentNode ) {
		// If nothing to replace, just fire back a text node
		if ( count( $newNodes ) === 0 ) {
			if ( strlen( $text ) > 0 ) {
				$parentNode->appendChild( $svg->createTextNode( $text ) );
			}
		}

		// Otherwise, loop through $1, $2, etc. replacing each
		preg_match_all( '/\$([0-9]+)/', $text, $matches );
		foreach ( $newNodes as $index => $node ) {
			// One-indexed (no $0)
			$realIndex = $index + 1;
			if ( !in_array( $realIndex, $matches[1] ) ) {
				// Sanity check
				continue;
			}
			list( $before, $after ) = preg_split( '/\$' . $realIndex . '(?=[^0-9]|$)/', $text );
			$newNodeToProcess = $newNodes[$index];
			unset( $newNodes[$index] );
			self::replaceIndicesRecursive( $before, $newNodes, $svg, $parentNode );
			$parentNode->appendChild( $newNodeToProcess );
			self::replaceIndicesRecursive( $after, $newNodes, $svg, $parentNode );
		}
	}
}