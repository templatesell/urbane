<?php
/*Slider Options*/

$wp_customize->add_section( 'urbane_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'urbane' ),
   'panel' 		 => 'urbane_panel',
) );

/*callback functions slider*/
if ( !function_exists('urbane_slider_active_callback') ) :
  function urbane_slider_active_callback(){
      global $urbane_theme_options;
      $enable_slider = absint($urbane_theme_options['urbane_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['urbane_enable_slider'],
   'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control(
    'urbane_options[urbane_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'urbane' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'urbane'),
       'section'   => 'urbane_slider_section',
       'settings'  => 'urbane_options[urbane_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'urbane_options[urbane-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Urbane_Customize_Category_Dropdown_Control(
        $wp_customize,
        'urbane_options[urbane-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'urbane' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'urbane'),
            'section'   => 'urbane_slider_section',
            'settings'  => 'urbane_options[urbane-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'urbane_slider_active_callback',
        )
    )

);