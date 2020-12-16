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