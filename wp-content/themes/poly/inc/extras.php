<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package poly
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function poly_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'poly_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */

function poly_body_classes( $classes ) {
	if ( is_page_template( 'full-width-page.php' ) || is_page_template( 'grid-page.php' ) )
		$classes[] = 'full-width-page';

	if ( ! is_multi_author() ) {
		$classes[] = 'not-multi-author';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
    }

	if ( display_header_text() ) {
		$classes[] = 'display-header-text';
	}

    if ( is_page() && ! comments_open() && '0' == get_comments_number() ) {
		$classes[] = 'comments-closed';
    }

	return $classes;
}
add_filter( 'body_class', 'poly_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 */
function poly_post_classes( $classes ) {

    if ( ! has_post_thumbnail() ) {
        $classes[] = 'without-featured-image';
    } else {
        $classes[] = 'with-featured-image';
    }

    return $classes;
}

add_filter( 'post_class', 'poly_post_classes' );

/**
 * Change the class of the hero area depending on featured image.
 */
function poly_additional_class() {

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

		if ( is_post_type_archive() && ( ! isset( $jetpack_options['featured-image'] ) || ! $jetpack_options['featured-image'] ) ) {
			$additional_class =  'without-featured-image';
		} else if ( is_page() && ! has_post_thumbnail() ) {
			$additional_class =  'without-featured-image';
		} else {
			$additional_class =  'with-featured-image';
		}

	endwhile; endif;

	return $additional_class;
}

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function poly_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
		return $url;
	}

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
		$url .= '#main';
	}

	return $url;
}
add_filter( 'attachment_link', 'poly_enhanced_image_navigation', 10, 2 );

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 */
	function poly_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}
		global $page, $paged;
		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'poly' ), max( $paged, $page ) );
		}
		return $title;
	}
	add_filter( 'wp_title', 'poly_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function poly_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'poly_render_title' );
endif;

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
if ( ! function_exists( 'poly_excerpt_more' ) ) :
    function poly_excerpt_more( $more ) {
        $link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
            esc_url( get_permalink( get_the_ID() ) ),
            /* translators: %s: Name of current post */
            sprintf( esc_html__( 'Continue reading %s', 'poly' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
            );
        return ' &hellip; ' . $link;
    }
    add_filter( 'excerpt_more', 'poly_excerpt_more' );
endif;

/** init unyson framework customization**/

add_action('fw_backend_add_custom_settings_menu', '_action_theme_custom_fw_settings_menu');
function _action_theme_custom_fw_settings_menu($data) {
    add_menu_page(
        __( 'Polycrol Options', '{domain}' ),
        __( 'Polycrol Options', '{domain}' ),
        $data['capability'],
        $data['slug'],
        $data['content_callback'],
        'dashicons-admin-customizer',
        5 
    );

}

/** add social sharing button to single post**/
function poly_social_sharing_buttons($content) {
	global $post;
	if(is_single()){
	
		// Get current page URL 
		$url = urlencode(get_permalink());
 
		// Get current page title
		$title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $polyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url.'&amp;via=poly';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
		$googleURL = 'https://plus.google.com/share?url='.$url;
		$whatsappURL = 'whatsapp://send?text='.$title . ' ' . $url;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- poly.com social sharing. Get your copy here: http://poly.me/1VIxAsz -->';
		$content .= '<div class="container"><div class="row"><div class="col-xs-1 poly-social">';
		$content .= '<p class="socialsharing">Bagikan : </p></div> <div class="col-sm-5 poly-social"><a class="poly-link poly-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="poly-link poly-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="poly-link poly-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$content .= '<a class="poly-link poly-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '</div></div></div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'poly_social_sharing_buttons');

/** add responsive bootstrap class to video emebd**/
add_filter( 'embed_oembed_html', 'wpse_embed_oembed_html', 99, 4 );
function wpse_embed_oembed_html( $cache, $url, $attr, $post_ID ) {
    $classes = array();

    // Add these classes to all embeds.
    $classes_all = array(
        'embed-responsive embed-responsive-16by9',
    );

    // Check for different providers and add appropriate classes.

    if ( false !== strpos( $url, 'vimeo.com' ) ) {
        $classes[] = 'vimeo';
    }

    if ( false !== strpos( $url, 'youtube.com' ) ) {
        $classes[] = 'youtube';
    }

    $classes = array_merge( $classes, $classes_all );

    return '<div class="' . esc_attr( implode( $classes, ' ' ) ) . '">' . $cache . '</div>';
}
function WPTime_add_custom_class_to_all_images($content){
    /* Filter by Qassim Hassan - https://wp-time.com */
    $my_custom_class = "img-fluid"; // your custom class
    $add_class = str_replace('<img class="', '<img class="'.$my_custom_class.' ', $content); // add class
    return $add_class; // display class to image
}
add_filter('the_content', 'WPTime_add_custom_class_to_all_images');