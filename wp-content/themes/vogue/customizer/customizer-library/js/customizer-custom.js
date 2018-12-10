/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        vogue_fonts_check();
        $( '#customize-control-vogue-disable-google-fonts input[type=checkbox]' ).on( 'change', function() {
            vogue_fonts_check();
        });
        
        function vogue_fonts_check() {
            if ( $( '#customize-control-vogue-disable-google-fonts input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-note-fonts-one' ).show();
            } else {
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-note-fonts-one' ).hide();
            }
        }

        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-vogue-slider-type select' ).val();
        vogue_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-vogue-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            vogue_customizer_slider_check( slider_select_value );
        } );
        
        function vogue_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'vogue-slider-default' ) {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).show();
            } else if ( slider_select_value == 'vogue-meta-slider' ) {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).hide();
            } else {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).hide();
            }
        }
        
    } );
    
} )( jQuery );