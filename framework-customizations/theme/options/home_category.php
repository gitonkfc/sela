<?php
$options = array(
    'tab_id' => array(
    'type' => 'tab',
    'options' => array(
        'home_category_shortcode'  => array(
    'type'  => 'text',
    'value' => '[home_category_shortcode]',
    'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
    'label' => __('Home Category Shortcode', '{domain}'),
    'desc'  => __('Copy this shortcode to your home page post', '{domain}'),
    'help'  => __('Help tip', '{domain}'),
        ),

        'first_title_category'  => array('type' => 'text' ),
        'first_link_category'   => array('type' => 'text' ),
        'first_image_category'  => array(
            'type'  => 'upload', 
            'value' => array(),
            'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Label', '{domain}'),
            'desc'  => __('Description', '{domain}'),
            'help'  => __('Help tip', '{domain}'),
            'images_only' => true,
            'files_ext' => array( 'jpg','png' ),
            'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
        ),
        'second_title_category'  => array('type' => 'text' ),
        'second_link_category'   => array('type' => 'text' ),
        'second_image_category'  => array(
            'type'  => 'upload', 
            'value' => array(),
            'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Label', '{domain}'),
            'desc'  => __('Description', '{domain}'),
            'help'  => __('Help tip', '{domain}'),
            'images_only' => true,
            'files_ext' => array( 'jpg','png' ),
            'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
        ),
        'third_title_category'  => array('type' => 'text' ),
        'third_link_category'   => array('type' => 'text' ),
        'third_image_category'  => array(
            'type'  => 'upload', 
            'value' => array(),
            'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Label', '{domain}'),
            'desc'  => __('Description', '{domain}'),
            'help'  => __('Help tip', '{domain}'),
            'images_only' => true,
            'files_ext' => array( 'jpg','png' ),
            'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
        ),
    ),
    'title' => __('Category Home Page Settings', '{domain}'),
    'attr' => array('class' => 'custom-class'),
),

);


include_once get_template_directory() .'/framework-customizations/theme/options/address_maps.php';