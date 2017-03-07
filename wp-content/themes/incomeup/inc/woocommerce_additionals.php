<?php

/********* WOOcommerce support ***********/
add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count',20);

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action('woocommerce_product_loop_images_after', 'woocommerce_template_loop_rating', 20);

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action('woocommerce_product_loop_images_before', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('products_sorting_select', 'woocommerce_catalog_ordering', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 29);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);
add_action('woocommerce_before_single_product_desc_tab', 'woocommerce_template_single_meta', 10);

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash',10);
add_action('woocommerce_single_product_before_image', 'woocommerce_show_product_sale_flash', 10);

add_action('ABdev_woocommerce_before_add_to_cart_button' , 'wccm_add_button');

//Product thumbnail size
if ( ! function_exists( 'ABdev_custom_product_large_thumbnail_size' ) ){
	function ABdev_custom_product_large_thumbnail_size(){
		return 'full';
	}
}
add_filter('single_product_large_thumbnail_size', 'ABdev_custom_product_large_thumbnail_size');

//Style enqueuing
if ( ! function_exists( 'ABdev_incomeup_enqueue_woocommerce_css' ) ){
	function ABdev_incomeup_enqueue_woocommerce_css(){
		wp_register_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
		if ( class_exists( 'woocommerce' ) ) {
			wp_enqueue_style( 'woocommerce' );
		}
	}
}
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_action('wp_enqueue_scripts', 'ABdev_incomeup_enqueue_woocommerce_css');

//Brand name
if ( ! function_exists( 'ABdev_incomeup_product_brand_name' ) ){
	function ABdev_incomeup_product_brand_name($product_id) {
		$brands = get_the_terms( $product_id, 'pa_'.get_theme_mod('brand_slug', false));
		if (is_array($brands)) {
			foreach ( $brands as $brand ) {
			echo '<span class="brand_line single_product_brand">'.__('by','ABdev_incomeup').' <span class="brand_name">'.$brand->name.'</span></span>';
			}
		}
	}
}
add_action('woocommerce_single_product_summary', 'ABdev_incomeup_product_brand_name', 6);

//Breadcrumbs
if ( ! function_exists( 'ABdev_jk_woocommerce_breadcrumbs' ) ){
	function ABdev_jk_woocommerce_breadcrumbs() {
		return array(
			'delimiter'   	=> '<i class="ci_icon-chevron-right"></i>',
			'wrap_before' 	=> '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
			'wrap_after'  	=> '</nav>',
			'before'	  	=> '',
			'after'	   		=> '',
			'home'			=> _x( 'Home', 'breadcrumb', 'woocommerce' ),
		);
	}
}
add_filter( 'woocommerce_breadcrumb_defaults', 'ABdev_jk_woocommerce_breadcrumbs' );

//In/Out of stock
if ( ! function_exists( 'ABdev_custom_get_availability' ) ){
	function ABdev_custom_get_availability( $availability, $_product ) {
		if ( $_product->is_in_stock() ) {
			$availability['availability'] = __('In stock', 'woocommerce');
		}
		if ( !$_product->is_in_stock() ) {
			$availability['availability'] = __('Out of stock', 'woocommerce');
		}
		return $availability;
	}
}
add_filter( 'woocommerce_get_availability', 'ABdev_custom_get_availability', 1, 2);

//New product
if ( ! function_exists( 'ABdev_woo_new_product_tab' ) ){
	function ABdev_woo_new_product_tab( $tabs ) {
		$tabs['products_tab'] = array(
			'title' 	=> __( 'Product Tags', 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> 'ABdev_woo_new_product_tab_content'
		);
		return $tabs;
	}
}
add_filter( 'woocommerce_product_tabs', 'ABdev_woo_new_product_tab' );

//Tabs
if ( ! function_exists( 'ABdev_woo_new_product_tab_content' ) ){
	function ABdev_woo_new_product_tab_content($product) {
		global $post, $product;
		$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo '<div class="product_meta">';
		echo '<h5>Product Tags</h5>';
		echo '<p class="sku_wrapper"><span class="meta_label">'.__('SKU:','ABdev_incomeup'). '</span>', '<span> ' . $product->sku . '</span> ', '</p>';
		echo $product->get_categories( ', ', '<p class="posted_in"><span class="meta_label">' . _n( 'Category:', 'Categories:', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'woocommerce' ) . '</span> ', '.</p>' );
		echo $product->get_tags( ', ', '<p class="tagged_as"><span class="meta_label">' . _n( 'TAG:', 'TAGS:', $tag_count, 'ABdev_incomeup' ) . '</span> ', '</p>' );
		echo '</div>';
	}
}

//Remove default on sale badge
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

//Percentage sale badge
if (!function_exists('ABdev_incomeup_sale_percentage')) {
	function ABdev_incomeup_sale_percentage(){
	    global $product;

	    if ( !$product->is_type( array( 'variable', 'grouped' ))) {
			$regular_price = $product->get_regular_price();
		    $sale_price = $product->get_sale_price();

		    if($regular_price != $sale_price){
		    	$discount = round(100-(($sale_price / $regular_price)*100));
		    	$class = floor((($sale_price / $regular_price)*100)/10)*10;
		    }

		    if (isset($discount) && $class!=0) {
				echo '<span class="sale-badge sale-'.$class.'">-'.$discount.'%</span>';
		    }
	    }
	}
}

add_action( 'woocommerce_before_shop_loop_item_title', 'ABdev_incomeup_sale_percentage' );

//Products per page

function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', get_permalink(), false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}

add_filter('loop_shop_per_page','dl_sort_by_page');

//Column number

if (!function_exists('ABdev_loop_columns')) {
	function ABdev_loop_columns() {
		return get_theme_mod('column_number','3');
	}
}

add_filter('loop_shop_columns', 'ABdev_loop_columns');