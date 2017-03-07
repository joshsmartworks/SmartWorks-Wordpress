<?php

/*********** Shortcode: Knob ************************************************************/

$ABdevDND_shortcodes['knob_dd'] = array(
	'attributes' => array(
		'number' => array(
			'description' => __('Knob Number', 'dnd-shortcodes'),
		),
		'hide_number' => array(
			'description' => __('Hide Number', 'dnd-shortcodes'),
			'type' => 'checkbox',
			'default' => false,
		),
		'angle_offset' => array(
			'description' => __('Angle Offset', 'dnd-shortcodes'),
			'info' => __('Starting angle in degrees, default=0', 'dnd-shortcodes'),
		),
		'angle_arc' => array(
			'description' => __('Angle Arc', 'dnd-shortcodes'),
			'info' => __('Arc size in degrees, default=360', 'dnd-shortcodes'),
		),
		'thickness' => array(
			'description' => __('Arc Thickness', 'dnd-shortcodes'),
			'info' => __('Percent of arc out of circle, 1 very thick, 100 full circle', 'dnd-shortcodes'),
		),
		'ending' => array(
			'description' => __('Arc Stroke Ending', 'dnd-shortcodes'),
			'type' => 'select',
			'default' => 'default',
			'values' => array(
				'default' => __('Default', 'dnd-shortcodes'),
				'round' => __('Rounded', 'dnd-shortcodes'),
			),
		),
		'full_color' => array(
			'description' => __('Full Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#999',
		),
		'empty_color' => array(
			'description' => __('Empty Color', 'dnd-shortcodes'),
			'type' => 'color',
		),
		'inner_color' => array(
			'description' => __('Inner Circle Color', 'dnd-shortcodes'),
			'type' => 'color',
		),
		'number_color' => array(
			'description' => __('Number Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#656565',
		),
		'inner_circle_distance' => array(
			'description' => __('Inner Circle Distance', 'dnd-shortcodes'),
			'info' => __('Distance of inner circle from arc, only if Inner Circle Color is defined; value in px', 'dnd-shortcodes'),
		),
		'label' => array(
			'description' => __('Knob Label', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Knob', 'dnd-shortcodes')
);
function ABdevDND_knob_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('knob_dd'), $attributes));

	$thickness_out = ($thickness!='') ? $thickness/100 : '';

	$out ='<div class="dnd_knob_wrapper '.esc_attr($class).'">';
	$out .= '<div class="dnd_knob_inner_wrap">';
	$out .= (!$hide_number) ? '<div class="dnd_knob_number_sign" style="color:'.esc_attr($number_color).';"><span class="dnd_knob_number">0</span>%</div>' :'';
	$out .= '<input type="text" class="dnd_knob" value="'.esc_attr($number).'" data-width="100%"  data-number="'.esc_attr($number).'" data-fgColor="'.esc_attr($full_color).'" data-bgColor="'.esc_attr($empty_color).'" data-innerColor="'.esc_attr($inner_color).'" data-lineCap="'.esc_attr($ending).'" data-thickness="'.esc_attr($thickness_out).'" data-angleArc="'.esc_attr($angle_arc).'" data-angleOffset="'.esc_attr($angle_offset).'" data-hideNumber="'.esc_attr($hide_number).'" data-innerCircleDistance="'.esc_attr($inner_circle_distance).'">';
	$out .= '</div>';
	$out .= ($label!='')?'<h5>'.$label.'</h5>':'';
	$out .= '</div>';
	return $out;
}


