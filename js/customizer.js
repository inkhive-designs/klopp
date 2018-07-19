/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '#text-title-desc' ).css({
                    clip: 'rect(1px, 1px, 1px, 1px)',
                    position: 'absolute'
                });
                // Add class for different logo styles if title and description are hidden.
                $( 'body' ).addClass( 'title-tagline-hidden' );
            } else {

                $( '#text-title-desc' ).css({
                    clip: 'auto',
                    position: 'relative'
                });
                $( '.site-branding a' ).css({
                    color: to
                });
                // Add class for different logo styles if title and description are visible.
                $( 'body' ).removeClass( 'title-tagline-hidden' );
            }
        });
    });

    wp.customize( 'klopp_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );
    
    //Social Icon
    wp.customize( 'klopp_social_icon_style', function( value ) {
        value.bind( function( to ) {
            var	ChangeClass	=	'common ' + to;
            jQuery( '.social-icons a' ).attr( 'class', ChangeClass );
        });
    });

    //Featured Area
    wp.customize( 'klopp_featposts_enable', function( value ) {
        value.bind( function( to ) {
            $( '.featposts' ).toggle();
        } );
    } );
    wp.customize('klopp_featposts_title', function( value ){
        value.bind( function( to ) {
            $( '.featposts .section-title' ).text( to );
        });
    });

    wp.customize( 'klopp_showcase_enable', function( value ) {
        value.bind( function( to ) {
            $( '#showcase' ).toggle();
        } );
    } );
    wp.customize('klopp_showcase_title', function( value ){
        value.bind( function( to ) {
            $( '#showcase .section-title' ).text( to );
        });
    });

    wp.customize( 'klopp_fa2_enable', function( value ) {
        value.bind( function( to ) {
            $( '#featured-area-2' ).toggle();
        } );
    } );
    wp.customize('klopp_fa2_title', function( value ){
        value.bind( function( to ) {
            $( '#featured-area-2 .section-title' ).text( to );
        });
    });


    //Design & Layouts

    //Content Font Size Set
    wp.customize( 'klopp_content_font_size', function( value ) {
        value.bind( function( to ) {
            $( '#primary-mono .entry-content' ).css( 'font-size', to );
        } );
    } );
    
    //Footer
    wp.customize('klopp_footer_text', function( value ){
        value.bind( function( to ) {
            $( '.fcustom-text' ).text( to );
        });
    });
} )( jQuery );
