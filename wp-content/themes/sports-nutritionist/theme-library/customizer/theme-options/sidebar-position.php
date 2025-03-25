<?php
/**
 * Sidebar Position
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'sports-nutritionist' ),
		'panel' => 'sports_nutritionist_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_sidebar_position',
	'settings' => 'sports_nutritionist_global_sidebar_separator',
)));

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'sports_nutritionist_sidebar_position',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'sports-nutritionist' ),
		'section' => 'sports_nutritionist_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'sports-nutritionist' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'sports-nutritionist' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'sports-nutritionist' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_sidebar_position',
	'settings' => 'sports_nutritionist_post_sidebar_separator',
)));

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'sports_nutritionist_post_sidebar_position',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'sports-nutritionist' ),
		'section' => 'sports_nutritionist_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'sports-nutritionist' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'sports-nutritionist' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'sports-nutritionist' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_sidebar_position',
	'settings' => 'sports_nutritionist_page_sidebar_separator',
)));

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'sports_nutritionist_page_sidebar_position',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'sports-nutritionist' ),
		'section' => 'sports_nutritionist_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'sports-nutritionist' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'sports-nutritionist' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'sports-nutritionist' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_sidebar_position',
	'settings' => 'sports_nutritionist_sidebar_width_separator',
)));


$wp_customize->add_setting( 'sports_nutritionist_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'sports_nutritionist_sanitize_range_value',
) );

$wp_customize->add_control(new Sports_Nutritionist_Customize_Range_Control($wp_customize, 'sports_nutritionist_sidebar_width', array(
	'section'     => 'sports_nutritionist_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'sports-nutritionist' ),
	'description' => __( 'Adjust the width of the sidebar.', 'sports-nutritionist' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));

$wp_customize->add_setting( 'sports_nutritionist_sidebar_widget_font_size', array(
    'default'           => 24,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'sports_nutritionist_sidebar_widget_font_size', array(
    'type'        => 'number',
    'section'     => 'sports_nutritionist_sidebar_position',
    'label'       => __( 'Sidebar Widgets Heading Font Size ', 'sports-nutritionist' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));