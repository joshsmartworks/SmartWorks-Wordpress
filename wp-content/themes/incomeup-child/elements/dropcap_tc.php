<?php

/*********** Shortcode: Dropcap Letter ************************************************************/

$tcvpb_elements['dropcap_tc'] = array(
	'name' => esc_html__('Dropcap Letter', 'ABdev_incomeup' ),
	'type' => 'inline',
	'attributes' => array(
		'letter' => array(
			'description' => esc_html__('Dropcap letter', 'ABdev_incomeup'),
		),
		'color' => array(
			'description' => esc_html__('Letter Color', 'ABdev_incomeup'),
			'type' => 'color',
		),
		'background' => array(
			'description' => esc_html__('Background Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
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
function tcvpb_dropcap_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('dropcap_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$color = ($color!='') ? 'color: '.$color.';' : '';
	$background = ($background!='') ? 'background:'.$background.';' : '';

	return '<span '.esc_attr($id_out).' class="tcvpb_dropcap '.esc_attr($class).'" style="'.esc_attr($color.$background).'">'.esc_attr($letter).'</span>';
}
