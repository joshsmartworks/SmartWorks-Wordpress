<?php

/*********** Shortcode: QR Code ************************************************************/

$tcvpb_elements['qrcode_tc'] = array(
	'name' => esc_html__('QR Code', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-qrcode',
	'category' =>  esc_html__('E-Commerce', 'ABdev_incomeup'),
	'attributes' => array(
		'alt' => array(
			'description' => esc_html__('Alt Text', 'ABdev_incomeup'),
		),
		'size' => array(
			'default' => '150',
			'description' => esc_html__('Size (px)', 'ABdev_incomeup'),
		),
		'align' => array(
			'default' => '',
			'description' => esc_html__('Align', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'' => esc_html__('None', 'ABdev_incomeup'),
				'left' => esc_html__('Left', 'ABdev_incomeup'),
				'right' => esc_html__('Right', 'ABdev_incomeup'),
			),
			'divider' => 'true',
		),
		'mecard_name' => array(
			'description' => esc_html__('MeCard Name', 'ABdev_incomeup'),
		),
		'mecard_address' => array(
			'description' => esc_html__('MeCard Address', 'ABdev_incomeup'),
		),
		'mecard_tel' => array(
			'description' => esc_html__('MeCard Telephone', 'ABdev_incomeup'),
		),
		'mecard_email' => array(
			'description' => esc_html__('MeCard Email', 'ABdev_incomeup'),
		),
		'mecard_url' => array(
			'description' => esc_html__('MeCard URL', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'quality' => array(
			'default' => 'H',
			'description' => esc_html__('Quality', 'ABdev_incomeup'),
			'type' => 'select',
			'values' => array(
				'H' => esc_html__('H', 'ABdev_incomeup'),
				'L' => esc_html__('L', 'ABdev_incomeup'),
				'M' => esc_html__('M', 'ABdev_incomeup'),
				'Q' => esc_html__('Q', 'ABdev_incomeup'),
			),
		),
		'border' => array(
			'default' => '1',
			'type' => 'checkbox',
			'description' => esc_html__('Border', 'ABdev_incomeup'),
		),
		'content' => array(
			'default' => 'http://'.$_SERVER['HTTP_HOST'],
			'description' => esc_html__('Content', 'ABdev_incomeup'),
		),
		'current_url' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => esc_html__('Use current page/post URL', 'ABdev_incomeup'),
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
function tcvpb_qrcode_tc_shortcode($attributes, $content = null) {
	extract(shortcode_atts(tcvpb_extract_attributes('qrcode_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';
	$class_out = ($class!='') ? 'class='.$class.'' : '';

	if($current_url=='1')
		$content = tcvpb_current_page_url();

	if($mecard_name!='' || $mecard_address!='' || $mecard_tel!='' || $mecard_email!='' || $mecard_url!=''){
		$mecard="MECARD:";
		if($mecard_name!='')
			$mecard.="N:$mecard_name;";
		if($mecard_address!='')
			$mecard.="ADR:$mecard_address;";
		if($mecard_tel!='')
			$mecard.="TEL:$mecard_tel;";
		if($mecard_email!='')
			$mecard.="EMAIL:$mecard_email;";
		if($mecard_url!='')
			$mecard.="URL:$mecard_url;";
		if($content!='')
			$mecard.="NOTE:$content;";
		$content=$mecard;
	}

	$content = urlencode($content);

	if (empty($align) && $align !==0)
		$align = "";
	else
		$align = strip_tags(trim($align));

	$image = 'http://chart.apis.google.com/chart?cht=qr&amp;chld='.$quality.'|'.$border.'&amp;chs=' . $size . 'x' . $size . '&amp;chl=' . $content;

	if ($align == "right")
		$align = ' align="right"';
	if ($align == "left")
		$align = ' align="left"';

	return '<img '.esc_attr($id_out).' '.esc_attr($class_out).' src="' . esc_url($image) . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($alt) . '" width="' . esc_attr($size) . '" height="' . esc_attr($size) . '"' . $align .' />';
}

