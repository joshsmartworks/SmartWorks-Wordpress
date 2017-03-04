<?php

/*********** Shortcode: Buttons ************************************************************/

$tcvpb_elements['button_tc'] = array(
	'name' => esc_html__('Button', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-button',
	'category' => esc_html__('Navigation', 'ABdev_incomeup' ),
	'attributes' => array(
		'text' => array(
			'description' => esc_html__( 'Button Text', 'ABdev_incomeup' ),
			'default' => esc_html__( 'Click Here', 'ABdev_incomeup' ),
			'divider' => 'true',
		),
		'style' => array(
			'description' => esc_html__( 'Style', 'ABdev_incomeup' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  esc_html__( 'Normal', 'ABdev_incomeup' ),
				'rounded' =>  esc_html__( 'Rounded', 'ABdev_incomeup' ),
			),
		),
		'size' => array(
			'description' => esc_html__( 'Size', 'ABdev_incomeup' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  esc_html__( 'Small', 'ABdev_incomeup' ),
				'medium' => esc_html__( 'Medium', 'ABdev_incomeup' ),
				'large' => esc_html__( 'Large', 'ABdev_incomeup' ),
				'xlarge' => esc_html__( 'Extra Large', 'ABdev_incomeup' ),
			),
		),
		'color' => array(
			'description' => esc_html__( 'Color', 'ABdev_incomeup' ),
			'default' => 'light',
			'type' => 'select',
			'values' => array(
				'light' =>  esc_html__( 'Light', 'ABdev_incomeup' ),
				'dark' =>  esc_html__( 'Dark', 'ABdev_incomeup' ),
				'yellow' =>  esc_html__( 'Yellow', 'ABdev_incomeup' ),
				'green' =>  esc_html__( 'Green', 'ABdev_incomeup' ),
				'orange' =>  esc_html__( 'Orange', 'ABdev_incomeup' ),
				'blue' =>  esc_html__( 'Blue', 'ABdev_incomeup' ),
				'red' =>  esc_html__( 'Red', 'ABdev_incomeup' ),
				'cyan' =>  esc_html__( 'Cyan', 'ABdev_incomeup' ),
				'purple' =>  esc_html__( 'Purple', 'ABdev_incomeup' ),
				'pink' =>  esc_html__( 'Pink', 'ABdev_incomeup' ),
				'gray' =>  esc_html__( 'Gray', 'ABdev_incomeup' ),
				'aquamarine' =>  esc_html__( 'Aquamarine', 'ABdev_incomeup' ),
			),
		),
		'transparent' => array(
			'description' => esc_html__( 'Transparent', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'effect' => array(
			'description' => esc_html__( 'Effect on Hover', 'ABdev_incomeup' ),
			'default' => '',
			'type' => 'select',
			'values' => array(
				'' =>  esc_html__( 'None', 'ABdev_incomeup' ),
				'pop' => esc_html__( 'Pop', 'ABdev_incomeup' ),
				'zoom' => esc_html__( 'Zoom', 'ABdev_incomeup' ),
				'outline-outward' => esc_html__( 'Outline Outward', 'ABdev_incomeup' ),
				'float-shadow' => esc_html__( 'Float Shadow', 'ABdev_incomeup' ),
				'hover-shadow' => esc_html__( 'Hover Shadow', 'ABdev_incomeup' ),
			),
			'divider' => 'true',
		),
		'url' => array(
			'description' => esc_html__( 'URL', 'ABdev_incomeup' ),
			'type' => 'url',
		),
		'target' => array(
			'description' => esc_html__( 'Target', 'ABdev_incomeup' ),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  esc_html__( 'Self', 'ABdev_incomeup' ),
				'_blank' => esc_html__( 'Blank', 'ABdev_incomeup' ),
			),
			'divider' => 'true',
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'info' => esc_html__('Optional icon after button text', 'ABdev_incomeup'),
			'type' => 'icon',
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

function tcvpb_button_tc_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( tcvpb_extract_attributes('button_tc'), $atts ) );
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$class_out = 'tcvpb-button';
	$class_out .= ' tcvpb-button_'.$color;
	$class_out .= ' tcvpb-button_'.$style;
	$class_out .= ' tcvpb-button_'.$size;
	$class_out .= ($transparent) ? ' tcvpb-button_transparent' : '';
	$class_out .= ' '.$class;

	$icon_out = ($icon!='') ? '<i class="'.esc_attr($icon).'"></i>' : '';

	return '<a '.esc_attr($id_out).' href="'. esc_url($url) .'" target="' . esc_attr($target) . '" class="'.esc_attr($class_out).' '.esc_attr($effect).'">' . esc_html($text) . $icon_out . '</a>';
}


