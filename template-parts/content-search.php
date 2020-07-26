<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alpha_Games
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mdc-card mdc-card--outlined search-card mdc-elevation--z24">
		<header class="entry-header">
			<?php the_title(sprintf(
				'<div class="mdc-card-title post-card__primary post-card__title"><h2 class="entry-title mdc-typography mdc-typography--headline6  post-card__title"><a href="%s" rel="bookmark">',
				esc_url(get_permalink())
			), '</a></h2></div>'); ?>
			<ul class="mdc-list">
				<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
			</ul>
			<?php if ('post' === get_post_type()) : ?>
				<div class="entry-meta">
					<?php
					alphagames_posted_on();
					alphagames_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="mdc-card__media--16-9">
			<?php
			if (has_post_thumbnail()) :
				alphagames_post_thumbnail();
			endif; ?>
		</div>
		<div class="mdc-card__secondary post-card__secondary">
			<div class="entry-summary  mdc-typography mdc-typography--body1">
				<?php esc_html(the_excerpt()); ?>
			</div><!-- .entry-summary -->
		</div>
		<ul class="mdc-list">
			<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
		</ul>
		<footer class="entry-footer">
			<?php alphagames_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
	</article><!-- #post-<?php the_ID(); ?> -->
	<ul class="mdc-list">
		<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
	</ul>

