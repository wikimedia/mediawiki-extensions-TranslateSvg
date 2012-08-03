<?php
/**
 * This file contains classes for reading and manipulating the content of SVG files.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Class for reading and manipulating the content of SVG files.
 * @seealso SVGFormatWriter
 */
class SVGFormatReader {

	/**
	 * @var MessageGroup
	 */
	protected $group;
	
	/**
	 * @var DOMDocument
	 */
	protected $svg;

	/**
	 * @var DOMXpath
	 */
	protected $xpath = null;
	
	protected $started = array();
	protected $expanded = array();
	protected $overrides = array();
	protected $translations = array();
	protected $filteredTextNodes = array();
	protected $savedLanguages = array();

	/**
	 * Initialise a new SVGFormatReader from an SVGMessageGroup and an optional array of translation overrides
	 * 
	 */
	public function __construct( SVGMessageGroup $group, $overrides = array() ) {
		$this->group = $group;
		$this->overrides = $overrides;
		$this->svg = new DOMDocument( '1.0' );
		$title = Title::newFromText( $this->group->getLabel(), NS_FILE );
		$file = wfFindFile( $title );
		if( $title->exists() && $file && $file->exists() ) {
			wfSuppressWarnings();
			$this->svg->load( $file->getLocalRefPath() );
			$this->xpath = new DOMXpath( $this->svg );
			wfRestoreWarnings();
			$this->xpath->registerNamespace( 'svg', 'http://www.w3.org/2000/svg' );
		} else {
			return null;
		}
	}

