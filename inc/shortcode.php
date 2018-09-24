<?php

function get_image($value)
{
	$image = fw_get_db_settings_option($value);
	return $image['url'];
}

function sc_home_category($atts)
{
    $result = '<div class="space">';
    $result .= '<div class="row content">';
    $result .= '<div class="col">';
    $result .= '<div class="container-overlay">';
    $result .= '<a href="'. fw_get_db_settings_option('first_link_category') . '"><img class="overlay" src="'.get_image('first_image_category').'">';
    $result .= ' <div class="div3-center-overlay">'.fw_get_db_settings_option('first_title_category').'</div></a>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '<div class="col">';
    $result .= '<div class="container-overlay">';
    $result .= '<a href="'. fw_get_db_settings_option('second_link_category') . '"><img class="overlay" src="'.get_image('second_image_category').'">';
    $result .= ' <div class="div3-center-overlay">'.fw_get_db_settings_option('second_title_category').'</div></a>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '<div class="col">';
    $result .= '<div class="container-overlay">';
    $result .= '<a href="'. fw_get_db_settings_option('third_link_category') . '"><img class="overlay" src="'.get_image('third_image_category').'">';
    $result .= ' <div class="div3-center-overlay">'.fw_get_db_settings_option('third_title_category').'</div></a>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '</div>';

    return $result;
}
add_shortcode('home_category_shortcode', 'sc_home_category');

function sc_address_map ($atts)
{
	$out = '<div class="container onefour">';
	$out .= '<div class="row">';
    $out	.= '<div class="col-md-5 onefour"><h4 class="title font-weight-bold">'.fw_get_db_settings_option('title_am').'</h4><p class="text-justify category-group">'.fw_get_db_settings_option('address_am').'</p></div><br/>';     
    $out	.= '<div class="col-md-5 onefour">'.fw_get_db_settings_option('map_iframe').'</div>'; 
    $out	.= '</div>';
    $out	.= '</div>';
    return $out;
}
add_shortcode('address_maps_shortcode', 'sc_address_map');

function sc_product ($atts)
{
	$products = fw_get_db_settings_option('product_settings');
	$out = '<div class="container onefour">';
	$out .= '<div class="row">';
	foreach ($products as $product)
	{
		$out	.= '<div class="col-md-5 onefour"><img class="img-fluid" src="'.$product['image_product']['url'].'"/>'.$product['description_product'].'</div>'; 
	}
    $out	.= '</div>';
    $out	.= '</div>';
    return $out;
}
add_shortcode('products_shortcode', 'sc_product');


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
    $out .= '<div class="col-sm title space">';
    $out .= '<h2 class="title font-weight-bold text-center font-italic">Latest Article</h4>';
    $out .= '</div>';
    $out .= '<div class="w-100 recentpost"></div>';
    $out .= '<div class="col img-recenpost">';
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

function get_video($text) {
    $text = preg_replace('~(?#!js YouTubeId Rev:20160125_1800)
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        https?://          # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)?  # Optional subdomain.
        (?:                # Group host alternatives.
          youtu\.be/       # Either youtu.be,
        | youtube          # or youtube.com or
          (?:-nocookie)?   # youtube-nocookie.com
          \.com            # followed by
          \S*?             # Allow anything up to VIDEO_ID,
          [^\w\s-]         # but char before ID is non-ID char.
        )                  # End host alternatives.
        ([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)       # Assert next char is non-ID or EOS.
        (?!                # Assert URL is not pre-linked.
          [?=&+%\w.-]*     # Allow URL (query) remainder.
          (?:              # Group pre-linked alternatives.
            [\'"][^<>]*>   # Either inside a start tag,
          | </a>           # or inside <a> element text contents.
          )                # End recognized pre-linked alts.
        )                  # End negative lookahead assertion.
        [?=&+%\w.-]*       # Consume any URL (query) remainder.
        ~ix', 'http://www.youtube.com/embed/$1',
        $text);
    return $text;
}
function sc_3_video($atts)
{


    $out ='<div class="row content justify-content-md-center">';
   	$out .= '<div class="col-sm-3">';
   	$out .= '<div class="embed-responsive embed-responsive-16by9">';
    $out .= '<iframe width="850" height="600" src="'.get_video(fw_get_db_settings_option('first_video_url')).'"feature=oembed" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $out .= '</div>';
    $out .= '<div class="w-100">';
    $out .= '<h4 class="text-center font-weight-bold">'. fw_get_db_settings_option('first_video_title').'</h4>';
    $out .= '</div>';
    $out .= '</div>';
   	$out .= '<div class="col-sm-3">';
   	$out .= '<div class="embed-responsive embed-responsive-16by9">';
    $out .= '<iframe width="850" height="600" src="'.get_video(fw_get_db_settings_option('second_video_url')).'"feature=oembed" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $out .= '</div>';
    $out .= '<div class="w-100">';
    $out .= '<h4 class="text-center font-weight-bold">'. fw_get_db_settings_option('second_video_title').'</h4>';
    $out .= '</div>';
    $out .= '</div>';
   	$out .= '<div class="col-sm-3">';
   	$out .= '<div class="embed-responsive embed-responsive-16by9">';
    $out .= '<iframe width="850" height="600" src="'.get_video(fw_get_db_settings_option('third_video_url')).'"feature=oembed" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $out .= '</div>';
    $out .= '<div class="w-100">';
    $out .= '<h4 class="text-center font-weight-bold">'. fw_get_db_settings_option('third_video_title').'</h4>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}

add_shortcode('video_homepage_shortcode', 'sc_3_video');

function sc_hr($atts)
{
	$result = '<div class="space justify-content-md-center"><hr class="sc"/></div>';

	return $result;
}
add_shortcode('hr','sc_hr');