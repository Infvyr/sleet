<?php

/**
 * Enqueue admin assets
 */
function sleet_enqueue_admin_assets()
{
    wp_enqueue_style('sleet-admin-stylesheet', THEME_URL . '/assets/admin/css/sleet-admin.css');

    // wp_enqueue_script( 'sleet_admin-scripts', THEME_URL . '/assets/admin/js/sleet-admin.js', [], '1.0.0', true );
    wp_enqueue_script('sleet_admin-scripts', THEME_URL . '/assets/admin/js/customizer-preview.js', [], '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'sleet_enqueue_admin_assets');