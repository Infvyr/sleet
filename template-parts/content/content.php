<?php

/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */

?>

<article <?php post_class(); ?>>

  <?php sleet_the_post_image(); ?>

  <header class="post__header">

    <?php
    the_title('<h1 class="post__title">', '</h1>');

    if ('post' === get_post_type()) :
    ?>

      <div class="post__meta">
        <?php sleet_posted_on(); sleet_posted_by(); ?>
      </div>

    <?php endif; ?>
    
  </header>

  <div class="post__content">
    <?php the_content(); ?>
  </div>

</article>