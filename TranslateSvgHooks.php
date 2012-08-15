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
	 * Function used to add a translation helper box via the TranslateGetBoxes hook
	 *
	 * @param $group \MessageGroup The MessageGroup of the page being translated
	 * @param $handle \MessageHandle The MessageHandle of the page being translated
	 * @param $boxes \array The array to which the thumbnail helper is added
	 * @return \bool true
	 */
	public static function addThumbnail( $group, $handle, $boxes ) {
		global $wgLang;

		if( !( $group instanceof SVGMessageGroup ) ) {
			return true;
		}

		$title = Title::newFromText( $group->getLabel(), NS_FILE );
		$file = wfFindFile( $title );
		$thumbnail = Linker::makeThumbLinkObj(
			$title, $file, wfMessage( 'translate-svg-js-thumbnail' ), '', $wgLang->alignEnd(),
			array( 'width' => 275, 'height' => 275 )
		);
		$boxes = array_merge( array( 'thumbnail' => $thumbnail ), $boxes );

		return true;
	}

	/**
	 * Function used to remove the QQQ (documentation) translation helper box via
	 * the TranslateGetBoxes hook
	 *
	 * @param $title \Title The Title object representing the page being translated
	 * @param $boxes \array The array from which the thumbnail helper is removed
	 * @return \bool true
	 */
	public static function removeQQQ( $group, $handle, &$boxes ) {
		if( !( $group instanceof SVGMessageGroup ) ) {
			return true;
		}

		unset( $boxes['documentation'] );
		return true;
	}

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

	/**
	 * Function used to preload properties via the TranslatePrefillTranslation hook
	 *
	 * @param $properties \string To be filled with the preloaded property string
	 * @param $key \string Key of the message.
	 * @param $group \MessageGroup Message group concerned.
	 * @return \bool true
	 */
	public static function getDefaultPropertiesFromGroup( &$properties, $handle ) {
		$group = $handle->getGroup();
		if( !( $group instanceof SVGMessageGroup || $properties !== null ) ) {
			return true;
		}
		$properties = $group->getProperties(
			$handle->getKey(),
			$group->getSourceLanguage()
		);
		return true;
	}

	/**
	 * Function used to convert a message that includes a property string
	 * to one that does not, then using the extracted properties to generate
	 * a series of HTML form elements (extraInputs). Used for the
	 * TranslateGetExtraInputs hook.
	 *
	 * @param $message \string Input/output translation string, passed by reference
	 * @param $extraInputs \string Extra form elements required
	 * @return \bool true
	 */
	public static function propertiesToExtraInputs( &$message, &$extraInputs ) {
		global $wgTranslateSvgTypefaces, $wgTranslateSvgColors;
		$allowedUnits = array( 'px', 'pt', '%', 'em' );

		if( !TranslateSvgUtils::hasPropertyString( $message ) ) {
			return true;
		}

		$propertyString = TranslateSvgUtils::extractPropertyString( $message );
		$message = TranslateSvgUtils::stripPropertyString( $message );

		preg_match_all( '/\| *([a-z-]+) *= *([^|}]*)/', $propertyString, $parameters );
		$count = count( $parameters[0] );
		for( $i = 0; $i < $count; $i++ ) {
			$index = $parameters[1][$i];
			$currentValue = trim( $parameters[2][$i] );
			switch( $index ) {
				case 'x':
				case 'y':
				case 'font-size':
					$br = ( $index == 'x' ) ? '' : Xml::element( 'br' );
					$extraInputs .= Xml::inputLabel(
						wfMsg( 'translate-js-label-' . $index ),
						'mw-translate-prop-'.$index, 'mw-translate-prop-'.$index, 2, $currentValue,
						array( 'type' => 'number', 'step' => 'any', 'style' => 'width:3em;' )
					) . "&#160;";
					break;
				case 'font-family':
					$typefaces = $wgTranslateSvgTypefaces;
					if( $currentValue == 'inherit' ) {
						$currentValue = wfMsg( 'translate-js-font-family-inherit' );
					}
					if( !in_array( $currentValue, $typefaces ) ) {
						$typefaces[] = $currentValue;
					}
					$extraInputs .= Xml::label(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index ) .
						"&#160;" . Xml::listDropDown( 'mw-translate-prop-'.$index, implode( "\n", $wgTranslateSvgTypefaces ),
						wfMsg( 'translate-js-font-family-inherit' ), $currentValue
					) . "&#160;";
					break;
				case 'units':
					$extraInputs .= Xml::label(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index ) .
						"&#160;" . Xml::listDropDown( 'mw-translate-prop-'.$index, implode( "\n", $allowedUnits ),
						'', $currentValue
					) . "&#160;";
					break;
				case 'bold':
				case 'italic':
				case 'underline':
					$checked = ( $currentValue === 'yes' );
					$extraInputs .= Html::openElement( 'span', array( 'style' => 'white-space:nowrap;' ) )
					. Xml::checkLabel(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index, 'mw-translate-prop-'.$index, $checked
					) . Html::closeElement( 'span' ) . " ";
					break;
				case 'color':
					$colors = $wgTranslateSvgColors;
					$colors[] = $currentValue;
					$extraInputs .= Xml::label(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index ) .
						"&#160;" . Xml::listDropDown( 'mw-translate-prop-'.$index, implode( "\n", $colors ),
						'', $currentValue
					) . "&#160;";
					break;
			}
		}

		$extraInputs = Xml::fieldset(
			wfMessage( 'translate-js-properties-legend' ),
			$extraInputs
		);

		return true;
	}

	/**
	 * Function that replaces a message with a no-property-string version.
	 * Used for the TranslateFormatMessageBeforeTable hook
	 *
	 * @param &$message \string Message which may or may not include a property string
	 * @param $m \ThinMessage The source message object
	 * @param $group \MessageGroup The source message group
	 * @param $targetLanguage \string The language for which translations are being shown
	 * @param &$attributes \array The set of attributes to apply to the row (not used)
	 * @return \bool true
	 */
	public static function stripPropertyString( &$message, $m, $group, $targetLang, &$attributes ) {
		// TODO: mark as .justtranslated if not yet exported
		if( !( $group instanceof SVGMessageGroup ) ) {
			return true;
		}

		$message = TranslateSvgUtils::stripPropertyString( $message );
		return true;
	}

	/**
	 * Function used to expose the $wgTranslateSvgTemplateName global to
	 * JavaScript via the MakeGlobalVariablesScript hook
	 *
	 * @return \bool true
	 */
	public static function exposeTranslateSvgTemplateName( &$vars ) {
		global $wgTitle, $wgTranslateSvgTemplateName;
		if( $wgTitle->isSpecial( 'Translate' ) ){
			$vars['wgTranslateSvgTemplateName'] = $wgTranslateSvgTemplateName;
		}
		return true;
	}
}