<?php
/**
 * sela functions and definitions
 *
 * @package Sela
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
function sela_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/full-width-page.php' )
	  || is_page_template( 'page-templates/grid-page.php' )
	  || is_attachment()
	  || ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 778;
	}
}
add_action( 'template_redirect', 'sela_content_width' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if(!function_exists('sela_setup')) : function sela_setup() {

	load_theme_textdomain( 'sela', get_template_directory() . '/languages' );

	add_editor_style( array( 'assets/css/editor-style.css', sela_fonts_url() ) );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote','video' ) );

	register_nav_menus( array(
		'primary'	=> __( 'Primary Menu', 'sela' ),
		'social'	=> __( 'Social Menu', 'sela' ),
	) );

	add_theme_support( 'post-thumbnails' );

	// Post thumbnails
	set_post_thumbnail_size( 820, 312, true );
	// Hero Image on the front page template
	add_image_size( 'sela-hero-thumbnail', 1180, 610, true );
	// Full width and grid page template
	add_image_size( 'sela-page-thumbnail', 1180, 435, true );
	// Grid child page thumbnail
	add_image_size( 'sela-grid-thumbnail', 360, 242, true );
	// Testimonial thumbnail
	add_image_size( 'sela-testimonial-thumbnail', 90, 90, true );

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'custom-background', apply_filters( 'sela_custom_background_args', array(
		'default-color' => 'fafafa',
	) ) );
}
add_action( 'after_setup_theme', 'sela_setup' );
endif;

/**
 * Returns the Google font stylesheet URL, if available.
 */
