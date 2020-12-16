<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Urbane
 */
$GLOBALS['urbane_theme_options'] = urbane_get_options_value();
global $urbane_theme_options;
$enable_slider = absint($urbane_theme_options['urbane_enable_slider']);
$enable_box = $urbane_theme_options['urbane_enable_promo'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}else { 
    do_action( 'wp_body_open' ); 
}
?>
<div id="page" class="site ">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'urbane' ); ?></a>

	<?php
    /**
     * Hook - urbane_action_header.
     *
     * @hooked urbane_add_main_header - 10
     */
    do_action( 'urbane_action_header' );
    ?>

	 <?php if ($enable_slider == 1 && (is_home() || is_front_page())) { ?>
        <section class="slider-wrapper">
            <?php
            /*
            * Slider Section Hook
            */
                do_action('urbane_action_slider');
            ?>
        </section>
    <?php } ?>
    <?php if ($enable_box == 1 && (is_home() || is_front_page() ) )  { ?>
        <section class="promo-slider-wrapper">
            <?php
            
            /*
            * Boxes Section Hook
            */
            do_action('urbane_action_boxes');
            ?>
        </section>
    <?php } ?>