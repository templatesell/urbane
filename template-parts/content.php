<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Urbane
 */
global $urbane_theme_options;
$show_content_from = esc_attr($urbane_theme_options['urbane-content-show-from']);
$read_more = esc_html($urbane_theme_options['urbane-read-more-text']);
$masonry = esc_attr($urbane_theme_options['urbane-column-blog-page']);
$image_location = esc_attr($urbane_theme_options['urbane-blog-image-layout']);
$social_share = absint($urbane_theme_options['urbane-show-hide-share']);
$date = absint($urbane_theme_options['urbane-show-hide-date']);
$category = absint($urbane_theme_options['urbane-show-hide-category']);
$author = absint($urbane_theme_options['urbane-show-hide-author']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php urbane_post_thumbnail(); ?>
                <div class="meta_bottom">
                <?php 
                if( 1 == $social_share ){
                    do_action( 'urbane_social_sharing' ,get_the_ID() );
                }
                ?>
            </div>
            </div>
        <?php } ?>
        <div class="post-content">
            <?php if($category == 1 ){ ?>
                <div class="post-cats">
                    <?php urbane_entry_meta(); ?>
                </div>
            <?php } ?>
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="post-meta">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="post-date">
                        <div class="entry-meta">
                            <?php
                            if($author == 1 ){
                                ?>
                                <i class="fa fa-user-o"></i>
                              <?php
                                urbane_posted_by();
                            }
                            if($date == 1 ){ ?>
                                <i class="fa fa-calendar-o"></i>
                              <?php  urbane_posted_on(); 
                             }
                            ?>
                        </div><!-- .entry-meta -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'urbane'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article><!-- #post- -->