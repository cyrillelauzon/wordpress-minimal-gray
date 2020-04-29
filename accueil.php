<?php
/**
 * Template Name: accueil
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>



  <!--Main Section-->
    <div class='row'>

      <div class='col-lg-10'>

          <?php
          $pages = get_pages(array( 'sort_order' => 'post_date', 'sort_column' => 'menu_order' ));
          echo '<div class="row">';
   

            foreach ( $pages as $page ) {

             $post = get_post($page->ID);          
              $hideHomepage = get_post_custom_values( "hide_homepage", $post->ID );
              
              if ($hideHomepage[0] == "1"){}
              else {

                        $postThumbSize = get_post_custom_values( "thumbnail_post_size", $post->ID );
                        if(!$postThumbSize){
                            $postThumbSize = 4;          
                        } 
                        else{
                          foreach ( $postThumbSize as $key => $value ) {
                            $postThumbSize = $value;
                        }
                        }
                          
                        
                          echo '<div class="col-lg-'. $postThumbSize . '">';
                          echo '<div class="card bg-light text-dark rounded-0">';
               

                          $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                          $cardCtnt = '<img class="card-img" src="' . $featured_img_url . '"/>';
                          $cardCtnt = '<a href="' . get_page_link( $page->ID ) . '" class=".card-link"><img class="card-img" src="' . $featured_img_url . '"</a>';
                          $cardCtnt .= '<div class="card-body"><a href="' . get_page_link( $page->ID ) . '" class="card-link">' . $page->post_title . '</a></div>';
                          
                          echo $cardCtnt;
                    //  echo '</div>'; /*lg-4*/  
                       echo '</div></div>'; /*lg-4+card*/

          
                    } 
            } /*for each*/  ?>
        
      </div><!--col-->
    </div><!--row-->


<?php get_sidebar(); ?>
<?php get_footer(); ?>



