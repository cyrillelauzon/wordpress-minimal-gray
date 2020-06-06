<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Fourteen 1.0
 */

 //Enregistrement de l'utilitaire boostrap qui permet de générer le menu principal
 //  https://wp-bootstrap.github.io/wp-bootstrap-navwalker/
 require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

 register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'mimimal' ),
) );


add_theme_support( 'dark-editor-style' );
add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );

add_theme_support('post-thumbnails');
set_post_thumbnail_size(190, 150);



//Enregistrement du style pour Editeur Gutemberg
function mytheme_setup_theme_supported_features() {
    add_theme_support( add_theme_support('editor-styles'));
}
 
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
add_editor_style( 'style-editor.css' );
add_editor_style('Quicksand');
add_editor_style('Lato');


//Cacher les commentaires dans le caroussel Jetpack
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

?>