<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<label for="<?php echo esc_attr( $input_name ); ?>" class="quantity_label"><?php esc_html_e('Quantity', 'ABdev_incomeup'); ?></label>
<div class="quantity"><input type="number" step="<?php echo esc_attr( $step ); ?>" <?php if ( is_numeric( $min_value ) ) : ?>min="<?php echo esc_attr( $min_value ); ?>"<?php endif; ?> <?php if ( is_numeric( $max_value ) ) : ?>max="<?php echo esc_attr( $max_value ); ?>"<?php endif; ?> name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" class="input-text qty text" size="4" /></div>