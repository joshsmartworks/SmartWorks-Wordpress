<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $wp_query;

$prepend      = '';
$permalinks   = get_option( 'woocommerce_permalinks' );
$shop_page_id = wc_get_page_id( 'shop' );
$shop_page    = get_post( $shop_page_id );

// If permalinks contain the shop page in the URI prepend the breadcrumb with shop
if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) !== $shop_page_id ) {
	$prepend = $before . '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ' . $after . $delimiter;
}

if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) ) || is_paged() ) {

	echo $wrap_before;

	if ( ! empty( $home ) ) {
		echo '<div class="container">';
		echo '<h4 class="breadcrumb_page-title"> '. $shop_page->post_title .' </h4>';
		echo '<div class="breadcrumb_container">';
		echo $before . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) . '">' . $home . '</a>' . $after . $delimiter;
	}

	if ( is_category() ) {

		$cat_obj = $wp_query->get_queried_object();
		$this_category = get_category( $cat_obj->term_id );

		if ( $this_category->parent != 0 ) {
			$parent_category = get_category( $this_category->parent );
			echo get_category_parents($parent_category, TRUE, $delimiter );
		}

		echo $before . single_cat_title( '', false ) . $after;
		echo '</div>';

	} elseif ( is_tax( 'product_cat' ) ) {

		echo $prepend;

		$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		$ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

		foreach ( $ancestors as $ancestor ) {
			$ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

			echo $before .  '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after . $delimiter;
		}

		echo $before . esc_html( $current_term->name ) . $after;

		echo '</div>';

	} elseif ( is_tax( 'product_tag' ) ) {

		$queried_object = $wp_query->get_queried_object();
		echo $prepend . $before . esc_html__( 'Products tagged &ldquo;', 'ABdev_incomeup' ) . $queried_object->name . '&rdquo;' . $after;

		echo '</div>';

	} elseif ( is_day() ) {

		echo $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $after . $delimiter;
		echo $before . '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $after . $delimiter;
		echo $before . get_the_time( 'd' ) . $after;

		echo '</div>';

	} elseif ( is_month() ) {

		echo $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $after . $delimiter;
		echo $before . get_the_time( 'F' ) . $after;
		echo '</div>';

	} elseif ( is_year() ) {

		echo $before . get_the_time( 'Y' ) . $after;

	} elseif ( is_post_type_archive( 'product' ) && get_option( 'page_on_front' ) !== $shop_page_id ) {

		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

		if ( ! $_name ) {
			$product_post_type = get_post_type_object( 'product' );
			$_name = $product_post_type->labels->singular_name;
		}

		if ( is_search() ) {

			echo $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'ABdev_incomeup' ) . get_search_query() . '&rdquo;' . $after;
			echo '</div>';
		} elseif ( is_paged() ) {

			echo $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $after;
			echo '</div>';
		} else {

			echo $before . $_name . $after;
			echo '</div>';
		}

	} elseif ( is_single() && ! is_attachment() ) {

		if ( get_post_type() == 'product' ) {

			echo $prepend;

			if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {

				$main_term = $terms[0];

				$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );

				$ancestors = array_reverse( $ancestors );

				foreach ( $ancestors as $ancestor ) {
					$ancestor = get_term( $ancestor, 'product_cat' );

					if ( ! is_wp_error( $ancestor ) && $ancestor )
						echo $before . '<a href="' . get_term_link( $ancestor->slug, 'product_cat' ) . '">' . $ancestor->name . '</a>' . $after . $delimiter;
				}

				echo $before . '<a href="' . get_term_link( $main_term->slug, 'product_cat' ) . '">' . $main_term->name . '</a>' . $after . $delimiter;

			}

			echo $before . get_the_title() . $after;
			echo '</div>';

		} elseif ( get_post_type() != 'post' ) {

			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
				echo $before . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $after . $delimiter;
			echo $before . get_the_title() . $after;
			echo '</div>';

		} else {

			$cat = current( get_the_category() );
			echo get_category_parents( $cat, true, $delimiter );
			echo $before . get_the_title() . $after;
			echo '</div>';

		}

	} elseif ( is_404() ) {

		echo $before . esc_html__( 'Error 404', 'ABdev_incomeup' ) . $after;
		echo '</div>';

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

		$post_type = get_post_type_object( get_post_type() );

		if ( $post_type )
			echo $before . $post_type->labels->singular_name . $after;
		echo '</div>';

	} elseif ( is_attachment() ) {

		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];
		echo get_category_parents( $cat, true, '' . $delimiter );
		echo $before . '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $after . $delimiter;
		echo $before . get_the_title() . $after;
		echo '</div>';

	} elseif ( is_page() && !$post->post_parent ) {

		echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {

		$parent_id  = $post->post_parent;
		$breadcrumbs = array();

		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id  = $page->post_parent;
		}

		$breadcrumbs = array_reverse( $breadcrumbs );

		foreach ( $breadcrumbs as $crumb )
			echo $crumb . '' . $delimiter;

		echo $before . get_the_title() . $after;
		echo '</div>';

	} elseif ( is_search() ) {

		echo $before . esc_html__( 'Search results for &ldquo;', 'ABdev_incomeup' ) . get_search_query() . '&rdquo;' . $after;
		echo '</div>';

	} elseif ( is_tag() ) {

			echo $before . esc_html__( 'Posts tagged &ldquo;', 'ABdev_incomeup' ) . single_tag_title('', false) . '&rdquo;' . $after;
			echo '</div>';

	} elseif ( is_author() ) {

		$userdata = get_userdata($author);
		echo $before . esc_html__( 'Author:', 'ABdev_incomeup' ) . ' ' . $userdata->display_name . $after;
		echo '</div>';

	}

	if ( get_query_var( 'paged' ) )
		echo ' (' . esc_html__( 'Page', 'ABdev_incomeup' ) . ' ' . get_query_var( 'paged' ) . ')';
	echo '</div>';

	echo $wrap_after;

}