<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */

?>

<div class="col-12 col-sm-6 col-md-4">
	<article <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title(sprintf('<h3 class="post__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>

			<?php if ('post' === get_post_type()) : ?>

				<div class="entry-meta">

					<?php sleet_posted_on();
					sleet_posted_by(); ?>

				</div><!-- .entry-meta -->

			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ('post' === get_post_type()) : ?>

			<?php sleet_the_post_image(); ?>

		<?php endif; ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="post__footer">
			<?php sleet_read_more_button(); ?>
		</footer><!-- .entry-footer -->
	</article>
</div>