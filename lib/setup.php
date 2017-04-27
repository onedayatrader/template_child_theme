<?php
/**
 * Description
 *
 * @package core-theme
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme;



add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15);
/**
 * setup the child theme:
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {

	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

	unregister_genesis_callbacks();

	add_theme_supports();

	add_additional_image_sizes();
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	unregister_menu_callbacks();
}


/**--------------------------------------------------------------------------------------------------------------------
 * adds theme supports to the site:
 *
 * the function contains refactored versions of the: add_theme_support, found in the genesis-sample functions file.
 * the individual calls have been combined into an array of arrays, for example:
 * add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) ); becomes:
 * 'html5' => array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' )
 * in the above example, 'html5' is the feature being added and becomes the key when refactored into an array
 *
 * @since 1.0.0
 *
 * @return void
 ---------------------------------------------------------------------------------------------------------------------*/
function add_theme_supports(){

	$config = array(
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		'genesis-responsive-viewport'     => null,
		'custom-header'                   => array(
			'width'           => 600,
			'height'          => 160,
			'header-selector' => '.site-title a',
			'header-text'     => false,
			'flex-height'     => true,
		),
		'custom-background'               => null,
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 3,
		'genesis-menus'                   => array(
			'primary'   => __( 'After Header Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
		),
	);

	foreach ( $config as $feature => $args ){
		add_theme_support( $feature, $args );
	}
}


/**
 * add additional featured image sizes to site:
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_additional_image_sizes(){
	$config = array(
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
	);

	foreach ( $config as $name => $args ){
		$crop = array_key_exists( 'crop', $args) ? $args[ 'crop' ] : false;
		add_image_size( $name, $args[ 'width'], $args['height'], $crop );
	}
}

/*----------------------------------------------------------------------------------------------------------------------
/ copied from: https://github.com/KnowTheCode/Genesis-Developer-Starter-Lab/blob/master/developers/lib/setup.php#L110
----------------------------------------------------------------------------------------------------------------------*/
add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
 * Set theme settings defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config = get_theme_settings_defaults();

	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}

	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 12,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);
}