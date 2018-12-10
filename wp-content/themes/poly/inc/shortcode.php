<?php

function get_image($value)
{
	$image = fw_get_db_settings_option($value);
    if($image)
    {
        return $image['url'];
    }
}

function sc_home_category($atts)
{
    $results = array 
    (
        'first' => array 
        (
           'title'  => fw_get_db_settings_option('first_category_title'),
            'image' => get_image('first_category_image'),
            'url'   => fw_get_db_settings_option('first_category_url'),
        ),
        'second' => array
        (
            'image' => get_image('second_category_image'),
            'url'   => fw_get_db_settings_option('second_category_url'),
            'title' => fw_get_db_settings_option('second_category_title'),


        ),
        'third' => array
        (
            'url'   => fw_get_db_settings_option('third_category_url'),
            'title' => fw_get_db_settings_option('third_category_title'),
            'image' => get_image('third_category_image'),
        )
    );

    $resulta =  '<div class="row featured-row">';
    foreach ($results as $result)
    {
        $resulta .= '<div class="col-lg-4 col-sm-6 portfolio-item"> <figure class="snip1461"><img src="'.$result['image'].'" alt="sample57"> <figcaption> <h2 class="title">'.$result['title'].'</h2> <div></div></figcaption><a href="'.$result['url'].'"></a></figure></div>';            
    }
    $resulta .= '</div>';
    return $resulta;
}
add_shortcode('featured_links', 'sc_home_category');

function sc_address_map ($atts)
{
    $out = '<div class="row content-poly"> <div class="col-md"><h4 class="title font-weight-bold">'.fw_get_db_settings_option('title_am').'</h4><p class="text-justify category-group">'.fw_get_db_settings_option('address_am').'</p></div><br/><div class="col-md"><div class="embed-responsive embed-responsive-16by9">'.fw_get_db_settings_option('map_iframe').'</div></div></div></div>';
    return $out;
}
add_shortcode('featured_address', 'sc_address_map');

function sc_product ($atts)
{
	$products = fw_get_db_settings_option('product_settings');
	$out = '<div class="row featured-row justify-content-center">';
	foreach ($products as $product)
	{
	   $out .= '<div class="col-lg-6"> <div class="card"> <img class="card-img-top" src="'.$product['image_product']['url'].'" alt="Card image cap"><div class="card-body poly-product"><p class="card-text text-justify">'.$product['description_product'].'</p></div></div></div>';
    }
    $out	.= '</div>';
    return $out;
}
add_shortcode('featured_products', 'sc_product');


function sc_homerecentpost ($atts)
{
	  // get the posts
    $posts = get_posts(
        array(
            'numberposts'   => 1,
            'cat' => '-8'
        )
    );

    // No posts? run away!
    if( empty( $posts ) ) return '';

    $out    = '<div class="row"><div class="w-100 poly-head"><h2 class="poly-blog-title text-center font-italic">Lates Article</h2></div>';
    foreach($posts as $post)
    {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        $out .= '<div class="col-lg-6"><img class="img-fluid rounded" src="'.esc_url( $large_image_url[0] ).'" alt=""></div><div class="col-lg-6"><a href="'.get_permalink( $post ).'"> <h2 class="poly-blog-title text-justify">'.esc_attr( $post->post_title ).'</h2></a><p class="text-justify">'.wp_trim_words($post->post_content,50).'</p><a href="'.get_permalink( $post ).'" class="read-more">(Baca Selengkapnya)</a></div>';        
    }

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
//get featured video extra options
function extra_featured_video($atts,$content=null)
{
    $video_list = array
    (
        'first' => array
        (
            'url'       => fw_get_db_settings_option('first_video_url'),
            'title'     => fw_get_db_settings_option('first_video_title'),
            'thumbnail' => get_image('first_video_thumbnail')

        ),
        'second' => array 
        (
            'url'       => fw_get_db_settings_option('second_video_url'),
            'title'     => fw_get_db_settings_option('second_video_title'),
            'thumbnail' => get_image('second_video_thumbnail')
        ),
        'third' => array 
        (
            'url'       => fw_get_db_settings_option('third_video_url'),
            'title'     => fw_get_db_settings_option('third_video_title'),
            'thumbnail' => get_image('third_video_thumbnail')
        ),
    );
    $ft_video ='<div class="row justify-content-md-center video-row">';
    foreach($video_list as $video)
    {
        if(!$video['title'])
        {
            $ft_video .= NULL;
        }
        else
        {
            $ft_video .= '<div class="col-lg-4 col-sm-6 video-col">';
            $ft_video .= do_shortcode('[video src="'.$video['url'].'" poster="'.$video['thumbnail'].'" class="embed-responsive embed-responsive-4by3 wp-video-shortcode" width="500px" heigth="700px"]');
            $ft_video .= '<p><h4 class="text-center">'.$video['title'].'</h4></div>';
        }
    }
    $ft_video .= '</div>';    
    return $ft_video;
}
add_shortcode('featured_video','extra_featured_video');

function sc_hr($atts)
{
	$result = '<hr class="poly">';

	return $result;
}
add_shortcode('hr','sc_hr');

function sc_social_header($atts)
{
    $result = '';
    if(get_theme_mod('fb_url')) 
    {
        $result .= '<a href="' . esc_url( get_theme_mod('fb_url') ) . '"><img src="'.get_theme_mod('fb_icon').'" class="img-fluid"></a>';
    }
    if(get_theme_mod('twitter_url')) 
    {
        $result .= '<a href="' . esc_url( get_theme_mod('twitter_url') ) . '"><img src="'.get_theme_mod('twitter_icon').'" class="img-fluid"></a>';
    }
    if(get_theme_mod('instagram_url')) 
    {
        $result .= '<a href="' . esc_url( get_theme_mod('instagram_url') ) . '"><img src="'.get_theme_mod('instagram_icon').'" class="img-fluid"></a>';
    }
    if(get_theme_mod('youtube_url')) 
    {
        $result .= '<a href="' . esc_url( get_theme_mod('youtube_url') ) . '"><img src="'.get_theme_mod('youtube_icon').'" class="img-fluid"></a>';
    }
    return $result;
}
add_shortcode('social_header', 'sc_social_header');