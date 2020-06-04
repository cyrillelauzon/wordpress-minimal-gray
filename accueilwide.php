<?php
/**
 * Template Name: accueilwide
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts togogher the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mimimal
 */

get_header(); ?>

  
  <?php the_post(); ?>
  </main><!-- container -->





  <!--Main Section-->
  <div class='container-fluid'>
    <div class='row-fluid'>

      <div class='col-lg-7 mx-auto'>

          <?php the_content(); ?>
        
      </div><!--col-->
    </div><!--row-->
</div><!--container-fluid-->


<?php get_sidebar(); ?>
<?php get_footer(); ?>



