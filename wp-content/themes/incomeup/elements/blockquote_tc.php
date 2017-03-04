<?php

/*********** Shortcode: Blockquote ************************************************************/

$tcvpb_elements['blockquote_tc'] = array(
	'name' => esc_html__('Blockquote Block', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-blockquote',
	'category' => esc_html__('Content', 'ABdev_incomeup' ),
	'attributes' => array(
		'style' => array(
			'description' => esc_html__( 'Style', 'ABdev_incomeup' ),
			'default' => 'default',
			'type' => 'select',
			'values' => array(
				'style1' =>  esc_html__( 'Style 1', 'ABdev_incomeup' ),
				'style2' =>  esc_html__( 'Style 2', 'ABdev_incomeup' ),
				'style3' =>  esc_html__( 'Style 3', 'ABdev_incomeup' ),
				'style4' =>  esc_html__( 'Style 4', 'ABdev_incomeup' ),
				'wide' =>  esc_html__( 'Wide', 'ABdev_incomeup' ),
			),
		),
		'author' => array(
			'description' => esc_html__('Author', 'ABdev_incomeup'),
		),
		'url_author' => array(
			'description' => esc_html__('Author URL', 'ABdev_incomeup'),
		),
		'delimiter' => array(
			'description' => esc_html__('Delimiter between author and source', 'ABdev_incomeup'),
			'default' => ' ',
		),
		'source' => array(
			'description' => esc_html__('Source', 'ABdev_incomeup'),
		),
		'url_source' => array(
			'description' => esc_html__('Source URL', 'ABdev_incomeup'),
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
	'content' => array(
		'description' => esc_html__('Blockquote', 'ABdev_incomeup'),
	),
);
function tcvpb_blockquote_tc_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(tcvpb_extract_attributes('blockquote_tc'), $attributes));
	$id_out = ($id!='') ? 'id='.$id.'' : '';

	$quote ='';
	if($source!='' && $url_source!='')
		$source='<cite title="'.esc_attr($source).'"><a href="'.esc_url($url_source).'">'.$source.'</a></cite>';
	if($source!='' && $url_source=='')
		$source='<cite title="'.esc_attr($source).'">'.$source.'</cite>';
	if($author!='' && $url_author!='')
		$content.='<small><a href="'.esc_url($url_author).'">'.$author.'</a> '.$delimiter.$source.'</small>';
	if($author!='' && $url_author=='')
		$content.='<small>'.$author.$delimiter.$source.'</small>';
	return '<blockquote '.esc_attr($id_out).' class="tcvpb_blockquote tcvpb_blockquote_'.esc_attr($style).' '.esc_attr($class).'">
		'.$quote.'
		'.do_shortcode($content).'
	</blockquote>';
}