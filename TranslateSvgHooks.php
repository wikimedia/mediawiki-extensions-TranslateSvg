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
	 * @return \bool True
	 */
	public static function addThumbnail( MessageGroup $group, MessageHandle $handle, &$boxes ) {
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
	 * @param $group \MessageGroup The message group to which the message being translated belongs
	 * @param $handle \MessageHandle The MessageHandle of the message being translated
	 * @param $boxes \array The array from which the thumbnail helper is removed
	 * @return \bool True
	 */
	public static function removeQQQ( MessageGroup $group, MessageHandle $handle, &$boxes ) {
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
	 * @param $modules \array The current array of modules
	 * @return \bool True
	 */
	public static function addModules( &$modules ) {
		$modules[] = 'ext.translatesvg';
		return true;
	}

	/**
	 * Function used to preload properties via the TranslatePrefillTranslation hook
	 *
	 * @param $properties \string To be filled with the preloaded property string
	 * @param $handle \MessageHandle $handle
	 * @return \bool True
	 */
	public static function getDefaultPropertiesFromGroup( &$properties, MessageHandle $handle ) {
		if( !$handle->isValid() ) return true;

		$group = $handle->getGroup();
		if( !( $group instanceof SVGMessageGroup ) || $properties !== null ) {
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
	 * @return \bool True
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
					$extraInputs .= Xml::inputLabel(
						wfMessage( 'translate-js-label-' . $index )->text(),
						'mw-translate-prop-'.$index, 'mw-translate-prop-'.$index, 2, $currentValue,
						array( 'type' => 'number', 'step' => 'any', 'style' => 'width:3em;' )
					) . "&#160;";
					break;
				case 'font-family':
					$typefaces = $wgTranslateSvgTypefaces;
					if( $currentValue == 'inherit' ) {
						$currentValue = wfMessage( 'translate-js-font-family-inherit' )->text();
					}
					if( !in_array( $currentValue, $typefaces ) ) {
						$typefaces[] = $currentValue;
					}
					$extraInputs .= Xml::label(
						wfMessage( 'translate-js-label-' . $index )->text(), 'mw-translate-prop-'.$index ) .
						"&#160;" . Xml::listDropDown( 'mw-translate-prop-'.$index, implode( "\n", $wgTranslateSvgTypefaces ),
						wfMessage( 'translate-js-font-family-inherit' )->text(), $currentValue
					) . "&#160;";
					break;
				case 'units':
					$extraInputs .= Xml::label(
						wfMessage( 'translate-js-label-' . $index )->text(),
						'mw-translate-prop-'.$index ) .
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
							wfMessage( 'translate-js-label-' . $index )->text(),
							'mw-translate-prop-'.$index, 'mw-translate-prop-'.$index, $checked
					) . Html::closeElement( 'span' ) . " ";
					break;
				case 'color':
					$colors = $wgTranslateSvgColors;
					$colors[] = $currentValue;
					$extraInputs .= Xml::label(
						wfMessage( 'translate-js-label-' . $index )->text(), 'mw-translate-prop-'.$index ) .
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
	 * @param $targetLang \string The language for which translations are being shown
	 * @param &$attrs \array The set of attributes to apply to the row (not used)
	 * @return \bool True
	 */
	public static function stripPropertyString( &$message, ThinMessage $m, MessageGroup $group, $targetLang, &$attrs ) {
		// TODO: mark as .justtranslated if not yet exported
		if( !( $group instanceof SVGMessageGroup ) ) {
			return true;
		}

		$message = TranslateSvgUtils::stripPropertyString( $message );
		return true;
	}

	/**
	 * Function used to expose the $wgTranslateSvgTemplateName global to
	 * JavaScript via the MakeGlobalVariablesScript MediaWiki hook
	 *
	 * @param &$vars \array of variables to be exposed to JavaScript
	 * @param $out \OutputPage Contextual OutputPage instance
	 * @return \bool True
	 */
	public static function exposeTranslateSvgTemplateName( &$vars, OutputPage $out ) {
		global $wgTranslateSvgTemplateName;
		if( $out->getTitle()->isSpecial( 'Translate' ) ){
			$vars['wgTranslateSvgTemplateName'] = $wgTranslateSvgTemplateName;
		}
		return true;
	}

	/**
	 * Function used to make "export as SVG" the default export option for SVG files
	 * Used with the TranslateGetSpecialTranslateOptions hook
	 *
	 * @param $defaults \array Associative array of so-called "default" values supplied by Translate
	 * @param $nondefaults \array Associative array of so-called "non-default" values supplied by Translate
	 * @return \bool True
	 */
	public static function makeExportAsSvgOptionDefault( &$defaults, &$nondefaults ) {
		if( isset( $nondefaults['group'] )
			&& MessageGroups::getGroup( $nondefaults['group'] ) instanceof SVGMessageGroup
			&& isset( $nondefaults['taction'] )
			&& $nondefaults['taction'] == 'export' ) {
			$nondefaults['task'] = 'export-as-svg';
		}
		return true;
	}

	/**
	 * Define the thumbnail property for use with the mgprop parameter of
	 * action=query&meta=messagegroups API queries.
	 * Used with the TranslateGetAPIMessageGroupsPropertyDescs hook
	 *
	 * @param \array $properties An associative array of properties (name => details)
	 * @return \bool True
	 */
	public static function addAPIProperties( &$properties ) {
		$properties['thumbnail'] = ' thumbnail    - Include URL of up-to-date thumbnail (SVG message groups only)';
		return true;
	}

	/**
	 * Function used to add TranslateSvg's schema update to update.php via
	 * MediaWiki's 'LoadExtensionSchemaUpdates' hook.
	 *
	 * @param $updater DatabaseUpdater The MediaWiki-provided updater instance
	 * @return \bool True
	 */
	public static function schemaUpdates( $updater ) {
		$dir = __DIR__ . '/sql';

		$updater->addExtensionUpdate( array( 'addTable', 'translate_svg', "$dir/translate_svg.sql", true ) );
		return true;
	}

	/*
	 * Function used to add modules via the resource loader on
	 * the file pages of SVG files via the BeforePageDisplay MediaWiki hook
	 *
	 * @param $out Contextual OutputPage instance
	 * @return \bool
	 */
	public static function updateFileDescriptionPages( OutputPage $out ) {
		$title = $out->getTitle();
		if( TranslateSvgUtils::isSVGFilePage( $title ) ) {
			$out->addModules( 'ext.translatesvg.filepage' );
		}
		return true;
	}

	/**
	 * Process the thumbnail property for use with the mgprop parameter of
	 * action=query&meta=messagegroups API queries.
	 * Used with the TranslateProcessAPIMessageGroupsProperties hook
	 *
	 * @param $a \array Associative array of the properties of $group that will be returned
	 * @param $props \array Associative array ($name => true) of properties the user has specifically requested
	 * @param $params \array Parameter input by the user (unprefixed name => value)
	 * @param $g \MessageGroup The group in question
	 * @return \bool True
	 */
	public static function processAPIProperties( &$a, $props, $params, MessageGroup $g ) {
		if( !( $g instanceof SVGMessageGroup ) ) {
			return true;
		}

		if( isset( $props['thumbnail'] ) ) {
			$language = isset( $params['language'] ) ?
				$params['language'] : $g->getSourceLanguage();

			$overrides = array();
			if( isset( $params['overrides'] ) ) {
				$overrides = json_decode( $params['overrides'], true );
			}

			$writer = new SVGFormatWriter( $g, $overrides );
			$a['thumbnail'] = $writer->thumbnailExport( $language );
		}
		return true;
	}

	/**
	 * Define mgoverrides and mglanguage parameters for use with
	 * action=query&meta=messagegroups API queries.
	 * Used with the TranslateGetAPIMessageGroupsParameterList hook
	 *
	 * @param $params \array An associative array of possible parameters (name => details)
	 * @return \bool True
	 */
	public static function addAPIParams( &$params ) {
		$params['overrides'] = array(
			ApiBase::PARAM_TYPE => 'string'
		);
		$params['language'] = array(
			ApiBase::PARAM_TYPE => 'string'
		);
		return true;
	}

	/**
	 * Document the mgoverrides and mglanguage parameters
	 * Used with the TranslateGetAPIMessageGroupsParameterDescs hook
	 *
	 * @param $paramDescs \array An associative array of parameters, name => description.
	 * @param $p \string The prefix for action=query&meta=messagegroups (unused)
	 * @return \bool True
	 */
	public static function addAPIParamDescs( &$paramDescs, $p ) {
		$paramDescs['overrides'] =
			'Possible array of overriddes (unsaved translations that should take preference'
			. ' over saved ones). SVG message groups only.';
		$paramDescs['language'] =
			'Language to render the thumbnail in. SVG message groups only.';
		return true;
	}

	/**
	 * Function used to load groups registered by TranslateSvg into the
	 * lists generated by Translate. Uses the 'TranslatePostInitGroups' hook.
	 *
	 * @param &$list \array Array of groups to append to.
	 * @param &$deps \array Not used at present.
	 * @param &$autoload \array Not used at present.
	 * @return \bool True
	 */
	public static function loadSVGGroups( &$list, &$deps, &$autoload ) {
		$dbr = wfGetDB( DB_MASTER );

		$tables = array( 'translate_svg', 'page' );
		$col = '*';
		$conds = array( 'page_id = ts_page_id' );
		$res = $dbr->select( $tables, $col, $conds, __METHOD__ );

		foreach ( $res as $r ) {
			// Get a sanitised, normalised form of the title
			$group = Title::newFromRow( $r )->getText();
			$list[$group] = new SVGMessageGroup( $group );
		}
		return true;
	}

	/**
	 * Function used to expose various new globals to the
	 * JavaScript of the file description pages of SVG files
	 * via the MakeGlobalVariablesScript MediaWiki hook.
	 *
	 * @param &$vars \array Array of variables to be exposed to JavaScript
	 * @param $out \OutputPage Contextual OutputPage instance
	 * @return \bool True
	 */
	public static function makeFilePageGlobalVariables( &$vars, OutputPage $out ) {
		$title = $out->getTitle();
		if( !TranslateSvgUtils::isSVGFilePage( $title ) ) {
			return true;
		}

		$user = $out->getUser();
		$vars['wgUserLanguageName'] = Language::fetchLanguageName(
			$user->getOption( 'language' )
		);
		$vars['wgUserCanTranslate'] = $user->isAllowed( 'translate' );

		$id = $title->getText();
		$messageGroup = new SVGMessageGroup( $id );
		$reader = new SVGFormatReader( $messageGroup );
		$vars['wgFileCanBeTranslated'] = ( $reader !== null );
		if( !$vars['wgFileCanBeTranslated'] || !MessageGroups::getGroup( $id ) ) {
			// Not translatable or not yet translated, let's save time and return immediately
			$vars['wgFileFullTranslations'] = array();
			$vars['wgFilePartialTranslations'] = array();
			return true;
		}

		$languages = $reader->getSavedLanguagesFiltered();
		$full = array();
		$partial = array();
		foreach( $languages['full'] as $language ) {
			array_push( $full, array(
				'name' => Language::fetchLanguageName( $language ),
				'code' => $language
			) );
		}
		foreach( $languages['partial'] as $language ) {
			array_push( $partial, array(
				'name' => Language::fetchLanguageName( $language ),
				'code' => $language
			) );
		}
		$vars['wgFileFullTranslations'] = $full;
		$vars['wgFilePartialTranslations'] = $partial;
		return true;
	}
}
