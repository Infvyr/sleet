<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */

?>

<article <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="post__title">', '</h1>'); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php if (get_edit_post_link()) : ?>

		<footer class="post__footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'sleet'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer>

	<?php endif; ?>
</article>