<?php

// ACF custom settings
add_action( 'acf/init', 'sleet_acf_op_init' );

if ( ! function_exists( 'sleet_acf_op_init' ) ) {
	function sleet_acf_op_init() {

		// Check function exists
		if ( function_exists( 'acf_add_options_page' ) ) {
			$theme_name = sleet_get_theme_name();

			// Add parent
			$parent = acf_add_options_page([
				'page_title' => __( $theme_name . ' Settings', 'sleet' ),
				'menu_title' => __( $theme_name . ' Settings', 'sleet' ),
				'redirect'   => false,
			]);

			// Add sub page
			$child = acf_add_options_page([
				'page_title'  => __( $theme_name . ' Global Blocks', 'sleet' ),
				'menu_title'  => __( $theme_name . ' Global Blocks', 'sleet' ),
				'parent_slug' => $parent['menu_slug'],
			]);

			$child = acf_add_options_page([
				'page_title'  => __( $theme_name . ' Footer', 'sleet' ),
				'menu_title'  => __( $theme_name . ' Footer', 'sleet' ),
				'parent_slug' => $parent['menu_slug'],
			]);
		}

	}
}