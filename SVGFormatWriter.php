<?php
/**
 * This file contains classes for writing SVG files
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Class for writing SVG files
 */
class SVGFormatWriter extends SimpleFormatWriter {

	protected $group;
	
	/**
	 * @var SVGFormatReader
	 */
	protected $reader;
	protected $filename;
	protected $file;

	public function __construct( MessageGroup $group, $overrides = array() ) {
		$this->group = $group;
		$this->reader = new SVGFormatReader( $group, $overrides );
		$this->filename = $this->group->getLabel();
		$this->file = wfFindFile( Title::newFromText( $this->filename, NS_FILE ) );
	}

	/**
	 * Overrides inherited function, otherwise doesn't actually do anything
	 * @param $code
	 */
	public function load( $code ) {
	}

	public function webExport( MessageCollection $collection = null ) {
		global $wgOut;
		$ret = $this->uploadSVG( $this->reader->getSVG() );
		if( $ret === true ) {
			$wgOut->redirect( $this->url );
		} else {
			return $ret;
		}
	}

	public function thumbnailExport( $language ) {
		global $wgUploadPath, $wgUploadDirectory;

		$svg = $this->reader->getSVG();
		$srcPath = tempnam( wfTempDir(), 'trans' );
		$contentsHash = substr( md5( $svg->saveXML() ), 0, 12 );
		$nameHash = md5( $this->filename );

		$newFilename =  $contentsHash . '-' . $this->filename . '.png';
		$hashDir = "$wgUploadDirectory/temp/" . substr( $nameHash, 0, 1 ) . '/' . substr( $nameHash, 0, 2 );
		$hashPath = "$wgUploadPath/temp/" . substr( $nameHash, 0, 1 ) . '/' . substr( $nameHash, 0, 2 );
		$dstPath = "$hashDir/$newFilename";

		if( !$svg->save( $srcPath ) ) {
			return wfMessage( 'thumbnail-temp-create' );
		}

		if( !file_exists( $hashDir ) ) {
			wfSuppressWarnings();
			$ret = wfMkdirParents( $hashDir, 0755, __METHOD__ );
			wfRestoreWarnings();
			if( !$ret ) {
				return wfMessage( 'thumbnail_dest_directory' );
			}
		}

		if( !is_dir( $hashDir ) || !is_writable( $hashDir ) ) {
			return wfMessage( 'thumbnail_dest_directory' );
		}

		$width = $this->file->getWidth();
		$height = $this->file->getHeight();
		$ratio = $width / $height;
		if( $width > $height ) {
			$width = 275;
			$height = round( 275 / $ratio );
		} else {
			$height = 275;
			$width = round( 275 * $ratio );
		}
		$svgHandler = new SvgHandler();
		if( !$svgHandler->rasterize( $srcPath, $dstPath, $width, $height, $language ) ) {
			return wfMessage( 'thumbnail-dest-create' );
		}
		
		return Html::element( 'img', array(
			'src' => "$hashPath/$newFilename",
			'width' => $width,
			'height' => $height
		) );
	}
	
	protected function uploadSVG( $svg ) {
		global $wgTranslateSvgBotName, $wgContLang, $wgUser;

		$uploader = new TranslateSvgUpload();
		$temp = tempnam( wfTempDir(), 'trans' );
		$svg->save( $temp );

		$filepath = $this->file->getLocalRefPath();
		$uploader->initializePathInfo( $this->filename, $temp, filesize( $filepath ), true );

		$details = $uploader->verifyUpload();
		if ( $details['status'] != UploadBase::OK ) {
			return $this->processVerificationError( $details );
		}

		$this->url = $uploader->getLocalFile()->getTitle()->getFullURL();
		$started = $this->reader->getStarted();
		$expanded = $this->reader->getExpanded();
		unset( $expanded['fallback'] ); // Always gets touched, not interesting to us.
		
		if( count( $started ) === 0 && count( $expanded ) === 0 ) {
			// No real change, jump to save just a a null edit might
			return true;
		}

		$startedString = wfMessage( 'translate-svg-upload-none' )->inContentLanguage();
		$expandedString = $startedString;
		if( count( $started ) !== 0 ) {
			$startedString = $wgContLang->commaList( array_keys( $started ) );
		}
		if( count( $expanded ) !== 0 ) {
			$expandedString = $wgContLang->commaList( array_keys( $expanded ) );
		}
		$comment = wfMessage(
			'translate-svg-upload-comment',
			array( $startedString, $expandedString )
		)->inContentLanguage();

		$user = User::newFromName( $wgTranslateSvgBotName, false );
		$status = $uploader->performUpload( $comment, false, false, $user );
		if ( !$status->isGood() ) {
			return $this->getOutput()->parse( $status->getWikiText() );
		}

		if( $wgUser->getOption( 'watchcreations' ) ){
			$wgUser->addWatch( $uploader->getLocalFile()->getTitle() );
		}
		return true;
	}

	/**
	 * Provides output to the user for a result of UploadBase::verifyUpload
	 * Copied from SpecialUpload (c) Authors
	 *
	 * @param $details Array: result of UploadBase::verifyUpload
	 */
	protected function processVerificationError( $details ) {
		global $wgFileExtensions;

		switch( $details['status'] ) {
			case UploadBase::FILE_TOO_LARGE:
				return wfMsgHtml( 'largefileserver' );
			case UploadBase::VERIFICATION_ERROR:
				unset( $details['status'] );
				$code = array_shift( $details['details'] );
				return wfMsgExt( $code, 'parseinline', $details['details'] );
			default:
				// A random error, possibly that the file got corrupted and ended
				// up having an illegal length of 0 bytes
				return wfMessage( 'translate-svg-export-error' )->html();
		}
	}
}

class TranslateSvgUpload extends UploadBase {
	public function initializeFromRequest( &$request ) {

	}
}