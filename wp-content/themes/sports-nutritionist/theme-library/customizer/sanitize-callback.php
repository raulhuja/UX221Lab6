<?php

function sports_nutritionist_sanitize_select( $sports_nutritionist_input, $sports_nutritionist_setting ) {
	$sports_nutritionist_input = sanitize_key( $sports_nutritionist_input );
	$sports_nutritionist_choices = $sports_nutritionist_setting->manager->get_control( $sports_nutritionist_setting->id )->choices;
	return ( array_key_exists( $sports_nutritionist_input, $sports_nutritionist_choices ) ? $sports_nutritionist_input : $sports_nutritionist_setting->default );
}

function sports_nutritionist_sanitize_switch( $sports_nutritionist_input ) {
	if ( true === $sports_nutritionist_input ) {
		return true;
	} else {
		return false;
	}
}

function sports_nutritionist_sanitize_google_fonts( $sports_nutritionist_input, $sports_nutritionist_setting ) {
	$sports_nutritionist_choices = $sports_nutritionist_setting->manager->get_control( $sports_nutritionist_setting->id )->choices;
	return ( array_key_exists( $sports_nutritionist_input, $sports_nutritionist_choices ) ? $sports_nutritionist_input : $sports_nutritionist_setting->default );
}
/**
 * Sanitize HTML input.
 *
 * @param string $sports_nutritionist_input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function sports_nutritionist_sanitize_html( $sports_nutritionist_input ) {
    return wp_kses_post( $sports_nutritionist_input );
}

/**
 * Sanitize URL input.
 *
 * @param string $sports_nutritionist_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function sports_nutritionist_sanitize_url( $sports_nutritionist_input ) {
    return esc_url_raw( $sports_nutritionist_input );
}

// Sanitize Scroll Top Position
function sports_nutritionist_sanitize_scroll_top_position( $sports_nutritionist_input ) {
    $valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $sports_nutritionist_input, $valid_positions ) ) {
        return $sports_nutritionist_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function sports_nutritionist_sanitize_choices( $sports_nutritionist_input, $sports_nutritionist_setting ) {
	global $wp_customize; 
	$control = $wp_customize->get_control( $sports_nutritionist_setting->id ); 
	if ( array_key_exists( $sports_nutritionist_input, $control->choices ) ) {
		return $sports_nutritionist_input;
	} else {
		return $sports_nutritionist_setting->default;
	}
}

function sports_nutritionist_sanitize_range_value( $sports_nutritionist_number, $sports_nutritionist_setting ) {

	// Ensure input is an absolute integer.
	$sports_nutritionist_number = absint( $sports_nutritionist_number );

	// Get the input attributes associated with the setting.
	$sports_nutritionist_atts = $sports_nutritionist_setting->manager->get_control( $sports_nutritionist_setting->id )->input_attrs;

	// Get minimum number in the range.
	$sports_nutritionist_min = ( isset( $sports_nutritionist_atts['min'] ) ? $sports_nutritionist_atts['min'] : $sports_nutritionist_number );

	// Get maximum number in the range.
	$sports_nutritionist_max = ( isset( $sports_nutritionist_atts['max'] ) ? $sports_nutritionist_atts['max'] : $sports_nutritionist_number );

	// Get step.
	$sports_nutritionist_step = ( isset( $sports_nutritionist_atts['step'] ) ? $sports_nutritionist_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $sports_nutritionist_min <= $sports_nutritionist_number && $sports_nutritionist_number <= $sports_nutritionist_max && is_int( $sports_nutritionist_number / $sports_nutritionist_step ) ? $sports_nutritionist_number : $sports_nutritionist_setting->default );
}