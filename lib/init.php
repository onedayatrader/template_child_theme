<?php
/**
 * Description
 *
 * @package core-theme\lib
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme\lib;


/**
 * define child themes constants
 *
 * @since 1.0.0
 *
 * @return void
 */
function initialise_constants(){

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	//define( 'CHILD_URL', get_stylesheet_directory_uri() );
	// define any folders in child theme as below
	// define( 'CHILD_folderXYZ_DIR', CHILD_THEME_DIR . '/folderXYZ/' );
}

initialise_constants();



