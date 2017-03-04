<?php

/*********** Shortcode: Visible ************************************************************/

$tcvpb_elements['visible_tc'] = array(
	'attributes' => array(
		'devices' => array(
			'default' => 'desktop',
			'type' => 'select',
			'values' => array(
				'desktop' =>  __('Desktop', 'ABdev_incomeup'),
				'tablet' =>  __('Tablet', 'ABdev_incomeup'),
				'phablet' =>  __('Phablet', 'ABdev_incomeup'),
				'phone' =>  __('Phone', 'ABdev_incomeup'),
				'desktab' =>  __('Deskop and Tablet', 'ABdev_incomeup'),
				'phabphone' =>  __('Phabplet and Phone', 'ABdev_incomeup'),
			),
			'description' => __('Visible on devices', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => __('Content', 'ABdev_incomeup'),
	),
	'description' => __('Visible Only on Devices', 'ABdev_incomeup'),
	'info' => __('This shortcode will make content visible only on selected devices, using @media css method', 'ABdev_incomeup' )
);
function tcvpb_visible_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('visible_tc'), $attributes));

	$classes='';
	if($devices=='desktop')    $classes = 'visible-desktop';
	if($devices=='tablet')     $classes = 'visible-tablet';
	if($devices=='phablet')    $classes = 'visible-phablet';
	if($devices=='phone')      $classes = 'visible-phone';
	if($devices=='desktab')    $classes = 'visible-desktab';
	if($devices=='phabphone')  $classes = 'visible-phabphone';

    return '<div class="'.$classes.'">'.do_shortcode($content).'</div>';
}
