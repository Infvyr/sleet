<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sleet
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content/content', get_post_type());

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'sleet') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'sleet') . '</span> <span class="nav-title">%title</span>',
						)
					);

				endwhile; // End of the loop.
				?>

			</div>

			<?php do_action('sleet_site_sidebar'); ?>

		</div>

	</div>

</main><!-- #main -->

<?php
get_footer();