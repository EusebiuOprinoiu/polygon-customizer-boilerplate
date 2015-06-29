<?php

/**
 * Custom active callbacks for the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */





if ( ! function_exists( 'polygon_active_callbacks' ) ) {

	/**
	 * Active callback.
	 *
	 * Display options in the customizer only if certain conditions are met.
	 *
	 * @since    1.0.0
	 */
	function polygon_active_callbacks( $control ) {
		// Callbacks related to 'temporary_option'
		$setting_value = $control->manager->get_setting( 'temporary_option' )->value();
		$control_id    = $control->id;

		if ( $control_id == 'temporary_option_one' && $setting_value == 'first-option' ) return true;
		if ( $control_id == 'temporary_option_two' && $setting_value == 'second-option' ) return true;



		// Return false if no conditions are met
		return false;
	}
}
