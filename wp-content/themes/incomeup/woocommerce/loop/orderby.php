<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby select_box_it">
		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => esc_html__( 'Default sorting', 'ABdev_incomeup' ),
				'popularity' => esc_html__( 'Sort by popularity', 'ABdev_incomeup' ),
				'rating'     => esc_html__( 'Sort by average rating', 'ABdev_incomeup' ),
				'date'       => esc_html__( 'Sort by newness', 'ABdev_incomeup' ),
				'price'      => esc_html__( 'Sort by price: low to high', 'ABdev_incomeup' ),
				'price-desc' => esc_html__( 'Sort by price: high to low', 'ABdev_incomeup' )
			) );

			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
				unset( $catalog_orderby['rating'] );

			foreach ( $catalog_orderby as $id => $name )
				echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
		?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' == $key )
				continue;

			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}

			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
