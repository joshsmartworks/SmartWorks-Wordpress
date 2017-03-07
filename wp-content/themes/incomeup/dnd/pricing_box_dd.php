<?php

/*********** Shortcode: Price Box ************************************************************/

$ABdevDND_shortcodes['pricing_box_dd'] = array(
	'child' => 'pricing_feature_dd',
	'child_title' => __('Pricing Feature', 'dnd-shortcodes'),
	'child_button' => __('Add Pricing Feature', 'dnd-shortcodes'),
	'attributes' => array(
		'name' => array(
			'description' => __('Name', 'dnd-shortcodes'),
		),
		'decsription' => array(
			'description' => __('Decsription', 'dnd-shortcodes'),
		),
		'featured' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => __('Is Featured?', 'dnd-shortcodes'),
		),
		'featured_text' => array(
			'description' => __('Featured Info', 'dnd-shortcodes'),
		),
		'price' => array(
			'description' => __('Price', 'dnd-shortcodes'),
		),
		'currency' => array(
			'description' => __('Currency Sign', 'dnd-shortcodes'),
		),
		'monthly' => array(
			'description' => __('Monthly Text', 'dnd-shortcodes'),
		),
		'style' => array(
			'default' => '1',
			'type' => 'select',
			'values' => array(
				'1' => __('Style 1', 'dnd-shortcodes'),
				'2' => __('Style 2', 'dnd-shortcodes'),
				'3' => __('Style 3', 'dnd-shortcodes'),
				'4' => __('Style 4', 'dnd-shortcodes'),
				'5' => __('Style 5', 'dnd-shortcodes'),
			),
			'description' => __('Style', 'dnd-shortcodes'),
		),
		'header_color' => array(
			'description' => __( 'Header Color', 'dnd-shortcodes' ),
			'default' => 'dark',
			'type' => 'select',
			'values' => array(
				'light' =>  __( 'Light', 'dnd-shortcodes' ),
				'dark' =>  __( 'Dark', 'dnd-shortcodes' ),
				'yellow' =>  __( 'Yellow', 'dnd-shortcodes' ),
				'green' =>  __( 'Green', 'dnd-shortcodes' ),
				'red' =>  __( 'Red', 'dnd-shortcodes' ),
				'blue' =>  __( 'Blue', 'dnd-shortcodes' ),
				'gray' =>  __( 'Gray', 'dnd-shortcodes' ),
				'cyan' =>  __( 'Cyan', 'dnd-shortcodes' ),
				'aquamarine' =>  __( 'Aquamarine', 'dnd-shortcodes' ),
			),
		),
		'icon' => array(
			'description' => __('Icon Name', 'dnd-shortcodes'),
		),
		'button_text' => array(
			'description' => __( 'Button Text', 'dnd-shortcodes' ),
		),
		'button_size' => array(
			'description' => __( 'Size', 'dnd-shortcodes' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  __( 'Small', 'dnd-shortcodes' ),
				'medium' => __( 'Medium', 'dnd-shortcodes' ),
				'large' => __( 'Large', 'dnd-shortcodes' ),
				'xlarge' => __( 'Extra Large', 'dnd-shortcodes' ),
			),
		),
		'button_color' => array(
			'description' => __( 'Color', 'dnd-shortcodes' ),
			'default' => 'light',
			'type' => 'select',
			'values' => array(
				'light' =>  __( 'Light', 'dnd-shortcodes' ),
				'dark' =>  __( 'Dark', 'dnd-shortcodes' ),
				'yellow' =>  __( 'Yellow', 'dnd-shortcodes' ),
				'green' =>  __( 'Green', 'dnd-shortcodes' ),
				'red' =>  __( 'Red', 'dnd-shortcodes' ),
				'blue' =>  __( 'Blue', 'dnd-shortcodes' ),
				'gray' =>  __( 'Gray', 'dnd-shortcodes' ),
				'cyan' =>  __( 'Cyan', 'dnd-shortcodes' ),
				'aquamarine' =>  __( 'Aquamarine', 'dnd-shortcodes' ),
			),
		),
		'button_style' => array(
			'description' => __( 'Style', 'dnd-shortcodes' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  __( 'Normal', 'dnd-shortcodes' ),
				'rounded' =>  __( 'Rounded', 'dnd-shortcodes' ),
			),
		),
		'button_url' => array(
			'description' => __( 'URL', 'dnd-shortcodes' ),
		),
		'button_target' => array(
			'description' => __( 'Target', 'dnd-shortcodes' ),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  __( 'Self', 'dnd-shortcodes' ),
				'_blank' => __( 'Blank', 'dnd-shortcodes' ),
			),
		),
		'button_icon' => array(
			'description' => __('Button Icon Name', 'dnd-shortcodes'),
			'info' => __('Optional icon after button text', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Pricing Box', 'dnd-shortcodes' )
);
function ABdevDND_pricing_box_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('pricing_box_dd'), $attributes));
	$featured_output=($featured=='1')?' dnd_popular-plan':'';
	$icon_output=($icon!='')?'<div class="dnd_pricebox_icon"><i class="'.esc_attr($icon).'"></i></div>':'';
	$decsription_output=($decsription!='')?'<span class="dnd_pricebox_decsription">'.$decsription.'</span>':'';
	$featured_text_output=($featured_text!='')?'<div class="dnd_pricebox_featured_text">'.$featured_text.'</div>':'';

	$button_out='';
	if($button_text != ''){
		$class_out = 'dnd-button';
		$class_out .= ' dnd-button_'.$button_color;
		$class_out .= ' dnd-button_'.$button_style;
		$class_out .= ' dnd-button_'.$button_size;
		$icon_out = ($button_icon!='') ? '<i class="'.esc_attr($button_icon).'"></i>' : '';
		$button_out = '<div class="dnd_pricebox_feature dnd_pricebox_feature_button"><a href="'. esc_url($button_url) .'" target="' . esc_attr($button_target) . '" class="'.esc_attr($class_out).'">' . $button_text . $icon_out . '</a></div>';
	}

	static $count_priceboxes;
	$count_priceboxes++;
	return '
	<div class="dnd_pricing-table-'.esc_attr($style).' dnd_pricing-table-'.esc_attr($header_color).' '.esc_attr($featured_output).' '.esc_attr($class).'">
		<div class="dnd_plan dnd_plan'.esc_attr($count_priceboxes).esc_attr($featured_output).'">
			'.$featured_text_output.'
			<div class="dnd_pricebox_header">
				'.$icon_output.'
				<span class="dnd_pricebox_name">'.$name.'</span>
				<div class="dnd_pricebox_info">
					<span class="dnd_pricebox_currency">'.$currency.'</span>
					<span class="dnd_pricebox_price">'.$price.'</span>
					<span class="dnd_pricebox_monthly">'.$monthly.'</span>
				</div>
				'.$decsription_output.'
			</div>
			'.do_shortcode($content).'
			'.$button_out.'
		</div>
	</div>';
}

$ABdevDND_shortcodes['pricing_feature_dd'] = array(
	'hidden' => '1',
	'attributes' => array(
		'name' => array(
			'description' => __('Feature Name', 'dnd-shortcodes'),
		),
		'value' => array(
			'description' => __('Value', 'dnd-shortcodes'),
		),
		'yes' => array(
			'type' => 'checkbox',
			'default' => '0',
			'description' => __('Avaliable', 'dnd-shortcodes'),
		),
		'no' => array(
			'type' => 'checkbox',
			'default' => '0',
			'description' => __('Not Avaliable', 'dnd-shortcodes'),
		),
	),
	'description' => __('Pricing Feature', 'dnd-shortcodes' )
);
function ABdevDND_pricing_feature_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('pricing_feature_dd'), $attributes));
	$yes_output = ($yes=='1')?'<i class="ci_icon-ok"></i>':'';
	$no_output = ($no=='1')?'<i class="ci_icon-remove"></i>':'';
	return '<span class="dnd_pricebox_feature dnd_tooltip" data-gravity="s" original-title="'.$name.'">'.$yes_output.$no_output.'<strong>'.$value.'</strong> '.$name.'</span>';
}



