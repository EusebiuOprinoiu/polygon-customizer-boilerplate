<?php

/**
 * Add panels to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
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
			'example_panel',
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
		 * Layout panel
		 *
		 * This is an aditional panel registered using only the required parameters.
		 * Use it for sections that control how your website is displayed.
		 */
		$wp_customize->add_panel(
			'layout_panel',
			array(
				'title'            => __( 'Layout', 'polygon' ),
				'description'      => __( 'This panel contains the sections that control how your website layout is displayed.', 'polygon' ),
				'priority'         => 20,
			)
		);





		/*
		 * General panel
		 *
		 * This is an aditional panel registered using only the required parameters.
		 * Use it for sections that control general aspects of your website ond default WordPress sections.
		 */
		$wp_customize->add_panel(
			'general_panel',
			array(
				'title'           => __( 'General', 'polygon' ),
				'description'     => __( 'This panel contains the sections that control general aspects of your website.', 'polygon' ),
				'priority'        => 30,
			)
		);
	}
	add_action( 'customize_register', 'polygon_register_customizer_panels' );

}
