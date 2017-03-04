<?php
// redux framework legacy - import options in theme customizer
$incomeup_options = get_option('incomeup_options');
if(is_array($incomeup_options)){
	$options_direct = array('disable_responsiveness', 'boxed_body', 'body_background', 'hide_comments', 'hide_author_bio', 'enable_preloader', 'custom_css', 'analytics_code', '404_page', 'wishlist_page', 'my_account_page', 'shop_sidebar', 'sidebar_position', 'brand_slug', 'consider_new', 'header_layout', 'header_style_invert', 'header_with_sticky', 'header_with_switch', 'show_top_bar', 'show_login_top_bar', 'header_phone', 'header_email', 'header_linkedin_url', 'header_facebook_url', 'header_skype_url', 'header_googleplus_url', 'header_twitter_url', 'header_youtube_url', 'header_pinterest_url', 'header_github_url', 'header_feed_url', 'header_behance_url', 'header_blogger_url', 'header_delicious_url', 'header_designContest_url', 'header_deviantART_url', 'header_digg_url', 'header_dribbble_url', 'header_dropbox_url', 'header_email_url', 'header_flickr_url', 'header_forrst_url', 'header_instagram_url', 'header_last_fm_url', 'header_myspace_url', 'header_picasa_url', 'header_stumbleUpon_url', 'header_vimeo_url', 'header_zerply_url', 'header_social_target', 'hide_title_breadcrumbs_bar', 'hide_title_from_bar', 'hide_breadcrumbs_from_bar', 'disable_icon_font', 'icon_font_info', 'sidebars', 'main_color', 'secondary_color', 'content_after_portfolio', 'list_link', 'copyright', 'linkedin_url', 'facebook_url', 'skype_url', 'googleplus_url', 'twitter_url', 'youtube_url', 'pinterest_url', 'github_url', 'feed_url', 'behance_url', 'blogger_blog_url', 'delicious_url', 'designcontest_url', 'deviantart_url', 'digg_url', 'dribbble_url', 'dropbox_url', 'email_url', 'flickr_url', 'forrst_url', 'instagram_url', 'lastfm_url', 'myspace_url', 'picasa_url', 'stumbleupon_url', 'vimeo_url', 'zerply_url', 'footer_social_target');
	foreach ($options_direct as $option_direct) {
		set_theme_mod( $option_direct, $incomeup_options[$option_direct] );
	}
	$options_url = array('favicon','header_logo','inversed_header_logo');
	foreach ($options_url as $option_url) {
		set_theme_mod( $option_url, $incomeup_options[$option_url]['url'] );
	}
	set_theme_mod( 'title_breadcrumbs_bar_background', $incomeup_options['title_breadcrumbs_bar_background']['url'] );
	set_theme_mod( 'coming_soon_header_background', $incomeup_options['coming_soon_header_background']['url'] );
	delete_option( 'incomeup_options' );
}