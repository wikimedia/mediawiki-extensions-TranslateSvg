/**
 * This file contains basic JavaScript for the TranslateSvg extension, relating to
 * Special:Translate.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
( function ( mw, $ ) {
	var TranslateSvgLoader = function () {
		// Placeholder; note that 'this' can (and should) be used here safely
		this.oldValue = '';
	};
	TranslateSvgLoader.prototype = {
		// Everything in here will get transferred to every instance returned
		// from the constructor above.
		init: function () {
			if ( $( 'fieldset.mw-sp-translate-settings' ).data( 'grouptype' ) !== 'SVGMessageGroup' ) {
				// Not translating an SVG file
				return;
			}

			$( '#ca-mstats a' ).text( mw.msg( 'translate-taction-mstats-svgmg' ) );
			$( '#ca-export a' ).text( mw.msg( 'translate-taction-export-svgmg' ) );
			$( '.mw-sp-translate-description legend').text( mw.msg( 'translate-page-description-legend-svgmg' ) );

			mw.translateHooks.add( 'beforeSubmit', function ( $form ) {
				// Add properties from other inputs back into main translations
				var textarea = $form.find( '.mw-translate-edit-area' );
				tsvgLoader.oldValue = textarea.val();
				textarea.val( tsvgLoader.oldValue + tsvgLoader.propertiesToString( $form ) );
				$form.parents( '.ui-dialog' ).hide();
				return true;
			} );
			mw.translateHooks.add( 'afterSubmit', function ( $form ) {
				// ...and remove them again to avoid duplication / user confusion
				$form.find( '.mw-translate-edit-area' ).val( tsvgLoader.oldValue );
				return true;
			} );
			mw.translateHooks.add( 'afterRegisterFeatures', function ( $form ) {
				// Initialise colourPicker UI
				$form.find( '#mw-translate-prop-color' ).colorPicker();
				var colorPicker = $form.find( '#mw-translate-prop-color' );
				if( colorPicker.val() === 'other' ){
					colorPicker.val( '' );
				}

				// Add thumbnail update events. The duplication is intentional;
				// e.g. to account for copy-paste, or the fact that type="number" is
				// textual in some browsers but has increment/decrement buttons in others.
				$form.find(
					'.mw-translate-inputs textarea,' +
					'.mw-translate-inputs input[type="number"],' +
					'.mw-translate-inputs input[type="text"]'
				).keyup( function () { tsvgLoader.updateThumbnailDelayed( $form ); } );
				$form.find(
					'.mw-translate-inputs select,' +
					'.mw-translate-inputs input[type="checkbox"],' +
					'.mw-translate-inputs input[type="number"],' +
					'.mw-translate-inputs input[type="text"]'
				).change( function () { tsvgLoader.updateThumbnail( $form ); } );

				// Update the thumbnail now for good measure
				tsvgLoader.updateThumbnail( $form );
				return true;
			} );
		},
		propertiesToString: function ( $form ) {
			// Function builds a string (propertyString) from the content of a
			// series of form inputs, following certain rules
			var propertyString = '';
			$form.find( '[id^="mw-translate-prop-"]' ).each( function () {
				var value = $( this ).val();
				if ( $( this ).attr( 'type' ) === 'checkbox' ) {
					value = $( this ).attr( 'checked' ) ? "yes" : "no";
				}
				var name = $( this ).attr( 'id' ).replace( 'mw-translate-prop-', '' );
				propertyString += '|' + name + '=' + value;
			} );
			if ( propertyString === '' ) {
				return propertyString;
			}
			return '{{'
				+ mw.config.get( 'wgTranslateSvgTemplateName' )
				+ propertyString
				+ '}}';
		},
		updateThumbnailDelayed: function ( $form ) {
			// Wrapper for updateThumbnail() that ensures it gets called no more
			// than 5 times a second
			window.clearTimeout( tsvgLoader.updateThumbnailTimer );
			tsvgLoader.updateThumbnailTimer = window.setTimeout(
				function () { tsvgLoader.updateThumbnail($form) }, 200
			);
		},
		updateThumbnail: function ( $form ) {
			// Generate a live thumbnail and show it
			var textarea = $form.find( '.mw-translate-edit-area' );
			var name = $form.find( 'input[name="title"]' ).val();
			if ( name === undefined || name.split( '/' ).length !== 3 ) {
				// Somehow this has been called on the wrong form
				return;
			}
			var identifiers = name.split( '/' );

			// Create and set inprogress[identifier][langcode]
			var overrideValue = $( textarea ).val() + tsvgLoader.propertiesToString( $form );
			var inprogress = {};
			inprogress[identifiers[1]] = {};
			inprogress[identifiers[1]][identifiers[2]] = overrideValue;

			var group = identifiers[0];
			group = group.substr( group.indexOf( ':' ) + 1 ).replace( '_', ' ' );
			var api = new mw.Api();
			api.get( {
				action: 'query',
				meta: 'messagegroups',
				mgprop: 'thumbnail',
				mgfilter: group,
				mglanguage: identifiers[2],
				mginprogress: JSON.stringify( inprogress )
			}, {
				ok: function ( data ) {
					// The extension ensures data.query.messagegroups[0].thumbnail.success exists
					if ( data.query.messagegroups[0].thumbnail.success ) {
						var newSrc = data.query.messagegroups[0].thumbnail.message;
						$form.find( '.mw-sp-translate-edit-fields a.image img').attr( 'src', newSrc );
					}
				}
			} );
		}
	};
	$( document ).ready( function () {
		var tsvgLoader = new TranslateSvgLoader();
		window.tsvgLoader = tsvgLoader;
		tsvgLoader.init();
	} );
}( mediaWiki, jQuery ) );
