<?php
/**
 * header.php
 * Section Principale du theme
 * Cyrille Lauzon
 *
 *
 * @package WordPress
 * @subpackage Mimimal
 * @since Mimimal 1.0
 */
?>
<!doctype html>
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

    <!-- favicon-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Style.css-->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

    <?php wp_head(); ?>

</head>


<body id="css-overrides">
    <main role="main" class="container-lg">

        <!-- Affichage d'une image en fond de page qui couvre toute la page -->
        <?php 
            $post = get_post($page->ID);          
            $image_Path = get_post_custom_values( "background_image", $post->ID );

            if($image_Path[0]) {
              $image_Path = get_site_url() . $image_Path[0];
              echo('<img src="'. $image_Path .'" id="backgroundCoverImage" alt="">');
            } 
        ?>

        <!-- Barre de Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light" data-toggle="affix">
     
                <!-- Titre du blogue -->
                <a class="navbar-brand align-baseline" href="<?php echo home_url(); ?>"><?php bloginfo('name');?></a>

                <!-- Menu de Navigation -->
                <button class="navbar-toggler" type="button" data-toggle="modal" 
                    aria-expanded="false" aria-label="Toggle navigation" onclick="PlaySlideIn();">
                    <span id="toggler-button" class="navbar-toggler-icon"></span>
                </button>
               
                
                <!-- Menu sur desktop -->
                <?php 
                    wp_nav_menu( array(
                        'theme_location'	=> 'primary',
                        'depth'				=> 2, 
                        'container'			=> 'div',
                        'container_class'	=> 'collapse navbar-collapse',
                        'container_id'		=> 'mainNavMenuItemsDesktop',
                        'menu_class'		=> 'navbar-nav',
                        'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                        'walker'			=> new WP_Bootstrap_Navwalker()
                        ) );?>


                <!-- Boite de dialogue Modale sur mobile -->
                <div id="modalMenu" class="modal">
                    
                    <div class="nav-title-wrapper-mobile">                    
                        <!-- Titre du blogue -->
                        <a class="navbar-brand navbar-brand-mobile align-baseline" href="<?php echo home_url(); ?>"><?php bloginfo('name');?></a> 
                        
                        <!-- Boutton fermer -->
                        <button class="navbar-toggler" type="button" data-toggle="modal" 
                        aria-expanded="false" aria-label="Toggle navigation" onclick="PlaySlideOut();" >
                        <span id="close-button" class="navbar-toggler-icon"></span>
                        </button> <hr/>
                    </div>
                   

                    <?php 
                        wp_nav_menu( array(
                            'theme_location'	=> 'primary',
                            'depth'				=> 2, 
                            'container'			=> 'div',
                            'container_class'	=> '',
                            'container_id'		=> 'mainNavMenuItemsMobile',
                            'menu_class'		=> 'navbar-nav',
                            'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                            'walker'			=> new WP_Bootstrap_Navwalker()
                            ) );?>
                </div>
        
        </nav><!-- Barre de Navigation -->
        <hr/>