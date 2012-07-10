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

$dir = __DIR__ . '/';
$wgAutoloadClasses['SVGMessageGroup'] = $dir . 'SVGMessageGroup.php';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';
$wgResourceModules['ext.translateSvg'] = array();