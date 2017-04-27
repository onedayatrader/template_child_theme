<?php
/**
 * Description
 *
 * @package core-theme\structure
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme\Structure;


add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\modify_size_of_gravatar_in_authorbox' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function modify_size_of_gravatar_in_authorbox( $size ) {
	return 90;
}