	/**
	 * Makes $this->svg ready for translation by inserting <switch> tags where they need to be, etc.
	 * Also works as a check on the compatibility of the file since it will return false if it fails.
	 *
	 * @return bool False on failure, true on success
	 */
	public function makeTranslationReady() {
		if( $this->svg->documentElement === null ) {
			return false; // Empty or malformed file
		}

		$defaultNS = $this->svg->documentElement->lookupnamespaceURI( NULL );
		if( $defaultNS === null || preg_match( '/^&(.*);$/', $defaultNS, $match ) ) {
			// Bad or nonexistent default namespace set, fill in sensible default
			$this->svg->documentElement->setAttributeNS(
				'http://www.w3.org/2000/xmlns/',
				'xmlns',
				'http://www.w3.org/2000/svg'
			);
			$defaultNS = 'http://www.w3.org/2000/svg';
		}

		$texts = $this->svg->getElementsByTagName( 'text' );
		$textLength = $texts->length;
		if( $textLength === 0 ) {
			return false; // Nothing to translate!
		}

		$styles = $this->svg->getElementsByTagName( 'style' );
		$styleLength = $styles->length;
		for( $i = 0; $i < $styleLength; $i++ ) {
			$style = $styles->item( $i );
			$CSS = $style->textContent;
			if( strpos( $CSS, '#' ) !== false ) {
				if( !preg_match( '/^([^{]+\{[^}]*\})*[^{]+$/', $CSS ) ) {
					// Can't easily understand the CSS to check it, so exit
					return false;
				}
				$selectors = preg_split( '/\{[^}]+\}/', $CSS );
				foreach( $selectors as $selector ) {
					if( strpos( $selector, '#' ) !== false ) {
						// IDs in CSS will break when we clone things, should be classes
						return false;
					}
				}
			}
		}

		if( $this->svg->getElementsByTagName( 'tref' )->length !== 0 ) {
			return false; // Tref tags not (yet) supported
		}

		// Strip empty tspans, texts, fill $idsInUse
		// TODO: Should convert to array, treat spans, texts equally to reduce redundancy
		$idsInUse = array( 0 );
		$tspans = $this->svg->getElementsByTagName( 'tspan' );
		$tspanLength = $tspans->length;
		for( $i = 0; $i < $tspanLength; $i++ ) {
			$tspan = $tspans->item( $i );
			if( $tspan->hasAttribute( 'id' ) ) {
				$id = $tspan->getAttribute( 'id' );
				if( strpos( $id, '|' ) !== false
					|| strpos( $id, '/' ) !== false  ) {
					return 4; // Will cause problems later
				}
				if( preg_match( '/^trsvg([0-9]+)$/', $id, $matches ) ) {
					array_push( $idsInUse, $matches[1] );
				}
			}
			if( !$tspan->hasChildNodes() ) {
				$tspan->parentNode->removeChild( $tspan );
				$i--;
				$tspanLength--;
			}
			if( $tspan->childNodes->length > 1 ) {
				return false; // Nested tspans not (yet) supported
			}
		}
		for( $i = 0; $i < $textLength; $i++ ) {
			$text = $texts->item( $i );
			if( $text->hasAttribute( 'id' ) ) {
				$id = $text->getAttribute( 'id' );
				if( strpos( $id, '|' ) !== false
					|| strpos( $id, '/' ) !== false  ) {
					return false; // Will cause problems later
				}
				if( preg_match( '/^trsvg([0-9]+)$/', $id, $matches ) ) {
					array_push( $idsInUse, $matches[1] );
				}
			}	
			if( !$text->hasChildNodes() ) {
				$text->parentNode->removeChild( $text );
				$i--;
				$textLength--;
			}
		}

		// Create id attributes for text, tspan nodes missing it
		$texts = $this->svg->getElementsByTagName( 'text' );
		$textLength = $texts->length;
		for( $i = 0; $i < $textLength; $i++ ) {
			$text = $texts->item( $i );
			if( !$text->hasAttribute( 'id' ) ) {
				$newId = ( max( $idsInUse ) + 1 );
				$text->setAttribute( 'id', 'trsvg' . $newId );
				array_push( $idsInUse, $newId );
			}
		}
		$tspans = $this->svg->getElementsByTagName( 'tspan' );
		$tspanLength = $tspans->length;
		for( $i = 0; $i < $tspanLength; $i++ ) {
			$tspan = $tspans->item( $i );
			if( !$tspan->hasAttribute( 'id' ) ) {
				$newId = ( max( $idsInUse ) + 1 );
				$tspan->setAttribute( 'id', 'trsvg' . $newId );
				array_push( $idsInUse, $newId );
			}
		}

		for( $i = 0; $i < $textLength; $i++ ) {
			$text = $texts->item( $i );
			$numChildren = $text->childNodes->length;

			// Text strings like $1, $2 will cause problems later
			if( preg_match( '/$[0-9]/', $text->textContent ) ) {
				return false;
			}

			// Sort out switches
			$ancestorSwitches = $this->xpath->query( "ancestor::svg:switch", $text );
			if( $ancestorSwitches->length === 0 ) {
				$switch = $this->svg->createElementNS( $defaultNS, 'switch' );
				$text->parentNode->insertBefore( $switch, $text );
				$switch->appendChild( $text ); // Move node into new sibling <switch> element
			} elseif( $ancestorSwitches->length > 1 ) {
				return false; // Nested switches not (yet) supported
			} elseif( $text->parentNode->nodeName !== "switch" ) {
				return false; // Deep heirarchies inside switches not (yet) supported
			} else {
				// Existing but valid switch e.g. from previous translations
				$switch = $text->parentNode;
				$siblings = $switch->childNodes;
				foreach( $siblings as $sibling ) {
					$languagesPresent = array();
					if( $sibling->nodeType === XML_TEXT_NODE ) {
						if( trim( $sibling->textContent ) !== '' ) {
							return false; // Text content outside text tags is awkward.
						}
					} elseif( $sibling->nodeType === XML_ELEMENT_NODE ) {
						if( $sibling->nodeName !== 'text' ) {
							return false; // Only text tags are allowed inside switches
						}
						$language = $sibling->hasAttribute( 'systemLanguage' ) ? 
							$sibling->getAttribute( 'systemLanguage' ) : 'fallback';
						if( in_array( $language, $languagesPresent ) ) {
							return false; // Two tags for the same language
						}
						array_push( $languagesPresent, $language );
					}
				}
			}

			// Transforms on individual texts are particular problematic, should move it to the <switch>
			if( $text->hasAttribute( 'transform' ) ) {
				$switch->setAttribute( 'transform', $text->getAttribute( 'transform' ) );
				$text->removeAttribute( 'transform' );
			}

			if( $numChildren > 1 ) {
				for( $j = 0; $j < $numChildren; $j++ ) {
					$child = $text->childNodes->item( $j );
					if( $child->nodeType !== XML_TEXT_NODE && $child->nodeName !== 'tspan' ) {
						// Tags other than tspan inside text tags are not (yet) supported
						return false;
					}
				}
			}

			if( $text->hasAttribute( 'style' ) ) {
				$style = $text->getAttribute( 'style' );
				$text->parentNode->setAttribute( 'style', $style );
				$extraProperties = explode( ';', $style );
				$text->removeAttribute( 'style' );
				foreach( $extraProperties as $extraProperty ) {
					$bits = explode( ':', $extraProperty, 2 );
					if( count( $bits ) == 2 ) {
						list( $attrName, $attrValue ) = TranslateSvgUtils::mapFromAttribute(
							$bits[0], $bits[1]
						);
						list( $attrName, $attrValue ) = TranslateSvgUtils::mapToAttribute(
							$attrName, $attrValue
						);
						if( $attrValue !== false ) {
							$text->setAttribute( $attrName, trim( $attrValue, '"\' ' ) );
						}
					}
				}
			}
		}
		return true;
	}

