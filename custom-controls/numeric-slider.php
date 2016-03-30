<?php
/**
 * Register a custom Numeric Slider control to the WordPress customizer
 *
 * @since   1.0.0
 * @package Polygon_Customizer_Boilerplate
 */

if ( ! function_exists( 'polygon_register_customizer_control_numeric_slider' ) ) {

	/**
	 * Register Numeric Slider control.
	 *
	 * Register a custom Numeric Slider control to the WordPress customizer.
	 *
	 * @since 1.0.0
	 * @param array $wp_customize Array with all customizer data.
	 */
	function polygon_register_customizer_control_numeric_slider( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}

		/**
		 * Create a Numeric Slider control
		 *
		 * This class creates a custom range control for the WordPress
		 * customizer that also displays the value. Example:
		 *
		 * $wp_customize->add_setting(
		 *     'temporary',
		 *     array(
		 *         'default'           => 5,
		 *         'sanitize_callback' => 'polygon_sanitize_number_range',
		 *     )
		 * );
		 *
		 * $wp_customize->add_control(
		 *     new Polygon_Customize_Numeric_Slider_Control(
		 *         $wp_customize,
		 *         'temporary',
		 *         array(
		 *             'label'       => esc_html__( 'Temporary', 'polygon' ),
		 *             'description' => esc_html__( 'This is a temporary description.', 'polygon' ),
		 *             'section'     => 'example_settings_section',
		 *             'input_attrs' => array(
		 *                 'min'  => 0,
		 *                 'max'  => 20,
		 *                 'step' => 1,
		 *             )
		 *         )
		 *     )
		 * );
		 *
		 * @since 1.0.0
		 */
		class Polygon_Customize_Numeric_Slider_Control extends WP_Customize_Control {

			/**
			 * Control type.
			 *
			 * @since 1.0.0
			 * @var   string
			 */
			public $type = 'numeric-slider';




			/**
			 * Render control content.
			 *
			 * Render our custom control inside the WordPress customizer.
			 *
			 * @since 1.0.0
			 */
			public function render_content() {
				if ( ! isset( $this->input_attrs['min'] ) ) {
					$min = 0;
				} else {
					$min = $this->input_attrs['min'];
				}

				if ( ! isset( $this->input_attrs['max'] ) ) {
					$max = 9999;
				} else {
					$max = $this->input_attrs['max'];
				}

				if ( ! isset( $this->input_attrs['step'] ) ) {
					$step = 1;
				} else {
					$step = $this->input_attrs['step'];
				}

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

					<div id="numeric-slider-<?php echo esc_attr( sanitize_title_with_dashes( $this->id ) ); ?>" class="numeric-slider">
						<span class="numeric-slider-value">
							<?php echo esc_attr( $this->value() ); ?>
						</span>

						<input type="range" value="<?php echo esc_attr( $this->value() ); ?>" min="<?php echo esc_attr( $min ); ?>" max="<?php echo esc_attr( $max ); ?>" step="<?php echo esc_attr( $step ); ?>" <?php $this->link(); ?>>

						<div class="clear"></div>
					</div>

					<script>
						jQuery( document ).ready( function() {
							jQuery( '#numeric-slider-<?php echo esc_attr( sanitize_title_with_dashes( $this->id ) )?> input[type="range"]' ).on( 'change mousemove', function() {
								var active_range = jQuery( this );
								active_range.prev().text( active_range.val() );
							} );
						} );
					</script>
				<?php
			}
		}
	}
	add_action( 'customize_register', 'polygon_register_customizer_control_numeric_slider', 0 );

}





if ( ! function_exists( 'polygon_customizer_control_numeric_slider_css' ) ) {

	/**
	 * Style Numeric Slider control.
	 *
	 * Style the custom Numeric Slider control inside the customizer.
	 *
	 * @since 1.0.0
	 */
	function polygon_customizer_control_numeric_slider_css() {
		?>
			<style>
				.customize-control-numeric-slider .numeric-slider-value {
					display: block;
					color: #555555;
					text-align: center;
					float: left;
					width: 50px;
					height: 20px;
					line-height: 20px;
					border: #dddddd 1px solid;
					background-color: #e5e5e5;
					margin-top: 1px;
					margin-right: 10px;
					position: absolute;
					z-index: 999;
				}

				.customize-control-numeric-slider input[type="range"] {
					display: block;
					float: right;
					width: 100%;
					padding-left: 70px;
				}

				.customize-control-numeric-slider .clear {
					clear: both;
				}
			</style>
		<?php
	}
	add_action( 'customize_controls_print_styles', 'polygon_customizer_control_numeric_slider_css' );

}
