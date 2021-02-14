<?php

// Remove dropdown menu with logo in admin bar
function sleet_remove_wp_admin_logo(){
    remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10);
}
add_action( 'add_admin_bar_menus', 'sleet_remove_wp_admin_logo' );


// Remove Wordpress Dashboard Widgets
function sleet_remove_dashboard_widgets() {
    remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
//    remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
//    remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
    remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
//    remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
    remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
    remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
    remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
    remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
//    remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
    remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
    remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}
add_action( 'wp_dashboard_setup', 'sleet_remove_dashboard_widgets' );


// Clean up Appearance Menu
/*function sleet_remove_appearance_submenus(){
    global $submenu;
    unset($submenu['themes.php'][20]); // background_image
}
add_action( 'admin_menu', 'sleet_remove_appearance_submenus', 999 );*/


// Add custom menu for Gutenberg Reusable Blocks
function sleet_add_custom_submenus(){
	add_submenu_page(
		'themes.php',
		'Reusable Blocks',
		'Reusable Blocks',
		'manage_options',
		'edit.php?post_type=wp_block',
		'',
		4
	);
}
add_action( 'admin_menu', 'sleet_add_custom_submenus', 999 );


// Update admin bar
add_action( 'admin_bar_menu', 'sleet_update_admin_bar', 999 );
function sleet_update_admin_bar($wp_adminbar) {

    $wp_adminbar->remove_menu( 'wp-logo' );
    $wp_adminbar->remove_node('customize');
    $wp_adminbar->remove_node('comments');

	$cpt_slug           = get_theme_mod( '_sleet_cpt_slug' );
	$cpt_mname          = get_theme_mod( '_sleet_cpt_menu_name' );
    $cpt_archive_url    = get_post_type_archive_link( $cpt_slug );
    $posts_archive_url  = get_permalink( get_option( 'page_for_posts' ) );

	if( $cpt_slug ) {
		$wp_adminbar->add_menu([
			'parent'    => 'site-name',
			'id'        => 'our-people-page',
			'title'     => __( "Visit $cpt_mname Page", 'sleet' ),
			'href'      => $cpt_archive_url,
		]);
	}

	if( $posts_archive_url ) {
		$wp_adminbar->add_menu([
			'parent'    => 'site-name',
			'id'        => 'news-page',
			'title'     => __( 'Visit News', 'sleet' ),
			'href'      => $posts_archive_url,
		]);
	}
}