<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function sleet_widgets_init() {
    register_sidebar(
        [
			'id'            => 'sidebar-1',
	        'name'          => esc_html__( 'Primary Sidebar', 'sleet' ),
	        'description'   => esc_html__( 'Add widgets here.', 'sleet' ),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widget-title">',
	        'after_title'   => '</h3>',
        ]
    );

	register_sidebar(
		[
			'id'            => 'sidebar-2',
			'name'          => esc_html__( 'Secondary Sidebar', 'sleet' ),
			'description'   => esc_html__( 'Add widgets here.', 'sleet' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	// footer layout
	$footer_layout = sanitize_text_field( get_theme_mod( 'sleet_footer_layout', '3,3,3,3') );
	$footer_layout = preg_replace('/\s+/', '', $footer_layout);
	$columns = explode(',', $footer_layout); // convert to an array of [3,3,3,3]
	$footer_bg = sleet_sanitize_footer_bgc(get_theme_mod( 'sleet_footer_bgc', 'dark' ));
	$widget_theme = '';
	
	if( $footer_bg == 'light' ){
		$widget_theme = 'footer-widget--dark';
	} else {
		$widget_theme = 'footer-widget--light';
	}

	foreach($columns as $i => $column){
		register_sidebar([
			'id'            => 'footer-sidebar-' . ($i + 1),
			'name'          => sprintf(esc_html__('Footer Widgets Columns %s', 'sleet'), $i + 1),
			'description'   => esc_html__('Footer widgets', 'sleet'),
			'before_widget' => '<div id="%1$s" class="footer-widget' . $widget_theme .' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]);
	}


}
add_action( 'widgets_init', 'sleet_widgets_init' );