<?php
/**
 * File for the SVGMessageGroup class used in SVG translation
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2008-2012, Niklas Laxström, Siebrand Mazeland, Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Group for messages that can be controlled via a page in %File namespace.
 *
 * In the page comments start with # and continue till the end of the line.
 * The page should contain list of page names in %File namespace, without
 * the namespace prefix. Use underscores for spaces in page names, since
 * whitespace separates the page names from each other.
 * @ingroup MessageGroups
 */
class SVGMessageGroup extends WikiMessageGroup {
	protected $source = null;
	/**
	 * Constructor.
	 *
	 * @param $filename \string Name of the file to be translated (no namespace)
	 */
	public function __construct( $filename ) {
		global $wgLang, $wgContLang;

		// Parental constructor. Sets $this->source.
		parent::__construct( $filename, $filename );

		$prefixedFilename = $wgContLang->getNsText( NS_FILE ) . ':' . $filename;
		$this->setNamespace( NS_FILE );
		$this->setLabel( $filename );
		$title = Title::newFromText( $prefixedFilename );
		$rev = '';
		if( $title->exists() ) {
			$rev = Revision::newFromTitle( $title )->getText();
			$revsections = explode( "\n==", $rev );
			foreach( $revsections as $revsection ) {
				// Attempt to trim the file description page down to only the most relevant content
				if( strpos( $revsection, '{{Information' ) !== false ) {
					$rev = trim( preg_replace( "/==+[^=]+==+/", "", $revsection ) );
				}
			}
		}
		if( trim( $rev ) === '' ) {
			$rev = wfMessage( 'translate-svg-nodesc' )->plain();
		}

		$desc = "[[$prefixedFilename|thumb|" . $wgLang->alignEnd() . "|upright|275x275px]]" . "\n" .
			Html::rawElement( 'div', array( 'style' => 'overflow:auto; padding:2px;' ), $rev );
		$this->setDescription( $desc );
	}

	/**
	 * Fetch definitions from database.
	 * @return \array Array of messages keys with definitions.
	 */
	public function getDefinitions() {
		$definitions = array();
		$subpages = Title::makeTitleSafe( $this->getNamespace(), $this->source )->getSubpages();
		foreach( $subpages as $subpage ) {
			if( $this->isSourceLanguage( $subpage->getSubpageText() ) ) {
				$definition = Revision::newFromTitle( $subpage )->getText();
				$definition = TranslateSvgUtils::stripPropertyString( $definition );

				// Is there really not an easier way to get the parent page than:
				$messageparent = str_replace( '/' . $subpage->getSubpageText(), '', $subpage->getText() );
				$definitions[$messageparent] = $definition;
			}
		}
		return $definitions;
	}

	/**
	 * Returns the $code-language translation of a message specified by $key
	 *
	 * @param $key \string Key of the message.
	 * @param $code \string Language code.
	 * @return \types{\string,\null} The translation or null if it doesn't exists.
	 */
	public function getMessage( $key, $code ) {
		$title = Title::makeTitleSafe( $this->getNamespace(), "$key/$code" );
		if ( !$title->exists() ) {
			return null;
		}
		$rev = Revision::newFromTitle( $title );

		$definition = $rev->getText();
		$definition = TranslateSvgUtils::stripPropertyString( $definition );
		return $definition;
	}

	/**
	 * Returns the associated properties of the message specified by $key
	 *
	 * @param $key \string Key of the message.
	 * @param $code \string Language code.
	 * @return \types{\string,\null} The translation or null if it doesn't exists.
	 */
	public function getProperties( $key, $code ) {
		$title = Title::makeTitleSafe( $this->getNamespace(), "$key/$code" );
		if ( !$title->exists() ) {
			return null;
		}
		$rev = Revision::newFromTitle( $title );
		$properties = $rev->getText();
		if( !TranslateSvgUtils::hasPropertyString( $properties ) ) {
			return null;
		}
		TranslateSvgUtils::extractPropertyString( $properties );
		return $properties;
	}


	/**
	 * Returns 'default', the source language for all SVGMessageGroups
	 * Overrides erroenous parent method.
	 *
	 * @return \bool
	 */
	public function getSourceLanguage() {
		return 'default';
	}

	/**
	 * Returns a list of languages the file has been translated into *on wiki*
	 * i.e. some of those may not have been saved back to the file yet.
	 */
	public function getOnWikiLanguages() {
		$stats = MessageGroupStats::forGroup( $this->getId() );
		$languages = array();
		foreach( $stats as $language => $data ){
			list( $untranslated, $fuzzy, $translated ) = $data;
			if( $fuzzy > 0 || $translated > 0 ){
				array_push( $languages, $language );
			}
		}
		return $languages;
	}

	public function getWriter() {
		$writer = new SVGFormatWriter( $this );
		return $writer;
	}

	public function load( $code = 'all' ) {
		if ( $this->isSourceLanguage( $code ) ) {
			return $this->getDefinitions();
		}

		return array();
	}

	public function importTranslations() {
		global $wgContLang, $wgTranslateCC, $wgTranslateSvgBotName;

		$bot = User::newFromName( $wgTranslateSvgBotName, false );
		$reader = new SVGFormatReader( $this );
		if( !$reader || !$reader->makeTranslationReady() ) {
			// TODO: what happens after this?
			return false;
		}

		$translations = $reader->getInFileTranslations();
		$newPages = array();
		foreach( $translations as $key => $outerArray ) {
			foreach( $outerArray as $language => $innerArray ) {
				if( $language === 'fallback' ) {
					$language = $this->getSourceLanguage();
				}
				$translation = TranslateSvgUtils::arrayToTranslation( $innerArray );
				$ns = $this->getNamespace();
				$fullKey = $wgContLang->getNsText( $ns ) . ':' . $this->source . '/' . $key . '/' . $language;
				$title = Title::newFromText( $fullKey );
				if( $title->exists() || !$title->userCan( 'create', $bot ) ) {
					continue;
				}
				$wikiPage = new WikiPage( $title );
				$summary = wfMessage( 'translate-svg-autocreate' )->inContentLanguage()->text();
				$wikiPage->doEdit( $translation, $summary, 0, false, $bot );
			}
		}

		$wgTranslateCC[ $this->getLabel() ] = $this;
		MessageGroups::singleton()->invalidateClassList();
		MessageIndex::singleton()->rebuild();
		return true;
	}
}
