<?php
/**
 * This file contains classes for manipulating the contents of an SVG file.
 * Intended to centralise references to PHP's byzantine DOM manipulation system.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2014 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class SVGFile {
	/**
	 * @var DOMDocument
	 */
	private $document;

	/**
	 * @var DOMXpath
	 */
	protected $xpath = null;

	protected $isTranslationReady = false;
	protected $savedLanguages;
	protected $inFileTranslations;
	protected $filteredTextNodes;
	protected $fallbackLanguage;

	/**
	 * Construct an SVGFile object.
	 *
	 * @see self::newFromMessageGroup
	 * @param string $path
	 * @param string $fallbackLanguage
	 * @todo Handle DOM warnings
	 */
	public function  __construct( $path, $fallbackLanguage ){
		// Save sourceLanguage for later (mostly so we can understand which language is the fallback)
		$this->fallbackLanguage = $fallbackLanguage;

		$this->document = new DOMDocument( '1.0' );

		// Warnings need to be suppressed in case there are DOM warnings
		wfSuppressWarnings();
		$this->document->load( $path );
		$this->xpath = new DOMXpath( $this->document );
		wfRestoreWarnings();

		$this->xpath->registerNamespace( 'svg', 'http://www.w3.org/2000/svg' );

		// $this->isTranslationReady() can be used to test if construction was a success
		$this->makeTranslationReady();
	}

	/**
	 * Was the file successfully made translation ready i.e. is it translatable?
	 *
	 * @return boolean
	 */
	public function isTranslationReady() {
		return $this->isTranslationReady;
	}

	/**
	 * Makes $this->document ready for translation by inserting <switch> tags where they need to be, etc.
	 * Also works as a check on the compatibility of the file since it will return false if it fails.
	 *
	 * @todo: Find a way of making isTranslationReady a proper check
	 * @todo: add interlanguage consistency check
	 * @return bool False on failure, DOMDocument on success
	 */
	protected function makeTranslationReady() {
		if( $this->isTranslationReady ) {
			return true;
		}

		if ( $this->document->documentElement === null ) {
			// Empty or malformed file
			return false;
		}

		// Automated editors have a habit of using XML entity references in the SVG namespace
		// declaration or simply forgetting to set one at all. Both need to be fixed.
		$defaultNS = $this->document->documentElement->lookupnamespaceURI( null );
		if ( $defaultNS === null || preg_match( '/^(&[^;]+;)+$/', $defaultNS, $match ) ) {
			// Bad or nonexistent default namespace set, fill in sensible default
			$this->document->documentElement->setAttributeNS(
				'http://www.w3.org/2000/xmlns/',
				'xmlns',
				'http://www.w3.org/2000/svg'
			);
			$defaultNS = 'http://www.w3.org/2000/svg';
		}

		$texts = $this->document->getElementsByTagName( 'text' );
		$textLength = $texts->length;
		if ( $textLength === 0 ) {
			// Nothing to translate!
			return false;
		}

		$styles = $this->document->getElementsByTagName( 'style' );
		$styleLength = $styles->length;
		for ( $i = 0; $i < $styleLength; $i++ ) {
			$style = $styles->item( $i );
			$CSS = $style->textContent;
			if ( strpos( $CSS, '#' ) !== false ) {
				if ( !preg_match( '/^([^{]+\{[^}]*\})*[^{]+$/', $CSS ) ) {
					// Can't easily understand the CSS to check it, so exit
					return false;
				}
				$selectors = preg_split( '/\{[^}]+\}/', $CSS );
				foreach ( $selectors as $selector ) {
					if ( strpos( $selector, '#' ) !== false ) {
						// IDs in CSS will break when we clone things, should be classes
						return false;
					}
				}
			}
		}

		if ( $this->document->getElementsByTagName( 'tref' )->length !== 0 ) {
			// Tref tags not (yet) supported
			return false;
		}

		// Strip empty tspans, texts, fill $idsInUse
		$idsInUse = array( 0 );
		$translatableNodes = array();
		$tspans = $this->document->getElementsByTagName( 'tspan' );
		$texts = $this->document->getElementsByTagName( 'text' );
		foreach ( $tspans as $tspan ) {
			if ( $tspan->childNodes->length > 1 ) {
				return false; // Nested tspans not (yet) supported
			}
			$translatableNodes[] = $tspan;
		}
		foreach ( $texts as $text ) {
			$translatableNodes[] = $text;
		}
		foreach ( $translatableNodes as $translatableNode ) {
			/** @var DOMElement $translatableNode */
			if ( $translatableNode->hasAttribute( 'id' ) ) {
				$id = trim( $translatableNode->getAttribute( 'id' ) );
				$translatableNode->setAttribute( 'id', $id );
				if ( strpos( $id, '|' ) !== false || strpos( $id, '/' ) !== false ) {
					// Will cause problems later
					return false;
				}
				if ( preg_match( '/^trsvg([0-9]+)/', $id, $matches ) ) {
					$idsInUse[] = $matches[1];
				}
				if ( is_numeric( $id ) ) {
					$translatableNode->removeAttribute( 'id' );
				}
			}
			if ( !$translatableNode->hasChildNodes() ) {
				// Empty tag, will just confuse translators if we leave it in
				$translatableNode->parentNode->removeChild( $translatableNode );
			}
		}

		// Create id attributes for text, tspan nodes missing it
		foreach ( $translatableNodes as $translatableNode ) {
			if ( !$translatableNode->hasAttribute( 'id' ) ) {
				$newId = ( max( $idsInUse ) + 1 );
				$translatableNode->setAttribute( 'id', 'trsvg' . $newId );
				$idsInUse[] = $newId;
			}
		}

		$textLength = $this->document->getElementsByTagName( 'text' )->length;
		for ( $i = 0; $i < $textLength; $i++ ) {
			/** @var DOMElement $text */
			$text = $texts->item( $i );

			// Text strings like $1, $2 will cause problems later because
			// TranslateSvgUtils::replaceIndicesRecursive() will try to replace them
			// with (non-existent) child nodes.
			if ( preg_match( '/$[0-9]/', $text->textContent ) ) {
				return false;
			}

			// Sort out switches
			if ( $text->parentNode->nodeName === 'switch'
			     || $text->parentNode->nodeName === 'svg:switch'
			) {
				// Existing but valid switch e.g. from previous translations
				$switch = $text->parentNode;
				$siblings = $switch->childNodes;
				foreach ( $siblings as $sibling ) {
					/** @var DOMElement $sibling */

					$languagesPresent = array();
					if ( $sibling->nodeType === XML_TEXT_NODE ) {
						if ( trim( $sibling->textContent ) !== '' ) {
							// Text content inside switch but outside text tags is awkward.
							return false;
						}
					} elseif ( $sibling->nodeType === XML_ELEMENT_NODE ) {
						// Only text tags are allowed inside switches
						if ( $sibling->nodeName !== 'text' && $sibling->nodeName !== 'svg:text' ) {
							return false;
						}
						$language = $sibling->hasAttribute( 'systemLanguage' ) ?
							$sibling->getAttribute( 'systemLanguage' ) : 'fallback';
						if ( in_array( $language, $languagesPresent ) ) {
							// Two tags for the same language
							return false;
						}
						$languagesPresent[] = $language;
					}
				}
			} else {
				$switch = $this->document->createElementNS( $defaultNS, 'switch' );
				$text->parentNode->insertBefore( $switch, $text );
				// Move node into new sibling <switch> element
				$switch->appendChild( $text );
			}

			$numChildren = $text->childNodes->length;
			for ( $j = 0; $j < $numChildren; $j++ ) {
				$child = $text->childNodes->item( $j );
				if ( $child->nodeType !== XML_TEXT_NODE
				     && $child->nodeName !== 'tspan'
				     && $child->nodeName !== 'svg:tspan'
				) {
					// Tags other than tspan inside text tags are not (yet) supported
					return false;
				}
			}

			// Transforms on individual texts are particular problematic, should move it to the <switch>
			if ( $text->hasAttribute( 'transform' ) ) {
				$switch->setAttribute( 'transform', $text->getAttribute( 'transform' ) );
				$text->removeAttribute( 'transform' );
			}

			// Non-translatable style elements on texts get lost, so bump up to switch
			if ( $text->hasAttribute( 'style' ) ) {
				$style = $text->getAttribute( 'style' );
				$text->parentNode->setAttribute( 'style', $style );
			}
		}

		$this->isTranslationReady = true;
		return true;
	}


	/*
	 * Analyse the SVG file, extracting translations and other metadata. Expects the file to
	 * be in a certain format: see self::makeTranslationReady() for details.
	 *
	 * @return array Array of translations (indexed by ID, then langcode, then property)
	 */
	protected function analyse() {
		$switches = $this->document->getElementsByTagName( 'switch' );
		$number = $switches->length;
		$translations = array();
		$this->filteredTextNodes = array(); // Reset

		for ( $i = 0; $i < $number; $i++ ) {
			/** @var DOMElement $switch */
			$switch = $switches->item( $i );

			$texts = $switch->getElementsByTagName( 'text' );
			$count = $texts->length;
			if ( $count === 0 ) {
				continue;
			}
			$fallback = $this->xpath->query(
				"text[not(@systemLanguage)]|svg:text[not(@systemLanguage)]", $switch
			);
			if ( $fallback->length === 0 ) {
				// Some sort of deep hierarchy, can't translate
				continue;
			}

			/** @var DOMElement $fallbackText */
			$fallbackText = $fallback->item( 0 );
			$textId = $fallbackText->getAttribute( 'id' );

			for ( $j = 0; $j < $count; $j++ ) {
				// Don't want to manipulate actual node
				/** @var DOMElement $actualNode */
				$actualNode = $texts->item( $j );
				$text = clone $actualNode;
				$numChildren = $text->childNodes->length;
				$hasActualTextContent = TranslateSvgUtils::hasActualTextContent( $text );
				$lang = $text->hasAttribute( 'systemLanguage' ) ? $text->getAttribute( 'systemLanguage' ) : 'fallback';
				$realLangs = preg_split( '/, */', $lang );
				$realLangs = array_map( 'TranslateSvgUtils::osToLangCode', $realLangs );

				$counter = 1;
				for ( $k = 0; $k < $numChildren; $k++ ) {
					$child = $text->childNodes->item( $k );
					if ( $child->nodeType === 1 ) {
						// Per the checks in makeTranslationReady() this is a tspan so
						// register it as a child node.

						/** @var DOMElement $childTspan */
						$childTspan = $fallbackText->getElementsByTagName( 'tspan' )->item( $counter - 1 );

						$childId = $childTspan->getAttribute( 'id' );
						foreach( $realLangs as $realLang ) {
							$translations[$childId][$realLang] = TranslateSvgUtils::nodeToArray( $child );
							$translations[$childId][$realLang]['data-parent'] = $textId;
						}
						if ( $text->hasAttribute( 'data-children' ) ) {
							$existing = $text->getAttribute( 'data-children' );
							$text->setAttribute( 'data-children', "$existing|$childId" );
						} else {
							$text->setAttribute( 'data-children', $childId );
						}

						// Replace with $1, $2 etc.
						$text->replaceChild( $this->document->createTextNode( '$' . $counter ), $child );
						$counter++;
					}
				}
				foreach( $realLangs as $realLang ) {
					if ( $hasActualTextContent ) {
						// If the <text> has *its own* text content, rather than just <tspan>s, register it
						// for translation.
						$translations[$textId][$realLang] = TranslateSvgUtils::nodeToArray( $text );
					} else {
						$this->filteredTextNodes[$textId][$realLang] = TranslateSvgUtils::nodeToArray( $text );
					}
					$savedLang = ( $realLang === 'fallback' ) ? $this->fallbackLanguage : $realLang;
					$this->savedLanguages[] = $savedLang;
				}
			}
		}
		$this->inFileTranslations = $translations;
		$this->savedLanguages = array_unique( $this->savedLanguages );
	}

	/**
	 * Try to return $this->inFileTranslations. If it is not cached, analyse the SVG
	 * and hence generate it.
	 *
	 * @return array
	 */
	public function getInFileTranslations() {
		if ( $this->inFileTranslations === null ) {
			$this->analyse();
		}
		return $this->inFileTranslations;
	}

	/**
	 * Try to return $this->savedLanguages (a list of languages which have one or more
	 * translations in-file). If it is not cached, analyse the SVG and hence generate it.
	 *
	 * @return array
	 */
	public function getSavedLanguages() {
		if ( $this->savedLanguages === null ) {
			$this->analyse();
		}
		return $this->savedLanguages;
	}

	/*
	 * Get a list of languages which have one or more translations in-file
	 *
	 * @return array Array of languages, split into 'full' and 'partial' subarrays
	 */
	public function getSavedLanguagesFiltered() {
		$translations = $this->getInFileTranslations();
		$savedLanguages = $this->getSavedLanguages();

		$full = array();
		$partial = array();
		foreach ( $savedLanguages as $savedLanguage ) {
			$fullSoFar = true;
			foreach ( $translations as $languages ) {
				if ( !isset( $languages[$savedLanguage] ) ) {
					$fullSoFar = false;
					break;
				}
			}
			if ( $fullSoFar || $savedLanguage == $this->fallbackLanguage ) {
				$full[] = $savedLanguage;
			} else {
				$partial[] = $savedLanguage;
			}
		}
		return array( 'full' => $full, 'partial' => $partial );
	}

	/**
	 * Try to return $this->filteredTextNodes (an array of <text> nodes that contain only
	 * child elements). If it is not cached, analyse the SVG and hence generate it.
	 *
	 * @return array
	 */
	public function getFilteredTextNodes() {
		if ( $this->filteredTextNodes === null ) {
			$this->analyse();
		}
		return $this->filteredTextNodes;
	}

	/*
	 * Compile an updated DOM model of the SVG using the provided set of translations
	 *
	 * @return array Array with keys 'expanded' and 'started', each an array of language names
	 */
	public function switchToTranslationSet( $translations ) {
		$currentLanguages = $this->getSavedLanguages();
		$expanded = $started = array();

		$switches = $this->document->getElementsByTagName( 'switch' );
		$number = $switches->length;
		for ( $i = 0; $i < $number; $i++ ) {
			$switch = $switches->item( $i );
			$fallback = $this->xpath->query(
				"text[not(@systemLanguage)]|svg:text[not(@systemLanguage)]", $switch
			);
			if ( $fallback->length === 0 ) {
				// Some sort of deep hierarchy, can't translate
				continue;
			}

			/** @var DOMElement $fallbackText */
			$fallbackText = $fallback->item( 0 );
			$textId = $fallbackText->getAttribute( 'id' );

			foreach ( $translations[$textId] as $language => $translation ) {
				// Sort out systemLanguage attribute
				if ( $language !== 'fallback' ) {
					$translation['systemLanguage'] = TranslateSvgUtils::langCodeToOs( $language );
				}

				// Prepare an array of "children" (sub-messages)
				$children = array();
				if ( isset( $translation['data-children'] ) ) {
					$children = explode( '|', $translation['data-children'] );
					foreach ( $children as &$child ) {
						if ( isset( $translations[$child][$language] ) ) {
							$child = $translations[$child][$language];
						} else {
							$child = $translations[$child]['fallback'];
						}
						$child = TranslateSvgUtils::arrayToNode( $child, $this->document, 'tspan' );
					}
				}

				// Set up text tag
				$text = $translation['text'];
				unset( $translation['text'] );
				$newTextTag = TranslateSvgUtils::arrayToNode( $translation, $this->document, 'text' );

				// Add text, replacing $1, $2 etc. with translations
				TranslateSvgUtils::replaceIndicesRecursive( $text, $children, $this->document, $newTextTag );

				// Put text tag into document
				$path = ( $language === 'fallback' ) ?
					"svg:text[not(@systemLanguage)]|text[not(@systemLanguage)]" :
					"svg:text[@systemLanguage='$language']|text[@systemLanguage='$language']";
				$existing = $this->xpath->query( $path, $switch );
				if ( $existing->length == 1 ) {
					// Only one matching text node, replace
					$switch->replaceChild( $newTextTag, $existing->item( 0 ) );
				} elseif ( $existing->length == 0 ) {
					// No matching text node for this language, so we'll create one
					$switch->appendChild( $newTextTag );
				}

				// To have got this far, we must have either updated or started a new language
				$langName = TranslateSvgUtils::fetchLanguageName( $language, $this->fallbackLanguage );
				if ( in_array( $language, $currentLanguages ) || $language == 'fallback' ) {
					$expanded[] = $langName;
				} else {
					$started[] = $langName;
				}
			}
		}

		// Move sublocales to the beginning of their switch elements
		$sublocales = $this->xpath->query(
			"//text[contains(@systemLanguage,'_')]" . "|" . "//svg:text[contains(@systemLanguage,'_')]"
		);
		$count = $sublocales->length;
		for ( $i = 0; $i < $count; $i++ ) {
			$firstSibling = $sublocales->item( $i )->parentNode->childNodes->item( 0 );
			$sublocales->item( $i )->parentNode->insertBefore( $sublocales->item( $i ), $firstSibling );
		}

		// Move fallbacks to the end of their switch elements
		$fallbacks = $this->xpath->query(
			"//text[not(@systemLanguage)]" . "|" . "//svg:text[not(@systemLanguage)]"
		);
		$count = $fallbacks->length;
		for ( $i = 0; $i < $count; $i++ ) {
			$fallbacks->item( $i )->parentNode->appendChild( $fallbacks->item( $i ) );
		}

		return array(
			'expanded' => array_unique( $expanded ),
			'started' => array_unique( $started )
		);
	}

	/**
	 * Export the SVG as a string, i.e. as "<?xml version...</svg>"
	 *
	 * @return string
	 */
	public function saveToString() {
		// Could have simply overridden __toString() but probably not a good idea with
		// no clear benefit.
		return $this->document->saveXML();
	}

	/**
	 * Export the SVG to the desired filepath
	 *
	 * @param string $path
	 * @return int|bool The number of bytes written or false if an error occurred.
	 */
	public function saveToPath( $path ) {
		return $this->document->save( $path );
	}

	/**
	 * Factory method for getting the related SVGFile for an SVGMessageGroup
	 *
	 * @param SVGMessageGroup $group
	 * @throws MWException
	 * @return SVGFile
	 *
	 * @todo Separate the concepts of source and fallback languages
	 */
	public static function newFromMessageGroup( SVGMessageGroup $group ) {
		$title = Title::makeTitleSafe( NS_FILE, $group->getId() );
		$file = wfFindFile( $title );
		if ( !$file || !$file->exists() ) {
			// Double-check it definitely exists
			throw new MWException( 'File not found' );
		}

		return new SVGFile( $file->getLocalRefPath(), $group->getSourceLanguage() );
	}
}
