<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('urbane_breadcrumb_options')) :
    function urbane_breadcrumb_options()
    {
        global $urbane_theme_options;
        if (1 == $urbane_theme_options['urbane-extra-breadcrumb']) {
            urbane_breadcrumbs();
        }
    }
endif;
add_action('urbane_breadcrumb_options_hook', 'urbane_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('urbane_breadcrumbs')):
    function urbane_breadcrumbs()
    {
        if (!function_exists('urbane_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        urbane_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('urbane_breadcrumbs_hook', 'urbane_breadcrumbs');