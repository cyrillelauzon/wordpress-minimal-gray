<?php
/**
 * Index.php
 * Affichage de la liste des articles sous forme de liste avec résumés
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Twenty Thirteen 1.0
 */

get_header();?>

<div class='row'>

    <div class='col-lg-2'>
    <!--     <hr/> -->
  
        <!--Affichage de la liste des derniers articles-->
        <h1>&nbsp;</h1>
        <p>&nbsp;</p><br>
        <?php wp_list_categories(array( 'title_li' => '', 'show_option_all' => 'Tout' ));
                    
        //Affichage de tous les tags
        $tags = get_tags(array('get'=>'all'));
        $output = "<br>";
        if($tags) {
            foreach ($tags as $tag):
            $output .= '<a href="'. get_term_link($tag).'">'. $tag->name .'</a><br>';
            endforeach;
        } 
        echo $output;
        

        ?>
    
    </div><!-- col-lg-2-->



    <div class='col-lg-10'>
    
    <!--Affichage breadcrump des catégories-->
    <?php $catCourant = single_cat_title( '', false );  
            if($catCourant == "") $catCourant = "";
            else $catCourant = " / " . $catCourant;
            $catCourant = "<h1 style='color:rgba(0, 0, 0, 0.9)'><a style='color:rgba(0, 0, 0, 0.9)'href='" . get_site_url() . "/cyrillenotes/blog'>Carnet d'écriture</a> " . $catCourant . "</h1>";
            echo $catCourant;
        ?>

        <p>Une archive fictive regroupant fragments d’écritures, photographies, vidéos et pensées sans projet.</p>



        <div class="row"> 
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();?>

         
                <!--Taille de la vignette  Défaut = 3. Sinon avec variable de page thumbnail_post_size-->
                <?php $postThumbSize = get_post_custom_values( "thumbnail_post_size", $post->ID );
                      $postSize = 3; 
                      if($postThumbSize[0] > 0 && $postThumbSize[0] < 10) $postSize = $postThumbSize[0]; 
                
                echo "<div class = 'col-lg-". $postSize ."'>";
                ?>
                
                <!--BLOG-POST-->
                <div id="post-<?php the_ID();?>" <?php post_class();?>>    
                 <div class="blog-post">

                            <!-- Carte de post avec apparence de polaroid -->    
                            <div class="card card-hover bg-light text-dark rounded-0">
                            <div class="card-body">
                                
                                    <!-- Titre et dates qui apparaissent lors de hover de la carte -->    
                                    <div class="reveal-desc card-text">
                                          <a href="<?php the_permalink();?>"> 
                                            <p style = "margin-bottom:5px;"><?php the_date();?></p>
                                            <p style="margin-top:5px; font-weight:bold;"><?php the_title();?></p>
                                          </a>
                                    </div> 
    
                                    <!-- Image -->  
                                    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');   ?>
                                    <?php echo '<a href="' . get_page_link( $page->ID ) . '" class=".card-link"><img class="card-img" src="' . $featured_img_url . '">'; ?></a>
                                    
                                    <!-- Tags associés au post en bas de la carte -->
                                    <div class="reveal-tags card-text">
                                        <p><?php echo get_the_tag_list('', ',&nbsp;', '',  $post->ID);  ?>&nbsp;</p>
                                    </div> 
                                    
                                </div><!-- card body -->
                            </div> <!-- card -->
                                   

                        </div><!-- class=blog-post -->
                    </div>  <!-- id Post ID --> 
                </div>  <!-- col-lg-3 --> 
                
            

            <br>
            <?php endwhile; /* rewind or continue if all posts have been fetched */?>

            <?php next_posts_link('Page Suivante');?>
            <?php previous_posts_link('Page Précédente');?>
            <?php else: ?>
            <?php endif;?>

    </div> <!--row -->


    </div><!-- col -->
</div><!-- row -->

<?php get_footer();?>