function sela_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$source_sans_pro  = _x( 'on', 'Source Sans Pro font: on or off',  'sela' );

	/* translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'sela' );

	/* translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	$oswald  = _x( 'on', 'Oswald font: on or off',  'sela' );

	if ( 'off' !== $source_sans_pro || 'off' !== $droid_serif || 'off' !== $oswald ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro ) {
			$font_families[] = 'Source Sans Pro:300,300italic,400,400italic,600';
		}
		if ( 'off' !== $droid_serif ) {
			$font_families[] = 'Droid Serif:400,400italic';
		}
		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:300,400';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sela_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'sela' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sela_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sela_scripts_styles() {
	// Add Oswald, Source Sans Pro and Droid Serif fonts.
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style( 'sela-fonts', sela_fonts_url(), array(), null );

	// Add Lato Fonts
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700', false );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), '3.4.1' );

	// Load the main stylesheet.
	wp_enqueue_style( 'sela-style', get_stylesheet_uri() );
	wp_enqueue_script( 'sela-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20140813', true );
	wp_enqueue_script( 'sela-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20140813', true );
	wp_enqueue_script( 'sela-script', get_template_directory_uri() . '/assets/js/sela.js', array( 'jquery' ), '20140813', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() ) {

		wp_enqueue_script( 'social','//assets.pinterest.com/js/pinit.js', array(), false, true );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'sela-keyboard-image-navigation', get_template_directory_uri() . 'assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20130922' );
	}
}
add_action( 'wp_enqueue_scripts', 'sela_scripts_styles' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function sela_enqueue_admin_fonts( $hook ) {
    if ( 'appearance_page_custom-header' != $hook ) {
        return;
    }

    wp_enqueue_style( 'sela-fonts', sela_fonts_url(), array(), null );
}
add_action( 'admin_enqueue_scripts', 'sela_enqueue_admin_fonts' );

function nicholas_customizer_setting($wp_customize) {
// add a setting 
    $wp_customize->add_setting('nicholas_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nicholas_logo', array(
        'label' => 'Nicholas Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'nicholas_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'nicholas_customizer_setting');

function social_customizer_setting($wp_customize) {
// add a setting 
    $wp_customize->add_setting('social_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_logo', array(
        'label' => 'Social Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'social_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'social_customizer_setting');

function polycrol_customizer_setting($wp_customize) {
// add a setting 
    $wp_customize->add_setting('polycrol_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'polycrol_logo', array(
        'label' => 'Polycrol Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'polycrol_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'polycrol_customizer_setting');

function sc_div_3_overlay($atts)
{
	extract(shortcode_atts(array(
		'link1' => '',
		'link2' => '',
		'link3' => '',
		'img1' => '',
		'img2' => '',
		'img3' => '',
		'title1' => '',
		'title2' => '',
		'title3' => ''
	), $atts));
	$result = '<div class="space">';
	$result .= '<div class="row content">';
	$result .= '<div class="col">';
	$result .= '<div class="container-overlay">';
	$result .= '<a href="'. $link1 . '"><img class="overlay" src="'.$img1.'">';
	$result .= ' <div class="div3-center-overlay">'.$title1.'</div></a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="container-overlay">';
	$result .= '<a href="'. $link2 . '"><img class="overlay" src="'.$img2.'">';
	$result .= ' <div class="div3-center-overlay">'.$title2.'</div></a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="container-overlay">';
	$result .= '<a href="'. $link3 . '"><img class="overlay" src="'.$img3.'">';
	$result .= ' <div class="div3-center-overlay">'.$title3.'</div></a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';

	return $result;
}
add_shortcode('div_three_overlay', 'sc_div_3_overlay');

function sc_homerecentpost ($atts)
{
	  // get the posts
    $posts = get_posts(
        array(
            'numberposts'   => 1
        )
    );

    // No posts? run away!
    if( empty( $posts ) ) return '';

    /**
     * Loop through each post, getting what we need and appending it to 
     * the variable we'll send out
     */ 
    $out = '<div class="container">';
    $out = '<div class="row content">';
    $out .= '<div class="col-sm title">';
    $out .= '<p class="h2">Latest Article</p>';
    $out .= '</div>';
    $out .= '<div class="w-100 recentpost"></div>';
    $out .= '<div class="col">';
    foreach( $posts as $post )
    {
    	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    $out .= '<img class="img-fluid" src="'.esc_url( $large_image_url[0] ).'">';
    $out .= '</div>';
    $out .= '<div class="col-sm align-self-center">';
    $out .= '<h4 class="title font-weight-bold">'.esc_attr( $post->post_title ).'</h4>';
    $out .= '<p class="text-justify category-group">'.$post->post_excerpt.' </p>
            <p class="title font-weight-bold"> <a href="'.get_permalink( $post ).'">(Baca Selengkapnya) </a></p>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('homerecentpost', 'sc_homerecentpost');

function sc_3_video($atts)
{
	extract(shortcode_atts(array(
		'video1' => '',
		'video2' => '',
		'video3' => '',
		'title1' => '',
		'title2' => '',
		'title3' => ''
	),$atts));
	$result .= '<div class="row content justify-content-md-center">';
	$result .= '<div class="col">';
	$result .= '<div class="embed-responsive embed-responsive-21by9">';
	$result .= '<video class="wp-video-shortcode" id="video-127-1" width="400" height="180" preload="metadata" controls="controls"><source type="video/mp4" src="'.$video1.'?_=1" /><a href="'.$video1.'">'.$video1.'</a></video>';
    $result .= '</div>';
	$result .= '<p class="font-weight-bold recentvideo">'.$title1.'</p>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="embed-responsive embed-responsive-21by9">';
	$result .= '<video class="wp-video-shortcode" id="video-127-1" width="400" height="180" preload="metadata" controls="controls"><source type="video/mp4" src="'.$video2.'?_=1" /><a href="'.$video2.'">'.$video2.'</a></video>';
    $result .= '</div>';
	$result .= '<p class="font-weight-bold recentvideo">'.$title2.'</p>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="embed-responsive embed-responsive-21by9">';
	$result .= '<video class="wp-video-shortcode" id="video-127-1" width="400" height="180" preload="metadata" controls="controls"><source type="video/mp4" src="'.$video2.'?_=1" /><a href="'.$video3.'">'.$video3.'</a></video>';
    $result .= '</div>';
	$result .= '<p class="font-weight-bold recentvideo">'.$title3.'</p>';
	$result .= '</div>';
	return $result;
}

add_shortcode('3_video', 'sc_3_video');

function sc_hr($atts)
{
	$result = '<div class="space justify-content-md-center"><hr class="sc"/></div>';

	return $result;
}
add_shortcode('hr','sc_hr');

function sc_onefour ($atts)
{
	extract(shortcode_atts(array(
		'image1' => '',
		'image2' => '',
		'image3' => '',
		'pr1'	=> '',
		'pr2'	=> '',
		'pr3'	=> '',
	),$atts));
	$out = '<div class="container onefour">';
	$out .= '<div class="row">';
    $out	.= '<div class="col-md-5 onefour"><img class="img-fluid" src="'.$image1.'"/>'.$pr1.'</div>'; 
    $out	.= '<div class="col-md-5 onefour"><img class="img-fluid" src="'.$image2.'"/>'.$pr2.'</div>'; 
    $out	.= '</div>';
    $out	.= '</div>';
    return $out;
}
add_shortcode('onefour', 'sc_onefour');

function sc_address ($atts)
{
	extract(shortcode_atts(array(
		'img' => '',
		'address' => '',
		'question' => '',
	),$atts)); 
	$out = '<div class="container onefour">';
	$out .= '<div class="row">';
    $out	.= '<div class="col-md-5 onefour"><h4 class="title font-weight-bold">'.$question.'</h4><p class="text-justify category-group">'.$address.'</p></div>'; 
    $out	.= '<div class="col-md-5 onefour"><img class="img-fluid" src="'.$img.'"/></div>'; 
    $out	.= '</div>';
    $out	.= '</div>';
    return $out;
}
add_shortcode('address', 'sc_address');


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



