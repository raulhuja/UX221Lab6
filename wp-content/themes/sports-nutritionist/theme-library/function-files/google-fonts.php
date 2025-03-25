<?php
function sports_nutritionist_get_all_google_fonts() {
    $sports_nutritionist_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $sports_nutritionist_webfonts_json ) ) {
        return array();
    }

    $sports_nutritionist_fonts_json_data = file_get_contents( $sports_nutritionist_webfonts_json );
    if ( false === $sports_nutritionist_fonts_json_data ) {
        return array();
    }

    $sports_nutritionist_all_fonts = json_decode( $sports_nutritionist_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $sports_nutritionist_google_fonts = array();
    foreach ( $sports_nutritionist_all_fonts as $sports_nutritionist_font ) {
        $sports_nutritionist_google_fonts[ $sports_nutritionist_font['family'] ] = array(
            'family'   => $sports_nutritionist_font['family'],
            'variants' => $sports_nutritionist_font['variants'],
        );
    }
    return $sports_nutritionist_google_fonts;
}


function sports_nutritionist_get_all_google_font_families() {
    $sports_nutritionist_google_fonts  = sports_nutritionist_get_all_google_fonts();
    $sports_nutritionist_font_families = array();
    foreach ( $sports_nutritionist_google_fonts as $sports_nutritionist_font ) {
        $sports_nutritionist_font_families[ $sports_nutritionist_font['family'] ] = $sports_nutritionist_font['family'];
    }
    return $sports_nutritionist_font_families;
}

function sports_nutritionist_get_fonts_url() {
    $sports_nutritionist_fonts_url = '';
    $sports_nutritionist_fonts     = array();

    $sports_nutritionist_all_fonts = sports_nutritionist_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'sports_nutritionist_site_title_font', 'Play' ) ) ) {
        $sports_nutritionist_fonts[] = get_theme_mod( 'sports_nutritionist_site_title_font', 'Play' );
    }

    if ( ! empty( get_theme_mod( 'sports_nutritionist_site_description_font', 'Open Sans' ) ) ) {
        $sports_nutritionist_fonts[] = get_theme_mod( 'sports_nutritionist_site_description_font', 'Open Sans' );
    }

    if ( ! empty( get_theme_mod( 'sports_nutritionist_header_font', 'Play' ) ) ) {
        $sports_nutritionist_fonts[] = get_theme_mod( 'sports_nutritionist_header_font', 'Play' );
    }

    if ( ! empty( get_theme_mod( 'sports_nutritionist_content_font', 'Open Sans' ) ) ) {
        $sports_nutritionist_fonts[] = get_theme_mod( 'sports_nutritionist_content_font', 'Open Sans' );
    }

    $sports_nutritionist_fonts = array_unique( $sports_nutritionist_fonts );

    foreach ( $sports_nutritionist_fonts as $sports_nutritionist_font ) {
        $sports_nutritionist_variants      = $sports_nutritionist_all_fonts[ $sports_nutritionist_font ]['variants'];
        $sports_nutritionist_font_family[] = $sports_nutritionist_font . ':' . implode( ',', $sports_nutritionist_variants );
    }

    $sports_nutritionist_query_args = array(
        'family' => urlencode( implode( '|', $sports_nutritionist_font_family ) ),
    );

    if ( ! empty( $sports_nutritionist_font_family ) ) {
        $sports_nutritionist_fonts_url = add_query_arg( $sports_nutritionist_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $sports_nutritionist_fonts_url;
}