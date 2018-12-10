<?php
$options []= array(
    'tab_id_4' => array(
    'type' => 'tab',
    'options' => array(
        'video_homepage_shortcode'  => array(
            'type'  => 'text',
            'value' => '[featured_video]',
            'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
            'label' => __('Shortcode', '{domain}'),
    'desc'  => __('Shortcode for your video homepage', '{domain}'),
    'help'  => __('Copy this shortcode to your home page post', '{domain}'),
        ),
        'first_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'first_video_title'  => array( 'type' => 'text' ),
                'first_video_url'  => array( 'type' => 'text' ),
                'first_video_thumbnail'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('video_thumbnail', '{domain}'),
                    'desc'  => __('Video Thumbnail', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('First Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'second_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'second_video_title'  => array( 'type' => 'text' ),
                'second_video_url'  => array( 'type' => 'text' ),
                'second_video_thumbnail'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('video_thumbnail', '{domain}'),
                    'desc'  => __('Video Thumbnail', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('Second Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'third_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'third_video_title'  => array( 'type' => 'text' ),
                'third_video_url'  => array( 'type' => 'text' ),
                'third_video_thumbnail'  => array(
                    'type'  => 'upload', 
                    'value' => array(),
                    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('video_thumbnail', '{domain}'),
                    'desc'  => __('Video Thumbnail', '{domain}'),
                    'images_only' => true,
                    'files_ext' => array( 'jpg','png' ),
                    'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
                ),
            ),
            'title' => __('Third Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
    ),
    'title' => __('Featured Video', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
'tab_id_5' => array(
    'type' => 'tab',
    'options' => array(
                'footer_text'  => array( 'type' => 'text' ),

    ),
    'title' => __('Footer Label', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    )
);
?>