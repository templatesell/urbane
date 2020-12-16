<?php 
/*Logo Section*/
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