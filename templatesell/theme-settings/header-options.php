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


/*Advertisement*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_advertisement]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['urbane_enable_advertisement'],
    'sanitize_callback' => 'urbane_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'urbane_options[urbane_enable_advertisement]',
        array(
            'label'   => __( 'Header Advertisement Image', 'urbane' ),
            'section'   => 'urbane_header_section',
            'settings'  => 'urbane_options[urbane_enable_advertisement]',
            'type'      => 'image',
            'priority'  => 10,
            'description' => __( 'Recommended image size of 728*90', 'urbane' )
        )
    )
);

/*Ads Link*/
$wp_customize->add_setting( 'urbane_options[urbane_link_advertisement]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_link_advertisement'],
    'sanitize_callback' => 'esc_url_raw'
) );

$wp_customize->add_control( 'urbane_options[urbane_link_advertisement]', array(
    'label'     => __( 'Advertisement Link', 'urbane' ),
    'description' => __('Enter the link for the ads.', 'urbane'),
    'section'   => 'urbane_header_section',
    'settings'  => 'urbane_options[urbane_link_advertisement]',
    'type'      => 'url',
    'priority'  => 10,

) );