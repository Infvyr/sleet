<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sleet
 */

if (!function_exists('sleet_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function sleet_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'sleet'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('sleet_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function sleet_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'sleet'),
			'<span class="author"><a class="author__url" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('sleet_entry_footer')) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function sleet_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'sleet'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'sleet') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'sleet'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'sleet') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sleet'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

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
	}
}


// generate post thumbnail
function sleet_the_post_image()
{
	if (post_password_required() || is_attachment()) {
		return;
	}

	$size = 'large';

	if (has_post_thumbnail()) :
		echo '<div class="post__image">';
		echo sprintf('<a href="%s" class="post__link" title="%s">', get_permalink(), the_title_attribute('echo=0'));
		the_post_thumbnail($size);
		echo '</a>';
		echo '</div>';
	else :
		echo '<div class="post__image default-image">';
		echo sprintf('<a href="%s" class="post__link" title="%s">', get_permalink(), the_title_attribute('echo=0'));
		sleet_the_post_thumbnail();
		echo '</a>';
		echo '</div>';
	endif;
}


// theme post custom footer meta
function sleet_the_post_footer_meta()
{
?>
	<div class="entry-footer__meta">
		<?php the_category(); ?>

		<div class="entry-footer__tags">
			<?php
			if (get_the_tag_list()) :
				echo get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
			endif;
			?>
		</div>
	</div>

<?php
}


// output read more button for post page
function sleet_read_more_button()
{
?>
	<a href="<?php echo esc_url(get_permalink()); ?>" class="post__btn">
		<span class="post__btn-text"><?php _e('Read more', 'sleet'); ?></span>
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" viewBox="0 0 22 14" class="svg-arrow-right">
			<path id="Path_6478" data-name="Path 6478" d="M663.626,764.308l4-5h-18v-2h18l-4-4,1-2,7,7-7,7Z" transform="translate(-649.626 -751.308)" fill="#35b5ff">
		</svg>
	</a>
<?php
}
