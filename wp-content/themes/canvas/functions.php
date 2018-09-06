<?php
function canvas_setup()
{
	add_theme_support('authomatic-feed-links');
	add_theme_support('tittle-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'canvas'),
		'secondary' => __('Secondary Menu', 'canvas'),
		'footer' => __('Footer Menu', 'canvas')
	));

	add_theme_support('html5', array(
		'searc-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	add_theme_support('post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery',
	));

	add_post_type_support('page', 'excerpt');

	add_theme_support('custom-background', apply_filters('canvas_custom_background_args',array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults); 
}
add_action('after_setup_theme', 'canvas_setup');
function canvas_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

function canvas_fonts_url_lato()
{
	$fonts_url='';
	$lato = esc_html_x('on','Lato font : on or off', 'canvas');
	if('off' !== $lato)
	{
		$font_families = array();
		$font_families[]='Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i';
		$query_args = array(
			'family' => urlencode(implode('|',$font_families)),
			'subset' => urlencode('latin,latin-ext'),
		);
		$fonts_url = add_query_arg($query_args,'//fonts.googleapis.com/css');

	}
	return $fonts_url;

}
function canvas_theme_scripts() 
{
  	wp_enqueue_style( 'style', get_stylesheet_uri() );
  	wp_enqueue_style('/canvas-fonts-lato', canvas_fonts_url_lato(), array(), null);
  	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
  	wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper.css');
  	wp_enqueue_style('dark', get_template_directory_uri() . '/css/dark.css');
 	wp_enqueue_style('font-icons', get_template_directory_uri() . '/css/font-icons.css');
 	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
  	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
   	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_script( 'plugin', get_template_directory_uri() . '/js/plugins.js', array(), false, true );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), false, true );
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'canvas_theme_scripts' );