<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' );

$view_layout = '';

if (isset($_COOKIE['view_layout_cookie'])){
	$view_layout = $_COOKIE['view_layout_cookie'];
}

if (isset($_REQUEST['view_layout'])){
	$view_layout = $_REQUEST['view_layout'];
}

$view_layout_template = ($view_layout == 'list') ? 'product_list' : 'product';


?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

	<section id="incomeup_main_section" class="with_left_sidebar">
		<div class="container shop_container column-<?php echo get_theme_mod('column_number','3'); ?>">

			<div class="row">
				<?php if(get_theme_mod('woocommerce_layout', 'right_sidebar') == 'left_sidebar'): ?>
				<div id="content_with_left_sidebar" class="span9 right">

					<?php do_action( 'woocommerce_archive_description' ); ?>

					<?php if ( have_posts() ) : ?>

						<div id="incomeup_products_sorting_view_bar" class="clearfix">
							<?php esc_html_e('Sort by','ABdev_incomeup') ?>
							<?php
							/**
							 * products_sorting_select hook
							 *
							 * @hooked woocommerce_catalog_ordering - 10
							 */
							do_action( 'products_sorting_select' );

							$query = parse_url($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], PHP_URL_QUERY);
							if( $query ) {
							    $url = '?'.$query.'&amp;';
							}
							else {
							    $url = '?';
							}


							?>
							<?php esc_html_e('Show','ABdev_incomeup') ?>
							<form action="" method="POST" name="results" class="woocommerce-ordering">
    							<select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
								<?php

								//Get products on page reload
								if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
								        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
								          } else {
								        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
								          }
										$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
										  	''          => esc_html__('Results per page', 'ABdev_incomeup'),
											'12' 		=> esc_html__('12', 'ABdev_incomeup'),
											'24' 		=> esc_html__('24', 'ABdev_incomeup'),
											'48' 		=> esc_html__('48', 'ABdev_incomeup'),
											'96' 		=> esc_html__('96', 'ABdev_incomeup'),
											'-1' 		=> esc_html__('All', 'ABdev_incomeup'),
										));

										foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
											echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
								?>
								</select>
							</form>


							<a class="list_selector <?php echo ($view_layout_template=='product_list') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=list"><i class="ci_icon-th-list"></i></a>
							<a class="grid_selector <?php echo ($view_layout_template=='product') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=grid"><i class="ci_icon-th"></i></a>
							<div class="incomeup_products_view_bar"><?php esc_html_e('View','ABdev_incomeup') ?></div>
						</div>

						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20 - unhooked in functions.php
							 * @hooked woocommerce_catalog_ordering - 30 - unhooked in functions.php
							 */
							do_action( 'woocommerce_before_shop_loop' );

						?>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', $view_layout_template ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>
				</div>

				<aside class="span3 sidebar sidebar_left">
					<?php dynamic_sidebar(get_theme_mod('shop_sidebar', '')); ?>
				</aside>
				<?php elseif(get_theme_mod('woocommerce_layout', 'right_sidebar') == 'right_sidebar'): ?>
				<div id="content_with_right_sidebar" class="span9">

					<?php do_action( 'woocommerce_archive_description' ); ?>

					<?php if ( have_posts() ) : ?>

						<div id="incomeup_products_sorting_view_bar" class="clearfix">
							<?php esc_html_e('Sort by','ABdev_incomeup') ?>
							<?php
							/**
							 * products_sorting_select hook
							 *
							 * @hooked woocommerce_catalog_ordering - 10
							 */
							do_action( 'products_sorting_select' );

							$query = parse_url($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], PHP_URL_QUERY);
							if( $query ) {
							    $url = '?'.$query.'&amp;';
							}
							else {
							    $url = '?';
							}


							?>
							<?php esc_html_e('Show','ABdev_incomeup') ?>
							<form action="" method="POST" name="results" class="woocommerce-ordering">
    							<select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
								<?php

								//Get products on page reload
								if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
								        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
								          } else {
								        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
								          }
										$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
										  	''          => esc_html__('Results per page', 'ABdev_incomeup'),
											'12' 		=> esc_html__('12', 'ABdev_incomeup'),
											'24' 		=> esc_html__('24', 'ABdev_incomeup'),
											'48' 		=> esc_html__('48', 'ABdev_incomeup'),
											'96' 		=> esc_html__('96', 'ABdev_incomeup'),
											'-1' 		=> esc_html__('All', 'ABdev_incomeup'),
										));

										foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
											echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
								?>
								</select>
							</form>

							<a class="list_selector <?php echo ($view_layout_template=='product_list') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=list"><i class="ci_icon-th-list"></i></a>
							<a class="grid_selector <?php echo ($view_layout_template=='product') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=grid"><i class="ci_icon-th"></i></a>
							<div class="incomeup_products_view_bar"><?php esc_html_e('View','ABdev_incomeup') ?></div>
						</div>

						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20 - unhooked in functions.php
							 * @hooked woocommerce_catalog_ordering - 30 - unhooked in functions.php
							 */
							do_action( 'woocommerce_before_shop_loop' );

						?>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', $view_layout_template ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>
				</div>

				<aside class="span3 sidebar sidebar_right">
					<?php dynamic_sidebar(get_theme_mod('shop_sidebar', '')); ?>
				</aside>

				<?php elseif( get_theme_mod('woocommerce_layout', 'right_sidebar') == 'no_sidebar'): ?>
					<div id="shop_no_sidebar" class="span12">

					<?php do_action( 'woocommerce_archive_description' ); ?>

					<?php if ( have_posts() ) : ?>

						<div id="incomeup_products_sorting_view_bar" class="clearfix">
							<?php esc_html_e('Sort by','ABdev_incomeup') ?>
							<?php
							/**
							 * products_sorting_select hook
							 *
							 * @hooked woocommerce_catalog_ordering - 10
							 */
							do_action( 'products_sorting_select' );

							$query = parse_url($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], PHP_URL_QUERY);
							if( $query ) {
							    $url = '?'.$query.'&amp;';
							}
							else {
							    $url = '?';
							}


							?>
							<?php esc_html_e('Show','ABdev_incomeup') ?>
							<form action="" method="POST" name="results" class="woocommerce-ordering">
    							<select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
								<?php

								//Get products on page reload
								if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
								        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
								          } else {
								        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
								          }
										$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
										  	''          => esc_html__('Results per page', 'ABdev_incomeup'),
											'12' 		=> esc_html__('12', 'ABdev_incomeup'),
											'24' 		=> esc_html__('24', 'ABdev_incomeup'),
											'48' 		=> esc_html__('48', 'ABdev_incomeup'),
											'96' 		=> esc_html__('96', 'ABdev_incomeup'),
											'-1' 		=> esc_html__('All', 'ABdev_incomeup'),
										));

										foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
											echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
								?>
								</select>
							</form>
							<a class="list_selector <?php echo ($view_layout_template=='product_list') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=list"><i class="ci_icon-th-list"></i></a>
							<a class="grid_selector <?php echo ($view_layout_template=='product') ? '' : 'inactive'; ?>" href="<?php echo $url;?>view_layout=grid"><i class="ci_icon-th"></i></a>
							<div class="incomeup_products_view_bar"><?php esc_html_e('View','ABdev_incomeup') ?></div>
						</div>

						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20 - unhooked in functions.php
							 * @hooked woocommerce_catalog_ordering - 30 - unhooked in functions.php
							 */
							do_action( 'woocommerce_before_shop_loop' );

						?>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', $view_layout_template ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>