<?php

/*********** Shortcode: Image ************************************************************/

$tcvpb_elements['image_tc'] = array(
	'name' => esc_html__('Image', 'ABdev_incomeup' ),
	'type' =>  'block',
	'icon' => 'pi-image',
	'category' =>  esc_html__('Media', 'ABdev_incomeup'),
	'attributes' => array(
		'url' => array(
			'type' => 'image',
			'description' => esc_html__('Select Image', 'ABdev_incomeup'),
			'divider' => 'true',
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
		'timing' => array(
			'default' => 'linear',
			'description' => esc_html__('Timing Function', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'linear' => esc_html__('Linear', 'ABdev_incomeup'),
				'ease' => esc_html__('Ease', 'ABdev_incomeup'),
				'ease-in' => esc_html__('Ease-in', 'ABdev_incomeup'),
				'ease-out' => esc_html__('Ease-out', 'ABdev_incomeup'),
				'ease-in-out' => esc_html__('Ease-in-out', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
		),
		'trigger_pt' => array(
			'description' => esc_html__('Trigger Point (in px)', 'ABdev_incomeup'),
			'info' => esc_html__('Amount of pixels from bottom to start animation', 'ABdev_incomeup'),
			'default' => '0',
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
		),
		'duration' => array(
			'description' => esc_html__('Animation Duration (in ms)', 'ABdev_incomeup'),
			'default' => '1000',
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
		),
		'delay' => array(
			'description' => esc_html__('Animation Delay (in ms)', 'ABdev_incomeup'),
			'default' => '0',
			'tab' => esc_html__('Animation', 'ABdev_incomeup'),
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
			'divider' => 'true',
		),
		'lightbox' => array(
			'description' => esc_html__( 'Lightbox', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'lightbox_icon' => array(
			'description' => esc_html__( 'Lightbox Icon', 'ABdev_incomeup' ),
			'info' => esc_html__('Choose Lightbox Icon that will be shown on hover', 'ABdev_incomeup'),
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
	),
);
function tcvpb_image_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('image_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$classes=array();
	$animation_out='';

	if($animation!=''){
		$classes[] = 'tcvpb-animo';
		$duration = ($duration!='') ? $duration : '1000';
		$animation_out = 'data-animation="'.esc_attr($animation).'" data-trigger_pt="'.esc_attr($trigger_pt).'" data-duration="'.esc_attr($duration).'" data-delay="'.esc_attr($delay).'"';
	}

	if($class!=''){
		$classes[] = $class;
	}

	$classes = implode(' ', $classes);

	$lightbox_icon = ($lightbox_icon!='') ? '<i class="'.esc_attr($lightbox_icon).'"></i>' : '';


	$return = '<div '.esc_attr($id_out).' class="tcvpb-image '.esc_attr($classes).'" '.$animation_out.'>';

	if($lightbox == '1') {
		$return .= '<a href="'.esc_url($url).'" class="lightbox" data-lightbox="image"><img src="'.esc_url($url).'">
			<canvas class="grey-effect"></canvas>
			'.$lightbox_icon.'
		</a>';
	}
	else if($link != '') {
		$return .= '<a href="'.esc_url($link).'" target="'.esc_attr($target).'"><img src="'.esc_url($url).'"></a>';
			// $return .= ($overlay_text !='') ? '<canvas class="grey-effect"></canvas><span>'.$overlay_text.'</span>' :'';
		// $return .= '</a>';
	}
	else{
		$return .= '<img src="'.esc_url($url).'">';
	}

	$return .= '</div>';

	return $return;
}
