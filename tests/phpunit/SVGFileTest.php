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
						),
					'nl' =>
						array(
							'text' => 'Goed,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997-nl',
							'data-parent' => 'text2995',
						),
					'tlh-ca' =>
						array(
							'text' => 'Goed,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997-nl',
							'data-parent' => 'text2995',
						),
					'fallback' =>
						array(
							'text' => 'I\'m well,',
							'x' => '101.42857',
							'y' => '318.64789',
							'id' => 'tspan2997',
							'sodipodi:role' => 'line',
							'data-parent' => 'text2995',
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

}