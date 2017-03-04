<?php

/**
	woocommerce plugin support
**/
if( in_array('woocommerce/woocommerce.php', get_option('active_plugins')) ){ //first check if plugin is installed


	$tcvpb_elements['recent_products'] = array(
		'name' => esc_html__('Recent Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Recent products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'date',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);



	$tcvpb_elements['featured_products'] = array(
		'name' => esc_html__('Featured Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Featured products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'date',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);



	$tcvpb_elements['products'] = array(
		'name' => esc_html__('Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Products', 'ABdev_incomeup'),
		'notice' => esc_html__('Show multiple products by IDs or SKUs. To find the Product ID, go to the Product > Edit screen and look in the URL for the postid', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'ids' => array(
				'description' => esc_html__('IDs', 'ABdev_incomeup'),
				'info' => esc_html__('coma separated list of product IDs', 'ABdev_incomeup'),
			),
			'skus' => array(
				'description' => esc_html__('SKUs', 'ABdev_incomeup'),
				'info' => esc_html__('coma separated list of product SKUs', 'ABdev_incomeup'),
				'divider' => 'true',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'date',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);




	$tcvpb_elements['product'] = array(
		'name' => esc_html__('Product', 'ABdev_incomeup' ),
		'description' => esc_html__('Product', 'ABdev_incomeup'),
		'notice' => esc_html__('Show a single product by ID or SKU. To find the Product ID, go to the Product Edit screen and look in the URL for the postid', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'id' => array(
				'description' => esc_html__('ID', 'ABdev_incomeup'),
			),
			'sku' => array(
				'description' => esc_html__('SKU', 'ABdev_incomeup'),
			),
		),
	);




	$tcvpb_elements['add_to_cart'] = array(
		'name' => esc_html__('Add to cart', 'ABdev_incomeup' ),
		'description' => esc_html__('Add to cart', 'ABdev_incomeup'),
		'notice' => esc_html__('Show the price and add to cart button of a single product by ID.', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'id' => array(
				'description' => esc_html__('ID', 'ABdev_incomeup'),
			),
			'sku' => array(
				'description' => esc_html__('SKU', 'ABdev_incomeup'),
			),
		),
	);


	$tcvpb_elements['add_to_cart_url'] = array(
		'name' => esc_html__('Add to cart URL', 'ABdev_incomeup' ),
		'description' => esc_html__('Add to cart URL', 'ABdev_incomeup'),
		'notice' => esc_html__('Echo the URL on the add to cart button of a single product by ID.', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'id' => array(
				'description' => esc_html__('ID', 'ABdev_incomeup'),
			),
			'sku' => array(
				'description' => esc_html__('SKU', 'ABdev_incomeup'),
			),
		),
	);



	$tcvpb_elements['product_page'] = array(
		'name' => esc_html__('Product page', 'ABdev_incomeup' ),
		'description' => esc_html__('Product page', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'id' => array(
				'description' => esc_html__('ID', 'ABdev_incomeup'),
			),
			'sku' => array(
				'description' => esc_html__('SKU', 'ABdev_incomeup'),
			),
		),
	);


	$tcvpb_elements['product_category'] = array(
		'name' => esc_html__('Product category', 'ABdev_incomeup' ),
		'description' => esc_html__('Product category', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'category' => array(
				'description' => esc_html__('Category', 'ABdev_incomeup'),
				'info' => esc_html__('Go to: WooCommerce > Products > Categories to find the slug column.', 'ABdev_incomeup'),
			),
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'title',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'ASC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);




	$tcvpb_elements['product_categories'] = array(
		'name' => esc_html__('Product categories', 'ABdev_incomeup' ),
		'description' => esc_html__('Product categories', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'number' => array(
				'description' => esc_html__('Number', 'ABdev_incomeup'),
				'info' => esc_html__('Used to display the number of products', 'ABdev_incomeup'),
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'title',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'ASC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
				'divider' => 'true',
			),
			'hide_empty' => array(
				'description' => esc_html__('Hide Empty', 'ABdev_incomeup'),
				'default' => '1',
				'type' => 'checkbox',
			),
			'ids' => array(
				'description' => esc_html__('IDs', 'ABdev_incomeup'),
				'info' => esc_html__('Set ids to a comma separated list of category ids to only show those.', 'ABdev_incomeup'),
			),
			'parent' => array(
				'description' => esc_html__('Parent', 'ABdev_incomeup'),
				'info' => esc_html__('Set to 0 to only display top level categories.', 'ABdev_incomeup'),
			),
		),
	);


	$tcvpb_elements['sale_products'] = array(
		'name' => esc_html__('Sale Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Sale Products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'date',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);


	$tcvpb_elements['best_selling_products'] = array(
		'name' => esc_html__('Best Selling Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Best Selling Products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
			),
		),
	);




	$tcvpb_elements['top_rated_products'] = array(
		'name' => esc_html__('Top Rated Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Top Rated Products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'title',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
			),
		),
	);




	$tcvpb_elements['product_attribute'] = array(
		'name' => esc_html__('Product Attribute', 'ABdev_incomeup' ),
		'description' => esc_html__('Product Attribute', 'ABdev_incomeup'),
		'notice' => esc_html__('List products with filter by an attribute', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
				'divider' => 'true',
			),
			'orderby' => array(
				'default' => 'title',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
			'order' => array(
				'default' => 'DESC',
				'type' => 'select',
				'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
				'values' => array(
					'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
					'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
				),
				'divider' => 'true',
			),
			'attribute' => array(
				'description' => esc_html__('Attribute', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
			),
			'filter' => array(
				'description' => esc_html__('Filter', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
			),
		),
	);




	$tcvpb_elements['related_products'] = array(
		'name' => esc_html__('Related Products', 'ABdev_incomeup' ),
		'description' => esc_html__('Related Products', 'ABdev_incomeup'),
		'type' => 'block',
		'icon' => 'pi-woocommerce',
		'category' =>  esc_html__('Woocommerce', 'ABdev_incomeup'),
		'third_party' => 1,
		'attributes' => array(
			'per_page' => array(
				'description' => esc_html__('Per Page', 'ABdev_incomeup'),
				'info' => esc_html__('How many products to show', 'ABdev_incomeup'),
				'default' => '12',
			),
			'columns' => array(
				'description' => esc_html__('Columns', 'ABdev_incomeup'),
				'info' => esc_html__('Number of columns to show', 'ABdev_incomeup'),
				'default' => '4',
			),
			'orderby' => array(
				'default' => 'title',
				'type' => 'select',
				'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
				'values' => array(
					'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
					'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
					'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
					'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
					'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
					'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
					'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
					'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
					'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
					'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
					'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
				),
			),
		),
	);

}

