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



		// Remove default sections
		$wp_customize->remove_section( 'colors' );



		// Move default sections under the WordPress panel
		$wp_customize->get_section( 'title_tagline' )->panel        = 'wordpress_panel';
		$wp_customize->get_section( 'title_tagline' )->priority     = 10;

		if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) ) {
			$wp_customize->get_section( 'nav' )->panel              = 'wordpress_panel';
			$wp_customize->get_section( 'nav' )->priority           = 20;
		}

		$wp_customize->get_section( 'header_image' )->panel         = 'wordpress_panel';
		$wp_customize->get_section( 'header_image' )->priority      = 30;

		$wp_customize->get_section( 'background_image' )->panel     = 'wordpress_panel';
		$wp_customize->get_section( 'background_image' )->priority  = 40;

		$wp_customize->get_section( 'static_front_page' )->panel    = 'wordpress_panel';
		$wp_customize->get_section( 'static_front_page' )->priority = 50;
	}
	add_action( 'customize_register', 'polygon_change_customizer_defaults' );

}
