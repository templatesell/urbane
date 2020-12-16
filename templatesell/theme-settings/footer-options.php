<?php
/*Footer Options*/
$wp_customize->add_section('urbane_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'urbane'),
    'panel' => 'urbane_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('urbane_options[urbane-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['urbane-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('urbane_options[urbane-footer-copyright]', array(
    'label' => __('Copyright Text', 'urbane'),
    'description' => __('Enter your own copyright text.', 'urbane'),
    'section' => 'urbane_footer_section',
    'settings' => 'urbane_options[urbane-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
