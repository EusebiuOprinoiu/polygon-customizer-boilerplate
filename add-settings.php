<?php

/**
 * Add settings to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */





if ( ! function_exists( 'polygon_register_customizer_settings' ) ) {

	/**
	 * Register customizer settings.
	 *
	 * Add settings to the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_register_customizer_settings( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		/*
		 * Basic Example Option - setting and control
		 *
		 * This option contains all the parameters you can use when creating a new
		 * basic customizer setting / control.
		 */
		$wp_customize->add_setting(
			'basic_example_option',
			array(
				'default'              => null,
				'type'                 => 'theme_mod',                        // or option
				'transport'            => 'refresh',                          // or postMessage
				'capability'           => 'edit_theme_options',
				'theme_supports'       => 'polygon-portfolio',
				'sanitize_callback'    => 'sanitization_callback_function',
				'sanitize_js_callback' => 'js_sanitization_callback_function',
			)
		);

		$wp_customize->add_control(
			'basic_example_option',
			array(
				'label'           => __( 'Basic Example Option', 'polygon' ),
				'description'     => __( 'This is an example control you can use as a starting point for new customizer controls.', 'polygon' ),
				'settings'        => 'basic_example_option',
				'section'         => 'section_example_settings',
				'priority'        => 10,                                      // Priority within the section
				'type'            => 'checkbox',
				'active_callback' => 'active_callback_function',
			)
		);





		/*
		 * Advanced Example Option - setting and control
		 *
		 * This option contains all the parameters you can use when creating a new
		 * advanced customizer setting / control.
		 */
		$wp_customize->add_setting(
			'advanced_example_option',
			array(
				'default'              => null,
				'type'                 => 'theme_mod',                        // or option
				'transport'            => 'refresh',                          // or postMessage
				'capability'           => 'edit_theme_options',
				'theme_supports'       => 'polygon-portfolio',
				'sanitize_callback'    => 'sanitization_callback_function',
				'sanitize_js_callback' => 'js_sanitization_callback_function',
			)
		);

		$wp_customize->add_control(
			new Polygon_Customize_Custom_Control(
				$wp_customize,
				'advanced_example_option',
				array(
					'label'           => __( 'Advanced Example Option', 'polygon' ),
					'description'     => __( 'This is an example control you can use as a starting point for new customizer controls.', 'polygon' ),
					'settings'        => 'advanced_example_option',
					'section'         => 'section_example_settings',
					'priority'        => 10,                                  // Priority within the section
					'active_callback' => 'active_callback_function',
				)
			)
		);





		/*
		 * Text Option
		 *
		 * This is a basic text option you can use inside the WordPress customizer.
		 * The control type can be one in the list below. Thinks <input type="$type">.
		 *
		 * - text   ( sanitize with polygon_sanitize_html, polygon_sanitize_nohtml, etc )
		 * - email  ( sanitize with polygon_sanitize_email )
		 * - url    ( sanitize with polygon_sanitize_url )
		 * - number ( sanitize with polygon_sanitize_number_absint )
		 * - range  ( sanitize with polygon_sanitize_number_range )
		 * - hidden ( sanitization might be required )
		 */
		$wp_customize->add_setting(
			'text_option',
			array(
				'default'           => 'Default value',
				'sanitize_callback' => 'sanitization_callback_function',    // According to the comment above
			)
		);

		$wp_customize->add_control(
			'text_option',
			array(
				'label'       => __( 'Text Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic text option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'text',
			)
		);





		/*
		 * Textarea Option
		 *
		 * This is a basic textarea option you can use inside the WordPress customizer.
		 * It can be used for larger portions of text, custom code or css.
		 *
		 * Sanitize using polygon_sanitize_html, polygon_sanitize_nohtml or
		 * polygon_sanitize_css.
		 */
		$wp_customize->add_setting(
			'textarea_option',
			array(
				'default'           => 'Default value',
				'sanitize_callback' => 'sanitization_callback_function',    // According to the comment above
			)
		);

		$wp_customize->add_control(
			'textarea_option',
			array(
				'label'       => __( 'Textarea Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic textarea option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'textarea',
			)
		);





		/*
		 * Checkbox Option
		 *
		 * This is a basic checkbox option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_checkbox.
		 */
		$wp_customize->add_setting(
			'checkbox_option',
			array(
				'default'           => 'Default value',
				'sanitize_callback' => 'polygon_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'checkbox_option',
			array(
				'label'       => __( 'Checkbox Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic checkbox option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'checkbox',
			)
		);





		/*
		 * Select Option
		 *
		 * This is a basic select option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_select.
		 */
		$wp_customize->add_setting(
			'select_option',
			array(
				'default'           => 'first-option',
				'sanitize_callback' => 'polygon_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'select_option',
			array(
				'label'       => __( 'Select Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic select option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'select',
				'choices'     => array(
					'first-option'  => 'First Option',
					'second-option' => 'Second Option',
					'third-option'  => 'Third Option',
				)
			)
		);





		/*
		 * Radio Option
		 *
		 * This is a basic radio option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_select.
		 */
		$wp_customize->add_setting(
			'radio_option',
			array(
				'default'           => 'first-option',
				'sanitize_callback' => 'polygon_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'radio_option',
			array(
				'label'       => __( 'Radio Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic radio option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'radio',
				'choices'     => array(
					'first-option'  => 'First Option',
					'second-option' => 'Second Option',
					'third-option'  => 'Third Option',
				)
			)
		);





		/*
		 * Dropdown Pages Option
		 *
		 * This is a basic dropdown-pages option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_dropdown_pages.
		 */
		$wp_customize->add_setting(
			'dropdown_pages_option',
			array(
				'default'           => null,
				'sanitize_callback' => 'polygon_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control(
			'dropdown_pages_option',
			array(
				'label'       => __( 'Dropdown Pages Option', 'polygon' ),
				'description' => __( 'This is an example control for a basic dropdown-pages option.', 'polygon' ),
				'section'     => 'section_basic_settings',
				'type'        => 'dropdown-pages',
			)
		);





		/*
		 * Image Upload Option
		 *
		 * This is an advanced image option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_image.
		 */
		$wp_customize->add_setting(
			'image_upload_option',
			array(
				'default'           => null,
				'sanitize_callback' => 'polygon_sanitize_image',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_upload_option',
				array(
					'label'       => __( 'Image Option', 'polygon' ),
					'description' => __( 'This is an example control for an advanced image upload option.', 'polygon' ),
					'section'     => 'section_advanced_settings',
				)
			)
		);





		/*
		 * File Upload Option
		 *
		 * This is an advanced file upload option you can use inside the WordPress customizer.
		 * Sanitize if necessary.
		 */
		$wp_customize->add_setting(
			'file_upload_option',
			array(
				'default'           => null,
				'sanitize_callback' => 'sanitization_callback_function',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'file_upload_option',
				array(
					'label'       => __( 'File Upload Option', 'polygon' ),
					'description' => __( 'This is an example control for an advanced file upload option.', 'polygon' ),
					'section'     => 'section_advanced_settings',
				)
			)
		);





		/*
		 * Color Option
		 *
		 * This is an advanced color option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_color.
		 */
		$wp_customize->add_setting(
			'color_option',
			array(
				'default'           => '#abcdef',
				'sanitize_callback' => 'polygon_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_option',
				array(
					'label'       => __( 'Color Option', 'polygon' ),
					'description' => __( 'This is an example control for an advanced color option.', 'polygon' ),
					'section'     => 'section_advanced_settings',
				)
			)
		);





		/*
		 * Radio Image Option
		 *
		 * This is a cutom radio image option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_select.
		 */
		$wp_customize->add_setting(
			'radio_image_option',
			array(
				'default'           => 'first-option',
				'sanitize_callback' => 'polygon_sanitize_select',
			)
		);

		$wp_customize->add_control(
			new Polygon_Customize_Radio_Image_Control(
				$wp_customize,
				'radio_image_option',
				array(
					'label'       => __( 'Radio Image Option', 'polygon' ),
					'description' => __( 'This is an example control for a custom radio image option.', 'polygon' ),
					'section'     => 'section_advanced_settings',
					'choices'     => array(
						'first-option'  => '/link/to/image-one.png',
						'second-option' => '/link/to/image-two.png',
						'third-option'  => '/link/to/image-three.png',
					),
					'columns'     => 3,
				)
			)
		);





		/*
		 * Multiple Checkbox Option
		 *
		 * This is a cutom multiple checkbox option you can use inside the WordPress customizer.
		 * Sanitize using polygon_sanitize_multiple_checkbox.
		 */
		$wp_customize->add_setting(
			'multiple_checkbox_option',
			array(
				'default'           => 'first-option',
				'sanitize_callback' => 'polygon_sanitize_multiple_checkbox',
			)
		);

		$wp_customize->add_control(
			new Polygon_Customize_Multiple_Checkbox_Control(
				$wp_customize,
				'multiple_checkbox_option',
				array(
					'label'       => __( 'Multiple Checkbox option', 'polygon' ),
					'description' => __( 'This is an example control for a custom multiple checkbox option.', 'polygon' ),
					'section'     => 'section_advanced_settings',
					'choices'     => array(
						'first-option'  => __( 'First Option',  'polygon' ),
						'second-option' => __( 'Second Option', 'polygon' ),
						'third-option'  => __( 'Third Option',  'polygon' ),
					)
				)
			)
		);





		/*
		 * Register settings from partials
		 *
		 * Register customizer settings from external files.
		 */
		polygon_customizer_add_settings( 'example', 'basic-settings' );
		polygon_customizer_add_settings( 'example', 'advanced-settings' );
	}
	add_action( 'customize_register', 'polygon_register_customizer_settings' );

}





if ( ! function_exists( 'polygon_customizer_add_settings' ) ) {

	/**
	 * Load partials for the customizer settings.
	 *
	 * Helper function that loads the partials for the WordPress customizer settings. 
	 * Must be called in the polygon_register_customizer_settings() function declared above.
	 *
	 * @since    1.0.0
	 * @param    string    $panel      Parent panel for the section stored in $section.
	 * @param    string    $section    Section where the settings are defined.
	 */
	function polygon_customizer_add_settings( $panel, $section ) {
		// Global variables
		global $wp_customize;

		// Sanitize strings
		$panel   = sanitize_title_with_dashes( $panel );
		$section = sanitize_title_with_dashes( $section );

		// Load customizer partials
		if ( $panel ) {
			require( get_template_directory() . '/includes/customizer/partials/' . $panel . '/' . $section . '/' . 'add-settings.php' );
		}
		else {
			require( get_template_directory() . '/includes/customizer/partials/' . $section . '/' . 'add-settings.php' );
		}
	}

}