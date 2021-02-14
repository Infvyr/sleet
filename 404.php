<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sleet
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">

			<div class="container">
				<div class="row">
					<div class="col-12">
					
					<header class="page-header">
						<h1 class="page-title">
						<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sleet' ); ?>
						</h1>
					</header>

					<div class="page-content">
						<p class="error-404__subtitle">
						<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'sleet' ); ?>
						</p>

						<?php get_search_form(); ?>

					</div>

					</div>
				</div>
			</div>

		</section>

	</main>

<?php
get_footer();