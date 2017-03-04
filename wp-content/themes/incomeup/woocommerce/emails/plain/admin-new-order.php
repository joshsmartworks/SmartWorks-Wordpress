<?php
/**
 * Admin new order email (plain text)
 *
 * @author		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version 	9.9.9
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo $email_heading . "\n\n";

echo sprintf( esc_html__( 'You have received an order from %s. Their order is as follows:', 'ABdev_incomeup' ), $order->billing_first_name . ' ' . $order->billing_last_name ) . "\n\n";

echo "****************************************************\n\n";

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text );

echo sprintf( esc_html__( 'Order number: %s', 'ABdev_incomeup'), $order->get_order_number() ) . "\n";
echo sprintf( esc_html__( 'Order link: %s', 'ABdev_incomeup'), admin_url( 'post.php?post=' . $order->id . '&action=edit' ) ) . "\n";
echo sprintf( esc_html__( 'Order date: %s', 'ABdev_incomeup'), date_i18n( esc_html__( 'jS F Y', 'ABdev_incomeup' ), strtotime( $order->order_date ) ) ) . "\n";

do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text );

echo "\n" . $order->email_order_items_table( false, true, '', '', '', true );

echo "----------\n\n";

if ( $totals = $order->get_order_item_totals() ) {
	foreach ( $totals as $total ) {
		echo $total['label'] . "\t " . $total['value'] . "\n";
	}
}

echo "\n****************************************************\n\n";

do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text );

echo esc_html__( 'Customer details', 'ABdev_incomeup' ) . "\n";

if ( $order->billing_email )
	echo esc_html__( 'Email:', 'ABdev_incomeup' ); echo $order->billing_email . "\n";

if ( $order->billing_phone )
	echo esc_html__( 'Tel:', 'ABdev_incomeup' ); ?> <?php echo $order->billing_phone . "\n";

wc_get_template( 'emails/plain/email-addresses.php', array( 'order' => $order ) );

echo "\n****************************************************\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );