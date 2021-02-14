<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'sleet' ), '<span class="searched-word">' . get_search_query() . '</span>' );
						?>
					</h1>
				</header>

				<div class="row">
				
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'search' );

				endwhile;
				
				?>
				
				</div>

				<div class="row">
				
					<div class="site-navigation">
					
					<?php the_posts_navigation(); ?>
					
					</div>
				
				</div>

			<?php
			
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
				
				</div>
			</div>
		</div>

	</main>

<?php
get_footer();