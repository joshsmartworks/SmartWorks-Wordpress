<?php

/*********** Shortcode: Tabs ************************************************************/

$ABdevDND_shortcodes['tabs_dd'] = array(
	'attributes' => array(
		'tabs_position' => array(
			'default' => 'top',
			'description' => __('Tabs Position', 'dnd-shortcodes'),
			'type' => 'select',
			'values' => array(
				'top' => __('Top', 'dnd-shortcodes'),
				'bottom' => __('Bottom', 'dnd-shortcodes'),
				'left' => __('Left', 'dnd-shortcodes'),
				'right' => __('Right', 'dnd-shortcodes'),
			),
		),
		'style' => array(
			'default' => 'boxed',
			'description' => __('Tabs style', 'dnd-shortcodes'),
			'type' => 'select',
			'values' => array(
				'boxed' => __('Boxed', 'dnd-shortcodes'),
				'unboxed' => __('Unboxed', 'dnd-shortcodes'),
				'timeline' => __('Timeline', 'dnd-shortcodes'),
			),
			'info' => __('Timeline tabs have tabs position top or bottom only.', 'dnd-shortcodes'),
		),
		'effect' => array(
			'default' => 'slide',
			'description' => __('Transition Effect', 'dnd-shortcodes'),
			'type' => 'select',
			'values' => array(
				'none' => __('None', 'dnd-shortcodes'),
				'slide' => __('Slide', 'dnd-shortcodes'),
				'fade' => __('Fade', 'dnd-shortcodes'),
			),
		),
		'selected' => array(
			'description' => __('Selected Tab', 'dnd-shortcodes'),
			'info' => __('Initially selected tab, order number', 'dnd-shortcodes'),
			'default' => '1',
		),
		'break_point' => array(
			'description' => __('Break Point', 'dnd-shortcodes'),
			'info' => __('Width in px. Below this width tabs will be stacked on each other.', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'child' => 'tab_dd',
	'child_button' => __('New Tab', 'dnd-shortcodes'),
	'child_title' => __('Tab no.', 'dnd-shortcodes'),
	'description' => __('Tabs', 'dnd-shortcodes' )
);
function ABdevDND_tabs_dd_shortcode( $attributes, $content = null ) {
	global $tabs_navigation,$tabs_content;
	extract(shortcode_atts(ABdevDND_extract_attributes('tabs_dd'), $attributes));

	do_shortcode($content);

	$slide_direction = ( $tabs_position == 'top' || $tabs_position == 'bottom' ) ? 'horizontal' : 'vertical';

	$return = '
		<div class="dnd-tabs dnd-tabs-'.esc_attr($slide_direction).' dnd-tabs-position-'.esc_attr($tabs_position).'  dnd-tabs-'.esc_attr($style).' '.esc_attr($class).'" data-selected="'.esc_attr($selected).'" data-break_point="'.esc_attr($break_point).'" data-effect="'.esc_attr($effect).'">
			<ul class="dnd-tabs-ul">
				'.$tabs_navigation.'
			</ul>
			<div class="dnd-tabs-wrapper">
			'.$tabs_content.'
			</div>
		</div>';

	$tabs_navigation = $tabs_content = '';

	return $return;
}


$ABdevDND_shortcodes['tab_dd'] = array(
	'hidden' => '1',
	'attributes' => array(
		'title' => array(
			'description' => __('Tab Title', 'dnd-shortcodes'),
		),
		'subtitle' => array(
			'description' => __('Timeline Subtitle', 'dnd-shortcodes'),
		),
		'icon' => array(
			'description' => __('Icon Name', 'dnd-shortcodes'),
		),
	),
	'content' => array(
		'description' => __('Tab Content', 'dnd-shortcodes'),
	),
	'description' => __('Single Tab', 'dnd-shortcodes' )
);
function ABdevDND_tab_dd_shortcode( $attributes, $content = null ) {
	static $tab_count = 0;
    $tab_count++;
	global $tabs_count_global,$tabs_navigation,$tabs_content;
	extract(shortcode_atts(ABdevDND_extract_attributes('tab_dd'), $attributes));

	$icon_output = ( $icon!='' ) ? '<i class="'.esc_attr($icon).' tab-icon"></i> ' : '';
	$subtitle_output = ( $subtitle!='' ) ? '<h6 class="timeline_title"> '.$subtitle.'  </h6> ' : '';

	$tabs_navigation.='<li><a href="#tab-' . esc_attr($tab_count) . '">'.$icon_output . $title . '</a></li>';
	$tabs_content.='
		<div id="tab-' . esc_attr($tab_count) . '">
			' . $subtitle_output . '
			' . do_shortcode($content) . '
		</div>';

	$return = '';
	return $return;
}


