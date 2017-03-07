<?php

/*********** Shortcode: Email Link ************************************************************/

$tcvpb_elements['email_tc'] = array(
	'name' => esc_html__('Email Link', 'ABdev_incomeup'),
	'description' => esc_html__('This shortcode will hide email address form spam bots using JavaScript method', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => ' pi-email-link',
	'category' =>  esc_html__('Social', 'ABdev_incomeup'),
	'attributes' => array(
		'email' => array(
			'description' => esc_html__('Email Address', 'ABdev_incomeup'),
		),
		'cloak' => array(
			'default' => '1',
			'type' => 'checkbox',
			'description' => esc_html__('Cloak Email from Spam Bots', 'ABdev_incomeup'),
		),
		'icon' => array(
			'description' => esc_html__('Icon', 'ABdev_incomeup'),
			'type' => 'icon',
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
	),
);
function tcvpb_email_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('email_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';
	$class_out = ($class!='') ? 'class='.$class.'' : '';

	$icon_output = ($icon!='') ? '<i class="'.esc_attr($icon).'"></i> ':'';

	if ($cloak!='1'){
		return '<a href="'.esc_url('mailto:'.$email).'" '.esc_attr($id_out).' '.esc_attr($class_out).' >'.$icon_output.''.$email.'</a>';
	}
	else{
		$email=explode('@',esc_attr($email));
		return $icon_output.'<script>
			document.write (\'<A HREF="mai\')
			document.write (\'lto:'.$email[0].'\')
			document.write (\'&#64;\')
			document.write (\''.$email[1].'">'.$email[0].'\')
			document.write (\'&#64;\')
			document.write (\''.$email[1].'</A>\')
		</script>';
	}
}


