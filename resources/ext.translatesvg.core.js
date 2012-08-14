( function ( mw, $ ) {
	mw.translateSvg = {
		oldValue: '',
		updateThumbnailTimer : 0,
		dialogWidth: false,
		init: function () {
			if ( $( 'fieldset.mw-sp-translate-settings' ).data( 'grouptype' ) !== 'SVGMessageGroup' ) {
				// Not translating an SVG file
				return;
			}

			mw.translateHooks.add( 'beforeSubmit', function ( form ) {
				// Add properties from other inputs back into main translations
				var textarea = form.find( '.mw-translate-edit-area' );
				mw.translateSvg.oldValue = textarea.val();
				textarea.val( mw.translateSvg.oldValue + mw.translateSvg.propertiesToString( form ) );
				form.parents( '.ui-dialog' ).hide();
				return true;
			} );
			mw.translateHooks.add( 'afterSubmit', function ( form ) {
				// ...and remove them again to avoid duplication / user confusion
				form.find( '.mw-translate-edit-area' ).val( mw.translateSvg.oldValue );
				return true;
			} );
			mw.translateHooks.add( 'afterRegisterFeatures', function ( form ) {
				// Initialise colourPicker UI
				form.find( '#mw-translate-prop-color' ).colorPicker();
				var colorPicker = form.find( '#mw-translate-prop-color' );
				if( colorPicker.val() === 'other' ){
					colorPicker.val( '' );
				}
				form.find( '.mw-translate-inputs textarea,input[type="number"],input[type="text"]' )
					.keyup( function () { mw.translateSvg.updateThumbnailDelayed( form ); } );
				form.find( '.mw-translate-inputs input[type="number"],input[type="text"]' )
					.each( function() {
						var preferredWidth = Math.round( ( $( this ).val().length * 7 / 12 ) + 1 );
						$( this ).css( 'width', Math.max( preferredWidth, 3 ) + 'em' );
					} );
				form.find( '.mw-translate-inputs input[type="text"]' )
					.change( function () { mw.translateSvg.updateThumbnailDelayed( form ); } );
				form.find( '.mw-translate-inputs input[type="checkbox"],[type="number"]' )
					.change( function () { mw.translateSvg.updateThumbnail( form ); } );
				form.find( '.mw-translate-inputs select' )
					.change( function () { mw.translateSvg.updateThumbnail( form ); } );

				form.submit( mw.translateSvg.addUnsavedWarning );
				return true;
			} );

			// Make Translate's interface more beginner-friendly
			$( '#ca-mstats a' ).text( mw.msg( 'translate-taction-mstats-svgmg' ) );
			$( '#ca-export a' ).text( mw.msg( 'translate-taction-export-svgmg' ) );
			$( '.mw-sp-translate-description legend' ).text( mw.msg( 'translate-page-description-legend-svgmg' ) );
			$( '.mw-sp-translate-table th' ).first().text( mw.msg( 'translate-svg-table-header' ) );
			$( 'fieldset.mw-sp-translate-settings label' ).each( function () {
				if( $( this ).find( 'select#language' ).length !== 1 ){
					$( this ).hide();
				}
			} );
			$( 'fieldset.mw-sp-translate-settings input[type="submit"]' ).css( 'margin-top', '-28px' );
			$( '.mw-sp-translate-table td:first-child a:first-child' ).css( 'visibility', 'hidden' );

			// If no cookie, show intro dialog
			mw.translateSvg.dialogWidth = $( window ).width() * 0.8;
			if( $.cookie( 'TranslateSvgInstructions' ) === null ) {
				var id = 'translatesvg-instructions';
				var dialog = $( '<div>' ).attr( 'id', id ).appendTo( $( 'body' ) );
				$( '<a>' )
					.attr( 'href', 'https://commons.wikimedia.org/wiki/File:Commons-emblem-notice.svg' )
					.append( $( '<img>' )
						.addClass( 'infoimage' )
						.attr( 'width', 80 )
						.attr( 'height', 80 )
						.attr( 'src', '//upload.wikimedia.org/wikipedia/commons/thumb/2/28/Commons-emblem-notice.svg/80px-Commons-emblem-notice.svg.png' )
					)
					.appendTo( dialog );
				$( '<p>' )
					.html( mw.msg(
						'translate-svg-instructions-desc',
						mw.msg( 'translate-js-save' ),
						mw.msg( 'translate-js-next' ),
						mw.msg( 'translate-taction-export-svgmg' )
					) )
					.appendTo( dialog );
				dialog.dialog( {
					modal: true,
					beforeClose: function() {
						$.cookie( 'TranslateSvgInstructions', 'true', {
							expires: 365, // expires in 365 days
							path: '/'
						} );
					},
					bgiframe: true,
					width: mw.translateSvg.dialogWidth,
					title: mw.msg( 'translate-svg-instructions-title' ),
					position: 'center',
					resize: function() { $( '#' + id + ' textarea' ).width( '100%' ); },
					resizeStop: function() { mw.translateSvg.dialogWidth = $( '#' + id ).width(); },
				} );
			}

			// If required, show chooselanguage dialog box
			if( mw.util.getParamValue( 'chooselanguage' ) !== null ){
				var id = 'translatesvg-chooselanguage';
				var dialog = $( '<div>' ).attr( 'id', id ).appendTo( $( 'body' ) );
				var fieldset = $( '.mw-sp-translate-settings' )
					.css( 'margin-bottom', '0' )
					.css( 'margin-top', '0' )
					.css( 'padding-top', '8px' ) 
					.appendTo( dialog );
				var form = fieldset.find( 'form' ).last();
				var select = form.find( 'select#language' );
				select.parent().remove();
				select.prependTo( form );
				$( '<label>' ).attr( 'for', 'language' )
					.text( mw.msg( 'translate-svg-chooselanguage-desc' ) )
					.prependTo( form );
				form.find( 'input[type="submit"]' )
					.css( 'margin-top', '-30px' )
					.val( mw.msg( 'go' ) );

				dialog.dialog( {
					modal: true,
					bgiframe: true,
					width: mw.translateSvg.dialogWidth,
					title: mw.msg( 'translate-svg-chooselanguage-title' ),
					position: 'center',
					resize: function() { $( '#' + id + ' textarea' ).width( '100%' ); },
					resizeStop: function() { mw.translateSvg.dialogWidth = $( '#' + id ).width(); },
				} );
			}
		},

		propertiesToString: function ( form ) {
			var propertiesString = '';
			form.find( '[id^="mw-translate-prop-"]' ).each( function () {
				var value = $( this ).val();
				if ( $( this ).attr( 'type' ) == 'checkbox' ) {
					value = "no";
					if ( $( this ).attr( 'checked' ) ) { value = "yes"; }
				}
				var id = $( this ).attr( 'id' ).replace( 'mw-translate-prop-', '' );
				propertiesString += '|' + id + '=' + value;
			} );
			if ( propertiesString !== '' ) {
				propertiesString = '{{'
					+ mw.config.get( 'wgTranslateSvgTemplateName' )
					+ propertiesString
					+ '}}';
			}
			return propertiesString;
		},

		updateThumbnailDelayed: function ( form ) {
			window.clearTimeout( mw.translateSvg.updateThumbnailTimer );
			mw.translateSvg.updateThumbnailTimer = window.setTimeout(
				mw.translateSvg.updateThumbnail, 200, form
			);
		},

		updateThumbnail: function ( form ) {
			var textarea = form.find( '.mw-translate-edit-area' );
			var name = form.find( 'input[name="title"]' ).val();
			if ( name === undefined ) {
				return; // arclones
			}
			var identifiers = name.split( '/' );
			var overrideValue = $( textarea ).val() + mw.translateSvg.propertiesToString( form );
			var overrides = {};
			overrides[identifiers[1]] = {};
			overrides[identifiers[1]][identifiers[2]] = overrideValue;
			var group = identifiers[0];
			group = group.substr( group.indexOf( ':' ) + 1 ).replace( '_', ' ' );
			var api = new mw.Api();
			api.get( {
				action: 'query',
				prop: 'translateinfo',
				tiprop: 'thumbnail',
				tigroups: group,
				tilanguage: identifiers[2],
				tioverrides: $.toJSON( overrides )
			}, {
				ok: function ( data ) {
					var newSrc = data.query.groups[0].thumbnail;
					$( form ).find( '.mw-sp-translate-edit-fields a.image img').attr( 'src', newSrc );
				}
			} );
		},

		addUnsavedWarning: function () {
			if( $( '#translatesvg-warning' ).length === 0 ){
				var saveLink = $( '<a>' )
					.attr( 'href', $( '#ca-export a' ).attr( 'href' ) )
					.text( mw.msg( 'translate-svg-warn-inner' ) );
				$( '<div>' )
					.attr( 'id', 'translatesvg-warning' )
					.append(
						$( '<a>' )
							.attr( 'href', 'https://commons.wikimedia.org/wiki/File:Gnome-emblem-important.svg' )
							.append( $( '<img>' )
								.addClass( 'warnimage' )
								.attr( 'width', 50 )
								.attr( 'height', 50 )
								.attr( 'src', '//upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Gnome-emblem-important.svg/50px-Gnome-emblem-important.svg.png' )
							)
					)
					.append( $( '<p>' ).html( mw.msg( 'translate-svg-warn', saveLink.clone().wrap( '<div>' ).parent().html() ) ) )
					.insertAfter( $( '.mw-translate-helplink' ) )
					.clone().insertBefore( $( '#mw-content-text fieldset' ).last() );
			}
		}
	};

	$( document ).ready( mw.translateSvg.init );
} )( mediaWiki, jQuery );