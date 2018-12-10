<?php
$options = array(
    'tab_id' => array(
    'type' => 'tab',
    'options' => array(
        'home_category_shortcode'  => array(
    'type'  => 'text',
    'value' => '[featured_links]',
    'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
    'label' => __('Shortcode', '{domain}'),
    'desc'  => __('Shortcode for your category homepage', '{domain}'),
    'help'  => __('Copy this shortcode to your home page post', '{domain}'),
        ),

        'first_category_pg' => array(
            'type' => 'box',
            'options' => array(
                'first_category_title'  => array( 'type' => 'text' ),
                'first_category_url'  => array( 'type' => 'text' ),
                'first_category_image'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('First Category Image', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('First Category', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'second_category_pg' => array(
            'type' => 'box',
            'options' => array(
                'second_category_title'  => array( 'type' => 'text' ),
                'second_category_url'  => array( 'type' => 'text' ),
                'second_category_image'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Second Category Image', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('Second Category', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'third_category_pg' => array(
            'type' => 'box',
            'options' => array(
                'third_category_title'  => array( 'type' => 'text' ),
                'third_category_url'  => array( 'type' => 'text' ),
                'third_category_image'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Third Category Image', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('Third Category', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
    ),
    'title' => __('Featured Links', '{domain}'),
    'attr' => array('class' => 'custom-class'),
),

);


include_once get_template_directory() .'/framework-customizations/theme/options/address_maps.php';