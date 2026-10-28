<?php
/**
 * Urbane Slider Function
 * @since Urbane 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $urbane_theme_options;

$urbane_slide_id = isset( $urbane_theme_options['urbane-select-category'] )
	? absint( $urbane_theme_options['urbane-select-category'] )
	: 0;

$urbane_slick_args = array(
	'slidesToShow'   => 1,
	'slidesToScroll' => 1,
	'dots'           => false,
	'arrows'         => false,
);

/*
 * Only posts that have a featured image, because a slide is the image: a
 * post without one used to be fetched, counted and then skipped, which could
 * leave an empty slider on the page.
 */
$urbane_slider_query = new WP_Query(
	array(
		'posts_per_page'      => 5,
		'cat'                 => $urbane_slide_id,
		'post_type'           => 'post',
		'meta_key'            => '_thumbnail_id',
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);

if ( $urbane_slider_query->have_posts() ) :
	?>
	<div class="modern-slider" data-slick="<?php echo esc_attr( wp_json_encode( $urbane_slick_args ) ); ?>">
		<?php
		while ( $urbane_slider_query->have_posts() ) :
			$urbane_slider_query->the_post();

			$urbane_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'urbane-thumbnail-size' );

			if ( ! $urbane_image ) {
				continue;
			}
			?>
				<div class="slider-items">
          <div class="slide-wrap">
            <div class="col-md-12">
              <div class="slider-height img-cover" style="background-image: url(<?php echo esc_url( $urbane_image[0] ); ?>)">
                <div class="caption">
                    <?php
                       $categories = get_the_category();
                       if ( ! empty( $categories ) ) {
                          echo '<a class="s-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                      }
                    ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-meta">
                      <?php urbane_posted_by(); ?>
                      <?php urbane_posted_on(); ?>
                    </div>
              </div>
              </div>
            </div>
          </div>
        </div>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
    </div>
<?php endif; ?>
