<?php
/**
 * Email Addresses (plain)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo "\n" . esc_html__( 'Billing address', 'ABdev_incomeup' ) . ":\n";
echo $order->get_formatted_billing_address() . "\n\n";

if ( get_option( 'woocommerce_ship_to_billing_address_only' ) == 'no' && ( $shipping = $order->get_formatted_shipping_address() ) ) :

	echo esc_html__( 'Shipping address', 'ABdev_incomeup' ) . ":\n";

	echo $shipping . "\n\n";

endif;