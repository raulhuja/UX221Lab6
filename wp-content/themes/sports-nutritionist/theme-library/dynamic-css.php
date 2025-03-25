<?php

/**
 * Dynamic CSS
 */
function sports_nutritionist_dynamic_css() {
	$sports_nutritionist_primary_color = get_theme_mod( 'primary_color', '#86c129' );
	$sports_nutritionist_secondary_color = get_theme_mod( 'secondary_color', '#94B870' );

	$sports_nutritionist_site_title_font       = get_theme_mod( 'sports_nutritionist_site_title_font', 'Play' );
	$sports_nutritionist_site_description_font = get_theme_mod( 'sports_nutritionist_site_description_font', 'Open Sans' );
	$sports_nutritionist_header_font           = get_theme_mod( 'sports_nutritionist_header_font', 'Play' );
	$sports_nutritionist_content_font          = get_theme_mod( 'sports_nutritionist_content_font', 'Open Sans' );

	// Enqueue Google Fonts
	$sports_nutritionist_fonts_url = sports_nutritionist_get_fonts_url();
	if ( ! empty( $sports_nutritionist_fonts_url ) ) {
		wp_enqueue_style( 'sports-nutritionist-google-fonts', esc_url( $sports_nutritionist_fonts_url ), array(), null );
	}

	$sports_nutritionist_custom_css  = '';
	$sports_nutritionist_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $sports_nutritionist_primary_color ) . ';
        --secondary-color: ' . esc_attr( $sports_nutritionist_secondary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$sports_nutritionist_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $sports_nutritionist_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $sports_nutritionist_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $sports_nutritionist_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $sports_nutritionist_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $sports_nutritionist_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'sports-nutritionist-style', $sports_nutritionist_custom_css );
}
add_action( 'wp_enqueue_scripts', 'sports_nutritionist_dynamic_css', 99 );