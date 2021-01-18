<?php 

/*Logo Position*/
$wp_customize->add_setting('urbane_options[urbane_logo_position_option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane_logo_position_option'],
    'sanitize_callback' => 'urbane_sanitize_select'
));

$wp_customize->add_control('urbane_options[urbane_logo_position_option]', array(
    'choices' => array(
        'left-logo' => __('Left Logo & Right Advertisement', 'urbane'),
        'center-logo' => __('Center Logo & Below Advertisement', 'urbane'),
    
    ),
    'label' => __('Logo Position Options', 'urbane'),
    'description' => __('You can either center the logo or left logo.', 'urbane'),
    'section' => 'title_tagline',
    'settings' => 'urbane_options[urbane_logo_position_option]',
    'type' => 'select',
    'priority' => 15,
));


/*Logo Width*/
$wp_customize->add_setting( 'urbane_options[urbane_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'urbane_options[urbane_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'urbane' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'urbane'),
   'section'   => 'title_tagline',
   'settings'  => 'urbane_options[urbane_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );