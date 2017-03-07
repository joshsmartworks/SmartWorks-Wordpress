<?php

/**
	Native WP video shortcode support
**/
$tcvpb_elements['video'] = array(
	'name' => esc_html__('Video - HTML5', 'ABdev_incomeup' ),
	'description' => esc_html__('Video - HTML5', 'ABdev_incomeup'),
	'type' => 'block',
	'icon' => 'pi-video',
	'category' =>  esc_html__('Media', 'ABdev_incomeup'),
	'third_party' => '1',
	'attributes' => array(
		'mp4' => array(
			'description' => esc_html__('MP4 file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'm4v' => array(
			'description' => esc_html__('M4V file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'webm' => array(
			'description' => esc_html__('WEBM file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'ogv' => array(
			'description' => esc_html__('OGV file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'wmv' => array(
			'description' => esc_html__('WMV file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'flv' => array(
			'description' => esc_html__('FLV file', 'ABdev_incomeup'),
			'type' => 'media',
		),
		'poster' => array(
			'description' => esc_html__('Poster image', 'ABdev_incomeup'),
			'type' => 'image',
			'info' => esc_html__('Defines image to show as placeholder before the media plays', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'loop' => array(
			'description' => esc_html__('Loop', 'ABdev_incomeup'),
			'default' => 'off',
			'type' => 'select',
			'values' => array(
				'0' => 'Off',
				'1' => 'On',
			),
			'info' => esc_html__('Allows for the looping of media', 'ABdev_incomeup'),
		),
		'autoplay' => array(
			'description' => esc_html__('Autoplay', 'ABdev_incomeup'),
			'default' => 'off',
			'type' => 'select',
			'values' => array(
				'0' => 'Off',
				'1' => 'On',
			),
			'info' => esc_html__('Causes the media to automatically play as soon as the media file is ready', 'ABdev_incomeup'),
		),
		'preload' => array(
			'description' => esc_html__('Preload', 'ABdev_incomeup'),
			'default' => 'metadata',
			'type' => 'select',
			'values' => array(
				'metadata' => 'Metadata only',
				'none' => 'None',
				'auto' => 'Load video entirely',
			),
			'info' => esc_html__('Specifies if and how the video should be loaded when the page loads', 'ABdev_incomeup'),
		),
	),
);

