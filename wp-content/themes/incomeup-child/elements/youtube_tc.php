<?php

/*********** Shortcode: Youtube ************************************************************/

$tcvpb_elements['youtube_tc'] = array(
	'name' => esc_html__('Youtube', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-youtube',
	'category' =>  esc_html__('Media', 'ABdev_incomeup'),
	'attributes' => array(
		'url' => array(
			'description' => esc_html__('Video ID or URL', 'ABdev_incomeup'),
		),
		'fullscreen_button' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Fullscreen Button', 'ABdev_incomeup'),
		),
		'autoplay' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Autoplay', 'ABdev_incomeup'),
		),
		'modestbranding' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Modest Branding', 'ABdev_incomeup'),
		),
		'controls' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Controls', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'showinfo' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Show Info Before Play', 'ABdev_incomeup'),
		),
		'related' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Show Related When Video Ends', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'start' => array(
			'description' => esc_html__('Start Playing at (in seconds)', 'ABdev_incomeup'),
		),
		'end' => array(
			'description' => esc_html__('Stop Playing at (in seconds)', 'ABdev_incomeup'),
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
	),
);
function tcvpb_youtube_tc_shortcode($attributes) {
	extract(shortcode_atts(tcvpb_extract_attributes('youtube_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$options_output = '?autoplay='.$autoplay.'&amp;modestbranding='.$modestbranding.'&amp;controls='.$controls.'&amp;fs='.$fullscreen_button.'&amp;start='.$start.'&amp;end='.$end.'&amp;showinfo='.$showinfo.'&amp;rel='.$related;

	if(strlen($id)==11){
		$video_src='http://www.youtube.com/embed/'.$url.$options_output;
	}
	else{
		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		$video_src='http://www.youtube.com/embed/'.$my_array_of_vars['v'].$options_output;
	}

	return '<div '.esc_attr($id_out).' class="tcvpb-videoWrapper-youtube '.esc_attr($class).'"><iframe src="'.esc_url($video_src).'" frameborder="0" allowfullscreen></iframe></div>';
}


