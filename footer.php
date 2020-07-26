<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpha_Games
 */

?>

</div><!-- #content -->
<footer class="footer mdc-elevation--z16">
<div class="mdc-layout-grid">
	<div class="mdc-layout-grid__inner">
		<div class="mdc-layout-grid__cell--span-12">
			<div class="mdc-layout-grid__inner">
				<div class="mdc-layout-grid__cell--span-4">
					<?php get_template_part( '/template-parts/address', 'none' ) ?>
				</div>
				<div class="mdc-layout-grid__cell--span-4">
				</div>
				<div class="mdc-layout-grid__cell--span-4">
					<p class="mdc-typography">
	<span class="sep"> | </span>
	<?php
	/* translators: 1: Theme name, 2: Theme author. */
	printf(esc_html__('Theme: %1$s by %2$s.', 'alphagames'), 'alphagames', '<a href="https://ghouse.dev">GHousedev</a>');
	?>
					</p>
				</div>
		</div>
	</div>
</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>