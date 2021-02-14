<?php

/*
 * Sleet helper functions
 * */

// display menu by theme_location
function sleet_show_menu($theme_location = '', $container_class = '', $container_id = '', $menu_class = 'menu', $menu_id = '')
{
    if ($theme_location == '') {
        $theme_location = 'menu-1';
    }
    if ($menu_class == '') {
        $menu_class = 'menu';
    }

    wp_nav_menu([
        'theme_location'    => $theme_location,
        'container'         => 'nav',
        'container_class'   => $container_class,
        'container_id'      => $container_id,
        'menu_class'        => $menu_class,
        'menu_id'           => $menu_id,
    ]);
}

// clean up the phone number
function sleet_clean_phone_number($phone_number)
{
    echo preg_replace('#[^0-9]#', '', $phone_number);
}

// get phone number
function sleet_get_client_phone()
{
    return get_field('phone_number', 'option');
}

// show phone markup
function sleet_the_client_phone_html()
{
    if (sleet_get_client_phone()) :
?>
        <a href="tel:<?php clean_phone_number(sleet_get_client_phone()); ?>" title="<?php echo esc_attr(sleet_get_client_phone()); ?>" class="info-link">
            <span class="icon icon-phone">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
                    <g id="Group_11830" data-name="Group 11830" transform="translate(-1010 -147)">
                        <path id="Path_6617" data-name="Path 6617" d="M1027.5,159.51a10.835,10.835,0,0,1-3.408-.543,1.515,1.515,0,0,0-1.484.314l-2.157,1.629a12.058,12.058,0,0,1-5.362-5.361l1.585-2.106a1.514,1.514,0,0,0,.371-1.53,10.876,10.876,0,0,1-.545-3.413,1.5,1.5,0,0,0-1.5-1.5h-3.5a1.5,1.5,0,0,0-1.5,1.5,17.521,17.521,0,0,0,17.5,17.5,1.5,1.5,0,0,0,1.5-1.5v-3.49A1.5,1.5,0,0,0,1027.5,159.51Z" fill="#d0103a" />
                        <path id="Path_6618" data-name="Path 6618" d="M1021.5,148a6.508,6.508,0,0,1,6.5,6.5.5.5,0,0,0,1,0,7.508,7.508,0,0,0-7.5-7.5.5.5,0,0,0,0,1Z" fill="#d0103a" />
                        <path id="Path_6619" data-name="Path 6619" d="M1021.5,152a2.5,2.5,0,0,1,2.5,2.5.5.5,0,0,0,1,0,3.5,3.5,0,0,0-3.5-3.5.5.5,0,0,0,0,1Z" fill="#d0103a" />
                    </g>
                </svg>
            </span>
            <span class="info-link__text">
                <?php echo esc_attr(sleet_get_client_phone()); ?>
            </span>
        </a>
    <?php
    endif;
}

// get email
function sleet_get_client_email()
{
    return get_field('email', 'option');
}

// show email markup
function sleet_the_client_email_html()
{
    if (sleet_get_client_email()) :
    ?>
        <a href="mailto://<?php echo sleet_get_client_email(); ?>" title="<?php echo esc_attr(sleet_get_client_email()); ?>" class="info-link">
            <span class="envelope envelope-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                    <g id="Mail" transform="translate(-680 -1788)">
                        <g id="Group_11617" data-name="Group 11617">
                            <path id="Path_6543" data-name="Path 6543" d="M704,1789.5a1.476,1.476,0,0,0-.192-.719L694.257,1796l9.54,7.24a1.479,1.479,0,0,0,.2-.74Z" fill="#d0103a" />
                            <path id="Path_6544" data-name="Path 6544" d="M691.046,1795.731a1.558,1.558,0,0,0,1.906,0l10.091-7.626a1.489,1.489,0,0,0-.543-.106h-21a1.485,1.485,0,0,0-.542.1Z" fill="#d0103a" />
                            <path id="Path_6545" data-name="Path 6545" d="M680.192,1788.78a1.49,1.49,0,0,0-.192.72v13a1.475,1.475,0,0,0,.2.739l9.54-7.239Z" fill="#d0103a" />
                            <path id="Path_6546" data-name="Path 6546" d="M693.417,1796.619a2.495,2.495,0,0,1-2.834,0l-9.6,7.285a1.505,1.505,0,0,0,.517.1h21a1.467,1.467,0,0,0,.515-.1Z" fill="#d0103a" />
                        </g>
                    </g>
                </svg>
            </span>
            <span class="info-link__text">
                <?php echo esc_attr(sleet_get_client_email()); ?>
            </span>
        </a>
    <?php
    endif;
}

// display website logo
function sleet_customizer_logo_tags()
{
    if (!is_front_page()) :
    ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo__url" rel="home">
            <h1 class="site-logo__title"><?php bloginfo('name'); ?></h1>
            <p class="site-logo__tagline"><?php bloginfo('description'); ?></p>
        </a>
    <?php
    else : ?>
        <div class="site-logo__url site-logo--no-url">
            <h1 class="site-logo__title"><?php bloginfo('name'); ?></h1>
            <p class="site-logo__tagline"><?php bloginfo('description'); ?></p>
        </div>
    <?php
    endif;
}

// sleet generate logo image from customizer settings
function sleet_show_site_logo()
{
    if (is_front_page()) :
        $custom_logo_id = get_theme_mod('custom_logo');
    ?>
        <div class="site-logo__url site-logo--no-url">
            <?php echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'site-logo__image']); ?>
        </div>
    <?php
    else :
        the_custom_logo();
    endif;
}

// mobile menu
function sleet_show_mobile_menu()
{
    ?>
    <div id="mobile-menu" class="mobile-menu d-xl-none off">

        <?php
        sleet_show_menu('', 'mobile-menu__main', 'mobile-menu__inner', 'mob-menu');
        sleet_show_menu('menu-2', 'mobile-menu__second', 'mobile-menu__inner', 'mob-menu-nd');
        ?>

    </div>
<?php
}

// wrapper edit_post_link in a custom function
function the_edit_post_link()
{
    if (get_edit_post_link()) {
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

// detect is blog page
function is_blog(): bool
{
    return (is_archive() || is_author() || is_category() || is_home() || !is_single() || !is_tag()) && 'post' == get_post_type();
}

// post navigation
function theme_post_navigation()
{
    the_post_navigation(
        array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'sleet') . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'sleet') . '</span> <span class="nav-title">%title</span>',
        )
    );
}

// detect sleet theme name
function sleet_get_theme_name()
{
    $sleet_theme = wp_get_theme('sleet');
    $theme = null;

    if ($sleet_theme->exists()) {
        $theme = $sleet_theme->get('Name');
    }

    return $theme;
}
