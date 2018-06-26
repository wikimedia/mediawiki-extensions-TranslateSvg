<?php
/**
 * MediaWiki extension TranslateSvg
 * Copyright (C) 2012 Harry Burt
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
$wgExtensionCredits['specialpage'][] = [
	'path'           => __FILE__,
	'name'           => 'TranslateSVG',
	'author'         => 'Harry Burt',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:TranslateSvg/2.0',
	'descriptionmsg' => 'translatesvg-desc',
	'version'        => '2.1.0',
	'license'        => 'GPL-2.0-or-later',
];

$dir = __DIR__ . '/';
$wgAutoloadClasses['SpecialTranslateNewSVG'] = $dir . 'SpecialTranslateNewSVG.php';
$wgAutoloadClasses['SVGFile'] = $dir . 'SVGFile.php';
$wgAutoloadClasses['SVGFormatWriter'] = $dir . 'SVGFormatWriter.php';
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgAutoloadClasses['TranslateSvgUtils'] = $dir . 'TranslateSvgUtils.php';
$wgAutoloadClasses['TranslateSvgHooks'] = $dir . 'TranslateSvgHooks.php';
$wgAutoloadClasses['ExportSVGMessagesTask'] = $dir . 'TranslateSvgTasks.php';
$wgAutoloadClasses['TranslateSvgUpload'] = $dir . 'SVGFormatWriter.php';

if ( defined( 'MW_PHPUNIT_TEST' ) ) {
	define( 'MW_PHPUNIT_USE_AUTOLOAD', true );
	require_once $dir . 'tests/phpunit/bootstrap.php';
}

$wgMessagesDirs['TranslateSvg'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['TranslateSvgAlias'] = $dir . 'TranslateSvg.alias.php';

$wgResourceModules['jquery.colorpicker'] = [
	'scripts'       => [ 'resources/jquery.colorpicker.js' ],
	'styles'        => [ 'resources/jquery.colorpicker.css' ],
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'TranslateSvg'
];

$wgResourceModules['ext.translatesvg'] = [
	'scripts'       => [ 'resources/ext.translatesvg.core.js' ],
	'dependencies'  => [
		'jquery.form',
		'jquery.ui.dialog',
		'jquery.colorpicker',
		'ext.translate.hooks'
	],
	'messages'      => [
		'translate-taction-mstats-svgmg',
		'translate-taction-export-svgmg',
		'translate-page-description-legend-svgmg'
	],
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'TranslateSvg'
];

$wgResourceModules['ext.translatesvg.filepage'] = [
	'scripts'       => [ 'resources/ext.translatesvg.filepage.js' ],
	'dependencies'  => [ 'mediawiki.Uri' ],
	'messages'      => [
		'translate-svg-filepage-caption',
		'translate-svg-filepage-caption-translator',
		'translate-svg-filepage-edit',
		'translate-svg-filepage-finish',
		'translate-svg-filepage-item',
		'translate-svg-filepage-another',
		'translate-svg-filepage-other',
		'translate-svg-filepage-invite',
		'comma-separator'
	],
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'TranslateSvg'
];

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
$wgTranslateMessageNamespaces[] = NS_FILE;

/**
 * List of typefaces (or keywords) that can safely be incorporated into SVG
 * images, not including "(inherit)", the default.
 */
$wgTranslateSvgTypefaces = [ 'serif', 'sans-serif', 'monospace' ];

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

$wgTranslateSvgColors = [
	'#ffffff', '#ffccc9', '#ffce93', '#fffc9e', '#ffffc7', '#9aff99', '#96fffb',
	'#cdffff', '#cbcefb', '#cfcfcf', '#fd6864', '#fe996b', '#fffe65', '#fcff2f',
	'#67fd9a', '#38fff8', '#68fdff', '#9698ed', '#c0c0c0', '#fe0000', '#f8a102',
	'#ffcc67', '#f8ff00', '#34ff34', '#68cbd0', '#34cdf9', '#6665cd', '#9b9b9b',
	'#cb0000', '#f56b00', '#ffcb2f', '#ffc702', '#32cb00', '#00d2cb', '#3166ff',
	'#6434fc', '#656565', '#9a0000', '#ce6301', '#cd9934', '#999903', '#009901',
	'#329a9d', '#3531ff', '#6200c9', '#343434', '#680100', '#963400', '#986536',
	'#646809', '#036400', '#34696d', '#00009b', '#303498', '#000000', '#330001',
	'#643403', '#663234', '#343300', '#013300', '#003532', '#010066'
];

$wgTranslateSvgBotName = 'SVG translation updater';
$wgReservedUsernames[] = & $wgTranslateSvgBotName;

$wgTranslateSvgDefaultProperties = [
	'x'         => '', 'y' => '', 'font-family' => 'other',
	'font-size' => '', 'units' => 'other', 'color' => '',
	'underline' => '', 'italic' => '', 'bold' => ''
];
$wgTranslateSvgOptionalProperties = [
	'id',
	'data-children',
	'xml:space',
	'sodipodi:role',
	'sodipodi:linespacing'
];
