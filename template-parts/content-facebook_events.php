<div class="mdc-card mdc-elevation--z24 mdc-card--outlined post-card">
	<div class="mdc-card__primary-action" tabindex="0">
		<div class="mdc-card__media mdc-card__media--16-9" style="max-height: 500px; background-image: url(<?php the_post_thumbnail_url() ?>);"></div>
	</div>
	<div class="mdc-card__primary post-card__primary">
		<h2 class="mdc-card__title mdc-typography mdc-typography--headline6 post-card__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	</div>
	<ul class="mdc-list">
		<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
	</ul>
	<div class="mdc-card__secondary mdc-typography mdc-typography--body1 post-card__secondary">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'alphagames'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'alphagames'),
			'after'  => '</div>',
		));
		?>
	</div>
	<footer class="entry-footer mdc-typography">
		<?php alphagames_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<ul class="mdc-list">
		<li role="seperator" class="mdc-list-divider mdc-list-divider--padded"></li>
	</ul>
	<div class="mdc-card__actions post-card__actions">
		<div class="mdc-card__action-buttons">
			<a href="#respond">
				<button class="mdc-button mdc-card__action mdc-card__action--button comment-button"><i class="material-icons mdc-button__icon">comment</i><span class="mdc-button__label">Comment</span></button>
			</a>
		</div>
		<div class="mdc-card__action-icons">
			<button id="menu-button" class="share-button mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded" title="Share" data-mdc-ripple-is-unbounded="true">share</button>
			<div class="mdc-menu-surface--anchor">
				<button class="mdc-icon-button material-icons mdc-card__action mdc-card__action--icon--unbounded" title="More options" data-mdc-ripple-is-unbounded="true">more_vert</button>
				<div class="mdc-menu mdc-menu-surface" tabindex="-1">
					<ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
						<li class="mdc-list-item" role="menuitem">
							<a href="mailto:admin@alphagames.co.uk">
								<span class="mdc-list-item__text">Report this post</span>
							</a>
						</li>
						<li class="mdc-list-item" role="menuitem">
							<a href="mailto:admin@alphagames.co.uk">
								<span class="mdc-list-item__text">Ask a question</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>