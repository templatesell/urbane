<?php
/**
 * Dynamic CSS.
 *
 * @package Urbane
 * @since Urbane 1.0.0
 */

if ( ! function_exists( 'urbane_accent_selectors' ) ) :
	/**
	 * Every selector in style.css that is painted with the theme accent,
	 * grouped by the property each rule needs.
	 *
	 * The customizer used to repaint fifty-one of the hundred and thirty-eight
	 * places the stylesheet hard-codes the accent, so changing the Primary
	 * Color left the post-format marks, the checkboxes and radio buttons, the
	 * comment links, the file and newsletter buttons, the quote card and the
	 * text widget's controls all pink. The list below is that stylesheet audit.
	 *
	 * A shorthand such as "border: 1px solid" is repainted through its colour
	 * longhand, so only the colour changes and the width and style stay put.
	 *
	 * @return array Property name => array of selectors.
	 */
	function urbane_accent_selectors() {

		$selectors = array(
			'background-color' => array(
				'#toTop',
				'.bottom-caption .slick-current .slider-items span',
				'.cart-inner',
				'.comment-form #submit',
				'.format-quote .post-wrap',
				'.mc4wp-form-fields input[type="submit"]:active',
				'.mc4wp-form-fields input[type="submit"]:focus',
				'.mc4wp-form-fields input[type="submit"]:hover',
				'.more-link',
				'.post-excerpt .wp-block-file .wp-block-file__button:active',
				'.post-excerpt .wp-block-file .wp-block-file__button:focus',
				'.post-excerpt .wp-block-file .wp-block-file__button:hover',
				'.post-excerpt .wp-block-file .wp-block-file__button:visited',
				'.post-slider-section .s-cat',
				'.show-more',
				'.textwidget button:hover',
				'.textwidget input[type="button"]:hover',
				'.textwidget input[type="reset"]:hover',
				'.textwidget input[type="submit"]:hover',
				'.wpcf7-form-control.wpcf7-submit',
				'a.link-format',
				'article.format-aside .post-content .post-format::after',
				'article.format-audio .post-content .post-format::after',
				'article.format-chat .post-content .post-format::after',
				'article.format-gallery .post-content .post-format::after',
				'article.format-image .post-content .post-format::after',
				'article.format-link .post-content .post-format::after',
				'article.format-quote .post-content .post-format::after',
				'article.format-standard .post-content .post-format::after',
				'article.format-status .post-content .post-format::after',
				'article.format-video .post-content .post-format::after',
				'article.hentry.sticky .post-content .post-format::after',
				'input[type="checkbox"]:checked',
				'input[type="radio"]:checked',
			),

			'border-bottom-color' => array(
				'.textwidget input[type="date"]:focus',
				'.textwidget input[type="date"]:hover',
				'.textwidget input[type="email"]:focus',
				'.textwidget input[type="email"]:hover',
				'.textwidget input[type="number"]:focus',
				'.textwidget input[type="number"]:hover',
				'.textwidget input[type="password"]:focus',
				'.textwidget input[type="password"]:hover',
				'.textwidget input[type="search"]:focus',
				'.textwidget input[type="search"]:hover',
				'.textwidget input[type="tel"]:focus',
				'.textwidget input[type="tel"]:hover',
				'.textwidget input[type="text"]:focus',
				'.textwidget input[type="text"]:hover',
				'.textwidget input[type="url"]:focus',
				'.textwidget input[type="url"]:hover',
				'.textwidget select:active',
				'.textwidget select:focus',
				'.textwidget select:hover',
				'.textwidget textarea:focus',
				'.textwidget textarea:hover',
			),

			'border-color' => array(
				'#author:active',
				'#author:focus',
				'#author:hover',
				'#comment:active',
				'#comment:focus',
				'#comment:hover',
				'#email:active',
				'#email:focus',
				'#email:hover',
				'#url:active',
				'#url:focus',
				'#url:hover',
				'.bottom-caption .slick-current .slider-items span',
				'.slide-wrap .caption:after',
				'.textwidget input[type="file"]:focus',
				'.textwidget input[type="file"]:hover',
				'input[type="checkbox"]:checked',
				'input[type="checkbox"]:focus',
				'input[type="checkbox"]:hover',
				'input[type="radio"]:checked',
				'input[type="radio"]:hover',
			),

			'border-top-color' => array(
				'.main-menu.submenu-top-border li > ul',
			),

			'color' => array(
				'.about-author-name a:focus',
				'.about-author-name a:hover',
				'.about-author-posts-link:focus',
				'.about-author-posts-link:hover',
				'.comment-body .reply .comment-reply-link:hover',
				'.comment-content a:focus',
				'.comment-content a:hover',
				'.comment-form .logged-in-as a:last-child:focus',
				'.comment-form .logged-in-as a:last-child:hover',
				'.comment-list .pingback .comment-body .edit-link .comment-edit-link:focus',
				'.comment-list .pingback .comment-body .edit-link .comment-edit-link:hover',
				'.comment-list .pingback .comment-body > a:focus',
				'.comment-list .pingback .comment-body > a:hover',
				'.comment-meta .comment-author .fn .url:focus',
				'.comment-meta .comment-author .fn .url:hover',
				'.comment-meta .comment-metadata a:focus',
				'.comment-meta .comment-metadata a:hover',
				'.comment-navigation .nav-links a:focus',
				'.comment-navigation .nav-links a:hover',
				'.comment-reply-title #cancel-comment-reply-link:hover',
				'.comment-respond .must-log-in a:focus',
				'.comment-respond .must-log-in a:hover',
				'.content a:focus',
				'.content a:hover',
				'.footer-menu li a:focus',
				'.footer-menu li a:hover',
				'.footer-social-links a:focus',
				'.footer-social-links a:hover',
				'.main-menu ul li.current-menu-item > a',
				'.main-menu ul li:hover > a',
				'.page-404-content a:focus',
				'.page-404-content a:hover',
				'.pagination a.page-numbers:hover',
				'.post-cats > span a',
				'.post-cats > span i',
				'.post-date a:focus',
				'.post-date a:hover',
				'.post-excerpt .wp-block-calendar #wp-calendar tfoot td a:focus',
				'.post-excerpt .wp-block-calendar #wp-calendar tfoot td a:hover',
				'.post-excerpt .wp-block-file a:not(.wp-block-file__button)',
				'.post-excerpt .wp-block-file a:not(.wp-block-file__button):focus',
				'.post-excerpt .wp-block-file a:not(.wp-block-file__button):hover',
				'.post-excerpt a:focus',
				'.post-excerpt a:hover',
				'.post-navigation .nav-links a:focus',
				'.post-navigation .nav-links a:hover',
				'.post-tags > span a',
				'.post-tags i',
				'.posts-navigation .nav-links a:focus',
				'.posts-navigation .nav-links a:hover',
				'.promo-three .post-category a',
				'.site-footer a:focus',
				'.site-footer a:hover',
				'.widget .widget-title a:focus',
				'.widget .widget-title a:hover',
				'.widget a:focus',
				'.widget a:hover',
				'.widget_search #searchform .search-submit:hover',
				'a:hover',
				'blockquote:before',
				'ul.trail-items li a:hover span',
			),

		);

		/*
		 * Painted from the customizer without being hard-coded in the
		 * stylesheet: the menu and header states, and the comment fields, which
		 * the stylesheet only gives an accent on hover.
		 */
		$selectors['color'] = array_merge(
			$selectors['color'],
			array(
				'.author-socials a:hover',
				'.header-2 .main-menu > ul > li.current-menu-item > a',
				'.main-header a:active',
				'.main-header a:focus',
				'.main-header a:hover',
				'.main-menu ul li.current-menu-ancestor > a',
				'.main-menu ul li.current-menu-parent > a',
				'.main-menu ul ul li:hover > a',
				'.post-footer > span a:focus',
				'.post-footer > span a:hover',
				'.slide-wrap .caption span a:hover',
				'.tabs-nav li.tab-active',
				'.tabs-nav li.tab-active a',
				'.top-menu > ul > li > a:hover',
			)
		);

		$selectors['background-color'] = array_merge(
			$selectors['background-color'],
			array(
				'.meta_bottom .post-share a:hover',
				'.pagination .page-numbers.current',
				'.sidebar-3 .widget-title:after',
				'.tabs-nav li:before',
				'a.effect:before',
			)
		);

		$selectors['border-color'] = array_merge(
			$selectors['border-color'],
			array(
				'#author:active',
				'#author:focus',
				'#author:hover',
				'#comment:active',
				'#comment:focus',
				'#email:active',
				'#email:focus',
				'#email:hover',
				'#url:active',
				'#url:focus',
				'#url:hover',
				'.pagination .page-numbers.current',
			)
		);

		foreach ( $selectors as $property => $list ) {
			$list                     = array_unique( $list );
			sort( $list );
			$selectors[ $property ] = $list;
		}

		return apply_filters( 'urbane_accent_selectors', $selectors );
	}
