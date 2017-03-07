<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="single_product_images_wrapper">
<div class="product_image_wrapper">
	<?php do_action( 'woocommerce_single_product_before_image' ); ?>

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div><a href="%s" itemprop="image" class="woocommerce-main-image" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></div>', $image_link, $image_title, $image ), $post->ID );

			$attachment_ids = $product->get_gallery_attachment_ids();

			$loop = 0;

			foreach ( $attachment_ids as $attachment_id ) {
				$classes[] = 'image-'.$attachment_id;

				$image_link = wp_get_attachment_url( $attachment_id );

				if ( ! $image_link )
					continue;

				$image	   = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				$image_class = esc_attr( implode( ' ', $classes ) );
				$image_title = esc_attr( get_the_title( $attachment_id ) );

				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div><a href="%s" itemprop="image" class="woocommerce-main-image" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></div>', $image_link, $image_title, $image ), $attachment_id, $post->ID, $image_class );

				$loop++;
			}

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>

</div>
		<?php do_action( 'woocommerce_product_thumbnails' ); ?>
