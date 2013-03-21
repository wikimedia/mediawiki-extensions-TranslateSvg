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
 * Group for messages that are stored in subpages of the File namespace.
 *
 * @ingroup MessageGroups
 */
class SVGMessageGroup extends WikiMessageGroup {
	protected $source = null;
	protected $sourceLanguage = null;
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
			$rev = Revision::newFromTitle( $title )->getContent()->getWikitextForTransclusion();
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
	 * Return a full URL to the file page of the SVG
	 * @return String
	 */
	public function getUrl() {
		return Title::makeTitleSafe( $this->getNamespace(), $this->source )->getFullURL();
	}

	/**
	 * Fetch definitions from database.
	 * @return \array Array of messages keys with definitions.
	 */
	public function getDefinitions() {
		$definitions = array();
		$subpages = Title::makeTitleSafe( $this->getNamespace(), $this->source )->getSubpages();
		foreach( $subpages as $subpage ) {
			/** @var Title $subpage */
			if( $this->isSourceLanguage( $subpage->getSubpageText() ) ) {
				$definition = Revision::newFromTitle( $subpage )->getContent()->getWikitextForTransclusion();
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

		$definition = $rev->getContent()->getWikitextForTransclusion();
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
			return '';
		}
		$translation = Revision::newFromTitle( $title )->getContent()->getWikitextForTransclusion();
		$properties = TranslateSvgUtils::extractPropertyString( $translation );

		return $properties;
	}

	/*
	 * Import translations from the file, onto the wiki
	 *
	 * return \bool True on success, false on failure
	 */
	public function importTranslations() {
		global $wgTranslateSvgBotName;
		$bot = User::newFromName( $wgTranslateSvgBotName, false );

		$reader = new SVGFormatReader( $this );
		if( !$reader ) {
			return false;
		}

		$translations = $reader->getInFileTranslations();
		foreach( $translations as $key => $outerArray ) {
			foreach( $outerArray as $language => $innerArray ) {
				if( $language === 'fallback' ) {
					$language = $this->getSourceLanguage();
				}
				$translation = TranslateSvgUtils::arrayToTranslation( $innerArray );
				$fullKey = $this->source . '/' . $key . '/' . $language;
				$title = Title::makeTitleSafe( $this->getNamespace(), $fullKey );
				if( $title->exists() || !$title->userCan( 'create', $bot ) ) {
					continue;
				}
				$wikiPage = new WikiPage( $title );
				$summary = wfMessage( 'translate-svg-autocreate' )->inContentLanguage()->text();
				$wikiPage->doEdit( $translation, $summary, 0, false, $bot );
			}
		}
		return true;
	}

	/**
	 * Returns the source language code of this message group by using
	 * the TranslateMetadata framework, or 'en' (English) if none set.
	 * Overrides parent method
	 *
	 * @return \string Language code
	 */
	public function getSourceLanguage() {
		if( !isset( $this->sourceLanguage ) ){
			$databaseValue = TranslateMetadata::get( $this->source, 'sourcelang' );
			$this->sourceLanguage = ( $databaseValue !== false ) ? $databaseValue : 'en';
		}
		return $this->sourceLanguage;
	}

	/**
	 * Sets the source language code of this message group by using
	 * the TranslateMetadata framework.
	 *
	 * @param \string $srcLang The source language code
	 * @return \null
	 */
	public function setSourceLanguage( $srcLang ) {
		$this->sourceLanguage = $srcLang;
		TranslateMetadata::set( $this->source, 'sourcelang', $srcLang );
	}

	/**
	 * Returns a list of languages the file has been translated into *on wiki*
	 * i.e. some of those may not have been saved back to the file yet.
	 */
	public function getOnWikiLanguages() {
		$stats = MessageGroupStats::forGroup( $this->getId() );
		$languages = array();
		foreach( $stats as $language => $data ){
			$translatedCount = $data[MessageGroupStats::TRANSLATED];
			$fuzzyCount = $data[MessageGroupStats::FUZZY];
			if( $translatedCount > 0 || $fuzzyCount > 0 ) {
				$languages[] = $language;
			}
		}
		return $languages;
	}
}
