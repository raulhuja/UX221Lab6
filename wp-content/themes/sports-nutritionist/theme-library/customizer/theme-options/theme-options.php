<?php
/**
 * Header Options
 *
 * @package sports_nutritionist
 */

// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------
// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'sports_nutritionist_general_options',
	array(
		'panel' => 'sports_nutritionist_theme_options',
		'title' => esc_html__( 'General Options', 'sports-nutritionist' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_general_options',
	'settings' => 'sports_nutritionist_preloader_separator',
) ) );


// General Options - Enable Preloader.
$wp_customize->add_setting(
	'sports_nutritionist_enable_preloader',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_general_options',
		)
	)
);

// Preloader Style Setting
$wp_customize->add_setting(
	'sports_nutritionist_preloader_style',
	array(
		'default'           => 'style1',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_preloader_style',
	array(
		'type'     => 'select',
		'label'    => esc_html__('Select Preloader Styles', 'sports-nutritionist'),
		'active_callback' => 'sports_nutritionist_is_preloader_style',
		'section'  => 'sports_nutritionist_general_options',
		'choices'  => array(
			'style1' => esc_html__('Style 1', 'sports-nutritionist'),
			'style2' => esc_html__('Style 2', 'sports-nutritionist'),
			'style3' => esc_html__('Style 3', 'sports-nutritionist'),
		),
	)
);


// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_general_options',
	'settings' => 'sports_nutritionist_pagination_separator',
) ) );

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'sports_nutritionist_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'sports-nutritionist' ),
			'section'  => 'sports_nutritionist_general_options',
			'settings' => 'sports_nutritionist_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'sports_nutritionist_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_general_options',
		'settings'        => 'sports_nutritionist_pagination_type',
		'active_callback' => 'sports_nutritionist_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'sports-nutritionist' ),
			'numeric' => __( 'Numeric', 'sports-nutritionist' ),
		),
	)
);

// ---------------------------------------- BREADCRUMB ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_general_options',
	'settings' => 'sports_nutritionist_breadcrumb_separators',
)));

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'sports_nutritionist_enable_breadcrumb',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'sports_nutritionist_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'sports-nutritionist' ),
		'active_callback' => 'sports_nutritionist_is_breadcrumb_enabled',
		'section'         => 'sports_nutritionist_general_options',
	)
);

// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_general_options',
	'settings' => 'sports_nutritionist_layuout_separator',
)));


$wp_customize->add_setting(
	'sports_nutritionist_website_layout',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'sports-nutritionist'),
			'section' => 'sports_nutritionist_general_options',
		)
	)
);

$wp_customize->add_setting('sports_nutritionist_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'sports_nutritionist_sanitize_range_value',
));

$wp_customize->add_control(new Sports_Nutritionist_Customize_Range_Control($wp_customize, 'sports_nutritionist_layout_width_margin', array(
		'label'       => __('Set Width', 'sports-nutritionist'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'sports-nutritionist'),
		'section'     => 'sports_nutritionist_general_options',
		'settings'    => 'sports_nutritionist_layout_width_margin',
		'active_callback' => 'sports_nutritionist_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));

// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------

$wp_customize->add_section(
	'sports_nutritionist_header_options',
	array(
		'panel' => 'sports_nutritionist_theme_options',
		'title' => esc_html__( 'Header Options', 'sports-nutritionist' ),
	)
);


// Add setting for sticky header
$wp_customize->add_setting(
	'sports_nutritionist_enable_sticky_header',
	array(
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_header_options',
		)
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'sports_nutritionist_header_button_label_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_header_button_label_',
	array(
		'label'           => esc_html__( 'Button Label', 'sports-nutritionist'  ),
		'section'         => 'sports_nutritionist_header_options',
		'settings'        => 'sports_nutritionist_header_button_label_',
		'type'            => 'text',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'sports_nutritionist_banner_button_link_',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_banner_button_link_',
	array(
		'label'           => esc_html__( 'Button Link', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_header_options',
		'settings'        => 'sports_nutritionist_banner_button_link_',
		'type'            => 'url',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'sports_nutritionist_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Sports_Nutritionist_Separator_Custom_Control( $wp_customize, 'sports_nutritionist_menu_separator', array(
	'label' => __( 'Menu Settings', 'sports-nutritionist' ),
	'section' => 'sports_nutritionist_header_options',
	'settings' => 'sports_nutritionist_menu_separator',
)));

$wp_customize->add_setting( 'sports_nutritionist_menu_font_size', array(
    'default'           => 15,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'sports_nutritionist_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'sports_nutritionist_header_options',
    'label'       => __( 'Menu Font Size ', 'sports-nutritionist' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

// Add setting for text transform
$wp_customize->add_setting( 'sports_nutritionist_menu_text_transform', array(
    'default'           => 'capitalize', // Default value
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for text transform
$wp_customize->add_control( 'sports_nutritionist_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'sports_nutritionist_header_options',
    'label'    => __( 'Menu Text Transform', 'sports-nutritionist' ),
    'choices'  => array(
        'none'       => __( 'None', 'sports-nutritionist' ),
        'capitalize' => __( 'Capitalize', 'sports-nutritionist' ),
        'uppercase'  => __( 'Uppercase', 'sports-nutritionist' ),
        'lowercase'  => __( 'Lowercase', 'sports-nutritionist' ),
    ),
) );

// Menu Text Color 
$wp_customize->add_setting(
	'sports_nutritionist_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'sports_nutritionist_menu_text_color', 
		array(
			'label' => __('Menu Color', 'sports-nutritionist'),
			'section' => 'sports_nutritionist_header_options',
		)
	)
);

// Sub Menu Text Color 
$wp_customize->add_setting(
	'sports_nutritionist_sub_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'sports_nutritionist_sub_menu_text_color', 
		array(
			'label' => __('Sub Menu Color', 'sports-nutritionist'),
			'section' => 'sports_nutritionist_header_options',
		)
	)
);

// ----------------------------------------SITE IDENTITY----------------------------------------------------


// Site Logo - Enable Setting.
$wp_customize->add_setting(
	'sports_nutritionist_enable_site_logo',
	array(
		'default'           => false, // Default is to display the logo.
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch', // Sanitize using a custom switch function.
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_site_logo',
		array(
			'label'    => esc_html__( 'Enable Site Logo', 'sports-nutritionist' ),
			'section'  => 'title_tagline', // Section to add this control.
			'settings' => 'sports_nutritionist_enable_site_logo',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'sports_nutritionist_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Enable Site Title', 'sports-nutritionist' ),
			'section'  => 'title_tagline',
			'settings' => 'sports_nutritionist_enable_site_title_setting',
		)
	)
);

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'sports_nutritionist_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'sports-nutritionist' ),
			'section'  => 'title_tagline',
			'settings' => 'sports_nutritionist_enable_tagline_setting',
		)
	)
);

$wp_customize->add_setting( 'sports_nutritionist_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'sports_nutritionist_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'sports-nutritionist' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );

$wp_customize->add_setting('sports_nutritionist_site_logo_width', array(
    'default'           => 200,
    'sanitize_callback' => 'sports_nutritionist_sanitize_range_value',
));

$wp_customize->add_control(new Sports_Nutritionist_Customize_Range_Control($wp_customize, 'sports_nutritionist_site_logo_width', array(
    'label'       => __('Adjust Site Logo Width', 'sports-nutritionist'),
    'description' => __('This setting controls the Width of Site Logo', 'sports-nutritionist'),
    'section'     => 'title_tagline',
    'settings'    => 'sports_nutritionist_site_logo_width',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 400,
        'step' => 5,
    ),
)));