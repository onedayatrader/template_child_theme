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

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\modify_size_of_gravatar_in_entry_comments' );
/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array mixed
 */
function modify_size_of_gravatar_in_entry_comments( array $args ) {

	$args['avatar_size'] = 60;

	return $args;
}