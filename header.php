<?php 
/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
 * 
 */?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
       
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
        <? wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrap">
            <header id="header" class="row">
                <div class="container">
                <nav id="navigate">
                    <a href="#" class="showMenu">Menu</a>
                         <?php wp_nav_menu( array(
						'container'=>'',
						'theme_location' =>'primary',
						'menu' => 'Primary Main',
						'menu_class'=>'nav'
						)); ?>
                </nav>
                </div>
                <div class="container">
                    <?php 
                        global $simplefluid_options;
                        $settings = get_option( 'simplefluid_options', $simplefluid_options );
                    ?>
                    <h1 class="logohead container">
                    <a href="<?php echo site_url(); ?>">
                    	<?php if($settings['header_title'] != '') {?>
                    	<?php echo $settings['header_title']; } else { ?>Lorem Ipsum<?php } ?></a></h1>
                        
                    <p class="lang container">
                    <?php if($settings['header_text'] != ''){ ?>
                        <?php echo $settings['header_text']; } else { ?>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus pharetra bibendum. Pellentesque dolor justo, suscipit nec turpis in, tempus aliquam nulla. Praesent pellentesque commodo sapien non iaculis.<?php } ?></p>
                </div>
            </header>
                <section id="main-section" class="row">
                     <div class="container">
