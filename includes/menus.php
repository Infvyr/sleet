<?php
/**
 * Register menus.
 *
 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
add_action( 'after_setup_theme', function(){
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'sleet' ),
            'menu-2' => esc_html__( 'Secondary', 'sleet' ),
            'menu-3' => esc_html__( 'Mobile menu', 'sleet' ),
        )
    );
});