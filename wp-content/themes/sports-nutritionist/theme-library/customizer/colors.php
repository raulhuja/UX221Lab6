<?php
/**
 * Color Option
 *
 * @package sports_nutritionist
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#FA9927',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'sports-nutritionist' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);

// Secondary Color.
$wp_customize->add_setting(
	'secondary_color',
	array(
		'default'           => '#94B870',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'secondary_color',
		array(
			'label'    => __( 'Secondary Color', 'sports-nutritionist' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
