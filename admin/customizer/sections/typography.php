<?php
/*
 * Add Typography settings
 * */

function sleet_customize_typography_settings($wp_customize){
	// array of text settings
	$typography_settings = [
		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H1 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h1_size'       => '_sleet_h1_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H2 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h2_size'       => '_sleet_h2_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H3 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h3_size'       => '_sleet_h3_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H4 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h4_size'       => '_sleet_h4_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H5 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h5_size'       => '_sleet_h5_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H6 size', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 16px = 1.6rem, 10px = 1rem', 'sleet' ),
			'h6_size'       => '_sleet_h6_size',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H1 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h1_height'     => '_sleet_h1_height',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H2 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h2_height'     => '_sleet_h2_height',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H3 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h3_height'     => '_sleet_h3_height',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H4 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h4_height'     => '_sleet_h4_height',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H5 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h5_height'     => '_sleet_h5_height',
		],

		[
			'section'       => '_sleet_typo_options_section',
			'title'         => __( 'Headings', 'sleet' ),
			'label'         => esc_html__( 'H6 Line Height', 'sleet' ),
			'desc'          => esc_html__( 'Value must be in REM, 36px = 3.6rem', 'sleet' ),
			'h6_height'     => '_sleet_h6_height',
		],

		[
			'section'       => '_sleet_typo_oth_options_section',
			'title'         => __( 'Others', 'sleet' ),
			'label'         => esc_html__( 'Body Text Size', 'sleet' ),
			'b_txt_size'    => '_sleet_body_txt_size',
		],

		[
			'section'       => '_sleet_typo_oth_options_section',
			'title'         => __( 'Others', 'sleet' ),
			'label'         => esc_html__( 'Body Text Line Height', 'sleet' ),
			'b_txt_height'  => '_sleet_body_txt_height',
		],

		[
			'section'       => '_sleet_typo_oth_options_section',
			'title'         => __( 'Others', 'sleet' ),
			'label'         => esc_html__( 'Buttons Text Size', 'sleet' ),
			'btn_txt_size'  => '_sleet_btn_txt_size',
		],

		[
			'section'       => '_sleet_typo_oth_options_section',
			'title'         => __( 'Others', 'sleet' ),
			'label'         => esc_html__( 'Border radius', 'sleet' ),
			'desc'          => esc_html__( 'Units: %, px, rem, em etc.', 'sleet' ),
			'brd_radius'    => '_sleet_border_radius',
		]
	];

	$priority = 0;

	// add main panel
	$wp_customize->add_panel( '_sleet_typo_panel', [
		'title'         => __( 'Typography Settings', 'sleet' ),
		'priority'      => 26,
	]);

	foreach ( $typography_settings as $typo ) {

		$section    = $typo['section'];
		$title      = $typo['title'];
		$label      = $typo['label'];
		$desc       = $typo['desc'];
		$priority  += 5;

		// add section
		$wp_customize->add_section( $section, [
			'title'     => $title,
			'panel'     => '_sleet_typo_panel',
			'priority'  => $priority,
		]);


		// h1 size
		$wp_customize->add_setting( $typo['h1_size'], [
			'default'               => '4rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h1_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h2 size
		$wp_customize->add_setting( $typo['h2_size'], [
			'default'               => '3.6rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h2_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h3 size
		$wp_customize->add_setting( $typo['h3_size'], [
			'default'               => '3.2rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h3_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h4 size
		$wp_customize->add_setting( $typo['h4_size'], [
			'default'               => '2.6rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h4_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h5 size
		$wp_customize->add_setting( $typo['h5_size'], [
			'default'               => '2.2rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h5_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h6 size
		$wp_customize->add_setting( $typo['h6_size'], [
			'default'               => '1.8rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h6_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h1 height
		$wp_customize->add_setting( $typo['h1_height'], [
			'default'               => '5.2rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h1_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h2 height
		$wp_customize->add_setting( $typo['h2_height'], [
			'default'               => '4.8rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h2_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h3 height
		$wp_customize->add_setting( $typo['h3_height'], [
			'default'               => '4.2rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h3_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h4 size
		$wp_customize->add_setting( $typo['h4_height'], [
			'default'               => '3.6rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h4_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h5 height
		$wp_customize->add_setting( $typo['h5_height'], [
			'default'               => '3.2rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h5_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// h6 height
		$wp_customize->add_setting( $typo['h6_height'], [
			'default'               => '2.8rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['h6_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// body text size
		$wp_customize->add_setting( $typo['b_txt_size'], [
			'default'               => '1.6rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['b_txt_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// body text line height
		$wp_customize->add_setting( $typo['b_txt_height'], [
			'default'               => '2.4rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['b_txt_height'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// buttons text size
		$wp_customize->add_setting( $typo['btn_txt_size'], [
			'default'               => '1.7rem',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['btn_txt_size'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);

		// border radius
		$wp_customize->add_setting( $typo['brd_radius'], [
			'default'               => '3px',
			'sanitize_callback'     => 'sanitize_text_field',
		]);

		$wp_customize->add_control( $typo['brd_radius'], [
			'type'          => 'text',
			'label'         => $label,
			'description'   => $desc,
			'section'       => $section
		]);


	}
}
add_action( 'customize_register', 'sleet_customize_typography_settings' );