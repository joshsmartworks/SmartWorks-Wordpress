<?php

function incomeup_child_theme_scripts() {

	$deps = array();
	if( in_array('the-creator-vpb/the-creator-vpb.php', get_option('active_plugins')) ){
		$deps[] = 'tcvpb_css';
	}

	wp_enqueue_style( 'main_css', get_template_directory_uri().'/style.css', $deps );
    wp_enqueue_style( 'incomeup-child-style', get_stylesheet_uri(), array( 'main_css' ) );
}

add_action( 'wp_enqueue_scripts', 'incomeup_child_theme_scripts' );

function incomeup_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'ABdev_incomeup', $lang );
}
add_action( 'after_setup_theme', 'incomeup_lang_setup' );
