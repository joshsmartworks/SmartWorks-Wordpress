<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

if ( ! comments_open() )
	return;
?>
<div id="reviews">

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => esc_html__( 'Add a review', 'ABdev_incomeup' ),
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'ABdev_incomeup' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' .
							            '<input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'ABdev_incomeup' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email">' .
							            '<input id="email" name="email" type="text" placeholder="' . esc_html__( 'Email', 'ABdev_incomeup' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => esc_html__( 'Post review', 'ABdev_incomeup' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					$comment_form['comment_field'] = '<p class="comment-form-comment"><textarea placeholder="' . esc_html__( 'Your Review here', 'ABdev_incomeup' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false ) . '</p>';

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] .= '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Rating: ', 'ABdev_incomeup' ) .'</label><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate &hellip;', 'ABdev_incomeup' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'ABdev_incomeup' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'ABdev_incomeup' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'ABdev_incomeup' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'ABdev_incomeup' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'ABdev_incomeup' ) . '</option>
						</select></p>';
					}

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'ABdev_incomeup' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>

	<div id="comments">

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments', 'reverse_top_level' => true ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' 	=> '&larr;',
					'next_text' 	=> '&rarr;',
					'type'			=> 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'ABdev_incomeup' ); ?></p>

		<?php endif; ?>
	</div>

	<div class="clear"></div>
</div>