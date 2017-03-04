<?php

/*********** Shortcode: Team ************************************************************/

$tcvpb_elements['team_tc'] = array(
	'name' => esc_html__('Team Member', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-team',
	'category' =>  esc_html__('Social', 'ABdev_incomeup'),
	'attributes' => array(
		'name' => array(
			'description' => esc_html__('Name', 'ABdev_incomeup'),
		),
		'position' => array(
			'description' => esc_html__('Position', 'ABdev_incomeup'),
		),
		'image' => array(
			'type' => 'image',
			'description' => esc_html__('Image URL', 'ABdev_incomeup'),
		),
		'link' => array(
			'description' => esc_html__('Profile URL', 'ABdev_incomeup'),
			'info' => esc_html__('Link to about page. If you are using this please uncheck Use Modal option.', 'ABdev_incomeup'),
		),
		'modal' => array(
			'type' => 'checkbox',
			'description' => esc_html__('Use Modal', 'ABdev_incomeup'),
			'info' => esc_html__('Modal window will appear on click instead of following a link. Use content to add modal window content', 'ABdev_incomeup'),
		),
		'id' => array(
			'description' => esc_html__('ID', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom ID', 'ABdev_incomeup'),
			'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
		),
		'class' => array(
			'description' => esc_html__('Class', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
			'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
		),
		'mail' => array(
			'description' => __('E-mail address', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'facebook' => array(
			'description' => __('Facebook URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'twitter' => array(
			'description' => __('Twitter URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'linkedin' => array(
			'description' => __('Linkedin URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'googleplus' => array(
			'description' => __('Google+ URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'youtube' => array(
			'description' => __('Youtube URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'pinterest' => array(
			'description' => __('Pinterest URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'github' => array(
			'description' => __('Github URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'feed' => array(
			'description' => __('Feed URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'behance' => array(
			'description' => __('Behance URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'blogger_blog' => array(
			'description' => __('Blogger URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'delicious' => array(
			'description' => __('Delicious URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'designcontest' => array(
			'description' => __('DesignContest URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'deviantart' => array(
			'description' => __('DeviantART URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'digg' => array(
			'description' => __('Digg URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'dribbble' => array(
			'description' => __('Dribbble URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'dropbox' => array(
			'description' => __('Dropbox URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'flickr' => array(
			'description' => __('Flickr URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'forrst' => array(
			'description' => __('Forrst URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'instagram' => array(
			'description' => __('Instagram URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'lastfm' => array(
			'description' => __('Last.fm URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'myspace' => array(
			'description' => __('Myspace URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'picasa' => array(
			'description' => __('Picasa URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'skype' => array(
			'description' => __('Skype URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'stumbleupon' => array(
			'description' => __('StumbleUpon URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'vimeo' => array(
			'description' => __('Vimeo URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'zerply' => array(
			'description' => __('Zerply URL', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'social_target' => array(
			'description' => __('Social Link Target', 'ABdev_incomeup'),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  __('Self', 'ABdev_incomeup'),
				'_blank' => __('Blank', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
		'social_under' => array(
			'type' => 'checkbox',
			'description' => __('Social icons under position', 'ABdev_incomeup'),
			'info' => __('If enabled social icons will appear under position instead on image overlay.', 'ABdev_incomeup'),
			'tab' => esc_html__('Social', 'ABdev_incomeup'),
		),
	),
		'content' => array(
			'description' => esc_html__('Content', 'ABdev_incomeup'),
		),
);
function tcvpb_team_tc_shortcode( $attributes, $content = null ) {
	global $social_links;
	extract(shortcode_atts(tcvpb_extract_attributes('team_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$return = '
		<div '.esc_attr($id_out).' class="tcvpb_team_member '.esc_attr($class).'">';

	$social_links = '';
	if($twitter!='') $social_links .= '<a href="'.esc_url($twitter).'" target="'.$social_target.'"><i class="ci_icon-twitter"></i></a>';
	if($linkedin!='') $social_links .= '<a href="'.esc_url($linkedin).'" target="'.$social_target.'"><i class="ci_icon-linkedin"></i></a>';
	if($mail!='') $social_links .= '<a href="'.esc_url('mailto:'.$mail).'"><i class="ci_icon-envelope"></i></a>';
	if($facebook!='') $social_links .= '<a href="'.esc_url($facebook).'" target="'.$social_target.'"><i class="ci_icon-facebook"></i></a>';
	if($googleplus!='') $social_links.='<a href="'.esc_url($googleplus).'" target="'.$social_target.'"><i class="ci_icon-googleplus"></i></a>';
	if($youtube!='') $social_links.='<a href="'.esc_url($youtube).'" target="'.$social_target.'"><i class="ci_icon-youtube-play"></i></a>';
	if($pinterest!='') $social_links.='<a href="'.esc_url($pinterest).'" target="'.$social_target.'"><i class="ci_icon-pinterest"></i></a>';
	if($github!='') $social_links.='<a href="'.esc_url($github).'" target="'.$social_target.'"><i class="ci_icon-github-alt"></i></a>';
	if($feed!='') $social_links.='<a href="'.esc_url($feed).'" target="'.$social_target.'"><i class="ci_icon-rss"></i></a>';
	if($behance!='') $social_links.='<a href="'.esc_url($behance).'" target="'.$social_target.'"><i class="ci_icon-behance"></i></a>';
	if($blogger_blog!='') $social_links.='<a href="'.esc_url($blogger_blog).'" target="'.$social_target.'"><i class="ci_icon-blogger-blog"></i></a>';
	if($delicious!='') $social_links.='<a href="'.esc_url($delicious).'" target="'.$social_target.'"><i class="ci_icon-delicious"></i></a>';
	if($designcontest!='') $social_links.='<a href="'.esc_url($designcontest).'" target="'.$social_target.'"><i class="ci_icon-designcontest"></i></a>';
	if($deviantart!='') $social_links.='<a href="'.esc_url($deviantart).'" target="'.$social_target.'"><i class="ci_icon-deviantart"></i></a>';
	if($digg!='') $social_links.='<a href="'.esc_url($digg).'" target="'.$social_target.'"><i class="ci_icon-digg"></i></a>';
	if($dribbble!='') $social_links.='<a href="'.esc_url($dribbble).'" target="'.$social_target.'"><i class="ci_icon-dribbble"></i></a>';
	if($dropbox!='') $social_links.='<a href="'.esc_url($dropbox).'" target="'.$social_target.'"><i class="ci_icon-dropbox"></i></a>';
	if($flickr!='') $social_links.='<a href="'.esc_url($flickr).'" target="'.$social_target.'"><i class="ci_icon-flickr"></i></a>';
	if($forrst!='') $social_links.='<a href="'.esc_url($forrst).'" target="'.$social_target.'"><i class="ci_icon-forrst"></i></a>';
	if($instagram!='') $social_links.='<a href="'.esc_url($instagram).'" target="'.$social_target.'"><i class="ci_icon-instagram"></i></a>';
	if($lastfm!='') $social_links.='<a href="'.esc_url($lastfm).'" target="'.$social_target.'"><i class="ci_icon-lastfm"></i></a>';
	if($myspace!='') $social_links.='<a href="'.esc_url($myspace).'" target="'.$social_target.'"><i class="ci_icon-myspace"></i></a>';
	if($picasa!='') $social_links.='<a href="'.esc_url($picasa).'" target="'.$social_target.'"><i class="ci_icon-picasa"></i></a>';
	if($skype!='') $social_links.='<a href="'.esc_url($skype).'" target="'.$social_target.'"><i class="ci_icon-skype"></i></a>';
	if($stumbleupon!='') $social_links.='<a href="'.esc_url($stumbleupon).'" target="'.$social_target.'"><i class="ci_icon-stumbleupon"></i></a>';
	if($vimeo!='') $social_links.='<a href="'.esc_url($vimeo).'" target="'.$social_target.'"><i class="ci_icon-vimeo"></i></a>';
	if($zerply!='') $social_links.='<a href="'.esc_url($zerply).'" target="'.$social_target.'"><i class="ci_icon-zerply"></i></a>';

	do_shortcode($content);

		if( $social_links!='' && $social_under !=1 ){
			$return .= '<div class="tcvpb_overlayed">
							<img src="'.esc_url($image).'" alt="'.esc_attr($name).'">
							<div class="tcvpb_overlay">
								<p>'.$social_links.'</p>
							</div>
						</div>';
		} else if( $link!='' || $modal == 1){
			$return .= '<div class="tcvpb_overlayed">
							<img src="'.esc_url($image).'" alt="'.esc_attr($name).'">
							<div class="tcvpb_overlay">
								<p>';
								if ($modal==1){
									$return .='<a class="tcvpb_team_member_link tcvpb_team_member_modal_link" href="'.esc_url($link).'"><i class="ci_icon-zoom-in"></i></a>';
								} else{
									$return .='<a href="'.esc_url($link).'"><i class="ci_icon-linkalt"></i></a>';
								}
								$return .= '</p>
							</div>
						</div>';
		} else{
			$return.= '<img src="'.esc_url($image).'" alt="'.esc_attr($name).'">';
		}

		$return .= '<a class="tcvpb_team_member_link'.(($modal==1)?' tcvpb_team_member_modal_link':'').'" href="'.esc_url($link).'">
			<span class="tcvpb_team_member_name">'.esc_html($name).'</span>
			<span class="tcvpb_team_member_position">'.esc_html($position).'</span>
		</a>';

		if($modal == 1){
			$return .= '
				<div class="tcvpb_team_member_modal">
					<h4 class="tcvpb_team_member_name">'.esc_attr($name).'</h4>
					<p class="tcvpb_team_member_position">'.$position.'</p>
					<div class="tcvpb_container">
						<div class="tcvpb_column_tc_span6">
							<img src="'.esc_url($image).'" alt="'.esc_attr($name).'">
						</div>
						<div class="tcvpb_column_tc_span6">
							'.do_shortcode($content).'
						</div>
					</div>
					<div class="tcvpb_team_member_modal_close">X</div>
				</div>';
		} else{
			$return .= do_shortcode($content);
		}

		if($social_under==1){
			$return .= '<div class="tcvpb_team_member_social_under">'.$social_links.'</div>';
		}


		$return .= '</div>';


	return $return;
}