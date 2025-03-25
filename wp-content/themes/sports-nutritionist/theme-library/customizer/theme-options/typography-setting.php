<?php
/**
 * Typography Setting
 *
 * @package sports_nutritionist
 */

// Typography Setting
$wp_customize->add_section(
    'sports_nutritionist_typography_setting',
    array(
        'panel' => 'sports_nutritionist_theme_options',
        'title' => esc_html__( 'Typography Setting', 'sports-nutritionist' ),
    )
);

$wp_customize->add_setting(
    'sports_nutritionist_site_title_font',
    array(
        'default'           => 'Play',
        'sanitize_callback' => 'sports_nutritionist_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'sports_nutritionist_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'sports-nutritionist' ),
        'section'  => 'sports_nutritionist_typography_setting',
        'settings' => 'sports_nutritionist_site_title_font',
        'type'     => 'select',
        'choices'  => sports_nutritionist_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'sports_nutritionist_site_description_font',
	array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'sports_nutritionist_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'sports-nutritionist' ),
		'section'  => 'sports_nutritionist_typography_setting',
		'settings' => 'sports_nutritionist_site_description_font',
		'type'     => 'select',
		'choices'  => sports_nutritionist_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'sports_nutritionist_header_font',
	array(
		'default'           => 'Play',
		'sanitize_callback' => 'sports_nutritionist_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'sports-nutritionist' ),
		'section'  => 'sports_nutritionist_typography_setting',
		'settings' => 'sports_nutritionist_header_font',
		'type'     => 'select',
		'choices'  => sports_nutritionist_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'sports_nutritionist_content_font',
	array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'sports_nutritionist_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'sports-nutritionist' ),
		'section'  => 'sports_nutritionist_typography_setting',
		'settings' => 'sports_nutritionist_content_font',
		'type'     => 'select',
		'choices'  => sports_nutritionist_get_all_google_font_families(),
	)
);
