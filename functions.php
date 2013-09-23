<?php

//This is the call to the theme options
require_once ( get_stylesheet_directory() . '/includes/sarasota-options.php' );

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Sarasota supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 * 
 */
function sarasota_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	//add_theme_support('nav-menu');
	register_nav_menu( 'primary', __( 'Primary Menu', 'sarasota' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => '', 'default-image' => '', 'wp-head-callback' => '_custom_background_cb', 'admin-head-callback' => '', 'admin-preview-callback' => ''
	));

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	
	//Custom Header Support
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'sarasota_setup' );

/*
* Adds Excepts to Posts and Pages
*
*/
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'my_add_excerpts_to_pages' );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<br/><a class="moretag" href="'. get_permalink($post->ID) . '"><button>Read More</button></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Registers our main widget area and the front page widget areas.
 *
 */
function sarasota_widgets_init(){
        
        register_sidebar(array(
            'name'=>__('Side-bar Widget', 'sarasota'),
            'id'=>'sidebar',
            'description'=>__('Appears on the index, post and pages templates','sarasota'),
            'before_widget'=>'<div class="panel">',
            'after_widget'=>'</div>',
            'before_title'=>'<div class="panel-heading"><h3 class="panel-title">',
            'after_title'=>'</h3></div>'
        ));
 }
add_action('widgets_init','sarasota_widgets_init');

/**
 * Removes div from wp_page_menu() and replace with ul.
*/
function responsive_wp_page_menu ($page_markup) {
    preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
        $divclass = $matches[1];
        $replace = array('<div class="'.$divclass.'">', '</div>');
        $new_markup = str_replace($replace, '', $page_markup);
        $new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
        return $new_markup; }

add_filter('wp_page_menu', 'responsive_wp_page_menu');

/**
 * Replace various active menu class names with "active" or nothing
 *
 */
function roots_wp_nav_menu($text) {
  $replace = array(
        'sub-menu'     => '',
	'menu-item'  => '',
	'menu-item-type-post_type'  => '',
	'menu-item-object-page'  => '',
	'menu-item-13'  => '',
	'menu-item-type-custom' => '',
	'menu-item-object-custom' => '',
	'current-menu-item'=> '',
	'current_page_item' => '',
	'menu-item-home menu-item-11'=> '',
        'menu-menu'=>'navlist',
        '-type-post_type'=>'',
        '-object-page'=>'',
        '-12'=>'',
        '-13'=>''
  );

  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}
add_filter('wp_nav_menu', 'roots_wp_nav_menu');

?>
