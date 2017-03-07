<?php

/*********** Shortcode: Pullquote ************************************************************/

$tcvpb_elements['pullquote_tc'] = array(
	'name' => esc_html__('Pullquote', 'ABdev_incomeup' ),
	'type' => 'inline',
	'attributes' => array(
		'span' => array(
			'default' => '3',
			'description' => esc_html__('Span 1-11', 'ABdev_incomeup'),
		),
		'align' => array(
			'default' => 'left',
			'description' => esc_html__('Align', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'left' => esc_html__('Left', 'ABdev_incomeup'),
				'right' => esc_html__('Right', 'ABdev_incomeup'),
			),
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
	'content' => array(
		'description' => esc_html__('Content', 'ABdev_incomeup'),
	),
);
function tcvpb_pullquote_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('pullquote_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	return '<span '.esc_attr($id_out).' class="tcvpb_pullquote tcvpb_pullquote_'.esc_attr($align).' tcvpb_column_tc_span'.esc_attr($span).' '.esc_attr($class).'">
		'.$content.'
	</span>';
}
