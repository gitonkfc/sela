<?php
/**
 * poly functions and definitions
 *
 * @package poly
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620; /* pixels */
}

/**
 * Adjusts content_width value for few pages and attachment templates.
 */
function poly_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/full-width-page.php' )
	  || is_page_template( 'page-templates/grid-page.php' )
	  || is_attachment()
	  || ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 778;
	}
}
add_action( 'template_redirect', 'poly_content_width' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if(!function_exists('poly_setup')) : function poly_setup() {

	load_theme_textdomain( 'poly', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote','video' ) );

	register_nav_menus( array(
		'primary'	=> __( 'Primary Menu', 'poly' ),
		'social'	=> __( 'Social Menu', 'poly' ),
	) );

	add_theme_support( 'post-thumbnails' );

	// Post thumbnails
	set_post_thumbnail_size( 820, 312, true );
	// Hero Image on the front page template
	add_image_size( 'poly-hero-thumbnail', 1180, 610, true );
	// Full width and grid page template
	add_image_size( 'poly-page-thumbnail', 1180, 435, true );
	// Grid child page thumbnail
	add_image_size( 'poly-grid-thumbnail', 360, 242, true );
	// Testimonial thumbnail
	add_image_size( 'poly-testimonial-thumbnail', 90, 90, true );

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'custom-background', apply_filters( 'poly_custom_background_args', array(
		'default-color' => 'fafafa',
	) ) );
}
add_action( 'after_setup_theme', 'poly_setup' );
endif;


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function poly_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'poly' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Widget Area', 'poly' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Widget Area', 'poly' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Widget Area', 'poly' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Front Page Widget Area', 'poly' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Front Page Widget Area', 'poly' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Front Page Widget Area', 'poly' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'poly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function get_assets_directory()
{
	return get_template_directory_uri() . '/assets';
}

function poly_scripts_styles() {
	// Bootstrap base init
	wp_enqueue_style('bootstrap', get_assets_directory() . '/vendor/bootstrap/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap-js', get_assets_directory() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '20140813', true );


	wp_enqueue_style( 'polycrol-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700', false );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_assets_directory() . '/fonts/genericons.css', array(), '3.4.1' );

	// Load the main stylesheet.
	wp_enqueue_style( 'poly-style', get_stylesheet_uri() );

	// Load the main javascript.
	wp_enqueue_script( 'poly-navigation', get_assets_directory() . '/js/navigation.js', array(), '20140813', true );
	wp_enqueue_script( 'poly-skip-link-focus-fix', get_assets_directory() . '/js/skip-link-focus-fix.js', array(), '20140813', true );
	wp_enqueue_script( 'poly-script', get_assets_directory() . '/js/sela.js', array( 'jquery' ), '20140813', true );
	wp_enqueue_script( 'poly-video', get_assets_directory() . '/js/video-embed.js', array('jquery'), false, true );
	if(is_single())
	{
		wp_enqueue_script( 'social-script', get_assets_directory() . '/js/social.js', array(), false, true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'poly-keyboard-image-navigation', get_assets_directory() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130922' );
	}
}
add_action( 'wp_enqueue_scripts', 'poly_scripts_styles' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */


/**
 * Remove Gallery Inline Styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Header features.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Load Polycrol Shortcode Menu
*/

include_once get_template_directory() .'/inc/shortcode.php';

/**
* Load Polycrol Menu Walker
*/
include_once get_template_directory() .'/inc/menu_walker.php';


