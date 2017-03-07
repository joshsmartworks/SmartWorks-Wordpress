<?php

/*********** Shortcode: Image Callout box ************************************************************/

$tcvpb_elements['image_callout_box_tc'] = array(
	'name' => esc_html__('Image Callout Box', 'ABdev_incomeup'),
	'type' => 'block',
	'icon' => 'pi-image',
	'category' =>  esc_html__('Media', 'ABdev_incomeup'),
	'attributes' => array(
		'url' => array(
			'type' => 'image',
			'description' => esc_html__('Select Image', 'ABdev_incomeup'),
		),
		'title' => array(
			'description' => esc_html__( 'Title', 'ABdev_incomeup' ),
		),
		'button_text' => array(
			'description' => esc_html__( 'Button Text', 'ABdev_incomeup' ),
			'default' => esc_html__( 'Click Here', 'ABdev_incomeup' ),
		),
		'button_size' => array(
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
		'button_color' => array(
			'description' => esc_html__( 'Button Color', 'ABdev_incomeup' ),
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
		'button_url' => array(
			'description' => esc_html__( 'Button URL', 'ABdev_incomeup' ),
		),
		'button_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => esc_html__( 'Button Target', 'ABdev_incomeup' ),
			'values' => array(
				'_self' =>  esc_html__( 'Self', 'ABdev_incomeup' ),
				'_blank' => esc_html__( 'Blank', 'ABdev_incomeup' ),
			),
		),
		'button_icon' => array(
			'description' => esc_html__('Button Icon Name', 'ABdev_incomeup'),
			'info' => esc_html__('Optional icon after button text', 'ABdev_incomeup'),
		),
		'class' => array(
			'description' => esc_html__('Class', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => esc_html__( 'Content', 'ABdev_incomeup' ),
	),
	'description' => esc_html__( 'Image Callout Box', 'ABdev_incomeup' )

);

function tcvpb_image_callout_box_tc_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( tcvpb_extract_attributes('image_callout_box_tc'), $atts ) );

	$button_class_out = 'button';
	$button_class_out .= ' button_'.$button_color;
	$button_class_out .= ' tcvpb-button_'.$button_size;
	$image_out = ($url !='') ? 'background-image: url('.$url.'); background-size: cover; background-repeat:no-repeat;' : '';

	$button_icon_out = ($button_icon!='') ? '<i class="'.$button_icon.'"></i>' : '';

	$return = '<div class="tcvpb-image-callout-box '.esc_attr($class).'" style="'.esc_attr($image_out).'">';
	$return .= '<div class=tcvpb-image-callout-box-wrapper>';
	$return .= '<span class="tcvpb-image-callout-box-title">'.wp_kses($title, ABdev_allowed_tags()).'</span>';
	if(do_shortcode($content)!=''){
		$return .= do_shortcode($content);
	}

	$return .= '<a href="'. esc_url($button_url) .'" target="' . esc_attr($button_target) . '" class="'.esc_attr($button_class_out).'">'.$button_text.$button_icon_out.'</a>';

	$return .= '</div>';
	$return .= '</div>';


	return $return;
}



