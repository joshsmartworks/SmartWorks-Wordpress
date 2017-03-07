<?php

/*********** Shortcode: Tooltip ************************************************************/

$tcvpb_elements['tooltip_tc'] = array(
	'name' => esc_html__('Tooltip', 'ABdev_incomeup' ),
	'type' => 'inline',
	'attributes' => array(
		'text' => array(
			'description' => esc_html__('Text', 'ABdev_incomeup'),
		),
		'link' => array(
			'description' => esc_html__('Link', 'ABdev_incomeup'),
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
			'description' => esc_html__('Tooltip Gravity', 'ABdev_incomeup'),
			'default' => 's',
			'type' => 'select',
			'values' => array(
				's' =>  esc_html__('South', 'ABdev_incomeup'),
				'n' => esc_html__('North', 'ABdev_incomeup'),
				'e' => esc_html__('East', 'ABdev_incomeup'),
				'w' => esc_html__('West', 'ABdev_incomeup'),
				'nw' =>  esc_html__('Northwest', 'ABdev_incomeup'),
				'ne' => esc_html__('Northeast', 'ABdev_incomeup'),
				'sw' => esc_html__('Southwest', 'ABdev_incomeup'),
				'se' => esc_html__('Southeast', 'ABdev_incomeup'),
			),
		),
		'class' => array(
			'description' => esc_html__('Class', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
			'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => esc_html__('Tooltip Content', 'ABdev_incomeup'),
	)
);
function tcvpb_tooltip_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('tooltip_tc'), $attributes));

	$link_output=($link!='')?' href="'.esc_url($link).'"':'';
	$target_output=($target!='')?' target="'.esc_attr($target).'"':'';

	return '<a'.$link_output.' class="tcvpb_tooltip '.esc_attr($class).'" data-gravity="'.esc_attr($gravity).'" title="'.esc_attr($text).'"'.$target_output.'>'.do_shortcode($content).'</a>';
}
