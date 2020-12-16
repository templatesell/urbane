<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Urbane 1.0.0
 *
 */
if (!function_exists('urbane_masonry_start')) :
    function urbane_masonry_start()
    { ?>
        <div class="masonry-start"><div id="masonry-loop">
        
        <?php
    }
endif;
add_action('urbane_masonry_start_hook', 'urbane_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Urbane 1.0.0
 *
 */
if (!function_exists('urbane_masonry_end')) :
    function urbane_masonry_end()
    { ?>
        </div>
        </div>
        
        <?php
    }
endif;
add_action('urbane_masonry_end_hook', 'urbane_masonry_end', 10, 1);