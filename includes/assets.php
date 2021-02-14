<?php

/**
 * Enqueue scripts and styles.
 */
function sleet_enqueue_assets()
{
	wp_enqueue_style('sleet-reset', THEME_URL . '/dist/assets/css/normalize.css');
	wp_enqueue_style('wp-style', get_stylesheet_uri());

	// wp_deregister_script('jquery');
	// wp_enqueue_script(
	// 	'jquery',
	// 	THEME_URL . '/assets/js/libs/jquery-3.5.1.min.js',
	// 	false,
	// 	null,
	// 	true
	// );
	// wp_enqueue_script('jquery');

	// jquery theme script
	wp_enqueue_script(
		'sleet-jq',
		THEME_URL . '/dist/assets/js/sleet-jq-main.min.js',
		['jquery'],
		filemtime(get_theme_file_path('dist/assets/js/sleet-jq-main.min.js')),
		true
	);

	// vanilla js theme script
	wp_enqueue_script(
		'sleet-theme-script',
		THEME_URL . '/dist/assets/js/sleet-scripts.min.js',
		false,
		filemtime(get_theme_file_path('dist/assets/js/sleet-scripts.min.js')),
		true
	);

	wp_enqueue_script(
		'sleet-mmenu-library',
		THEME_URL . '/assets/js/libs/mmenu.js',
		false,
		false,
		true
	);


	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }*/


	// load styles and scripts by template
	if (is_front_page()) {
		// wp_enqueue_style( 'sleet-frontpage', THEME_URL . '/assets/css/frontpage.min.css' );
		wp_enqueue_style('sleet-frontpage', THEME_URL . '/dist/assets/css/frontpage.css');
	}

	if (is_archive()) {
		wp_enqueue_style('sleet-archives', THEME_URL . '/dist/assets/css/archive.css');
	}

	if (is_404()) {
		wp_enqueue_style('sleet-error', THEME_URL . '/dist/assets/css/404.css');
	}

	if (!is_front_page() and !is_archive() and !is_404()) {
		wp_enqueue_style('sleet-style', THEME_URL . '/dist/assets/css/sleet-styles.css');
	}

	/*if( is_post_type_archive( 'our-people' ) ){

	}*/
}
add_action('wp_enqueue_scripts', 'sleet_enqueue_assets');
