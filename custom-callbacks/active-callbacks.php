<?php
/**
 * Custom active callbacks for the WordPress customizer
 *
 * @since   1.0.0
 * @package Polygon_Customizer_Boilerplate
 */

if ( ! function_exists( 'polygon_active_callbacks' ) ) {

	/**
	 * Active callback.
	 *
	 * Display options in the customizer only if certain conditions are met.
	 *
	 * @since 1.0.0
	 * @param array $control Array with the control data.
	 */
	function polygon_active_callbacks( $control ) {
		// Callbacks related to 'temporary_option'.
		$setting_value = $control->manager->get_setting( 'temporary_option' )->value();
		$control_id    = $control->id;

		if ( 'temporary_option_one' == $control_id && 'first-option' == $setting_value ) {
			return true;
		}

		if ( 'temporary_option_two' == $control_id && 'second-option' == $setting_value ) {
			return true;
		}

		// Return false if no conditions are met.
		return false;
	}
}
