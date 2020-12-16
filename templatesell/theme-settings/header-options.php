<?php
/*Header Options*/
$wp_customize->add_section('urbane_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'urbane'),
    'panel' => 'urbane_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_enable_search'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_search]', array(
    'label'     => __( 'Enable Search', 'urbane' ),
    'description' => __('It will help to display the search in Menu.', 'urbane'),
    'section'   => 'urbane_header_section',
    'settings'  => 'urbane_options[urbane_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Offcanvas Enable Option*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_offcanvas]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_enable_offcanvas'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_offcanvas]', array(
    'label'     => __( 'Enable Offcanvas Sidebar', 'urbane' ),
    'description' => __('It will help to display the Offcanvas sidebar in Menu.', 'urbane'),
    'section'   => 'urbane_header_section',
    'settings'  => 'urbane_options[urbane_enable_offcanvas]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );