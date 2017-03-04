<?php
	$class_invert = (get_theme_mod( 'header_style_invert', false)) ? 'dark_menu_style' : '';
	$sticky_header_class = (get_theme_mod( 'header_with_sticky', false)) ? 'sticky_main_header' : '';
?>

<header id="ABdev_main_header" class="clearfix header_layout_2 <?php echo esc_attr($class_invert) .' '. esc_attr($sticky_header_class) ?> ">
	<?php if(get_theme_mod( 'show_top_bar', false)): ?>
	<div id="top_bar">
		<div class="container">
			<div class="row">
				<div id="header_social_info" class="span8">
					<?php
					$target = get_theme_mod( 'header_social_target', '_blank' );
					?>

					<?php $header_facebook_url=get_theme_mod('header_facebook_url','');
					if($header_facebook_url!=''): ?>
						<a href="<?php echo $header_facebook_url;?>" class="top_social_icon top_social_icon_facebook dnd_tooltip" title="<?php _e('Follow us on Facebook','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-facebook"></i></a>
					<?php endif; ?>
					<?php $header_twitter_url = get_theme_mod('header_twitter_url','');
					if($header_twitter_url!= ''):?>
						<a href="<?php echo $header_twitter_url;?>" class="top_social_icon top_social_icon_twitter dnd_tooltip" title="<?php _e('Follow us on Twitter','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-twitter"></i></a>
					<?php endif;?>
					<?php $header_googleplus_url = get_theme_mod('header_googleplus_url','');
					if($header_googleplus_url!= ''):?>
						<a href="<?php echo $header_googleplus_url;?>" class="top_social_icon top_social_icon_googleplus dnd_tooltip" title="<?php _e('Follow us on Googleplus','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-googleplus"></i></a>
					<?php endif;?>
					<?php $header_linkedin_url = get_theme_mod('header_linkedin_url','');
					if($header_linkedin_url!= ''):?>
						<a href="<?php echo $header_linkedin_url;?>" class="top_social_icon top_social_icon_linkedin dnd_tooltip" title="<?php _e('Follow us on Linkedin','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-linkedin"></i></a>
					<?php endif;?>
					<?php $header_youtube_url = get_theme_mod('header_youtube_url','');
					if($header_youtube_url!= ''):?>
						<a href="<?php echo $header_youtube_url;?>" class="top_social_icon top_social_icon_youtube dnd_tooltip" title="<?php _e('Follow us on Youtube','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-youtube"></i></a>
					<?php endif;?>
					<?php $header_pinterest_url = get_theme_mod('header_pinterest_url','');
					if($header_pinterest_url!= ''):?>
						<a href="<?php echo $header_pinterest_url;?>" class="top_social_icon top_social_icon_pinterest dnd_tooltip" title="<?php _e('Follow us on Pinterest','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-pinterest"></i></a>
					<?php endif;?>
					<?php $header_skype_url = get_theme_mod('header_skype_url','');
					if($header_skype_url!= ''):?>
						<a href="<?php echo $header_skype_url;?>" class="top_social_icon top_social_icon_skype dnd_tooltip" title="<?php _e('Follow us on Skype','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-skype"></i></a>
					<?php endif;?>
					<?php $header_feed_url = get_theme_mod('header_feed_url','');
					if($header_feed_url!= ''):?>
						<a href="<?php echo $header_feed_url;?>" class="top_social_icon top_social_icon_feed dnd_tooltip" title="<?php _e('Follow us on Feed','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-rss"></i></a>
					<?php endif;?>
					<?php $header_behance_url = get_theme_mod('header_behance_url','');
					if($header_behance_url!= ''):?>
						<a href="<?php echo $header_behance_url;?>" class="top_social_icon top_social_icon_behance dnd_tooltip" title="<?php _e('Follow us on Behance','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-behance"></i></a>
					<?php endif;?>
					<?php $header_blogger_url = get_theme_mod('header_blogger_url','');
					if($header_blogger_url!= ''):?>
						<a href="<?php echo $header_blogger_url;?>" class="top_social_icon top_social_icon_blogger dnd_tooltip" title="<?php _e('Follow us on Blogger','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-blogger"></i></a>
					<?php endif;?>
					<?php $header_github_url = get_theme_mod('header_github_url','');
					if($header_github_url!= ''):?>
						<a href="<?php echo $header_github_url;?>" class="top_social_icon top_social_icon_github dnd_tooltip" title="<?php _e('Follow us on Github','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-github"></i></a>
					<?php endif;?>
					<?php $header_delicious_url = get_theme_mod('header_delicious_url','');
					if($header_delicious_url!= ''):?>
						<a href="<?php echo $header_delicious_url;?>" class="top_social_icon top_social_icon_delicious dnd_tooltip" title="<?php _e('Follow us on Delicious','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-delicious"></i></a>
					<?php endif;?>
					<?php $header_designContest_url = get_theme_mod('header_designContest_url','');
					if($header_designContest_url!= ''):?>
						<a href="<?php echo $header_designContest_url;?>" class="top_social_icon top_social_icon_designContest dnd_tooltip" title="<?php _e('Follow us on DesignContest','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-designcontest"></i></a>
					<?php endif;?>
					<?php $header_deviantART_url = get_theme_mod('header_deviantART_url','');
					if($header_deviantART_url!= ''):?>
						<a href="<?php echo $header_deviantART_url;?>" class="top_social_icon top_social_icon_devianART dnd_tooltip" title="<?php _e('Follow us on DeviantART','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-deviantart"></i></a>
					<?php endif;?>
					<?php $header_digg_url = get_theme_mod('header_digg_url','');
					if($header_digg_url!= ''):?>
						<a href="<?php echo $header_digg_url;?>" class="top_social_icon top_social_icon_digg dnd_tooltip" title="<?php _e('Follow us on Digg','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-digg"></i></a>
					<?php endif;?>
					<?php $header_dribbble_url = get_theme_mod('header_dribbble_url','');
					if($header_dribbble_url!= ''):?>
						<a href="<?php echo $header_dribbble_url;?>" class="top_social_icon top_social_icon_dribbble dnd_tooltip" title="<?php _e('Follow us on Dribbble','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-dribbble"></i></a>
					<?php endif;?>
					<?php $header_dropbox_url = get_theme_mod('header_dropbox_url','');
					if($header_dropbox_url!= ''):?>
						<a href="<?php echo $header_dropbox_url;?>" class="top_social_icon top_social_icon_dropbox dnd_tooltip" title="<?php _e('Follow us on Dropbox','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-dropbox"></i></a>
					<?php endif;?>
					<?php $header_email_url = get_theme_mod('header_email_url','');
					if($header_email_url!= ''):?>
						<a href="<?php echo $header_email_url;?>" class="top_social_icon top_social_icon_email dnd_tooltip" title="<?php _e('Follow us on Email','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-emailalt"></i></a>
					<?php endif;?>
					<?php $header_flickr_url = get_theme_mod('header_flickr_url','');
					if($header_flickr_url!= ''):?>
						<a href="<?php echo $header_flickr_url;?>" class="top_social_icon top_social_icon_flickr dnd_tooltip" title="<?php _e('Follow us on Flickr','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-flickr"></i></a>
					<?php endif;?>
					<?php $header_forrst_url = get_theme_mod('header_forrst_url','');
					if($header_forrst_url!= ''):?>
						<a href="<?php echo $header_forrst_url;?>" class="top_social_icon top_social_icon_forrst dnd_tooltip" title="<?php _e('Follow us on Forrst','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-forrst"></i></a>
					<?php endif;?>
					<?php $header_instagram_url = get_theme_mod('header_instagram_url','');
					if($header_instagram_url!= ''):?>
						<a href="<?php echo $header_instagram_url;?>" class="top_social_icon top_social_icon_instagram dnd_tooltip" title="<?php _e('Follow us on Instagram','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-instagram"></i></a>
					<?php endif;?>
					<?php $header_lastfm_url = get_theme_mod('header_lastfm_url','');
					if($header_lastfm_url!= ''):?>
						<a href="<?php echo $header_lastfm_url;?>" class="top_social_icon top_social_icon_last.fm dnd_tooltip" title="<?php _e('Follow us on Last.fm','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-lastfm"></i></a>
					<?php endif;?>
					<?php $header_myspace_url = get_theme_mod('header_myspace_url','');
					if($header_myspace_url!= ''):?>
						<a href="<?php echo $header_myspace_url;?>" class="top_social_icon top_social_icon_myspace dnd_tooltip" title="<?php _e('Follow us on MySpace','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-myspace"></i></a>
					<?php endif;?>
					<?php $header_picasa_url = get_theme_mod('header_picasa_url','');
					if($header_picasa_url!= ''):?>
						<a href="<?php echo $header_picasa_url;?>" class="top_social_icon top_social_icon_picasa dnd_tooltip" title="<?php _e('Follow us on Picasa','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-picasa"></i></a>
					<?php endif;?>
					<?php $header_stumbleUpon_url = get_theme_mod('header_stumbleUpon_url','');
					if($header_stumbleUpon_url!= ''):?>
						<a href="<?php echo $header_stumbleUpon_url;?>" class="top_social_icon top_social_icon_stumbleUpon dnd_tooltip" title="<?php _e('Follow us on StumbleUpon','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-stumbleupon"></i></a>
					<?php endif;?>
					<?php $header_vimeo_url = get_theme_mod('header_vimeo_url','');
					if($header_vimeo_url!= ''):?>
						<a href="<?php echo $header_vimeo_url;?>" class="top_social_icon top_social_icon_vimeo dnd_tooltip" title="<?php _e('Follow us on Vimeo','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-vimeo"></i></a>
					<?php endif;?>
					<?php $header_zerply_url = get_theme_mod('header_zerply_url','');
					if($header_zerply_url!= ''):?>
						<a href="<?php echo $header_zerply_url;?>" class="top_social_icon top_social_icon_zerply dnd_tooltip" title="<?php _e('Follow us on Zerply','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo $target; ?>"><i class="ci_icon-zerply"></i></a>
					<?php endif;?>

					<?php $header_phone = get_theme_mod('header_phone','');
					if($header_phone!=''): ?>
						<span class="quick_contact_phone"><i class="ci_icon-phonealt"></i><?php echo esc_html($header_phone); ?></span>
					<?php endif; ?>

					<?php $header_email = get_theme_mod('header_email','');
					if($header_email!=''): ?>
						<span class="quick_contact_mail"><i class="ci_icon-envelope"></i><a href="<?php echo esc_url('mailto:'.$header_email)?>"><?php echo esc_html($header_email); ?></span>
					<?php endif; ?>

				</div>
				<div class="span4 right_aligned shop_nav_links">
					<?php
					if(get_theme_mod( 'show_login_top_bar', false)){
						wp_loginout();
					}
					?>
				<?php if( in_array('woocommerce/woocommerce.php', get_option('active_plugins')) ):?>
					<?php global $woocommerce; ?>
					<?php if(get_theme_mod( 'my_account_page', '')!=''):?>
						<?php $myaccount_page_url = get_permalink(get_theme_mod( 'my_account_page', '')); ?>
						| <a class="my_account_link" href="<?php echo esc_url($myaccount_page_url); ?>"><?php _e('Account', 'ABdev_incomeup'); ?></a>
					<?php endif; ?>
					<?php if(get_theme_mod( 'wishlist_page', '')!=''):?>
						<?php $wishlist_page_url = get_permalink(get_theme_mod( 'wishlist_page', '')); ?>
						| <a class="wishlist_link" href="<?php echo esc_url($wishlist_page_url); ?>"><?php _e('Wishlist', 'ABdev_incomeup'); ?></a>
					<?php endif; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div id="logo_search_bar">
		<div class="container">
			<div class="row">
				<div id="logo">
					<a href="<?php echo home_url(); ?>">
						<?php
						$header_logo = get_theme_mod('header_logo', '');
						$header_retina_logo = get_theme_mod('header_retina_logo', '');
						$header_retina_logo_width = get_theme_mod('header_retina_logo_width', '');
						$header_retina_logo_height = get_theme_mod('header_retina_logo_height', '');
						if( $header_logo!='' ):?>
							<img id="main_logo" src="<?php echo $header_logo;?>" alt="<?php bloginfo('name');?>">
						<?php if( $header_retina_logo!='' &&  $header_retina_logo_width!='' && $header_retina_logo_height!='' ):?>
							<?php $pixels ="";
							if(is_numeric($header_retina_logo_width) && is_numeric($header_retina_logo_height)):
							$pixels ="px";
							endif; ?>
							<img id="retina_logo" src="<?php echo $header_retina_logo;?>" alt="<?php bloginfo('name');?>" style="width:<?php echo $header_retina_logo_width.$pixels; ?>;max-height:<?php echo $header_retina_logo_height.$pixels; ?>; height: auto !important;">
						<?php endif; ?>
						<?php else: ?>
							<h1 id="main_logo_textual"><?php bloginfo('name');?></h1>
							<?php $blog_description = get_bloginfo('description');
							if( $blog_description!='' ): ?>
								<h2 id="main_logo_tagline"><?php echo $blog_description;?></h2>
							<?php endif; ?>
						<?php endif; ?>
					</a>
					<?php if(!get_theme_mod('hide_search', false)): ?>
    					<?php get_template_part('partials/header_search_default');  ?>
    				<?php endif; ?>
					<?php if( in_array('woocommerce/woocommerce.php', get_option('active_plugins')) ):?>
						<div id="shop_links" class="cart_right"><?php _e('Cart:','ABdev_incomeup') ?>
							<a class="link_cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
								<span>
								<?php
									echo '<span class="items_count">' . $woocommerce->cart->cart_contents_count . '</span> ' ._n('item', 'items',  $woocommerce->cart->cart_contents_count ,'ABdev_incomeup') . ' ' . '&mdash; ' . $woocommerce->cart->get_cart_total() ;
								?>
								</span>
								<i class="ci_icon-shoppingbag"></i>
							</a>
							<div class="cart_dropdown_widget bigger">
								<?php the_widget('WC_Widget_Cart'); ?>
							</div>
						</div>
					<?php endif; ?>
					<div id="ABdev_menu_toggle"><i class="ci_icon-menu"></i></div>
				</div>
			</div>
		</div>
	</div>

	<div id="nav_menu_bar">
		<div class="container">
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container' => false,'menu_id' => 'main_menu','menu_class' => '','walker'=> new incomeup_walker_nav_menu, 'fallback_cb' => false ) );?>
			</nav>
		</div>
	</div>
</header>

<div id="ABdev_header_spacer"></div>