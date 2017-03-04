<?php
/**
 * Customer note email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php esc_html_e( "Hello, a note has just been added to your order:", 'ABdev_incomeup' ); ?></p>

<blockquote><?php echo wpautop( wptexturize( $customer_note ) ) ?></blockquote>

<p><?php esc_html_e( "For your reference, your order details are shown below.", 'ABdev_incomeup' ); ?></p>

<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>

<h2><?php echo esc_html__( 'Order:', 'ABdev_incomeup' ) . ' ' . $order->get_order_number(); ?></h2>

<table style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_html_e( 'Product', 'ABdev_incomeup' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_html_e( 'Quantity', 'ABdev_incomeup' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_html_e( 'Price', 'ABdev_incomeup' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<h2><?php esc_html_e( 'Customer details', 'ABdev_incomeup' ); ?></h2>

<?php if ($order->billing_email) : ?>
	<p><strong><?php esc_html_e( 'Email:', 'ABdev_incomeup' ); ?></strong> <?php echo $order->billing_email; ?></p>
<?php endif; ?>
<?php if ($order->billing_phone) : ?>
	<p><strong><?php esc_html_e( 'Tel:', 'ABdev_incomeup' ); ?></strong> <?php echo $order->billing_phone; ?></p>
<?php endif; ?>

<?php wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>