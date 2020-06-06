<?php
function displayPagesThumbs(){
   // $i = "<div class='row'><div class='col-lg-12'>";
    $pages = get_pages(array( 'sort_order' => 'post_date', 'sort_column' => 'menu_order' ));
   // $i .= '<div class="row">';

    $i = "";

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
                    
                    
                    $i .= $cardCtnt;
              //  echo '</div>'; /*lg-4*/  
                 //echo '</div></div>'; /*lg-4+card*/

    
              } 
           //   $i .= "</div></div>";
    return $i;
}

?>