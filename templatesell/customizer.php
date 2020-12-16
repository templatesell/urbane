<?php
/**
 * Urbane Theme Customizer
 *
 * @package Urbane
 */

if ( !function_exists('urbane_default_theme_options_values') ) :

    function urbane_default_theme_options_values() {

        $default_theme_options = array(

          /*Logo Options*/
          'urbane_logo_width_option' => '600',

            /*Top Header*/
            'urbane_enable_top_header'=> 0, 
            'urbane_enable_top_header_social'=> 0,
            'urbane_enable_top_header_menu'=> 0,

            /*Header Image*/
            'urbane_enable_header_image_overlay'=> 0,
            'urbane_slider_overlay_color'=> '#000000',
            'urbane_slider_overlay_transparent'=> '0.1',
            'urbane_header_image_height'=> '100',

           /*Header Options*/
            'urbane_enable_offcanvas'  => 0,
            'urbane_enable_search'  => 0,

            /*Colors Options*/
            'urbane_primary_color'              => '#d42929',

            /*Slider Options*/
            'urbane_enable_slider'      => 1,
            'urbane-select-category'    => 0,
    
            /*Boxes Section */
            'urbane_enable_promo'       => 1,
            'urbane-promo-select-category'=> 0,
            
            /*Blog Page*/
            'urbane-sidebar-blog-page' => 'no-sidebar',
            'urbane-column-blog-page'  => 'masonry-post',
            'urbane-blog-image-layout' => 'full-image',
            'urbane-content-show-from' => 'excerpt',
            'urbane-excerpt-length'    => 25,
            'urbane-pagination-options'=> 'ajax',
            'urbane-blog-exclude-category'=> '',
            'urbane-read-more-text'    => '',
            'urbane-show-hide-share'   => 1,
            'urbane-show-hide-category'=> 1,
            'urbane-show-hide-date'=> 1,
            'urbane-show-hide-author'=> 1,

            /*Single Page */
            'urbane-single-page-featured-image' => 1,
            'urbane-single-page-related-posts'  => 0,
            'urbane-single-page-related-posts-title' => esc_html__('Related Posts','urbane'),
            'urbane-sidebar-single-page'=> 'single-right-sidebar',
            'urbane-single-social-share' => 1,


            /*Sticky Sidebar*/
            'urbane-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'urbane-footer-copyright'  => esc_html__('Copyright All Right Reserved 2020','urbane'),

            /*Breadcrumb Options*/
            'urbane-extra-breadcrumb' => 1,

        );
return apply_filters( 'urbane_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Urbane Theme Options and Settings
 *
 * @since Urbane 1.0.0
 *
 * @param null
 * @return array urbane_get_options_value
 *
 */
if ( !function_exists('urbane_get_options_value') ) :
    function urbane_get_options_value() {
        $urbane_default_theme_options_values = urbane_default_theme_options_values();
        $urbane_get_options_value = get_theme_mod( 'urbane_options');
        if( is_array( $urbane_get_options_value )){
            return array_merge( $urbane_default_theme_options_values, $urbane_get_options_value );
        }
        else{
            return $urbane_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function urbane_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'urbane_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'urbane_customize_partial_blogdescription',
     ) );
  }
  $default = urbane_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'urbane_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function urbane_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function urbane_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function urbane_customize_preview_js() {
	wp_enqueue_script( 'urbane-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'urbane_customize_preview_js' );

/*
** Customizer Styles
*/
function urbane_panels_css() {
     wp_enqueue_style('urbane-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'urbane_panels_css' );