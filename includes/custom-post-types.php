<?php

// CPT: People
function register_product_post_type() {
	// Get values from Customizer
	$cpt_slug       = get_theme_mod( '_sleet_cpt_slug' ) ?: __( 'team', 'sleet' );
	$cpt_label      = get_theme_mod( '_sleet_cpt_label' ) ?: __( 'Team', 'sleet' );
	$cpt_name       = get_theme_mod( '_sleet_cpt_name' ) ?: __( 'Team', 'sleet' );
	$cpt_sg_name    = get_theme_mod( '_sleet_cpt_sg_name' ) ?: __( 'Team', 'sleet' );
	$cpt_mname      = get_theme_mod( '_sleet_cpt_menu_name' ) ?: __( 'Team', 'sleet' );
	$cpt_desc       = get_theme_mod( '_sleet_cpt_description' ) ?: '';
	$cpt_position   = get_theme_mod( '_sleet_cpt_menu_position' ) ?: 20;
	$cpt_icon       = get_theme_mod( '_sleet_cpt_icon' ) ?: 'dashicons-admin-post';

	// taxonomy 1
	$cpt_tax_slug       = get_theme_mod( '_sleet_primary_tax_slug' ) ?: __( 'members', 'sleet' );
	$cpt_tax_name       = get_theme_mod( '_sleet_primary_tax_name' ) ?: __( 'Members', 'sleet' );
	$cpt_tax_sg_name    = get_theme_mod( '_sleet_primary_tax_sg_name' ) ?: __( 'Members', 'sleet' );
	$cpt_tax_mname      = get_theme_mod( '_sleet_primary_tax_menu_name' ) ?: __( 'Members', 'sleet' );
	$cpt_tax_public     = ( get_theme_mod( '_sleet_primary_tax_public' ) ) ?: true;

	// taxonomy 2
	$cpt_tax__slug       = get_theme_mod( '_sleet_secondary_tax_slug' ) ?: __( 'group', 'sleet' );
	$cpt_tax__name       = get_theme_mod( '_sleet_secondary_tax_name' ) ?: __( 'Group', 'sleet' );
	$cpt_tax__sg_name    = get_theme_mod( '_sleet_secondary_tax_sg_name' ) ?: __( 'Group', 'sleet' );
	$cpt_tax__mname      = get_theme_mod( '_sleet_secondary_tax_menu_name' ) ?: __( 'Groups', 'sleet' );
	$cpt_tax__public     = ( get_theme_mod( '_sleet_secondary_tax_public' ) ) ?: false;


    register_taxonomy( $cpt_tax_slug, [$cpt_slug], [
        'labels'                => [
            'name'              => __( $cpt_tax_name, 'sleet' ),
            'singular_name'     => __( $cpt_tax_sg_name, 'sleet' ),
            'menu_name'         => __( $cpt_tax_mname, 'sleet' ),
            'add_new_item'      => __( 'Add New', 'sleet' ),
        ],
        'public'                => $cpt_tax_public,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'show_admin_column'     => true,
        'hierarchical'          => true,
        'meta_box_cb'           => 'post_categories_meta_box',
        'rewrite'               => true,
        'query_var'             => true,
        'show_in_rest'          => true,
    ] );

	register_taxonomy( $cpt_tax__slug, [$cpt_slug], [
		'labels'                => [
			'name'              => __( $cpt_tax__name, 'sleet' ),
			'singular_name'     => __( $cpt_tax__sg_name, 'sleet' ),
			'menu_name'         => __( $cpt_tax__mname, 'sleet' ),
			'add_new_item'      => __( 'Add New', 'sleet' ),
		],
		'public'                => $cpt_tax__public,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'show_admin_column'     => true,
//        'hierarchical'          => true,
		'meta_box_cb'           => 'post_categories_meta_box',
		'rewrite'               => true,
		'query_var'             => true,
		'show_in_rest'          => true,
	] );

    register_post_type( $cpt_slug, [
        'label'                 => __( $cpt_label, 'sleet' ),
        'labels'                => [
            'name'              => __( $cpt_name, 'sleet' ),
            'singular_name'     => __( $cpt_sg_name, 'sleet' ),
            'menu_name'         => __( $cpt_mname, 'sleet' ),
	        'view_items'        => __( "View $cpt_mname Archive", 'sleet' ),
        ],
        'description'           => __( $cpt_desc, 'sleet' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'hierarchical'          => true,
        'rewrite'               => true,
        'map_meta_cap'          => true,
        'capability_type'       => 'post',
        'has_archive'           => $cpt_slug,
        'supports'              => ['title', 'editor', 'excerpt', 'thumbnail'],
        'taxonomies'            => ['department', 'location'],
        'menu_position'         => (int) $cpt_position,
        'menu_icon'             => $cpt_icon,
    ] );
}

if( get_theme_mod( '_sleet_cpt_on_off' ) === 'on' ){
	add_action( 'init', 'register_product_post_type' );
}


// hide parent dropdown select on department taxonomy
// because we don't need this functionality as soon as we disabled hierarchical param
function hide_parent_dropdown_select( $args ) {
	if ( 'department' == $args['taxonomy'] ) {
		$args['echo'] = false;
	}
	return $args;
}
//add_filter( 'post_edit_category_parent_dropdown_args', 'hide_parent_dropdown_select' );


// CPT: Research
function register_research_post_type() {
	register_taxonomy('research-category', ['research'], [
		'labels'                => [
			'name'              => __('Category', 'sleet'),
			'singular_name'     => __('Category Research', 'sleet'),
			'menu_name'         => __('Category', 'sleet'),
			'add_new_item'      => __('Add New', 'sleet'),
		],
		'description'           => __('Research posts', 'sleet'),
		'public'                => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'show_admin_column'     => true,
//        'hierarchical'          => true,
		'meta_box_cb'           => 'post_categories_meta_box',
		'rewrite'               => true,
		'query_var'             => true,
		'show_in_rest'          => true,
	] );


	register_post_type('research', [
		'label'                 => __('Research', 'sleet'),
		'labels'                => [
			'name'              => __('Research', 'sleet'),
			'singular_name'     => __('Research', 'sleet'),
			'menu_name'         => __('Research', 'sleet'),
		],
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_rest'          => true,
		'show_in_menu'          => true,
		'exclude_from_search'   => false,
		'hierarchical'          => true,
		'rewrite'               => true,
		'map_meta_cap'          => true,
		'capability_type'       => 'post',
		'has_archive'           => false,
		'supports'              => ['title', 'editor', 'excerpt', 'thumbnail'],
		'taxonomies'            => ['research-category', ],
		'menu_position'         => 21,
		'menu_icon'             => 'dashicons-search',
	] );
}
//add_action( 'init', 'register_research_post_type' );