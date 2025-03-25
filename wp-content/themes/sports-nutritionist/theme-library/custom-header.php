<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package sports_nutritionist
 */

function sports_nutritionist_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'sports_nutritionist_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'sports_nutritionist_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'sports_nutritionist_custom_header_setup' );

if ( ! function_exists( 'sports_nutritionist_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'sports_nutritionist_header_style' );
function sports_nutritionist_header_style() {
	if ( get_header_image() ) :
	$sports_nutritionist_custom_css = "
        header.site-header .header-main-wrapper .bottom-header-outer-wrapper .bottom-header-part{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'sports-nutritionist-style', $sports_nutritionist_custom_css );
	endif;
}
endif;