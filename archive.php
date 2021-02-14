<?php
/**
 * The template for displaying archive pages
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
				
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'blog' );

					endwhile;

					echo '<div class="col-12">'; 
					the_posts_navigation(); 
					echo '</div>';

				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>
				
				</div>

				<?php do_action( 'sleet_site_sidebar' ); ?>
				
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();