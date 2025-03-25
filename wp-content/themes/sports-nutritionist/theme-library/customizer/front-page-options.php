<?php
/**
 * Front Page Options
 *
 * @package Sports Nutritionist
 */

$wp_customize->add_panel(
	'sports_nutritionist_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'sports-nutritionist' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding About Us Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/services.php';