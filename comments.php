<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alpha_Games
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>
<ul class="mdc-list">
	<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
</ul>
<div id="comments" class="comments-area mdc-typography--body1 mdc-layout-grid">
	<div class="mdc-layout-grid__inner">
		<?php
		// You can start editing here -- including this comment!
		if (have_comments()) :
			?>
			<div class="mdc-layout-grid__cell--span-12">
				<div class="mdc-card mdc-card--outlined post-card mdc-elevation--z24">
					<div class="mdc-card__primary post-card__primary">
						<h2 class="mdc-typography mdc-card-title mdc-typography--headline6 post-card__title">
							<?php
							$alphagames_comment_count = get_comments_number();
							if ('1' === $alphagames_comment_count) {
								printf(
									/* translators: 1: title. */
									esc_html__('One thought on &ldquo;%1$s&rdquo;', 'alphagames'),
									'<span>' . get_the_title() . '</span>'
								);
							} else {
								printf( // WPCS: XSS OK.
									/* translators: 1: comment count number, 2: title. */
									esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $alphagames_comment_count, 'comments title', 'alphagames')),
									number_format_i18n($alphagames_comment_count),
									'<span>' . get_the_title() . '</span>'
								);
							}
							?>
						</h2><!-- .comments-title -->
					</div>
					<?php the_comments_navigation(); ?>
					<div class="mdc-layout-grid__cell--span-12">
						<ul class="mdc-list post-card__secondary">
							<?php
							wp_list_comments(array(
								'style'      => 'ul',
								'short_ping' => true,
							));
							?>
						</ul><!-- .comment-list -->
					</div>
				</div>
				<ul class="mdc-list">
					<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
				</ul>
			</div>
		</div>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
			?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'alphagames',); ?></p>
		<?php
	endif;

endif; // Check for have_comments().

$comment_args = array(
	'form' => array(
		'class' => 'mdc-text-field'
	),
	'fields' => apply_filters(
		'comment_form_default_fields',
		array(
			'author' 				=> '<div class = "mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-12-phone">' .
				'<div class="mdc-text-field comments-author">' .
				'<input class="mdc-text-field__input">' .
				'<div class="mdc-line-ripple"></div>' .
				'<label class="mdc-floating-label">Name*</label> ' .
				'</div>' .
				'</div>',
			'email'					=> '<div class = "mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-12-phone">' .
				'<div class="mdc-text-field comments-email">' .
				'<input class="mdc-text-field__input">' .
				'<div class="mdc-line-ripple"></div>' .
				'<label class="mdc-floating-label">E-mail*</label> ' .
				'</div>' .
				'</div>' .
				'</div>',
			'cookies'				=> '<div class="mdc-form-field post-card__secondary">' .
				'<div class="mdc-checkbox">' .
				'<input type="checkbox" class="mdc-checkbox__native-control" id="checkbox-1"/>' .
				'<div class="mdc-checkbox__background">' .
				'<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">' .
				'<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>' .
				'</svg>' .
				'<div class="mdc-checkbox__mixedmark"></div>' .
				'</div>' .
				'</div>' .
				'<label for="checkbox-1">Thanks to GDPR you now have to click this box, sorry about that, have a cookie.</label>' .
				'</div>',
			'submit_button' 		=> '<div class="mdc-card__actions"><div class="mdc-card__action--button">',
			'<button class="mdc-button" type="submit"><i class="material-icons mdc-button__icon">add_comment</i><span class="mdc-button__label">Post Comment</span></button>',
			'</div></div>',

		)
	),
	'title_reply_before' => '<div class="post-card__primary">'  .
		'<h3 id="reply-title" class="comment-reply-title post-card__title mdc-typography--headline6 mdc-card__title">',
	'title_reply_after' => '</h3>'  .
		'</div>' .
		'<ul class="mdc-list">'  .
		'<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>'  .
		'</ul>',
	'comment_field'			=> '<div class ="mdc-layout-grid__inner mdc-typography post-card__secondary" style="max-width: 1200px">'  .
		'<div class = "mdc-layout-grid__cell--span-12">' .
		'<div class="mdc-text-field comments-entry">' .
		'<input class="mdc-text-field__input">' .
		'<div class="mdc-line-ripple"></div>' .
		'<label class="mdc-floating-label">Enter your comment...*</label> ' .
		'</div>'  .
		'</div>'

);


echo '<div class="mdc-layout-grid__cell--span-12">';
echo '<div class="mdc-card mdc-card--outlined post-card mdc-elevation--z24">';

comment_form($comment_args);
echo		'</div>';
echo	'</div>';
echo	'</div>';
echo	'</div>';
echo	'</div>';
