<footer id="ABdev_main_footer">
	<div id="footer_default_container">
		<div id="footer_copyright">
			<div class="container">
				<div class="row">
					<div class="span6 footer_copyright">
						<?php $copyright=get_theme_mod('copyright','');
						if($copyright!=''): ?>
							<?php echo do_shortcode($copyright); ?>
						<?php endif; ?>
					</div>
					<div id="footer_menu" class="span6 footer_credits right_aligned">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','container' => false,'menu_id' => 'footer_menu_inner','menu_class' => '','walker'=> '', 'fallback_cb' => false ) );?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>