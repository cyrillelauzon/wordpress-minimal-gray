<?php
/**
 * functions.php
 * 
 * Déclarations Wordpress globales et activations des fonctions du thème
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


//Editeur Gutenberg
add_theme_support( 'dark-editor-style' );
add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );

add_theme_support('post-thumbnails');
set_post_thumbnail_size(190, 150);

function mytheme_setup_theme_supported_features() {
    add_theme_support( add_theme_support('editor-styles'));
}
 
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
add_editor_style( 'style-editor.css' );
add_editor_style('Quicksand');
add_editor_style('Lato');


//Carrousel Jetpack : fonction qui masque les commentaires d'usager
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

add_action('wp_enqueue_scripts', 'qg_enqueue');
function qg_enqueue() {
    wp_enqueue_script(
        'qgjs',
        get_template_directory_uri().'/js/mainscripts.js'
    );
}

?>