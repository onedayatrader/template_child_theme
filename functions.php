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


// Start the child themes initialisation.
include_once( '/lib/init.php' );


// call autoload to load all other child theme files
include_once( '/lib/functions/autoload.php' );


// Start the genesis framework
include_once( get_template_directory() . '/lib/init.php' );


