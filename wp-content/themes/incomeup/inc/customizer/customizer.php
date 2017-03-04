<?php

require_once 'custom_controls.php';
require_once 'import_redux_options.php';

function incomeup_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';


	/**
	------------------------------------------------------------
	SECTION: General
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_general', array(
		'title'		=> esc_html__('General', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

		/**
		Disable Responsiveness
		**/
		$wp_customize->add_setting('disable_responsiveness', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'disable_responsiveness', array(
			'label'    => esc_html__('Disable Responsiveness', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Google Map API Key
		**/
		$wp_customize->add_setting('google_maps_api_key', array(
			'default'     => '',
		));
		$wp_customize->add_control('google_maps_api_key', array(
			'label'    => esc_html__('Google Map API Key', 'ABdev_incomeup'),
			'description'    => esc_html__('For more details please check ', 'ABdev_incomeup'). '<a href="'.esc_url('https://developers.google.com/maps/documentation/javascript/get-api-key').'" target="_blank">'.esc_html__( 'Google Maps API v3', 'ABdev_incomeup' ).'</a>' . esc_html__(' documentation.', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_general',
		));

		/**
		Hide Comments
		**/
		$wp_customize->add_setting('hide_comments', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_comments', array(
			'label'    => esc_html__('Hide Comments', 'ABdev_incomeup'),
			'description'   => esc_html__('Check this to hide WordPress comments', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Hide Author Bio
		**/
		$wp_customize->add_setting('hide_author_bio', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_author_bio', array(
			'label'    => esc_html__('Hide Author Bio', 'ABdev_incomeup'),
			'description'   => esc_html__('Check this to hide author biography under post content', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Use Preloader
		**/
		$wp_customize->add_setting('enable_preloader', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'enable_preloader', array(
			'label'    => esc_html__('Use Preloader', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Boxed Body
		**/
		$wp_customize->add_setting('boxed_body', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'boxed_body', array(
			'label'    => esc_html__('Boxed Body', 'ABdev_incomeup'),
			'description'   => esc_attr__('Check this to enable boxed body layout', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Body Background
		**/
		$wp_customize->add_setting('bg_color', array(
			'default'     => '#50a2de',
			'transport'		=> 'postMessage',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_color', array(
			'label'      => esc_attr__('Background Color', 'ABdev_incomeup'),
			'settings'   => 'bg_color',
			'section'    => 'section_general',
		)));


        $wp_customize->add_setting( 'custom_bg_image', array(
            'default'        => '',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_bg_image' , array(
			'label'      => esc_attr__('Background Image', 'ABdev_incomeup'),
			'settings'   => 'custom_bg_image',
			'section'    => 'section_general',
        )));


        $wp_customize->add_setting( 'incomeup_background_repeat', array(
            'default'        => 'no-repeat',
        ) );

        $wp_customize->add_control( 'incomeup_background_repeat', array(
            'label'      => esc_attr__( 'Background Repeat', 'ABdev_incomeup' ),
            'section'    => 'section_general',
            'type'       => 'select',
            'choices'    => array(
                'no-repeat'  => esc_attr__('No Repeat', 'ABdev_incomeup'),
                'repeat'     => esc_attr__('Tile', 'ABdev_incomeup'),
                'repeat-x'   => esc_attr__('Tile Horizontally', 'ABdev_incomeup'),
                'repeat-y'   => esc_attr__('Tile Vertically', 'ABdev_incomeup'),
            ),
        ) );


        $wp_customize->add_setting( 'incomeup_background_size', array(
            'default'        => 'cover',
        ) );

        $wp_customize->add_control( 'incomeup_background_size', array(
            'label'      => esc_attr__( 'Background Size', 'ABdev_incomeup' ),
            'section'    => 'section_general',
            'type'       => 'select',
            'choices'    => array(
                'cover'  => esc_attr__('Cover', 'ABdev_incomeup'),
                'contain' => esc_attr__('Contain', 'ABdev_incomeup'),
            ),
        ) );

        $wp_customize->add_setting( 'incomeup_background_position', array(
            'default'  => 'center center',
        ) );

        $wp_customize->add_control( 'incomeup_background_position', array(
            'label'      => esc_attr__( 'Background Position', 'ABdev_incomeup' ),
            'section'    => 'section_general',
            'type'       => 'select',
            'choices'    => array(
                'left top'       => esc_attr__( 'Left Top', 'ABdev_incomeup' ),
                'left center'     => esc_attr__( 'Left Center', 'ABdev_incomeup' ),
                'left bottom'      => esc_attr__( 'Left Bottom', 'ABdev_incomeup' ),
                'center top'       => esc_attr__( 'Center Top', 'ABdev_incomeup' ),
                'center center'     => esc_attr__( 'Center Center', 'ABdev_incomeup' ),
                'center bottom'      => esc_attr__( 'Center Bottom', 'ABdev_incomeup' ),
                'right top'       => esc_attr__( 'Right Top', 'ABdev_incomeup' ),
                'right center'     => esc_attr__( 'Right Center', 'ABdev_incomeup' ),
                'right bottom'      => esc_attr__( 'Right Bottom', 'ABdev_incomeup' ),
            ),
        ) );

        $wp_customize->add_setting( 'incomeup_background_attachment', array(
            'default'        => 'fixed',
        ) );

        $wp_customize->add_control( 'incomeup_background_attachment', array(
            'label'      => esc_attr__( 'Background Attachment', 'ABdev_incomeup' ),
            'section'    => 'section_general',
            'type'       => 'select',
            'choices'    => array(
                'fixed'      => esc_attr__('Fixed', 'ABdev_incomeup'),
                'scroll'     => esc_attr__('Scroll', 'ABdev_incomeup'),
            ),
        ) );

	/**
	------------------------------------------------------------
	SECTION: Header
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_header', array(
		'title'		=> esc_html__('Header', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

	/**
		Header Layout
		**/
		  $wp_customize->add_setting( 'header_layout', array(
            'default'        => 'default',
        ) );

        $wp_customize->add_control( 'header_layout', array(
            'label'      => esc_attr__( 'Header Layout', 'ABdev_incomeup' ),
            'section'    => 'section_header',
            'type'       => 'select',
            'choices'    => array(
                'default' => esc_html__('Default Header', 'ABdev_incomeup'),
				'transparent' => esc_html__('Transparent Header', 'ABdev_incomeup'),
				'1' => esc_html__('Centered Logo Header', 'ABdev_incomeup'),
				'2' => esc_html__('Logo Left With Search Header', 'ABdev_incomeup'),
				'3' => esc_html__('Cart Next To Menu Header', 'ABdev_incomeup'),
            ),
        ));

		/**
		Dark Menu Drop Down
		**/
		$wp_customize->add_setting('header_style_invert', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'header_style_invert', array(
			'label'    => esc_html__('Dark Menu Drop Down', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Sticky Header
		**/
		$wp_customize->add_setting('header_with_sticky', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'header_with_sticky', array(
			'label'    => esc_html__('Sticky Header', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Header with switch
		**/
		$wp_customize->add_setting('header_with_switch', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'header_with_switch', array(
			'label'    => esc_html__('Header with switch', 'ABdev_incomeup'),
			'description'    => esc_html__('This option work only with a Transparent Header. Transparent menu will dissapear on scroll, and then appear solid after Revolution slider.', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_general',
		)));

		/**
		Slogan
		**/
		$wp_customize->add_setting('slogan', array(
			'default'     => '',
			'transport'		=> 'postMessage',
		));
		$wp_customize->add_control('slogan', array(
			'label'    => esc_html__('Slogan', 'ABdev_incomeup'),
			'description'    => esc_html__('Slogan will appear next to logo on \'Cart Next To Menu Header\' layout.', 'ABdev_incomeup'),
			'settings'  	=> 'slogan',
			'section'  => 'section_header',
		));

		/**
		Header Logo
		**/
		$wp_customize->add_setting('header_logo', array(
			'default'     => '',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
			'label'     	=> __( 'Header Logo', 'ABdev_incomeup' ),
			'description'        => esc_html__('Upload header logo', 'ABdev_incomeup'),
			'settings'  	=> 'header_logo',
			'section'   	=> 'section_header',
		)));

		/**
		Header Retina Logo
		**/
		$wp_customize->add_setting('header_retina_logo', array(
			'default'     => '',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_retina_logo', array(
			'label'     	=> esc_html__( 'Header Logo (Retina Version @2x)', 'ABdev_incomeup' ),
			'description'    => esc_html__('Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'ABdev_incomeup'),
			'settings'  	=> 'header_retina_logo',
			'section'   	=> 'section_header',
		)));

		/**
		Header Retina Logo Width
		**/
		$wp_customize->add_setting('header_retina_logo_width', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_retina_logo_width', array(
			'label'    => esc_html__('Retina Logo Width', 'ABdev_incomeup'),
			'description'    => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Header Retina Logo Height
		**/
		$wp_customize->add_setting('header_retina_logo_height', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_retina_logo_height', array(
			'label'    => esc_html__('Retina Logo Height', 'ABdev_incomeup'),
			'description'    => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Inverted Header Logo
		**/
		$wp_customize->add_setting('inverted_header_logo', array(
			'default'     => '',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'inverted_header_logo', array(
			'label'     	=> __( 'Inverted Header Logo', 'ABdev_incomeup' ),
			'description'   => esc_html__('Upload inverted header logo', 'ABdev_incomeup'),
			'settings'  	=> 'inverted_header_logo',
			'section'   	=> 'section_header',
		)));

		/**
		Header Inverted Retina Logo
		**/
		$wp_customize->add_setting('header_inverted_retina_logo', array(
			'default'     => '',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_inverted_retina_logo', array(
			'label'     	=> esc_html__( 'Header Logo (Retina Version @2x)', 'ABdev_incomeup' ),
			'description'    => esc_html__('Select an image file for the inverted retina version of the logo. It should be exactly 2x the size of main logo.', 'ABdev_incomeup'),
			'settings'  	=> 'header_inverted_retina_logo',
			'section'   	=> 'section_header',
		)));

		/**
		Header Inverted Retina Logo Width
		**/
		$wp_customize->add_setting('header_inverted_retina_logo_width', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_inverted_retina_logo_width', array(
			'label'    => esc_html__('Retina Logo Width', 'ABdev_incomeup'),
			'description'    => esc_html__('If inverted retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Header Inverted Retina Logo Height
		**/
		$wp_customize->add_setting('header_inverted_retina_logo_height', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_inverted_retina_logo_height', array(
			'label'    => esc_html__('Retina Logo Height', 'ABdev_incomeup'),
			'description'    => esc_html__('If inverted retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Show Top Bar
		**/
		$wp_customize->add_setting('show_top_bar', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'show_top_bar', array(
			'label'    => esc_html__('Show Top Bar', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_header',
		)));

		/**
		Show Login Top Bar
		**/
		$wp_customize->add_setting('show_login_top_bar', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'show_login_top_bar', array(
			'label'    => esc_html__('Show Login Top Bar', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_header',
		)));

		/**
		Hide Search
		**/
		$wp_customize->add_setting('hide_search', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_search', array(
			'label'    => esc_html__('Hide Search', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_header',
		)));

		/**
		Phone Info
		**/
		$wp_customize->add_setting('header_phone', array(
			'default'     => '',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control('header_phone', array(
			'label'    => esc_html__('Phone Info', 'ABdev_incomeup'),
			'description'    => esc_html__('Enter phone number for quick contact', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Header Email
		**/
		$wp_customize->add_setting('header_email', array(
			'default'     => '',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control('header_email', array(
			'label'    => esc_html__('Email Info', 'ABdev_incomeup'),
			'description'    => esc_html__('Enter email address for quick contact', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_header',
		));

		/**
		Sep 1
		**/
		$wp_customize->add_setting('general_sep_1', array(
			'default'     => '',
			'sanitize_callback' => 'esc_html',
		));
		$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'general_sep_1', array(
			'settings'  	=> 'general_sep_1',
			'section'   	=> 'section_header',
		)));

		/**
		Coming Soon Header Background
		**/
		$wp_customize->add_setting('coming_soon_header_color', array(
			'default'     => '#181a1d',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coming_soon_header_color', array(
			'label'      => esc_attr__('Coming Soon Background Color', 'ABdev_incomeup'),
			'settings'   => 'coming_soon_header_color',
			'section'    => 'section_header',
		)));


        $wp_customize->add_setting( 'coming_soon_bg_image', array(
            'default'        => '',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'coming_soon_bg_image' , array(
			'label'      => esc_attr__('Coming Soon Background Image', 'ABdev_incomeup'),
			'settings'   => 'coming_soon_bg_image',
			'section'    => 'section_header',
        )));


        $wp_customize->add_setting( 'incomeup_coming_soon_background_repeat', array(
            'default'        => 'repeat',
        ) );

        $wp_customize->add_control( 'incomeup_coming_soon_background_repeat', array(
            'label'      => esc_attr__( 'Coming Soon Background Repeat', 'ABdev_incomeup' ),
            'section'    => 'section_header',
            'type'       => 'select',
            'choices'    => array(
                'no-repeat'  => esc_attr__('No Repeat', 'ABdev_incomeup'),
                'repeat'     => esc_attr__('Tile', 'ABdev_incomeup'),
                'repeat-x'   => esc_attr__('Tile Horizontally', 'ABdev_incomeup'),
                'repeat-y'   => esc_attr__('Tile Vertically', 'ABdev_incomeup'),
            ),
        ) );


        $wp_customize->add_setting( 'incomeup_coming_soon_background_size', array(
            'default'        => 'cover',
        ) );

        $wp_customize->add_control( 'incomeup_coming_soon_background_size', array(
            'label'      => esc_attr__( 'Coming Soon Background Size', 'ABdev_incomeup' ),
            'section'    => 'section_header',
            'type'       => 'select',
            'choices'    => array(
                'cover'  => esc_attr__('Cover', 'ABdev_incomeup'),
                'contain' => esc_attr__('Contain', 'ABdev_incomeup'),
            ),
        ) );

        $wp_customize->add_setting( 'incomeup_coming_soon_background_position', array(
            'default'  => 'center center',
        ) );

        $wp_customize->add_control( 'incomeup_coming_soon_background_position', array(
            'label'      => esc_attr__( 'Coming Soon Background Position', 'ABdev_incomeup' ),
            'section'    => 'section_header',
            'type'       => 'select',
            'choices'    => array(
                'left top'       => esc_attr__( 'Left Top', 'ABdev_incomeup' ),
                'left center'     => esc_attr__( 'Left Center', 'ABdev_incomeup' ),
                'left bottom'      => esc_attr__( 'Left Bottom', 'ABdev_incomeup' ),
                'center top'       => esc_attr__( 'Center Top', 'ABdev_incomeup' ),
                'center center'     => esc_attr__( 'Center Center', 'ABdev_incomeup' ),
                'center bottom'      => esc_attr__( 'Center Bottom', 'ABdev_incomeup' ),
                'right top'       => esc_attr__( 'Right Top', 'ABdev_incomeup' ),
                'right center'     => esc_attr__( 'Right Center', 'ABdev_incomeup' ),
                'right bottom'      => esc_attr__( 'Right Bottom', 'ABdev_incomeup' ),
            ),
        ) );

        $wp_customize->add_setting( 'incomeup_coming_soon_background_attachment', array(
            'default'        => 'fixed',
        ) );

        $wp_customize->add_control( 'incomeup_coming_soon_background_attachment', array(
            'label'      => esc_attr__( 'Coming Soon Background Attachment', 'ABdev_incomeup' ),
            'section'    => 'section_header',
            'type'       => 'select',
            'choices'    => array(
                'fixed'      => esc_attr__('Fixed', 'ABdev_incomeup'),
                'scroll'     => esc_attr__('Scroll', 'ABdev_incomeup'),
            ),
        ) );

	/**
	------------------------------------------------------------
	SECTION: Header Social Icons
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_social_icons', array(
		'title'		=> esc_html__('Header Social Icons', 'ABdev_shard'),
		'priority'	=> 0,
	));

		/**
		Header Social target
		**/
		$wp_customize->add_setting( 'header_social_target', array(
            'default'        => '_blank',
        ) );

        $wp_customize->add_control( 'header_social_target', array(
            'label'      => esc_attr__( 'Links Target', 'ABdev_incomeup' ),
            'section'  		=> 'section_social_icons',
            'type'       => 'select',
            'choices'    => array(
                '_self'  => esc_attr__('_self', 'ABdev_incomeup'),
                '_blank'     => esc_attr__('_blank', 'ABdev_incomeup'),
            ),
        ) );

		/**
		Linkedin
		**/
		$wp_customize->add_setting('header_linkedin_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_linkedin_url', array(
			'label'    		=> esc_html__('Linkedin Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Facebook
		**/
		$wp_customize->add_setting('header_facebook_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_facebook_url', array(
			'label'    		=> esc_html__('Facebook Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Skype
		**/
		$wp_customize->add_setting('header_skype_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_skype_url', array(
			'label'    		=> esc_html__('Skype Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Google+
		**/
		$wp_customize->add_setting('header_googleplus_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_googleplus_url', array(
			'label'    		=> esc_html__('Google+ Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Twitter
		**/
		$wp_customize->add_setting('header_twitter_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_twitter_url', array(
			'label'    		=> esc_html__('Twitter Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Youtube
		**/
		$wp_customize->add_setting('header_youtube_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_youtube_url', array(
			'label'    		=> esc_html__('Youtube Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Pinterest
		**/
		$wp_customize->add_setting('header_pinterest_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_pinterest_url', array(
			'label'    		=> esc_html__('Pinterest Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Github
		**/
		$wp_customize->add_setting('header_github_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_github_url', array(
			'label'    		=> esc_html__('Github Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Feed
		**/
		$wp_customize->add_setting('header_feed_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_feed_url', array(
			'label'    		=> esc_html__('Feed Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Behance
		**/
		$wp_customize->add_setting('header_behance_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_behance_url', array(
			'label'    		=> esc_html__('Behance Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Blogger
		**/
		$wp_customize->add_setting('header_blogger_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_blogger_url', array(
			'label'    		=> esc_html__('Blogger Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Delicious
		**/
		$wp_customize->add_setting('header_delicious_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_delicious_url', array(
			'label'    		=> esc_html__('Delicious Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		DesignContest
		**/
		$wp_customize->add_setting('header_designContest_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_designContest_url', array(
			'label'    		=> esc_html__('DesignContest Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		DeviantART
		**/
		$wp_customize->add_setting('header_deviantART_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_deviantART_url', array(
			'label'    		=> esc_html__('DeviantART Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Digg
		**/
		$wp_customize->add_setting('header_digg_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_digg_url', array(
			'label'    		=> esc_html__('Digg Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Dribbble
		**/
		$wp_customize->add_setting('header_dribbble_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_dribbble_url', array(
			'label'    		=> esc_html__('Dribbble Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Dropbox
		**/
		$wp_customize->add_setting('header_dropbox_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_dropbox_url', array(
			'label'    		=> esc_html__('Dropbox Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Email
		**/
		$wp_customize->add_setting('header_email_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_email_url', array(
			'label'    		=> esc_html__('Email Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Flickr
		**/
		$wp_customize->add_setting('header_flickr_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_flickr_url', array(
			'label'    		=> esc_html__('Flickr Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Forrst
		**/
		$wp_customize->add_setting('header_forrst_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_forrst_url', array(
			'label'    		=> esc_html__('Forrst Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Instagram
		**/
		$wp_customize->add_setting('header_instagram_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_instagram_url', array(
			'label'    		=> esc_html__('Instagram Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Last.fm
		**/
		$wp_customize->add_setting('header_last_fm_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_last_fm_url', array(
			'label'    		=> esc_html__('Last.fm Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Myspace
		**/
		$wp_customize->add_setting('header_myspace_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_myspace_url', array(
			'label'    		=> esc_html__('Myspace Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Picasa
		**/
		$wp_customize->add_setting('header_picasa_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_picasa_url', array(
			'label'    		=> esc_html__('Picasa Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		StumbleUpon
		**/
		$wp_customize->add_setting('header_stumbleUpon_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_stumbleUpon_url', array(
			'label'    		=> esc_html__('StumbleUpon Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Vimeo
		**/
		$wp_customize->add_setting('header_vimeo_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_vimeo_url', array(
			'label'    		=> esc_html__('Vimeo Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));

		/**
		Zerply
		**/
		$wp_customize->add_setting('header_zerply_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('header_zerply_url', array(
			'label'    		=> esc_html__('Zerply Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_social_icons',
		));


	/**
	------------------------------------------------------------
	SECTION: Breadcrumbs
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_breadcrumbs', array(
		'title'		=> esc_html__('Breadcrumbs', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

		/**
		Hide Title/Breadcrumbs Bar
		**/
		$wp_customize->add_setting('hide_title_breadcrumbs_bar', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_title_breadcrumbs_bar', array(
			'label'    => esc_html__('Hide Title/Breadcrumbs Bar', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_breadcrumbs',
		)));

		/**
		Hide Title From Bar
		**/
		$wp_customize->add_setting('hide_title_from_bar', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_title_from_bar', array(
			'label'    => esc_html__('Hide Title From Bar', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_breadcrumbs',
		)));

		/**
		Hide Breadcrumbs From Bar
		**/
		$wp_customize->add_setting('hide_breadcrumbs_from_bar', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'hide_breadcrumbs_from_bar', array(
			'label'    => esc_html__('Hide Breadcrumbs From Bar', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_breadcrumbs',
		)));

		/**
		Title/Breadcrumbs Bar Background Color
		**/
		$wp_customize->add_setting('incomeup_title_breadcrumbs_color', array(
			'default'     => '',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'incomeup_title_breadcrumbs_color', array(
			'label'      => esc_html__('Title/Breadcrumbs Bar Background Color', 'ABdev_incomeup'),
			'settings'   => 'incomeup_title_breadcrumbs_color',
			'section'    => 'section_breadcrumbs',
		)));

		/**
		Title/Breadcrumbs Bar Background Image
		**/
		$wp_customize->add_setting('incomeup_title_breadcrumbs_image', array(
			'default'     => '',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'incomeup_title_breadcrumbs_image', array(
			'label'     	=> esc_html__( 'Title/Breadcrumbs Bar Background Image', 'ABdev_incomeup' ),
			'settings'  	=> 'incomeup_title_breadcrumbs_image',
			'section'   	=> 'section_breadcrumbs',
		)));


		$wp_customize->add_setting( 'incomeup_title_breadcrumbs_bar_background_repeat', array(
            'default'        => 'no-repeat',
        ) );

        $wp_customize->add_control( 'incomeup_title_breadcrumbs_bar_background_repeat', array(
            'label'      => esc_attr__( 'Background Repeat', 'ABdev_incomeup' ),
            'section'    => 'section_breadcrumbs',
            'type'       => 'select',
            'choices'    => array(
                'no-repeat'  => esc_attr__('No Repeat', 'ABdev_incomeup'),
                'repeat'     => esc_attr__('Tile', 'ABdev_incomeup'),
                'repeat-x'   => esc_attr__('Tile Horizontally', 'ABdev_incomeup'),
                'repeat-y'   => esc_attr__('Tile Vertically', 'ABdev_incomeup'),
            ),
        ) );


        $wp_customize->add_setting( 'incomeup_title_breadcrumbs_bar_background_size', array(
            'default'        => 'cover',
        ) );

        $wp_customize->add_control( 'incomeup_title_breadcrumbs_bar_background_size', array(
            'label'      => esc_attr__( 'Background Size', 'ABdev_incomeup' ),
            'section'    => 'section_breadcrumbs',
            'type'       => 'select',
            'choices'    => array(
                'cover'  => esc_attr__('Cover', 'ABdev_incomeup'),
                'contain' => esc_attr__('Contain', 'ABdev_incomeup'),
            ),
        ) );

        $wp_customize->add_setting( 'incomeup_title_breadcrumbs_bar_background_position', array(
            'default'  => 'center center',
        ) );

        $wp_customize->add_control( 'incomeup_title_breadcrumbs_bar_background_position', array(
            'label'      => esc_attr__( 'Background Position', 'ABdev_incomeup' ),
            'section'    => 'section_breadcrumbs',
            'type'       => 'select',
            'choices'    => array(
                'left top'       => esc_attr__( 'Left Top', 'ABdev_incomeup' ),
                'left center'     => esc_attr__( 'Left Center', 'ABdev_incomeup' ),
                'left bottom'      => esc_attr__( 'Left Bottom', 'ABdev_incomeup' ),
                'center top'       => esc_attr__( 'Center Top', 'ABdev_incomeup' ),
                'center center'     => esc_attr__( 'Center Center', 'ABdev_incomeup' ),
                'center bottom'      => esc_attr__( 'Center Bottom', 'ABdev_incomeup' ),
                'right top'       => esc_attr__( 'Right Top', 'ABdev_incomeup' ),
                'right center'     => esc_attr__( 'Right Center', 'ABdev_incomeup' ),
                'right bottom'      => esc_attr__( 'Right Bottom', 'ABdev_incomeup' ),
            ),
        ) );


if( in_array('dnd-shortcodes/dnd-shortcodes.php', get_option('active_plugins')) ){
	/**
	------------------------------------------------------------
	SECTION: Icons
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_icons', array(
		'title'		=> esc_html__('Icons', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

		/**
		Disable Theme Icon Font
		**/
		$wp_customize->add_setting('disable_icon_font', array(
			'default'     => '',
			'sanitize_callback' => 'ABdev_checkbox_sanitization',
		));
		$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'disable_icon_font', array(
			'label'    => esc_html__('Disable Theme Icon Font', 'ABdev_incomeup'),
			'type'     => 'checkbox',
			'section'  => 'section_icons',
		)));

		/**
		Icon Font Info
		**/
		$wp_customize->add_setting('icon_font_info', array(
			'default'     => '',
		));
		$wp_customize->add_control(new Info_Custom_control($wp_customize, 'icon_font_info', array(
			'label'     	=> __( "Complete theme's icons names list", 'ABdev_incomeup' ),
			'description'   => __( 'Icon list with all icons and their names can be found <a href="'.esc_url(get_template_directory_uri()).'/css/icons/demo.html" target="_blank">here</a>.', 'ABdev_incomeup' ),
			'type'        => 'info',
			'settings'  	=> 'icon_font_info',
			'section'   	=> 'section_icons',
		)));
}

	/**
	------------------------------------------------------------
	SECTION: Sidebars
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_sidebars', array(
		'title'		=> esc_attr__('Sidebars', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

	/**
		Sidebars
		**/
		$wp_customize->add_setting('sidebars', array(
			'default'     => '',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control(new Multi_Input_Custom_control($wp_customize, 'sidebars', array(
			'label'     	=> esc_attr__( 'Sidebars', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Add as many custom sidebars as you need', 'ABdev_incomeup' ),
			'settings'  	=> 'sidebars',
			'section'   	=> 'section_sidebars',
		)));

	/**
	------------------------------------------------------------
	SECTION: Colors
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_global_colors', array(
		'title'		=> esc_html__('Colors', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

		/**
		Main Color
		**/
		$wp_customize->add_setting('main_color', array(
			'default'     => '#50a2de',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
			'label'      => esc_html__('Main Color', 'ABdev_incomeup'),
			'settings'   => 'main_color',
			'section'    => 'section_global_colors',
		)));

		/**
		Secondary color
		**/
		$wp_customize->add_setting('secondary_color', array(
			'default'     => '#292f33',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
			'label'    => esc_html__('Secondary Color', 'ABdev_incomeup'),
			'type'     => 'color',
			'section'  => 'section_global_colors',
		)));

	/**
	------------------------------------------------------------
	SECTION: Portfolio
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_portfolio', array(
		'title'		=> esc_attr__('Portfolio', 'ABdev_incomeup'),
		'priority'	=> 0,
	));


		/**
		Additional Content After Portfolio Pages
		**/
		$wp_customize->add_setting('content_after_portfolio', array(
			'default'     => '',
		));
		$wp_customize->add_control('content_after_portfolio', array(
			'label'    => esc_attr__('Additional Content After Portfolio Pages', 'ABdev_incomeup'),
			'description'   => esc_attr__('Enter content to be shown at the bottom of Portfolio page, before footer.', 'ABdev_incomeup'),
			'type'     => 'textarea',
			'section'  => 'section_portfolio',
		));

		/**
		Pagination List Page
		**/
		$wp_customize->add_setting('list_link', array(
			'default'     => '',
		));
		$wp_customize->add_control('list_link', array(
			'label'    => esc_attr__('Pagination List Page', 'ABdev_incomeup'),
			'description'   => esc_attr__('Default page for List page in portfolio pagination.', 'ABdev_incomeup'),
			'type'     => 'dropdown-pages',
			'section'  => 'section_portfolio',
		));

if( in_array('woocommerce/woocommerce.php', get_option('active_plugins')) ){

	/**
	------------------------------------------------------------
	SECTION: Woocommerce
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_woocommerce', array(
		'priority'	=> 1,
		'title'     => esc_attr__('WooCommerce', 'ABdev_incomeup'),
	));

		/**
		Products per row
		**/
		$wp_customize->add_setting('column_number', array(
			'default'     => '3',
		));
		$wp_customize->add_control(new Layout_Picker_Products_Custom_Control($wp_customize, 'column_number', array(
			'label'     	=> esc_attr__( 'Products per row', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Select how many products to show. Choose between 3, 4 or 5 products per row.', 'ABdev_incomeup' ),
			'settings'  	=> 'column_number',
			'section'   	=> 'section_woocommerce',
		)));


		/**
		Shop layout
		**/
		$wp_customize->add_setting('woocommerce_layout', array(
			'default'     => 'right_sidebar',
		));
		$wp_customize->add_control(new Layout_Picker_Shop_Layout_Custom_Control($wp_customize, 'woocommerce_layout', array(
			'label'     	=> esc_attr__( 'Shop Layout', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Choose the product archive layout.', 'ABdev_incomeup' ),
			'settings'  	=> 'woocommerce_layout',
			'section'   	=> 'section_woocommerce',
		)));


		/**
		Single Product Page Layout
		**/
		$wp_customize->add_setting('woocommerce_single_product_layout', array(
			'default'     => 'sp_right_sidebar',
		));
		$wp_customize->add_control(new Layout_Picker_Single_Product_Layout_Custom_Control($wp_customize, 'woocommerce_single_product_layout', array(
			'label'     	=> esc_attr__( 'Single Product Page Layout', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Choose the single product layout.', 'ABdev_incomeup' ),
			'settings'  	=> 'woocommerce_single_product_layout',
			'section'   	=> 'section_woocommerce',
		)));

		/**
		Wishlist page
		**/
		$wp_customize->add_setting('wishlist_page', array(
			'default'     =>  '',
		));
		$wp_customize->add_control('wishlist_page', array(
			'label'    		=> esc_attr__('Wishlist page', 'ABdev_incomeup'),
			'description'   => esc_attr__('Page containing [yith_wcwl_wishlist] shortcode.', 'ABdev_incomeup'),
			'type'     		=> 'dropdown-pages',
			'section'  		=> 'section_woocommerce',
		));

		/**
		My account page
		**/
		$wp_customize->add_setting('my_account_page', array(
			'default'     =>  '',
		));
		$wp_customize->add_control('my_account_page', array(
			'label'    		=> esc_attr__('My account page', 'ABdev_incomeup'),
			'description'   => esc_attr__('Page containing [woocommerce_my_account] shortcode.', 'ABdev_incomeup'),
			'type'     		=> 'dropdown-pages',
			'section'  		=> 'section_woocommerce',
		));

		/**
		Shop Sidebar
		**/
		$wp_customize->add_setting('shop_sidebar', array(
			'default'     => '',
		));
		$wp_customize->add_control(new Sidebar_Dropdown_Custom_Control($wp_customize, 'shop_sidebar', array(
			'label'     	=> esc_attr__( 'Sidebar', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Choose the sidebar you wish to appear on shop pages.', 'ABdev_incomeup' ),
			'type'     => 'dropdown-pages',
			'settings'  	=> 'shop_sidebar',
			'section'   	=> 'section_woocommerce',
		)));

		/**
		Single Product Page Sidebar
		**/
		$wp_customize->add_setting('sp_shop_sidebar', array(
			'default'     => '',
		));
		$wp_customize->add_control(new Single_Product_Sidebar_Dropdown_Custom_Control($wp_customize, 'sp_shop_sidebar', array(
			'label'     	=> esc_attr__( 'Single Product Page Sidebar', 'ABdev_incomeup' ),
			'description'   => esc_attr__( 'Choose the sidebar you wish to appear on single product pages.', 'ABdev_incomeup' ),
			'settings'  	=> 'sp_shop_sidebar',
			'section'   	=> 'section_woocommerce',
		)));


		/**
		Brand Attribute Slug
		**/
		$wp_customize->add_setting('brand_slug', array(
			'default'     =>  '',
		));
		$wp_customize->add_control('brand_slug', array(
			'label'    		=> esc_attr__('Brand Attribute Slug', 'ABdev_incomeup'),
			'description'   => esc_attr__('Enter Brand attribute slug here, so brand will be displayed under product title.', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_woocommerce',
		));

		/**
		New Product
		**/
		$wp_customize->add_setting('consider_new', array(
			'default'     => 5,
		));
		$wp_customize->add_control('consider_new', array(
			'label'    		=> esc_attr__('No. of Days Product is New', 'ABdev_incomeup'),
			'description'   => esc_attr__('Number of days product is considered new. It will have "New" badge.', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_woocommerce',
		));

}

	/**
	------------------------------------------------------------
	SECTION: Footer
	------------------------------------------------------------
	**/
	$wp_customize->add_section('section_footer', array(
		'title'		=> esc_html__('Footer', 'ABdev_incomeup'),
		'priority'	=> 0,
	));

		/**
		Copyright Notice
		**/
		$wp_customize->add_setting('copyright', array(
			'default'     => '',
			'transport'   => 'postMessage',
		));
		$wp_customize->add_control('copyright', array(
			'label'    => esc_html__('Copyright Notice', 'ABdev_incomeup'),
			'description'    => esc_html__('Enter copyright notice to be shown in footer', 'ABdev_incomeup'),
			'type'     => 'text',
			'section'  => 'section_footer',
		));

		/**
		Linkedin Profile
		**/
		$wp_customize->add_setting('linkedin_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('linkedin_url', array(
			'label'    		=> esc_html__('Linkedin Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Facebook Profile
		**/
		$wp_customize->add_setting('facebook_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('facebook_url', array(
			'label'    		=> esc_html__('Facebook Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Skype Profile
		**/
		$wp_customize->add_setting('skype_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('skype_url', array(
			'label'    		=> esc_html__('Skype Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Google+ Profile
		**/
		$wp_customize->add_setting('googleplus_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('googleplus_url', array(
			'label'    		=> esc_html__('Google+ Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Twitter Profile
		**/
		$wp_customize->add_setting('twitter_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('twitter_url', array(
			'label'    		=> esc_html__('Twitter Profile', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Youtube URL
		**/
		$wp_customize->add_setting('youtube_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('youtube_url', array(
			'label'    		=> esc_html__('Youtube URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Pinterest URL
		**/
		$wp_customize->add_setting('pinterest_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('pinterest_url', array(
			'label'    		=> esc_html__('Pinterest URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Github URL
		**/
		$wp_customize->add_setting('github_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('github_url', array(
			'label'    		=> esc_html__('Github URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Feed URL
		**/
		$wp_customize->add_setting('feed_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('feed_url', array(
			'label'    		=> esc_html__('Feed URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Behance URL
		**/
		$wp_customize->add_setting('behance_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('behance_url', array(
			'label'    		=> esc_html__('Behance URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Blogger URL
		**/
		$wp_customize->add_setting('blogger_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('blogger_url', array(
			'label'    		=> esc_html__('Blogger URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Delicious URL
		**/
		$wp_customize->add_setting('delicious_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('delicious_url', array(
			'label'    		=> esc_html__('Delicious URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		DesignContest URL
		**/
		$wp_customize->add_setting('designcontest_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('designcontest_url', array(
			'label'    		=> esc_html__('DesignContest URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Digg URL
		**/
		$wp_customize->add_setting('digg_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('digg_url', array(
			'label'    		=> esc_html__('Digg URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		DeviantART URL
		**/
		$wp_customize->add_setting('deviantart_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('deviantart_url', array(
			'label'    		=> esc_html__('DeviantART URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Dribbble URL
		**/
		$wp_customize->add_setting('dribbble_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('dribbble_url', array(
			'label'    		=> esc_html__('Dribbble URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Dropbox URL
		**/
		$wp_customize->add_setting('dropbox_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('dropbox_url', array(
			'label'    		=> esc_html__('Dropbox URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Email URL
		**/
		$wp_customize->add_setting('email_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('email_url', array(
			'label'    		=> esc_html__('Email URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Flickr URL
		**/
		$wp_customize->add_setting('flickr_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('flickr_url', array(
			'label'    		=> esc_html__('Flickr URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Forrst URL
		**/
		$wp_customize->add_setting('forrst_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('forrst_url', array(
			'label'    		=> esc_html__('Forrst URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Instagram URL
		**/
		$wp_customize->add_setting('instagram_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('instagram_url', array(
			'label'    		=> esc_html__('Instagram URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Last.fm URL
		**/
		$wp_customize->add_setting('lastfm_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('lastfm_url', array(
			'label'    		=> esc_html__('Last.fm URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Myspace URL
		**/
		$wp_customize->add_setting('myspace_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('myspace_url', array(
			'label'    		=> esc_html__('Myspace URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Picasa URL
		**/
		$wp_customize->add_setting('picasa_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('picasa_url', array(
			'label'    		=> esc_html__('Picasa URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		StumbleUpon URL
		**/
		$wp_customize->add_setting('stumbleupon_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('stumbleupon_url', array(
			'label'    		=> esc_html__('StumbleUpon URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Vimeo URL
		**/
		$wp_customize->add_setting('vimeo_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('vimeo_url', array(
			'label'    		=> esc_html__('Vimeo URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Zerply URL
		**/
		$wp_customize->add_setting('zerply_url', array(
			'default'     => '',
		));
		$wp_customize->add_control('zerply_url', array(
			'label'    		=> esc_html__('Zerply URL', 'ABdev_incomeup'),
			'type'     		=> 'text',
			'section'  		=> 'section_footer',
		));

		/**
		Footer social target
		**/
		$wp_customize->add_setting( 'footer_social_target', array(
            'default'        => '_blank',
        ) );

        $wp_customize->add_control( 'footer_social_target', array(
            'label'      => esc_attr__( 'Links Target', 'ABdev_incomeup' ),
            'section'  		=> 'section_footer',
            'type'       => 'select',
            'choices'    => array(
                '_self'  => esc_attr__('_self', 'ABdev_incomeup'),
                '_blank'     => esc_attr__('_blank', 'ABdev_incomeup'),
            ),
        ) );

}
add_action('customize_register', 'incomeup_customize_register');

function incomeup_customizer_live_preview(){
	wp_enqueue_script('incomeup-themecustomizer', get_template_directory_uri().'/inc/customizer/js/customizer.js', array('jquery', 'customize-preview'), '', true);
}
add_action( 'customize_preview_init', 'incomeup_customizer_live_preview' );