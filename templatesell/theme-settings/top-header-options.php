<?php
/*Top Header Options*/
$wp_customize->add_section( 'urbane_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header', 'urbane' ),
   'panel' 		 => 'urbane_panel',
) );

/*callback functions header section*/
if ( !function_exists('urbane_header_active_callback') ) :
  function urbane_header_active_callback(){
      global $urbane_theme_options;
      $enable_header = absint($urbane_theme_options['urbane_enable_top_header']);
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_top_header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['urbane_enable_top_header'],
   'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_top_header]', array(
   'label'     => __( 'Enable Top Header', 'urbane' ),
   'description' => __('Checked to show the top header section like search and social icons', 'urbane'),
   'section'   => 'urbane_top_header_section',
   'settings'  => 'urbane_options[urbane_enable_top_header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['urbane_enable_top_header_social'],
   'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'urbane' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'urbane'),
   'section'   => 'urbane_top_header_section',
   'settings'  => 'urbane_options[urbane_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'urbane_header_active_callback'
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_top_header_menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_enable_top_header_menu'],
    'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control( 'urbane_options[urbane_enable_top_header_menu]', array(
    'label'     => __( 'Menu in Header', 'urbane' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'urbane'),
    'section'   => 'urbane_top_header_section',
    'settings'  => 'urbane_options[urbane_enable_top_header_menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'urbane_header_active_callback'
) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'urbane_options[urbane_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['urbane_enable_header_image_overlay'],
   'sanitize_callback' => 'urbane_sanitize_checkbox'
) );

$wp_customize->add_control(
    'urbane_options[urbane_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'urbane' ),
       'description' => __('This option will add colors over the header image.', 'urbane'),
       'section'   => 'header_image',
       'settings'  => 'urbane_options[urbane_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('urbane_header_overlay_color_active_callback') ) :
  function urbane_header_overlay_color_active_callback(){
      global $urbane_theme_options;
      $slider_overlay = absint($urbane_theme_options['urbane_enable_header_image_overlay']);
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'urbane_options[urbane_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'urbane_options[urbane_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'urbane' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'urbane'),
   'section'   => 'header_image',
   'settings'  => 'urbane_options[urbane_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'urbane_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'urbane_options[urbane_slider_overlay_color]',
    array(
        'default'           => $default['urbane_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'urbane_options[urbane_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'urbane' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'urbane' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'urbane_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'urbane_options[urbane_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['urbane_slider_overlay_transparent'],
    'sanitize_callback' => 'urbane_sanitize_number'
) );
$wp_customize->add_control( 'urbane_options[urbane_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'urbane' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'urbane'),
   'section'   => 'header_image',
   'settings'  => 'urbane_options[urbane_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'urbane_header_overlay_color_active_callback',
) );