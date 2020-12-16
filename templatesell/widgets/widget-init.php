<?php

if ( ! function_exists( 'urbane_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function urbane_load_widgets() {

        // Highlight Post.
        register_widget( 'Urbane_Featured_Post' );

        // Author Widget.
        register_widget( 'Urbane_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Urbane_Social_Widget' );
    }
endif;
add_action( 'widgets_init', 'urbane_load_widgets' );


