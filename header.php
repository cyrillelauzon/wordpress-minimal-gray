<?php
/**
 * Section Principale du theme
 * Cyrille Lauzon
 *
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Mimimal 1.0
 */
?><!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
    <!--  Titre-->
    <title><?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
    
    <!-- La petite icon du site-->
    <!--<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />-->

    <!-- Bootstrap CSS-->   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Style.css-->    
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    

    <!-- Inclusions Bootstrap JS -->
    
    <?php    wp_head(); ?>
 
  </head>



 <body>
    <main role="main" class="container">

        <!-- Affichage d'une image en fond de page qui couvre toute la page -->
        <?php 
            $post = get_post($page->ID);          
            $image_Path = get_post_custom_values( "background_image", $post->ID );

            if($image_Path[0]) {
              $image_Path = get_site_url() . $image_Path[0];
              echo('<img src="'. $image_Path .'" id="backgroundCoverImage" alt="">');
            } 
        ?>
        

        <!-- Barre Navigation -->
        <?php 
          $page_id = get_queried_object_id();
          $hide_navigation = get_post_custom_values( "hide_navigation", $page_id );
          if($hide_navigation[0] != "1") :
        ?>
                   
            <nav class="navbar navbar-expand-sm navbar-light" data-toggle="affix">
                               
              <div class="d-sm-flex d-block flex-sm-nowrap">
                      <!-- Titre du blogue -->
                      <a class="navbar-brand align-baseline" href="<?php echo home_url(); ?>"><?php bloginfo('name');?></a>   
                      
                      <!-- Menu de Navigation -->
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
              
                      <?php $defaults = array(
                          'theme_location'  => '',
                          'menu'            => '',
                          'container'       => 'div',
                          'container_class' => 'collapse navbar-collapse text-center',
                          'container_id'    => 'mainNav',
                          'menu_class'      => 'navbar-nav align-baseline',
                          'menu_id'         => 'test',
                          'echo'            => true,
                          'fallback_cb'     => 'wp_page_menu',
                          'before'          => '',
                          'after'           => '',
                          'link_before'     => '',
                          'link_after'      => '',
                          'depth'           => 0,
                          'walker'          => ''
                        );
                        
                        wp_nav_menu( $defaults ); 
                      ?>
              </div>
            </nav><!-- Barre Navigation -->
            <hr/>

        <?php endif ?>


            

       




