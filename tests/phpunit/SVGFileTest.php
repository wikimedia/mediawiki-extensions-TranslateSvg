<?php
/**
 * Unit tests.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2014, Harry Burt
 * @license GPL-2.0+
 * @group database
 */

/**
 * Unit tests for SVGFile class.
 * @covers SVGFile
 */
class SVGFileTest extends TranslateSvgTestCase {

	/**
	 * @var SVGFile
	 */
	private $svg;

	public function setUp() {
		parent::setUp();
		$this->svg = new SVGFile( __DIR__ . '/../data/Speech_bubbles.svg', 'en' );
	}

	/*
	 * @todo: add additional attributes
	 * @todo: consider if data-parent needs to survive roundtrip, and, if so, how
	 */
	public function testArrayToNodeToArray() {
		$array = array(
			'text' => 'Hallo!',
			'id' => 'tspan2987-de',
			'font-weight' => 'bold',
			'non-existent' => 'foobar',
			'data-parent' => 'text2985'
		);

		$dom = new DOMDocument("1.0","UTF-8");
		$dom->loadXML( '<text id="tspan2987-de" font-weight="bold">Hallo!</text>');

		$node = $this->svg->arrayToNode( $array, 'tspan' );
		$this->assertEquals( $this->svg->nodeToArray( $dom->firstChild ), $this->svg->nodeToArray( $node ) );

		$expectedArray = $array;
		unset( $expectedArray['data-parent'], $expectedArray['non-existent'] );
		$this->assertEquals( $expectedArray, $this->svg->nodeToArray( $node ) );
	}

	public function testGetInFileTranslations() {
		$expected = array(
			'tspan2987' =>
				array(
					'de' =>
						array(
							'text' => 'Hallo!',
							'id' => 'tspan2987-de',
							'data-parent' => 'text2985',
						),
					'fr' =>
						array(
							'text' => 'Bonjour',
							'x' => '80',
							'y' => '108.07646',
							'id' => 'tspan2987-fr',
							'data-parent' => 'text2985',
						),
					'nl' =>
						array(
							'text' => 'Hallo!',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'tspan2987-nl',
							'data-parent' => 'text2985',
						),
					'tlh-ca' =>
						array(
							'text' => 'Hallo!',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'tspan2987-nl',
							'data-parent' => 'text2985',
						),
					'fallback' =>
						array(
							'text' => 'Hello!',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'tspan2987',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2985',
						),
				),
			'tspan2991' =>
				array(
					'de' =>
						array(
							'text' => 'Hallo! Wie',
							'x' => '323',
							'y' => '188.07648',
							'id' => 'tspan2991-de',
							'data-parent' => 'text2989',
						),
					'fr' =>
						array(
							'text' => 'Bonjour,',
							'x' => '335',
							'y' => '188.07648',
							'id' => 'tspan2991-fr',
							'data-parent' => 'text2989',
						),
					'nl' =>
						array(
							'text' => 'Hallo! Hoe',
							'x' => '310',
							'y' => '188.07648',
							'id' => 'tspan2991-nl',
							'data-parent' => 'text2989',
						),
					'tlh-ca' =>
						array(
							'text' => 'Hallo! Hoe',
							'x' => '310',
							'y' => '188.07648',
							'id' => 'tspan2991-nl',
							'data-parent' => 'text2989',
						),
					'fallback' =>
						array(
							'text' => 'Hello! How',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'tspan2991',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2989',
							'text-decoration' => 'normal',
							'font-style' => 'normal',
							'font-weight' => 'normal',
						),
				),
			'tspan2993' =>
				array(
					'de' =>
						array(
							'text' => 'geht\'s?',
							'x' => '350',
							'y' => '238.07648',
							'id' => 'tspan2993-de',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2989',
						),
					'fr' =>
						array(
							'text' => 'ça va?',
							'x' => '350',
							'y' => '238.07648',
							'id' => 'tspan2993-fr',
							'data-parent' => 'text2989',
						),
					'nl' =>
						array(
							'text' => 'gaat het?',
							'x' => '330',
							'y' => '238.07648',
							'id' => 'tspan2993-nl',
							'data-parent' => 'text2989',
						),
					'tlh-ca' =>
						array(
							'text' => 'gaat het?',
							'x' => '330',
							'y' => '238.07648',
							'id' => 'tspan2993-nl',
							'data-parent' => 'text2989',
						),
					'fallback' =>
						array(
							'text' => 'are you?',
							'x' => '330',
							'y' => '238.07648',
							'id' => 'tspan2993',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2989',
						),
				),
			'tspan2997' =>
				array(
					'fr' =>
						array(
							'text' => 'Ça va bien,',
							'x' => '82',
							'y' => '323',
							'id' => 'tspan2997-fr',
							'data-parent' => 'text2995',
							'font-weight' => 'normal',
						),
					'nl' =>
						array(
							'text' => 'Goed,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997-nl',
							'data-parent' => 'text2995',
							'font-style' => 'normal',
						),
					'tlh-ca' =>
						array(
							'text' => 'Goed,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997-nl',
							'data-parent' => 'text2995',
							'font-style' => 'normal',
						),
					'fallback' =>
						array(
							'text' => 'I\'m well,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2995',
							'text-decoration' => 'normal',
						),
				),
			'tspan2999' =>
				array(
					'fr' =>
						array(
							'text' => 'et toi',
							'x' => '117.42857',
							'y' => '368.64789',
							'id' => 'tspan2999-fr',
							'data-parent' => 'text2995',
						),
					'nl' =>
						array(
							'text' => 'met jou',
							'x' => '101.42857',
							'y' => '368.64789',
							'font-size' => '90%',
							'id' => 'tspan2999-nl',
							'data-parent' => 'text2995',
						),
					'tlh-ca' =>
						array(
							'text' => 'met jou',
							'x' => '101.42857',
							'y' => '368.64789',
							'font-size' => '90%',
							'id' => 'tspan2999-nl',
							'data-parent' => 'text2995',
						),
					'fallback' =>
						array(
							'text' => '   you',
							'x' => '101.42857',
							'y' => '368.64789',
							'id' => 'tspan2999',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2995',
						),
				),
			'text2995' =>
				array(
					'fr' =>
						array(
							'text' => '$1$2?',
							'xml:space' => 'preserve',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'text2995-fr',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2997|tspan2999',
						),
					'nl' =>
						array(
							'text' => '$1$2?',
							'xml:space' => 'preserve',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'text2995-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2997|tspan2999',
						),
					'tlh-ca' =>
						array(
							'text' => '$1$2?',
							'xml:space' => 'preserve',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'text2995-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2997|tspan2999',
						),
					'fallback' =>
						array(
							'text' => '$1$2?',
							'xml:space' => 'preserve',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'text2995',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2997|tspan2999',
						)
				)
		);
		$this->assertEquals( $expected, $this->svg->getInFileTranslations() );
	}

