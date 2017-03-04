<footer id="ABdev_main_footer">
	<div id="footer_onepage_container">
		<div class="container">
			<a href="#" id="back_to_top" title="<?php esc_attr_e('Back to top','ABdev_incomeup') ?>"><i class="ci_icon-chevron-up"></i></a>
			<div class="footer_onepage_copyright">
				<?php $copyright=get_theme_mod('copyright','');
				if($copyright!=''): ?>
					<?php echo do_shortcode($copyright); ?>
				<?php endif; ?>
			</div>
			<div id="footer_onepage_social">
				<?php
				$target = get_theme_mod( 'footer_social_target', '_blank' );
				?>

				<?php $footer_facebook_url=get_theme_mod('facebook_url','');
				if($footer_facebook_url!=''): ?>
					<a href="<?php echo $footer_facebook_url;?>" class="dnd_socialicon_facebook tcvpb_socialicon_facebook dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Facebook','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-facebook"></i></a>
				<?php endif; ?>
				<?php $footer_twitter_url = get_theme_mod('twitter_url','');
				if($footer_twitter_url!= ''):?>
					<a href="<?php echo $footer_twitter_url;?>" class="dnd_socialicon_twitter tcvpb_socialicon_twitter dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Twitter','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-twitter"></i></a>
				<?php endif;?>
				<?php $footer_googleplus_url = get_theme_mod('googleplus_url','');
				if($footer_googleplus_url!= ''):?>
					<a href="<?php echo $footer_googleplus_url;?>" class="dnd_socialicon_googleplus tcvpb_socialicon_googleplus dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Googleplus','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-googleplus"></i></a>
				<?php endif;?>
				<?php $footer_linkedin_url = get_theme_mod('linkedin_url','');
				if($footer_linkedin_url!= ''):?>
					<a href="<?php echo $footer_linkedin_url;?>" class="dnd_socialicon_linkedin tcvpb_socialicon_linkedin dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Linkedin','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-linkedin"></i></a>
				<?php endif;?>
				<?php $footer_youtube_url = get_theme_mod('youtube_url','');
				if($footer_youtube_url!= ''):?>
					<a href="<?php echo $footer_youtube_url;?>" class="dnd_socialicon_youtube tcvpb_socialicon_youtube dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Youtube','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-youtube"></i></a>
				<?php endif;?>
				<?php $footer_pinterest_url = get_theme_mod('pinterest_url','');
				if($footer_pinterest_url!= ''):?>
					<a href="<?php echo $footer_pinterest_url;?>" class="dnd_socialicon_pinterest tcvpb_socialicon_pinterest dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Pinterest','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-pinterest"></i></a>
				<?php endif;?>
				<?php $footer_skype_url = get_theme_mod('skype_url','');
				if($footer_skype_url!= ''):?>
					<a href="<?php echo $footer_skype_url;?>" class="dnd_socialicon_skype tcvpb_socialicon_skype dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Skype','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-skype"></i></a>
				<?php endif;?>
				<?php $footer_feed_url = get_theme_mod('feed_url','');
				if($footer_feed_url!= ''):?>
					<a href="<?php echo $footer_feed_url;?>" class="dnd_socialicon_feed tcvpb_socialicon_feed dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Feed','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-rss"></i></a>
				<?php endif;?>
				<?php $footer_behance_url = get_theme_mod('behance_url','');
				if($footer_behance_url!= ''):?>
					<a href="<?php echo $footer_behance_url;?>" class="dnd_socialicon_behance tcvpb_socialicon_behance dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Behance','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-behance"></i></a>
				<?php endif;?>
				<?php $footer_blogger_url = get_theme_mod('blogger_url','');
				if($footer_blogger_url!= ''):?>
					<a href="<?php echo $footer_blogger_url;?>" class="dnd_socialicon_blogger tcvpb_socialicon_blogger dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Blogger','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-blogger-blog"></i></a>
				<?php endif;?>
				<?php $footer_github_url = get_theme_mod('github_url','');
				if($footer_github_url!= ''):?>
					<a href="<?php echo $footer_github_url;?>" class="dnd_socialicon_github tcvpb_socialicon_github dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Github','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-github"></i></a>
				<?php endif;?>
				<?php $footer_delicious_url = get_theme_mod('delicious_url','');
				if($footer_delicious_url!= ''):?>
					<a href="<?php echo $footer_delicious_url;?>" class="dnd_socialicon_delicious tcvpb_socialicon_delicious dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Delicious','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-delicious"></i></a>
				<?php endif;?>
				<?php $footer_designContest_url = get_theme_mod('designContest_url','');
				if($footer_designContest_url!= ''):?>
					<a href="<?php echo $footer_designContest_url;?>" class="dnd_socialicon_designContest tcvpb_socialicon_designContest dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on DesignContest','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-designcontest"></i></a>
				<?php endif;?>
				<?php $footer_deviantART_url = get_theme_mod('deviantART_url','');
				if($footer_deviantART_url!= ''):?>
					<a href="<?php echo $footer_deviantART_url;?>" class="dnd_socialicon_devianART tcvpb_socialicon_devianART dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on DeviantART','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-deviantart"></i></a>
				<?php endif;?>
				<?php $footer_digg_url = get_theme_mod('digg_url','');
				if($footer_digg_url!= ''):?>
					<a href="<?php echo $footer_digg_url;?>" class="dnd_socialicon_digg tcvpb_socialicon_digg dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Digg','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-digg"></i></a>
				<?php endif;?>
				<?php $footer_dribbble_url = get_theme_mod('dribbble_url','');
				if($footer_dribbble_url!= ''):?>
					<a href="<?php echo $footer_dribbble_url;?>" class="dnd_socialicon_dribbble tcvpb_socialicon_dribbble dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Dribbble','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-dribbble"></i></a>
				<?php endif;?>
				<?php $footer_dropbox_url = get_theme_mod('dropbox_url','');
				if($footer_dropbox_url!= ''):?>
					<a href="<?php echo $footer_dropbox_url;?>" class="dnd_socialicon_dropbox tcvpb_socialicon_dropbox dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Dropbox','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-dropbox"></i></a>
				<?php endif;?>
				<?php $footer_email_url = get_theme_mod('email_url','');
				if($footer_email_url!= ''):?>
					<a href="<?php echo $footer_email_url;?>" class="dnd_socialicon_email tcvpb_socialicon_email dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Email','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-emailalt"></i></a>
				<?php endif;?>
				<?php $footer_flickr_url = get_theme_mod('flickr_url','');
				if($footer_flickr_url!= ''):?>
					<a href="<?php echo $footer_flickr_url;?>" class="dnd_socialicon_flickr tcvpb_socialicon_flickr dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Flickr','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-flickr"></i></a>
				<?php endif;?>
				<?php $footer_forrst_url = get_theme_mod('forrst_url','');
				if($footer_forrst_url!= ''):?>
					<a href="<?php echo $footer_forrst_url;?>" class="dnd_socialicon_forrst tcvpb_socialicon_forrst dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Forrst','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-forrst"></i></a>
				<?php endif;?>
				<?php $footer_instagram_url = get_theme_mod('instagram_url','');
				if($footer_instagram_url!= ''):?>
					<a href="<?php echo $footer_instagram_url;?>" class="dnd_socialicon_instagram tcvpb_socialicon_instagram dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Instagram','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-instagram"></i></a>
				<?php endif;?>
				<?php $footer_lastfm_url = get_theme_mod('lastfm_url','');
				if($footer_lastfm_url!= ''):?>
					<a href="<?php echo $footer_lastfm_url;?>" class="dnd_socialicon_last.tcvpb_socialicon_last.fm dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Last.fm','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-lastfm"></i></a>
				<?php endif;?>
				<?php $footer_myspace_url = get_theme_mod('myspace_url','');
				if($footer_myspace_url!= ''):?>
					<a href="<?php echo $footer_myspace_url;?>" class="dnd_socialicon_myspace tcvpb_socialicon_myspace dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on MySpace','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-myspace"></i></a>
				<?php endif;?>
				<?php $footer_picasa_url = get_theme_mod('picasa_url','');
				if($footer_picasa_url!= ''):?>
					<a href="<?php echo $footer_picasa_url;?>" class="dnd_socialicon_picasa tcvpb_socialicon_picasa dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Picasa','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-picasa"></i></a>
				<?php endif;?>
				<?php $footer_stumbleUpon_url = get_theme_mod('stumbleUpon_url','');
				if($footer_stumbleUpon_url!= ''):?>
					<a href="<?php echo $footer_stumbleUpon_url;?>" class="dnd_socialicon_stumbleUpon tcvpb_socialicon_stumbleUpon dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on StumbleUpon','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-stumbleupon"></i></a>
				<?php endif;?>
				<?php $footer_vimeo_url = get_theme_mod('vimeo_url','');
				if($footer_vimeo_url!= ''):?>
					<a href="<?php echo $footer_vimeo_url;?>" class="dnd_socialicon_vimeo tcvpb_socialicon_vimeo dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Vimeo','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-vimeo"></i></a>
				<?php endif;?>
				<?php $footer_zerply_url = get_theme_mod('zerply_url','');
				if($footer_zerply_url!= ''):?>
					<a href="<?php echo $footer_zerply_url;?>" class="dnd_socialicon_zerply tcvpb_socialicon_zerply dnd_tooltip tcvpb_tooltip" title="<?php _e('Follow us on Zerply','ABdev_incomeup'); ?>" data-gravity="s" target="<?php echo $target; ?>"><i class="ci_icon-zerply"></i></a>
				<?php endif;?>
			</div>
		</div>
	</div>
</footer>