<?php
/**
 * Clean up WordPress defaults
 */

if ( ! function_exists( 'sleet_cleanup_theme' ) ) :
    function sleet_cleanup_theme() {

        // Launching operation cleanup.
        add_action( 'init', 'sleet_cleanup_head' );

        // Remove WP version from RSS.
        add_filter( 'the_generator', 'sleet_remove_rss_version' );

        // Remove pesky injected css for recent comments widget.
        add_filter( 'wp_head', 'sleet_remove_wp_widget_recent_comments_style', 1 );

        // Clean up comment styles in the head.
        add_action( 'wp_head', 'sleet_remove_recent_comments_style', 1 );

    }
    add_action( 'after_setup_theme', 'sleet_cleanup_theme' );
endif;


// Clean up head
function sleet_cleanup_head() {

    // EditURI link.
    remove_action( 'wp_head', 'rsd_link' );

    // Category feed links.
    remove_action( 'wp_head', 'feed_links_extra', 3 );

    // Post and comment feed links.
    remove_action( 'wp_head', 'feed_links', 2 );

    // Windows Live Writer.
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Index link.
    remove_action( 'wp_head', 'index_rel_link' );

    // Previous link.
    remove_action( 'wp_head', 'parent_post_rel_link', 10 );

    // Start link.
    remove_action( 'wp_head', 'start_post_rel_link', 10 );

    // Canonical.
    remove_action( 'wp_head', 'rel_canonical', 10 );

    // Shortlink.
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

    // Links for adjacent posts.
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

    // WP version.
    remove_action( 'wp_head', 'wp_generator' );

    // Emoji detection script.
    remove_action( 'wp_head', 'sleet_print_emoji_detection_script', 7 );

    // Emoji styles.
    remove_action( 'wp_print_styles', 'sleet_print_emoji_styles' );
}

// Remove WP version from RSS.
function sleet_remove_rss_version() {
    return '';
}

// Remove injected CSS for recent comments widget.
function sleet_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

// Remove injected CSS from recent comments widget.
function sleet_remove_recent_comments_style() {
    global $wp_widget_factory;
    if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
    }
}

// Disable the emoji's
function sleet_disable_emojis() {
    remove_action( 'wp_head', 'sleet_print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'sleet_print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'sleet_print_emoji_styles' );
    remove_action( 'admin_print_styles', 'sleet_print_emoji_styles' );
    remove_filter( 'the_content_feed', 'sleet_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'sleet_staticize_emoji' );
    remove_filter( 'wp_mail', 'sleet_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'sleet_sleet_disable_emojis_tinymce' );
}

// Remove the tinymce emoji plugin.
function sleet_sleet_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

// Remove version from scripts and styles
function sleet_remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Remove H2 heading in posts navigation
function sleet_edit_navigation_template( $template, $class ){
    return '
        <nav class="navigation %1$s pagination-wrapper" role="navigation">
            <div class="nav-links">%3$s</div>
        </nav>    
    ';
}

// Remove script's and style's tags attribute type
function sleet_remove_assets_type_attribute($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

// Clean up menu classes
function sleet_clean_nav_menu_classes( $classes ) {
    if( ! is_array( $classes ) )
        return $classes;
    foreach( $classes as $i => $class ) {
        // Remove class with menu item id
//        $id = strtok( $class, 'menu-item-' );
//        if( 0 < intval( $id ) )
//            unset( $classes[ $i ] );

        // Remove menu-item-type-*
        if( false !== strpos( $class, 'menu-item-type-' ) )
            unset( $classes[ $i ] );

        // Remove menu-item-object-*
        if( false !== strpos( $class, 'menu-item-object-' ) )
            unset( $classes[ $i ] );
        
        // Change page ancestor to menu ancestor
        if( 'current-page-ancestor' == $class ) {
            $classes[] = 'current-menu-ancestor';
            unset( $classes[ $i ] );
        }
    }

    // Remove submenu class if depth is limited
    if( isset( $args->depth ) && 1 === $args->depth ) {
        $classes = array_diff( $classes, array( 'menu-item-has-children' ) );
    }
    return $classes;
}

// Generate alt attribute from title attribute
function sleet_generate_img_alt_from_title( $response ){
    if ( !$response['alt'] ) {
        $response['alt'] = $response['title'];
    }
    return $response;
}

// Remove Additional CSS from Customize Section
function sleet_remove_customize_sections( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'widgets' );
	$wp_customize->remove_panel( 'nav_menus', 100 );
}

// Clean post article class tag
function sleet_remove_postclasses($classes, $class, $post_id) {
    $classes = array_diff( $classes, array(
        'hentry',
//        'our-people', // cpt slug
        'has-post-thumbnail',
        'post-' . $post_id,
        'type-' . get_post_type($post_id),
        'status-' . get_post_status($post_id),
        'format-standard',
    ) );
    return $classes;
}


# Filters and actions
add_filter( 'style_loader_src', 'sleet_remove_version_scripts_styles', 9999 );
add_filter( 'script_loader_src', 'sleet_remove_version_scripts_styles', 9999 );
add_filter( 'navigation_markup_template', 'sleet_edit_navigation_template', 10, 2 );
add_filter( 'style_loader_tag', 'sleet_remove_assets_type_attribute', 10, 2 );
add_filter( 'script_loader_tag', 'sleet_remove_assets_type_attribute', 10, 2 );
add_filter( 'nav_menu_css_class', 'sleet_clean_nav_menu_classes', 5 );
add_filter( 'wp_prepare_attachment_for_js', 'sleet_generate_img_alt_from_title' );
add_filter( 'post_class', 'sleet_remove_postclasses', 10, 3 );

add_action( 'customize_register', 'sleet_remove_customize_sections' );
add_action( 'init', 'sleet_disable_emojis' );