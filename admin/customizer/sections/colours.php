<?php
/*
 * Add Color settings
 * */

function sleet_customize_color_settings($wp_customize)
{
	// array of colour settings
	$color_settings = [
		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 1', 'sleet'),
			'cdesc'         => esc_html__('Used for headings', 'sleet'),
			'color_1'       => '_sleet_color_1',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 2', 'sleet'),
			'cdesc'         => esc_html__('Used for paragraphs, plain text', 'sleet'),
			'color_2'       => '_sleet_color_2',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 3', 'sleet'),
			'cdesc'         => esc_html__('Used for buttons', 'sleet'),
			'color_3'       => '_sleet_color_3',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 4', 'sleet'),
			'cdesc'         => esc_html__('Used for links', 'sleet'),
			'color_4'       => '_sleet_color_4',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 5', 'sleet'),
			'cdesc'         => esc_html__('Used for background color', 'sleet'),
			'color_5'       => '_sleet_color_5',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour 6', 'sleet'),
			'cdesc'         => esc_html__('Used for border, horizontal lines', 'sleet'),
			'color_6'       => '_sleet_color_6',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour Light', 'sleet'),
			'color_7'       => '_sleet_color_7',
		],

		[
			'section'       => '_sleet_color_options_section',
			'title'         => __('Basic Palette', 'sleet'),
			'clabel'        => esc_html__('Colour Dark', 'sleet'),
			'color_8'       => '_sleet_color_8',
		],

		[
			'section'           => '_sleet_color_hover_options_section',
			'title'             => __('Hover State', 'sleet'),
			'clabel'            => esc_html__('Link hover', 'sleet'),
			'link_hover_color'  => '_sleet_color_link_hover',
		],

		[
			'section'           => '_sleet_color_hover_options_section',
			'title'             => __('Hover State', 'sleet'),
			'clabel'            => esc_html__('Link active', 'sleet'),
			'link_active_color' => '_sleet_color_link_active',
		],

		[
			'section'               => '_sleet_color_hover_options_section',
			'title'                 => __('Hover State', 'sleet'),
			'clabel'                => esc_html__('Link visited', 'sleet'),
			'link_visited_color'    => '_sleet_color_link_visited',
		],

		[
			'section'       => '_sleet_color_hover_options_section',
			'title'         => __('Hover State', 'sleet'),
			'clabel'        => esc_html__('Button Background Color', 'sleet'),
			'btn_bg_hover'  => '_sleet_color_btn_bg_hover',
		],

		[
			'section'     => '_sleet_color_other_options_section',
			'title'       => __('Other elements', 'sleet'),
			'clabel'      => esc_html__('Body', 'sleet'),
			'body_color'  => '_sleet_color_body',
		],

		[
			'section'               => '_sleet_color_other_options_section',
			'title'                 => __('Other elements', 'sleet'),
			'clabel'                => esc_html__('Menu Background', 'sleet'),
			'cdesc'                 => '#masthead CSS selector',
			'bgc_menu_container'    => '_sleet_color_bg_menu_container',
		],

		// [
		// 	'section'       => '_sleet_color_other_options_section',
		// 	'title'         => __( 'Other elements', 'sleet' ),
		// 	'clabel'        => esc_html__( 'Footer Background', 'sleet' ),
		// 	'cdesc'         => '#site-footer CSS selector',
		// 	'bgc_footer'    => '_sleet_color_bg_footer',
		// ],

	];

	$priority = 0;

	// add main panel
	$wp_customize->add_panel('_sleet_color_panel', [
		'title'         => __('Colour Settings', 'sleet'),
		'priority'      => 25,
	]);

	foreach ($color_settings as $color) {

		$section    = $color['section'];
		$title      = $color['title'];
		$cLabel     = $color['clabel'];
		$cDesc      = $color['cdesc'];
		$priority  += 5;

		// add section
		$wp_customize->add_section($section, [
			'title'     => $title,
			'panel'     => '_sleet_color_panel',
			'priority'  => $priority,
		]);


		// Color 1
		$wp_customize->add_setting($color['color_1'], [
			'default'               => '#ff0080',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_1'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 2
		$wp_customize->add_setting($color['color_2'], [
			'default'               => '#191919',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_2'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 3
		$wp_customize->add_setting($color['color_3'], [
			'default'               => '#f1184c',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_3'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 4
		$wp_customize->add_setting($color['color_4'], [
			'default'               => '#35b5ff',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_4'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 5
		$wp_customize->add_setting($color['color_5'], [
			'default'               => '#c6cdd7',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_5'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 6
		$wp_customize->add_setting($color['color_6'], [
			'default'               => '#5cd7f9',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_6'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 7
		$wp_customize->add_setting($color['color_7'], [
			'default'               => '#f2f2f3',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_7'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Color 8
		$wp_customize->add_setting($color['color_8'], [
			'default'               => '#010c1e',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['color_8'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Hover Link
		$wp_customize->add_setting($color['link_hover_color'], [
			'default'               => '#0085f9',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['link_hover_color'], [
				'label'         => $cLabel,
				'section'       => $section
			])
		);

		// Active Link
		$wp_customize->add_setting($color['link_active_color'], [
			'default'               => '#0085f9',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['link_active_color'], [
				'label'         => $cLabel,
				'section'       => $section
			])
		);

		// Visited Link
		$wp_customize->add_setting($color['link_visited_color'], [
			'default'               => '#113ddb',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['link_visited_color'], [
				'label'         => $cLabel,
				'section'       => $section
			])
		);

		// Button Background Color
		$wp_customize->add_setting($color['btn_bg_hover'], [
			'default'               => '#db063f',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['btn_bg_hover'], [
				'label'         => $cLabel,
				'section'       => $section
			])
		);

		// Body Background Color
		$wp_customize->add_setting($color['body_color'], [
			'default'               => '#fff',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['body_color'], [
				'label'         => $cLabel,
				'section'       => $section
			])
		);

		// Menu Background Color
		$wp_customize->add_setting($color['bgc_menu_container'], [
			'default'               => '#fff',
			'sanitize_callback'     => 'sanitize_hex_color',
		]);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $color['bgc_menu_container'], [
				'label'         => $cLabel,
				'description'   => $cDesc,
				'section'       => $section
			])
		);

		// Footer Background Color
		// $wp_customize->add_setting( $color['bgc_footer'], [
		// 	'default'               => '#191919',
		// 	'sanitize_callback'     => 'sanitize_hex_color',
		// ]);

		// $wp_customize->add_control(
		// 	new WP_Customize_Color_Control( $wp_customize, $color['bgc_footer'], [
		// 		'label'         => $cLabel,
		// 		'description'   => $cDesc,
		// 		'section'       => $section
		// 	] )
		// );

	}
}
add_action('customize_register', 'sleet_customize_color_settings');
