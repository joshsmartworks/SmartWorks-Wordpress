<?php

/*********** Shortcode: Content Divider ************************************************************/

$tcvpb_elements['divider_tc'] = array(
	'name' => esc_html__('Content Divider', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-divider',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'attributes' => array(
		'style' => array(
			'default' => 'style1',
			'description' => esc_html__('Divider Style', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'solid' => 'Solid Line',
				'dashed' => 'Dashed Line',
				'dotted' => 'Dotted Line',
			),
		),
		'text' => array(
			'description' => esc_html__('Text', 'ABdev_incomeup'),
			'info' => esc_html__('e.g. Go to top', 'ABdev_incomeup'),
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'animation' => array(
			'default' => '',
			'description' => esc_html__('Entrance Animation', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'' => esc_html__('None', 'ABdev_incomeup'),
				'flip' => esc_html__('Flip', 'ABdev_incomeup'),
				'flipInX' => esc_html__('Flip In X', 'ABdev_incomeup'),
				'flipInY' => esc_html__('Flip In Y', 'ABdev_incomeup'),
				'fadeIn' => esc_html__('Fade In', 'ABdev_incomeup'),
				'fadeInUp' => esc_html__('Fade In Up', 'ABdev_incomeup'),
				'fadeInDown' => esc_html__('Fade In Down', 'ABdev_incomeup'),
				'fadeInLeft' => esc_html__('Fade In Left', 'ABdev_incomeup'),
				'fadeInRight' => esc_html__('Fade In Right', 'ABdev_incomeup'),
				'fadeInUpBig' => esc_html__('Fade In Up Big', 'ABdev_incomeup'),
				'fadeInDownBig' => esc_html__('Fade In Down Big', 'ABdev_incomeup'),
				'fadeInLeftBig' => esc_html__('Fade In Left Big', 'ABdev_incomeup'),
				'fadeInRightBig' => esc_html__('Fade In Right Big', 'ABdev_incomeup'),
				'slideInLeft' => esc_html__('Slide In Left', 'ABdev_incomeup'),
				'slideInRight' => esc_html__('Slide In Right', 'ABdev_incomeup'),
				'bounceIn' => esc_html__('Bounce In', 'ABdev_incomeup'),
				'bounceInDown' => esc_html__('Bounce In Down', 'ABdev_incomeup'),
				'bounceInUp' => esc_html__('Bounce In Up', 'ABdev_incomeup'),
				'bounceInLeft' => esc_html__('Bounce In Left', 'ABdev_incomeup'),
				'bounceInRight' => esc_html__('Bounce In Right', 'ABdev_incomeup'),
				'rotateIn' => esc_html__('Rotate In', 'ABdev_incomeup'),
				'rotateInDownLeft' => esc_html__('Rotate In Down Left', 'ABdev_incomeup'),
				'rotateInDownRight' => esc_html__('Rotate In Down Right', 'ABdev_incomeup'),
				'rotateInUpLeft' => esc_html__('Rotate In Up Left', 'ABdev_incomeup'),
				'rotateInUpRight' => esc_html__('Rotate In Up Right', 'ABdev_incomeup'),
				'lightSpeedIn' => esc_html__('Light Speed In', 'ABdev_incomeup'),
				'rollIn' => esc_html__('Roll In', 'ABdev_incomeup'),
				'flash' => esc_html__('Flash', 'ABdev_incomeup'),
				'bounce' => esc_html__('Bounce', 'ABdev_incomeup'),
				'shake' => esc_html__('Shake', 'ABdev_incomeup'),
				'tada' => esc_html__('Tada', 'ABdev_incomeup'),
				'swing' => esc_html__('Swing', 'ABdev_incomeup'),
				'wobble' => esc_html__('Wobble', 'ABdev_incomeup'),
				'pulse' => esc_html__('Pulse', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
		),
		'duration' => array(
			'description' => esc_html__('Animation Duration (ms)', 'ABdev_incomeup'),
			'default' => '1100',
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
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
function tcvpb_divider_tc_shortcode( $attributes ) {
    extract(shortcode_atts(tcvpb_extract_attributes('divider_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$icon_output = ($icon != '')?' <i class="'.$icon.'"></i>':'';
	$divider_style = ($style != '') ? 'tcvpb_divider_'.$style.'' : '';

	$animation_class = $animation_animation = $animation_duration = '';
	if (!empty($animation) && $animation!=''){
		$animation_class = ' tcvpb-animo';
		$animation_animation = ' data-animation="'.esc_attr($animation).'"';
		$animation_duration = ($duration!='') ? ' data-duration="'.esc_attr($duration).'"' : ' data-duration="1"';
	}

	return '<div '.esc_attr($id_out).' class="tcvpb_divider '.esc_attr($divider_style).' '.esc_attr($class).'"><a href="#" class="backtotop'.esc_attr($animation_class).'"'.$animation_animation.$animation_duration.'>'.$text.$icon_output.'</a></div>';
}
