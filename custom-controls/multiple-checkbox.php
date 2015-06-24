<?php

/**
 * Register a custom Multiple Checkbox control to the WordPress customizer
 *
 * @since      1.0.0
 * @package    Customizer_Boilerplate
 */




if ( ! function_exists( 'polygon_register_customizer_control_multiple_checkbox' ) ) {

	/**
	 * Register Multiple Checkbox control.
	 *
	 * Register a custom Multiple Checkbox control to the WordPress customizer.
	 *
	 * @since    1.0.0
	 */
	function polygon_register_customizer_control_multiple_checkbox( $wp_customize ) {
		if ( ! isset( $wp_customize ) ) {
			return;
		}



		/**
		 * Create a Multiple Checkbox control
		 *
		 * This class creates a custom Multiple Checkbox control for the WordPress
		 * customizer. Example:
		 *
		 * $wp_customize->add_control(
		 *     new Polygon_Customize_Multiple_Checkbox_Control(
		 *         $wp_customize,
		 *         'temporary',
		 *         array(
		 *             'label'       => __( 'Temporary', 'polygon' ),
		 *             'description' => __( 'This is a temporary description.', 'polygon' ),
		 *             'section'     => 'section_custom_code',
		 *             'choices'     => array(
		 *                 'first-option'  => __( 'First Option', 'polygon' ),
		 *                 'second-option' => __( 'Second Option', 'polygon' ),
		 *                 'third-option'  => __( 'Third Option', 'polygon' ),
		 *             )
		 *         )
		 *     )
		 * );
		 *
		 * @since    1.0.0
		 */
		class Polygon_Customize_Multiple_Checkbox_Control extends WP_Customize_Control {

			/**
			 * Control type.
			 *
			 * @since     1.1.0
			 * @var       string
			 */
			public $type = 'checkbox-multiple';





			/**
			 * Render control content.
			 *
			 * Render our custom control inside the WordPress customizer.
			 *
			 * @since    1.0.0
			 */
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}			
				
				?>
					<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title">
							<?php echo esc_attr( $this->label ); ?>
						</span>
					<?php } ?>

					<?php if ( ! empty( $this->description ) ) { ?>
						<span class="description customize-control-description">
							<?php echo esc_html( $this->description ); ?>
						</span>
					<?php } ?>

					<?php 
						if ( ! is_array( $this->value() ) ) {
							$multi_values = explode( ', ', $this->value() );
						}
						else {
							$multi_values = $this->value();
						}
					?>

					<ul>
						<?php foreach ( $this->choices as $value => $label ) { ?>
							<li>
								<label>
									<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
									<?php echo esc_html( $label ); ?>
								</label>
							</li>
						<?php } ?>
					</ul>

					<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ', ', $multi_values ) ); ?>" />

					<script>
						jQuery( document ).ready( function() {
							jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
								'change',
								function() {

									checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
										function() {
											return this.value;
										}
									).get().join( ', ' );

									jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
								}
							);
						} );
					</script>
				<?php
			}

		}
	}
	add_action( 'customize_register', 'polygon_register_customizer_control_multiple_checkbox', 0 );

}