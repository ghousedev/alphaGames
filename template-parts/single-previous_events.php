<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php if (have_posts()) : ?>
						<header class="page-header">
						</header>
						<?php
						while (have_posts()) :
							the_post();
							get_template_part('template-parts/content', get_post_type());
						endwhile;
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					?>
				</main><!-- #main -->
				<?php
				comments_template();
				?>
			</div>
			<div class="mdc-layout-grid__cell--span-2 mdc-layout-grid__cell--order-3 sidebar-area-right mdc-typography">
				
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php
get_footer();
