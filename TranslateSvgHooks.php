<?php
/**
 * Contains class with hook functions for the TranslateSvg extension
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright � 2012, Harry Burt
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
	public static function addThumbnail( $group, $handle, &$boxes ) {
		global $wgLang;

		if( !( $group instanceof SVGMessageGroup ) ) {
			return true;
		}

		$title = explode( '/', $handle->getTitle()->getText() );
		$language = $title[2];
		$title = Title::newFromText( $title[0], NS_FILE );
		$file = wfFindFile( $title );
		$writer = new SVGFormatWriter( $group );

		$thumbnail = Linker::makeThumbLinkObj(
			$title, $file, wfMessage( 'translate-svg-js-thumbnail' ), '', $wgLang->alignEnd(),
			array( 'width' => 275, 'height' => 275 )
		);
		$newThumbnail = $writer->thumbnailExport( $language );
		$thumbnail =  preg_replace( '/\<img .*?\/>/', $newThumbnail, $thumbnail, 1 );
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
	 * TranslatePrefillTranslation hook
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
	 * @param $handle \MessageHandle Message handle of the message in question.
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
		global $wgTranslateSVGTypefaces;
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
					if( $currentValue == 'inherit' ) {
						$currentValue = wfMsg( 'translate-js-font-family-inherit' );
					}
					$extraInputs .= Xml::label(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index ) .
						"&#160;" . Xml::listDropDown( 'mw-translate-prop-'.$index, implode( "\n", $wgTranslateSVGTypefaces ),
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
					$extraInputs .= Xml::checkLabel(
						wfMsg( 'translate-js-label-' . $index ), 'mw-translate-prop-'.$index, 'mw-translate-prop-'.$index, $checked
					) . "&#160;";
					break;
				case 'color':
					$colors = TranslateSvgUtils::getColorArray();
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
	 * @param $translation The current translation (not used)
	 * @param $original The fallback if translation is null (not used)
	 * @param &$attributes The set of attributes to apply to the row (not used)
	 * @return \bool true
	 */
	public static function stripPropertyString( &$message, $translation, $original, &$attributes ) {
		// TODO: mark as .justtranslated if not yet exported
		$message = TranslateSvgUtils::stripPropertyString( $message );
		return true;
	}

	/**
	 * Function used to make "export as SVG" the default export option for SVG files
	 *
	 * @param $defaults \array Associative array of so-called "default" values supplied by Translate
	 * @param $defaults \array Associative array of so-called "non-default" values supplied by Translate
	 * @return \bool true
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
	 * Function used to make "view all translations" the default view option for SVG files
	 *
	 * @param $defaults \array Associative array of so-called "default" values supplied by Translate
	 * @param $defaults \array Associative array of so-called "non-default" values supplied by Translate
	 * @return \bool true
	 */
	public static function makeViewAllOptionDefault( &$defaults, &$nondefaults ) {
		if( isset( $nondefaults['group'] )
			&& MessageGroups::getGroup( $nondefaults['group'] ) instanceof SVGMessageGroup
			&& isset( $defaults['taction'] )
			&& $defaults['taction'] == 'translate' ) {
			$defaults['task'] = 'view';
		}
		return true;
	}

	public static function makeThumbnailPage( $parameters, $group ) {
		global $wgOut, $wgRequest;

		if( $parameters !== 'thumbnailpage' || !$group ) {
			return true;
		}
		$wgOut->disable();

		$overrides = array();
		$get = $wgRequest->getQueryValues();
		foreach( $get as $name => $value ) {
			if( preg_match( '/^override\/([^\/]+)\/([a-z-]{0,10})$/', $name, $result ) ) {
				$overrides[$result[1]][$result[2]] = $value;
			}
		}

		$writer = new SVGFormatWriter( $group, $overrides );
		echo $writer->thumbnailExport( $wgRequest->getVal( 'language' ) );
		return false;
	}

	public static function exposeTranslateSvgTemplateName( &$vars ) {
		global $wgTitle, $wgTranslateSvgTemplateName;
		if( $wgTitle->getFullText() === 'Special:Translate' ){
			$vars['wgTranslateSvgTemplateName'] = $wgTranslateSvgTemplateName;
		}
		return true;
	}
	
	public static function updateFileDescriptionPages( $out ) {
		$title = $out->getTitle();
		if( TranslateSvgUtils::isSVGFilePage( $title ) ) {
			$out->addModules( 'ext.translatesvg.filepage' );
		}
		return true;
	}

	public static function makeFilePageGlobalVariables( &$vars ) {
		global $wgTitle, $wgLanguageNames, $wgUser;

		if( !TranslateSvgUtils::isSVGFilePage( $wgTitle ) ) {
			return true;
		}

		$vars['wgUserLanguageName'] = Language::fetchLanguageName(
			$wgUser->getOption( 'language' )
		);
		$vars['wgUserCanTranslate'] = $wgUser->isAllowed( 'translate' );

		$messageGroup = new SVGMessageGroup( $wgTitle->getText() );
		$reader = new SVGFormatReader( $messageGroup );				
		$vars['wgFileCanBeTranslated'] = ( $reader && $reader->makeTranslationReady() );
		if( !$vars['wgFileCanBeTranslated'] ) {
			$vars['wgFileFullTranslations'] = array();
			$vars['wgFilePartialTranslations'] = array();
			return true;
		}

		$languages = $reader->getSavedLanguages();
		$full = array();
		$partial = array();
		foreach( $languages['full'] as $language ) {
			if( $language !== 'fallback' ) {
				array_push( $full, array(
					'name' => Language::fetchLanguageName( $language ),
					'code' => $language
				) );
			}
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

	public static function mimicSVGGroup( &$group, $id ) {
		// Is this an SVG?
		if( substr( $id, -4 ) !== '.svg' ) {
			return true;
		}

		// Does this represent a file that exists?
		$title = Title::newFromText( $id, NS_FILE );
		if( !$title->exists() ) {
			return true;
		}
		$file = wfFindFile( $title );
		if( !$file->exists() ) {
			return true;
		}

		// Looks like we'll mimic an SVG group then
		$group = new SVGMessageGroup( $id );
		// TODO: Next alwats evaluates to true at present
		if( !isset( $wgTranslateCC[ $id ] ) ){
			if( !$group->importTranslations() ) {
				$group =  null;
			}
		}
		return true;
	}

	public static function checkTranslationIntegrity( $file, $reupload, $exists ) {
		global $wgTranslateSvgBotName;

		if( !$reupload || !$exists ) {
			return true;
		}

		$title = $file->getTitle();
		if( !TranslateSvgUtils::isSVGFilePage( $title ) ) {
			return true;			
		}

		$messageGroup = new SVGMessageGroup( $title->getText() );
		$reader = new SVGFormatReader( $messageGroup );
		if( !$reader ) {
			return true;
		}
		$previousTranslations = $reader->getOnWikiTranslations();
		$newTranslations = $reader->getInFileTranslations();

		// Has this actually been through the translation process yet?
		if( count( $previousTranslations ) === 0 ) {
			return true;
		}

		// For an accurate comparison, see how the new one would be if they
		// had been roundtripped without changing them.
		foreach( $newTranslations as $key => &$languages ) {
			foreach( $languages as $language => &$array ) {
				$array = TranslateSvgUtils::translationToArray(
					TranslateSvgUtils::arrayToTranslation( $array )
				);
			}
		}

		if( $previousTranslations == $newTranslations ) {
			// No change (order doesn't matter here)
			return true;
		}

		$bot = User::newFromName( $wgTranslateSvgBotName, false );
		$ns = $messageGroup->getNamespace();

		// We can divide changes into three categories: added, modified, removed
		// Added will be covered by a simple import
		$added = array_diff(
			array_keys( $newTranslations ),
			array_keys( $previousTranslations )
		);
		if( count( $added ) > 0 ) {
			$messageGroup->importTranslations();
		}

		// Removed need deleting
		$removed = array_diff(
			array_keys( $previousTranslations ),
			array_keys( $newTranslations )
		);
		foreach( $removed as $key ) {
			$pageName = $title->getText() . '/' . $key;
			$subpages = Title::makeTitleSafe( $ns, $pageName )->getSubpages();
			foreach( $subpages as $subpage ) {
				$wikiPage = new WikiPage( $subpage );
				$reason = wfMessage( 'translate-svg-autodelete' )->inContentLanguage()->text();
				$wikiPage->doDeleteArticleReal( $reason, false, 0, true, $error, $bot );
			}
		}

		// Modified need updating/fuzzying
		$maybeModified = array_intersect(
			array_keys( $previousTranslations ),
			array_keys( $newTranslations )
		);
		foreach( $maybeModified as $key ) {
			$old = $previousTranslations[$key]['fallback'];
			$new = $newTranslations[$key]['fallback'];
			if( $old == $new ) {
				continue;
			}
			// Some change to definition, update that page onwiki
			$definitionName = $title->getText()
				. '/' . $key
				. '/' . $messageGroup->getSourceLanguage();
			$definitionTitle = Title::makeTitleSafe( $ns, $definitionName );
			$definitionWikiPage = new WikiPage( $definitionTitle );
			$newText = TranslateSvgUtils::arrayToTranslation( $new );
			$summary = wfMessage( 'translate-svg-autoedit' )->inContentLanguage();
			$definitionWikiPage->doEdit( $newText, $summary, 0, false, $bot );
			
			// If it's the text that's changed, fuzzy other messages
			// If it's not, there's nothing we can reliably do
			if( $old['text'] !== $new['text'] ) {
				$subpages = Title::makeTitleSafe( $ns, $definitionName )->getSubpages();
				foreach( $subpages as $subpage ) {
					if( $subpage->getText() === $definitionName ) {
						continue;
					}
					$wikiPage = new WikiPage( $subpage );
					$newText = $wikiPage->getText();
					$newText .= TRANSLATE_FUZZY;
					$reason = wfMessage( 'translate-svg-autofuzzy' )->inContentLanguage()->text();
					$wikiPage->doEdit( $newText, $summary, 0, false, $bot );
				}
			}
		}

		return true;
	}
}