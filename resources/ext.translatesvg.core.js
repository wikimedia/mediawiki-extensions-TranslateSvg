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
        }
    };
    window.TranslateSvgLoader = TranslateSvgLoader;
    $( document ).ready( function () {
        var tsvgLoader = new TranslateSvgLoader();
        tsvgLoader.init();
    } );
}( mediaWiki, jQuery ) );
