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
	protected $filteredTextNodes = array();
	protected $savedLanguages = array();
	protected $inFileTranslations = null;
	protected $isTranslationReady = false;

	/**
	 * Initialise a new SVGFormatReader from an SVGMessageGroup and an optional array of translation overrides
	 *
	 * @param SVGMessageGroup $group
	 * @param array $overrides Optional array of translation overrides to be folded in later
	 */
	public function __construct( SVGMessageGroup $group, $overrides = array() ) {
		$this->group = $group;
		$this->overrides = $overrides;
		$this->svg = new DOMDocument( '1.0' );
		$title = Title::newFromText( $this->group->getLabel(), NS_FILE );
		$file = wfFindFile( $title );
		if( $title->exists() && $file && $file->exists() ) {
			// Warnings need to be suppressed in case there are DOM warnings
			wfSuppressWarnings();
			$this->svg->load( $file->getLocalRefPath() );
			$this->xpath = new DOMXpath( $this->svg );
			wfRestoreWarnings();
			$this->xpath->registerNamespace( 'svg', 'http://www.w3.org/2000/svg' );
			if( !$this->makeTranslationReady() ) {
				return null;
			}
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
	protected function makeTranslationReady() {
		// TODO: add interlanguage consistency check
		if( $this->isTranslationReady ) {
			return true;
		}

		if( $this->svg->documentElement === null ) {
			// Empty or malformed file
			return false;
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
			// Nothing to translate!
			return false;
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
			// Tref tags not (yet) supported
			return false;
		}

		// Strip empty tspans, texts, fill $idsInUse
		$idsInUse = array( 0 );
		$translatableNodes = array();
		$tspans = $this->svg->getElementsByTagName( 'tspan' );
		$texts = $this->svg->getElementsByTagName( 'text' );
		foreach( $tspans as $tspan ) {
			if( $tspan->childNodes->length > 1 ) {
				return false; // Nested tspans not (yet) supported
			}
			$translatableNodes[] = $tspan;
		}
		foreach( $texts as $text ) {
			$translatableNodes[] = $text;
		}

		foreach( $translatableNodes as $translatableNode ) {		
			if( $translatableNode->hasAttribute( 'id' ) ) {
				$id = $translatableNode->getAttribute( 'id' );
				if( strpos( $id, '|' ) !== false || strpos( $id, '/' ) !== false  ) {
					// Will cause problems later
					return false;
				}
				if( preg_match( '/^trsvg([0-9]+)/', $id, $matches ) ) {
					$idsInUse[] = $matches[1];
				}
			}
			if( !$translatableNode->hasChildNodes() ) {
				$translatableNode->parentNode->removeChild( $translatableNode );
			}
		}

		// Create id attributes for text, tspan nodes missing it
		foreach( $translatableNodes as $translatableNode ) {
			if( !$translatableNode->hasAttribute( 'id' ) ) {
				$newId = ( max( $idsInUse ) + 1 );
				$$translatableNode->setAttribute( 'id', 'trsvg' . $newId );
				$idsInUse[] = $newId;
			}
		}

		$textLength = $this->svg->getElementsByTagName( 'text' )->length;
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
				// Move node into new sibling <switch> element
				$switch->appendChild( $text );
			} elseif( $ancestorSwitches->length > 1 ) {
				// Nested switches not (yet) supported
				return false;
			} elseif( $text->parentNode->nodeName !== "switch" ) {
				// Deep heirarchies inside switches not (yet) supported
				return false;
			} else {
				// Existing but valid switch e.g. from previous translations
				$switch = $text->parentNode;
				$siblings = $switch->childNodes;
				foreach( $siblings as $sibling ) {
					$languagesPresent = array();
					if( $sibling->nodeType === XML_TEXT_NODE ) {
						if( trim( $sibling->textContent ) !== '' ) {
							// Text content inside switch but outside text tags is awkward.
							return false;
						}
					} elseif( $sibling->nodeType === XML_ELEMENT_NODE ) {
						// Only text tags are allowed inside switches
						if( $sibling->nodeName !== 'text' ) {
							return false;
						}
						$language = $sibling->hasAttribute( 'systemLanguage' ) ? 
							$sibling->getAttribute( 'systemLanguage' ) : 'fallback';
						if( in_array( $language, $languagesPresent ) ) {
							// Two tags for the same language
							return false;
						}
						$languagesPresent[] = $language;
					}
				}
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

			// Transforms on individual texts are particular problematic, should move it to the <switch>
			if( $text->hasAttribute( 'transform' ) ) {
				$switch->setAttribute( 'transform', $text->getAttribute( 'transform' ) );
				$text->removeAttribute( 'transform' );
			}

			// Non-translatable style elements on texts get lost, so bump up to switch
			if( $text->hasAttribute( 'style' ) ) {
				$style = $text->getAttribute( 'style' );
				$text->parentNode->setAttribute( 'style', $style );
			}
		}
		return true;
	}

	/*
	 * Collate and prepare an array of translations from multiple sources:
	 * in file, on wiki, $this->filteredTextNodes and from $this->overrides.
	 *
	 * return array Array of translations
	 */
	protected function getTranslations() {
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
				if( $language !== 'fallback' ) {
					$translations[$key][$language]['id'] = $translations[$key]['fallback']['id'] . "-$language";
				}
			}
		}

		// "Unfilter" translations
		$translations = array_merge( $translations, $this->filteredTextNodes );

		// Ensure that child tspan translations prompt new <text>s to be created
		// by duplicating the fallback version.
		foreach( $translations as $key => $languages ) {
			foreach( $languages as $language => $translation ) {
				if( isset( $languages['fallback']['data-parent'] ) ) {
					$parent = $languages['fallback']['data-parent'];
					$translations[$parent][$language] = $translations[$parent]['fallback'];
					if( $language !== 'fallback' ) {
						$translations[$parent][$language]['id'] .= "-$language";
					}
				}
			}
		}

		return $translations;
	}

	/*
	 * Compile and return an update version of the SVG, including all new translations.
	 *
	 * @return DOMDocument New SVG file
	 */
	protected function getSVG() {
		$translations = $this->getTranslations();
		$currentLanguages = $this->getSavedLanguages( false );
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
		return $this->svg;
	}

	/*
	 * Extract translations from the SVG file
	 *
	 * @param bool $forceUpdate Definitely regenerate the list
	 * @return array Array of translations (indexed by ID, then langcode, then property)
	 */
	public function getInFileTranslations( $forceUpdate = false ) {
		if( isset( $this->inFileTranslations ) && !$forceUpdate ) {
			return $this->inFileTranslations;
		}

		// Don't want to manipulate the real thing
		$svg = clone $this->svg;
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
				$lang = $text->hasAttribute( 'systemLanguage' ) ? $text->getAttribute( 'systemLanguage' ) : 'fallback';
				$counter = 1;
				for( $k = 0; $k < $numChildren; $k++ ) {
					$child = $text->childNodes->item( $k );
					if( $child->nodeType === 1 ) {
						// Per the checks in makeTranslationReady() this is a tspan so
						// register it as a child node.
						$childId = $fallback->item( 0 )->childNodes->item( $counter - 1 )->getAttribute( 'id' );
						$translations[$childId][$lang] = TranslateSvgUtils::nodeToArray( $child );
						$translations[$childId][$lang]['data-parent'] = $textId;
						if( $text->hasAttribute( 'data-children' ) ) {
							$existing = $text->getAttribute( 'data-children' );
							$text->setAttribute( 'data-children', "$existing|$childId" );
						} else {
							$text->setAttribute( 'data-children', $childId );
						}

						// Replace with $1, $2 etc.
						$text->replaceChild ( $svg->createTextNode( '$' . $counter ), $child );
						$counter++;
					}
				}
				if( $hasActualTextContent ) {
					$translations[$textId][$lang] = TranslateSvgUtils::nodeToArray( $text );
				} else {
					$this->filteredTextNodes[$textId][$lang] = TranslateSvgUtils::nodeToArray( $text );
				}
				$savedLang = ( $lang === 'fallback' ) ? $this->group->getSourceLanguage() : $lang;
				$this->savedLanguages[] = $savedLang;
			}
		}
		$this->inFileTranslations = $translations;
		return $this->inFileTranslations;
	}

	/*
	 * Extract translations from on wiki
	 *
	 * @return array Array of translations (indexed by ID, then langcode, then property)
	 */
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

	/*
	 * Get a list of languages which have one or more translations in file
	 *
	 * @param bool $filter Whether to split into 'full' and 'partial'. Default true.
	 * @return array Array of languages
	 */
	public function getSavedLanguages( $filter = true ) {
		$translations = $this->getInFileTranslations();

		// $this->savedLanguages is set by $this->getInFileTranslations()
		$savedLanguages = array_unique( $this->savedLanguages );
		if( !$filter ) {
			return $savedLanguages;
		}

		$full = array();
		$partial = array();
		foreach( $savedLanguages as $savedLanguage ) {
			$fullSoFar = true;
			foreach( $translations as $key => $languages ) {
				if( !isset( $languages[$savedLanguage] ) ) {
					$fullSoFar = false;
					break;
				}
			}
			if( $fullSoFar ) {
				$full[] = $savedLanguage;
			} else {
				$partial[] = $savedLanguage;
			}
		}
		return array( 'full' => $full, 'partial' => $partial );
	}

	/*
	 * Get array of languages which were started in the last SVG update
	 *
	 * @return array Array of languages
	 */
	public function getStarted() {
		return $this->started;
	}

	/*
	 * Get array of languages which were added to in the last SVG update
	 *
	 * @return array Array of languages
	 */
	public function getExpanded() {
		return $this->expanded;
	}
}