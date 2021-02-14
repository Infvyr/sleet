<?php
/*
 * Add CPT settings
 * */

function sleet_customize_cpt_settings($wp_customize){
	// array of post type settings
	$cpt_settings = [
		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Enable Post Type', 'sleet' ),
			'active'        => '_sleet_cpt_on_off',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Slug', 'sleet' ),
			'cdesc'         => esc_html__( 'Must contain lowercase letters, ex: my-cpt. Default value is: team', 'sleet' ),
			'slug'          => '_sleet_cpt_slug',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Label', 'sleet' ),
			'cdesc'         => esc_html__( 'Name of this record for translating', 'sleet' ),
			'label'         => '_sleet_cpt_label',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Main name. Usually in plural form', 'sleet' ),
			'name'          => '_sleet_cpt_name',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Singular Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Name for one record of this type', 'sleet' ),
			'singular_name' => '_sleet_cpt_sg_name',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Menu Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Menu name. It\'s equal to Post Type Name by default', 'sleet' ),
			'menu_name'     => '_sleet_cpt_menu_name',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Description', 'sleet' ),
			'cdesc'         => esc_html__( 'Short description', 'sleet' ),
			'description'   => '_sleet_cpt_description',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Menu Position', 'sleet' ),
			'cdesc'         => esc_html__( '1-100+', 'sleet' ),
			'menu_position' => '_sleet_cpt_menu_position',
		],

		[
			'section'       => '_sleet_cpt_options_section',
			'title'         => __( 'Post Type', 'sleet' ),
			'clabel'        => esc_html__( 'Post Type Icon', 'sleet' ),
			'cdesc'         =>  'developer.wordpress.org/resource/dashicons, ex: dashicons-businessperson',
			'icon'          => '_sleet_cpt_icon',
		],

		[
			'section'       => '_sleet_primary_tax_options_section',
			'title'         => __( 'Primary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Primary Category Slug', 'sleet' ),
			'cdesc'         => esc_html__( 'Must contain lowercase letters and be filled in. Default is members', 'sleet' ),
			'slug'          => '_sleet_primary_tax_slug',
		],

		[
			'section'       => '_sleet_primary_tax_options_section',
			'title'         => __( 'Primary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Primary Category Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Main name. Usually in plural form', 'sleet' ),
			'name'          => '_sleet_primary_tax_name',
		],

		[
			'section'       => '_sleet_primary_tax_options_section',
			'title'         => __( 'Primary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Primary Category Singular Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Name for one record of this type', 'sleet' ),
			'singular_name' => '_sleet_primary_tax_sg_name',
		],

		[
			'section'       => '_sleet_primary_tax_options_section',
			'title'         => __( 'Primary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Primary Category Menu Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Menu name. It\'s equal to Post Type Name by default', 'sleet' ),
			'menu_name'     => '_sleet_primary_tax_menu_name',
		],

		[
			'section'       => '_sleet_primary_tax_options_section',
			'title'         => __( 'Primary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Primary Category Public', 'sleet' ),
			'cdesc'         => esc_html__( 'Enable Category Front Page or not', 'sleet' ),
			'public'        => '_sleet_primary_tax_public',
		],

		[
			'section'       => '_sleet_secondary_tax_options_section',
			'title'         => __( 'Secondary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Secondary Category Slug', 'sleet' ),
			'cdesc'         => esc_html__( 'Must contain lowercase letters and be filled in. Default is group', 'sleet' ),
			'slug'          => '_sleet_secondary_tax_slug',
		],

		[
			'section'       => '_sleet_secondary_tax_options_section',
			'title'         => __( 'Secondary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Secondary Category Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Main name. Usually in plural form', 'sleet' ),
			'name'          => '_sleet_secondary_tax_name',
		],

		[
			'section'       => '_sleet_secondary_tax_options_section',
			'title'         => __( 'Secondary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Secondary Category Singular Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Name for one record of this type', 'sleet' ),
			'singular_name' => '_sleet_secondary_tax_sg_name',
		],

		[
			'section'       => '_sleet_secondary_tax_options_section',
			'title'         => __( 'Secondary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Secondary Category Menu Name', 'sleet' ),
			'cdesc'         => esc_html__( 'Menu name. It\'s equal to Post Type Name by default', 'sleet' ),
			'menu_name'     => '_sleet_secondary_tax_menu_name',
		],

		[
			'section'       => '_sleet_secondary_tax_options_section',
			'title'         => __( 'Secondary Category', 'sleet' ),
			'clabel'        => esc_html__( 'Secondary Category Public', 'sleet' ),
			'cdesc'         => esc_html__( 'Enable Category Front Page or not', 'sleet' ),
			'public'        => '_sleet_secondary_tax_public',
		],

	];

	$priority = 0;

	function sleet_sanitize_select( $input, $setting ): string {
		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	// add main panel
	$wp_customize->add_panel( '_sleet_cpt_panel', [
		'title'         => __( 'CPT Settings', 'sleet' ),
		'priority'      => 170,
	]);

	foreach ( $cpt_settings as $cpt_setting ) {

		$section    = $cpt_setting['section'];
		$title      = $cpt_setting['title'];
		$cLabel     = $cpt_setting['clabel'];
		$cDesc      = $cpt_setting['cdesc'];
		$priority  += 5;

		// add section
		$wp_customize->add_section( $section, [
			'title'     => $title,
			'panel'     => '_sleet_cpt_panel',
			'priority'  => $priority,
		]);

		// enable cpt
		$wp_customize->add_setting( $cpt_setting['active'], [
			'default'               => 'off',
			'sanitize_callback'     => 'sleet_sanitize_select',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['active'], [
			'type'          => 'select',
			'label'         => $cLabel,
			'choices'       => [
				'on'  => __( 'Yes', 'sleet' ),
				'off' => __( 'No', 'sleet' )
			],
			'section'       => $section
		]);

		// slug
		$wp_customize->add_setting( $cpt_setting['slug'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['slug'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// label
		$wp_customize->add_setting( $cpt_setting['label'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['label'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// name
		$wp_customize->add_setting( $cpt_setting['name'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['name'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// singular name
		$wp_customize->add_setting( $cpt_setting['singular_name'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['singular_name'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// menu name
		$wp_customize->add_setting( $cpt_setting['menu_name'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['menu_name'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// description
		$wp_customize->add_setting( $cpt_setting['description'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['description'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// menu position
		$wp_customize->add_setting( $cpt_setting['menu_position'], [
			'default'               => '',
			'sanitize_callback'     => 'absint',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['menu_position'], [
			'type'          => 'number',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section,
			'input_attrs' => array(
				'min' => 5,
				'step' => 1,
			),
		]);

		// cpt icon
		$wp_customize->add_setting( $cpt_setting['icon'], [
			'default'               => '',
			'sanitize_callback'     => 'sanitize_text_field',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['icon'], [
			'type'          => 'text',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'section'       => $section
		]);

		// taxonomy public
		$wp_customize->add_setting( $cpt_setting['public'], [
			'default'               => '',
			'sanitize_callback'     => 'sleet_sanitize_select',
			'transport'             => 'postMessage'
		]);

		$wp_customize->add_control( $cpt_setting['public'], [
			'type'          => 'select',
			'label'         => $cLabel,
			'description'   => $cDesc,
			'choices'       => [
				'true'  => __( 'Yes', 'sleet' ),
				'false' => __( 'No', 'sleet' )
			],
			'section'       => $section
		]);
	}
}

add_action( 'customize_register', 'sleet_customize_cpt_settings' );