<?php

/*********** Shortcode: Timeline ************************************************************/

$tcvpb_elements['timeline_tc'] = array(
	'name' => esc_html__('Timeline', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-tab',
	'category' =>  esc_html__('Content', 'ABdev_incomeup'),
	'child' => 'tl_time_tc',
	'child_button' => esc_html__('New Timeline', 'ABdev_incomeup'),
	'child_title' => esc_html__('Timeline', 'ABdev_incomeup'),
	'attributes' => array(
		'tabs_position' => array(
			'default' => 'top',
			'description' => esc_html__('Titles Position', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'top' => esc_html__('Top', 'ABdev_incomeup'),
				'bottom' => esc_html__('Bottom', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Style', 'ABdev_incomeup'),
		),
		'effect' => array(
			'default' => '',
			'description' => esc_html__('Transition Effect', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'' => esc_html__('None', 'ABdev_incomeup'),
				'slide' => esc_html__('Slide', 'ABdev_incomeup'),
				'fade' => esc_html__('Fade', 'ABdev_incomeup'),
			),
			'tab' => esc_html__('Style', 'ABdev_incomeup'),
		),
		'selected' => array(
			'description' => esc_html__('Selected Tab', 'ABdev_incomeup'),
			'info' => esc_html__('Initially selected tab, order number', 'ABdev_incomeup'),
			'default' => '1',
		),
		'break_point' => array(
			'description' => esc_html__('Break Point', 'ABdev_incomeup'),
			'info' => esc_html__('Width in px. Below this width timeline will be stacked on each other.', 'ABdev_incomeup'),
			'tab' => esc_html__('Break Point', 'ABdev_incomeup'),
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
	)
);
function tcvpb_timeline_tc_shortcode( $attributes, $content = null ) {
	global $tabs_navigation,$tabs_content,$tabs_counter,$tabs_selected;
	extract(shortcode_atts(tcvpb_extract_attributes('timeline_tc'), $attributes));
	static $i = 0;
    $i++;

    $tabs_counter = $i;

    $tabs_selected = $selected;

	$id_out = ($id!='') ? 'id='.$id.'' : '';

	do_shortcode($content);

	$slide_direction = ( $tabs_position == 'top' || $tabs_position == 'bottom' ) ? 'horizontal' : 'vertical';

	$return = '
		<div '.esc_attr($id_out).' class="tcvpb-tabs tcvpb-tabs-'.esc_attr($slide_direction).' tcvpb-tabs-position-'.esc_attr($tabs_position).' tcvpb-tabs-timeline '.esc_attr($class).'" data-selected="'.esc_attr($selected).'" role="tabpane'.$i.'" data-break_point="'.esc_attr($break_point).'" data-effect="'.esc_attr($effect).'">
			<ul class="nav nav-tabs tab-helper-reset tab-helper-clearfix" role="tablist">
				'.$tabs_navigation.'
			</ul>
			<div class="tab-content">
			'.$tabs_content.'
			</div>
		</div>';

	$tabs_navigation = $tabs_content = '';

	return $return;
}


$tcvpb_elements['tl_time_tc'] = array(
	'name' => esc_html__('Timeline Time', 'ABdev_incomeup' ),
	'type' => 'child',
	'attributes' => array(
		'title' => array(
			'description' => esc_html__('Timeline Title', 'ABdev_incomeup'),
		),
		'icon' => array(
			'type' => 'icon',
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
		),
	),
	'content' => array(
		'description' => esc_html__('Timeline Content', 'ABdev_incomeup'),
	)
);
function tcvpb_tl_time_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('tl_time_tc'), $attributes));

	static $tab_count = 0;
	static $tabs_counter_static=0;
	global $tabs_navigation,$tabs_content,$tabs_counter,$tabs_selected;

	$active_class = false;
	if($tabs_counter!=$tabs_counter_static){
		$tabs_counter_static = $tabs_counter;
		$tab_count = 0;
	}
    $tab_count++;
	if($tabs_selected==$tab_count){
		$active_class = true;
	}

	$icon_output = ( $icon!='' ) ? '<i class="'.esc_attr($icon).' tab-icon"></i> ' : '';

	$tabs_navigation.='<li role="presentation"'.(($active_class)?' class="active"':'').'><a class="tcvpb-tabs-tab" data-href="#timeline-'.$tabs_counter.'-'.$tab_count.'" aria-controls="tab-'.$tabs_counter.'-'.$tab_count.'" role="tab" data-toggle="tab">'.$icon_output . $title . '</a></li>';
	$tabs_content.='
		<div id="timeline-'.$tabs_counter.'-'.$tab_count.'" class="tab-pane'.(($active_class)?' active_pane':'').'" role="tabpanel">
			<p>' . do_shortcode($content) . '</p>
		</div>';

	$return = '';
	return $return;
}
