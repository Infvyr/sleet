<?php

/**
 * Includes customizer functions
 */

function sleet_customize_register_settings( $wp_customize ){
    // $wp_customize->selective_refresh->add_partial('blogname', [
    //     'selector' => '.site-title',
    //     'container_inclusive' => false,
    //     'render_callback' => function(){
    //         bloginfo( 'name' );
    //     }
    // ]);

    $wp_customize->selective_refresh->add_partial('sleet_footer_partial', [
        'settings' => ['sleet_footer_bgc', 'sleet_footer_layout'],
        'selector' => '#site-footer',
        'container_inclusive' => false,
        'render_callback' => function () {
            get_template_part( 'template-parts/footer/widgets' );
            get_template_part( 'template-parts/footer/copyright' );
        }
    ]);
}
add_action( 'customize_register', 'sleet_customize_register_settings' );