<?php

/**
 * WooCommerce Settings
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_woocommerce_settings',
	array(
		'panel' => 'sports_nutritionist_theme_options',
		'title' => esc_html__( 'WooCommerce Settings', 'sports-nutritionist' ),
	)
);

//WooCommerce - Products per page.
$wp_customize->add_setting( 'sports_nutritionist_products_per_page', array(
    'default'           => 9,
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'sports_nutritionist_products_per_page', array(
    'type'        => 'number',
    'section'     => 'sports_nutritionist_woocommerce_settings',
    'label'       => __( 'Products Per Page', 'sports-nutritionist' ),
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
));

//WooCommerce - Products per row.
$wp_customize->add_setting( 'sports_nutritionist_products_per_row', array(
    'default'           => '3',
    'sanitize_callback' => 'sports_nutritionist_sanitize_choices',
) );

$wp_customize->add_control( 'sports_nutritionist_products_per_row', array(
    'label'    => __( 'Products Per Row', 'sports-nutritionist' ),
    'section'  => 'sports_nutritionist_woocommerce_settings',
    'settings' => 'sports_nutritionist_products_per_row',
    'type'     => 'select',
    'choices'  => array(
        '2' => '2',
		'3' => '3',
		'4' => '4',
    ),
) );

//WooCommerce - Show / Hide Related Product.
$wp_customize->add_setting(
	'sports_nutritionist_related_product_show_hide',
	array(
		'default'           => true,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_related_product_show_hide',
		array(
			'label'   => esc_html__( 'Show / Hide Related product', 'sports-nutritionist' ),
			'section' => 'sports_nutritionist_woocommerce_settings',
		)
	)
);

// WooCommerce - Product Sale Position.
$wp_customize->add_setting(
	'sports_nutritionist_product_sale_position', 
	array(
		'default' => 'left',
		'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(
	'sports_nutritionist_product_sale_position', 
	array(
		'label' => __('Product Sale Position', 'sports-nutritionist'),
		'section' => 'sports_nutritionist_woocommerce_settings',
		'settings' => 'sports_nutritionist_product_sale_position',
		'type' => 'radio',
		'choices' => 
	array(
		'left' => __('Left', 'sports-nutritionist'),
		'right' => __('Right', 'sports-nutritionist'),
	),
));