<?php
/**
 * The template for displaying archive pages
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
				<?php
				get_sidebar('left');
				?>
			</div>
			<div class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--order-2 main-grid-content">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<?php
				the_archive_title('<div class="mdc-card mdc-card--outlined"><h1 class="page-title mdc-typography mdc-typography--headline5" style="text-align: center;"><i class="material-icons md-24" style="margin-right: 0.5rem;">folder</i>', '</h1></div><ul class="mdc-list"><li class="mdc-list-divider"></li></ul>');
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_type());
				?><ul class="mdc-list"><li class="mdc-list-divider"></li></ul>
				<?php
			endwhile;

			?>
						<div class="paging-container">
							<?php
						
						alpha_pagination();
						
						?>
						</div>
						<?php

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-3 sidebar-area-right mdc-typography">
				<?php
				get_sidebar('right');
				?>
			</div>
		</div>
<?php
get_footer();
