<footer id="ABdev_main_footer">
	<div id="footer_landing_container">
		<div class="container">
			<div class="span7 footer_landing_copyright">
				<?php $copyright=get_theme_mod('copyright','');
				if($copyright!=''): ?>
					<?php echo do_shortcode($copyright); ?>
				<?php endif; ?>
			</div>
			<a href="#" id="back_to_top" title="<?php esc_attr_e('Back to top','ABdev_incomeup') ?>"><i class="ci_icon-chevron-up"></i></a>
		</div>
	</div>
</footer>