<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version     9.9.9
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo $email_heading . "\n\n";

echo sprintf( esc_html__( "Thanks for creating an account on %s. Your username is <strong>%s</strong>.", 'ABdev_incomeup' ), $blogname, $user_login ) . "\n\n";

if ( get_option( 'woocommerce_registration_generate_password' ) === 'yes' && $password_generated )
	echo sprintf( esc_html__( "Your password is <strong>%s</strong>.", 'ABdev_incomeup' ), $user_pass ) . "\n\n";

echo sprintf( esc_html__( 'You can access your account area to view your orders and change your password here: %s.', 'ABdev_incomeup' ), get_permalink( wc_get_page_id( 'myaccount' ) ) ) . "\n\n";

echo "\n****************************************************\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );