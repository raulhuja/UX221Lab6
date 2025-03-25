<?php

/**
 * Render homepage sections.
 */
function sports_nutritionist_homepage_sections() {
	$sports_nutritionist_homepage_sections = array_keys( sports_nutritionist_get_homepage_sections() );

	foreach ( $sports_nutritionist_homepage_sections as $sports_nutritionist_section ) {
		require get_template_directory() . '/sections/' . $sports_nutritionist_section . '.php';
	}
}