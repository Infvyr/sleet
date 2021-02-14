<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sleet
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sleet_body_classes( $classes ) {

	// Adds a class of no-sidebar when there is no sidebar present.
	if( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if( is_front_page() ) { $classes[] = 'front-page'; }

	if( is_blog() ) { $classes[] = 'blog-page'; }

	return $classes;
}
add_filter( 'body_class', 'sleet_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sleet_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sleet_pingback_header' );


/*
 * Hide wp adminbar from 1199px down and when user is logged in
 * */
function hide_admin_bar_prefs() {
	if( is_user_logged_in() ){
		$op = '
	    <style>
	        @media (max-width: 1199px) {
	            html {margin-top: 0 !important;}
	            #wpadminbar {display: none !important;}
	        }
	    </style> ';
		echo $op;
	}
}
add_action('wp_footer', 'hide_admin_bar_prefs');


// remove prefix Category: on archive/category page
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});


// generate picture tag with webp and image fallback for post thumbnail
function sleet_the_post_thumbnail(){
	echo sprintf( '
	<picture class="post__image">
		<source srcset="%s" type="image/webp">
		<source srcset="%s" type="image/jpeg">
		<img src="%s" alt="no-image">
	</picture>
	', esc_url( get_theme_file_uri( '/assets/images/image-placeholder.webp' ) ), esc_url( get_theme_file_uri( '/assets/images/image-placeholder.jpg' ) ), esc_url( get_theme_file_uri( '/assets/images/image-placeholder.jpg' ) ) );
}