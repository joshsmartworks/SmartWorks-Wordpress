<?php
/**
 * Customer Reset Password email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php esc_html_e( 'Someone requested that the password be reset for the following account:', 'ABdev_incomeup' ); ?></p>
<p><?php printf( esc_html__( 'Username: %s', 'ABdev_incomeup' ), $user_login ); ?></p>
<p><?php esc_html_e( 'If this was a mistake, just ignore this email and nothing will happen.', 'ABdev_incomeup' ); ?></p>
<p><?php esc_html_e( 'To reset your password, visit the following address:', 'ABdev_incomeup' ); ?></p>
<p>
    <a href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', get_permalink( wc_get_page_id( 'myaccount' ) ) ) ) ); ?>">
			<?php esc_html_e( 'Click here to reset your password', 'ABdev_incomeup' ); ?></a>
</p>
<p></p>

<?php do_action( 'woocommerce_email_footer' ); ?>