<?php
/**
 * Email Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?><table style="width: 100%; vertical-align: top;" border="0">

	<tr>

		<td valign="top" width="50%">

			<h3><?php esc_html_e( 'Billing address', 'ABdev_incomeup' ); ?></h3>

			<p><?php echo $order->get_formatted_billing_address(); ?></p>

		</td>

		<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) == 'no' && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>

		<td valign="top" width="50%">

			<h3><?php esc_html_e( 'Shipping address', 'ABdev_incomeup' ); ?></h3>

			<p><?php echo $shipping; ?></p>

		</td>

		<?php endif; ?>

	</tr>

</table>