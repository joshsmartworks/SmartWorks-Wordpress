<?php
/**
 * Order tracking
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php
	$status = get_term_by( 'slug', $order->status, 'shop_order_status' );

	$order_status_text = sprintf( esc_html__( 'Order %s which was made %s has the status &ldquo;%s&rdquo;', 'ABdev_incomeup' ), $order->get_order_number(), human_time_diff( strtotime( $order->order_date ), current_time( 'timestamp' ) ) . ' ' . esc_html__( 'ago', 'ABdev_incomeup' ), esc_html__( $status->name, 'ABdev_incomeup' ) );

	if ( $order->status === 'completed' ) $order_status_text .= ' ' . esc_html__( 'and was completed', 'ABdev_incomeup' ) . ' ' . human_time_diff( strtotime( $order->completed_date ), current_time( 'timestamp' ) ) . esc_html__( ' ago', 'ABdev_incomeup' );

	$order_status_text .= '.';

	echo wpautop( esc_attr( apply_filters( 'woocommerce_order_tracking_status', $order_status_text, $order ) ) );
?>

<?php
	$notes = $order->get_customer_order_notes();
	if ( $notes ) :
		?>
		<h2><?php esc_html_e( 'Order Updates', 'ABdev_incomeup' ); ?></h2>
		<ol class="commentlist notes">
			<?php foreach ( $notes as $note ) : ?>
			<li class="comment note">
				<div class="comment_container">
					<div class="comment-text">
						<p class="meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'ABdev_incomeup' ), strtotime( $note->comment_date ) ); ?></p>
						<div class="description">
							<?php echo wpautop( wptexturize( wp_kses_post( $note->comment_content ) ) ); ?>
						</div>
		  				<div class="clear"></div>
		  			</div>
					<div class="clear"></div>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
		<?php
	endif;
?>

<?php do_action( 'woocommerce_view_order', $order->id ); ?>
