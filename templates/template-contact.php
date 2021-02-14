<?php
/**
 * Template Name: Contact
 */
get_header();

get_template_part( 'template-parts/contact/info' );
get_template_part( 'template-parts/contact/form' );
get_template_part( 'template-parts/contact/map' );

?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-12 no-sm-gutter">
					<header class="entry-header">
						<h2 class="post__title">
							<?php the_field('contact_title'); ?>
						</h2>
					</header>
				</div>
				<div class="col-12 col-md-6 no-sm-gutter">
					<div class="contact-info">
						<?php the_content(); ?>
                        <div class="contact-info__details">
							<?php the_client_phone_html(); ?>
							<?php the_client_email_html(); ?>
                        </div>
						<div class="find-person">
							<a href="<?php echo esc_url(get_post_type_archive_link( 'our-people' )); ?>" class="btn btn-find">
								<span class="icon icon-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-search"><path fill="#363636" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path></svg>
                                </span>
								<span class="text">
									<?php esc_html_e('Find a person', 'sleet'); ?>
								</span>
							</a>
						</div>
					</div>
				</div>
				<?php the_contact_form(); ?>
			</div>
		</div>
		<?php the_contact_map(); ?>
	</main><!-- #main -->

    <?php do_action( 'theme_after_main_content' ); ?>

<?php
get_footer();