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
		'translate-js-next'
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
$wgHooks['TranslateGetOptions'][] = 'TranslateSvgHooks::makeExportAsSvgOptionDefault';
$wgHooks['TranslateGetOptions'][] = 'TranslateSvgHooks::makeViewAllOptionDefault';
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

// TODO: Might want to die here if Translate not loaded first
$wgTranslateTasks['export-as-svg'] = 'ExportSVGMessagesTask';
$wgTranslateMessageNamespaces[] = 6;