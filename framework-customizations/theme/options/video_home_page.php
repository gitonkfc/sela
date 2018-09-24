<?php
$options []= array(
    'tab_id_4' => array(
    'type' => 'tab',
    'options' => array(
        'video_homepage_shortcode'  => array(
            'type'  => 'text',
            'value' => '[video_homepage_shortcode]',
            'attr'  => array( 'class' => 'custom-class', 'disabled' => 'disabled' ),
            'label' => __('Shortcode', '{domain}'),
            'desc'  => __('Copy this shortcode to your home page post', '{domain}'),
            'help'  => __('Help tip', '{domain}'),
        ),
        'first_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'first_video_title'  => array( 'type' => 'text' ),
                'first_video_url'  => array( 'type' => 'text' ),
            ),
            'title' => __('First Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'second_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'second_video_title'  => array( 'type' => 'text' ),
                'second_video_url'  => array( 'type' => 'text' ),
            ),
            'title' => __('Second Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
        'third_video_pg' => array(
            'type' => 'box',
            'options' => array(
                'third_video_title'  => array( 'type' => 'text' ),
                'third_video_url'  => array( 'type' => 'text' ),
            ),
            'title' => __('Third Video', '{domain}'),
            'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        ),
    ),
    'title' => __('Video Home Page Category', '{domain}'),
    'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    )
);
?>