<?php
/*Blog Page Options*/
$wp_customize->add_section('urbane_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'urbane'),
    'panel' => 'urbane_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('urbane_options[urbane-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-sidebar-blog-page'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control( new Urbane_Radio_Image_Control(
        $wp_customize,
    'urbane_options[urbane-sidebar-blog-page]', array(
    'choices' => urbane_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'urbane'),
    'description' => __('This sidebar will work blog and archive pages.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('urbane_options[urbane-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-column-blog-page'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control('urbane_options[urbane-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'urbane'),
        'masonry-post' => __('Masonry Layout', 'urbane'),
    
    ),
    'label' => __('Blog Layout Options', 'urbane'),
    'description' => __('Change your blog or archive page layout.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('urbane_options[urbane-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-blog-image-layout'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control('urbane_options[urbane-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'urbane'),
        'left-image' => __('Grid Layout', 'urbane'),
    
    ),
    'label' => __('Blog Page Layout', 'urbane'),
    'description' => __('This will work only on Full layout Option', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('urbane_options[urbane-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-content-show-from'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control('urbane_options[urbane-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'urbane'),
        'content' => __('Show from Content', 'urbane'),
    ),
    'label' => __('Select Content Display From', 'urbane'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('urbane_options[urbane-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('urbane_options[urbane-excerpt-length]', array(
    'label' => __('Excerpt Length', 'urbane'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('urbane_options[urbane-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('urbane_options[urbane-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'urbane'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('urbane_options[urbane-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-pagination-options'],
    'sanitize_callback' => 'urbane_sanitize_select'

));

$wp_customize->add_control('urbane_options[urbane-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'urbane'),
        'ajax' => __('Ajax Pagination', 'urbane'),
    ),
    'label' => __('Pagination Types', 'urbane'),
    'description' => __('Choose Required Pagination Type', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('urbane_options[urbane-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('urbane_options[urbane-read-more-text]', array(
    'label' => __('Read More Text', 'urbane'),
    'description' => __('Read more text for blog and archive page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('urbane_options[urbane-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-show-hide-share'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-show-hide-share]', array(
    'label' => __('Show Social Share', 'urbane'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('urbane_options[urbane-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-show-hide-category'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-show-hide-category]', array(
    'label' => __('Show Category', 'urbane'),
    'description' => __('Option to hide the category on the blog page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('urbane_options[urbane-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-show-hide-date'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-show-hide-date]', array(
    'label' => __('Show Date', 'urbane'),
    'description' => __('Option to hide the date on the blog page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('urbane_options[urbane-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-show-hide-author'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
));

$wp_customize->add_control('urbane_options[urbane-show-hide-author]', array(
    'label' => __('Show Author', 'urbane'),
    'description' => __('Option to hide the author on the blog page.', 'urbane'),
    'section' => 'urbane_blog_page_section',
    'settings' => 'urbane_options[urbane-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

