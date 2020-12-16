<?php
/**
 * Add sidebar class in body
 *
 * @since Urbane 1.0.0
 *
 */

add_filter('body_class', 'urbane_body_class');
function urbane_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $urbane_theme_options;
    
    if (is_singular()) {
        $sidebar = $urbane_theme_options['urbane-sidebar-single-page'];
        if ($sidebar == 'single-no-sidebar') {
            $classes[] = 'single-no-sidebar';
        } elseif ($sidebar == 'single-left-sidebar') {
            $classes[] = 'single-left-sidebar';
        } elseif ($sidebar == 'single-middle-column') {
            $classes[] = 'single-middle-column';
        } else {
            $classes[] = 'single-right-sidebar';
        }
    }
    
    $sidebar = $urbane_theme_options['urbane-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Urbane 1.0.0
 *
 */

add_filter('body_class', 'urbane_layout_body_class');
function urbane_layout_body_class($classes)
{
    global $urbane_theme_options;
    $layout = $urbane_theme_options['urbane-column-blog-page'];
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else {
        $classes[] = 'one-column';
    }    
    return $classes;
}


/**
 * Filter to hide text Category from category page
 *
 * @since Urbane 1.0.9
 *
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});