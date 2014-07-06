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
		parent::__construct( 'TranslateNewSVG', 'translate' );
	}

	public function execute( $par ) {
		$this->setHeaders();
		$this->outputHeader( 'translate-svg-new-summary' );

		$this->checkPermissions();

		$req = $this->getRequest();
		$groupName = $req->getVal( 'group' );

		if( $groupName === null || MessageGroups::getGroup( $groupName ) ) {
			$this->getOutput()->addWikiMsg( 'translate-svg-new-error-group' );
			return;
		}

		$srcLang = $req->getVal( 'language' );

		// Language::isValidBuiltInCode() isn't technically ideal, but it's probably
		// close enough.
		if( $srcLang !== null && Language::isValidBuiltInCode( $srcLang ) ) {
			if( $this->addSVGGroup( $groupName, $srcLang ) ) {
				$target = SpecialPage::getTitleFor( 'Translate' );
				$params = array( 'group' => $groupName, 'chooselanguage' => true );
				$this->getOutput()->redirect( $target->getLocalUrl( $params ) );
			} else {
				$this->getOutput()->addWikiMsg( 'translate-svg-new-error-import' );
				$this->showForm( $groupName, $srcLang );
			}
		} else {
			$this->showForm( $groupName, $srcLang );
		}
	}

	protected function addSVGGroup( $groupName, $srcLang ) {
		// Does this represent a file that exists?
		$title = Title::makeTitleSafe( NS_FILE, $groupName );
		if( !$title->exists() ) {
			return false;
		}
		$file = wfFindFile( $title );
		if( !$file->exists() ) {
			return false;
		}

		// Pick up normalisations from makeTitleSafe()
		$groupName = $title->getText();

		$group = new SVGMessageGroup( $groupName );
		$group->setSourceLanguage( $srcLang );
		if( $group->importTranslations() ) {
			TranslateMetadata::set( $groupName, 'sourcelang', $srcLang );
			$dbw = wfGetDB( DB_MASTER );
			$table = 'translate_svg';
			$row = array( 'ts_page_id' => $title->getArticleId() );
			$dbw->insert( $table, $row, __METHOD__, array( 'IGNORE' ) );
			MessageGroups::clearCache();
			MessageIndexRebuildJob::newJob()->insert();

			// If $dbw->affectedRows() == 0, something's not quite right, but it
			// seems odd to actively error here.
			return true;
		} else {
			return false;
		}
	}

	protected function showForm( $groupName, $srcLang ) {
		global $wgScript;
		$default = ( $srcLang === null ) ? $this->getLanguage()->getCode() : $srcLang;
		$this->getOutput()->addHTML(
			Html::openElement( 'form', array( 'method' => 'post', 'action' => $wgScript, 'id' => 'specialtranslateNewSVG' ) ) .
			Html::openElement( 'fieldset' ) .
			Html::element( 'legend', null, $this->msg( 'translate-svg-chooselanguage-title' )->text() ) .
			Html::hidden( 'group', $groupName ) .
			Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) .
			Html::openElement( 'p' ) .
			$this->msg( 'translate-svg-new-label' )->escaped() .
			TranslateUtils::languageSelector( $this->getLanguage()->getCode(), $default ) . '&#160;' .
			Xml::submitButton( $this->msg( 'go' )->text() ) . "\n" .
			Html::closeElement( 'p' ) .
			Html::closeElement( 'fieldset' ) .
			Html::closeElement( 'form' )
		);
	}

	function getDescription() {
		return $this->msg( 'translate-svg-new-title' )->text();
	}
}
