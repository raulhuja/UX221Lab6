<?php
/**
 * Footer Options
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_footer_options',
	array(
		'panel' => 'sports_nutritionist_theme_options',
		'title' => esc_html__( 'Footer Options', 'sports-nutritionist' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_footer_separators', array(
	'label' => __( 'Footer Settings', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_footer_options',
	'settings' => 'sports_nutritionist_footer_separators',
)));

	// column // 
$wp_customize->add_setting(
	'sports_nutritionist_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'sports_nutritionist_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','sports-nutritionist'),
		'description' => __('Note: Default footer widgets are shown. Add your preferred widgets in (Appearance > Widgets > Footer) to see changes.', 'sports-nutritionist'),
	    'section' 		=> 'sports_nutritionist_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'sports-nutritionist' ),
			'1' => __( '1 Column', 'sports-nutritionist' ),
			'2' => __( '2 Column', 'sports-nutritionist' ),
			'3' => __( '3 Column', 'sports-nutritionist' ),
			'4' => __( '4 Column', 'sports-nutritionist' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'sports-nutritionist'),
    'section' => 'sports_nutritionist_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'sports-nutritionist'),
    'section' => 'sports_nutritionist_footer_options',
)));

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'sports-nutritionist'),
    'section' => 'sports_nutritionist_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'sports-nutritionist'),
        'capitalize' => __('Capitalize', 'sports-nutritionist'),
        'uppercase' => __('Uppercase', 'sports-nutritionist'),
        'lowercase' => __('Lowercase', 'sports-nutritionist'),
    ),
));

$wp_customize->add_setting(
	'sports_nutritionist_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'sports-nutritionist' ),
		'section'  => 'sports_nutritionist_footer_options',
		'settings' => 'sports_nutritionist_footer_copyright_text',
		'type'     => 'textarea',
	)
);

//Copyright Alignment
$wp_customize->add_setting(
	'sports_nutritionist_footer_bottom_align',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'sports_nutritionist_footer_bottom_align',
	array(
		'label' => __('Copyright Alignment ','sports-nutritionist'),
		'section' => 'sports_nutritionist_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','sports-nutritionist'),
			'right' => __('Right','sports-nutritionist'),
			'center' => __('Center','sports-nutritionist'),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_footer_options',
	'settings' => 'sports_nutritionist_scroll_separators',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'sports_nutritionist_scroll_top',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_footer_options',
		)
	)
);
// icon // 
$wp_customize->add_setting(
	'sports_nutritionist_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Sports_Nutritionist_Change_Icon_Control($wp_customize, 
	'sports_nutritionist_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','sports-nutritionist'),
	    'section' 		=> 'sports_nutritionist_footer_options',
		'iconset' => 'fa',
	))  
);


$wp_customize->add_setting( 'sports_nutritionist_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'sports_nutritionist_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'sports_nutritionist_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'sports-nutritionist' ),
    'section'  => 'sports_nutritionist_footer_options',
    'settings' => 'sports_nutritionist_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'sports-nutritionist' ),
        'bottom-left'  => __( 'Bottom Left', 'sports-nutritionist' ),
        'bottom-center'=> __( 'Bottom Center', 'sports-nutritionist' ),
    ),
) );

$wp_customize->add_setting( 'sports_nutritionist_scroll_top_shape', array(
    'default'           => 'box',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'sports_nutritionist_scroll_top_shape', array(
    'label'    => __( 'Scroll to Top Button Shape', 'sports-nutritionist' ),
    'section'  => 'sports_nutritionist_footer_options',
    'settings' => 'sports_nutritionist_scroll_top_shape',
    'type'     => 'radio',
    'choices'  => array(
        'box'        => __( 'Box', 'sports-nutritionist' ),
        'curved-box' => __( 'Curved Box', 'sports-nutritionist' ),
        'circle'     => __( 'Circle', 'sports-nutritionist' ),
    ),
) );