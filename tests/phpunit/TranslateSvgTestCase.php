<?php
/**
 * Unit test case to enable code sharing between unit test
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2014, Harry Burt
 * @license GPL-2.0+
 */

class TranslateSvgUpload extends UploadBase {
	public function initializeFromRequest( &$request ) { }
}
class TranslateSvgTestCase extends MediaWikiTestCase {

	/**
	 * @var string
	 */
	protected static $name;

	/**
	 * @var SVGMessageGroup
	 */
	protected $messageGroup;

	protected static function prepareFile( $path ) {
		$tempName = tempnam( wfTempDir(), 'test' );
		copy( $path, $tempName );

		$name = substr( basename( $path ), 0, -4 ) . '_' . date( 'His' ) . '.svg';
		$name = str_replace( '_', ' ', $name );
		$title = Title::makeTitle( NS_FILE, $name );
		if( $title->exists()  ) {
			$wikiPage = new WikiPage( $title );
			$wikiPage->doDeleteArticle( 'resetting' );
			$subpages = $title->getSubpages();
			foreach ( $subpages as $subpage ) {
				/** @var Title $subpage */
				$wikiPage = new WikiPage( $subpage );
				$wikiPage->doDeleteArticle( 'resetting' );
			}
		}

		// Prepare upload
		$uploader = new TranslateSvgUpload();
		$uploader->initializePathInfo( $name, $tempName, filesize( $tempName ), true );

		// Actually perform upload
		$bot = User::newFromName( 'TranslateSvg unit tests', false );
		$status = $uploader->performUpload( 'testing', 'Created during testing', false, $bot );
		if ( !$status->isGood() ) {
			die( 'Could not upload test file ' . $name );
		}

		$messageGroup = new SVGMessageGroup( $name );
		$messageGroup->register( false );

		self::$name = $name;
	}

	public static function setUpBeforeClass() {

		// Preserve the syntax of $this->setMwGlobals for future use
		// but we can't use it te way it's written at the moment since we're static
		$pairs = array(
			// Enable uploads
			'wgEnableUploads' => true,

			// Add .svg to list of supported file extensions
			'wgFileExtensions' => array( 'png', 'gif', 'jpg', 'jpeg', 'svg' ),

			// Bot (who won't be a registered users) needs to be able to create pages
			'wgGroupPermissions' => array(
				'*' => array(
					'createpage' => true,
					'read' => true,
					'edit' => true,
				)
			),

			// Need to enable subpages in the File: namespace
			'wgNamespacesWithSubpages' => array( NS_FILE => true )
		);

		foreach ( $pairs as $key => $value ) {
			$GLOBALS[$key] = $value;
		}
	}

	public function setUp() {
		parent::setUp();
		if( isset( self::$name ) ) {
			$this->messageGroup = new SVGMessageGroup( self::$name );
		}
	}

	public function tearDown() {
		parent::tearDown();
		$this->messageGroup = null;
	}

	public static function tearDownAfterClass() {
		parent::tearDownAfterClass();

		$title = Title::makeTitle( NS_FILE, self::$name );
		$dbw = wfGetDB( DB_MASTER );

		$conds = array( 'ts_page_id' => $title->getArticleID() );
		$dbw->delete( 'translate_svg', $conds, __METHOD__ );

		$conds = array( 'tmd_group' => self::$name );
		$dbw->delete( 'translate_metadata', $conds, __METHOD__ );

		if( !$title->exists() ) {
			return;
		}

		$subpages = $title->getSubpages();
		foreach ( $subpages as $subpage ) {
			/** @var Title $subpage */
			$wikiPage = new WikiPage( $subpage );
			$wikiPage->doDeleteArticle( 'resetting' );
		}

		$wikiPage = new WikiPage( $title );
		$wikiPage->doDeleteArticle( 'resetting' );

		$dbw->commit( __METHOD__, 'flush' );
	}
}