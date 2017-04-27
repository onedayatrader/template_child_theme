<?php
/**
 * Description
 *
 * @package core-theme\functions
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme\Functions;


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts_and_styles' );
/**
 * Enqueue Scripts and Styles:
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_scripts_and_styles() {

	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	// check for js script in \assets\js\responsive-menu.js , which has been copied over from genesis-sample
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . "/assets/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_localize_script(
		CHILD_TEXT_DOMAIN . '-responsive-menu',
		'genesis_responsive_menu',
		responsive_menu_settings()
	);
}


/**
 * define our responsive menu settings.
 *
 * @since 1.0.0
 *
 * @return array
 */
function responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', CHILD_TEXT_DOMAIN ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}
