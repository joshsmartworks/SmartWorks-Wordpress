<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$days_old = floor((time() - strtotime(get_the_date())) / 86400);
$consider_new = (get_theme_mod('consider_new' ,false) != '') ? get_theme_mod('consider_new' ,false) : 5;

if ( $consider_new > $days_old ){
	$badges[] = '<span class="new"><span>'.esc_html__('NEW', 'ABdev_incomeup').'</span></span>';
}

if ( $product->is_on_sale() ){
	$badges[] = apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span>'.esc_html__('ON SALE', 'ABdev_incomeup').'</span></span>', $post, $product );
}

if ( $product->is_featured() ){
	$badges[] = '<span class="featured"><i class="ci_icon-star"></i></span>';
}


if(!empty($badges)){
	echo '<div class="product_badges">'.implode('', $badges).'</div>';
}




