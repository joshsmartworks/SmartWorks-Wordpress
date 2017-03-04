<?php

/*********** Shortcode: Accordions ************************************************************/

$tcvpb_elements['accordions_tc'] = array(
	'name' => esc_html__('Accordion', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-accordion',
	'category' => esc_html__('Content', 'ABdev_incomeup' ),
	'child' => 'accordion_tc',
	'child_button' => esc_html__('New Accordion', 'ABdev_incomeup'),
	'child_title' => esc_html__('Accordion Section', 'ABdev_incomeup'),
	'attributes' => array(
		'expanded' => array(
			'description' => esc_html__('Expanded accordion no.', 'ABdev_incomeup'),
			'info' => esc_html__('Which accordion section will be expanded on load, 0 for none', 'ABdev_incomeup'),
			'default' => '1',
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
function tcvpb_accordions_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('accordions_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	return '<div '.esc_attr($id_out).' class="tcvpb-accordion '.esc_attr($class).'" data-expanded="'.esc_attr($expanded).'">'.do_shortcode($content).'</div>';
}

$tcvpb_elements['accordion_tc'] = array(
	'name' => esc_html__('Single accordion section', 'ABdev_incomeup' ),
	'type' => 'child',
	'attributes' => array(
		'title' => array(
			'description' => esc_html__('Title', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => esc_html__('Content', 'ABdev_incomeup'),
	),
);
function tcvpb_accordion_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('accordion_tc'), $attributes));
	$return = '
		<h3>' . esc_html($title) . '</h3>
		<div class="tcvpb-accordion-body">
			<p>' . do_shortcode($content) . '</p>
		</div>';

	return $return;
}
