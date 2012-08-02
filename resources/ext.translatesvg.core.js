( function ( mw, $ ) {
	mw.translateSvg = {
		oldValue: '',
		updateThumbnailTimer : 0,
		dialogWidth: false,
		init: function () {
			if ( $( 'input[name="group"]' ).val() !== 'SVGMessageGroup' ) {
				return;
			}

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

			mw.hooks = mw.hooks || {};
			mw.hooks.translate = mw.hooks.translate || {};
			mw.hooks.translate.beforeSubmit = mw.hooks.translate.beforeSubmit || [];
			mw.hooks.translate.afterSubmit = mw.hooks.translate.afterSubmit || [];
			mw.hooks.translate.afterRegisterFeatures = mw.hooks.translate.afterRegisterFeatures || [];

			mw.hooks.translate.beforeSubmit.push( function ( form ) {
				var textarea = form.find( '.mw-translate-edit-area' ).last();
				mw.translateSvg.oldValue = textarea.val();
				textarea.val( mw.translateSvg.oldValue + mw.translateSvg.propertiesToString( form ) );
				return true;
			} );
			mw.hooks.translate.afterSubmit.push( function ( form ) {
				form.find( '.mw-translate-edit-area' ).val( mw.translateSvg.oldValue );
				return true;
			} );
			mw.hooks.translate.afterRegisterFeatures.push( function ( form ) {
				$( '#mw-translate-prop-color' ).colourPicker();
				var colorPicker = $( '#mw-translate-prop-color' );
				if( colorPicker.val() === 'other' ){
					colorPicker.val( '' );
				}

				form.find( '.mw-translate-inputs textarea,input[type="number"],input[type="text"]' )
					.keyup( function () { mw.translateSvg.updateThumbnailDelayed( form ); } );
				form.find( '.mw-translate-inputs input[type="text"]' )
					.change( function () { mw.translateSvg.updateThumbnailDelayed( form ); } );
				form.find( '.mw-translate-inputs input[type="checkbox"],[type="number"]' )
					.change( function () { mw.translateSvg.updateThumbnail( form ); } );
				form.find( '.mw-translate-inputs select' )
					.change( function () { mw.translateSvg.updateThumbnail( form ); } );
				return true;
			} );

			/* If required, show chooselanguage dialog box */
			mw.translateSvg.dialogwidth = $( window ).width() * 0.8;
			if( mw.util.getParamValue( 'chooselanguage' ) !== null ){ // i.e. ...&chooselanguage=
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
				form.find( 'input[type="submit"]' ).css( 'margin-top', '-30px' );

				dialog.dialog( {
					modal: true,
					bgiframe: true,
					width: mw.translateSvg.dialogwidth,
					title: mw.msg( 'translate-svg-chooselanguage-title' ),
					position: 'center',
					resize: function() { $( '#' + id + ' textarea' ).width( '100%' ); },
					resizeStop: function() { mw.translateSvg.dialogwidth = $( '#' + id ).width(); },
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
			var overrideName = 'override/' + identifiers[1] + '/' + identifiers[2];
			var overrideValue = $( textarea ).val() + mw.translateSvg.propertiesToString( form );
			var override = encodeURIComponent( overrideName ) + '=' + encodeURIComponent( overrideValue );
			var group = identifiers[0];
			group = group.substr( group.indexOf( ':' ) + 1 ).replace( '_', '+' );
			var url = mw.config.get( 'wgScript' );
			url += '?title=Special:Translate/thumbnailpage&group=$1&$2&language=$3';
			url = url.replace( '$1', group ).replace( '$2', override ).replace( '$3', identifiers[2] );
			$.post( url, {}, function ( thumbnail ) {
				$( form ).find( '.mw-sp-translate-edit-fields a.image').html( thumbnail );
			} );
		}
	};

	$( document ).ready( mw.translateSvg.init );
} )( mediaWiki, jQuery );