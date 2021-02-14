<?php
$footer_copyright = get_theme_mod( 'sleet_site_copyright' );
?>

<?php if( $footer_copyright ) : ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="site-copyright">
                <?php
                $allowed = ['a' => [
                    'href' => [],
                    'title' => [],
                    'target' => []
                ]];
                echo wp_kses( $footer_copyright, $allowed );
                ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>