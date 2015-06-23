<?php

/**
 * Add panels to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer Boilerplate
 */




if ( ! function_exists( 'polygon_register_customizer_panels' ) ) {

	/**
	 * Register customizer panels.
	 *
	 * Add panels to the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_register_customizer_panels( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		/*
		 * Example panel
		 *
		 * This panel contains all the parameters you can use when creating a new
		 * customizer panel.
		 */
		$wp_customize->add_panel(
			'panel_example',
			array(
				'title'           => __( 'Example', 'polygon' ),
				'description'     => __( 'This is an example panel you can use as a starting point for new customizer panels.', 'polygon' ),
				'priority'        => 10,
				'capability'      => 'edit_theme_options',
				'theme_supports'  => 'polygon-portfolio',
				'active_callback' => 'active_callback_function',
			)
		);





		/*
		 * General panel
		 *
		 * This is an aditional panel registered using only the required parameters.
		 * Use it for sections that control general aspects of your website.
		 */
		$wp_customize->add_panel(
			'panel_general',
			array(
				'title'           => __( 'General', 'polygon' ),
				'description'     => __( 'This panel contains the sections that control general aspects of your website.', 'polygon' ),
				'priority'        => 20,
			)
		);





		/*
		 * WordPress panel
		 *
		 * This is an aditional panel registered using only the required parameters.
		 * Use it for sections added by default by WordPress. 
		 */
		$wp_customize->add_panel(
			'panel_wordpress',
			array(
				'title'            => __( 'WordPress', 'polygon' ),
				'description'      => __( 'This panel contains the sections added by default by WordPress.', 'polygon' ),
				'priority'         => 30,
			)
		);
	}
	add_action( 'customize_register', 'polygon_register_customizer_panels' );

}