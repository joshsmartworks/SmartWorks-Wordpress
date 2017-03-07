<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

function wpcf7_delete_plugin() {
	global $wpdb;

	delete_option( 'wpcf7' );

<<<<<<< HEAD
	$posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type' => 'wpcf7_contact_form',
			'post_status' => 'any',
		)
	);
=======
	$posts = get_posts( array(
		'numberposts' => -1,
		'post_type' => 'wpcf7_contact_form',
		'post_status' => 'any' ) );
>>>>>>> c19ca9f4e960d9c090efc8092a7090f8b56fa0ca

	foreach ( $posts as $post ) {
		wp_delete_post( $post->ID, true );
	}

	$wpdb->query( sprintf( "DROP TABLE IF EXISTS %s",
		$wpdb->prefix . 'contact_form_7' ) );
}

wpcf7_delete_plugin();
