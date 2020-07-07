<?php
/**
 * Template Name: blog
 *
 * EXPÉRIMENTAL
 * Affichage des pages sous forme d'une grille de vignettes
 *
 * @package WordPress
 * @subpackage Mimimal
 */

get_header(); ?>

<?php the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>


<!--Main Section-->
<div class='row'>
    <div class='col-lg-12'>

        <?php
          $pages = get_pages(array( 'sort_order' => 'post_date', 'sort_column' => 'menu_order' ));
          echo '<div class="row">';
   
            foreach ( $pages as $page ) {
                  $post = get_post($page->ID);          
                                    
                  //echo '<div class="col-lg-4">';
                  //echo '<div class="card bg-light text-dark rounded-0">';
        
                  $cardCtnt = "";
                  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                  if($featured_img_url){
                    // $cardCtnt = '<img class="card-img" src="' . $featured_img_url . '"/>';
                    $cardCtnt = '<a href="' . get_page_link( $page->ID ) . '" class=".card-link"><img class="card-img" src="' . $featured_img_url . '" /></a>';
                    //$cardCtnt .= '<div class="card-body"><a href="' . get_page_link( $page->ID ) . '" class="card-link">' . $page->post_title . '</a></div>';
                  }
                       
                  echo $cardCtnt;
                  //  echo '</div>'; /*lg-4*/  
                  //echo '</div></div>'; /*lg-4+card*/
             } 
           ?>

    </div>
    <!--col-->
</div>
<!--row-->


<?php get_sidebar(); ?>
<?php get_footer(); ?>