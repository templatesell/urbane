<?php
/*Promo Section Options*/

$wp_customize->add_section( 'urbane_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'urbane' ),
    'panel'          => 'urbane_panel',
) );

/*callback functions slider*/
if ( !function_exists('urbane_promo_active_callback') ) :
    function urbane_promo_active_callback(){
        global $urbane_theme_options;
        $enable_promo = absint($urbane_theme_options['urbane_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_enable_promo'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'urbane' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'urbane'),
    'section'   => 'urbane_promo_section',
    'settings'  => 'urbane_options[urbane_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'urbane_options[urbane-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Urbane_Customize_Category_Dropdown_Control(
        $wp_customize,
        'urbane_options[urbane-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'urbane' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'urbane'),
            'section'   => 'urbane_promo_section',
            'settings'  => 'urbane_options[urbane-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'urbane_promo_active_callback'
        )
    )
);