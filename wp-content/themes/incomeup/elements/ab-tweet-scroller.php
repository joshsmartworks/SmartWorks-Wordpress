<?php


/**
	ab-tweet-scroller plugin support
**/
if( in_array('ab-tweet-scroller/ab-tweet-scroller.php', get_option('active_plugins')) ){ //first check if plugin is installed
	$tcvpb_elements['ab_tweet_scroller'] = array(
		'name' => esc_html__('AB Tweet Scroller', 'ABdev_incomeup' ),
		'description' => esc_html__('AB Tweet Scroller', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-tweet',
		'category' =>  esc_html__('Social', 'ABdev_incomeup'),
		'third_party' => '1',
		'attributes' => array(
			'user' => array(
				'description' => esc_html__('User', 'ABdev_incomeup'),
				'info' => esc_html__('Displays different user than the one specified in API settings', 'ABdev_incomeup'),
			),
			'limit' => array(
				'description' => esc_html__('Limit', 'ABdev_incomeup'),
				'info' => esc_html__('Number of tweets to show', 'ABdev_incomeup'),
				'default' => '5',
			),
			'link_target' => array(
				'description' => esc_html__('External Link Target', 'ABdev_incomeup'),
				'default' => '_blank',
				'type' => 'select',
				'values' => array(
					'_blank' => esc_html__('Blank', 'ABdev_incomeup'),
					'_self' =>  esc_html__('Self', 'ABdev_incomeup'),
				),
				'divider' => 'true',
			),
			'hide_image' => array(
				'default' => '0',
				'type' => 'checkbox',
				'description' => esc_html__('Hide Image', 'ABdev_incomeup'),
			),
			'hide_reply' => array(
				'default' => '0',
				'type' => 'checkbox',
				'description' => esc_html__('Hide Reply Link', 'ABdev_incomeup'),
			),
			'hide_retweet' => array(
				'default' => '0',
				'type' => 'checkbox',
				'description' => esc_html__('Hide Retweet Link', 'ABdev_incomeup'),
			),
			'hide_favorite' => array(
				'default' => '0',
				'type' => 'checkbox',
				'description' => esc_html__('Hide Favorite Link', 'ABdev_incomeup'),
				'divider' => 'true',
			),
			'date_format' => array(
				'description' => esc_html__('Date Format', 'ABdev_incomeup'),
				'info' => esc_html__('Specifies date format to be used, or to hide the date. Possible values are human, hide or PHP date format string', 'ABdev_incomeup'),
				'default' => 'human',
			),
			'show_arrows' => array(
				'default' => '1',
				'type' => 'checkbox',
				'description' => esc_html__('Show Arrows', 'ABdev_incomeup'),
			),
			'fx' => array(
				'description' => esc_html__('Effect', 'ABdev_incomeup'),
				'default' => 'fade',
				'type' => 'select',
				'values' => array(
					'none' => esc_html__('none', 'ABdev_incomeup'),
					'scroll' =>  esc_html__('scroll', 'ABdev_incomeup'),
					'fade' =>  esc_html__('fade', 'ABdev_incomeup'),
					'crossfade' =>  esc_html__('crossfade', 'ABdev_incomeup'),
					'cover-fade' =>  esc_html__('cover-fade', 'ABdev_incomeup'),
					'uncover-fade' =>  esc_html__('uncover-fade', 'ABdev_incomeup'),
				),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'easing' => array(
				'description' => esc_html__('Easing', 'ABdev_incomeup'),
				'default' => 'swing',
				'type' => 'select',
				'values' => array(
					'linear' => esc_html__('linear', 'ABdev_incomeup'),
					'swing' =>  esc_html__('swing', 'ABdev_incomeup'),
					'cubic' =>  esc_html__('cubic', 'ABdev_incomeup'),
					'elastic' =>  esc_html__('elastic', 'ABdev_incomeup'),
				),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'duration' => array(
				'description' => esc_html__('Transition Duration', 'ABdev_incomeup'),
				'info' => esc_html__('Duration of transition in seconds', 'ABdev_incomeup'),
				'default' => '1000',
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'pauseonhover' => array(
				'description' => esc_html__('Pause on Hover', 'ABdev_incomeup'),
				'default' => 'immediate',
				'type' => 'select',
				'values' => array(
					'false' => esc_html__('false', 'ABdev_incomeup'),
					'resume' =>  esc_html__('resume', 'ABdev_incomeup'),
					'immediate' =>  esc_html__('immediate', 'ABdev_incomeup'),
				),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'timeoutduration' => array(
				'description' => esc_html__('Transition Duration', 'ABdev_incomeup'),
				'info' => esc_html__('How long is each slide displayed, in seconds', 'ABdev_incomeup'),
				'default' => '5000',
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'play' => array(
				'default' => '1',
				'type' => 'checkbox',
				'description' => esc_html__('Autoplay', 'ABdev_incomeup'),
				'tab' => esc_html__('Animation', 'ABdev_incomeup'),
			),
			'class' => array(
				'description' => esc_html__('Class', 'ABdev_incomeup'),
				'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
				'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
			),
		),
	);
}