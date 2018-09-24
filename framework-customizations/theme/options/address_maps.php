<?php
$options []= array(
	'tab_id_2' => array(
    'type' => 'tab',
    'options' => array(
    	        'address_maps_shortcode'  => array(
    'type'  => 'text',
    'value' => '[address_maps_shortcode]',
    'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
    'label' => __('Address and Maps Shortcode', '{domain}'),
    'desc'  => __('Copy this shortcode to your home page post', '{domain}'),
    'help'  => __('Help tip', '{domain}'),
        ),
    	'title_am' => array(    
    		'type'  => 'text',
    		'value' => '',
    		'attr'  => array( 'class' => 'custom-class' ),
    		'label' => __('Title Address', '{domain}'),
		),
        'address_am'  	=> array(
        	 'type'  => 'textarea',
    		'value' => '',
    		'attr'  => array( 'class' => 'custom-class',),
    		'label' => __('Address', '{domain}'),
        ),
        'map_iframe'  	=> array(
        	        	 'type'  => 'textarea',
    		'value' => '',
    		'attr'  => array( 'class' => 'custom-class',),
    		'label' => __('Google Maps Iframe', '{domain}'),
        ),
    ),
    'title' => __('Address and Map Settings', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
)
);
include_once get_template_directory() .'/framework-customizations/theme/options/product_settings.php';
?>