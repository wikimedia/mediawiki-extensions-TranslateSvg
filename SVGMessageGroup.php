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

	/**
	 * Constructor.
	 *
	 * @param $filename \string Name of the file to be translated (no namespace)
	 */
	public function __construct( $filename ) {
		global $wgLang, $wgContLang;
		parent::__construct( $filename, $filename );
		$prefixedFilename = $wgContLang->getNsText( NS_FILE ) . ':' . $filename;
		$this->setNamespace( NS_FILE );
		$this->setLabel( $filename );
		$title = Title::newFromText( $prefixedFilename );
		if( $title->exists() ){
			$rev = Revision::newFromTitle( $title )->getText();
			$revsections = explode( "\n==", $rev );
			foreach( $revsections as $revsection ){
				//Attempt to trim the file description page down to only the most relevant content
				if( strpos( $revsection, '{{Information' ) !== false ){
					$rev = trim( preg_replace( "/==+[^=]+==+/", "", $revsection ) );
				}
			}
		} else {
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

		$subpages = Title::makeTitle( $this->getNamespace(), $this->source )->getSubpages();
		foreach( $subpages as $subpage ){
			if( $subpage->getSubpageText() === $this->getSourceLanguage() ){
				$definition = Revision::newFromTitle( $subpage )->getText();
				if( strpos( $definition, '{{Translation properties' ) !== false ){
					$definition = substr( $definition, 0, ( strrpos( $definition, '{{Translation properties' ) ) ); //Strip properties template
				}
				$messageparent = str_replace( '/' . $subpage->getSubpageText(), '', $subpage->getText() ); //Is there really not an easier way?
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
		if( strpos( $definition, '{{Translation properties' ) !== false ){
			$definition = substr( $definition, 0, ( strrpos( $definition, '{{Translation properties' ) - 1 ) ); //Strip properties template
		}
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
		if( strpos( $properties, '{{Translation properties' ) === false ){
			return null;
		}
		$properties = substr( $properties, ( strrpos( $properties, '{{Translation properties' ) ) ); //Only retain properties template
		return $properties;
	}

	public function load( $code ) {
		if ( $this->isSourceLanguage( $code ) ) {
			return $this->getDefinitions();
		}

		return array();
	}
}