<?php

/**
 * sleet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sleet
 */

define('THEME_URL', get_template_directory_uri());

// WP Customizer Custom Settings
if (is_customize_preview()) {
	require_once 'admin/customizer/enqueue.php';
	require_once 'admin/customizer/customizer-helpers.php';
}

require_once 'admin/customizer/sections/colours.php';
require_once 'admin/customizer/sections/typography.php';
require_once 'admin/customizer/sections/css-grid-sizes.php';
require_once 'admin/customizer/sections/footer.php';
require_once 'admin/customizer/sections/cpt.php';

// General Settings
require_once 'includes/cleaner.php';
require_once 'includes/theme-settings.php';
require_once 'includes/assets.php';
require_once 'includes/menus.php';
require_once 'includes/template-functions.php';
require_once 'includes/post-meta-tags.php';
require_once 'includes/sidebars.php';
require_once 'includes/custom-post-types.php';
require_once 'includes/helpers.php';
require_once 'admin/customizer/customizer-settings.php';

// Load the following files only for administrative interface page
if (is_admin()) {
	require_once 'admin/enqueue.php';
	require_once 'admin/acf.php';
	require_once 'admin/dashboard.php';
	require_once 'admin/mime-support.php';
	require_once 'admin/gutenberg.php';
}

// Hooks
require_once 'includes/hooks.php';
