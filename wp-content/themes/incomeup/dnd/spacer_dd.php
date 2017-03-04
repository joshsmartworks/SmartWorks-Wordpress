<?php

/*********** Shortcode: Spacer ************************************************************/

$ABdevDND_shortcodes['spacer_dd'] = array(
	'attributes' => array(
		'pixels' => array(
			'default' => '15',
			'description' => __('Height in Pixels', 'dnd-shortcodes'),
		),
		'responsive_hide_mobile' => array(
			'description' => __( 'Hide Spacer on Mobile Size', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'responsive_hide_tablet' => array(
			'description' => __( 'Hide Spacer on Tablet Size', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
	),
	'description' => __('Spacer', 'dnd-shortcodes'),
	'info' => __('This shortcode will add additional vertical space between elements', 'dnd-shortcodes')
);
function ABdevDND_spacer_dd_shortcode( $attributes ) {
    extract(shortcode_atts(ABdevDND_extract_attributes('spacer_dd'), $attributes));

    $responsive_hide_mobile = ($responsive_hide_mobile) ? 'spacer_responsive_hide_mobile' : '';
    $responsive_hide_tablet = ($responsive_hide_tablet) ? 'spacer_responsive_hide_tablet' : '';

    return '<span class="clear '.esc_attr($responsive_hide_mobile).' '.esc_attr($responsive_hide_tablet).'" style="height:'.esc_attr($pixels).'px;display:block;"></span>';
    
}


