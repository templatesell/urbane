<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('urbane_social_sharing')) :
    function urbane_social_sharing($post_id)
    {
        $urbane_url = get_the_permalink($post_id);
        $urbane_title = get_the_title($post_id);
        $urbane_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $urbane_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $urbane_title . '&url=' . $urbane_url);
        $urbane_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $urbane_url);
        $urbane_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $urbane_url . '&media=' . $urbane_image . '&description=' . $urbane_title);
        $urbane_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $urbane_title . '&url=' . $urbane_url);
        
        ?>
        <div class="meta_bottom">
            <div class="post-share">
                <a target="_blank" href="<?php echo $urbane_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="<?php echo $urbane_twitter_sharing_url; ?>"><i
                            class="fa fa-twitter"></i></a>
                <a target="_blank" href="<?php echo $urbane_pinterest_sharing_url; ?>"><i
                            class="fa fa-pinterest"></i></a>
                <a target="_blank" href="<?php echo $urbane_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <?php
    }
endif;
add_action('urbane_social_sharing', 'urbane_social_sharing', 10);