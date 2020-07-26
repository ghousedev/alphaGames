<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Alpha_Games
 */

get_header();
?>

<div id="primary" class="content-area">
	<div class="mdc-layout-grid main-grid">
		<div class="mdc-layout-grid__inner">
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-1 sidebar-area-left">
				<?php
				get_sidebar('left');
				?>
			</div>
			<div class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--order-2 main-grid-content">
				<div class="mdc-card mdc-card--outlined">
					<main id="main" class="site-main">
						<div class="mdc-card__secondary post-card__secondary">
							<section class="error-404 not-found">
								<header class="page-header mdc-typography mdc-typography--headline6">
									<h2 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'alphagames'); ?></h2>
								</header><!-- .page-header -->

								<div class="page-content mdc-typography">
									<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'alphagames'); ?></p>

									<?php
									get_search_form();
									?>
								</div><!-- .page-content -->
							</section><!-- .error-404 -->
						</div>
					</main><!-- #main -->
				</div>
			</div>
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-3 sidebar-area-right mdc-typography">
				<?php
				get_sidebar('right');
				?>
			</div>
		</div>
	</div><!-- #primary -->

	<?php
	get_footer();
