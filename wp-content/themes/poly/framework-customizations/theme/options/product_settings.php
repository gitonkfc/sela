<?php
$options []= array(
	'tab_id_3' => array(
    'type' => 'tab',
    'options' => array(
                        'productsshortcode'  => array(
    'type'  => 'text',
    'value' => '[featured_products]',
    'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
    'label' => __('Shortcode', '{domain}'),
    'desc'  => __('Shortcode for your product page', '{domain}'),
    'help'  => __('Copy this shortcode to your product page', '{domain}'),
        ), 
                                                'products'  => array(
    'type'  => 'text',
    'value' => '',
    'attr'  => array( 'class' => 'custom-class', ),
    'label' => __('Shortcode', '{domain}'),
    'desc'  => __('Shortcode for your product page', '{domain}'),
    'help'  => __('Copy this shortcode to your product page', '{domain}'),
        ), 
    	        'product_settings'  => array(
    'type'  => 'addable-box',
    'value' => array(
        array(
            'option_1' => 'value 1',
            'option_2' => 'value 2',
        ),
        // ...
    ),
    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
    'label' => __('Product Settings', '{domain}'),
    'box-options' => array(
        'name_product' => array( 'type' => 'text' ),
        'description_product' => array(
    'type'  => 'wp-editor',
    'value' => 'default value',
    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
    'label' => __('Description', '{domain}'),
    'desc'  => __('Product Description', '{domain}'),
    'size' => 'small', // small, large
    'editor_height' => 400,
    'wpautop' => true,
    'editor_type' => false, // tinymce, html
    'shortcodes' => false // true, array('button', map')
),
        'image_product'  => array(
            'type'  => 'upload', 
            'value' => array(),
            'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Prodct Image', '{domain}'),
            'desc'  => __('Description', '{domain}'),
            'help'  => __('Help tip', '{domain}'),
            'images_only' => true,
            'files_ext' => array( 'jpg','png' ),
            'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
        ),
    ),
    'template' => ' Product {{- name_product }}', // box title
    'box-controls' => array( // buttons next to (x) remove box button
        'control-id' => '<small class=""></small>',
    ),
    'limit' => 0, // limit the number of boxes that can be added
    'add-button-text' => __('Add', '{domain}'),
    'sortable' => true,
        ),
    ),
    'title' => __('Featured Product', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
)
);
include_once get_template_directory() .'/framework-customizations/theme/options/video_home_page.php';
?>