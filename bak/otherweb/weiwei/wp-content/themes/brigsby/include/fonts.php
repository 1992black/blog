<?php
/**
 * Functions for sending list of fonts available.
 *
 * @package    Hoot
 * @subpackage Brigsby
 */

/**
 * Build URL for loading Google Fonts
 * @credit http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hoot_google_fonts_enqueue_url() {
	$fonts_url = '';
	$query_args = apply_filters( 'hoot_google_fonts_enqueue_url_args', array() );

	/** If no google font loaded, load the default ones **/
	if ( !is_array( $query_args ) || empty( $query_args ) ):
 
		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$pacifico = ( 'cursive' == hoot_get_mod( 'logo_fontface' ) ) ? _x( 'on', 'Pacifico font: on or off', 'brigsby' ) : 'off';

		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$open_sans = _x( 'on', 'Open Sans font: on or off', 'brigsby' );

		if ( 'off' !== $pacifico || 'off' !== $open_sans ) {
			$font_families = array();

			if ( 'off' !== $pacifico ) {
				$font_families[] = 'Pacifico';
			}

			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open Sans:300,400,400italic,700,700italic,800';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				//'subset' => urlencode( 'latin,latin-ext' ),
				'subset' => urlencode( 'latin' ),
			);

		}

	endif;

	if ( !empty( $query_args ) )
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Modify the font (websafe) list
 * Font list should always have the form:
 * {css style} => {font name}
 *
 * @since 1.0
 * @access public
 * @return array
 */
function hoot_theme_fonts_list( $fonts ) {
	// Add open sans (google font) to the available font list
	// Even though the list isn't currently used in customizer options,
	// this is still needed so that sanitization functions recognize the font.
	$fonts['"Open Sans", sans-serif'] = 'Open Sans';
	$fonts['"Pacifico", sans-serif'] = 'Pacifico';
	return $fonts;
}
add_filter( 'hybridextend_fonts_list', 'hoot_theme_fonts_list' );