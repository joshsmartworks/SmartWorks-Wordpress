<?php

/*********** Shortcode: Metro Box ************************************************************/

$tcvpb_elements['metro_box_tc'] = array(
	'name' => esc_html__('Metro Box', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-metro-box',
	'category' => esc_html__('Content', 'ABdev_incomeup' ),
	'attributes' => array(
		'title' => array(
			'description' => esc_html__('Title', 'ABdev_incomeup'),
		),
		'short_description' => array(
			'description' => esc_html__('Short description', 'ABdev_incomeup'),
			'info' => esc_html__('This will go on the front of the metro box', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
		),
		'icon_color' => array(
			'description' => esc_html__('Icon Color', 'ABdev_incomeup'),
			'type' => 'color',
		),
		'box_color' => array(
			'description' => esc_html__('Box Color', 'ABdev_incomeup'),
			'type' => 'coloralpha',
		),
		'border' => array(
			'description' => esc_html__( 'Border', 'ABdev_incomeup' ),
			'default' => '0',
			'type' => 'checkbox',
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
		'description' => esc_html__('Back Content', 'ABdev_incomeup'),
	),
);
function tcvpb_metro_box_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('metro_box_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$box_color = ($box_color!='') ? 'background:'.esc_attr($box_color).';' : '';
	$border = ($border) ? 'border: 1px solid #e9eaec; border-radius:8px;' : '';

	$return = '
		<div class="tcvpb_metro_box '.esc_attr($class).'" style="'.esc_attr($box_color).' '.esc_attr($border).'">
			<div class="tcvpb_metro_box_header">';

			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="tcvpb_icon_boxed"><i class="'.esc_attr($icon).'" style="color:'.esc_attr($icon_color).'; background:transparent;"></i></a>' : '<div class="tcvpb_icon_boxed"><i class="'.esc_attr($icon).'" style="color:'.esc_attr($icon_color).'; background:transparent;"></i></div>';
			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'"><h3>'.$title.'</h3></a>' : '<h3>'.$title.'</h3>';

			$return .= '</div>
			'.do_shortcode($content).'
		</div>';

	return $return;
}

