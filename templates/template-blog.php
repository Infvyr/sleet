<?php

/*
 * Template for News & Blog posts
 * Template Name: Blog
 * Template Post Type: Post
 * */

get_header();

?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 no-sm-gutter">

					<?php

					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'blog' );

					endwhile; // End of the loop.

					?>

				</div>

				<div class="col-12 col-lg-3 pl-0 no-sm-gutter">

                    <?php get_template_part( 'template-parts/posts/blog', 'story' ); ?>

				</div>
			</div>
		</div>

	</main>

    <?php do_action( 'sleet_site_sidebar' ); ?>

<?php
get_footer();