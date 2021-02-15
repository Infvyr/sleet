<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sleet
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); // do_action( 'wp_body_open' ); 
	?>

	<?php do_action('sleet_site_before_header'); ?>

	<header id="masthead" class="site-header">

		<div class="container">
			<div class="row">
				<div class="col-4">
					<div class="site-logo">
						<?php
						if (has_custom_logo()) {
							sleet_show_site_logo();
						} else {
							sleet_customizer_logo_tags();
						}
						?>
					</div>
				</div>
				<div class="col-8">
					<div id="site-navigation" class="main-navigation">
						<button id="toggle-mobile-menu" class="mobile-menu-btn hamburger hamburger--emphatic" aria-controls="mobile-nav" type="button" aria-label="Menu" aria-controls="navigation">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
						<?php
						sleet_show_menu(
							$theme_location = 'menu-1',
							$container_class = 'site-nav',
							$menu_class = 'site-menu site-menu--primary no-list-type',
							$menu_id = 'primary-menu'
						);
						?>
					</div>
				</div>
			</div>
		</div>

		<?php
		sleet_show_menu(
			$theme_location = 'menu-3',
			$container_class = 'mobile-nav',
			$container_class = 'mobile-menu',
			$menu_class = 'mobile-menu site-menu--mobile no-list-type',
			$menu_id = 'mobile-menu-inner'
		);
		?>
	</header>

	<?php do_action('sleet_site_after_header'); ?>