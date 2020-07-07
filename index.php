<?php
/**
 * index.php
 * 
 * Affichage des articles complets de la section nouvelle avec gestion de la pagination
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<!--BLOG-POST-->
<div class="blog-main colMain">

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">

            <!-- <hr/> -->
            <h2><?php the_title(); ?></h2>
            <p><?php the_date(); ?></p>


            <!-- <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?> -->

            <?php the_content(); ?>

            <?php edit_post_link(); ?>
            <?php wp_link_pages(); ?>


            <!--   <div class="post-footer"> -->

            <!--  <div class="blog-date"><?php the_time( 'M j y' ); ?></div> -->
            <!-- <div class="comments"><?php comments_popup_link( 'Pas de commentaires', '1 commentaire', '% commentaires' ); ?></div> -->
            <!-- </div>end post footer-->

        </div>
    </div>
    <!--end post-->


    <?php endwhile; /* rewind or continue if all posts have been fetched */  ?>
    <div class="navigation index">
        <div class="alignleft"><?php next_posts_link( 'Articles précédents' ); ?></div>
        <div class="alignright"><?php previous_posts_link( 'Articles suivants' ); ?></div>
    </div>
    <!--end navigation-->
    <?php else : ?>
    <?php endif; ?>



    <?php get_sidebar(); ?>
    <?php get_footer(); ?>