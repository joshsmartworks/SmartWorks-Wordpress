<?php
/**
 * Loop Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product,$yith_wcwl;

$count = 0;

if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ){
	$count   = $product->get_rating_count();
	$average = $product->get_average_rating();
}


if ( class_exists( 'YITH_WCWL_UI' ) )  {
	$url = $yith_wcwl->get_wishlist_url();
	$product_type = $product->product_type;
	$added = $yith_wcwl->is_product_in_wishlist( $product->id );
}

?>

<div class="grid_product_additionals" style="display:none;">
	<?php
	    if ($product->is_in_stock()){
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" data-textadded="'.esc_html__('Added', 'ABdev_incomeup').'" class="button %s product_type_%s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					($product->is_purchasable() && $product->is_in_stock() && !$product->is_type( 'variable' )) ? 'add_to_cart_button' : '',
					esc_attr( $product->product_type ),
					esc_html( $product->add_to_cart_text() )
				),
			$product );
	    } else{
	    	echo apply_filters( 'woocommerce_loop_add_to_cart_link', '<a class="out_of_stock">'.esc_html__('Out of stock', 'ABdev_incomeup').'</a>' );
	    }
	?>
	<div class="product_loop_hover_rating">
		<?php if(in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins'))) ): ?>
			<div class="yith-wcwl-add-to-wishlist add-to-wishlist-product-grid">
			    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

