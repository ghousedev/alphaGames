<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpha_Games
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<?php if (is_active_sidebar('sidebar_1')) : ?>
	<div id="primary-sidebar" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar('sidebar_1'); ?>
	</div>
<?php endif; ?>

<aside id="secondary" class="widget-area">
	<div class="mdc-card mdc-typography widget-card mdc-card--outlined mdc-elevation--z24" data-aos="zoom-in-right">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
</aside>

