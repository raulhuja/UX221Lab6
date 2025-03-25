<?php
/**
 * Post Options
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'sports-nutritionist' ),
		'panel' => 'sports_nutritionist_theme_options',
	)
);

// Post Options - Show / Hide Feature Image.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_feature_image',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Show / Hide Featured Image', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Post Heading.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_post_heading',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Show / Hide Post Heading', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Post Content.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_post_content',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Show / Hide Post Content', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'sports_nutritionist_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

// ---------------------------------------- Post layout ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_archive_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_archive_layuout_separator', array(
	'label' => __( 'Archive/Blogs Layout Setting', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_post_options',
	'settings' => 'sports_nutritionist_archive_layuout_separator',
)));


// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'sports_nutritionist_archive_column_layout',
	array(
		'default'           => 'column-1',
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_archive_column_layout',
	array(
		'label'   => esc_html__( 'Select Posts Layout', 'sports-nutritionist' ),
		'section' => 'sports_nutritionist_post_options',
		'type'    => 'select',
		'choices' => array(
			'column-1' => __( 'Column 1', 'sports-nutritionist' ),
			'column-2' => __( 'Column 2', 'sports-nutritionist' ),
			'column-3' => __( 'Column 3', 'sports-nutritionist' ),
		),
	)
);

$wp_customize->add_setting('sports_nutritionist_blog_layout_option_setting',array(
	'default' => 'Left',
	'sanitize_callback' => 'sports_nutritionist_sanitize_choices'
  ));
  $wp_customize->add_control(new Sports_Nutritionist_Image_Radio_Control($wp_customize, 'sports_nutritionist_blog_layout_option_setting', array(
	'type' => 'select',
	'label' => __('Blog Content Alignment','sports-nutritionist'),
	'section' => 'sports_nutritionist_post_options',
	'choices' => array(
		'Left' => esc_url(get_template_directory_uri()).'/resource/img/layout-2.png',
		'Default' => esc_url(get_template_directory_uri()).'/resource/img/layout-1.png',
		'Right' => esc_url(get_template_directory_uri()).'/resource/img/layout-3.png',
))));


// ---------------------------------------- Read More ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_readmore_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_readmore_separators', array(
	'label' => __( 'Read More Button Settings', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_post_options',
	'settings' => 'sports_nutritionist_readmore_separators',
)));


// Post Options - Show / Hide Read More Button.
$wp_customize->add_setting(
	'sports_nutritionist_post_readmore_button',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_post_readmore_button',
		array(
			'label'   => esc_html__( 'Show / Hide Read More Button', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_post_options',
		)
	)
);

$wp_customize->add_setting(
    'sports_nutritionist_readmore_btn_icon',
    array(
        'default' => 'fas fa-chevron-right', // Set default icon here
        'sanitize_callback' => 'sanitize_text_field',
        'capability' => 'edit_theme_options',
    )
);

$wp_customize->add_control(new Sports_Nutritionist_Change_Icon_Control(
    $wp_customize, 
    'sports_nutritionist_readmore_btn_icon',
    array(
        'label'    => __('Read More Icon','sports-nutritionist'),
        'section'  => 'sports_nutritionist_post_options',
        'iconset'  => 'fa',
    )
));

$wp_customize->add_setting(
	'sports_nutritionist_readmore_button_text',
	array(
		'default'           => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_readmore_button_text',
	array(
		'label'           => esc_html__( 'Read More Button Text', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_post_options',
		'settings'        => 'sports_nutritionist_readmore_button_text',
		'type'            => 'text',
	)
);


// Featured Image Dimension
$wp_customize->add_setting(
	'sports_nutritionist_blog_post_featured_image_dimension',
	array(
		'default' => 'default',
		'sanitize_callback' => 'sports_nutritionist_sanitize_choices'
	)
);

$wp_customize->add_control(
	'sports_nutritionist_blog_post_featured_image_dimension', 
	array(
		'type' => 'select',
		'label' => __('Featured Image Dimension','sports-nutritionist'),
		'section' => 'sports_nutritionist_post_options',
		'choices' => array(
			'default' => __('Default','sports-nutritionist'),
			'custom' => __('Custom Image Size','sports-nutritionist'),
		),
		'description' => __('Note: If you select "Custom Image Size", you can set a custom width and height up to 950px.', 'sports-nutritionist')
	)
);
 
// Featured Image Custom Width
$wp_customize->add_setting(
	'sports_nutritionist_blog_post_featured_image_custom_width',
	array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'sports_nutritionist_blog_post_featured_image_custom_width',
	array(
		'label'	=> __('Featured Image Custom Width','sports-nutritionist'),
		'section'=> 'sports_nutritionist_post_options',
		'type'=> 'text',
		'input_attrs' => array(
			'placeholder' => __( '300', 'sports-nutritionist' ),
		),
		'active_callback' => 'sports_nutritionist_blog_post_featured_image_dimension'
	)
);

// Featured Image Custom Height
$wp_customize->add_setting(
	'sports_nutritionist_blog_post_featured_image_custom_height',
	array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'sports_nutritionist_blog_post_featured_image_custom_height',
	array(
		'label'	=> __('Featured Image Custom Height','sports-nutritionist'),
		'section'=> 'sports_nutritionist_post_options',
		'type'=> 'text',
		'input_attrs' => array(
			'placeholder' => __( '300', 'sports-nutritionist' ),
		),
		'active_callback' => 'sports_nutritionist_blog_post_featured_image_dimension'
	)
);