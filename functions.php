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


//Shortcode pour retour facile vers cyrillelauzon.blog à partir d'un article
//Si jamais le site migre vers une nouvelle adresse, aucun changement ne sera nessaire
function return_link_to_blog_function(){
    $i = '<a class="backlink" href="' . get_site_url() . '/blog">Retour</a>';
    return $i;
}

function register_shortcodes(){
    add_shortcode('retour', 'return_link_to_blog_function');
}
register_shortcodes();

//Enregistrement du menu principal
function register_my_menu() {
   register_nav_menu( 'primary', 'Primary Menu' );
  update_option('image_default_link_type','none');
}

#add_action( 'init', 'register_my_menu' );
add_action('after_setup_theme', 'register_my_menu');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(190, 150);


//Enregistrement du style pour Editeur Gutemberg
function mytheme_setup_theme_supported_features() {
    add_theme_support( add_theme_support('editor-styles'));
}
 
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
add_editor_style( 'style-editor.css' );


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