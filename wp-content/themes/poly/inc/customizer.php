<?php
/**
 * Theme Customizer
 *
 * @package poly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function poly_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'poly_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function poly_customize_preview_js() {
	wp_enqueue_script( 'poly_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130922', true );
}
add_action( 'customize_preview_init', 'poly_customize_preview_js' );

// add social option to customizer
add_action('customize_register', 'poly_social_customizer');

function poly_social_customizer($wp_customize) {
    //adding section in wordpress customizer   
    $wp_customize->add_section('polycrol_social', array(
        'title'         => 'Social Setting',
        'priority'		=> 22,
    ));
// Add a control to upload the logo
// add a setting 
    $wp_customize->add_setting('fb_icon');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fb_icon', array(
        'label' => 'Facebook Icon',
        'section' => 'polycrol_social', 
        'settings' => 'fb_icon',
        'priority' => 7 
    )));

    $wp_customize->add_setting('fb_url');
	$wp_customize->add_control(
	'fb_url', 
	array(
		'label'    => __( 'Facebook Link', 'poly' ),
		'section'  => 'polycrol_social',
		'settings' => 'fb_url',
		'type'     => 'url',
		'priority' => 8,
		)
	);
// Add a control to upload the logo
    $wp_customize->add_setting('twitter_icon');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'twitter_icon', array(
        'label' => 'Twtitter Icon',
        'section' => 'polycrol_social', 
        'settings' => 'twitter_icon',
        'priority' => 9 
    )));

// add a setting 
    $wp_customize->add_setting('twitter_url');
// Add a control to upload logo
	$wp_customize->add_control(
	'twitter_url', 
	array(
		'label'    => __( 'Twitter Link', 'poly' ),
		'section'  => 'polycrol_social',
		'settings' => 'twitter_url',
		'type'     => 'url',
		'priority' => 10,
		)
	);
    $wp_customize->add_setting('instagram_icon');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'instagram_icon', array(
        'label' => 'Instagram Icon',
        'section' => 'polycrol_social',
        'settings' => 'instagram_icon',
        'priority' => 11 
    )));
    // add a setting 
    $wp_customize->add_setting('instagram_url');
	// Add a control to upload the logo
	$wp_customize->add_control(
	'instagram_url', 
	array(
		'label'    => __( 'Instagram Link', 'poly' ),
		'section'  => 'polycrol_social',
		'settings' => 'instagram_url',
		'type'     => 'url',
		'priority' => 12,
		)
	);
    $wp_customize->add_setting('youtube_icon');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'youtube_icon', array(
        'label' => 'Youtube Icon',
        'section' => 'polycrol_social', 
        'settings' => 'youtube_icon',
        'priority' => 13
    )));
    // add a setting 
    $wp_customize->add_setting('youtube_url');
	// Add a control to upload the logo
	$wp_customize->add_control(
	'youtube_url', 
	array(
		'label'    => __( 'Youtube Link', 'poly' ),
		'section'  => 'polycrol_social',
		'settings' => 'youtube_url',
		'type'     => 'url',
		'priority' => 14,
		)
	);
}

add_action('customize_register', 'nicholas_logo_customizer');

function nicholas_logo_customizer($wp_customize) {
    //adding section in wordpress customizer   
    $wp_customize->add_section('nicholas_logo', array(
        'title'         => 'Nicholas Logo',
        'priority'		=> 20,
    ));

    $wp_customize->add_setting('nicholas_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nicholas_logo', array(
        'label' => 'Nicholas Logo',
        'section' => 'nicholas_logo', //this is the section where the custom-logo from WordPress is
        'settings' => 'nicholas_logo',
        'priority' => 13 // show it just below the custom-logo
    )));
    // add a setting 
    $wp_customize->add_setting('nicholas_url');
	// Add a control to upload the logo
	$wp_customize->add_control(
	'nicholas_url', 
	array(
		'label'    => __( 'Nicholas About Page Link', 'poly' ),
		'section'  => 'nicholas_logo',
		'settings' => 'nicholas_url',
		'type'     => 'url',
		'priority' => 14,
		)
	);
}

function polycrol_customizer_setting($wp_customize) {
// add a setting 
    $wp_customize->add_setting('polycrol_logo');
// Add a control to upload the logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'polycrol_logo', array(
        'label' => 'Polycrol Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'polycrol_logo',
        'priority' => 7 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'polycrol_customizer_setting');