<?php

/*********** Shortcode: Date ************************************************************/

$tcvpb_elements['date_tc'] = array(
	'name' => __('Date', 'ABdev_incomeup' ),
	'type' => 'inline',
	'attributes' => array(
		'format' => array(
			'default' => 'd.m.Y',
			'description' => __('PHP Date Format', 'ABdev_incomeup'),
		),
		'target' => array(
			'description' => __('Target Date', 'ABdev_incomeup'),
			'info' => __('PHP strtotime acceptable string, e.g. yesterday, last Monday, 2 days ago...', 'ABdev_incomeup'),
		),
	)
);
function tcvpb_date_tc_shortcode($attributes, $content = null){
	extract(shortcode_atts(tcvpb_extract_attributes('date_tc'), $attributes));

	if($target=='')
		return date($format);
	else
		return date($format,strtotime($target));
}
