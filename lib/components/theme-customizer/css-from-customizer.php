<?php
/**
 * This file adds the required CSS to the front end to the Genesis Sample Theme
 * from the customizer options screen
 *
 * @package core-theme\lib
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme\lib\components;


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\get_css_from_customizer' );
/**
* Checks the settings for the link color, and accent color.
* If any of these value are set the appropriate CSS is output.
*
* @since 1.0.0
*/
function get_css_from_customizer() {

	$prefix = get_theme_mod_name_prefix();

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$color_link = get_theme_mod( $prefix . '_link_color', get_default_link_color_from_customizer() );
	$color_accent = get_theme_mod( $prefix . '_accent_color', get_default_accent_color_from_customizer() );

	$css = '';

	$css .= ( get_default_link_color_from_customizer() !== $color_link ) ? sprintf( '

		a,
		.entry-title a:focus,
		.entry-title a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover {
			color: %s;
		}

		', $color_link ) : '';

	$css .= ( get_default_accent_color_from_customizer() !== $color_accent ) ? sprintf( '

		button:focus,
		button:hover,
		input[type="button"]:focus,
		input[type="button"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		.archive-pagination li a:focus,
		.archive-pagination li a:hover,
		.archive-pagination .active a,
		.button:focus,
		.button:hover,
		.sidebar .enews-widget input[type="submit"] {
			background-color: %s;
			color: %s;
		}
		', $color_accent, calculate_color_contrast( $color_accent ) ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
