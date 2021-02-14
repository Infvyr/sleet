<?php

/*
 * Theme hooks
 * */

// hooks definitions
//add_action( 'sleet_site_after_body', 'function_name', 5 );
//add_action( 'sleet_site_before_body', 'function_name', 5 );
//add_action( 'sleet_site_before_header', 'function_name', 5 );
//add_action( 'sleet_site_after_header', 'function_name', 5 );
//add_action( 'sleet_site_before_footer', 'function_name', 5 );
//add_action( 'sleet_site_after_footer', 'function_name', 5 );
// add_action( 'sleet_site_sidebar', 'sleet_add_sidebar_archive_template', 5 );
add_action('sleet_site_after_header', 'sleet_call_mobile_menu', 1);

add_filter(
	'get_custom_logo',
	'helpwp_custom_logo_output',
	10
);

// hooks descriptions
function sleet_add_sidebar_archive_template()
{
	//if( ! is_archive() ) return;

	if (is_archive()) :
		get_sidebar();
	endif;
}

// Changes the class on the custom logo in the header.php
function helpwp_custom_logo_output($html)
{
	$html = str_replace('custom-logo-link', 'site-logo__url', $html);
	$html = str_replace('custom-logo', 'site-logo__image', $html);
	return $html;
}

// Call mobile menu
function sleet_call_mobile_menu()
{
	sleet_show_menu(
		$theme_location = 'menu-3',
		$container_class = 'mobile-nav',
		$container_class = 'mobile-menu',
		$menu_class = 'mobile-menu site-menu--mobile no-list-type',
		$menu_id = 'mobile-menu'
	);
}
