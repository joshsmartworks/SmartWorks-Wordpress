<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<div class="comment-text">

			<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>



			<?php endif; ?>

			<?php if ( $comment->comment_approved == '0' ) : ?>

				<p class="meta"><em><?php esc_html_e( 'Your comment is awaiting approval', 'ABdev_incomeup' ); ?></em></p>

			<?php else : ?>

				<p class="meta">
					<strong itemprop="author"><?php comment_author(); ?></strong>

					<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( esc_html__( 'Rated %d out of 5', 'ABdev_incomeup' ), $rating ) ?>">
						<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php esc_html_e( 'out of 5', 'ABdev_incomeup' ); ?></span>
					</div>

					<?php

						if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
							if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
								echo '<em class="verified">(' . esc_html__( 'verified owner', 'ABdev_incomeup' ) . ')</em> ';

					?>

					<time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( esc_html__( get_option( 'date_format' ), 'ABdev_incomeup' ) ); ?></time>
				</p>

			<?php endif; ?>

			<div itemprop="description" class="description"><?php comment_text(); ?></div>
		</div>
	</div>
