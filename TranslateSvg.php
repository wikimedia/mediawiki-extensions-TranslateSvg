<?php
/*
	TranslateSvg extension (c) 2011 Harry Burt ( http://harryburt.co.uk )
	
	Some portions of it forked from MediaWiki core in December 2011; please
	consult http://svn.wikimedia.org/svnroot/mediawiki/trunk/phase3/CREDITS
	for a complete list of authors.
	
	Licensed freely under GNU General Public License Version 2, June 1991
	For terms of use, see http://www.opensource.org/licenses/gpl-2.0.php.
*/

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'TranslateSVG',
	'author' => 'Harry Burt',
	'url' => 'https://www.mediawiki.org/wiki/Extension:TranslateSvg',
	'descriptionmsg' => 'translatesvg-desc',
	'version' => '1.0.0',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['TranslateSvg'] = $dir . 'TranslateSvg.i18n.php';
$wgResourceModules['ext.translateSvg'] = array(
);