	protected function prepareTranslations() {
		$translations = $this->getInFileTranslations();
		$newTranslations = $this->getOnWikiTranslations();

		// Collapse overrides into new translations
		foreach( $this->overrides as $key => $languages ) {
			foreach( $languages as $language => $translation ) {
				$language = ( $this->group->getSourceLanguage() === $language ) ? 'fallback' : $language;
				$newTranslations[$key][$language] = TranslateSvgUtils::translationToArray( $translation );
			}
		}

		// Collapse new translations into old translations
		foreach( $newTranslations as $key => $languages ) {
			foreach( $languages as $language => $translation ) {
				$oldItem = isset( $translations[$key][$language] ) ? $translations[$key][$language] : array();
				$translations[$key][$language] = $newTranslations[$key][$language] + $oldItem;
				$langNoHyphen = str_replace( '_', '', $language );
				$translations[$key][$language]['id'] = $translations[$key]['fallback']['id'] . $langNoHyphen;
			}
		}

		// "Unfilter" translations
		$translations = array_merge( $translations, $this->filteredTextNodes );
		// Ensure that child tspan translations prompt new <text>s to be created
		foreach( $translations as $key => $languages ) {
			foreach( $languages as $language => $translation ) {
				if( isset( $languages['fallback']['data-parent'] ) ) {
					$parent = $languages['fallback']['data-parent'];
					$translations[$parent][$language] = $translations[$parent]['fallback'];
					if( $language !== 'fallback' ) {
						$langNoHyphen = str_replace( '_', '', $language );
						$translations[$parent][$language]['id'] .= $langNoHyphen;
					}
				}
			}
		}

		$this->translations = $translations;
	}

	protected function extractTranslations() {
		$svg = clone $this->svg; // Don't want to manipulate the real thing
		$tempXpath = new DOMXpath( $svg );
		$tempXpath->registerNamespace( 'svg', 'http://www.w3.org/2000/svg' );
		
		$switches = $svg->getElementsByTagName( 'switch' );
		$number = $switches->length;
		$translations = array();
		$this->filteredTextNodes = array(); // Reset
		for( $i = 0; $i < $number; $i++ ) {
			$switch = $switches->item( $i );
			$texts = $switch->getElementsByTagName( 'text' );
			$count = $texts->length;
			if( $count === 0 ) {
				continue;
			}
			$fallback = $tempXpath->query(
				"text[not(@systemLanguage)]|svg:text[not(@systemLanguage)]", $switch
			);
			$textId = $fallback->item( 0 )->getAttribute( 'id' );
			for( $j = 0; $j < $count; $j++ ) {
				$text = $texts->item( $j );
				$numChildren = $text->childNodes->length;
				$hasActualTextContent = TranslateSvgUtils::hasActualTextContent( $text );
				// $textNodesHaveTextContent[$i] = $hasActualTextContent; // TODO: add consistency check to makeTranslationReady()
				$lang = $text->hasAttribute( 'systemLanguage' ) ? $text->getAttribute( 'systemLanguage' ) : 'fallback';
				$counter = 1;
				for( $k = 0; $k < $numChildren; $k++ ) {
					$child = $text->childNodes->item( $k );
					if( $child->nodeType === 1 ) {
						// Per the checks in makeTranslationReady() this is a tspan
						$childId = $child->getAttribute( 'id' );
						$translations[$childId][$lang] = TranslateSvgUtils::nodeToArray( $child );
						$translations[$childId][$lang]['data-parent'] = $textId;
						if( $text->hasAttribute( 'data-children' ) ) {
							$existing = $text->getAttribute( 'data-children' );
							$text->setAttribute( 'data-children', "$existing|$childId" );
						} else {
							$text->setAttribute( 'data-children', $childId );
						}
						$text->replaceChild ( $svg->createTextNode( '$' . $counter ), $child );
						$counter++;
					}
				}
				if( $hasActualTextContent ) {
					$translations[$textId][$lang] = TranslateSvgUtils::nodeToArray( $text );
				} else {
					$this->filteredTextNodes[$textId][$lang] = TranslateSvgUtils::nodeToArray( $text );
				}
				array_push( $this->savedLanguages, $lang );
			}
		}
		$this->translations = $translations;
	}

