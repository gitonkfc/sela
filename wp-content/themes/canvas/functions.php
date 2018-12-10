<?php
function canvas_setup()
{
	add_theme_support('authomatic-feed-links');
	add_theme_support('tittle-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'canvas'),
		'secondary' => __('Secondary Menu', 'canvas'),
		'extra' => __('Extra Menu', 'canvas'),
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


function menu_search($items, $args){
    if( $args->theme_location == 'secondary')  {
        $search = '<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>';
        $search .= '<form action="search.html" method="get">';
        $search .= '<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">';
        $search .= '</form>';
    }
    return $items . $search;
}
add_filter('wp_nav_menu_items','menu_search', 10, 2);

function menu_cart($items, $args){
    if( $args->theme_location == 'extra')  {
        $search = '<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>';
        $search .= '<div class="top-cart-content">';
        $search .= '<div class="top-cart-title">';
        $search .= '<h4>Shopping Cart</h4>';
        $search .= '</div>';
        $search .= '<div class="top-cart-items">';
        $search .= '<div class="top-cart-item clearfix">';
        $search .= '<div class="top-cart-item-image">';
        $search .= '<a href="#"></a>';
        $search .= '</div>'; 
        $search .= '<div class="top-cart-item-desc">';
        $search .= '<a href="#">Blue Round-Neck Tshirt</a>';
        $search .= '<span class="top-cart-item-price">$19.99</span>';
        $search .= '<span class="top-cart-item-quantity">x 2</span>';
        $search .= '</div>';
        $search .= '</div>';
        $search .= '<div class="top-cart-action clearfix">';
        $search .= '<span class="fleft top-checkout-price">$114.95</span>';
        $search .= '<button class="button button-3d button-small nomargin fright">View Cart</button>';
        $search .= '</div>';

    }
    return $items . $search;
}
add_filter('wp_nav_menu_items','menu_cart', 10, 2);


function sc_headstick($atts)
{
	extract(shortcode_atts(array(
		'h3' => 'asas',
		'pr' => 'asas',
		'link' => 'asas',
		'alt_link' => 'asas'
	), $atts));
	$result = '<div class="section header-stick">';
	$result .= '<div class="container clearfix">';
	$result .= '<div class="row">';
	$result .= '<div class="col-lg-9">';
	$result .= '<div class="heading-block bottommargin-sm">';
	$result .= '<h3>';
	$result .= $h3;
	$result .= '</h3>';
	$result .= '</div>';
	$result .= '<p class="nobottommargin">';
	$result .= $pr;
	$result .= '</p>';
	$result .= '</div>';
	$result .= '<div class="col-lg-3">';
	$result .= '<a href="' . $link . '" class="button button-3d button-dark button-large btn-block center" style="margin-top: 30px;">'. $alt_link . '</a>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	return $result;
}
add_shortcode('headstick', 'sc_headstick');

function sc_onethirdnbm($atts,$content=null)
{
	extract(shortcode_atts(array(
		'first' => do_shortcode($content),
		'second' => do_shortcode($content),
		'third' => do_shortcode($content)
	), $atts));
	$result = '<div class="container clearfix">';
	$result .= '<div class="col_one_third nobottommargin">';
	$result .= $first;
	$result .= '</div>';
	$result .= '<div class="col_one_third nobottommargin">';
	$result .= $second;
	$result .= '</div>';
	$result .= '<div class="col_one_third nobottommargin col_last">';
	$result .= $third;
	$result .= '</div>';
	$result .= '<div class="clear"></div>';
	$result .= '</div>';
	return $result;
}
add_shortcode('onethirdnbm', 'sc_onethirdnbm');

function sc_3featuremediabox($atts)
{
	extract(shortcode_atts(array(
		'image1' 	=> '',
		'image2' 	=> '',
		'image3' 	=> '',
		'alt1' 		=> '',
		'alt2' 		=> '',
		'alt3' 		=> '',
		'h3_1' 		=> '',
		'h3_2' 		=> '',
		'h3_3' 		=> '',
		'span1' 		=> '',
		'span2' 		=> '',
		'span3' 		=> '',
		'pr1'		=> '',
		'pr2'		=> '',
		'pr3'		=> ''
	), $atts));
	$result = '<div class="container clearfix">';
	$result .= '<div class="col_one_third nobottommargin">';
	$result .= '<div class="feature-box media-box">';
	$result .= '<div class="fbox-media">';
	$result .= '<img src="'.$image1.'" alt="'.$alt1.'">';
	$result .= '</div>';
	$result .=	'<div class="fbox-desc">';
	$result .= '<h3>'.$h3_1.'<span class="subtitle">'.$span1.'</span></h3>';
	$result .= '<p>'.$pr1.'</p>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col_one_third nobottommargin">';
	$result .= '<div class="feature-box media-box">';
	$result .= '<div class="fbox-media">';
	$result .= '<img src="'.$image2.'" alt="'.$alt2.'">';
	$result .= '</div>';
	$result .=	'<div class="fbox-desc">';
	$result .= '<h3>'.$h3_2.'<span class="subtitle">'.$span2.'</span></h3>';
	$result .= '<p>'.$pr2.'</p>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="col_one_third nobottommargin col_last">';
	$result .= '<div class="feature-box media-box">';
	$result .= '<div class="fbox-media">';
	$result .= '<img src="'.$image3.'" alt="'.$alt3.'">';
	$result .= '</div>';
	$result .=	'<div class="fbox-desc">';
	$result .= '<h3>'.$h3_3.'<span class="subtitle">'.$span3.'</span></h3>';
	$result .= '<p>'.$pr3.'</p>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '</div>';
	$result .= '<div class="clear"></div>';
	$result .= '</div>';

	return $result;
}
add_shortcode('3featuremediabox', 'sc_3featuremediabox');

function sc_parallaxheading($atts)
{
	extract(shortcode_atts(array(
		'backgroundimage' => '',
		'h2' =>''
	), $atts));
	$result = '<div class="section parallax bottommargin-lg" style="background-image: url('.$backgroundimage.'); padding: 100px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">';
	$result .= '<div class="heading-block center nobottomborder nobottommargin">';
	$result .= '<h2>'.$h2.'</h2>';
	$result .= '</div>';
	$result .= '</div>';
	return $result;
}
add_shortcode('parallaxheading','sc_parallaxheading');

require get_template_directory() . '/inc/menu-with-description-class.php';
