<?php

/**
 * Register a custom subsection control to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */




if ( ! function_exists( 'polygon_register_customizer_control_subsection' ) ) {

	/**
	 * Register Subsection control.
	 *
	 * Register a custom subsection control to the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_register_customizer_control_subsection( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		/**
		 * Create a subsection control
		 *
		 * This class creates a custom subsection control for the WordPress
		 * customizer. Example:
		 *
		 * $wp_customize->add_setting(
		 *     'temporary',
		 *     array(
		 *         'default'           => null,
		 *         'sanitize_callback'	=> 'polygon_sanitize_null',
		 *     )
		 * );
		 *
		 * $wp_customize->add_control(
		 *     new Polygon_Customize_Subsection_Control(
		 *         $wp_customize,
		 *         'temporary',
		 *         array(
		 *             'label'       => __( 'Temporary', 'polygon' ),
		 *             'description' => __( 'This is a temporary description.', 'polygon' ),
		 *             'section'     => 'section_example_settings',
		 *         )
		 *     )
		 * );
		 *
		 * @since    1.0.0
		 */
		class Polygon_Customize_Subsection_Control extends WP_Customize_Control {

			/**
			 * Control type.
			 *
			 * @since    1.0.0
			 * @var      string
			 */
			public $type = 'subsection';





			/**
			 * Render control content.
			 *
			 * Render our custom control inside the WordPress customizer.
			 *
			 * @since    1.0.0
			 */
			public function render_content() {
				?>
					<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title">
							<?php echo esc_html( $this->label ); ?>
						</span>
					<?php } ?>

					<?php if ( ! empty( $this->description ) ) { ?>
						<span class="description customize-control-description">
							<?php echo esc_html( $this->description ); ?>
						</span>
					<?php } ?>
				<?php
			}
		}
	}
	add_action( 'customize_register', 'polygon_register_customizer_control_subsection', 0 );

}





if ( ! function_exists( 'polygon_customizer_control_subsection_css' ) ) {

	/**
	 * Style Subsection control.
	 *
	 * Style the custom Subsection control inside the customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_customizer_control_subsection_css() {
		?>
			<style>
				.customize-control-subsection .customize-control-title {
					font-size: 11px;
					font-weight: 400;
					text-transform: uppercase;
					background-color: #f5f5f5;
					border-top: #eeeeee 1px solid;
					border-bottom: #eeeeee 1px solid;
					padding: 4px 20px;
					margin: 0 -20px 9px -20px;
				}

				.customize-control-subsection .customize-control-description {
					padding-top: 5px;
				}
			</style>
		<?php
	}
	add_action( 'customize_controls_print_styles', 'polygon_customizer_control_subsection_css' );

}
