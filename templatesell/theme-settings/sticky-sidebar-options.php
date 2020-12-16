<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'urbane_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'urbane' ),
   'panel' 		 => 'urbane_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'urbane_options[urbane-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane-enable-sticky-sidebar'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'urbane' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'urbane'),
    'section'   => 'urbane_sticky_sidebar',
    'settings'  => 'urbane_options[urbane-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );