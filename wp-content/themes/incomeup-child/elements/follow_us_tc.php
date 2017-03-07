<?php

/*********** Shortcode: Follow us links ************************************************************/

$tcvpb_elements['follow_us_tc'] = array(
	'name' => esc_html__('Follow us Profile Links', 'ABdev_incomeup'),
	'type' =>  'block',
	'icon' => 'pi-social-links',
	'category' =>  esc_html__('Social', 'ABdev_incomeup'),
	'child' => 'follows_us_tc',
	'child_button' => esc_html__('New Profile Link', 'ABdev_incomeup'),
	'child_title' => esc_html__('Follow us Link', 'ABdev_incomeup'),
	'attributes' => array(
		'dummy' => array(
			'type' => 'hidden'
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
function tcvpb_follow_us_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('follow_us_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	return '<div '.esc_attr($id_out).' class="tcvpb_follow_us'.$class.'">'.do_shortcode($content).'</div>';
}

$tcvpb_elements['follows_us_tc'] = array(
	'name' => esc_html__('Single Follow us Link', 'ABdev_incomeup' ),
	'type' => 'child',
	'attributes' => array(
		'title' => array(
			'description' => esc_html__('Tooltip Title', 'ABdev_incomeup'),
			'info' => esc_html__('Name of the social network (e.g. Follow us on Facebook,Follow us on Twitter,Follow us on Google+), this will be shown as tooltip', 'ABdev_incomeup'),
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'url' => array(
			'description' => esc_html__('Profile URL', 'ABdev_incomeup'),
			'type' => 'url',
		),
		'target' => array(
			'description' => esc_html__('Target', 'ABdev_incomeup'),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  esc_html__('Self', 'ABdev_incomeup'),
				'_blank' => esc_html__('Blank', 'ABdev_incomeup'),
			),
		),
		'gravity' => array(
			'default' => 's',
			'description' => esc_html__('Tooltip Gravity Position', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				's' => esc_html__('South', 'ABdev_incomeup'),
				'n' => esc_html__('North', 'ABdev_incomeup'),
				'e' => esc_html__('East', 'ABdev_incomeup'),
				'w' => esc_html__('West', 'ABdev_incomeup'),
			),
		),
	),
);
function tcvpb_follows_us_tc_shortcode( $attributes, $content = null  ) {
	extract(shortcode_atts(tcvpb_extract_attributes('follows_us_tc'), $attributes));

	$return = '<a class="tcvpb_socialicon tcvpb_tooltip" data-gravity="'.esc_attr($gravity).'" href="'.esc_url($url).'" target="'.esc_attr($target).'" title="'.esc_attr($title).'"><i class="'.esc_attr($icon).'"></i></a>';

    return $return;
}
