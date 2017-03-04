<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) :
	$separator = get_option('woocommerce_price_decimal_sep');

	$pattern[] = '/\\'.$separator.'([0-9]*)/';

	$price_html = preg_replace($pattern, ''.$separator.'$1', $price_html);

?>
	<span class="price"><?php echo $price_html; ?></span>
<?php endif; ?>