<?php
/**
 * Enqueue scripts and styles.
 */
function urbane_scripts() {

	/*google font  */
	global $urbane_theme_options;
    /*body  */
    wp_enqueue_style('urbane-body', '//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('urbane-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('urbane-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/grid.min.css', array(), '4.5.0' );
    
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );

   /*Main CSS*/
    wp_enqueue_style( 'urbane-style', get_stylesheet_uri() );

	/*RTL CSS*/
	wp_style_add_data( 'urbane-style', 'rtl', 'replace' );

    $urbane_pagination_option =  esc_attr($urbane_theme_options['urbane-pagination-options']);
    
    if( 'ajax' == $urbane_pagination_option )  {
    	
    	wp_enqueue_script( 'urbane-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '20200412', true );

    $masonry =  esc_attr($urbane_theme_options['urbane-column-blog-page']);
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'urbane-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'urbane-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0', true  );
    

    
    /*Custom Script JS*/
	wp_enqueue_script( 'urbane-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'urbane-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'urbane-custom', 'urbane_ajax', array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'urbane' ),
        'no_more_posts'        => __( 'No More', 'urbane' ),
    ));

	wp_enqueue_script( 'urbane-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $urbane_theme_options;
	if( 1 == absint($urbane_theme_options['urbane-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'urbane-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'urbane_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function urbane_block_styles() {
    wp_enqueue_style( 'urbane-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    /*body  */
    wp_enqueue_style('urbane-editor-body', '//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('urbane-editor-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);

    $urbane_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ font-family: Poppins;}

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Prata;} 
    ';

    wp_add_inline_style( 'urbane-editor-styles', $urbane_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'urbane_block_styles' );


/**
 * Enqueue Style for block pattern.
 */
function prefer_blog_block_style() {

    /*Block Pattern*/
    if (is_admin()) {
        wp_enqueue_style( 'urbane-block-style', get_template_directory_uri() . '/templatesell/patterns/block-style.css');
    }
}
add_action( 'enqueue_block_assets', 'prefer_blog_block_style');
