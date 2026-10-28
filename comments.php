<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Urbane
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
$urbane_commenter    = wp_get_current_commenter();
$urbane_name_required = (bool) get_option( 'require_name_email' );
$urbane_required_attr = $urbane_name_required ? ' required="required" aria-required="true"' : '';
$urbane_required_mark = $urbane_name_required ? ' <span class="required">*</span>' : '';

$urbane_fields = array(

	'author' => '<p class="comment-form-author">'
		. '<label for="author">' . esc_html__( 'Name', 'urbane' ) . $urbane_required_mark . '</label>'
		. '<input id="author" name="author" type="text" autocomplete="name" maxlength="245"'
		. ' value="' . esc_attr( $urbane_commenter['comment_author'] ) . '"' . $urbane_required_attr . ' />'
		. '</p>',

	'email'  => '<p class="comment-form-email">'
		. '<label for="email">' . esc_html__( 'Email', 'urbane' ) . $urbane_required_mark . '</label>'
		. '<input id="email" name="email" type="email" autocomplete="email" maxlength="100"'
		. ' value="' . esc_attr( $urbane_commenter['comment_author_email'] ) . '"' . $urbane_required_attr . ' />'
		. '</p>',

	'url'    => '<p class="comment-form-url">'
		. '<label for="url">' . esc_html__( 'Website', 'urbane' ) . '</label>'
		. '<input id="url" name="url" type="url" autocomplete="url" maxlength="200"'
		. ' value="' . esc_attr( $urbane_commenter['comment_author_url'] ) . '" />'
		. '</p>',
);

$urbane_current_user = wp_get_current_user();

$custom_comment_form = array(
	'fields'               => apply_filters( 'urbane_comment_form_default_fields', $urbane_fields ),
	'comment_field'        => '<p class="comment-form-comment">'
		. '<label for="comment">' . esc_html__( 'Comment', 'urbane' ) . '</label>'
		. '<textarea id="comment" name="comment" rows="6" maxlength="65525" required="required" aria-required="true"></textarea>'
		. '</p>',
	'logged_in_as'         => '<p class="logged-in-as">'
		. esc_html__( 'Logged in as', 'urbane' ) . ' '
		. '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html( $urbane_current_user->display_name ) . '</a> '
		. '<a href="' . esc_url( wp_logout_url( apply_filters( 'urbane_the_permalink', get_permalink() ) ) ) . '">' . esc_html__( 'Log out?', 'urbane' ) . '</a>'
		. '</p>',
	'cancel_reply_link'    => esc_html__( 'Cancel', 'urbane' ),
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'title_reply'          => esc_html__( 'Leave a Reply', 'urbane' ),
	'label_submit'         => esc_html__( 'Post Comment', 'urbane' ),
	'id_submit'            => 'submit',
);
?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">
    <?php if ( comments_open() ) : ?>
        <h3 class="comments-title"><?php comments_number( null, esc_html__('1 Comment', 'urbane'), '% ' . esc_html__('Comments', 'urbane') ); ?></h3>
   	<?php endif; ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'urbane' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'urbane' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'urbane' ) ); ?></div>
	</nav>
	<?php endif; ?>    
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
			) );
		?>
	</ol>    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'urbane' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'urbane' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'urbane' ) ); ?></div>
	</nav>
	<?php endif; ?>    
	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'urbane' ); ?></p>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php comment_form($custom_comment_form); ?>
