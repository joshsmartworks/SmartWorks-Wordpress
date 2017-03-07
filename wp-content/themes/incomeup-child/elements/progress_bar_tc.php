<?php

/*********** Shortcode: Progress Bar ************************************************************/

$tcvpb_elements['progress_bar_tc'] = array(
	'name' => esc_html__('Progress bar', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-progress-bar',
	'category' =>  esc_html__('Charts', 'ABdev_incomeup'),
	'attributes' => array(
		'complete' => array(
			'default' => '60',
			'description' => esc_html__('Percentage', 'ABdev_incomeup'),
		),
		'text' => array(
			'description' => esc_html__('Text', 'ABdev_incomeup'),
		),
		'style' => array(
			'description' => esc_html__('Style', 'ABdev_incomeup'),
			'default' => 'default',
			'type' => 'select',
			'values' => array(
				'default' => esc_html__('Default', 'ABdev_incomeup'),
				'thick' => esc_html__('Thick', 'ABdev_incomeup'),
				'thin' => esc_html__('Thin', 'ABdev_incomeup'),
			),
			'divider' => 'true',
		),
		'bar_color_start' => array(
			'description' => esc_html__('Bar Color Start', 'ABdev_incomeup'),
			'type' => 'color',
		),
		'bar_color_end' => array(
			'description' => esc_html__('Bar Color End', 'ABdev_incomeup'),
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
	'description' => esc_html__('Progress Bar', 'ABdev_incomeup' )
);
function tcvpb_progress_bar_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('progress_bar_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$bar_color_out = ($bar_color_start!='') ? 'background:linear-gradient(to right,' .esc_attr($bar_color_start).',' .esc_attr($bar_color_end).');' : 'background:' .esc_attr($bar_color_start).'; ';

	if($bar_color_start!='' && $bar_color_end!=''){
		$bar_color_out = 'background:linear-gradient(to right,' .esc_attr($bar_color_start).',' .esc_attr($bar_color_end).');';
	}
	else if($bar_color_start!='' || $bar_color_end!=''){
		$bar_color_out = 'background:' .(($bar_color_start!='') ? esc_attr($bar_color_start) : esc_attr($bar_color_end)).'; ';
	}

	$class .= ($style!='') ? 'tcvpb_progress_bar_' .esc_attr($style) : '';

	return '
		<div '.esc_attr($id_out).' class="tcvpb_progress_bar '.esc_attr($class).'">
			<span class="tcvpb_meter_label">'.$text.'</span>
			<div class="tcvpb_meter">
				<div class="tcvpb_meter_percentage" data-percentage="'.esc_attr($complete).'" style="width: '.esc_attr($complete).'%;'.esc_attr($bar_color_out).'"><span>'.esc_html($complete).'%</span></div>
			</div>
		</div>';
}

