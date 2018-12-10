<?php
/*
    Plugin Name: canvas Plugin
    Description: Simple implementation of a nivo slideshow into WordPress
    Author: Ciprian Turcu
    Version: 1.0
*/
function cp_init() {
    $args = array(
        'public' => true,
        'label' => 'Canvas Image Slider',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('cp_images', $args);
}
add_action('init', 'cp_init');

add_theme_support( 'post-thumbnails' );

function cp_function($type='cp_function') {
    $args = array(
        'post_type' => 'cp_images',
        'posts_per_page' => 5
    );
    $result = '<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">';
    $result .= '<div class="slider-parallax-inner">';
    $result .= '<div class="swiper-container swiper-parent">';
    $result .= '<div class="swiper-wrapper">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .= '<div class="swiper-slide dark" style="background-image: url(' . $the_url[0] . ');">';
        $result .= '<div class="container clearfix">';
        $result .= '<div class="slider-caption slider-caption-center">';
        $result .= '<h2 data-caption-animate="fadeInUp">' . get_the_title() . '</h2>';
        $result .= '<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200">' . get_the_content() . '</p>';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</div>';
    }
    $result .= '</div>';
    $result .= '<div class="slider-arrow-left">';
    $result .= '<i class="icon-angle-left"></i>';
    $result .= '</div>';
    $result .=	'<div class="slider-arrow-right">';
    $result .= '<i class="icon-angle-right"></i>';
    $result .= '</div>';
    $result .=	'<div class="slide-number">';
    $result .= '<div class="slide-number-current">';
    $result .= '</div>';
    $result .= '<span>/</span>';
    $result .= '<div class="slide-number-total">';
    $result .= '</div>';
    $result .='</div>';
    $result .='</div>';
    $result .= '</div>';
    $result .='</section>';
    return $result;
}
add_image_size('cp_function', 600, 280, true);
add_shortcode('cp-shortcode', 'cp_function');
?>