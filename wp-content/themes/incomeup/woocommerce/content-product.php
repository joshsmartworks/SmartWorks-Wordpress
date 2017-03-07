<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

$count = 0;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ){
	$count   = $product->get_rating_count();
	$average = $product->get_average_rating();
}

if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

if ( ! $product || ! $product->is_visible() )
	return;

$woocommerce_loop['loop']++;

$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

$classes[] .= 'grid_product';
?>


<li <?php post_class( $classes ); ?> >

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php

			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<?php do_action( 'woocommerce_product_loop_images_before' );?>

		<div class="products_loop_image_wrapper">


	        <div class="<?php echo ($attachment_ids) ? 'product_images_inner_wrapper' : 'product_single_image_zoom_wrapper'; ?>">
		        <div class="products_loop_image_main"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full') ?></a></div>
				<?php if ($attachment_ids):?>
					<div class="products_loop_image_secondary"><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $attachment_ids[0], 'full' ); ?></a></div>
				<?php endif; ?>
			</div>


			<div class="product_quick_view">
			<?php if($attachment_ids): ?>
				<?php $first_image = wp_get_attachment_image_src($attachment_ids[0], 'full'); ?>
				<a itemprop="image" data-rel="prettyPhoto[product-gallery]<?php echo $product->id;?>" href="<?php echo $first_image[0]; ?>"><?php echo esc_html('Quick view', 'ABdev_incomeup'); ?></a>
				<div class="hidden_gallery">
				<?php foreach($attachment_ids as $image_id){
					$image_url = wp_get_attachment_image_src( $image_id, 'full' );
					echo '<a itemprop="image" data-rel="prettyPhoto[product-gallery]'.$product->id.'" href="'.$image_url[0].'">'.wp_get_attachment_image( $image_id, 'full' ).'</a>';
				}; ?>
				</div>
			<?php else: ?>
				<?php $single_image_id = get_post_thumbnail_id($post->ID);
					$single_image_object = get_post($single_image_id);?>
				<a itemprop="image" data-rel="prettyPhoto[product-gallery]<?php echo $product->id;?>" href="<?php echo $single_image_object->guid; ?>"><?php echo esc_html('Quick view', 'ABdev_incomeup'); ?></a>
			<?php endif; ?>
			</div>
		</div>

		<?php
			$brand_out = '';
			$brands = get_the_terms( $product->id, 'pa_'.get_theme_mod('brand_slug', false));
			if (is_array($brands)) {
				foreach ( $brands as $brand ) {
				$brand_out = ' <span class="brand_line">'.esc_html__('by','ABdev_incomeup').' <span class="brand_name">'.$brand->name.'</span></span>';
				}
			}
		 ?>
		<div class="grid_title_wrapper">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); echo $brand_out; ?></a></h3>
		   	<p class="category"><?php echo strip_tags($product->get_categories(', ', '', '')) ?></p>
		   	<?php if ( $count > 0 ) : ?>
				<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'ABdev_incomeup' ), $average ); ?>">
					<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"></span>
				</div>
			<?php endif; ?>
		</div>
		<?php

			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php do_action( 'woocommerce_product_loop_images_after' );?>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>