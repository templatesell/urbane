<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('urbane_breadcrumb_options')) :
    function urbane_breadcrumb_options()
    {
        global $urbane_theme_options;
        $breadcrumbs = absint($urbane_theme_options['urbane-extra-breadcrumb']);
        $breadcrumb_from = esc_attr($urbane_theme_options['urbane-breadcrumb-selection-option']);        

        if ( $breadcrumbs == 1 && $breadcrumb_from == 'theme' ) {
            urbane_breadcrumbs();
        }elseif($breadcrumbs == 1 &&  $breadcrumb_from == 'yoast' && (function_exists('yoast_breadcrumb'))){
            yoast_breadcrumb();
        }elseif($breadcrumbs == 1 && 'rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif($breadcrumbs == 1 && 'navxt' == $breadcrumb_from && (function_exists('bcn_display'))){
            bcn_display();
        }else{
            //do nothing
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