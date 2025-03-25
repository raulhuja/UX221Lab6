<?php
/**
 * About Us Section
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_services_section',
	array(
		'panel'    => 'sports_nutritionist_front_page_options',
		'title'    => esc_html__( 'About Us Section', 'sports-nutritionist' ),
		'priority' => 10,
	)
);

// About Us Section - Enable Section.
$wp_customize->add_setting(
	'sports_nutritionist_enable_service_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable About Us Section', 'sports-nutritionist' ),
			'section'  => 'sports_nutritionist_services_section',
			'settings' => 'sports_nutritionist_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'sports_nutritionist_enable_service_section',
		array(
			'selector' => '#sports_nutritionist_service_section .section-link',
			'settings' => 'sports_nutritionist_enable_service_section',
		)
	);
}

// About Us Section - Short Heading.
$wp_customize->add_setting(
	'sports_nutritionist_services_short_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_services_short_heading',
	array(
		'label'           => esc_html__( 'Short Heading', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_services_short_heading',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// About Us Section - Heading.
$wp_customize->add_setting(
	'sports_nutritionist_services_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_services_heading',
	array(
		'label'           => esc_html__( 'Heading', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_services_heading',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// About Us Section - Content.
$wp_customize->add_setting(
	'sports_nutritionist_services_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_services_content',
	array(
		'label'           => esc_html__( 'Content', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_services_content',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// Image setting Center
$wp_customize->add_setting('sports_nutritionist_about_image_1', array(
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'esc_url_raw', // Sanitization callback function
));

// Image control 1
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_setting_control_1', array(
    'label'    => __('About Image 1', 'sports-nutritionist'),
    'section'  => 'sports_nutritionist_services_section',
    'settings' => 'sports_nutritionist_about_image_1',
	'active_callback' => 'sports_nutritionist_is_service_section_enabled',
)));

// Image setting Center
$wp_customize->add_setting('sports_nutritionist_about_image_2', array(
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'esc_url_raw', // Sanitization callback function
));

// Image control 1
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_setting_control_2', array(
    'label'    => __('About Image 2', 'sports-nutritionist'),
    'section'  => 'sports_nutritionist_services_section',
    'settings' => 'sports_nutritionist_about_image_2',
	'active_callback' => 'sports_nutritionist_is_service_section_enabled',
)));

// Image setting Center
$wp_customize->add_setting('sports_nutritionist_about_image_3', array(
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'esc_url_raw', // Sanitization callback function
));

// Image control 1
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_image_setting_control_3', array(
    'label'    => __('About Image 3', 'sports-nutritionist'),
    'section'  => 'sports_nutritionist_services_section',
    'settings' => 'sports_nutritionist_about_image_3',
	'active_callback' => 'sports_nutritionist_is_service_section_enabled',
)));

// icon // 
$wp_customize->add_setting(
	'sports_nutritionist_about_icon_1',
	array(
        'default' => 'fab fa-nutritionix',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Sports_Nutritionist_Change_Icon_Control($wp_customize, 
	'sports_nutritionist_about_icon_1' ,
	array(
	    'label'   		=> __('Service Icon 1','sports-nutritionist'),
	    'section' 		=> 'sports_nutritionist_services_section',
		'iconset' => 'fa',
	))  
);

// About Us Section - Heading.
$wp_customize->add_setting(
	'sports_nutritionist_about_static_number_1',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_about_static_number_1',
	array(
		'label'           => esc_html__( 'Static Number 1', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_about_static_number_1',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// About Us Section - Heading.
$wp_customize->add_setting(
	'sports_nutritionist_about_static_heading_1',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_about_static_heading_1',
	array(
		'label'           => esc_html__( 'Static Heading 1', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_about_static_heading_1',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// icon // 
$wp_customize->add_setting(
	'sports_nutritionist_about_icon_2',
	array(
        'default' => 'fab fa-nutritionix',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Sports_Nutritionist_Change_Icon_Control($wp_customize, 
	'sports_nutritionist_about_icon_2' ,
	array(
	    'label'   		=> __('Service Icon 2','sports-nutritionist'),
	    'section' 		=> 'sports_nutritionist_services_section',
		'iconset' => 'fa',
	))  
);

// About Us Section - Heading.
$wp_customize->add_setting(
	'sports_nutritionist_about_static_number_2',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_about_static_number_2',
	array(
		'label'           => esc_html__( 'Static Number 2', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_about_static_number_2',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// About Us Section - Heading.
$wp_customize->add_setting(
	'sports_nutritionist_about_static_heading_2',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_about_static_heading_2',
	array(
		'label'           => esc_html__( 'Static Heading 2', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_about_static_heading_2',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// About Us Section - Button Text.
$wp_customize->add_setting(
	'sports_nutritionist_about_button_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_about_button_text',
	array(
		'label'           => esc_html__( 'About Button Text', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_services_section',
		'settings'        => 'sports_nutritionist_about_button_text',
		'type'            => 'text',
		'active_callback' => 'sports_nutritionist_is_service_section_enabled',
	)
);

// Banner Section - Button Link.
	$wp_customize->add_setting(
		'sports_nutritionist_about_button_url' ,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'sports_nutritionist_about_button_url' ,
		array(
			'label'           => esc_html__( 'About Button Url', 'sports-nutritionist' ),
			'section'         => 'sports_nutritionist_services_section',
			'settings'        => 'sports_nutritionist_about_button_url' ,
			'type'            => 'url',
			'active_callback' => 'sports_nutritionist_is_service_section_enabled',
		)
	);