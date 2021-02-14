<?php

/**
 * This file represents a simple function that demonstrates
 * how to add options in WordPress CUSTOMIZER
 */

 function sleet_customize_register( $wp_customize ){
     $wp_customize->add_setting( 'sleet_site_info', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
     ]);

    $wp_customize->add_control( 'sleet_site_info', [
        'type' => 'text',
        'label' => esc_html__( 'Site Info', 'sleet' ),
        'section' => 'title_tagline'
    ]);
 }
//  add_action( 'customize_register', 'sleet_customize_register' );