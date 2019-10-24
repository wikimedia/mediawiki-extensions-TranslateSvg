<?php
/**
 * Unit test case to enable code sharing between unit test
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2014, Harry Burt
 * @license GPL-2.0-or-later
 */
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
		if ( $title->exists() ) {
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
		$uploader = new TranslateSvgUploadMock();
		$uploader->initializePathInfo( $name, $tempName, filesize( $tempName ), true );

		// Actually perform upload
		$status = $uploader->performUpload( 'testing', 'Created during testing', false,
			self::getTestUser()->getUser() );
		$title = Title::makeTitle( NS_FILE, $name );
		if ( !$status->isGood() || !$title->exists() ) {
			die( 'Could not upload test file ' . $name );
		}

		$messageGroup = new SVGMessageGroup( $name );
		$messageGroup->register( false );

		self::$name = $name;
	}

	public static function setUpBeforeClass() {
		// Preserve the syntax of $this->setMwGlobals for future use
		// but we can't use it te way it's written at the moment since we're static
		$pairs = [
			// Enable uploads
			'wgEnableUploads' => true,

			// Add .svg to list of supported file extensions
			'wgFileExtensions' => [ 'png', 'gif', 'jpg', 'jpeg', 'svg' ],

			// Need to enable subpages in the File: namespace
			'wgNamespacesWithSubpages' => [ NS_FILE => true ]
		];

		foreach ( $pairs as $key => $value ) {
			$GLOBALS[$key] = $value;
		}
	}

	public function setUp() : void {
		parent::setUp();
		if ( isset( self::$name ) ) {
			$this->messageGroup = new SVGMessageGroup( self::$name );
		}
	}

	public function tearDown() : void {
		parent::tearDown();
		$this->messageGroup = null;
	}

	public static function tearDownAfterClass() {
		parent::tearDownAfterClass();

		$title = Title::makeTitle( NS_FILE, self::$name );
		$dbw = wfGetDB( DB_MASTER );

		$conds = [ 'ts_page_id' => $title->getArticleID() ];
		$dbw->delete( 'translate_svg', $conds, __METHOD__ );

		$conds = [ 'tmd_group' => self::$name ];
		$dbw->delete( 'translate_metadata', $conds, __METHOD__ );

		if ( !$title->exists() ) {
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
