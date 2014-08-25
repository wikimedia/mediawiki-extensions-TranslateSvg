<?php
/*
	TranslateSvg extension (c) 2012 Harry Burt (http://harryburt.co.uk) on a
	file by file basis.

	Licensed freely under GNU General Public License Version 2, June 1991
	For terms of use, see http://www.opensource.org/licenses/gpl-2.0.php.
*/

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'TranslateSVG',
	'author'         => 'Harry Burt',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:TranslateSvg/2.0',
	'descriptionmsg' => 'translatesvg-desc',
	'version'        => '2.1.0',
);

$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['SpecialTranslateNewSVG'] = $dir . 'SpecialTranslateNewSVG.php';
$wgAutoloadClasses['SVGFile'] = $dir . 'SVGFile.php';
$wgAutoloadClasses['SVGFormatWriter'] = $dir . 'SVGFormatWriter.php';
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgAutoloadClasses['TranslateSvgUtils'] = $dir . 'TranslateSvgUtils.php';
$wgAutoloadClasses['TranslateSvgHooks'] = $dir . 'TranslateSvgHooks.php';
$wgAutoloadClasses['ExportSVGMessagesTask'] = $dir . 'TranslateSvgTasks.php';
$wgAutoloadClasses['TranslateSvgUpload'] = $dir . 'SVGFormatWriter.php';

if( defined( 'MW_PHPUNIT_TEST' ) ) {
	define( 'MW_PHPUNIT_USE_AUTOLOAD', true );
	require_once $dir . 'tests/phpunit/bootstrap.php';
}

$wgMessagesDirs['TranslateSvg'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';
$wgExtensionMessagesFiles['TranslateSvgAlias'] = $dir . 'TranslateSvg.alias.php';

$wgResourceModules['jquery.colorpicker'] = array(
	'scripts'       => array( 'resources/jquery.colorpicker.js' ),
	'styles'        => array( 'resources/jquery.colorpicker.css' ),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgResourceModules['ext.translatesvg'] = array(
	'scripts'       => array( 'resources/ext.translatesvg.core.js' ),
	'dependencies'  => array(
		'jquery.form',
		'jquery.ui.dialog',
		'jquery.autoresize',
		'jquery.colorpicker',
		'jquery.json',
		'ext.translate.hooks'
	),
	'messages'      => array(
		'translate-taction-mstats-svgmg',
		'translate-taction-export-svgmg',
		'translate-page-description-legend-svgmg'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgResourceModules['ext.translatesvg.filepage'] = array(
	'scripts'       => array( 'resources/ext.translatesvg.filepage.js' ),
	'dependencies'  => array( 'mediawiki.Uri' ),
	'messages'      => array(
		'translate-svg-filepage-caption',
		'translate-svg-filepage-caption-translator',
		'translate-svg-filepage-edit',
		'translate-svg-filepage-finish',
		'translate-svg-filepage-item',
		'translate-svg-filepage-another',
		'translate-svg-filepage-other',
		'translate-svg-filepage-invite',
		'comma-separator'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgHooks['BeforePageDisplay'][] = 'TranslateSvgHooks::updateFileDescriptionPages';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'TranslateSvgHooks::schemaUpdates';
$wgHooks['MakeGlobalVariablesScript'][] = 'TranslateSvgHooks::makeFilePageGlobalVariables';
$wgHooks['TranslateBeforeAddModules'][] = 'TranslateSvgHooks::addModules';
$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::addThumbnail';
$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::removeQQQ';
$wgHooks['TranslateGetBoxes'][] = 'TranslateSvgHooks::removeSuggestions';
$wgHooks['TranslateGetSpecialTranslateOptions'][] = 'TranslateSvgHooks::makeExportAsSvgOptionDefault';
$wgHooks['TranslatePrefillTranslation'][] = 'TranslateSvgHooks::getDefaultPropertiesFromGroup';
$wgHooks['TranslateGetExtraInputs'][] = 'TranslateSvgHooks::propertiesToExtraInputs';
$wgHooks['TranslateFormatMessageBeforeTable'][] = 'TranslateSvgHooks::stripPropertyString';
$wgHooks['MakeGlobalVariablesScript'][] = 'TranslateSvgHooks::exposeTranslateSvgTemplateName';
$wgHooks['TranslateBeforeAddModules'][] = 'TranslateSvgHooks::addModules';
$wgHooks['TranslateGetAPIMessageGroupsPropertyDescs'][] = 'TranslateSvgHooks::addAPIProperties';
$wgHooks['TranslateGetAPIMessageGroupsParameterDescs'][] = 'TranslateSvgHooks::addAPIParamDescs';
$wgHooks['TranslateGetAPIMessageGroupsParameterList'][] = 'TranslateSvgHooks::addAPIParams';
$wgHooks['TranslatePostInitGroups'][] = 'TranslateSvgHooks::loadSVGGroups';
$wgHooks['TranslateProcessAPIMessageGroupsProperties'][] = 'TranslateSvgHooks::processAPIProperties';
$wgHooks['UnitTestsList'][] = 'TranslateSvgHooks::onUnitTestsList';

$wgSpecialPages['TranslateNewSVG'] = 'SpecialTranslateNewSVG';
$wgSpecialPageGroups['TranslateNewSVG'] = 'wiki';
$wgTranslateMessageNamespaces[] = NS_FILE;

/**
 * List of typefaces (or keywords) that can safely be incorporated into SVG
 * images, not including "(inherit)", the default.
 */
$wgTranslateSvgTypefaces = array( 'serif', 'sans-serif', 'monospace' );

$wgTranslateSvgTemplateName = 'Translation properties';

/**
 * Directory where TranslateSvg's "live" (temporary) thumbnails should be stored.
 * If left false, defaults to "{$wgUploadDirectory}/translatesvg"
 */
$wgTranslateSvgDirectory = false;

/**
 * Server path equivalent to $wgTranslateSvgDirectory
 * If left false, defaults to "{$wgUploadPath}/translatesvg"
 */
$wgTranslateSvgPath = false;

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
$wgReservedUsernames[] = & $wgTranslateSvgBotName;

$wgTranslateSvgDefaultProperties = array(
	'x'         => '', 'y' => '', 'font-family' => 'other',
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
