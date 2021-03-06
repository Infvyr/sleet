<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sleet
 */

get_header();

$column_class = (is_active_sidebar('sidebar-1')) ? 'col-12 col-md-9' : 'col-12';

?>

<main id="primary" class="site-main">

    <div class="container">
        <div class="row">

            <div class="<?php echo esc_attr($column_class); ?>">

                <?php
                if (have_posts()) :

                    if (is_home() && !is_front_page()) :
                        $posts_page_title = get_the_title(get_option('page_for_posts', true));
                ?>

                        <header class="page-inner-header">

                            <h1 class="page-title screen-reader-text"><?php echo esc_html($posts_page_title); ?></h1>

                        </header>

                    <?php endif; ?>

                    <div class="row">

                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            get_template_part('template-parts/content/content', 'blog');

                        endwhile;
                        ?>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="page-inner-pagination">
                                <?php the_posts_navigation(); ?>
                            </div>
                        </div>
                    </div>

                <?php
                else :

                    get_template_part('template-parts/content/content', 'none');

                endif;
                ?>

            </div>

            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <div class="col-12 col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();
