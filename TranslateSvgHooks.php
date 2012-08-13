<?php
/**
 * Contains class with hook functions for the TranslateSvg extension
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012, Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Some hooks for TranslateSvg extension.
 */
class TranslateSvgHooks{
	/**
	 * Function used to add modules to the ResourceLoader via the
	 * TranslateBeforeAddModules hook
	 *
	 * @param $modules The current array of modules
	 * @return \bool true
	 */
	public static function addModules( &$modules ) {
		$modules[] = 'ext.translatesvg';
		return true;
	}
}