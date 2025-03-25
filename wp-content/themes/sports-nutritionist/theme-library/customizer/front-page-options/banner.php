<?php
/**
 * Banner Section
 *
 * @package sports_nutritionist
 */

$wp_customize->add_section(
	'sports_nutritionist_banner_section',
	array(
		'panel'    => 'sports_nutritionist_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'sports-nutritionist' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'sports_nutritionist_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'sports_nutritionist_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Sports_Nutritionist_Toggle_Switch_Custom_Control(
		$wp_customize,
		'sports_nutritionist_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'sports-nutritionist' ),
			'section'  => 'sports_nutritionist_banner_section',
			'settings' => 'sports_nutritionist_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'sports_nutritionist_enable_banner_section',
		array(
			'selector' => '#sports_nutritionist_banner_section .section-link',
			'settings' => 'sports_nutritionist_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'sports_nutritionist_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'sports_nutritionist_sanitize_select',
	)
);

$wp_customize->add_control(
	'sports_nutritionist_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'sports-nutritionist' ),
		'section'         => 'sports_nutritionist_banner_section',
		'settings'        => 'sports_nutritionist_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'sports_nutritionist_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'sports-nutritionist' ),
			'post' => esc_html__( 'Post', 'sports-nutritionist' ),
		),
	)
);

for ( $sports_nutritionist_i = 1; $sports_nutritionist_i <= 3; $sports_nutritionist_i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'sports_nutritionist_banner_slider_content_post_' . $sports_nutritionist_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'sports_nutritionist_banner_slider_content_post_' . $sports_nutritionist_i,
		array(
			/* translators: %d: Select Post Count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'sports-nutritionist' ), $sports_nutritionist_i ),
			'section'         => 'sports_nutritionist_banner_section',
			'settings'        => 'sports_nutritionist_banner_slider_content_post_' . $sports_nutritionist_i,
			'active_callback' => 'sports_nutritionist_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => sports_nutritionist_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'sports_nutritionist_banner_slider_content_page_' . $sports_nutritionist_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'sports_nutritionist_banner_slider_content_page_' . $sports_nutritionist_i,
		array(
			/* translators: %d: Select Page Count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'sports-nutritionist' ), $sports_nutritionist_i ),
			'section'         => 'sports_nutritionist_banner_section',
			'settings'        => 'sports_nutritionist_banner_slider_content_page_' . $sports_nutritionist_i,
			'active_callback' => 'sports_nutritionist_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => sports_nutritionist_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'sports_nutritionist_banner_button_label_' . $sports_nutritionist_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'sports_nutritionist_banner_button_label_' . $sports_nutritionist_i,
		array(
			/* translators: %d: Button Label Count. */
			'label'           => sprintf( esc_html__( 'Button Label %d', 'sports-nutritionist' ), $sports_nutritionist_i ),
			'section'         => 'sports_nutritionist_banner_section',
			'settings'        => 'sports_nutritionist_banner_button_label_' . $sports_nutritionist_i,
			'type'            => 'text',
			'active_callback' => 'sports_nutritionist_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'sports_nutritionist_banner_button_link_' . $sports_nutritionist_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'sports_nutritionist_banner_button_link_' . $sports_nutritionist_i,
		array(
			/* translators: %d: Button Link Count. */
			'label'           => sprintf( esc_html__( 'Button Link %d', 'sports-nutritionist' ), $sports_nutritionist_i ),
			'section'         => 'sports_nutritionist_banner_section',
			'settings'        => 'sports_nutritionist_banner_button_link_' . $sports_nutritionist_i,
			'type'            => 'url',
			'active_callback' => 'sports_nutritionist_is_banner_slider_section_enabled',
		)
	);

}