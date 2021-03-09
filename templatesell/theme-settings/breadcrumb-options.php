<?php 
/*Extra Options*/

$wp_customize->add_section( 'urbane_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'urbane' ),
    'panel'          => 'urbane_panel',
) );



/*Breadcrumb Enable*/
$wp_customize->add_setting( 'urbane_options[urbane-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane-extra-breadcrumb'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'urbane' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'urbane' ),
    'section'   => 'urbane_extra_options',
    'settings'  => 'urbane_options[urbane-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions related posts*/
if (!function_exists('urbane_breadcrumb_callback')) :
    function urbane_breadcrumb_callback()
    {
        global $urbane_theme_options;
        $breadcrumb = absint($urbane_theme_options['urbane-extra-breadcrumb']);
        if (1 == $breadcrumb) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select Breadcrumb From*/
$wp_customize->add_setting('urbane_options[urbane-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-breadcrumb-selection-option'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control('urbane_options[urbane-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme' => __('Theme Default', 'urbane'),
        'yoast' => __('Yoast Plugin', 'urbane'),
        'rankmath' => __('Rank Math Plugin', 'urbane'),
        'navxt' => __('NavXT Plugin', 'urbane'),
    ),
    'label' => __('Select Breadcrumb From', 'urbane'),
    'description' => __('You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use plugin Breadcrumb.', 'urbane'),
    'section' => 'urbane_extra_options',
    'settings' => 'urbane_options[urbane-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
    'active_callback'=>'urbane_breadcrumb_callback',
));