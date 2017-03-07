<?php


/**
	ab-simple-subscribe plugin support
**/
if( in_array('ab-simple-subscribe/ab-simple-subscribe.php', get_option('active_plugins')) ){ //first check if plugin is installed
	$tcvpb_elements['ABss_subscribe_form'] = array(
		'name' => esc_html__('AB Simple Subscribe Form', 'ABdev_incomeup' ),
		'description' => esc_html__('AB Simple Subscribe Form', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-subscribe',
		'category' =>  esc_html__('Social', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'inline_form' => array(
				'description' => esc_html__('Inline Form', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0'
			),
			'no_name' => array(
				'description' => esc_html__('No Name Field', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0'
			),
			'no_button' => array(
				'description' => esc_html__('No Button', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0'
			),
			'use_labels' => array(
				'description' => esc_html__('Use Labels', 'ABdev_incomeup'),
				'type' => 'checkbox',
				'default' => '0',
				'divider' => 'true',
			),
			'name_placeholder' => array(
				'description' => esc_html__('Name Field Placeholder Text', 'ABdev_incomeup'),
				'default' => esc_html__('Your Name', 'ABss'),
			),
			'email_placeholder' => array(
				'description' => esc_html__('Email Field Placeholder Text', 'ABdev_incomeup'),
				'default' => esc_html__('Your Email', 'ABss'),
			),
			'button_text' => array(
				'description' => esc_html__('Button Text', 'ABdev_incomeup'),
				'default' => esc_html__('Subscribe', 'ABss'),
			),
			'class' => array(
				'description' => esc_html__('Class', 'ABdev_incomeup'),
				'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
				'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
			),
		),
	);
}
