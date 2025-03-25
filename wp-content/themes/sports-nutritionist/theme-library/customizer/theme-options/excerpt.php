<?php
/**
 * Excerpt
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_excerpt_options',
	array(
		'panel' => 'sports_nutritionist_theme_options',
		'title' => esc_html__( 'Excerpt', 'sports-nutritionist' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'sports_nutritionist_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'sports-nutritionist' ),
		'section'     => 'sports_nutritionist_excerpt_options',
		'settings'    => 'sports_nutritionist_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);