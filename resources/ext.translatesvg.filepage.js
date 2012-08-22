/**
 * This file contains JavaScript for the TranslateSvg extension, relating to
 * file description pages.
 *
 * @file
 * @author Harry Burt
 * @copyright Copyright © 2012 Harry Burt
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
( function ( mw, $ ) {
	var TranslateSvgFilepage = function () {
		// Placeholder; note that 'this' can (and should) be used here safely
	};
	TranslateSvgFilepage.prototype = {
		init: function () {
			if( !mw.config.exists( 'wgFileCanBeTranslated' ) ){
				// This script relies on certain globals being exposed. If they're not,
				// we shouldn't try to go on.
				return;
			}

			var full = mw.config.get( 'wgFileFullTranslations' );
			var partial = mw.config.get( 'wgFilePartialTranslations' );

			// p.SVGThumbs is a helper paragraph available on Wikimedia Commons and a few
			// other wikis.
			var parent = ( $( 'p.SVGThumbs' ).length > 0 )
				? parent = $( 'p.SVGThumbs' ) : $( 'div.fullMedia' );
			if( full.length === 0 && partial.length === 0 ){
				if ( mw.config.get( 'wgFileCanBeTranslated' ) && mw.config.get( 'wgUserCanTranslate' ) ){
					// No existing translations, can't translate
					// TODO: suggest "log into to translate"?
					parent.append( '<br />' + this.getNoTranslationsSpan() );
				}
			} else {
				// Existing translations, show view link and/or translate links
				parent.append( '<br />' + this.getHasTranslationsSpan( full, partial ) );
			}
		},

		getHasTranslationsSpan: function ( full, partial ){
			// Prepare a span to append to the file description page
			// of a file with existing translations
			var canTranslate = mw.config.get( 'wgUserCanTranslate' );
			var userLangCode = mw.config.get( 'wgUserLanguage' );
			var userLangName = mw.config.get( 'wgUserLanguageName' );

			var langCodesUsed = [];
			var existing = [];
			var fullLength = full.length;
			var languages = $.merge( full, partial );
			for( var i = 0; i < languages.length; i++ ){
				langCodesUsed.push( languages[i].code );
				var item = this.makeViewLink( languages[i].code, languages[i].name );
				if( canTranslate ){
					if( i < fullLength ){
						var label = mw.message( 'translate-svg-filepage-edit' );
					} else {
						var label = mw.message( 'translate-svg-filepage-finish' );
					}
					var link = this.makeTranslateLink( languages[i].code, label );
					item = mw.message( 'translate-svg-filepage-item', item, link );
				}
				existing.push( item );
			}

			existing = existing.join( mw.message( 'comma-separator' ) );

			var invites = [];
			if( langCodesUsed.indexOf( userLangCode ) === -1 ){
				invites.push( this.makeTranslateLink( userLangCode, userLangName ) );
			}
			invites.push( this.makeTranslateLink(
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
			// Prepare a span to append to the file description page
			// of a file with no existing translations but where translation
			// is possible.
			var filename = mw.config.get( 'wgTitle' );
			filename = filename.replace( ' ', '+' );
			var url = mw.util.wikiGetlink( 'Special:TranslateNewSvg' ) + '?group=' + filename;
			var link = mw.html.element(
				'a',
				{ 'href': url },
				mw.message( 'translate-svg-filepage-other' ).toString()
			);
			return mw.message( 'translate-svg-filepage-invite', link );
		},

		makeViewLink: function ( langCode, langName ){
			// Make a link to view the file in the language with the given
			// langCode and langName
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
				langName
			);
			return link;
		},

		makeTranslateLink: function ( langCode, label ){
			// Makes a link (with given label) to translate the file into
			// the language with given langCode 
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

	$( document ).ready( function () {
		var tsvgFilepage = new TranslateSvgFilepage();
		tsvgFilepage.init();
	} );
}( mediaWiki, jQuery ) );
