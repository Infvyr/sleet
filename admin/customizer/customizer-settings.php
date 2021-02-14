<?php
/*
 * Global Settings retrieved from Customizer
 * */

// get options from Customizer
function sleet_get_customizer_option($option): string
{
	return esc_html(get_theme_mod($option));
}


// add inline colours
function sleet_enqueue_vars()
{
	wp_enqueue_style('sleet-custom-vars', THEME_URL . '/dist/assets/css/customizer.css');

	// colours
	$colour_1 			= sleet_get_customizer_option('_sleet_color_1') ?: '#ff0080';
	$colour_2 			= sleet_get_customizer_option('_sleet_color_2') ?: '#191919';
	$colour_3 			= sleet_get_customizer_option('_sleet_color_3') ?: '#f1184c';
	$colour_4 			= sleet_get_customizer_option('_sleet_color_4') ?: '#35b5ff';
	$colour_5 			= sleet_get_customizer_option('_sleet_color_5') ?: '#c6cdd7';
	$colour_6 			= sleet_get_customizer_option('_sleet_color_6') ?: '#5cd7f9';
	$colour_7 			= sleet_get_customizer_option('_sleet_color_7') ?: '#f2f2f3';
	$colour_8 			= sleet_get_customizer_option('_sleet_color_8') ?: '#010c1e';

	// font sizes
	$h1_size            = sleet_get_customizer_option('_sleet_h1_size') ?: '4rem';
	$h2_size            = sleet_get_customizer_option('_sleet_h2_size') ?: '3.6rem';
	$h3_size            = sleet_get_customizer_option('_sleet_h3_size') ?: '3.2rem';
	$h4_size            = sleet_get_customizer_option('_sleet_h4_size') ?: '2.6rem';
	$h5_size            = sleet_get_customizer_option('_sleet_h5_size') ?: '2.2rem';
	$h6_size            = sleet_get_customizer_option('_sleet_h6_size') ?: '1.8rem';
	$h1_height          = sleet_get_customizer_option('_sleet_h1_height') ?: '5.2rem';
	$h2_height          = sleet_get_customizer_option('_sleet_h2_height') ?: '4.8rem';
	$h3_height          = sleet_get_customizer_option('_sleet_h3_height') ?: '4.2rem';
	$h4_height          = sleet_get_customizer_option('_sleet_h4_height') ?: '3.6rem';
	$h5_height          = sleet_get_customizer_option('_sleet_h5_height') ?: '3.2rem';
	$h6_height          = sleet_get_customizer_option('_sleet_h6_height') ?: '2.8rem';
	$body_text_size     = sleet_get_customizer_option('_sleet_body_txt_size') ?: '1.6rem';
	$body_text_height   = sleet_get_customizer_option('_sleet_body_txt_height') ?: '2.4rem';
	$btn_text_size      = sleet_get_customizer_option('_sleet_btn_txt_size') ?: '1.7rem';
	$border_radius      = sleet_get_customizer_option('_sleet_border_radius') ?: '3px';

	// links, body, buttons, menu
	$link_hover     	= sleet_get_customizer_option('_sleet_color_link_hover') ?: '#0085f9';
	$link_active    	= sleet_get_customizer_option('_sleet_color_link_active') ?: '#0085f9';
	$link_visited   	= sleet_get_customizer_option('_sleet_color_link_visited') ?: '#113ddb';
	$btn_hover_bg   	= sleet_get_customizer_option('_sleet_color_btn_bg_hover') ?: '#db063f';
	$body_bgc       	= sleet_get_customizer_option('_sleet_color_body') ?: '#fff';
	$menu_bgc       	= sleet_get_customizer_option('_sleet_color_bg_menu_container') ?: '#fff';

	// bootstrap containers
	$bs_cc_pad     		= (sleet_get_customizer_option('_sleet_css_grid_padding')) ? sleet_get_customizer_option('_sleet_css_grid_padding') . 'px' : '15px';
	$bs_sm_maw     		= (sleet_get_customizer_option('_sleet_css_grid_maw_sm')) ? sleet_get_customizer_option('_sleet_css_grid_maw_sm') . 'px' : '540px';
	$bs_md_maw     		= (sleet_get_customizer_option('_sleet_css_grid_maw_md')) ? sleet_get_customizer_option('_sleet_css_grid_maw_md') . 'px' : '720px';
	$bs_lg_maw     		= (sleet_get_customizer_option('_sleet_css_grid_maw_lg')) ? sleet_get_customizer_option('_sleet_css_grid_maw_lg') . 'px' : '960px';
	$bs_xl_maw     		= (sleet_get_customizer_option('_sleet_css_grid_maw_xl')) ? sleet_get_customizer_option('_sleet_css_grid_maw_xl') . 'px' : '1170px';
	$bs_bs_maw     		= (sleet_get_customizer_option('_sleet_css_grid_maw_bs')) ? sleet_get_customizer_option('_sleet_css_grid_maw_bs') . 'px' : '1320px';

	$inline_styles_selectors = [
		'--color-1' => $colour_1,
		'--color-2' => $colour_2,
		'--color-3' => $colour_3,
		'--color-4' => $colour_4,
		'--color-5' => $colour_5,
		'--color-6' => $colour_6,
		'--color-7' => $colour_7,
		'--color-8' => $colour_8,
		'--h1-size' => $h1_size,
		'--h2-size' => $h2_size,
		'--h3-size' => $h3_size,
		'--h4-size' => $h4_size,
		'--h5-size' => $h5_size,
		'--h6-size' => $h6_size,
		'--h1-line-heigh' =>  $h1_height,
		'--h2-line-heigh' =>  $h2_height,
		'--h3-line-heigh' =>  $h3_height,
		'--h4-line-heigh' =>  $h4_height,
		'--h5-line-heigh' =>  $h5_height,
		'--h6-line-heigh' =>  $h6_height,
		'--text-size' => $body_text_size,
		'--text-line-heigh' =>  $body_text_height,
		'--btn-text-siz' =>  $btn_text_size,
		'--border-radius' => $border_radius,
		'--link-hover' => $link_hover,
		'--link-active' => $link_active,
		'--link-visited' => $link_visited,
		'--btn-hover' => $btn_hover_bg,
		'--body-color' => $body_bgc,
		'--menu-container-bg' =>  $menu_bgc,
		'--bs-cc-pad' => $bs_cc_pad,
		'--bs-sm-maw' => $bs_sm_maw,
		'--bs-md-maw' => $bs_md_maw,
		'--bs-lg-maw' => $bs_lg_maw,
		'--bs-xl-maw' => $bs_xl_maw,
		'--bs-bs-maw' => $bs_bs_maw,
	];

	$inline_styles = '';
	$inline_styles .= ":root{";

	foreach ($inline_styles_selectors as $key => $value) {
		$inline_styles .= "{$key}:{$value};";
	}
	$inline_styles .= "}";

	$custom_css .= $inline_styles;

	// $custom_css = ":root{
	// 	--color-1: $colour_1;
	// 	--color-2: $colour_2;
	// 	--color-3: $colour_3;
	// 	--color-4: $colour_4;
	// 	--color-5: $colour_5;
	// 	--color-6: $colour_6;
	// 	--color-7: $colour_7;
	// 	--color-8: $colour_8;
	// 	--h1-size: $h1_size;
	// 	--h2-size: $h2_size;
	// 	--h3-size: $h3_size;
	// 	--h4-size: $h4_size;
	// 	--h5-size: $h5_size;
	// 	--h6-size: $h6_size;
	// 	--h1-line-height: $h1_height;
	// 	--h2-line-height: $h2_height;
	// 	--h3-line-height: $h3_height;
	// 	--h4-line-height: $h4_height;
	// 	--h5-line-height: $h5_height;
	// 	--h6-line-height: $h6_height;
	// 	--text-size: $body_text_size;
	// 	--text-line-height: $body_text_height;
	// 	--btn-text-size: $btn_text_size;
	// 	--border-radius: $border_radius;
	// 	--link-hover: $link_hover;
	// 	--link-active: $link_active;
	// 	--link-visited: $link_visited;
	// 	--btn-hover: $btn_hover_bg;
	// 	--body-color: $body_bgc;
	// 	--menu-container-bgc: $menu_bgc;
	// 	--bs-cc-pad: $bs_cc_pad;
	// 	--bs-sm-maw: $bs_sm_maw;
	// 	--bs-md-maw: $bs_md_maw;
	// 	--bs-lg-maw: $bs_lg_maw;
	// 	--bs-xl-maw: $bs_xl_maw;
	// 	--bs-bs-maw: $bs_bs_maw;
	// }";
	wp_add_inline_style('sleet-custom-vars', $custom_css);
}
add_action('wp_enqueue_scripts', 'sleet_enqueue_vars');
