<?php
/**
 * Register a custom Radio Image control to the WordPress customizer
 *
 * @since   1.0.0
 * @package Polygon_Customizer_Boilerplate
 */

if ( ! function_exists( 'polygon_register_customizer_control_radio_image' ) ) {

	/**
	 * Register Radio Image control.
	 *
	 * Register a custom Radio Image control to the WordPress customizer.
	 *
	 * @since 1.0.0
	 * @param array $wp_customize Array with all customizer data.
	 */
	function polygon_register_customizer_control_radio_image( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}

		/**
		 * Create a Radio Image control
		 *
		 * This class creates a custom control for radio images for the WordPress
		 * customizer. Besides the standard parameters our custom control accepts
		 * 'choices' and 'columns' as parameters. Example:
		 *
		 * $wp_customize->add_control(
		 *     new Polygon_Customize_Radio_Image_Control(
		 *         $wp_customize,
		 *         'temporary',
		 *         array(
		 *             'label'       => esc_html__( 'Temporary', 'polygon' ),
		 *             'description' => esc_html__( 'This is a temporary description.', 'polygon' ),
		 *             'section'     => 'example_settings_section',
		 *             'choices'     => array(
		 *                 'first-option'  => '/link/to/image-one.png',
		 *                 'second-option' => '/link/to/image-two.png',
		 *                 'third-option'  => '/link/to/image-three.png',
		 *             ),
		 *             'columns'     => 3,
		 *         )
		 *     )
		 * );
		 *
		 * The control accepts up to 10 columns.
		 *
		 * @since 1.0.0
		 */
		class Polygon_Customize_Radio_Image_Control extends WP_Customize_Control {

			/**
			 * Control type.
			 *
			 * @since 1.0.0
			 * @var   string
			 */
			public $type = 'radio-image';



			/**
			 * Number of columns.
			 *
			 * @since 1.0.0
			 * @var   string
			 */
			public $columns;




			/**
			 * Enqueue scripts and styles for the custom control.
			 *
			 * Enqueue the required scripts and styles for our custom control.
			 * Scripts are hooked at 'customize_controls_enqueue_scripts' and styles at
			 * 'customize_controls_print_styles'.
			 *
			 * @since 1.0.0
			 */
			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-button' );
			}




			/**
			 * Render control content.
			 *
			 * Render our custom control inside the WordPress customizer.
			 *
			 * @since 1.0.0
			 */
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}

				switch ( $this->columns ) {
					case 2 :
						$columns = 'two-columns';
						break;
					case 3 :
						$columns = 'three-columns';
						break;
					case 4 :
						$columns = 'four-columns';
						break;
					case 5 :
						$columns = 'five-columns';
						break;
					case 6 :
						$columns = 'six-columns';
						break;
					case 7 :
						$columns = 'seven-columns';
						break;
					case 8 :
						$columns = 'eight-columns';
						break;
					case 9 :
						$columns = 'nine-columns';
						break;
					case 10 :
						$columns = 'ten-columns';
						break;
					default :
						$columns = 'one-column';
						break;
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

					<div id="radio-image-<?php echo esc_attr( sanitize_title_with_dashes( $this->id ) ); ?>" class="image <?php echo esc_attr( sanitize_html_class( $columns ) ); ?>">
						<?php foreach ( $this->choices as $value => $label ) { ?>

							<input type="radio" id="<?php echo esc_attr( sanitize_title_with_dashes( $this->id . '-' . $value ) ); ?>" name="customize-radio-<?php echo esc_attr( sanitize_title_with_dashes( $this->id ) ); ?>" value="<?php echo esc_attr( $value ) ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
								<label for="<?php echo esc_attr( $this->id . '-' . $value ); ?>">
									<img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
								</label>
							</input>

						<?php } ?>
					</div>

					<script>
						jQuery( document ).ready( function() {
							jQuery( '[id="radio-image-<?php echo esc_attr( sanitize_title_with_dashes( $this->id ) ); ?>"]' ).buttonset();
						} );
					</script>
				<?php
			}
		}
	}
	add_action( 'customize_register', 'polygon_register_customizer_control_radio_image', 0 );

}





if ( ! function_exists( 'polygon_customizer_control_radio_image_css' ) ) {

	/**
	 * Style Radio Image control.
	 *
	 * Style the custom Radio Image control inside the customizer.
	 *
	 * @since 1.0.0
	 */
	function polygon_customizer_control_radio_image_css() {
		?>
			<style>
				.customize-control-radio-image input[type="radio"] {
					float: left;
				}

				.customize-control-radio-image label {
					display: inline-block;
					float: left;
					max-width: 100%;
					margin: 4px;
				}

				.customize-control-radio-image .image.one-column label {
					max-width: 100%;
				}

				.customize-control-radio-image .image.two-columns label {
					max-width: 46.7%;
				}

				.customize-control-radio-image .image.three-columns label {
					max-width: 30%;
				}

				.customize-control-radio-image .image.four-columns label {
					max-width: 21.7%;
				}

				.customize-control-radio-image .image.five-columns label {
					max-width: 16.9%;
				}

				.customize-control-radio-image .image.six-columns label {
					max-width: 13.5%;
				}

				.customize-control-radio-image .image.seven-columns label {
					max-width: 11.2%;
				}

				.customize-control-radio-image .image.eight-columns label {
					max-width: 9.4%;
				}

				.customize-control-radio-image .image.nine-columns label {
					max-width: 8%;
				}

				.customize-control-radio-image .image.ten-columns label {
					max-width: 6.9%;
				}

				.customize-control-radio-image label img {
					display: block;
					opacity: 0.5;
				}

				.customize-control-radio-image label.ui-state-hover img {
					opacity: 1;
				}

				.customize-control-radio-image label.ui-state-active img {
					opacity: 1;
					padding: 2px;
					border: #777 1px solid;
					margin: -3px;
				}
			</style>
		<?php
	}
	add_action( 'customize_controls_print_styles', 'polygon_customizer_control_radio_image_css' );

}
