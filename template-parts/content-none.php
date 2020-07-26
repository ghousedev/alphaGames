<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alpha_Games
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<div class="mdc-card mdc-card--outlined mdc-elevation--z24 mdc-typography">
			<div class="mdc-card__primary post-card__primary" style="text-align: center;">
				<h1 class="page-title mdc-typography--headline4"><?php esc_html_e('Nothing Found', 'alphagames'); ?></h1>
			</div>
		</div>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="mdc-card mdc-card--outlined mdc-elevation--z24 mdc-typography">
			<div class="mdc-card__primary post-card__primary">
				<?php
				if (is_home() && current_user_can('publish_posts')) :

					printf(
						'<p>' . wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'alphagames'),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						) . '</p>',
						esc_url(admin_url('post-new.php'))
					);

				elseif (is_search()) :
					?>
					<div class="mdc-typography mdc-card__secondary post-card__secondary" style="text-align: center;">Sorry, but nothing matched your search terms. Please try again with some different keywords.</div>
					<?php
					get_search_form();

				else :
					?>

<div class="mdc-typography mdc-card__secondary post-card__secondary" style="text-align: center;">It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</div>
					<?php
					get_search_form();

				endif;
				?>
			</div>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->