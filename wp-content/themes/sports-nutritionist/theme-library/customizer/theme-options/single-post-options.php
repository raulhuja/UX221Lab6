<?php
/**
 * Single Post Options
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'sports-nutritionist' ),
		'panel' => 'sports_nutritionist_theme_options',
	)
);

// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'sports_nutritionist_single_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'sports_nutritionist_single_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'sports_nutritionist_single_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_single_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'sports_nutritionist_single_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_single_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'sports_nutritionist_single_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_tags',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_single_post_options',
	'settings' => 'sports_nutritionist_related_post_separator',
) ) );

// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_related_posts',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_single_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
    'sports_nutritionist_related_posts_count',
    array(
        'default'           => 3,
        'sanitize_callback' => 'absint', // Ensure it's an integer
    )
);

// Add control for number of related posts
$wp_customize->add_control(
    'sports_nutritionist_related_posts_count',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Number of Related Posts to Display', 'sports-nutritionist' ),
        'section'     => 'sports_nutritionist_single_post_options',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3, // Adjust maximum based on your preference
            'step' => 1,
        ),
    )
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'sports_nutritionist_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'sports-nutritionist' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'sports-nutritionist' ),
		'section'  => 'sports_nutritionist_single_post_options',
		'settings' => 'sports_nutritionist_post_related_post_label',
		'type'     => 'text',
	)
);