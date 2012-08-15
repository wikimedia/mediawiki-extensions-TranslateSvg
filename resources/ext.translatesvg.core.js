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

			mw.translateHooks.add( 'beforeSubmit', function ( form ) {
				// Add properties from other inputs back into main translations
				var textarea = form.find( '.mw-translate-edit-area' );
				tsvgLoader.oldValue = textarea.val();
				textarea.val( tsvgLoader.oldValue + tsvgLoader.propertiesToString( form ) );
				form.parents( '.ui-dialog' ).hide();
				return true;
			} );
			mw.translateHooks.add( 'afterSubmit', function ( form ) {
				// ...and remove them again to avoid duplication / user confusion
				form.find( '.mw-translate-edit-area' ).val( tsvgLoader.oldValue );
				return true;
			} );
			mw.translateHooks.add( 'afterRegisterFeatures', function ( form ) {
				// Initialise colourPicker UI
				form.find( '#mw-translate-prop-color' ).colorPicker();
				var colorPicker = form.find( '#mw-translate-prop-color' );
				if( colorPicker.val() === 'other' ){
					colorPicker.val( '' );
				}
				return true;
			} );
		},
		propertiesToString: function ( form ) {
			// Function builds a string (propertyString) from the content of a
			// series of form inputs, following certain rules
			var propertyString = '';
			form.find( '[id^="mw-translate-prop-"]' ).each( function () {
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
		}
	};
	$( document ).ready( function () {
		var tsvgLoader = new TranslateSvgLoader();
		window.tsvgLoader = tsvgLoader;
		tsvgLoader.init();
	} );
}( mediaWiki, jQuery ) );
