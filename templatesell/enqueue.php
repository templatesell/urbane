<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Urbane
 */

/**
 * Enqueue the front-end styles and scripts.
 */
function urbane_scripts() {

	global $urbane_theme_options;

	// Bundled fonts: Poppins, Prata and Monsieur La Doulaise.
	wp_enqueue_style( 'urbane-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), URBANE_VERSION );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/grid.min.css', array(), URBANE_VERSION );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.0' );

	wp_enqueue_style( 'urbane-style', get_stylesheet_uri(), array( 'urbane-fonts', 'grid-css' ), URBANE_VERSION );
	wp_style_add_data( 'urbane-style', 'rtl', 'replace' );

	$urbane_pagination = isset( $urbane_theme_options['urbane-pagination-options'] )
		? $urbane_theme_options['urbane-pagination-options']
		: '';

	if ( 'ajax' === $urbane_pagination ) {
		wp_enqueue_script( 'urbane-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array( 'jquery' ), URBANE_VERSION, true );
	}

	$urbane_layout = isset( $urbane_theme_options['urbane-column-blog-page'] )
		? $urbane_theme_options['urbane-column-blog-page']
		: '';

	if ( 'masonry-post' === $urbane_layout || 'one-column' === $urbane_layout ) {
		// masonry and imagesloaded ship with WordPress.
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'urbane-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array( 'jquery', 'masonry', 'imagesloaded' ), URBANE_VERSION, true );
	}

	wp_enqueue_script( 'urbane-navigation', get_template_directory_uri() . '/js/navigation.js', array(), URBANE_VERSION, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '1.8.0', true );

	// Theme scripts.
	wp_enqueue_script( 'urbane-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), URBANE_VERSION, true );

	wp_enqueue_script( 'urbane-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), URBANE_VERSION, true );

	global $wp_query;

	$urbane_paged     = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	$urbane_max_pages = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;

	wp_localize_script(
		'urbane-custom',
		'urbane_ajax',
		array(
			'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
			'paged'         => $urbane_paged,
			'max_num_pages' => $urbane_max_pages,
			'next_posts'    => next_posts( $urbane_max_pages, false ),
			'show_more'     => __( 'View More', 'urbane' ),
			'no_more_posts' => __( 'No More', 'urbane' ),
			'expand_menu'   => __( 'Expand child menu', 'urbane' ),
		)
	);

	wp_enqueue_script( 'urbane-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), URBANE_VERSION, true );

	$urbane_sticky_sidebar = isset( $urbane_theme_options['urbane-enable-sticky-sidebar'] )
		? absint( $urbane_theme_options['urbane-enable-sticky-sidebar'] )
		: 0;

	if ( 1 === $urbane_sticky_sidebar ) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );
		wp_enqueue_script( 'urbane-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array( 'jquery', 'theia-sticky-sidebar' ), URBANE_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'urbane_scripts' );

/**
 * Enqueue the block pattern styles.
 */
function urbane_block_assets() {
	wp_enqueue_style( 'urbane-block-style', get_template_directory_uri() . '/templatesell/patterns/block-style.css', array(), URBANE_VERSION );
}
add_action( 'enqueue_block_assets', 'urbane_block_assets' );
