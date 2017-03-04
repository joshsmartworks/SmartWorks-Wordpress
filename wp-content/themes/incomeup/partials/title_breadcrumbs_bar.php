<?php
	global $ABdev_title_bar_title;

?>

<?php if(!get_theme_mod('hide_title_breadcrumbs_bar', false)): ?>
	<section id="title_breadcrumbs_bar">
		<div class="container clearfix">
			<div class="floatleft">
				<?php if(!get_theme_mod('hide_title_from_bar', false)): ?>
					<h1><?php echo (!empty($ABdev_title_bar_title)) ? $ABdev_title_bar_title : get_the_title();?></h1>
				<?php endif; ?>
			</div>
			<div class="floatright">
				<?php if(!get_theme_mod('hide_breadcrumbs_from_bar', false)): ?>
					<?php ABdevFW_simple_breadcrumb(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>