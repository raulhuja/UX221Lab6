<?php
/**
 * Active Callbacks
 *
 * @package sports_nutritionist
 */

// Theme Options.
function sports_nutritionist_is_pagination_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_enable_pagination' )->value() );
}
function sports_nutritionist_is_breadcrumb_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_enable_breadcrumb' )->value() );
}
function sports_nutritionist_is_layout_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_website_layout' )->value() );
}
function sports_nutritionist_is_pagetitle_bcakground_image_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_page_header_style' )->value() );
}
function sports_nutritionist_is_preloader_style( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_enable_preloader' )->value() );
}

// Header Options.
function sports_nutritionist_is_topbar_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_Setting( 'sports_nutritionist_enable_topbar' )->value() );
}

// Banner Slider Section.
function sports_nutritionist_is_banner_slider_section_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_enable_banner_section' )->value() );
}
function sports_nutritionist_is_banner_slider_section_and_content_type_post_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_banner_slider_content_type' )->value();
	return ( sports_nutritionist_is_banner_slider_section_enabled( $sports_nutritionist_control ) && ( 'post' === $sports_nutritionist_content_type ) );
}
function sports_nutritionist_is_banner_slider_section_and_content_type_page_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_banner_slider_content_type' )->value();
	return ( sports_nutritionist_is_banner_slider_section_enabled( $sports_nutritionist_control ) && ( 'page' === $sports_nutritionist_content_type ) );
}

// Service section.
function sports_nutritionist_is_post_tab_section_and_content_type_page_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_banner_slider_content_type' )->value();
	return ( sports_nutritionist_is_banner_slider_section_enabled( $sports_nutritionist_control ) && ( 'page' === $sports_nutritionist_content_type ) );
}
function sports_nutritionist_is_post_tab_section_and_content_type_post_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_banner_slider_content_type' )->value();
	return ( sports_nutritionist_is_banner_slider_section_enabled( $sports_nutritionist_control ) && ( 'post' === $sports_nutritionist_content_type ) );
}
function sports_nutritionist_is_service_section_enabled( $sports_nutritionist_control ) {
	return ( $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_enable_service_section' )->value() );
}
function sports_nutritionist_is_service_section_and_content_type_post_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_service_content_type' )->value();
	return ( sports_nutritionist_is_service_section_enabled( $sports_nutritionist_control ) && ( 'post' === $sports_nutritionist_content_type ) );
}
function sports_nutritionist_is_service_section_and_content_type_page_enabled( $sports_nutritionist_control ) {
	$sports_nutritionist_content_type = $sports_nutritionist_control->manager->get_setting( 'sports_nutritionist_service_content_type' )->value();
	return ( sports_nutritionist_is_service_section_enabled( $sports_nutritionist_control ) && ( 'page' === $sports_nutritionist_content_type ) );
}