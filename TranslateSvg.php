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
	'url' => 'https:// www.mediawiki.org/wiki/Extension:TranslateSvg',
	'descriptionmsg' => 'translatesvg-desc',
	'version' => '2.0.0',
);

$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['ExportSVGMessagesTask'] = $dir . 'TranslateSvgTasks.php';
$wgAutoloadClasses['SVGFormatReader'] = $dir . 'SVGFormatReader.php';
$wgAutoloadClasses['SVGFormatWriter'] = $dir . 'SVGFormatWriter.php';
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgAutoloadClasses['TranslateSvgHooks'] = $dir . 'TranslateSvgHooks.php';
$wgAutoloadClasses['TranslateSvgUpload'] = $dir . 'SVGFormatWriter.php';
$wgAutoloadClasses['TranslateSvgUtils'] = $dir . 'TranslateSvgUtils.php';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';

$wgResourceModules['jquery.colorpicker'] = array(
	'scripts' => array( 'resources/jquery.colorpicker.js' ),
	'styles' => array( 'resources/jquery.colorpicker.css' ),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgResourceModules['ext.translatesvg'] = array(
	'scripts' => array( 'resources/ext.translatesvg.core.js' ),
	'styles' => array( 'resources/ext.translatesvg.css' ),
	'messages' => array(
		'translate-taction-mstats-svgmg',
		'translate-taction-export-svgmg',
		'translate-page-description-legend-svgmg',
		'translate-page-group',
		'translate-page-group-svgmg',
		'translate-svg-table-header',
		'translate-svg-chooselanguage-title',
		'translate-svg-chooselanguage-desc',
		'translate-svg-instructions-desc',
		'translate-svg-instructions-title',
		'translate-js-save',
		'translate-js-next',
		'go'
	),
	'dependencies' => array(
		'jquery.form',
		'jquery.ui.dialog',
		'jquery.autoresize',
		'jquery.colorpicker',
		'ext.translate.hooks'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgResourceModules['ext.translatesvg.filepage'] = array(
	'scripts' => array( 'resources/ext.translatesvg.filepage.js' ),
	'messages' => array(
		'translate-svg-filepage-caption',
		'translate-svg-filepage-caption-translator',
		'translate-svg-filepage-edit',
		'translate-svg-filepage-finish',
		'translate-svg-filepage-item',
		'translate-svg-filepage-another',
		'translate-svg-filepage-invite',
		'comma-separator'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::addThumbnail';
$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::removeQQQ';
$wgHooks['TranslatePrefillTranslation'][] = 'TranslateSvgHooks::getDefaultPropertiesFromGroup';
$wgHooks['TranslateGetExtraInputs'][] = 'TranslateSvgHooks::propertiesToExtraInputs';
$wgHooks['TranslateFormatMessageBeforeTable'][] = 'TranslateSvgHooks::stripPropertyString';
$wgHooks['TranslateGetSpecialTranslateOptions'][] = 'TranslateSvgHooks::makeExportAsSvgOptionDefault';
$wgHooks['TranslateGetSpecialTranslateOptions'][] = 'TranslateSvgHooks::makeViewAllOptionDefault';
$wgHooks['BeforePageDisplay'][] = 'TranslateSvgHooks::updateFileDescriptionPages';
$wgHooks['MakeGlobalVariablesScript'][] = 'TranslateSvgHooks::makeFilePageGlobalVariables';
$wgHooks['MakeGlobalVariablesScript'][] = 'TranslateSvgHooks::exposeTranslateSvgTemplateName';
$wgHooks['TranslateBeforeAddModules'][] = 'TranslateSvgHooks::addModules';
$wgHooks['TranslateBeforeSpecialTranslate'][] = 'TranslateSvgHooks::makeThumbnailPage';
$wgHooks['TranslateNoSuchGroupFound'][] = 'TranslateSvgHooks::mimicSVGGroup';
$wgHooks['FileUpload'][] = 'TranslateSvgHooks::checkTranslationIntegrity';

/**
 * List of typefaces (or keywords) that can safely be incorporated into SVG
 * images, not including "(inherit)", the default.
 */
$wgTranslateSVGTypefaces = array( 'serif', 'sans-serif', 'monospace' );

$wgTranslateSVGDefaultProperties = array(
	'x' => '', 'y' => '', 'font-family' => 'other',
	'font-size' => '', 'units' => 'other', 'color' => '',
	'underline' => '', 'italic' => '', 'bold' => ''
);
$wgTranslateSVGOptionalProperties = array(
	'id',
	'data-children',
	'xml:space',
	'sodipodi:role',
	'sodipodi:linespacing'
);

$wgTranslateSvgBotName = 'SVG translation updater';
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

// TODO: Might want to die here if Translate not loaded first
$wgTranslateTasks['export-as-svg'] = 'ExportSVGMessagesTask';
$wgTranslateMessageNamespaces[] = 6;