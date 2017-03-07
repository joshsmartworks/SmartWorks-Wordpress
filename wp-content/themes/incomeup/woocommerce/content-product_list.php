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

global $product, $woocommerce_loop, $post;

$attachment_ids = $product->get_gallery_attachment_ids();

?>
<li <?php post_class( 'incomeup_products_list' ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full') ?></a>

		<?php
			$brand_out = '';
			$brands = get_the_terms( $product->id, 'pa_'.get_theme_mod('brand_slug', false));
			if (is_array($brands)) {
				foreach ( $brands as $brand ) {
				$brand_out = ' <span class="brand_line">'.esc_html__('by','ABdev_incomeup').' <span class="brand_name">'.$brand->name.'</span></span>';
				}
			}
		 ?>

		<?php
			$days_old = floor((time() - strtotime(get_the_date())) / 86400);
			$consider_new = (get_theme_mod('consider_new' ,false) != '') ? get_theme_mod('consider_new' ,false) : 5;

			if ( $consider_new > $days_old ){
				$badges[] = '<span class="new"><span>'.esc_html__('NEW', 'ABdev_incomeup').'</span></span>';
			}

			if ( $product->is_on_sale() ){
				$badges[] = apply_filters( 'woocommerce_sale_flash', '<span class="onsale list_view"><span>'.esc_html__('ON SALE', 'ABdev_incomeup').'</span></span>', $post, $product );
			}

			if ( $product->is_featured() ){
				$badges[] = '<span class="featured"><i class="ci_icon-star"></i></span>';
			}

			if(!empty($badges)){
				echo '<div class="product_badges">'.implode('', $badges).'</div>';
			}
		?>

		<div class="incomeup_products_list_view">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); echo $brand_out; ?></a></h3>

		    <p class="category"><?php echo strip_tags($product->get_categories(', ', '', '')) ?></p>

			<div class="rating_price">

				<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>

				<?php
					$count = 0;
					if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ){
						$count   = $product->get_rating_count();
						$average = $product->get_average_rating();
					}
				?>

				<?php if ( $count > 0 ) : ?>
					<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'ABdev_incomeup' ), $average ); ?>">
						<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"></span>
					</div>
					<span class="count"> (<?php echo $count;?>)  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Add Review', 'ABdev_incomeup');?></a></span>

					<?php else : ?>
						<span class="rating"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Add Review', 'ABdev_incomeup');?></a> | <?php esc_html_e('No Reviews Yet', 'ABdev_incomeup');?></span>
				<?php endif; ?>

				<?php
					$availability = $product->get_availability();
					if ( $availability['availability'] )
						echo apply_filters( 'woocommerce_stock_html', '<span class="stock ' . esc_attr( $availability['class'] ) . '"><span class="single_product_availability">'.esc_html__('Availability:','ABdev_incomeup').'</span>'. esc_html( $availability['availability'] ) . '</span>', $availability['availability'] );
				?>

			</div>

		    <div class="description"><?php the_excerpt() ?></div>

		    <div class="cart_list_item">
		    	<?php if ( $product->is_in_stock() ) : ?>

					<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

					<form class="cart" method="post" enctype='multipart/form-data'>
					 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

					 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

					 	<?php if ( $product->is_type( array( 'variable', 'grouped' ) ) ) : ?>
							<a class="add_cart_wishlist button" rel="nofollow" href="<?php echo get_permalink();?>"><i class="ci_icon-th-list"></i><?php esc_html_e('Select options', 'ABdev_incomeup');?></a>
						<?php else: ?>
							<button type="submit" class="single_add_to_cart_button button alt"><i class="ci_icon-shopping-cart"></i><?php echo $product->single_add_to_cart_text(); ?></button>
						<?php endif; ?>

						<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
						<?php do_action( 'ABdev_woocommerce_before_add_to_cart_button' ); ?>

						<?php

						if(in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins'))) ){
							echo do_shortcode('[yith_wcwl_add_to_wishlist]');
						}

						?>

					</form>

					<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>


				<?php endif; ?>
			</div>

		</div>

	<?php
	remove_action('woocommerce_after_shop_loop_item', 'wccm_add_button', 10);
	do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>