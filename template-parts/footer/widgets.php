<?php

/**
 * Footer widgets
 */

$footer_layout = sanitize_text_field(get_theme_mod('sleet_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout); // convert to an array of [3,3,3,3]
$footer_bg = sleet_sanitize_footer_bgc(get_theme_mod('sleet_footer_bgc', 'dark'));
$widgets_active = false;

foreach ($columns as $column) {
    if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
        $widgets_active = true;
    }
}
?>

<?php if ($widgets_active) : ?>
<div class="site-footer__wrapper footer--<?php echo $footer_bg; ?>">
    <div class="container">
        <div class="row">
            <?php foreach ($columns as $i => $column) : ?>
                <div class="col-12 col-sm-6 col-lg-<?php echo esc_attr($column); ?>">
                    <?php if (is_active_sidebar('footer-sidebar-' . ($i + 1))) : ?>
                        <?php dynamic_sidebar('footer-sidebar-' . ($i + 1)); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>