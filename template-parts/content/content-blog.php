<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */
?>

<div class="col-12 col-sm-6 col-md-4">
  <article <?php post_class(); ?>>

    <?php sleet_the_post_image(); ?>

    <header class="post__header">
      <?php the_title('<h3 class="post__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>

      <?php if ('post' === get_post_type()) : ?>
        <div class="post__meta">
          <?php sleet_posted_on();
          sleet_posted_by();  ?>
        </div>
      <?php endif; ?>
    </header>

    <div class="post__excerpt">
      <?php the_excerpt(); ?>
    </div>

    <footer class="post__footer">
      <?php sleet_read_more_button(); ?>
    </footer>
  </article>
</div>