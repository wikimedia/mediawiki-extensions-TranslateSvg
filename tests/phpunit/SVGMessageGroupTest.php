<?php
/**
 * Unit tests.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2014, Harry Burt
 * @license GPL-2.0+
 */

/**
 * Unit tests for SVGMessageGroup class.
 * @covers SVGMessageGroup
 */
class SVGMessageGroupTest extends TranslateSvgTestCase {
	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::prepareFile( __DIR__ . '/../data/Speech_bubbles.svg' );
	}

	public function testGetSourceLanguage() {
		$this->assertEquals(
			'en',
			$this->messageGroup->getSourceLanguage(),
			'No source language has been set, en should be used as the default'
		);
	}

	/**
	 * @dataProvider provideSetSourceLanguage
	 */
	public function testSetSourceLanguage( $to ) {
		$this->messageGroup->setSourceLanguage( $to );
		$this->assertEquals( $to, $this->messageGroup->getSourceLanguage() );
	}

	public function provideSetSourceLanguage() {
		return array( array( 'de' ), array( 'en' ) );
	}

	public function testGetId() {
		// Should be normalised to spaces
		$name = str_replace( '_', ' ', self::$name );
		$this->assertEquals( $name, $this->messageGroup->getId() );
	}

	public function testGetLabel() {
		// Should be normalised to spaces
		$name = str_replace( '_', ' ', self::$name );
		$this->assertEquals( $name, $this->messageGroup->getLabel() );
	}

	public function testGetNamespace() {
		$this->assertEquals( NS_FILE, $this->messageGroup->getNamespace() );
	}
}