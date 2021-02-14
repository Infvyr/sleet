<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sleet
 */
?>

<?php do_action('sleet_site_before_footer'); ?>

<footer id="site-footer" class="site-footer" role="contentinfo">
	<?php get_template_part('template-parts/footer/widgets'); ?>
	<?php get_template_part('template-parts/footer/copyright'); ?>
</footer>

<?php do_action('sleet_site_after_footer'); ?>

<?php wp_footer(); ?>
</body>

</html>