<?php
/**
 * Cart Page
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

		<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

			<div class="row">

				<div id="content_with_right_sidebar" class="span12">


					<?php

					wc_print_notices();

					do_action( 'woocommerce_before_cart' ); ?>


					<?php do_action( 'woocommerce_before_cart_table' ); ?>

					<table class="shop_table cart" cellspacing="0">
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
						<tbody>
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>

							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									?>
									<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

										<td class="product-thumbnail">
											<?php

												$thumbnail = get_the_post_thumbnail($_product->id, 'full');

												if ( ! $_product->is_visible() )
													echo $thumbnail;
												else
													printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
											?>
										</td>

										<td class="product-name">
											<?php
												$brand_out = '';
												$brands = get_the_terms( $_product->id, 'pa_'.get_theme_mod('brand_slug', false));
												if (is_array($brands)) {
													foreach ( $brands as $brand ) {
													$brand_out = ' <span class="brand_line">'.esc_html__('by','ABdev_incomeup').' <span class="brand_name">'.$brand->name.'</span></span>';
													}
												}

												if ( ! $_product->is_visible() )
													echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . $brand_out;
												else
													echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key ) . $brand_out;
												?>

												<div class="sku_number">
													<span><?php esc_html_e('SKU:', 'ABdev_incomeup'); ?></span>
													<?php echo ( $sku = $_product->get_sku() ) ? $sku : esc_html__( 'n/a', 'ABdev_incomeup' ); ?>
												</div>

												<?php
												// Meta data
												echo WC()->cart->get_item_data( $cart_item );

					               				// Backorder notification
					               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
					               					echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'ABdev_incomeup' ) . '</p>';
											?>
										</td>

										<td class="product-price">
											<?php
												$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
												if ( $product_price != '' ){
													$separator = get_option('woocommerce_price_decimal_sep');
													$pattern[0] = '/\\'.$separator.'([0-9]*)/';
													$product_price = preg_replace($pattern, ''.$separator.'$1', $product_price);
												}
												echo $product_price;
											?>
										</td>

										<td class="product-quantity">
											<?php
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input( array(
														'input_name'  => "cart[{$cart_item_key}][qty]",
														'input_value' => $cart_item['quantity'],
														'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
													), $_product, false );
												}

												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
											?>
										</td>

										<td class="product-subtotal">
											<?php
												$product_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
												if ( $product_subtotal != '' ){
													$separator = get_option('woocommerce_price_decimal_sep');
													$pattern[0] = '/\\'.$separator.'([0-9]*)/';
													$product_subtotal = preg_replace($pattern, ''.$separator.'$1', $product_subtotal);
												}
												echo $product_subtotal;
											?>
										</td>

										<td class="product-remove">
											<?php
												echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><i class="ci_icon-close"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'ABdev_incomeup' ) ), $cart_item_key );
											?>
										</td>

									</tr>
									<?php
								}
							}

							do_action( 'woocommerce_cart_contents' );
							?>
							<tr>
								<td colspan="6" class="actions">

									<?php if ( WC()->cart->coupons_enabled() ) { ?>
										<div class="coupon">

											<h5><?php esc_html_e( 'Have a Coupon?', 'ABdev_incomeup' ); ?></h5><br>

											<label for="coupon_code"><?php esc_html_e( 'Coupon', 'ABdev_incomeup' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_html_e( 'Enter coupon', 'ABdev_incomeup' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'ABdev_incomeup' ); ?>" />

											<?php do_action('woocommerce_cart_coupon'); ?>

										</div>
									<?php } ?>

									<?php wp_nonce_field( 'woocommerce-cart' ); ?>
								</td>
							</tr>

							<?php do_action( 'woocommerce_after_cart_contents' ); ?>
						</tbody>
					</table>

					<?php do_action( 'woocommerce_after_cart_table' ); ?>



					<div class="clear"></div>

					<?php do_action( 'woocommerce_cart_collaterals' ); ?>

					<?php do_action( 'woocommerce_after_cart' ); ?>

				</div>

			</div>

			<div class="row">

				<div class="shipping_calculator span6">
					<?php woocommerce_shipping_calculator(); ?>
				</div>
				<div class="cart-collaterals span6">
					<?php woocommerce_cart_totals(); ?>
					<input type="submit" class="button button-link" name="update_cart" value="<?php esc_html_e( 'Update Cart', 'ABdev_incomeup' ); ?>" />
					<input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="<?php esc_html_e( 'Proceed to Checkout', 'ABdev_incomeup' ); ?>" />
				</div>

			</div>

		</form>

	</div>
</section>

