<?php

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

/**
 * Enqueue Styles and Scripts
 * 
**/
function sarasota_styles_scripts(){
    global $wp_styles;
    
    /**
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    
    /**
     * Loads our main stylesheet.
    **/
    wp_register_style('sarasota-style', get_stylesheet_uri());
    wp_enqueue_style( 'sarasota-style');
    
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), true );
    wp_enqueue_script('bootstrap');
    
    wp_register_script('jquery_easing', get_template_directory_uri() . '/js/lib/jquery.easing.1.3.js', array( 'jquery' ), true);
    wp_enqueue_script('jquery_easing');
    
    wp_register_script('jquery_lavalamp', get_template_directory_uri() . '/js/lib/jquery.lavalamp.js', array( 'jquery' ), true);
    wp_enqueue_script('jquery_lavalamp');
    
    wp_register_script('sarasota-script', get_template_directory_uri() . '/js/sarasota.js', array( 'jquery' ), true);
    wp_enqueue_script('sarasota-script');
    
    /**
     * Loads the Internet Explorer specific stylesheet.
     */
    wp_enqueue_style( 'sarasota-ie', get_template_directory_uri() . '/css/ie.css', array( 'sarasota-style' ), '10');
    $wp_styles->add_data( 'sarasota-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'sarasota_styles_scripts' );

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
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"><button>Read More</button></a>';
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
?>
