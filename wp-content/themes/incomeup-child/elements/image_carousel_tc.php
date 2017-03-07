<?php

/*********** Shortcode: Image Carousel ************************************************************/

$tcvpb_elements['carousels_tc'] = array(
	'name' => esc_html__('Image Carousel', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-image-carousel',
	'category' => esc_html__('Media', 'ABdev_incomeup' ),
	'child' => 'carousel_tc',
	'child_button' => esc_html__('New Image', 'ABdev_incomeup'),
	'child_title' => esc_html__('Image', 'ABdev_incomeup'),
	'attributes' => array(
		'dummy' => array(
			'type' => 'hidden',
		),
		'number' => array(
			'description'	=> esc_html__('Number of items to scroll', 'ABdev_incomeup'),
			'default' => '6',
			'info' 			=> esc_html__('The best result is obtained if you choose the number of images that fit the full width of the container. Default is 6', 'ABdev_incomeup'),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'autoplay' => array(
			'description' 	=> esc_html__('Autoplay', 'ABdev_incomeup'),
			'info' 			=> esc_html__('Check if you want the carousel to autoplay', 'ABdev_incomeup'),
			'default' => '0',
			'type' => 'checkbox',
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'autoplay_effect' => array(
			'description' 	=> esc_html__('Autoplay Effect', 'ABdev_incomeup'),
			'default' => 'scroll',
			'type' => 'select',
			'values' => array(
				'scroll' =>  esc_html__( 'Scroll', 'ABdev_incomeup' ),
				'directscroll' =>  esc_html__( 'Directscroll', 'ABdev_incomeup' ),
				'fade' =>  esc_html__( 'Fade', 'ABdev_incomeup' ),
				'crossfade' =>  esc_html__( 'Crossfade', 'ABdev_incomeup' ),
				'cover' =>  esc_html__( 'Cover', 'ABdev_incomeup' ),
				'cover-fade' =>  esc_html__( 'Cover-fade', 'ABdev_incomeup' ),
				'uncover' =>  esc_html__( 'Uncover', 'ABdev_incomeup' ),
				'uncover-fade' =>  esc_html__( 'Uncover-fade', 'ABdev_incomeup' ),
				'none' =>  esc_html__( 'None', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'easing' => array(
			'description' 	=> esc_html__('Easing', 'ABdev_incomeup'),
			'default' => 'linear',
			'type' => 'select',
			'values' => array(
				'linear' =>  esc_html__( 'Linear', 'ABdev_incomeup' ),
				'swing' =>  esc_html__( 'Swing', 'ABdev_incomeup' ),
				'quadratic' =>  esc_html__( 'Quadratic', 'ABdev_incomeup' ),
				'cubic' =>  esc_html__( 'Cubic', 'ABdev_incomeup' ),
				'elastic' =>  esc_html__( 'Elastic', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'duration' => array(
			'description'	=> esc_html__('Duration', 'ABdev_incomeup'),
			'info' 			=> esc_html__('Duration in ms. Default: 800 ms', 'ABdev_incomeup'),
			'default' => '800',
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'navigation' => array(
			'description' 	=> esc_html__('Show Navigation', 'ABdev_incomeup'),
			'default' => '0',
			'type' => 'checkbox',
			'tab' => esc_html__('Navigation', 'ABdev_incomeup'),
		),
		'navigation_icon_left' => array(
			'description' 	=> esc_html__('Navigation Icon Left', 'ABdev_incomeup'),
			'type' => 'icon',
			'tab' => esc_html__('Navigation', 'ABdev_incomeup'),
		),
		'navigation_icon_right' => array(
			'description' 	=> esc_html__('Navigation Icon Right', 'ABdev_incomeup'),
			'type' => 'icon',
			'tab' => esc_html__('Navigation', 'ABdev_incomeup'),
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


function tcvpb_carousels_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('carousels_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$classes[] = 'tcvpb-carousel';
	$classes[] = $class;
	$classes_out = implode(' ', $classes);

	$nav = '';
	if($navigation == 1){
		$nav = '<div class="carousel_navigation"><a href="#" class="carousel_prev"><i class="'.esc_attr($navigation_icon_left).'"></i></a><a href="#" class="carousel_next"><i class="'.esc_attr($navigation_icon_right).'"></i></a></div>';
	}

	return '<div '.esc_attr($id_out).' class="'.$classes_out.'" data-autoplay="'.esc_attr($autoplay).'" data-items="'.esc_attr($number).'" data-effect="'.esc_attr($autoplay_effect).'" data-easing="'.esc_attr($easing).'" data-duration="'.esc_attr($duration).'"><ul class="clearfix">'.  do_shortcode($content)  . '</ul>'.$nav.'</div>';
}

$tcvpb_elements['carousel_tc'] = array(
	'name' => esc_html__('Single image section', 'ABdev_incomeup' ),
	'hidden' => '1',
	'type' => 'child',
	'icon' => 'pi-customize',
	'attributes' => array(
		'url' => array(
			'type' => 'image',
			'description' => esc_html__('Select Image', 'ABdev_incomeup'),
		),
		'link' => array(
			'description' => esc_html__('Link', 'ABdev_incomeup'),
			'default' => '',
		),
		'alt' => array(
			'description' => esc_html__('Image alt text', 'ABdev_incomeup'),
		),
	),
);
function tcvpb_carousel_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('carousel_tc'), $attributes));

	$out = '<li>'.( ($link!='')?'<a href="'.esc_url($link).'">':'').'<img src="'.esc_url($url).'" alt="'.esc_attr($alt).'">'.(($link!='')?'</a>':'').'</li>';

	$return = ''.$out.'';

	return $return;
}


