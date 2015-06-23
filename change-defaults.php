<?php

/**
 * Change default panels and sections from the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */





if ( ! function_exists( 'polygon_change_customizer_defaults' ) ) {

	/**
	 * Change customizer defaults.
	 *
	 * Change default panels and sections from the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_change_customizer_defaults( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		// Move default sections under the WordPress panel
		$wp_customize->get_section( 'title_tagline' )->panel        = 'panel_wordpress';
		$wp_customize->get_section( 'title_tagline' )->priority     = 10;

		$wp_customize->get_section( 'colors' )->panel               = 'panel_wordpress';
		$wp_customize->get_section( 'colors' )->priority            = 20;

		$wp_customize->get_section( 'nav' )->panel                  = 'panel_wordpress';
		$wp_customize->get_section( 'nav' )->priority               = 30;

		$wp_customize->get_section( 'header_image' )->panel         = 'panel_wordpress';
		$wp_customize->get_section( 'header_image' )->priority      = 40;

		$wp_customize->get_section( 'background_image' )->panel     = 'panel_wordpress';
		$wp_customize->get_section( 'background_image' )->priority  = 50;

		$wp_customize->get_section( 'static_front_page' )->panel    = 'panel_wordpress';
		$wp_customize->get_section( 'static_front_page' )->priority = 60;
	}
	add_action( 'customize_register', 'polygon_change_customizer_defaults' );

}