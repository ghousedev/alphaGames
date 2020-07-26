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
				
			</div>
			<div class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--order-2 main-grid-content">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1850 107"><defs><style>.instoreeventsdvider-cls-1,.instoreeventsdvider-cls-4{fill:#ffc444;}.instoreeventsdvider-cls-2{font-size:80px;fill:#8a130c;font-family:SWTORTrajan, SWTOR Trajan;}.instoreeventsdvider-cls-3{letter-spacing:-0.03em;}.instoreeventsdvider-cls-4{fill-rule:evenodd;}</style></defs><title>Asset 1eventsdivider</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="instoreeventsdvider-cls-1" d="M0,107l810.57-.5L896,0H0Z"/><text class="instoreeventsdvider-cls-2" transform="translate(22.1 85.57)">PAST EVENTS</text><path class="instoreeventsdvider-cls-4" d="M865.61,107H841.5L927.9.5H950Z"/><path class="instoreeventsdvider-cls-4" d="M919.61,107H895.5L981.9.5H1004Z"/><path class="instoreeventsdvider-cls-4" d="M970.61,107H946.5L1032.9.5H1055Z"/><path class="instoreeventsdvider-cls-4" d="M1024.61,107H1000.5L1086.9.5H1109Z"/><path class="instoreeventsdvider-cls-4" d="M1078.61,107H1054.5L1140.9.5H1163Z"/><path class="instoreeventsdvider-cls-4" d="M1129.61,107H1105.5L1191.9.5H1214Z"/><path class="instoreeventsdvider-cls-4" d="M1183.61,107H1159.5L1245.9.5H1268Z"/><path class="instoreeventsdvider-cls-4" d="M1237.61,107H1213.5L1299.9.5H1322Z"/><path class="instoreeventsdvider-cls-4" d="M1288.61,107H1264.5L1350.9.5H1373Z"/><path class="instoreeventsdvider-cls-4" d="M1342.61,107H1318.5L1404.9.5H1427Z"/><path class="instoreeventsdvider-cls-4" d="M1396.61,107H1372.5L1458.9.5H1481Z"/><path class="instoreeventsdvider-cls-4" d="M1447.61,107H1423.5L1509.9.5H1532Z"/><path class="instoreeventsdvider-cls-4" d="M1501.61,107H1477.5L1563.9.5H1586Z"/><path class="instoreeventsdvider-cls-4" d="M1555.61,107H1531.5L1617.9.5H1640Z"/><path class="instoreeventsdvider-cls-4" d="M1606.61,107H1582.5L1668.9.5H1691Z"/><path class="instoreeventsdvider-cls-4" d="M1660.61,107H1636.5L1722.9.5H1745Z"/><path class="instoreeventsdvider-cls-4" d="M1714.61,107H1690.5L1776.9.5H1799Z"/><path class="instoreeventsdvider-cls-4" d="M1765.61,107H1741.5L1827.9.5H1850Z"/></g></g></svg>
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
				
			</div>
		</div>
<?php
get_footer();
