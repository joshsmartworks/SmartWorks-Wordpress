<footer id="ABdev_main_footer">

	<?php if(is_active_sidebar('First Footer Widget') || is_active_sidebar('Second Footer Widget') || is_active_sidebar('Third Footer Widget') || is_active_sidebar('Fourth Footer Widget')): ?>
		<div id="footer_columns">
			<div class="container">
				<div class="row">
					<div class="span3 clearfix">
						<?php dynamic_sidebar( __('First Footer Widget', 'ABdev_incomeup') );?>
					</div>
					<div class="span3 clearfix">
						<?php dynamic_sidebar( __('Second Footer Widget', 'ABdev_incomeup') );?>
					</div>
					<div class="span3 clearfix">
						<?php dynamic_sidebar( __('Third Footer Widget', 'ABdev_incomeup') );?>
					</div>
					<div class="span3 clearfix">
						<?php dynamic_sidebar( __('Fourth Footer Widget', 'ABdev_incomeup') );?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div id="footer_copyright">
		<div class="container">
			<div class="row">
				<div class="span7 footer_copyright">
					<?php $copyright=get_theme_mod('copyright','');
					if($copyright!=''): ?>
						<?php echo do_shortcode($copyright); ?>
					<?php endif; ?>
				</div>
				<div id="footer_menu" class="span5">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','container' => false,'menu_id' => 'footer_menu_inner','menu_class' => '','walker'=> '', 'fallback_cb' => false ) );?>
				</div>
			</div>
		</div>
	</div>
</footer>