<?php

/*********** Shortcode: Price Box ************************************************************/

$tcvpb_elements['pricing_box_tc'] = array(
	'name' => esc_html__('Pricing box', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-pricing-box',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'child' => 'pricing_feature_tc',
	'child_title' => esc_html__('Pricing Feature', 'ABdev_incomeup'),
	'child_button' => esc_html__('Add Pricing Feature', 'ABdev_incomeup'),
	'attributes' => array(
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'name' => array(
			'description' => esc_html__('Name', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'price' => array(
			'description' => esc_html__('Price', 'ABdev_incomeup'),
		),
		'currency' => array(
			'description' => esc_html__('Currency Sign', 'ABdev_incomeup'),
		),
		'monthly' => array(
			'description' => esc_html__('Monthly Text', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'description' => array(
			'description' => esc_html__('Description', 'ABdev_incomeup'),
		),
		'style' => array(
			'default' => '1',
			'type' => 'select',
			'values' => array(
				'1' => esc_html__('Style 1', 'ABdev_incomeup'),
				'2' => esc_html__('Style 2', 'ABdev_incomeup'),
				'3' => esc_html__('Style 3', 'ABdev_incomeup'),
				'4' => esc_html__('Style 4', 'ABdev_incomeup'),
				'5' => esc_html__('Style 5', 'ABdev_incomeup'),
			),
			'description' => esc_html__('Style', 'ABdev_incomeup'),
			'tab' => esc_html__('Style', 'ABdev_incomeup'),
		),
		'header_color' => array(
			'description' => esc_html__( 'Header Color', 'ABdev_incomeup' ),
			'default' => 'dark',
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
		'featured' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Is Featured?', 'ABdev_incomeup'),
			'tab' => esc_html__('Featured', 'ABdev_incomeup'),
		),
		'featured_text' => array(
			'description' => esc_html__('Featured Info', 'ABdev_incomeup'),
			'tab' => esc_html__('Featured', 'ABdev_incomeup'),
		),
		'button_text' => array(
			'description' => esc_html__( 'Button Text', 'ABdev_incomeup' ),
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
		),
		'button_size' => array(
			'description' => esc_html__( 'Size', 'ABdev_incomeup' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  esc_html__( 'Small', 'ABdev_incomeup' ),
				'medium' => esc_html__( 'Medium', 'ABdev_incomeup' ),
				'large' => esc_html__( 'Large', 'ABdev_incomeup' ),
				'xlarge' => esc_html__( 'Extra Large', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
		),
		'button_color' => array(
			'description' => esc_html__( 'Color', 'ABdev_incomeup' ),
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
		'button_style' => array(
			'description' => esc_html__( 'Style', 'ABdev_incomeup' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  esc_html__( 'Normal', 'ABdev_incomeup' ),
				'rounded' =>  esc_html__( 'Rounded', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
		),
		'button_url' => array(
			'description' => esc_html__( 'URL', 'ABdev_incomeup' ),
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
		),
		'button_target' => array(
			'description' => esc_html__( 'Target', 'ABdev_incomeup' ),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  esc_html__( 'Self', 'ABdev_incomeup' ),
				'_blank' => esc_html__( 'Blank', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
		),
		'button_icon' => array(
			'description' => esc_html__('Button Icon', 'ABdev_incomeup'),
			'info' => esc_html__('Optional icon after button text', 'ABdev_incomeup'),
			'type' => 'icon',
			'tab' => esc_html__('Button', 'ABdev_incomeup'),
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
function tcvpb_pricing_box_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('pricing_box_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$featured_output=($featured=='1')?' tcvpb_popular-plan':'';
	$icon_output=($icon!='')?'<div class="tcvpb_pricebox_icon"><i class="'.esc_attr($icon).'"></i></div>':'';
	$description_output=($description!='')?'<span class="tcvpb_pricebox_description">'.$description.'</span>':'';
	$featured_text_output=($featured_text!='')?'<div class="tcvpb_pricebox_featured_text">'.$featured_text.'</div>':'';

	$button_out='';
	if($button_text != ''){
		$class_out = 'tcvpb-button';
		$class_out .= ' tcvpb-button_'.$button_color;
		$class_out .= ' tcvpb-button_'.$button_style;
		$class_out .= ' tcvpb-button_'.$button_size;
		$icon_out = ($button_icon!='') ? '<i class="'.esc_attr($button_icon).'"></i>' : '';
		$button_out = '<div class="tcvpb_pricebox_feature tcvpb_pricebox_feature_button"><a href="'. esc_url($button_url) .'" target="' . esc_attr($button_target) . '" class="'.esc_attr($class_out).'">' . $button_text . $icon_out . '</a></div>';
	}

	static $count_priceboxes;
	$count_priceboxes++;
	return '
	<div class="tcvpb_pricing-table-'.esc_attr($style).' tcvpb_pricing-table-'.esc_attr($header_color).' '.esc_attr($featured_output).' '.esc_attr($class).'">
		<div class="tcvpb_plan tcvpb_plan'.esc_attr($count_priceboxes).esc_attr($featured_output).'">
			'.$featured_text_output.'
			<div class="tcvpb_pricebox_header">
				'.$icon_output.'
				<span class="tcvpb_pricebox_name">'.$name.'</span>
				<div class="tcvpb_pricebox_info">
					<span class="tcvpb_pricebox_currency">'.$currency.'</span>
					<span class="tcvpb_pricebox_price">'.$price.'</span>
					<span class="tcvpb_pricebox_monthly">'.$monthly.'</span>
				</div>
				'.$description_output.'
			</div>
			'.do_shortcode($content).'
			'.$button_out.'
		</div>
	</div>';
}

$tcvpb_elements['pricing_feature_tc'] = array(
	'name' => esc_html__('Pricing feature', 'ABdev_incomeup' ),
	'type' => 'child',
	'attributes' => array(
		'name' => array(
			'description' => esc_html__('Feature Name', 'ABdev_incomeup'),
		),
		'value' => array(
			'description' => esc_html__('Value', 'ABdev_incomeup'),
		),
		'yes' => array(
			'type' => 'icon',
			'description' => esc_html__('Avaliable Icon', 'ABdev_incomeup'),
		),
		'no' => array(
			'type' => 'icon',
			'description' => esc_html__('Not Avaliable Icon', 'ABdev_incomeup'),
		),
	),
);
function tcvpb_pricing_feature_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('pricing_feature_tc'), $attributes));
	$yes_output = ($yes!='')?'<i class="'.esc_attr($yes).'"></i>':'';
	$no_output = ($no!='')?'<i class="'.esc_attr($no).'"></i>':'';
	return '<span class="tcvpb_pricebox_feature">'.$yes_output.$no_output.'<strong>'.esc_attr($value).'</strong> '.esc_attr($name).'</span>';
}