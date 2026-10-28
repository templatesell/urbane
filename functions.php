<?php
/**
 * Urbane functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Urbane
 */

/**
 * The theme version, used to bust the cache on every stylesheet and script
 * the theme enqueues. Most of them were versioned "20200412" or "4.5.0"
 * regardless of what had changed in them since.
 */
if ( ! defined( 'URBANE_VERSION' ) ) {
	define( 'URBANE_VERSION', '1.1.2' );
}

if ( ! function_exists( 'urbane_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function urbane_setup() {

		//load customizer options
		$GLOBALS['urbane_theme_options'] = urbane_get_options_value();
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Urbane, use a find and replace
		 * to change 'urbane' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'urbane', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'urbane' ),
			'top' => esc_html__( 'Top Menu', 'urbane' ),
			'social' => esc_html__( 'Social Icons', 'urbane' ),
		) );

		/*
		 * Urbane default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Let a wide or full-width block use the room the layout has for it.
		add_theme_support( 'align-wide' );

		/*
		 * The theme has advertised custom-background in its tags since it shipped
		 * without ever declaring support for it, so the option never appeared in
		 * the customizer.
		 */
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);

		/*
		 * Editor styles. The theme enqueued css/editor-styles.css on
		 * enqueue_block_editor_assets, but that file is empty and, since the post
		 * editor became an iframe, styles added that way do not reach the content
		 * anyway. add_editor_style() does, and it carries the theme's fonts in.
		 */
		add_editor_style( array( 'assets/fonts/fonts.css', 'css/editor-styles.css' ) );

		// Add support for Yoast SEO Breadcrumbs.
        add_theme_support( 'yoast-seo-breadcrumbs' );
		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'urbane' ),
					'shortName' => __( 'S', 'urbane' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'urbane' ),
					'shortName' => __( 'M', 'urbane' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'urbane' ),
					'shortName' => __( 'L', 'urbane' ),
					'size'      => 25,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'urbane' ),
					'shortName' => __( 'XL', 'urbane' ),
					'size'      => 35,
					'slug'      => 'larger',
				),
			)
		);

		/**
         * Add theme support for New Image
         *
         * @link https://developer.wordpress.org/reference/functions/add_image_size/
         */

        add_image_size('urbane-thumbnail-size', 800, 800, true);
        add_image_size('urbane-related-size', 600, 400, true);
        add_image_size('urbane-promo-post', 800, 500, true);
        add_image_size('urbane-related-post-thumbnails', 850, 550, true );
	}
endif;
add_action( 'after_setup_theme', 'urbane_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function urbane_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'urbane_content_width', 640 );
}
add_action( 'after_setup_theme', 'urbane_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function urbane_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'urbane' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'urbane' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'urbane' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'urbane' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'urbane' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas', 'urbane' ),
		'id'            => 'offcanvas',
		'description'   => esc_html__( 'Add widgets here.', 'urbane' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'urbane_widgets_init' );

/**
 * Register the theme's own block styles.
 *
 * Hooked to init, because a style label is a translated string.
 */
function urbane_register_block_styles() {

	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'urbane-lead',
			'label' => __( 'Lead paragraph', 'urbane' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'urbane-boxed',
			'label' => __( 'Boxed', 'urbane' ),
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'  => 'urbane-plain-list',
			'label' => __( 'Plain', 'urbane' ),
		)
	);
}
add_action( 'init', 'urbane_register_block_styles' );

/**
 * Load TS Core Files
 */
require get_template_directory() . '/templatesell/ts-core-files.php';