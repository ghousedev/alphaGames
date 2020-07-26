<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alpha_Games
 */

get_header();
?>

<div id="primary" class="content-area">
	<div class="mdc-layout-grid main-grid">
		<div class="mdc-layout-grid__inner">
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-1 sidebar-area-left">
				
			</div>
			<div class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--order-2 main-grid-content">
				<main id="main" class="site-main">

					<?php
					if (have_posts()) :

						if (is_home() && !is_front_page()) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
						<?php
					endif;

					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', get_post_type());

					endwhile;

					?>
						<div class="paging-container">
							<?php
						previous_post_link('<div class="mdc-button mdc-button--outlined previous-link">%link</div>');
						alpha_pagination();
						next_post_link('<div class="mdc-button mdc-button--outlined next-link">%link</div>');
						?>
						</div>
						<?php

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

				</main><!-- #main -->
			</div>
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-3 sidebar-area-right mdc-typography">
				
			</div>
		</div>
	</div>
</div><!-- #primary -->

<?php
get_footer();
