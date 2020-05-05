<?php
/**
 * Page.php
 * Affichage d'une page singulière
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<?php the_post(); ?>



    <h2><?php the_title(); ?></h2> 
   
   
   
    <?php the_content(); ?>
    <?php edit_post_link(); ?>
    <?php wp_link_pages(); ?>


<?php get_footer(); ?>