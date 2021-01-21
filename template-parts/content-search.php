<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Urbane
 */
global $urbane_theme_options;
$masonry = esc_attr($urbane_theme_options['urbane-column-blog-page']);
$image_location = esc_attr($urbane_theme_options['urbane-blog-image-layout']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?> >
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php urbane_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <div class="date_title">
                <?php the_title(sprintf('<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                <div class="post-date">
                    <?php if ('post' === get_post_type()) : ?>
                        <div class="entry-meta">
                            <i class="fa fa-user-o"></i> <?php urbane_posted_by(); ?>
                            <i class="fa fa-calendar-o"></i><?php urbane_posted_on(); ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="post-excerpt entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        </div>
    </div>
</article><!-- #post-->