endif;

if ( ! function_exists( 'urbane_dynamic_css' ) ) :
	/**
	 * Build the stylesheet that carries the customizer's settings.
	 */
	function urbane_dynamic_css() {

		global $urbane_theme_options;

		$urbane_defaults = urbane_default_theme_options_values();

		/*
		 * esc_attr() will happily pass "red; }" through into a stylesheet.
		 * sanitize_hex_color() returns null for anything that is not a hex
		 * colour, and the theme default stands in for it.
		 */
		$urbane_primary_color = sanitize_hex_color( $urbane_theme_options['urbane_primary_color'] );

		if ( null === $urbane_primary_color ) {
			$urbane_primary_color = $urbane_defaults['urbane_primary_color'];
		}

		$urbane_logo_width         = absint( $urbane_theme_options['urbane_logo_width_option'] );
		$urbane_header_overlay     = sanitize_hex_color( $urbane_theme_options['urbane_slider_overlay_color'] );
		$urbane_header_transparent = $urbane_theme_options['urbane_slider_overlay_transparent'];
		$urbane_header_min_height  = absint( $urbane_theme_options['urbane_header_image_height'] );

		$custom_css = '';

		if ( $urbane_primary_color ) {

			foreach ( urbane_accent_selectors() as $urbane_property => $urbane_list ) {

				if ( empty( $urbane_list ) ) {
					continue;
				}

				$custom_css .= sprintf(
					'%1$s { %2$s: %3$s; }',
					implode( ', ', $urbane_list ),
					$urbane_property,
					$urbane_primary_color
				);
			}

			/*
			 * Keyboard focus is drawn in the accent, so it follows the
			 * customizer rather than staying the colour the theme shipped with.
			 */
			$custom_css .= sprintf(
				'a:focus, button:focus, input:focus, select:focus, textarea:focus, [tabindex]:focus, a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible, [tabindex]:focus-visible { outline-color: %1$s; }',
				$urbane_primary_color
			);
		}

		if ( ! empty( $urbane_logo_width ) ) {
			$custom_css .= sprintf( '.header-1 .head_one .logo { max-width: %dpx; }', $urbane_logo_width );
		}

		if ( ! empty( $urbane_header_overlay ) ) {
			$custom_css .= sprintf( '.header-image:before { background-color: %s; }', $urbane_header_overlay );
		}

		if ( '' !== $urbane_header_transparent && null !== $urbane_header_transparent ) {
			$custom_css .= sprintf( '.header-image:before { opacity: %s; }', floatval( $urbane_header_transparent ) );
		}

		if ( ! empty( $urbane_header_min_height ) ) {
			$custom_css .= sprintf( '.header-1 .header-image .head_one { min-height: %dpx; }', $urbane_header_min_height );
		}

		if ( '' !== $custom_css ) {
			wp_add_inline_style( 'urbane-style', $custom_css );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'urbane_dynamic_css', 99 );
