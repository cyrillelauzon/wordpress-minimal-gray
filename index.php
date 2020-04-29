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
    <div class='col-lg-12'>
    
    <!--Affichage breadcrump des catégories-->
    <?php $catCourant = single_cat_title( '', false );  
            if($catCourant == "") $catCourant = "";
            else $catCourant = " / " . $catCourant;
            $catCourant = "<h1 style='color:rgba(0, 0, 0, 0.9)'><a style='color:rgba(0, 0, 0, 0.9)'href='" . get_site_url() . "/cyrillenotes/blog'>Carnet d'écriture</a> " . $catCourant . "</h1>";
            echo $catCourant;
        ?>

        <p>Une archive regroupant fragments d’écritures, photographies, vidéos et pensées sans projet.</p>


            <!-- TODO trouver une solution d'affichage pour Catégories et tags (possiblement dans une carte) -->
<!--             <p class="text-highlight">Catégories</p>
                <p>
                    <?php 
                    $categories = get_categories(array('get'=>'all'));
                    $catList = "";
                    if($categories) {
                        foreach ($categories as $categorie):
                        $catList .= '<a href="'. get_term_link($categorie).'">'. $categorie->name .'</a>&nbsp&nbsp;';
                        endforeach;
                    } 
                   echo $catList;?>
                </p>
 -->
            <!--Affichage de la liste des tags -->
                
            <!--     <p class="text-highlight">Mots clés</p>
                <p>
                <?php 
                $tags = get_tags(array('get'=>'all'));
                $tagList = "";
                if($tags) {
                    foreach ($tags as $tag):
                    $tagList .= '<a href="'. get_term_link($tag).'">'. $tag->name .'</a>&nbsp&nbsp;';
                    endforeach;
                } 
                echo $tagList;?>
                </p> -->



        <div class="row"> 
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();?>

         
                <!--Taille de la vignette  Défaut = 3. Sinon avec variable de page thumbnail_post_size-->
                <?php 
                $postThumbSize = get_post_custom_values( "thumbnail_post_size", $post->ID );
                $postSize = 3; 
                if($postThumbSize[0] > 0 && $postThumbSize[0] < 10) $postSize = $postThumbSize[0]; 
                
                //Possibilité de cacher un article de la liste des articles
                $hide_postFromListing = get_post_custom_values( "hide_post_from_listing", $post->ID  );
                if($hide_postFromListing[0] != "1") :
                echo "<div class = 'col-lg-". $postSize ."'>";
                ?>
                
                <!--BLOG-POST-->
                <div id="post-<?php the_ID();?>" <?php post_class();?>>    
                 <div class="blog-post">

                            <!-- Carte de post avec apparence de polaroid -->    
                            <div class="card carte-reversible bg-light text-dark rounded-0">
                            <div class="card-body">

                            <?php 
                                //Possibilité d'afficher une carte avec image sur le dessus ou à l'endos : excerpt et titre sur dessus
                                //Image sur le dessus = top, Texte sur le dessus = back
                                $cardSide = "top";
                                $invertedThumbnail = get_post_custom_values( "inverted-thumbnail", $post->ID  );
                                if($invertedThumbnail [0] == "1") $cardSide = "back";
                                
                                    echo '<div class="card-text card-description-'. $cardSide .'">';
                            ?>

                                    <!-- Titre et dates qui apparaissent lors de hover de la carte -->                                        
                                          <a href="<?php the_permalink();?>"> 
                                            <p class="text-highlight" style="margin-top:5px;"><?php the_title();?></p>
                                            <p><?php  the_excerpt();?></p>
                                          </a>
                                    </div> 
    
                                    <!-- Image sur dessus de la carte -->  
                                    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');   ?>
                                    <?php echo '<a href="' . get_page_link( $page->ID ) . '" class=".card-link"><img class="card-img-'. $cardSide .'" src="' . $featured_img_url . '">'; ?></a>


                                    <!-- Zone d'affichage en bas de la carte -->
                                    <div class="card-text card-zone-bas">
                                        <!-- <p><?php echo get_the_tag_list('', ',&nbsp;', '',  $post->ID);  ?>&nbsp;</p> -->
                                        <p style = "margin-bottom:5px;"><?php the_date();?></p>
                                    </div> 

                                </div><!-- card body -->
                            </div> <!-- card -->
                                   
                        </div><!-- class=blog-post -->
                    </div>  <!-- id Post ID --> 
                </div>  <!-- col-lg-3 --> 
                <?php endif ?>
                
            

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