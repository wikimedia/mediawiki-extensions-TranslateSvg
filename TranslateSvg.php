<?php
/*
	TranslateSvg extension (c) 2012 Harry Burt (http://harryburt.co.uk) on a
	file by file basis.

	Licensed freely under GNU General Public License Version 2, June 1991
	For terms of use, see http://www.opensource.org/licenses/gpl-2.0.php.
*/

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'TranslateSVG',
	'author' => 'Harry Burt',
	'url' => 'https://www.mediawiki.org/wiki/Extension:TranslateSvg/2.0',
	'descriptionmsg' => 'translatesvg-desc',
	'version' => '2.0.0',
);

$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['SVGFormatReader'] = $dir . 'SVGFormatReader.php';
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgAutoloadClasses['TranslateSvgUtils'] = $dir . 'TranslateSvgUtils.php';
$wgAutoloadClasses['TranslateSvgHooks'] = $dir . 'TranslateSvgHooks.php';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';

$wgResourceModules['jquery.colorpicker'] = array(
	'scripts' => array( 'resources/jquery.colorpicker.js' ),
	'styles' => array( 'resources/jquery.colorpicker.css' ),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgResourceModules['ext.translatesvg'] = array(
	'scripts' => array( 'resources/ext.translatesvg.core.js' ),
	'dependencies' => array(
		'jquery.form',
		'jquery.ui.dialog',
		'jquery.autoresize',
		'jquery.colorpicker',
		'ext.translate.hooks'
	),
	'messages' => array(
		'translate-taction-mstats-svgmg',
		'translate-taction-export-svgmg',
		'translate-page-description-legend-svgmg'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::addThumbnail';
$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::removeQQQ';
$wgHooks['TranslatePrefillTranslation'][] = 'TranslateSvgHooks::getDefaultPropertiesFromGroup';
$wgHooks['TranslateGetExtraInputs'][] = 'TranslateSvgHooks::propertiesToExtraInputs';
$wgHooks['TranslateFormatMessageBeforeTable'][] = 'TranslateSvgHooks::stripPropertyString';
$wgHooks['MakeGlobalVariablesScript'][] = 'TranslateSvgHooks::exposeTranslateSvgTemplateName';
$wgHooks['TranslateBeforeAddModules'][] = 'TranslateSvgHooks::addModules';

/**
 * List of typefaces (or keywords) that can safely be incorporated into SVG
 * images, not including "(inherit)", the default.
 */
$wgTranslateSvgTypefaces = array( 'serif', 'sans-serif', 'monospace' );

$wgTranslateSvgTemplateName = 'Translation properties';
$wgTranslateSvgColors = array(
	'#ffffff', '#ffccc9', '#ffce93', '#fffc9e', '#ffffc7', '#9aff99', '#96fffb',
	'#cdffff', '#cbcefb', '#cfcfcf', '#fd6864', '#fe996b', '#fffe65', '#fcff2f',
	'#67fd9a', '#38fff8', '#68fdff', '#9698ed', '#c0c0c0', '#fe0000', '#f8a102',
	'#ffcc67', '#f8ff00', '#34ff34', '#68cbd0', '#34cdf9', '#6665cd', '#9b9b9b',
	'#cb0000', '#f56b00', '#ffcb2f', '#ffc702', '#32cb00', '#00d2cb', '#3166ff',
	'#6434fc', '#656565', '#9a0000', '#ce6301', '#cd9934', '#999903', '#009901',
	'#329a9d', '#3531ff', '#6200c9', '#343434', '#680100', '#963400', '#986536',
	'#646809', '#036400', '#34696d', '#00009b', '#303498', '#000000', '#330001',
	'#643403', '#663234', '#343300', '#013300', '#003532', '#010066'
);

$wgTranslateSvgBotName = 'SVG translation updater';
$wgReservedUsernames[] = &$wgTranslateSvgBotName;

$wgTranslateSvgDefaultProperties = array(
	'x' => '', 'y' => '', 'font-family' => 'other',
	'font-size' => '', 'units' => 'other', 'color' => '',
	'underline' => '', 'italic' => '', 'bold' => ''
);
$wgTranslateSvgOptionalProperties = array(
	'id',
	'data-children',
	'xml:space',
	'sodipodi:role',
	'sodipodi:linespacing'
);
