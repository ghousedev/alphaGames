<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Alpha_Games
 */

get_header();
?>
<?php if (!is_front_page()) : ?>

	<div class="mdc-layout-grid main-grid">
		<div class="mdc-layout-grid__inner">
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-1 sidebar-area-left">
				<?php
				get_sidebar('left');
				?>
			</div>
			<div class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--order-2 main-grid-content search-page-grid">
				<main id="main" class="site-main">
					<?php if (have_posts()) : ?>
						<header class="page-header">
						</header>
						<?php
						while (have_posts()) :
							the_post();
							get_template_part('template-parts/content', 'page');
						endwhile;
					endif;
					?>
				</main><!-- #main -->
			
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-3 sidebar-area-right mdc-typography">
				<?php
				get_sidebar('right');
				?>
			</div>
		</div>
	</div>
<?php else : ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content', 'page');

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php endif; ?>
<?php
get_footer();
