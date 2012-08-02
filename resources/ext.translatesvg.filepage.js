( function ( mw, $ ) {
	mw.tSvgFileDesc = {
		init: function () {
			if( !mw.config.exists( 'wgFileCanBeTranslated' ) ){
				return;
			}

			var full = mw.config.get( 'wgFileFullTranslations' );
			var partial = mw.config.get( 'wgFilePartialTranslations' );
			var parent = ( $( 'p.SVGThumbs' ).length > 0 )
				? parent = $( 'p.SVGThumbs' ) : $( 'div.fullMedia' );
			if( full.length === 0 && partial.length === 0 ){
				if ( mw.config.get( 'wgFileCanBeTranslated' ) && mw.config.get( 'wgUserCanTranslate' ) ){
					parent.append( '<br />' + mw.tSvgFileDesc.getNoTranslationsSpan() );
				}
			} else {
				parent.append( '<br />' + mw.tSvgFileDesc.getHasTranslationsSpan( full, partial ) );
			}
		},
		getHasTranslationsSpan: function ( full, partial ){
			var canTranslate = mw.config.get( 'wgUserCanTranslate' );
			var userLangCode = mw.config.get( 'wgUserLanguage' );
			var userLangName = mw.config.get( 'wgUserLanguageName' );

			var langCodesUsed = [];
			var existing = [];
			var fullLength = full.length;
			var languages = $.merge( full, partial );
			for( var i = 0; i < languages.length; i++ ){
				langCodesUsed.push( languages[i].code );
				var item = mw.tSvgFileDesc.makeViewLink( languages[i].code, languages[i].name );
				if( canTranslate ){
					if( i < fullLength ){
						var label = mw.message( 'translate-svg-filepage-edit' );
					} else {
						var label = mw.message( 'translate-svg-filepage-finish' );
					}
					var link = mw.tSvgFileDesc.makeTranslateLink( languages[i].code, label );
					item = mw.message( 'translate-svg-filepage-item', item, link );
				}
				existing.push( item );
			}

			existing = existing.join( mw.message( 'comma-separator' ) );

			var invites = [];
			if( langCodesUsed.indexOf( userLangCode ) === -1 ){
				invites.push( mw.tSvgFileDesc.makeTranslateLink( userLangCode, userLangName ) );
			}
			invites.push( mw.tSvgFileDesc.makeTranslateLink(
				false,
				mw.message( 'translate-svg-filepage-another' )
			) );

			invites = invites.join( mw.message( 'comma-separator' ) );

			if( canTranslate ){
				return mw.message( 'translate-svg-filepage-caption-translator', existing, invites );
			} else {
				return mw.message( 'translate-svg-filepage-caption', existing );
			}
		},
		getNoTranslationsSpan: function (){
			var userLangCode = mw.config.get( 'wgUserLanguage' );
			var userLangName = mw.config.get( 'wgUserLanguageName' );

			var suggestions = [];
			suggestions.push( mw.tSvgFileDesc.makeTranslateLink( userLangCode, userLangName ) );
			suggestions.push( mw.tSvgFileDesc.makeTranslateLink(
				false,
				mw.message( 'translate-svg-filepage-another' )
			) );

			suggestions = suggestions.join( mw.message( 'comma-separator' ) );

			return mw.message( 'translate-svg-filepage-invite', suggestions );
		},
		makeViewLink: function ( langCode, language ){
			var pageName = mw.config.get( 'wgPageName' );
			if( window.location.search === '' ){
				// Usual short form URL
				var url = window.location.href + '?lang=' + langCode;
			} else {
				// More unusual extended form
				var url = window.location.href;
				var existingLang = mw.util.getParamValue( 'lang' );
				if( existingLang !== null ){
					if( url.indexOf( '&lang=' ) !== -1 ){
						url = url.replace( '&lang=' + existingLang, '' );
						url += '&lang=' + langCode;
					} else {
						url = url.replace( '?lang=' + existingLang, '' );
						url += '?lang=' + langCode;
					}
				}
			}
			var link = mw.html.element(
				'a',
				{ 'href': url },
				language
			);
			return link;
		},
		makeTranslateLink: function ( langCode, label ){
			var filename = mw.config.get( 'wgTitle' );
			filename = filename.replace( ' ', '+' );
			var url = mw.util.wikiGetlink( 'Special:Translate' ) + '?group=' + filename;
			if( langCode !== false ){
				url += '&language=' + langCode;	
			} else {
				url += '&chooselanguage=true';
			}
			var link = mw.html.element(
				'a',
				{ 'href': url },
				label.toString()
			);
			return link;
		}
	};

	$( document ).ready( mw.tSvgFileDesc.init );
} )( mediaWiki, jQuery );