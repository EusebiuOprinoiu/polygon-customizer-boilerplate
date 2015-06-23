<?php

/**
 * Add sections to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */





if ( ! function_exists( 'polygon_register_customizer_sections' ) ) {

	/**
	 * Register customizer sections.
	 *
	 * Add sections to the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_register_customizer_sections( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		/*
		 * Example Settings section
		 *
		 * This section contains all the parameters you can use when creating a new
		 * customizer section.
		 */
		$wp_customize->add_section(
			'section_example_settings',
			array(
				'title'           => __( 'Example Settings', 'polygon' ),
				'description'     => __( 'This is an example section you can use as a starting point for new customizer sections.' ),
				'panel'           => 'panel_example',
				'priority'        => 10,
				'capability'      => 'edit_theme_options',
				'theme_supports'  => 'polygon-portfolio',
				'active_callback' => 'active_callback_function',
			)
		);





		/*
		 * Basic Settings section
		 *
		 * This is an aditional section registered using only the required parameters.
		 * Use it to contain basic settings / controls.
		 */
		$wp_customize->add_section(
			'section_basic_settings',
			array(
				'title'           => __( 'Basic Settings', 'polygon' ),
				'panel'           => 'panel_example',
			)
		);





		/*
		 * Advanced Settings section
		 *
		 * This is an aditional section registered using only the required parameters.
		 * Use it to contain advanced or custom settings / controls.
		 */
		$wp_customize->add_section(
			'section_advanced_settings',
			array(
				'title'           => __( 'Advanced Settings', 'polygon' ),
				'panel'           => 'panel_example',
			)
		);





		/*
		 * Register sections from partials
		 *
		 * Register customizer sections from external files.
		 */
		polygon_customizer_add_sections( 'example' );
		polygon_customizer_add_sections( 'general' );
	}
	add_action( 'customize_register', 'polygon_register_customizer_sections' );

}





if ( ! function_exists( 'polygon_customizer_add_sections' ) ) {

	/**
	 * Load partials for the customizer sections.
	 *
	 * Helper function that loads the partials for the WordPress customizer sections. 
	 * Must be called in the polygon_register_customizer_sections() function declared above.
	 *
	 * @since    1.0.0
	 * @param    string    $panel      Parent panel for the section to register.
	 */
	function polygon_customizer_add_sections( $panel ) {
		// Global variables
		global $wp_customize;

		// Sanitize strings
		$panel   = sanitize_title_with_dashes( $panel );

		// Load customizer partials
		require( get_template_directory() . '/includes/customizer/partials/' . $panel . '/' . 'add-sections.php' );
	}

}