	public function testGetSavedLanguages() {
		$expected = array(
			'de', 'fr', 'nl', 'tlh-ca', 'en'
		);
		$this->assertEquals( $expected, $this->svg->getSavedLanguages() );
	}

	public function testGetSavedLanguagesFiltered() {
		$expected = array(
			'full' => array( 'fr', 'nl', 'tlh-ca', 'en' ),
			'partial' => array( 'de' )
		);
		$this->assertEquals( $expected, $this->svg->getSavedLanguagesFiltered() );
	}

	public function testGetFilteredTextNodes() {

		// The important things here are:
		//  * array length. One of the three sets has non-zero text content, so should not be filtered
		//  * text. Since they are filtered, all should contain nothing but $ references.
		//  * data-children. Each should have as many children as there are $ references.

		$expected = array(
			'text2985' =>
				array(
					'de' =>
						array(
							'text' => '$1',
							'xml:space' => 'preserve',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'text2985-de',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2987',
						),
					'fr' =>
						array(
							'text' => '$1',
							'xml:space' => 'preserve',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'text2985-fr',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2987',
						),
					'nl' =>
						array(
							'text' => '$1',
							'xml:space' => 'preserve',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'text2985-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2987',
						),
					'tlh-ca' =>
						array(
							'text' => '$1',
							'xml:space' => 'preserve',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'text2985-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2987',
						),
					'fallback' =>
						array(
							'text' => '$1',
							'xml:space' => 'preserve',
							'x' => '90',
							'y' => '108.07646',
							'id' => 'text2985',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2987',
						),
				),
			'text2989' =>
				array(
					'de' =>
						array(
							'text' => '$1$2',
							'xml:space' => 'preserve',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'text2989-de',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2991|tspan2993',
						),
					'fr' =>
						array(
							'text' => '$1$2',
							'xml:space' => 'preserve',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'text2989-fr',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2991|tspan2993',
						),
					'nl' =>
						array(
							'text' => '$1$2',
							'xml:space' => 'preserve',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'text2989-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2991|tspan2993',
						),
					'tlh-ca' =>
						array(
							'text' => '$1$2',
							'xml:space' => 'preserve',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'text2989-nl',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2991|tspan2993',
						),
					'fallback' =>
						array(
							'text' => '$1$2',
							'xml:space' => 'preserve',
							'x' => '330',
							'y' => '188.07648',
							'id' => 'text2989',
							'sodipodi:linespacing' => '125%',
							'data-children' => 'tspan2991|tspan2993',
						),
				),
		);
		$this->assertArrayEquals( $expected, $this->svg->getFilteredTextNodes() );
	}

	public function testSwitchTranslationSetRoundtrip() {
		// Functions already tested above
		$origXml = $this->svg->saveToString();
		$current = $this->svg->getInFileTranslations();
		$filteredTextNodes = $this->svg->getFilteredTextNodes();
		$ret = $this->svg->switchToTranslationSet( array_merge( $current, $filteredTextNodes ) );

		$this->assertArrayEquals( $current, $this->svg->getInFileTranslations() );
		$this->assertArrayEquals( $filteredTextNodes, $this->svg->getFilteredTextNodes() );
		$this->assertArrayEquals( array( 'started' => array(), 'expanded' => array() ), $ret );

		$this->assertEquals( str_replace( ' ', '', $origXml ), str_replace( ' ', '', $this->svg->saveToString() ) );
	}

	public function testSaveToString() {
		// Check that we are not actually destroying the XML file
		$this->assertGreaterThan( 1500, strlen( $this->svg->saveToString() ) );
	}

	public function testSaveToPath() {
		$tempPath = tempnam( wfTempDir(), 'test' );
		$this->svg->saveToPath( $tempPath );

		// Check that we are not actually destroying the XML file
		$this->assertGreaterThan( 1500, strlen( file_get_contents( $tempPath ) ) );
	}
}