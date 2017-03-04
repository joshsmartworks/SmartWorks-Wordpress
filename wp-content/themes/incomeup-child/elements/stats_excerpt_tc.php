<?php

/*********** Shortcode: Stats Excerpt ************************************************************/

$tcvpb_elements['stats_excerpt_tc'] = array(
	'name' => esc_html__('Stats Excerpt', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-stats',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'attributes' => array(
		'background_color' => array(
			'description' => esc_html__('Background Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'divider' => 'true',
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'icon_color' => array(
			'description' => esc_html__('Icon Color', 'ABdev_incomeup'),
			'type' => 'color',
			'divider' => 'true',
		),
		'number' => array(
			'description' => esc_html__('Stats Number', 'ABdev_incomeup'),
		),
		'number_color' => array(
			'description' => esc_html__('Stats Number Color', 'ABdev_incomeup'),
			'type' => 'color',
		),
		'number_sign' => array(
			'description' => esc_html__('Stats Number Sign', 'ABdev_incomeup'),
		),
		'number_sign_color' => array(
			'description' => esc_html__('Stats Number Sign Color', 'ABdev_incomeup'),
			'type' => 'color',
			'divider' => 'true',
		),
		'duration' => array(
			'description' => esc_html__('Animation Duration (ms)', 'ABdev_incomeup'),
			'default' => '1100',
		),
		'trigger_pt' => array(
			'description' => esc_html__('Trigger Point (in px)', 'ABdev_incomeup'),
			'info' => esc_html__('Amount of pixels from bottom to start animation', 'ABdev_incomeup'),
			'default' => '0',
			'divider' => 'true',
		),
		'description' => array(
			'description' => esc_html__('Description', 'ABdev_incomeup'),
		),
		'description_color' => array(
			'description' => esc_html__('Description Color', 'ABdev_incomeup'),
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
	)
);
function tcvpb_stats_excerpt_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('stats_excerpt_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$icon_out = ($icon!='') ? '<i class="'.$icon.'" style="color:'.$icon_color.'"></i>' : '';
	$number_sign_out = ($number_sign!='') ? '<span class="tcvpb_stats_number_sign" style="color:'.esc_attr($number_sign_color).';">'.$number_sign.'</span>' : '';

	if($icon_out=='' && $description==''){
		return '
			<div class="tcvpb_stats_excerpt '.$class.' tcvpb_stats_excerpt_number_only">
				<span class="tcvpb_stats_number" data-number="'.$number.'" data-duration="'.$duration.'" data-trigger_pt="'.esc_attr($trigger_pt).'" style="color:'.esc_attr($number_color).';"></span>
				'.$number_sign_out.'
			</div>';
	} elseif($icon_out=='' && $description!=''){
		return '
			<div class="tcvpb_stats_excerpt '.$class.' tcvpb_stats_excerpt_text_only">
				<span class="tcvpb_stats_number" data-number="'.$number.'" data-duration="'.$duration.'" data-trigger_pt="'.esc_attr($trigger_pt).'" style="color:'.esc_attr($number_color).';"></span>
				'.$number_sign_out.'
				<p style="color:'.esc_attr($description_color).';">'.do_shortcode($description).'</p>
			</div>';
	} elseif($icon_out!='' && $description==''){
		return '
			<div class="tcvpb_stats_excerpt '.$class.' tcvpb_stats_excerpt_icon_only">
				'.$icon_out.'
				<span class="tcvpb_stats_number" data-number="'.$number.'" data-duration="'.$duration.'" data-trigger_pt="'.esc_attr($trigger_pt).'" style="color:'.esc_attr($number_color).';"></span>
				'.$number_sign_out.'
			</div>';
	} else{
		return '
			<div class="tcvpb_stats_excerpt '.$class.'">
				'.$icon_out.'
				<span class="tcvpb_stats_number" data-number="'.$number.'" data-duration="'.$duration.'" data-trigger_pt="'.esc_attr($trigger_pt).'" style="color:'.esc_attr($number_color).';"></span>
				'.$number_sign_out.'
				<p style="color:'.esc_attr($description_color).';">'.do_shortcode($description).'</p>
			</div>';

	}
}


