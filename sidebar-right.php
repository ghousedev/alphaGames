<?php
if (!is_active_sidebar('sidebar-2')) {
	return;
}
?>
<?php if (is_active_sidebar('sidebar_2')) : ?>
	<div id="primary-sidebar-right" class="sidebar widget-area-right" role="complementary">
		<?php dynamic_sidebar('sidebar_2'); ?>
	</div>
<?php endif; ?>

<aside id="secondary-right" class="widget-area-right">
	
		<?php dynamic_sidebar('sidebar-2'); ?>
	
</aside>