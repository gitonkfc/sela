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

	add_editor_style( array( 'assets/css/editor-style.css', poly_fonts_url() ) );

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
 * Returns the Google font stylesheet URL, if available.
 */
function poly_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$source_sans_pro  = _x( 'on', 'Source Sans Pro font: on or off',  'poly' );
	/* translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'poly' );
	/* translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	$oswald  = _x( 'on', 'Oswald font: on or off',  'poly' );

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
function poly_scripts_styles() {
	// Bootstrap base init
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');

	// Add Oswald, Source Sans Pro and Droid Serif fonts.
	wp_enqueue_style( 'poly-fonts', poly_fonts_url(), array(), null );
	wp_enqueue_style( 'polycrol-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700', false );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.4.1' );

	// Load the main stylesheet.
	wp_enqueue_style( 'poly-style', get_stylesheet_uri() );
	wp_enqueue_style( 'master-style', get_template_directory_uri().'/assets/css/primary.css' );

	// Load the main javascript.
	wp_enqueue_script( 'poly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20140813', true );
	wp_enqueue_script( 'poly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20140813', true );
	wp_enqueue_script( 'poly-script', get_template_directory_uri() . '/js/poly.js', array( 'jquery' ), '20140813', true );
	wp_enqueue_script( 'social-script', get_template_directory_uri() . '/js/social.js', array(), false, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'poly-keyboard-image-navigation', get_template_directory_uri() . 'assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20130922' );
	}
}
add_action( 'wp_enqueue_scripts', 'poly_scripts_styles' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function poly_enqueue_admin_fonts( $hook ) {
    if ( 'appearance_page_custom-header' != $hook ) {
        return;
    }

    wp_enqueue_style( 'poly-fonts', poly_fonts_url(), array(), null );
}
add_action( 'admin_enqueue_scripts', 'poly_enqueue_admin_fonts' );

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
            'numberposts'   => 1,
            'cat' => '-10'
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
	  // get the posts
    $posts = get_posts(
        array(
            'numberposts'   => 3,
            'category_name' => 'gallery'
        )
    );

    // No posts? run away!
    if( empty( $posts ) ) return '';

    /**
     * Loop through each post, getting what we need and appending it to 
     * the variable we'll send out
     */ 
    $out ='<div class="row content justify-content-md-center">';
    foreach( $posts as $post )
    {
    	$content = apply_filters( 'the_content', $post->post_content );
    	$embeds = get_media_embedded_in_content( $content );
   	$out .= '<div class="col-sm-3">';
   	$out .= '<div class="embed-responsive embed-responsive-16by9">';
    $out .= $embeds[0];
    $out .= '</div>';
    $out .= '<div class="w-100">';
    $out .= '<h4 class="text-center font-weight-bold">'. esc_attr( $post->post_title ).'</h4>';
    $out .= '</div>';
    $out .= '</div>';
    }
    $out .= '</div>';
    return $out;
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
		'map' => '',
		'address' => '',
		'question' => '',
	),$atts)); 
	$out = '<div class="container onefour">';
	$out .= '<div class="row">';
    $out	.= '<div class="col-md-5 onefour"><h4 class="title font-weight-bold">'.$question.'</h4><p class="text-justify category-group">'.$address.'</p></div><br/>';     
    $out	.= '<div class="col-md-5 onefour"><iframe src="'.$map.'" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>'; 
    $out	.= '</div>';
    $out	.= '</div>';
    return $out;
}
add_shortcode('address', 'sc_address');

function crunchify_social_sharing_buttons($content) {
	global $post;
	if(is_single()){
	
		// Get current page URL 
		$url = urlencode(get_permalink());
 
		// Get current page title
		$title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
		$googleURL = 'https://plus.google.com/share?url='.$url;
		$whatsappURL = 'whatsapp://send?text='.$title . ' ' . $url;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="poly-social">';
		$content .= '<p class="socialsharing">Bagikan : <a class="poly-link poly-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="poly-link poly-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="poly-link poly-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$content .= '<a class="poly-link poly-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '</div></p>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');
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



