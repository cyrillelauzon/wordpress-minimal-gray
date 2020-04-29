<?php
/**
 * Single.php
 * Affichage d'un article avec option d'utiliser la variable de page wordpress
 * hide_navigation afin d'afficher une page en plein écran.
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>



<div class='row'>
<?php  the_post(); ?>

        
  <!-- Colonne de type side bar-->  
  <?php 
    $page_id = get_queried_object_id();
    $hide_sideBar = get_post_custom_values( "hide_side_bar", $page_id );
    if($hide_sideBar[0] != "1") :
  ?>
  <div class='col-lg-2'>
                <!-- Titre du post-->          
            <a href=<?php get_site_url()?>"/cyrillenotes/blog"><h1><?php the_title(); ?></h1></a>

            <!-- Date du post-->
            <a href=<?php get_site_url()?>"/cyrillenotes/blog"><p style="margin-bottom:0px;"><?php the_date(); ?></p></a>

            <!-- Affichage des catégories du post-->
            <?php $taxonomy = 'category';
            // Get the term IDs assigned to post.
            $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
            if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
            
                $term_ids = implode( ',' , $post_terms );
                $terms = wp_list_categories( array(
                    'title_li' => '',
                    'style'    => 'list',
                    'echo'     => false,
                    'taxonomy' => $taxonomy,
                    'include'  => $term_ids
                ) );
            
                // Display post categories.
               // echo '<ul>' . $terms . '</ul>';
            }       
            ?> 

    </div> <!-- col -->
    <?php endif ?>




    <!-- Colonne contenant le post en tant que tel-->  
    <div style="margin-top:20px;" class='col-lg-10'>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
                             
        <!-- Gestion d'un post en plein écran, lien de retour vers site-->  
        <?php if($hide_navigation[0] == 'TEMP') : ?>
                <a class="backlink" href=<?php get_site_url()?>"cyrillenotes/blog/">Retour</a>
        <?php endif ?>
        <?php edit_post_link(); ?>
    </div><!-- col -->


</div><!-- row -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>