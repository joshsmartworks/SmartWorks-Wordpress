<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<section id="incomeup_main_section" class="with_right_sidebar">
	<div class="container">
		<div class="row">
			<div id="content_with_right_sidebar" class="span9">
				<?php wc_print_notices();?>
				<table class="shop_table cart">
					<thead>
						<tr>
							<th class="product-thumbnail"><?php esc_html_e( 'Image', 'ABdev_incomeup' ); ?></th>
							<th class="product-name"><?php esc_html_e( 'Product', 'ABdev_incomeup' ); ?></th>
							<th class="product-price"><?php esc_html_e( 'Price', 'ABdev_incomeup' ); ?></th>
							<th class="product-quantity"><?php esc_html_e( 'Quantity', 'ABdev_incomeup' ); ?></th>
							<th class="product-subtotal"><?php esc_html_e( 'Total', 'ABdev_incomeup' ); ?></th>
							<th class="product-remove">&nbsp;</th>
						</tr>
					</thead>
				</table>
				<p class="cart-empty"><?php esc_html_e( 'You currently have no items in your cart.', 'ABdev_incomeup' ) ?></p>
				<?php do_action( 'woocommerce_cart_is_empty' ); ?>
				<p class="return-to-shop"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'Return To Shop', 'ABdev_incomeup' ) ?></a></p>
				<div class="clear"></div>
			</div>

			<aside class="span3 sidebar sidebar_right">
				<div class="cart-collaterals">
					<?php woocommerce_cart_totals(); ?>
				</div>
			</aside>
		</div>
	</div>
</section>
