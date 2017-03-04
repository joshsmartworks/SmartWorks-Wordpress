<?php

/*********** Shortcode: Callout box ************************************************************/

$tcvpb_elements['callout_box_tc'] = array(
	'name' => esc_html__('Callout Box', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-callout-box',
	'category' => esc_html__('Content', 'ABdev_incomeup' ),
	'attributes' => array(
		'style' => array(
			'description' => esc_html__( 'Box Style', 'ABdev_incomeup' ),
			'default' => 'style_1',
			'type' => 'select',
			'values' => array(
				'style_1' =>  esc_html__( 'Style 1', 'ABdev_incomeup' ),
				'style_2' =>  esc_html__( 'Style 2', 'ABdev_incomeup' ),
				'style_3' =>  esc_html__( 'Style 3', 'ABdev_incomeup' ),
				'style_4' =>  esc_html__( 'Style 4', 'ABdev_incomeup' ),
				'style_5' =>  esc_html__( 'Style 5', 'ABdev_incomeup' ),
			),
		),
		'title' => array(
			'description' => esc_html__( 'Title', 'ABdev_incomeup' ),
		),
		'second_button' => array(
			'description' => esc_html__( 'Second Button', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'inverted' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__( 'Inverted (White) Text', 'ABdev_incomeup' ),
			'divider' => 'true',
		),
		'button1_text' => array(
			'description' => esc_html__( 'Button Text', 'ABdev_incomeup' ),
			'default' => esc_html__( 'Click Here', 'ABdev_incomeup' ),
		),
		'button1_size' => array(
			'description' => esc_html__( 'Button Size', 'ABdev_incomeup' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  esc_html__( 'Small', 'ABdev_incomeup' ),
				'medium' => esc_html__( 'Medium', 'ABdev_incomeup' ),
				'large' => esc_html__( 'Large', 'ABdev_incomeup' ),
				'xlarge' => esc_html__( 'Extra Large', 'ABdev_incomeup' ),
			),
		),
		'button1_color' => array(
			'description' => esc_html__( 'Button 1 Color', 'ABdev_incomeup' ),
			'default' => 'light',
			'type' => 'select',
			'values' => array(
				'light' =>  esc_html__( 'Light', 'ABdev_incomeup' ),
				'dark' =>  esc_html__( 'Dark', 'ABdev_incomeup' ),
				'yellow' =>  esc_html__( 'Yellow', 'ABdev_incomeup' ),
				'green' =>  esc_html__( 'Green', 'ABdev_incomeup' ),
				'red' =>  esc_html__( 'Red', 'ABdev_incomeup' ),
				'blue' =>  esc_html__( 'Blue', 'ABdev_incomeup' ),
				'gray' =>  esc_html__( 'Gray', 'ABdev_incomeup' ),
				'cyan' =>  esc_html__( 'Cyan', 'ABdev_incomeup' ),
				'aquamarine' =>  esc_html__( 'Aquamarine', 'ABdev_incomeup' ),
			),
		),
		'button1_style' => array(
			'description' => esc_html__( 'Button Style', 'ABdev_incomeup' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  esc_html__( 'Normal', 'ABdev_incomeup' ),
				'rounded' =>  esc_html__( 'Rounded', 'ABdev_incomeup' ),
			),
		),
		'button1_url' => array(
			'description' => esc_html__( 'Button URL', 'ABdev_incomeup' ),
			'type' => 'url',
		),
		'button1_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => esc_html__( 'Button Target', 'ABdev_incomeup' ),
			'values' => array(
				'_self' =>  esc_html__( 'Self', 'ABdev_incomeup' ),
				'_blank' => esc_html__( 'Blank', 'ABdev_incomeup' ),
			),
		),
		'button1_icon' => array(
			'description' => esc_html__('Button Icon', 'ABdev_incomeup'),
			'info' => esc_html__('Optional icon after button text', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'button2_text' => array(
			'description' => esc_html__( 'Button 2 Text', 'ABdev_incomeup' ),
			'default' => esc_html__( 'Click Here', 'ABdev_incomeup' ),
		),
		'button2_size' => array(
			'description' => esc_html__( 'Button 2 Size', 'ABdev_incomeup' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  esc_html__( 'Small', 'ABdev_incomeup' ),
				'medium' => esc_html__( 'Medium', 'ABdev_incomeup' ),
				'large' => esc_html__( 'Large', 'ABdev_incomeup' ),
				'xlarge' => esc_html__( 'Extra Large', 'ABdev_incomeup' ),
			),
		),
		'button2_color' => array(
			'description' => esc_html__( 'Button 2 Color', 'ABdev_incomeup' ),
			'default' => 'light',
			'type' => 'select',
			'values' => array(
				'light' =>  esc_html__( 'Light', 'ABdev_incomeup' ),
				'dark' =>  esc_html__( 'Dark', 'ABdev_incomeup' ),
				'yellow' =>  esc_html__( 'Yellow', 'ABdev_incomeup' ),
				'green' =>  esc_html__( 'Green', 'ABdev_incomeup' ),
				'red' =>  esc_html__( 'Red', 'ABdev_incomeup' ),
				'blue' =>  esc_html__( 'Blue', 'ABdev_incomeup' ),
				'gray' =>  esc_html__( 'Gray', 'ABdev_incomeup' ),
				'cyan' =>  esc_html__( 'Cyan', 'ABdev_incomeup' ),
				'aquamarine' =>  esc_html__( 'Aquamarine', 'ABdev_incomeup' ),
			),
		),
		'button2_style' => array(
			'description' => esc_html__( 'Button 2 Style', 'ABdev_incomeup' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  esc_html__( 'Normal', 'ABdev_incomeup' ),
				'rounded' =>  esc_html__( 'Rounded', 'ABdev_incomeup' ),
			),
		),
		'button2_url' => array(
			'description' => esc_html__( 'Button 2 URL', 'ABdev_incomeup' ),
		),
		'button2_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => esc_html__( 'Button 2 Target', 'ABdev_incomeup' ),
			'values' => array(
				'_self' =>  esc_html__( 'Self', 'ABdev_incomeup' ),
				'_blank' => esc_html__( 'Blank', 'ABdev_incomeup' ),
			),
		),
		'button2_icon' => array(
			'description' => esc_html__('Button 2 Icon Name', 'ABdev_incomeup'),
			'info' => esc_html__('Optional icon after button text', 'ABdev_incomeup'),
		),
		'only_icon' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__( 'Only Icon Button', 'ABdev_incomeup' ),
			'info' => esc_html__('Hides button text and shows only icon.', 'ABdev_incomeup'),
			'divider' => 'true',
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
		'description' => esc_html__( 'Content', 'ABdev_incomeup' ),
	),

);

function tcvpb_callout_box_tc_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( tcvpb_extract_attributes('callout_box_tc'), $atts ) );
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$button1_class_out = 'tcvpb-button1';
	$button1_class_out .= ' tcvpb-button_'.$button1_color;
	$button1_class_out .= ' tcvpb-button_'.$button1_style;
	$button1_class_out .= ' tcvpb-button_'.$button1_size;

	$button1_icon_out = ($button1_icon!='') ? '<i class="'.esc_attr($button1_icon).'"></i>' : '';

	$button2_class_out = 'tcvpb-button2';
	$button2_class_out .= ' tcvpb-button_'.$button2_color;
	$button2_class_out .= ' tcvpb-button_'.$button2_style;
	$button2_class_out .= ' tcvpb-button_'.$button2_size;

	$button2_icon_out = ($button2_icon!='') ? '<i class="'.esc_attr($button2_icon).'"></i>' : '';

	$class = 'tcvpb-callout_box_'.$style.' '.$class;

	$content_out = ($content!='') ? ''.do_shortcode($content).'' : '';

	$inverted = ($inverted=='1') ? 'color_white' : '';

		$return = '<div class="tcvpb-callout_box '.esc_attr($class).'">';
	$return .= '<span class="tcvpb-callout_box_title">'.$title.'</span>';
	if ($content != '') {
		$return .= '<p>'.do_shortcode($content).'</p>';
	}

	if($only_icon!='1'){
		$return .= '<a href="'. esc_url($button1_url) .'" target="' . esc_attr($button1_target) . '" class="'.esc_attr($button1_class_out).'">'.$button1_text.$button1_icon_out.'</a>';
	}
	else{
		$return .= '<a href="'. esc_url($button1_url) .'" target="' . esc_attr($button1_target) . '" class="tcvpb-icon-button">'.$button1_icon_out.'</a>';
	}

	if($second_button!='1'){
		$return .= '';
	}
	else{
		$return .= '<a href="'. esc_url($button2_url) .'" target="' . esc_attr($button2_target) . '" class="'.esc_attr($button2_class_out).'">'.$button2_text.$button2_icon_out.'</a>';
	}

	$return .= '</div>';

	return $return;
}



