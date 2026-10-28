=== Urbane ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/urbane-masonry-wordpress-blog-theme/
Author URI: https://www.templatesell.com/
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, blog, news
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.1.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for author information, featured posts, social icons, etc. It comes with primary color option to change the whole site color with a single click. It is advertisement ready theme. More Details: https://www.templatesell.com/item/urbane-masonry-wordpress-blog-theme/

== Description ==

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.
== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Urbane includes support for Infinite Scroll in Jetpack.

== Notes ==
* Custom pagination for numeric is made.

== Changelog ==
= 1.1.2 - August 22 2026 =

Fixed
* The featured slider was configured into a variable that was never encoded, so the slider was handed no settings at all and PHP 8 logged an undefined variable on every front page view
* The slider asked for five posts and then silently skipped any without a featured image, which could leave an empty slider on the page; it now asks only for posts that have one
* Block patterns were registered while the file was being included, which asked WordPress for a translation before it had loaded one - the "translation loading was triggered too early" notice logged on every page view since WordPress 6.7
* The text domain was loaded without being told where the language files are
* One string in the About page still carried another theme's text domain, so it could never be translated by a WordPress.org language pack
* Four font families were named in the stylesheets and never loaded - the search field, pullquotes, the verse block, the calendar and the mobile menu all fell back to a browser default. In right-to-left languages that included the body text of the whole site
* The right-to-left stylesheet set a different heading font from the left-to-right one
* The block pattern styles were loaded in the admin only, so a pattern looked right while it was being written and wrong once it was published
* The author widget's script was registered with true where a version belongs, so it was versioned "1" and printed in the head
* The comment form built its two-up name and email layout from Bootstrap grid markup split across three field definitions, and called the website field "website" where WordPress calls it "url". Logged in, WordPress removed the two fields that opened the row and left the one that closed it, so the website field sat indented and narrower with no row around it and the stray closing tag ended the form early, dropping the submit button back to the browser default. The fields are standard WordPress markup now, which is what the theme's own comment-form styles were written for - they had never applied to anything
* The comment fields had no labels, only placeholders, which vanish as soon as anything is typed
* The comment fields turned off their focus outline and marked focus with the same border colour they use for hover, so a keyboard user could not tell one from the other
* url, number and date inputs were left out of the base field rule, so the comment form website field rendered a point smaller and three pixels shorter than the name and email fields beside it
* The right-to-left stylesheet, which replaces the main one rather than adding to it, carried no base rule for text inputs, textareas or selects at all - every field in the theme rendered as a browser default

Performance
* Fonts are served from the theme instead of being fetched from Google on every page view, which also stops the visitor's IP address being handed to a third party before they have agreed to anything
* Prata was downloaded on every page view and never used by the left-to-right design; it now carries the serif elements in both directions
* Removed three JavaScript files that were never served: two copies of iScroll, which nothing referenced, and a copy of imagesLoaded that WordPress's own registration always overrode
* imagesLoaded and Masonry now come from WordPress, and only on the layouts that use them
* Every stylesheet and script is versioned from the theme version instead of "20200412" or "4.5.0", so caches bust when they should
* The scripts that call jQuery now declare it, instead of relying on the slider being enqueued first

Editor
* Added editor styles. The theme enqueued an empty file, and did so in a way that no longer reaches the content now that the editor is an iframe, so writing a post looked nothing like reading one
* Added three block styles: Lead paragraph, Boxed and Plain
* Added support for wide alignment

Other
* Declared support for a custom background, which the theme has advertised in its tags since it shipped without the option ever appearing in the customizer
* Corrected the readme: the stable tag said 1.0.0, and the PHP requirement said 4.7, which is a WordPress version
* Tested up to WordPress 7.1

= 1.1.1 - February 24 2022 =
* Tested with WordPress 5.9
* Changed copyright date
* Fixed widget screen

= 1.1.0 - August 11 2021 =
* Tested with WordPress 5.8
* Disable new widget screen

= 1.0.9 - April 01 2021 =
* Tested with WordPress 5.7

= 1.0.8 - March 09 2021 =
* Added compatibility for plugin breadcrumbs
* Pro notice added 

= 1.0.7 - February 06 2021 =
* Fixed some minor css 

= 1.0.6 - January 25 2021 =
* Fixed some minor css for mobile view

= 1.0.5 - January 23 2021 =
* Fixed mailchimp form design
* Fixed header image
* Fixed releated post design
* Fixed some minor css fixes

= 1.0.4 - January 22 2021 =
* Fixed some minor css fixes

= 1.0.3 - January 22 2021 =
* Added upgrade to pro
* Added about us page
* Fixed some minor css fixes

= 1.0.2 - January 21 2021 =
* Fixed reviewer issues
* Keyboard navigation fixed
* Added underline in links

= 1.0.1 - January 18 2021 =
* Added Block Patterns
* Fixed some minor css issues

= 1.0.0 - December 21 2020 =
* Initial release

== Credits ==

Urbane is free WordPress theme by, Template Sell.
Urbane is distributed under the terms of the GNU GPL v2 or later.


* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* BreadcrumbTrail, Copyright (c) 2008 - 2015, Justin Tadlock http://themehybrid.com/plugins/breadcrumb-trail
* Theia Sticky Sidebar https://github.com/WeCodePixels/theia-sticky-sidebar [MIT license]
* Slick Slider https://github.com/kenwheeler/slick/blob/master/LICENSE [The MIT License (MIT)]
* Font-Awesome https://github.com/FortAwesome/Font-Awesome FontAwesome 4.7.0 Copyright 2012 Dave Gandy Font License: SIL OFL 1.1 Code License: MIT License http://fontawesome.io/license/
* Poppins, Copyright 2014 Indian Type Foundry, Jonny Pinhorn, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Poppins
* Prata, Copyright 2011 Cyreal, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Prata
* Monsieur La Doulaise, Copyright 2011 Sudtipos, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Monsieur+La+Doulaise


== Block Patters & Screenshot Images [CCO License] ==
Image for theme screenshot, Copyright Foodie Girl
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/cookies-dessert-BSLV1NZFJ3

Image for theme screenshot, Copyright Candace McDaniel
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-sunglasses-T9MVXPNPWP

Image for theme screenshot, Copyright Matt Moloney
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/laptop-work-D8MPRQM38G

Image for theme screenshot, Copyright Direct Media
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/family-breakfast-2GQIFRMRWI

Image for theme screenshot, Copyright Matt Bango
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-walking-YE8TQVJ00L

Image for theme screenshot, Copyright Kristin Hardwick
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/browsing-smartphone-JXOLOKSWX2

Image for Block Pattern Author, Copyright Ilya Yakover
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/people-girl-Q2WJXI3CSE

* Sidbear icons for the customizer are self created and license under GPL.