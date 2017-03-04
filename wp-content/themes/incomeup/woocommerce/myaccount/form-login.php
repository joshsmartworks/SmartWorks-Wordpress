<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>

		<h4 class="title_alternative_style"><?php esc_html_e( 'Login to Your Account', 'ABdev_incomeup' ); ?></h4>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="form-row form-row-wide">
				<input type="text" class="input-text" name="username" id="username" placeholder="Email"><i class="ci_icon-emailalt"></i></input>
			</p>
			<p class="form-row form-row-wide">
				<input class="input-text" type="password" name="password" id="password" placeholder="Password"><i class="ci_icon-unlock"></i></input>
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
			</p>
			<label for="rememberme" class="inline">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'ABdev_incomeup' ); ?>
			</label>
			<p class="lost_password">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'ABdev_incomeup' ); ?></a>
			</p>

			<input type="submit" class="button" name="login" value="<?php esc_html_e( 'Log In', 'ABdev_incomeup' ); ?>" />
			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2">

		<h2 class="title_alternative_style"><?php esc_html_e( 'Register', 'ABdev_incomeup' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( get_option( 'woocommerce_registration_generate_username' ) === 'no' ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'ABdev_incomeup' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'ABdev_incomeup' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) esc_attr( $_POST['email'] ); ?>" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password"><?php esc_html_e( 'Password', 'ABdev_incomeup' ); ?> <span class="required">*</span></label>
				<input type="password" class="input-text" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) esc_attr( $_POST['password'] ); ?>" />
			</p>

			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'ABdev_incomeup' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
				<input type="submit" class="button" name="register" value="<?php esc_html_e( 'Register', 'ABdev_incomeup' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>