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
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgAutoloadClasses['TranslateSvgUtils'] = $dir . 'TranslateSvgUtils.php';
$wgAutoloadClasses['TranslateSvgHooks'] = $dir . 'TranslateSvgHooks.php';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';

$wgHooks['TranslateBeforeAddModules'][] = 'TranslateSvgHooks::addModules';

$wgResourceModules['ext.translatesvg'] = array(
	'scripts' => array( 'resources/ext.translatesvg.core.js' ),
	'messages' => array(
		'translate-taction-mstats-svgmg',
		'translate-taction-export-svgmg',
		'translate-page-description-legend-svgmg'
	),
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'TranslateSvg'
);

$wgTranslateSvgBotName = 'SVG translation updater';
$wgReservedUsernames[] = &$wgTranslateSvgBotName;