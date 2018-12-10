<?php
$options []= array(
	'tab_id_2' => array(
    'type' => 'tab',
    'options' => array(
    	        'address_maps_shortcode'  => array(
    'type'  => 'text',
    'value' => '[featured_address]',
    'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
    'label' => __('Shortcode', '{domain}'),
    'desc'  => __('Shortcode for your contact page', '{domain}'),
    'help'  => __('Copy this shortcode to your home page post', '{domain}'),
        ),
    	'title_am' => array(    
    		'type'  => 'text',
    		'value' => '',
    		'attr'  => array( 'class' => 'custom-class' ),
    		'label' => __('Title Address', '{domain}'),
		),
        'address_am'  	=> array(
    'type'  => 'wp-editor',
    'value' => 'default value',
    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
    'label' => __('Address', '{domain}'),
    'size' => 'small', // small, large
    'editor_height' => 400,
    'wpautop' => true,
    'editor_type' => false, // tinymce, html
    'shortcodes' => false // true, array('button', map')
),
        'map_iframe'  	=> array(
        	        	 'type'  => 'textarea',
    		'value' => '',
    		'attr'  => array( 'class' => 'custom-class',),
    		'label' => __('Google Maps Iframe', '{domain}'),
        ),
    ),
    'title' => __('Featured Address', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
)
);
include_once get_template_directory() .'/framework-customizations/theme/options/product_settings.php';
?>