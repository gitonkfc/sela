<?php
function polycrol_setup()
{
	add_theme_support('tittle-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'polycrol'),
		'secondary' => __('Secondary Menu', 'polycrol'),
		'extra' => __('Extra Menu', 'polycrol'),
		'footer' => __('Footer Menu', 'polycrol')
	));

	add_theme_support('html5', array(
		'searc-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	add_theme_support('post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery',
	));

	add_post_type_support('page', 'excerpt');

	add_theme_support('custom-background', apply_filters('polycrol_custom_background_args',array(
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
add_action('after_setup_theme', 'polycrol_setup');
function polycrol_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

function polycrol_theme_scripts() 
{
  	wp_enqueue_style( 'style', get_stylesheet_uri() );
  	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
  	  	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
  	  	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), false, true );
  	  	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), false, true );
   	  	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'polycrol_theme_scripts' );

function polycrol_customizer_setting($wp_customize) {
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

add_action('customize_register', 'polycrol_customizer_setting');

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

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');

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
	$result .= ' <div class="center-overlay">'.$title1.'</div></a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="container-overlay">';
	$result .= '<a href="'. $link2 . '"><img class="overlay" src="'.$img2.'">';
	$result .= ' <div class="center-overlay">'.$title2.'</div></a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="container-overlay">';
	$result .= '<a href="'. $link3 . '"><img class="overlay" src="'.$img3.'">';
	$result .= ' <div class="center-overlay">'.$title3.'</div></a>';
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
            <p class="text-justify category-group"> <a href="'.get_permalink( $post ).'">(Baca Selengkapnya) </a></p>';
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
	$result .= '<p class="recentvideo">'.$title1.'</p>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="embed-responsive embed-responsive-21by9">';
	$result .= '<video class="wp-video-shortcode" id="video-127-1" width="400" height="180" preload="metadata" controls="controls"><source type="video/mp4" src="'.$video2.'?_=1" /><a href="'.$video2.'">'.$video2.'</a></video>';
    $result .= '</div>';
	$result .= '<p class="recentvideo">'.$title2.'</p>';
	$result .= '</div>';
	$result .= '<div class="col">';
	$result .= '<div class="embed-responsive embed-responsive-21by9">';
	$result .= '<video class="wp-video-shortcode" id="video-127-1" width="400" height="180" preload="metadata" controls="controls"><source type="video/mp4" src="'.$video2.'?_=1" /><a href="'.$video3.'">'.$video3.'</a></video>';
    $result .= '</div>';
	$result .= '<p class="recentvideo">'.$title3.'</p>';
	$result .= '</div>';
	return $result;
}

add_shortcode('3_video', 'sc_3_video');

function sc_hr($atts)
{
	$result = '<div class="space"><hr/></div>';

	return $result;
}
add_shortcode('hr','sc_hr');

