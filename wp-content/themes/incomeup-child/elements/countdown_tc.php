<?php

/*********** Shortcode: Countdown ************************************************************/

$tcvpb_elements['countdown_tc'] = array(
	'name' => esc_html__('Countdown', 'ABdev_incomeup'),
	'type' => 'block',
	'icon' => 'pi-countdown',
	'category' =>  __('Content', 'ABdev_incomeup'),
	'attributes' => array(
		'style' => array(
			'description' => esc_html__('Style', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'style_1' => esc_html__('Simple', 'ABdev_incomeup'),
				'style_2' => esc_html__('Flip Numbers', 'ABdev_incomeup'),
			),
		),
		'hide_expired_counters' => array(
			'description' => esc_html__('Hide expired counters', 'ABdev_incomeup'),
			'info' => esc_html__("Don't show year, month or day counters if they have expired (e.g. hide year if it is 00)", 'ABdev_incomeup'),
			'type' => 'checkbox',
			'divider' => 'true',
		),
		'year_number' => array(
			'description' => esc_html__('Year', 'ABdev_incomeup'),
			'info' => esc_html__('Enter the year of date to countdown to (e.g. 2015)', 'ABdev_incomeup'),
		),
		'month_number' => array(
			'description' => esc_html__('Month', 'ABdev_incomeup'),
			'info' => esc_html__('Select a month of date to countdown to', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'01' => esc_html__('January', 'ABdev_incomeup'),
				'02' => esc_html__('February', 'ABdev_incomeup'),
				'03' => esc_html__('March', 'ABdev_incomeup'),
				'04' => esc_html__('April', 'ABdev_incomeup'),
				'05' => esc_html__('May', 'ABdev_incomeup'),
				'06' => esc_html__('June', 'ABdev_incomeup'),
				'07' => esc_html__('July', 'ABdev_incomeup'),
				'08' => esc_html__('August', 'ABdev_incomeup'),
				'09' => esc_html__('September', 'ABdev_incomeup'),
				'10' => esc_html__('October', 'ABdev_incomeup'),
				'11' => esc_html__('November', 'ABdev_incomeup'),
				'12' => esc_html__('December', 'ABdev_incomeup'),
				),
		),
		'day_number' => array(
			'description' => esc_html__('Day', 'ABdev_incomeup'),
			'info' => esc_html__('Enter the day of date to countdown to (1-31)', 'ABdev_incomeup'),
		),
		'hour_number' => array(
			'description' => esc_html__('Hours', 'ABdev_incomeup'),
			'info' => esc_html__('Enter the hour of time to countdown to in 24h format (0-24)', 'ABdev_incomeup'),
		),
		'minute_number' => array(
			'description' => esc_html__('Minutes', 'ABdev_incomeup'),
			'info' => esc_html__('Enter the minute of time to countdown to (0-59)', 'ABdev_incomeup'),
		),
		'seconds_number' => array(
			'description' => esc_html__('Seconds', 'ABdev_incomeup'),
			'info' => esc_html__('Enter the second of time to countdown to (0-59)', 'ABdev_incomeup'),
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
function tcvpb_countdown_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('countdown_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$count_down_string = esc_attr($year_number) . "/" . esc_attr($month_number) . "/" . esc_attr($day_number) . " " . esc_attr($hour_number) . ":" . esc_attr($minute_number) . ":" . esc_attr($seconds_number);

	$year_hide = $month_hide = $day_hide = '';
	if($hide_expired_counters==1){
		$year_hide = ($year_number == date('Y')) ? ' hide_expired' : '';
		$month_hide = ($year_number == date('Y') && $month_number == date('m')) ? ' hide_expired' : '';
		$day_hide = ($year_number == date('Y') && $month_number == date('m') && $day_number == date('d')) ? ' hide_expired' : '';
	}

	if($style=='style_1'){
		$return ='<div '.esc_attr($id_out).' class="tcvpb_countdown simple_style '.esc_attr($class).'" data-value="'.esc_attr($count_down_string).'">
			<div class="tcvpb_countdown_inner'.esc_attr($year_hide).'"><div class="simple countdown year"></div><span data-singular="'.esc_html__('Year', 'ABdev_incomeup').'" data-plural="'.esc_html__('Years', 'ABdev_incomeup').'">'.esc_html__('Years', 'ABdev_incomeup').'</span></div>
			<div class="tcvpb_countdown_inner'.esc_attr($month_hide).'"><div class="simple countdown month"></div><span data-singular="'.esc_html__('Month', 'ABdev_incomeup').'" data-plural="'.esc_html__('Months', 'ABdev_incomeup').'">'.esc_html__('Months', 'ABdev_incomeup').'</span></div>
			<div class="tcvpb_countdown_inner'.esc_attr($day_hide).'"><div class="simple countdown day"></div><span data-singular="'.esc_html__('Day', 'ABdev_incomeup').'" data-plural="'.esc_html__('Days', 'ABdev_incomeup').'">'.esc_html__('Days', 'ABdev_incomeup').'</span></div>
			<div class="tcvpb_countdown_inner"><div class="simple countdown hour"></div><span data-singular="'.esc_html__('Hour', 'ABdev_incomeup').'" data-plural="'.esc_html__('Hours', 'ABdev_incomeup').'">'.esc_html__('Hours', 'ABdev_incomeup').'</span></div>
			<div class="tcvpb_countdown_inner"><div class="simple countdown minute"></div><span data-singular="'.esc_html__('Minute', 'ABdev_incomeup').'" data-plural="'.esc_html__('Minutes', 'ABdev_incomeup').'">'.esc_html__('Minutes', 'ABdev_incomeup').'</span></div>
			<div class="tcvpb_countdown_inner"><div class="simple countdown second"></div><span data-singular="'.esc_html__('Second', 'ABdev_incomeup').'" data-plural="'.esc_html__('Seconds', 'ABdev_incomeup').'">'.esc_html__('Seconds', 'ABdev_incomeup').'</span></div>
		</div>';

		return $return;
	} else{
		$return ='<div '.esc_attr($id_out).' class="tcvpb_countdown flip_style '.esc_attr($class).'" data-value="'.esc_attr($count_down_string).'">
					<div class="time flip_element year flip'.esc_attr($year_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Year', 'ABdev_incomeup').'" data-plural="'.esc_html__('Years', 'ABdev_incomeup').'">'.esc_html__('Years', 'ABdev_incomeup').'</span>
					</div>
					<div class="time flip_element month flip'.esc_attr($month_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Month', 'ABdev_incomeup').'" data-plural="'.esc_html__('Months', 'ABdev_incomeup').'">'.esc_html__('Months', 'ABdev_incomeup').'</span>
					</div>
					<div class="time flip_element day flip'.esc_attr($day_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Day', 'ABdev_incomeup').'" data-plural="'.esc_html__('Days', 'ABdev_incomeup').'">'.esc_html__('Days', 'ABdev_incomeup').'</span>
					</div>
					<div class="time flip_element hour flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Hour', 'ABdev_incomeup').'" data-plural="'.esc_html__('Hours', 'ABdev_incomeup').'">'.esc_html__('Hours', 'ABdev_incomeup').'</span>
					</div>
					<div class="time flip_element minute flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Minute', 'ABdev_incomeup').'" data-plural="'.esc_html__('Minutes', 'ABdev_incomeup').'">'.esc_html__('Minutes', 'ABdev_incomeup').'</span>
					</div>
					<div class="time flip_element second flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_html__('Second', 'ABdev_incomeup').'" data-plural="'.esc_html__('Seconds', 'ABdev_incomeup').'">'.esc_html__('Seconds', 'ABdev_incomeup').'</span>
					</div>
				</div>';

		return $return;
	}

}