<?php
/**
 * Implements special page for creating a new SVG translation
 *
 * @file
 * @author Harry Burt
 * @author Siebrand Mazeland
 * @copyright Copyright © 2012, Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Class for special page Special:TranslateNewSVG.
 *
 * @ingroup SpecialPage
 */
class SpecialTranslateNewSVG extends SpecialPage {

	public function __construct() {
		// Anyone is allowed to see, but actions are restricted
		parent::__construct( 'TranslateNewSVG' );
	}

	public function execute( $par ) {
		global $wgScript, $wgTranslateCC;
		$this->setHeaders();
		$this->outputHeader( 'translate-svg-new-summary' );

		$req = $this->getRequest();
		$groupName = $req->getVal( 'group' );

		if( $groupName === null || isset( $wgTranslateCC[$groupName] ) ) {
			$this->getOutput()->addHTML( wfMessage( 'translate-svg-new-error-group' )->parseAsBlock() );
			return;
		}

		$srcLang = $req->getVal( 'language' );
		if( $srcLang !== null && Language::isValidCode( $srcLang ) ) {
			if( $this->addSVGGroup( $groupName, $srcLang ) ) {
				$url = $wgScript . '?title=Special:Translate&group=' . $groupName . '&chooselanguage=true';
				$this->getOutput()->redirect( $url );
			} else {
				$this->getOutput()->addHTML( wfMessage( 'translate-svg-new-error-import' )->parseAsBlock() );
				$this->showForm( $groupName, $srcLang );
			}
		} else {
			$this->showForm( $groupName, $srcLang );
		}
	}

	protected function addSVGGroup( $groupName, $srcLang ) {
		global $wgTranslateCC;

		// Does this represent a file that exists?
		$title = Title::newFromText( $groupName, NS_FILE );
		if( !$title->exists() ) {
			return false;
		}
		$file = wfFindFile( $title );
		if( !$file->exists() ) {
			return false;
		}

		$group = new SVGMessageGroup( $groupName );
		$group->setSourceLanguage( $srcLang );
		if( $group->importTranslations() ) {
			TranslateMetadata::set( $groupName, 'sourcelang', $srcLang );
			$dbw = wfGetDB( DB_MASTER );
			$table = 'translate_svg';
			$row = array( 'ts_page_id' => $title->getArticleId() );
			$dbw->insert( $table, $row, __METHOD__ );
			MessageGroups::clearCache();
			return ( $dbw->affectedRows() > 0 );
		} else {
			return false;
		}
	}

	protected function showForm( $groupName, $srcLang ) {
		global $wgScript, $wgLang;

		$default = ( $srcLang === null ) ? 'en' : $srcLang;
		$action = $wgScript . '?title=' . $this->getTitle()->getPrefixedText();
		$this->getOutput()->addHTML(
			Html::openElement( 'form', array( 'method' => 'post', 'action' => $action, 'id' => 'specialtranslateNewSVG' ) ) .
			Html::openElement( 'fieldset' ) .
			Html::element( 'legend', null, wfMsg( 'translate-svg-chooselanguage-title' ) ) .
			Html::hidden( 'group', $groupName ) .
			Html::element( 'p', 'open' ) .
			wfMessage( 'translate-svg-new-label' )->escaped() .
			TranslateUtils::languageSelector( $wgLang, $default ) . '&nbsp;' .
			Xml::submitButton( wfMsg( 'go' ) ) . "\n" .
			Html::element( 'p', 'close' ) .
			Html::closeElement( 'fieldset' ) .
			Html::closeElement( 'form' )
		);
	}

	function getDescription() {
		return wfMessage( 'translate-svg-new-title' )->text();
	}
}
