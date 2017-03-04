<?php

/*********** Shortcode: Hidden ************************************************************/

$tcvpb_elements['hidden_tc'] = array(
	'name' => esc_html__('Hidden on Devices', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-hidden-on-devices',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'attributes' => array(
		'devices' => array(
			'default' => 'desktop',
			'type' => 'select',
			'values' => array(
				'desktop' =>  esc_html__('Desktop', 'ABdev_incomeup'),
				'tablet' =>  esc_html__('Tablet', 'ABdev_incomeup'),
				'phablet' =>  esc_html__('Phablet', 'ABdev_incomeup'),
				'phone' =>  esc_html__('Phone', 'ABdev_incomeup'),
				'desktab' =>  esc_html__('Deskop and Tablet', 'ABdev_incomeup'),
				'phabphone' =>  esc_html__('Phabplet and Phone', 'ABdev_incomeup'),
			),
			'description' => esc_html__('Hide on Devices', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => esc_html__('Content', 'ABdev_incomeup'),
	),
	'description' => esc_html__('Hidden on devices', 'ABdev_incomeup'),
	'info' => esc_html__('This shortcode will make content hidden on selected devices, using @media css method', 'ABdev_incomeup' )
);
function tcvpb_hidden_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('hidden_tc'), $attributes));

	$classes='';
	if($devices=='desktop')    $classes = 'hidden-desktop';
	if($devices=='tablet')     $classes = 'hidden-tablet';
	if($devices=='phablet')    $classes = 'hidden-phablet';
	if($devices=='phone')      $classes = 'hidden-phone';
	if($devices=='desktab')    $classes = 'hidden-desktab';
	if($devices=='phabphone')  $classes = 'hidden-phabphone';

    return '<div class="'.$classes.'">'.do_shortcode($content).'</div>';
}


