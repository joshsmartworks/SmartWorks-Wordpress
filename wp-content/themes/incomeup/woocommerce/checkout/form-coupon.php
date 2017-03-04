<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! WC()->cart->coupons_enabled() )
	return;

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'ABdev_incomeup' ) );
$info_message .= ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'ABdev_incomeup' ) . '</a>';
wc_print_notice( $info_message, 'notice' );
?>

<form class="checkout_coupon" method="post" style="display:none">

	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e( 'Coupon code', 'ABdev_incomeup' ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-row form-row-last">
		<input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'ABdev_incomeup' ); ?>" />
	</p>

	<div class="clear"></div>
</form>