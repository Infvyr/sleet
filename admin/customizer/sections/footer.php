<?php
/*
 * Add footer settings
 * */

function sleet_customize_site_footer( $wp_customize ){
    $wp_customize->add_section( 'sleet_footer_options', [
        'title' => esc_html__( 'Footer Settings', 'sleet' ),
        'description' => esc_html__( 'Change footer settings from here', 'sleet' ),
        'priority' => 101
    ]);

    // footer background color
    $wp_customize->add_setting('sleet_footer_bgc', [
        'default' => 'dark',
        'sanitize_callback' => 'sleet_sanitize_footer_bgc',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('sleet_footer_bgc', [
        'type' => 'select',
        'label' => esc_html__('Footer Background', 'sleet'),
        'choices' => [
            'light' => esc_html__('Light', 'sleet'),
            'dark' => esc_html__('Dark', 'sleet'),
        ],
        'section' => 'sleet_footer_options'
    ]);

    // footer layout
    $wp_customize->add_setting('sleet_footer_layout', [
        'default' => '3,3,3,3',
        'sanitize_callback' => 'sanitize_text_field',
        // 'validate_callback' => 'sleet_validate_footer_layout',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('sleet_footer_layout', [
        'type' => 'text',
        'label' => esc_html__('Footer Layout', 'sleet'),
        'description' => esc_html__('Add only numbers with comma in between', 'sleet'),
        'section' => 'sleet_footer_options'
    ]);
    
    // site copyright
    $wp_customize->add_setting('sleet_site_copyright', [
        'default' => '',
        'sanitize_callback' => 'sleet_sanitize_site_copyright',
        'transport' => 'postMessage'
    ]);

    $wp_customize->add_control('sleet_site_copyright', [
        'type' => 'text',
        'label' => esc_html__('Site Copyright', 'sleet'),
        'section' => 'sleet_footer_options'
    ]);
}
add_action('customize_register', 'sleet_customize_site_footer');

// sanitize copyright input
function sleet_sanitize_site_copyright( $input ){
    $allowed = ['a' => [
        'href' => [],
        'title' => [],
        'target' => []
    ]];

    return wp_kses( $input, $allowed );
}

// sanitize footer background color
function sleet_sanitize_footer_bgc( $input ){
    $valid = ['light', 'dark'];
    if( in_array($input, $valid, true) ){
        return $input;
    }
    return 'dark';
}

// validate footer layout
function sleet_validate_footer_layout( $validity, $value ){
    if( !preg_replace('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value) ){
        $validity->add('invalid_footer_layout', esc_html__('Footer layout is invalid', 'sleet'));
    }
    return $validity;
}