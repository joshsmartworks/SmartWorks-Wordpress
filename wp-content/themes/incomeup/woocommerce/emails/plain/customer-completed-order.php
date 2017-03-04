<?php
/**
 * Customer completed order email (plain text)
 *
 * @author		WooThemes
 * @package		WooCommerce/Templates/Emails/Plain
 * @version		9.9.9
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo $email_heading . "\n\n";

echo sprintf( esc_html__( "Hi there. Your recent order on %s has been completed. Your order details are shown below for your reference:", 'ABdev_incomeup' ), get_option( 'blogname' ) ) . "\n\n";

echo "****************************************************\n\n";

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text );

echo sprintf( esc_html__( 'Order number: %s', 'ABdev_incomeup'), $order->get_order_number() ) . "\n";
echo sprintf( esc_html__( 'Order date: %s', 'ABdev_incomeup'), date_i18n( wc_date_format(), strtotime( $order->order_date ) ) ) . "\n";

do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text );

echo "\n" . $order->email_order_items_table( true, false, true, '', '', true );

echo "----------\n\n";

if ( $totals = $order->get_order_item_totals() ) {
	foreach ( $totals as $total ) {
		echo $total['label'] . "\t " . $total['value'] . "\n";
	}
}

echo "\n****************************************************\n\n";

do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text );

echo esc_html__( 'Your details', 'ABdev_incomeup' ) . "\n\n";

if ( $order->billing_email )
	echo esc_html__( 'Email:', 'ABdev_incomeup' ); echo $order->billing_email . "\n";

if ( $order->billing_phone )
	echo esc_html__( 'Tel:', 'ABdev_incomeup' ); ?> <?php echo $order->billing_phone . "\n";

wc_get_template( 'emails/plain/email-addresses.php', array( 'order' => $order ) );

echo "\n****************************************************\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );