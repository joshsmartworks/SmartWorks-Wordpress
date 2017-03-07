<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product, $availability;
?>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<div class="single_product_navigation">
<?php previous_post_link('%link','<i class="ci_icon-woo-prev"></i>'); ?>
<?php next_post_link('%link','<i class="ci_icon-woo-next"></i>'); ?>
</div>

	<?php if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ): ?>

	<div class="single_product_ratings">
	<?php

		$count   = $product->get_rating_count();
		$average = $product->get_average_rating();
	?>

	<?php if ( $count > 0 ) : ?>

		<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
			<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'ABdev_incomeup' ), $average ); ?>">
				<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"></span>
			</div>
		</div>
		(<span itemprop="ratingCount" class="count"><?php echo $count;?></span>)<span class="count"> | <a class="add_review_link" href="#reviews"><?php esc_html_e('Add Review', 'ABdev_incomeup');?></a></span>

		<?php else : ?>
		<span class="rating"><?php esc_html_e('No Reviews Yet', 'ABdev_incomeup');?> | <a class="add_review_link" href="<?php the_permalink(); ?>"><?php esc_html_e('Add Review', 'ABdev_incomeup');?></a></span>
	<?php endif; ?>


</div>
<?php endif; ?>

	<?php if ( $price_html = $product->get_price_html() ) :
		$separator = get_option('woocommerce_price_decimal_sep');
		$pattern[] = '/\\'.$separator.'([0-9]*)/';
		$price_html = preg_replace($pattern, ''.$separator.'$1', $price_html);
	endif; ?>

<div class="itemprop_offers" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price"><?php echo $price_html; ?></p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	<?php echo '<span class="single_product_sku">'.__('SKU:','ABdev_incomeup'). '' . $product->sku . '</span>' ?>

	<?php
	$availability = $product->get_availability();
	if ( $availability['availability'] )
		echo apply_filters( 'woocommerce_stock_html', '<span class="stock ' . esc_attr( $availability['class'] ) . '"><span class="single_product_availability">'.__('Availability:','ABdev_incomeup').'</span>'. esc_html( $availability['availability'] ) . '</span>', $availability['availability'] );
	?>

</div>