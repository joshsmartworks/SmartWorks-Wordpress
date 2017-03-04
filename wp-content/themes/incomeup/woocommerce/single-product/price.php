<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>

<?php if ( $price_html = $product->get_price_html() ) :
	$separator = get_option('woocommerce_price_decimal_sep');
	$pattern[] = '/\\'.$separator.'([0-9]*)/';
	$price_html = preg_replace($pattern, ''.$separator.'$1', $price_html);
endif; ?>
