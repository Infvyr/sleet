<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
		
			<div class="row">

				<div class="col-12">
				
				<div class="page-content">
				
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page' );

					endwhile;
				?>
				
				</div>

				</div>

				<?php do_action( 'sleet_site_sidebar' ); ?>

			</div>
		
		</div>

	</main><!-- #main -->

<?php
get_footer();