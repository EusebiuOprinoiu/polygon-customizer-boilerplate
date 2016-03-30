<?php
/**
 * Custom sanitization callbacks for the WordPress customizer
 *
 * The Customizer API includes basic controls for the following control types:
 * - basic: text
 * - basic: textarea
 * - basic: checkbox
 * - basic: radio
 * - basic: select
 * - basic: dropdown pages
 *
 * WordPress 4.0 also introduced controls for the following specialized text input control types:
 * - text: email
 * - text: number
 * - text: password (not included here)
 * - text: search (not included here)
 * - text: tel
 * - text: url
 *
 * @since   1.0.0
 * @package Polygon_Customizer_Boilerplate
 */

if ( ! function_exists( 'polygon_sanitize_checkbox' ) ) {

	/**
	 * Sanitize checkbox.
	 *
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes $checked
	 * as a boolean value, either true or false.
	 *
	 * @since  1.0.0
	 * @param  bool $checked Whether the checkbox is checked.
	 * @return bool          Whether the checkbox is checked.
	 */
	function polygon_sanitize_checkbox( $checked ) {
		if ( isset( $checked ) && true == $checked ) {
			return true;
		} else {
			return false;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_multiple_checkbox' ) ) {

	/**
	 * Sanitize multiple checkbox.
	 *
	 * Sanitization callback for 'multiple checkbox' type controls. Since everything
	 * is stored as a comma-delineated string of values rather than array we'll turn
	 * the values into an array before saving to the database.
	 *
	 * This sanitization function can be used with Polygon_Customize_Multiple_Checkbox_Control.
	 *
	 * @since  1.0.0
	 * @param  string $values Coma-delineated string values.
	 * @return array          Array of sanitized values.
	 */
	function polygon_sanitize_multiple_checkbox( $values ) {
		if ( ! is_array( $values ) ) {
			$multi_values = explode( ', ', $values );
		} else {
			$multi_values = $values;
		}

		if ( ! empty( $multi_values ) ) {
			array_map( 'sanitize_text_field', $multi_values );
			return $multi_values;
		} else {
			return array();
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_select' ) ) {

	/**
	 * Sanitize select.
	 *
	 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes $input
	 * as a slug, and then validates $input against the choices defined for the control.
	 *
	 * - Sanitization: select
	 * - Control:      select, radio.
	 *
	 * @since  1.0.0
	 * @param  string               $input   Slug to sanitize.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return string                        Sanitized slug if it is a valid choice. Otherwise,
	 *                                       the setting default.
	 */
	function polygon_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// Return input or default value.
		if ( array_key_exists( $input, $choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_url' ) ) {

	/**
	 * URL sanitization callback example.
	 *
	 * Sanitization callback for 'url' type text inputs. This callback sanitizes $url as a valid URL.
	 *
	 * - Sanitization: url
	 * - Control:      text, url.
	 *
	 * Note: esc_url_raw() can be passed directly to the 'sanitize_callback'. This function is a simple
	 * wrapper for it.
	 *
	 * @since  1.0.0
	 * @param  string $url URL to sanitize.
	 * @return string      Sanitized URL.
	 */
	function polygon_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}
}





if ( ! function_exists( 'polygon_sanitize_email' ) ) {

	/**
	 * Sanitize email.
	 *
	 * Sanitization callback for 'email' type text controls. This callback sanitizes $email
	 * as a valid email address.
	 *
	 * - Sanitization: email
	 * - Control:      text.
	 *
	 * @since  1.0.0
	 * @param  string               $email   Email address to sanitize.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return string                        The sanitized email if not null. Otherwise,
	 *                                       the setting default.
	 */
	function polygon_sanitize_email( $email, $setting ) {
		// Sanitize $email.
		$email = sanitize_email( $email );

		// Return email or default value.
		if ( $email ) {
			return $email;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_image' ) ) {

	/**
	 * Sanitize image.
	 *
	 * Checks the image's file extension and mime type against a whitelist. If they are allowed
	 * send back the filename, otherwise, return the setting default.
	 *
	 * - Sanitization: image file extension
	 * - Control:      text, WP_Customize_Image_Control.
	 *
	 * @since  1.0.0
	 * @param  string               $image   Image filename.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return string                        The image filename if the extension is allowed.
	 *                                       Otherwise, the setting default.
	 */
	function polygon_sanitize_image( $image, $setting ) {
		// Accepted image types.
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// Return image or default value.
		if ( $file['ext'] ) {
			return $image;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_hex_color' ) ) {

	/**
	 * Sanitize Hex color.
	 *
	 * Note: sanitize_hex_color_no_hash() can also be used here, depending on whether
	 * or not the hash prefix should be stored/retrieved with the hex color value.
	 *
	 * - Sanitization: hex_color
	 * - Control:      text, WP_Customize_Color_Control.
	 *
	 * @since  1.0.0
	 * @param  string               $hex_color HEX color to sanitize.
	 * @param  WP_Customize_Setting $setting   Setting instance.
	 * @return string                          The sanitized Hex color if not null. Otherwise,
	 *                                         the setting default.
	 */
	function polygon_sanitize_hex_color( $hex_color, $setting ) {
		// Sanitize $input as a hex value with hash.
		$hex_color = sanitize_hex_color( $hex_color );

		// Return hex value or default value.
		if ( $hex_color ) {
			return $hex_color;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_dropdown_pages' ) ) {

	/**
	 * Sanitize Drop-down Pages.
	 *
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes $page_id
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control:      dropdown-pages.
	 *
	 * @since  1.0.0
	 * @param  int                  $page_id Page ID.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return int|string                    Page ID if the page is published. Otherwise,
	 *                                       the setting default.
	 */
	function polygon_sanitize_dropdown_pages( $page_id, $setting ) {
		// Make sure $input is an absolute integer.
		$page_id = absint( $page_id );

		// Return page ID or default value.
		if ( 'publish' == get_post_status( $page_id ) ) {
			return $page_id;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_number_range' ) ) {

	/**
	 * Sanitize number range.
	 *
	 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
	 * $number as an absolute integer within a defined min-max range.
	 *
	 * - Sanitization: number_range
	 * - Control:      number, tel.
	 *
	 * @since  1.0.0
	 * @param  int                  $number  Number to check within the numeric range defined by the setting.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return int|string                    The number, if it is zero or greater and falls within the defined
	 *                                       range. Otherwise, the setting default.
	 */
	function polygon_sanitize_number_range( $number, $setting ) {

		// Make sure input is an absolute integer.
		$number = absint( $number );

		// Get input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get minimum number in the range.
		if ( isset( $atts['min'] ) ) {
			$min = $atts['min'];
		} else {
			$min = $number;
		}

		// Get maximum number in the range.
		if ( isset( $atts['max'] ) ) {
			$max = $atts['max'];
		} else {
			$max = $number;
		}

		// Get step.
		if ( isset( $atts['step'] ) ) {
			$step = $atts['step'];
		} else {
			$step = 1;
		}

		// Return number or default value.
		if ( $number >= $min && $number <= $max && is_int( $number / $step ) ) {
			return $number;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_number_absint' ) ) {

	/**
	 * Sanitize number as absint.
	 *
	 * - Sanitization: number_absint
	 * - Control:      number
	 *
	 * Sanitization callback for 'number' type text inputs. This callback sanitizes $number
	 * as an absolute integer (whole number, zero or greater).
	 *
	 * Note: absint() can be passed directly to the 'sanitize_callback'. This function is a simple
	 * wrapper for it.
	 *
	 * @since  1.0.0
	 * @param  int                  $number  Number to sanitize.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return int                           Sanitized number. Otherwise, the setting default.
	 */
	function polygon_sanitize_number_absint( $number, $setting ) {
		// Make sure $number is an absolute integer.
		$number = absint( $number );

		// Return number or default value.
		if ( $number ) {
			return $number;
		} else {
			return $setting->default;
		}
	}
}





if ( ! function_exists( 'polygon_sanitize_css' ) ) {

	/**
	 * Sanitize CSS.
	 *
	 * Sanitization callback for 'css' type textarea inputs. This callback sanitizes
	 * $css for valid CSS.
	 *
	 * - Sanitization: css
	 * - Control:      text, textarea
	 *
	 * Note: wp_strip_all_tags() can be passed directly to the 'sanitize_callback'. This
	 * function is a simple wrapper for it.
	 *
	 * @since  1.0.0
	 * @param  string $css CSS to sanitize.
	 * @return string      Sanitized CSS.
	 */
	function polygon_sanitize_css( $css ) {
		return wp_strip_all_tags( $css );
	}
}





if ( ! function_exists( 'polygon_sanitize_html' ) ) {

	/**
	 * Sanitize HTML.
	 *
	 * Sanitization callback for 'html' type text inputs. This callback sanitizes $html
	 * for HTML allowable in posts.
	 *
	 * - Sanitization: html
	 * - Control:      text, textarea
	 *
	 * Note: wp_kses_post() can be passed directly to the 'sanitize_callback'. This
	 * function is a simple wrapper for it.
	 *
	 * @since  1.0.0
	 * @param  string $html HTML to sanitize.
	 * @return string       Sanitized HTML.
	 */
	function polygon_sanitize_html( $html ) {
		return wp_kses_post( $html );
	}
}





if ( ! function_exists( 'polygon_sanitize_nohtml' ) ) {

	/**
	 * Sanitize No-HTML.
	 *
	 * Sanitization callback for 'nohtml' type text inputs. This callback sanitizes $nohtml
	 * to remove all HTML.
	 *
	 * - Sanitization: nohtml
	 * - Control:      text, textarea, password.
	 *
	 * Note: wp_filter_nohtml_kses() can be passed directly to the 'sanitize_callback'. This
	 * function is a simple wrapper for it.
	 *
	 * @since  1.0.0
	 * @param  string $nohtml The no-HTML content to sanitize.
	 * @return string         Sanitized no-HTML content.
	 */
	function polygon_sanitize_nohtml( $nohtml ) {
		return wp_filter_nohtml_kses( $nohtml );
	}
}





if ( ! function_exists( 'polygon_sanitize_null' ) ) {

	/**
	 * Sanitize Null.
	 *
	 * Sanitization callback for presentation elements like hidden fields or
	 * subsections.
	 *
	 * - Sanitization: null
	 * - Control:      text, subsection.
	 *
	 * @since  1.0.0
	 * @param  string $null Option to sanitize.
	 * @return null         Return null.
	 */
	function polygon_sanitize_null( $null ) {
		return null;
	}
}
