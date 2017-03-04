<?php

/*********** Shortcode: Knob ************************************************************/

$tcvpb_elements['knob_tc'] = array(
	'name' => esc_html__('Knob', 'ABdev_incomeup'),
	'type' => 'block',
	'icon' => 'pi-knob',
	'category' =>  esc_html__('Charts', 'ABdev_incomeup'),
	'attributes' => array(
		'number' => array(
			'description' => esc_html__('Knob Number', 'ABdev_incomeup'),
		),
		'number_color' => array(
			'description' => esc_html__('Number Color', 'ABdev_incomeup'),
			'type' => 'color',
		),
		'hide_number' => array(
			'description' => esc_html__('Hide Number', 'ABdev_incomeup'),
			'type' => 'checkbox',
			'divider' => 'true',
		),
		'angle_offset' => array(
			'description' => esc_html__('Angle Offset', 'ABdev_incomeup'),
			'info' => esc_html__('Starting angle in degrees, default=0', 'ABdev_incomeup'),
		),
		'angle_arc' => array(
			'description' => esc_html__('Angle Arc', 'ABdev_incomeup'),
			'info' => esc_html__('Arc size in degrees, default=360', 'ABdev_incomeup'),
		),
		'thickness' => array(
			'description' => esc_html__('Arc Thickness', 'ABdev_incomeup'),
			'info' => esc_html__('Percent of arc out of circle, 1 very thick, 100 full circle', 'ABdev_incomeup'),
		),
		'ending' => array(
			'description' => esc_html__('Arc Stroke Ending', 'ABdev_incomeup'),
			'type' => 'select',
			'default' => 'default',
			'values' => array(
				'default' => esc_html__('Default', 'ABdev_incomeup'),
				'round' => esc_html__('Rounded', 'ABdev_incomeup'),
			),
			'divider' => 'true',
		),
		'full_color' => array(
			'description' => esc_html__('Full Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
		),
		'empty_color' => array(
			'description' => esc_html__('Empty Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
		),
		'inner_color' => array(
			'description' => esc_html__('Inner Circle Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
		),
		'inner_circle_distance' => array(
			'description' => esc_html__('Inner Circle Distance', 'ABdev_incomeup'),
			'info' => esc_html__('Distance of inner circle from arc, only if Inner Circle Color is defined; value in px', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'label' => array(
			'description' => esc_html__('Knob Label', 'ABdev_incomeup'),
		),
		'label_color' => array(
			'description' => esc_html__('Knob Label Color', 'ABdev_incomeup'),
			'type' => 'color',
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
function tcvpb_knob_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('knob_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$thickness_out = ($thickness!='') ? $thickness/100 : '';
	$label_color_out = ($label_color!='') ? 'color:'.esc_attr($label_color).';' : '';

	$out ='<div '.esc_attr($id_out).' class="tcvpb_knob_wrapper '.esc_attr($class).'">';
	$out .= '<div class="tcvpb_knob_inner_wrap">';
	$out .= (!$hide_number) ? '<div class="tcvpb_knob_number_sign" style="color:'.esc_attr($number_color).';"><span class="tcvpb_knob_number">0</span>%</div>' :'';
	$out .= '<input type="text" class="tcvpb_knob" value="'.esc_attr($number).'" data-width="100%"  data-number="'.esc_attr($number).'" data-fgColor="'.esc_attr($full_color).'" data-bgColor="'.esc_attr($empty_color).'" data-innerColor="'.esc_attr($inner_color).'" data-lineCap="'.esc_attr($ending).'" data-thickness="'.esc_attr($thickness_out).'" data-angleArc="'.esc_attr($angle_arc).'" data-angleOffset="'.esc_attr($angle_offset).'" data-hideNumber="'.esc_attr($hide_number).'" data-innerCircleDistance="'.esc_attr($inner_circle_distance).'">';
	$out .= '</div>';
	$out .= ($label!='')?'<h3 style="'.$label_color_out.'">'.$label.'</h3>':'';
	$out .= '</div>';
	return $out;
}