	protected function updateSVG() {
		$currentLanguages = $this->getSavedLanguages();
		$currentLanguages = array_merge( $currentLanguages['full'], $currentLanguages['partial'] );
		$translations = $this->translations;
		$switches = $this->svg->getElementsByTagName( 'switch' );
		$number = $switches->length;
		$counter = 1;
		for( $i = 0; $i < $number; $i++ ) {
			$switch = $switches->item( $i );
			if( $switch->getElementsByTagName( 'text' )->length === 0 ) {
				continue;
			}
			$fallback = $this->xpath->query(
				"text[not(@systemLanguage)]|svg:text[not(@systemLanguage)]", $switch
			);
			$textId = $fallback->item( 0 )->getAttribute( 'id' );
			foreach( $translations[$textId] as $language => $translation ) {
				// Sort out systemLanguage attribute
				if( $language !== 'fallback' ) {
					$translation['systemLanguage'] = $language;
				}
			
				// Prepare an array of "children" (sub-messages)
				$children = array();
				if( isset( $translation['data-children'] ) ) {
					$children = explode( '|', $translation['data-children'] );
					foreach( $children as &$child ) {
						if( isset( $translations[$child][$language] ) ) {
							$child = $translations[$child][$language];
						} else {
							$child = $translations[$child]['fallback'];
						}
						$child = TranslateSvgUtils::arrayToNode( $child, $this->svg, 'tspan' );
					}
				}

				// Set up text tag
				$text = $translation['text'];
				unset( $translation['text'] );
				$newTextTag = TranslateSvgUtils::arrayToNode( $translation, $this->svg, 'text' );

				// Add text, replacing $1, $2 etc. with translations
				TranslateSvgUtils::replaceIndicesRecursive( $text, $children, $this->svg, $newTextTag );

				// Put text tag into document
				$path = ( $language === 'fallback' ) ?
					"svg:text[not(@systemLanguage)]|text[not(@systemLanguage)]" :
					"svg:text[@systemLanguage='$language']|text[@systemLanguage='$language']";
				$existing = $this->xpath->query( $path, $switch );
				if( $existing->length == 1 ) {
					// Only one matching text node, replace
					$switch->replaceChild( $newTextTag, $existing->item( 0 ) );
				} elseif( $existing->length == 0 ) {
					// No matching text node for this language, so we'll create one
					$switch->appendChild( $newTextTag );
				}
				$langName = ( $language === 'fallback' ) ? 'fallback' : Language::fetchLanguageName( $language );
				if( in_array( $language, $currentLanguages ) ) {
					$this->expanded[$langName] = 'expanded';
				} else {
					$this->started[$langName] = 'started';
				}
			}
		}

		// Move fallbacks to the end of their switch elements
		$fallbacks = $this->xpath->query("//text[not(@systemLanguage)]|//svg:text[not(@systemLanguage)]");
		$count = $fallbacks->length;
		for( $i = 0; $i < $count; $i++ ) {
			$fallbacks->item( $i )->parentNode->appendChild( $fallbacks->item( $i ) );
		}
	}

	public function getSVG() {
		$this->makeTranslationReady();
		$this->prepareTranslations();
		$this->updateSVG();
		return $this->svg;
	}

	public function getInFileTranslations() {
		$this->makeTranslationReady();
		$this->extractTranslations();
		return $this->translations;
	}

	public function getOnWikiTranslations() {
		$onWikiTranslations = array();
		$languages = $this->group->getOnWikiLanguages();

		// Translations generated onwiki
		foreach( $languages as $language ) {
			$collection = $this->group->initCollection( $language );
			$collection->loadTranslations();
			$mangler = $this->group->getMangler();
			foreach ( $collection as $item ) {
				$key = explode( '/', $mangler->unMangle( $item->key() ) );
				$key = array_pop( $key );
				$translation = str_replace( TRANSLATE_FUZZY, '', $item->translation() );

				if( $translation === '' ) {
					// No translation provided
					continue;
				}

				$language = ( $this->group->getSourceLanguage() == $language ) ? 'fallback' : $language;
				$item = TranslateSvgUtils::translationToArray( $translation );
				if( !isset( $onWikiTranslations[$key] ) ) {
					$onWikiTranslations[$key] = array();
				}
				$onWikiTranslations[$key][$language] = $item;
			}
		}
		return $onWikiTranslations;
	}
	public function getStarted() {
		return $this->started;
	}

	public function getExpanded() {
		return $this->expanded;
	}

	public function getSavedLanguages() {
		if( count( $this->savedLanguages ) === 0 ) {
			$this->extractTranslations();
		}
		$savedLanguages = array_unique( $this->savedLanguages );
		$full = array();
		$partial = array();
		foreach( $savedLanguages as $savedLanguage ) {
			$fullSoFar = true;
			foreach( $this->translations as $key => $languages ) {
				if( !isset( $languages[$savedLanguage] ) ) {
					$fullSoFar = false;
					break;
				}
			}
			if( $fullSoFar ) {
				array_push( $full, $savedLanguage );
			} else {
				array_push( $partial, $savedLanguage );
			}
		}

		return array( 'full' => $full, 'partial' => $partial );
	}
}