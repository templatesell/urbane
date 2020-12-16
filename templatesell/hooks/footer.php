<?php
/**
 * Goto Top functions
 *
 * @since Urbane 1.0.0
 *
 */

if (!function_exists('urbane_go_to_top')) :
    function urbane_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'urbane'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
<?php
    } endif;
add_action('urbane_go_to_top_hook', 'urbane_go_to_top', 10, 1);