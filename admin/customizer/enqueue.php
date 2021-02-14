<?php

/**
 * Enqueue customizer assets
 */

function sleet_enqueue_customizer_assets($wp_customize) {
    wp_enqueue_script('sleet_customize_preview', THEME_URL . '/assets/admin/js/customizer-preview.js', ['customize-preview', 'jquery'], '1.0.0', true);
}
add_action('customize_preview_init', 'sleet_enqueue_customizer_assets');


function sleet_customize_site_identity( $wp_customize ){
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
}
add_action('customize_register', 'sleet_customize_site_identity');