<?php

/*********** Shortcode: Service box ************************************************************/

$tcvpb_elements['service_box_tc'] = array(
	'name' => esc_html__('Service box', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-service-box',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'attributes' => array(
		'title' => array(
			'description' => esc_html__('Title', 'ABdev_incomeup'),
		),
		'type' => array(
			'description' => esc_html__('Type', 'ABdev_incomeup'),
			'default' => 'round',
			'type' => 'select',
			'values' => array(
				'round_text_aside' => esc_html__('Round Text Aside', 'ABdev_incomeup'),
				'round_text_aside_middle' => esc_html__('Round Text Aside Middle', 'ABdev_incomeup'),
				'boxed' =>  esc_html__('Boxed', 'ABdev_incomeup'),
				'unboxed_round' => esc_html__('Unboxed Round', 'ABdev_incomeup'),
				'unboxed_square' => esc_html__('Unboxed Square', 'ABdev_incomeup'),
				'boxed_inside' => esc_html__('Boxed Icon Inside', 'ABdev_incomeup'),
			),
		),
		'link' => array(
			'description' => esc_html__('Link', 'ABdev_incomeup'),
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
		'box_color' => array(
			'description' => esc_html__('Box Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'tab' => esc_html__('Box Style', 'ABdev_incomeup'),
		),
		'box_border' => array(
			'description' => esc_html__( 'Box Border', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
			'tab' => esc_html__('Box Style', 'ABdev_incomeup'),
		),
		'box_border_color' => array(
			'description' => esc_html__('Box Border Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'tab' => esc_html__('Box Style', 'ABdev_incomeup'),
		),
		'box_border_width' => array(
			'description' => esc_html__('Box Border Width (px)', 'ABdev_incomeup'),
			'type' => 'string',
			'default' => '1',
			'tab' => esc_html__('Box Style', 'ABdev_incomeup'),
		),
		'box_border_radius' => array(
			'description' => esc_html__('Box Border Radius (px)', 'ABdev_incomeup'),
			'type' => 'string',
			'default' => '5',
			'tab' => esc_html__('Box Style', 'ABdev_incomeup'),
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'icon_color' => array(
			'description' => esc_html__('Icon Color', 'ABdev_incomeup'),
			'type' => 'color',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'icon_background_color_start' => array(
			'description' => esc_html__('Icon Background Color Start', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'info' => esc_html__('Pick a color for icon background. If you pick end color, you\'ll have a gradient background', 'ABdev_incomeup'),
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'icon_background_color_end' => array(
			'description' => esc_html__('Icon Background Color End', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'gradient_direction' => array(
			'description' => esc_html__('Icon Background Gradient Direction', 'ABdev_incomeup'),
			'default' => 'to top',
			'type' => 'select',
			'values' => array(
				'to top' => esc_html__('To top', 'ABdev_incomeup'),
				'to bottom' => esc_html__('To bottom', 'ABdev_incomeup'),
				'to left' =>  esc_html__('To left', 'ABdev_incomeup'),
				'to right' => esc_html__('To right', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'icon_border' => array(
			'description' => esc_html__( 'Icon Border', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'icon_border_color' => array(
			'description' => esc_html__('Icon Border Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
		),
		'border_width' => array(
			'description' => esc_html__('Icon Border Width (px)', 'ABdev_incomeup'),
			'type' => 'string',
			'default' => '1',
			'tab' => esc_html__('Icon', 'ABdev_incomeup'),
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
function tcvpb_service_box_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('service_box_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$class = ' tcvpb_service_box_'.$type . ' ' . $class;
	$icon_border = ($icon_border) ? 'border: '.$border_width.'px solid '.$icon_border_color.' ;' : '';
	$icon_color = ($icon_color!='') ? 'color: '.$icon_color.';' : '';
	$box_color = ($box_color!='') ? 'background:'.$box_color.';' : '';
	$border = ($box_border) ? 'border: '.$box_border_width.'px solid '.$box_border_color.'; border-radius:'.$box_border_radius.'px;' : '';

	$icon_bg_out = ($icon_background_color_start!='') ? 'background:' .$icon_background_color_start.'; ' : '';

	if($icon_background_color_start!='' && $icon_background_color_end!=''){
		$icon_bg_out = 'background:linear-gradient('.$gradient_direction.',' .$icon_background_color_start.',' .$icon_background_color_end.');';
	}
	else if($icon_background_color_start!='' || $icon_background_color_end!=''){
		$icon_bg_out = 'background:' .(($icon_background_color_start!='') ? $icon_background_color_start : $icon_background_color_end).'; ';
	}

	$return = '
		<div '.esc_attr($id_out).' class="tcvpb_service_box '.esc_attr($class).'" style="'.esc_attr($box_color).' '.esc_attr($border).'">
			<div class="tcvpb_service_box_header">';

			$title_out = ($title !='') ? '<h3>'.esc_html($title).'</h3>' :'';

			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="tcvpb_icon_boxed scroll " style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></a>' : '<div class="tcvpb_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></div>';
			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="scroll">'.$title_out.'</a>' : $title_out;
			$return .= '</div>';
			$return .= ($content != '') ?''.do_shortcode($content).'' : '';
			$return .= '</div>';

	if($type == 'boxed_inside') {
		$return = '<div '.esc_attr($id_out).' class="tcvpb_service_box '.esc_attr($class).'">
						<div class="tcvpb_service_box_header" style="'.esc_attr($box_color).' '.esc_attr($border).'">';

						$title_out = ($title !='') ? '<h3>'.$title.'</h3>' :'';

						$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="tcvpb_icon_boxed scroll" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.$icon_color.'background:transparent;"></i></a>' : '<div class="tcvpb_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></div>';
						$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="scroll">'.$title_out.'</a>' : $title_out;
						$return .= '</div>';
						$return .= ($content != '') ?''.do_shortcode($content).'' : '';
					$return .= '</div>';
	}

	return $return;
}

