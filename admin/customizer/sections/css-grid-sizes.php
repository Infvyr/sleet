<?php
/*
 * Add CSS Grid System Sizes settings
 * */

function sleet_customize_css_grid_system($wp_customize){
	// array of css grid system sizes
	$css_grid_sizes = [
		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Containers/columns left-right padding', 'sleet' ),
			'cdesc'         => 'Classes: .container, .col-*px; Units: px',
			'bs_padding'    => '_sleet_css_grid_padding',
		],

		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Max-width from 576px', 'sleet' ),
			'cdesc'         => esc_html__( 'Leave blank for default value. 576px up, units: px', 'sleet' ),
			'bs_maw_sm'     => '_sleet_css_grid_maw_sm',
		],

		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Max-width from 768px', 'sleet' ),
			'cdesc'         => esc_html__( 'Leave blank for default value. 768px up, units: px', 'sleet' ),
			'bs_maw_md'     => '_sleet_css_grid_maw_md',
		],

		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Max-width from 992px', 'sleet' ),
			'cdesc'         => esc_html__( 'Leave blank for default value. 992px up, units: px', 'sleet' ),
			'bs_maw_lg'     => '_sleet_css_grid_maw_lg',
		],

		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Max-width from 1200px', 'sleet' ),
			'cdesc'         => esc_html__( 'Leave blank for default value. 1200px up, units: px', 'sleet' ),
			'bs_maw_xl'     => '_sleet_css_grid_maw_xl',
		],

		[
			'title'         => __( 'Containers', 'sleet' ),
			'clabel'        => esc_html__( 'Max-width from 1400px', 'sleet' ),
			'cdesc'         => esc_html__( 'Leave blank for default value. 1400px up, units: px', 'sleet' ),
			'bs_maw_bs'     => '_sleet_css_grid_maw_bs',
		],

	];

	// add main section
	$wp_customize->add_section( '_sleet_css_grid_panel', [
		'title'     => __( 'CSS Grid System', 'sleet' ),
		'priority'      => 27,
	]);

	foreach ( $css_grid_sizes as $key => $css_grid_item ) {

		$cLabel     = $css_grid_item['clabel'];
		$cDesc      = $css_grid_item['cdesc'];

		// Paddings
		$wp_customize->add_setting( $css_grid_item['bs_padding'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_padding'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel',
			'input_attrs' => array(
				'min' => 0,
				'step' => 1,
			),
		]);

		// sm max-width
		$wp_customize->add_setting( $css_grid_item['bs_maw_sm'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_maw_sm'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel',
			'input_attrs' => array(
				'min' => 0,
				'step' => 1,
			),
		]);

		// md max-width
		$wp_customize->add_setting( $css_grid_item['bs_maw_md'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_maw_md'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel'
		]);

		// lg max-width
		$wp_customize->add_setting( $css_grid_item['bs_maw_lg'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_maw_lg'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel',
			'input_attrs' => array(
				'min' => 0,
				'step' => 1,
			),
		]);

		// xl max-width
		$wp_customize->add_setting( $css_grid_item['bs_maw_xl'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_maw_xl'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel',
			'input_attrs' => array(
				'min' => 0,
				'step' => 1,
			),
		]);

		// bs max-width
		$wp_customize->add_setting( $css_grid_item['bs_maw_bs'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $css_grid_item['bs_maw_bs'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => '_sleet_css_grid_panel',
			'input_attrs' => array(
				'min' => 0,
				'step' => 1,
			),
		]);
	}
}
add_action( 'customize_register', 'sleet_customize_css_grid_system' );