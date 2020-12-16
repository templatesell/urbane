<?php
/*Single Page Options*/
$wp_customize->add_section('urbane_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'urbane'),
    'panel' => 'urbane_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('urbane_options[urbane-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-single-page-featured-image'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'urbane'),
    'description' => __('You can hide images on single post from here.', 'urbane'),
    'section' => 'urbane_single_page_section',
    'settings' => 'urbane_options[urbane-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('urbane_options[urbane-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-sidebar-single-page'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control( 
    new Urbane_Radio_Image_Control(
        $wp_customize,
    'urbane_options[urbane-sidebar-single-page]', array(
    'choices' => urbane_sidebar_position_array(),
    'label' => __('Select Sidebar', 'urbane'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'urbane'),
    'section' => 'urbane_single_page_section',
    'settings' => 'urbane_options[urbane-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('urbane_options[urbane-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-single-page-related-posts'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-single-page-related-posts]', array(
    'label' => __('Related Posts', 'urbane'),
    'description' => __('2 posts of same category will appear.', 'urbane'),
    'section' => 'urbane_single_page_section',
    'settings' => 'urbane_options[urbane-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('urbane_related_post_callback')) :
    function urbane_related_post_callback()
    {
        global $urbane_theme_options;
        $related_posts = absint($urbane_theme_options['urbane-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('urbane_options[urbane-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('urbane_options[urbane-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'urbane'),
    'description' => __('Enter the suitable title.', 'urbane'),
    'section' => 'urbane_single_page_section',
    'settings' => 'urbane_options[urbane-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'urbane_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('urbane_options[urbane-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-single-social-share'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-single-social-share]', array(
    'label' => __('Social Sharing', 'urbane'),
    'description' => __('Enable Social Sharing on Single Posts.', 'urbane'),
    'section' => 'urbane_single_page_section',
    'settings' => 'urbane_options[urbane-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
