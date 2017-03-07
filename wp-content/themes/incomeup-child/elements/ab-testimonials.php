<?php

/**
	ab-testimonials plugin support
**/
if( in_array('ab-testimonials/ab-testimonials.php', get_option('active_plugins')) ){ //first check if plugin is installed
	$tcvpb_elements['AB_testimonials'] = array(
		'name' => esc_html__('Testimonials Slider', 'ABdev_incomeup' ),
		'description' => esc_html__('Testimonials Slider', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-testimonials',
		'category' =>  esc_html__('Social', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'category' => array(
				'description' => esc_html__('Testimonial Category', 'ABdev_incomeup'),
				'info' => esc_html__('Show only testimonials from specific category, displays all categories if not specified (category slug string)', 'ABdev_incomeup'),
			),
			'count' => array(
				'description' => esc_html__('Count', 'ABdev_incomeup'),
				'info' => esc_html__('Number of testimonials to show', 'ABdev_incomeup'),
				'default' => '8',
			),
			'style' => array(
				'default' => '1',
				'type' => 'select',
				'values' => array(
					'1' => esc_html__('Testimonial Big','ABdev_incomeup'),
					'2' => esc_html__('Testimonial Small with Image','ABdev_incomeup'),
				),
				'description' => esc_html__('Style', 'ABdev_incomeup'),
				'divider' => 'true',
			),
			'show_arrows' => array(
				'description' => esc_html__('Show Arrows', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0',
			),
			'show_pagination' => array(
				'description' => esc_html__('Show Pagination', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0',
				'divider' => 'true',
			),
			'delimiter' => array(
				'description' => esc_html__('Delimiter', 'ABdev_incomeup'),
				'info' => esc_html__('Delimiter between author and company', 'ABdev_incomeup'),
				'default' => '',
			),
			'fx' => array(
				'default' => 'crossfade',
				'type' => 'select',
				'values' => array(
					'crossfade' => esc_html__('Crossfade','ABdev_incomeup'),
					'cover-fade' => esc_html__('Cover-Fade','ABdev_incomeup'),
					'fade' => esc_html__('Fade','ABdev_incomeup'),
					'none' => esc_html__('None','ABdev_incomeup'),
				),
				'description' => esc_html__('Slide Effect Name', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'easing' => array(
				'default' => 'quadratic',
				'type' => 'select',
				'values' => array(
					'linear' => esc_html('linear','ABdev_incomeup'),
					'swing' => esc_html('swing','ABdev_incomeup'),
					'quadratic' => esc_html('quadratic','ABdev_incomeup'),
					'cubic' => esc_html('cubic','ABdev_incomeup'),
					'elastic' => esc_html('elastic','ABdev_incomeup'),
				),
				'description' => esc_html__('Slide Effect Easing', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'duration' => array(
				'description' => esc_html__('Duration', 'ABdev_incomeup'),
				'default' => 1000,
				'info' => esc_html__('Duration of slide effect in milliseconds', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'pauseOnHover' => array(
				'default' => 'immediate',
				'type' => 'select',
				'values' => array(
					'false' => esc_html__('false','ABdev_incomeup'),
					'resume' => esc_html__('resume','ABdev_incomeup'),
					'immediate' => esc_html__('immediate','ABdev_incomeup'),
				),
				'description' => esc_html__('Pause on Hover', 'ABdev_incomeup'),
				'info' => esc_html__('Determines whether the timeout between transitions should be paused onMouseOver (only applies when play=true)', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'timeoutduration' => array(
				'description' => esc_html__('Slide Duration', 'ABdev_incomeup'),
				'default' => 5000,
				'info' => esc_html__('Pause between two slide animations in milliseconds', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'direction' => array(
				'default' => 'left',
				'type' => 'select',
				'values' => array(
					'left' => esc_html__('left','ABdev_incomeup'),
					'right' => esc_html__('right','ABdev_incomeup'),
				),
				'description' => esc_html__('Slide Direction', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'play' => array(
				'description' => esc_html__('Autoplay Slider', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '1',
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'class' => array(
				'description' => esc_html__('Class', 'ABdev_incomeup'),
				'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
				'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
			),

		),
	);

	$tcvpb_elements['AB_testimonials_submit_form'] = array(
		'name' => esc_html__('Testimonials Submit Form', 'ABdev_incomeup' ),
		'description' => esc_html__('Testimonials Submit Form', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-testimonials',
		'category' =>  esc_html__('Social', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'client_placeholder' => array(
				'description' => esc_html__('Name field placeholder', 'ABdev_incomeup'),
				'default' => esc_html__('Your Name', 'ABdev_incomeup'),
			),
			'client_url_placeholder' => array(
				'description' => esc_html__('Profile field placeholder', 'ABdev_incomeup'),
				'default' => esc_html__('Your Profile Link', 'ABdev_incomeup'),
			),
			'client_image_placeholder' => array(
				'description' => esc_html__('Image upload field label', 'ABdev_incomeup'),
				'default' => esc_html__('Your Image', 'ABdev_incomeup'),
			),
			'company_placeholder' => array(
				'description' => esc_html__('Company name field placeholder', 'ABdev_incomeup'),
				'default' => esc_html__('Your Company', 'ABdev_incomeup'),
			),
			'company_url_placeholder' => array(
				'description' => esc_html__('Company link field placeholder', 'ABdev_incomeup'),
				'default' => esc_html__('Your Company Link', 'ABdev_incomeup'),
			),
			'text_placeholder' => array(
				'description' => esc_html__('Testimonial textarea placeholder', 'ABdev_incomeup'),
				'default' => esc_html__('Your Testimonial', 'ABdev_incomeup'),
			),
			'button_text_placeholder' => array(
				'description' => esc_html__('Submit button text', 'ABdev_incomeup'),
				'default' => esc_html__('Submit Testimonial', 'ABdev_incomeup'),
			),
			'class' => array(
				'description' => esc_html__('Class', 'ABdev_incomeup'),
				'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
				'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
			),
		),
	);
}
