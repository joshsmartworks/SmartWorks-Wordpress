<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}
	?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="product_breadcrumbs">
		<?php
			if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
				esc_html_e('Listed in Category: ', 'ABdev_incomeup');
				$main_term = $terms[0];
				$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor ) {
					$ancestor = get_term( $ancestor, 'product_cat' );
					if ( ! is_wp_error( $ancestor ) && $ancestor )
						echo '<a href="' . get_term_link( $ancestor->slug, 'product_cat' ) . '">' . $ancestor->name . '</a> > ';
				}
				echo '<a href="' . get_term_link( $main_term->slug, 'product_cat' ) . '">' . $main_term->name . '</a>';
			}
		?>
	</div>



	<div class="clear"></div>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>


	<div class="summary entry-summary">

		<?php


			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );


		if(in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins'))) ){
			echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		}

		?>

	<p id="incomeup_woo_product_share"> <?php esc_html_e('Share: ','ABdev_incomeup') ?>
		<a target="_blank" class="product_share_facebook dnd_tooltip" data-gravity="s" title="<?php esc_html_e('Share on Facebook', 'ABdev_incomeup') ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>"><i class="ci_icon-facebook"></i></a>
		<a target="_blank" class="product_share_twitter dnd_tooltip" data-gravity="s" title="<?php esc_html_e('Share on Twitter', 'ABdev_incomeup') ?>" href="https://twitter.com/home?status=Check+this+<?php echo get_permalink();?>"><i class="ci_icon-twitter"></i></a>
		<a target="_blank" class="product_share_googleplus dnd_tooltip" data-gravity="s" title="<?php esc_html_e('Share on Google+', 'ABdev_incomeup') ?>" href="https://plus.google.com/share?url=<?php echo get_permalink();?>"><i class="ci_icon-googleplus"></i></a>
		<a target="_blank" class="product_share_linkedin dnd_tooltip" data-gravity="s" title="<?php esc_html_e('Share on Linkedin', 'ABdev_incomeup') ?>" href="https://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo urlencode(get_the_title());?>&amp;url=<?php echo get_permalink();?>"><i class="ci_icon-linkedin"></i></a>
		<a target="_blank" class="product_share_pinterest dnd_tooltip" data-gravity="s" title="<?php esc_html_e('Share on Pinterest', 'ABdev_incomeup') ?>" href="//pinterest.com/pin/create/link/?url=<?php echo urlencode(get_permalink());?>&amp;media=<?php echo urlencode(wp_get_attachment_url( get_post_thumbnail_id()));?>&amp;description=<?php echo urlencode(get_the_title());?>"><i class="ci_icon-pinterest"></i></a>
	</p>
	</div><!-- .summary -->
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
