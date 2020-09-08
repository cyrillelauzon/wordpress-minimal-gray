

</main><!-- container -->

<footer>
    <div class="container-lg">

        <?php
              //Read the tag to search for in other posts
              $relatedPostsTag = get_post_custom_values( "related-posts-tag", $post->ID );
              $querySearchTag = "NULL";
              if($relatedPostsTag[0]) {
                $querySearchTag = $relatedPostsTag[0];
              } 

              //Building the WP_query so related pages contains the tag slug stored in related-posts-tag
              $args = array(
                'post_type' => 'page',
                'tag' => $querySearchTag,
                'posts_per_page' => 10,
              );
              $query = new WP_Query($args);
          
          
              //Affichage de cartes de post/pages reliées en bas de la page à l'aide de l'image à la une Wordpress
              if ($query->have_posts()) :
                echo ('<h5 class="footer-title">À voir également</h5>');
                while ($query->have_posts()) :
                  
                  $post = get_post($query->the_post()); 
                  $cardCtnt = "";
                  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                  if($featured_img_url){
                    
                    //TEMP code pour afficher des cartes bootstrap plain à la place de mini-bannières
                    /* $cardCtnt = '<div class="col-lg-12">';
                    $cardCtnt .= "<div class='card'>";
                    $cardCtnt .= '<a href="' . get_page_link( $post->ID ) . '" class=".card-link"><img class="card-img-top" src="' . $featured_img_url . '" /></a>';
                    $cardCtnt .= '<div class="card-body"><a href="' . get_page_link( $post->ID ) . '" class="card-link">' . $post->post_title . '</a></div></div></div>'; */

                    $cardCtnt = '<div class="related-post-banner">';
                    $cardCtnt .= '<a href="' . get_page_link( $post->ID ) . '" class=".card-link"><img class="card-img-top" src="' . $featured_img_url . '" /></a>';
                    $cardCtnt .= '<a href="' . get_page_link( $post->ID ) . '" class="card-link">' . $post->post_title . '</a></div>';
                  }
                  
                  echo $cardCtnt;
               
               ?>
        <?php endwhile; else: ?>
        <?php endif; wp_reset_query(); ?>
        <a href="" class="legende-sous-titre" onclick="RetourHautPage();">Haut de la page</a>
        <p class="legende-sous-titre">Copyright © Suzan Vachon </p>
        


</footer>


<!-- Inclusions bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>


<script>InitWindow();</script>


<?php wp_footer(); ?>
</body>

</html>