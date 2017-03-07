<?php

if ( ! function_exists( 'ABdev_colors_css_hex2rgb' ) ){
	function ABdev_colors_css_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		return implode(",", $rgb);
	}
}

if ( ! function_exists( 'ABdev_colors_css_adjustBrightness' ) ){
	function ABdev_colors_css_adjustBrightness($hex, $steps) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max(-255, min(255, $steps));
		$hex = str_replace('#', '', $hex);
		if (strlen($hex) == 3) {
			$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
		}
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		$r = max(0,min(255,$r + $steps));
		$g = max(0,min(255,$g + $steps));
		$b = max(0,min(255,$b + $steps));
		$r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
		$g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
		$b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
		return '#'.$r_hex.$g_hex.$b_hex;
	}
}



$main_color = get_theme_mod('main_color', '#50a2de');
$secondary_color = get_theme_mod('secondary_color', '#292f33');

$hover_rgba = 'rgba('.ABdev_colors_css_hex2rgb($main_color).',0.75)';
$hover_rgba_sec = 'rgba('.ABdev_colors_css_hex2rgb($secondary_color).',0.8)';

$custom_css.= '
	.tcvpb-tabs.tcvpb-tabs-position-top.tcvpb-tabs-boxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-top.tcvpb-tabs-boxed .nav-tabs li.active:hover a{color: '.$main_color.' !important;}
.tcvpb-tabs.tcvpb-tabs-position-top.tcvpb-tabs-unboxed .nav-tabs li.active:hover a{color: '.$main_color.' !important;}
.tcvpb-tabs.tcvpb-tabs-position-top.tcvpb-tabs-unboxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs .nav-tabs li.active a{color: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-boxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-boxed .nav-tabs li.active:hover a{color: '.$main_color.'!important;}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-unboxed .nav-tabs li:first-child:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-unboxed .nav-tabs li:last-child:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-unboxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-position-bottom.tcvpb-tabs-unboxed .nav-tabs li.active:hover a{color: '.$main_color.'!important;}
.tcvpb-tabs.tcvpb-tabs-position-bottom .nav-tabs li.active a{color: '.$main_color.';}
.tcvpb-tabs-position-left.tcvpb-tabs-boxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-left.tcvpb-tabs-boxed .nav-tabs li.active:hover a{color: '.$main_color.'!important;}
.tcvpb-tabs-position-left.tcvpb-tabs-unboxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-left.tcvpb-tabs-unboxed .nav-tabs li:first-child:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-left.tcvpb-tabs-unboxed .nav-tabs li:last-child:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-left.tcvpb-tabs-unboxed .nav-tabs li.active:hover a{color: '.$main_color.'!important;}
.tcvpb-tabs-position-right.tcvpb-tabs-boxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-right.tcvpb-tabs-boxed .nav-tabs li.active:hover a{color: '.$main_color.'!important;}
.tcvpb-tabs-position-right.tcvpb-tabs-unboxed .nav-tabs li:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-right.tcvpb-tabs-unboxed .nav-tabs li:first-child:hover a{background: '.$main_color.';}
.tcvpb-tabs-position-right.tcvpb-tabs-unboxed .nav-tabs li:last-child:hover a{background: '.$main_color.';}
.tcvpb-tabs.tcvpb-tabs-timeline ul li:hover a{color: '.$main_color.';}
.ui-accordion-header.ui-state-hover{background: '.$main_color.';}
.tcvpb-accordion .ui-accordion-header-active {color:'.$main_color.';}
.tcvpb-accordion .ui-icon-triangle-1-s,.tcvpb-accordion .ui-icon-triangle-1-e{background: '.$main_color.';}
.tcvpb-accordion.tcvpb_accordion_circled_icons .ui-accordion-header-active:before{border-color: '.$main_color.';}
.tcvpb-accordion.tcvpb_accordion_icons_left .ui-accordion-header-active:before{border-color: '.$main_color.';}
.tcvpb_alert_info,.tcvpb_alert_info .tcvpb_alert_box_close{background: #eff5fa;color: '.$main_color.';}
.tcvpb_blockquote small{color: '.$main_color.';}
.tcvpb_blockquote_style1{border-left-color:'.$main_color.';}
.tcvpb_blockquote_style4{background: '.$main_color.';}
.tcvpb_team_member_link .tcvpb_team_member_name:hover,.tcvpb_team_member:hover .tcvpb_team_member_position{color: '.$main_color.';}
.tcvpb_posts_shortcode.tcvpb_posts_shortcode-1 .tcvpb_latest_news_shortcode_content h5 a:hover{color: '.$main_color.';}
.tcvpb_posts_shortcode.tcvpb_posts_shortcode-2 .tcvpb_latest_news_shortcode_content h5 a:hover{color: '.$main_color.';}
.tcvpb_pricing-table-1.tcvpb_pricing-table-blue .tcvpb_pricebox_info{background: '.$main_color.';}
.tcvpb_pricing-table-2.tcvpb_pricing-table-blue .tcvpb_pricebox_info{background: '.$main_color.';}
.tcvpb_pricing-table-3.tcvpb_pricing-table-blue .tcvpb_pricebox_header{background: '.$main_color.';}
.tcvpb_pricing-table-4.tcvpb_pricing-table-blue .tcvpb_pricebox_info{background: '.$main_color.';}
.tcvpb_pricing-table-5.tcvpb_pricing-table-blue .tcvpb_pricebox_header{background: '.$main_color.';}
.tcvpb_progress_bar_default .tcvpb_meter .tcvpb_meter_percentage {background-color: '.$main_color.';}
.tcvpb_search input:focus{-moz-box-shadow: inset 0 0 2px '.$main_color.';-webkit-box-shadow: inset 0 0 2px '.$main_color.';box-shadow: inset 0 0 2px '.$main_color.';}
.tcvpb_search .submit i:hover{color: '.$main_color.';}
.tcvpb_service_box:hover a.tcvpb_icon_boxed{background: '.$main_color.';}
.tcvpb_service_box p a i{color: '.$main_color.' !important;}
.tcvpb_service_box.tcvpb_service_box_round_text_aside:hover a.tcvpb_icon_boxed{background: '.$main_color.' !important;}
.tcvpb_service_box_round_text_aside a:hover h3 {color: '.$main_color.';}
.tcvpb_service_box_round_text_aside_middle a:hover h3{color: '.$main_color.';}
.tcvpb_service_box_round_text_aside_middle:hover a.tcvpb_icon_boxed{background: '.$main_color.' !important;}
.tcvpb_service_box_boxed a:hover h3{color: '.$main_color.';}
.tcvpb_service_box_boxed:hover a.tcvpb_icon_boxed{background: '.$main_color.'!important;}
.tcvpb_service_box_unboxed_round a:hover h3{color: '.$main_color.';}
.tcvpb_service_box_unboxed_round:hover a.tcvpb_icon_boxed{background: '.$main_color.'!important;}
.tcvpb_service_box_unboxed_square a:hover h3{color: '.$main_color.';}
.service_box_process_full:after{ background: '.$main_color.';}
.service_box_process_full:first-child:after{ background: '.$main_color.';}
.tcvpb_dropcap_style2{background: '.$main_color.';}
.tcvpb-callout_box_style_5 .tcvpb-icon-button i:hover{color: '.$main_color.';}
.tcvpb-button_light{ color: '.$main_color.';}
.tcvpb-button_blue{background: '.$main_color.';border-color: '.$main_color.';}
.tcvpb-button_dark:hover{background: '.$main_color.';}
.countdown {background: '.$main_color.';}
.carousel_navigation a:hover{color: '.$main_color.';}
.cart_dropdown_widget .widget_shopping_cart_content .buttons a:first-of-type:hover{background: '.$main_color.'!important;box-shadow: 0px 1px 0px 0px '.$main_color.' !important;}
.cart_dropdown_widget .widget_shopping_cart_content .buttons a:last-of-type{background: '.$main_color.' !important;border-color: '.$main_color.';}
.cart_dropdown_widget .widget_shopping_cart_content .buttons a:last-of-type:hover{color: '.$main_color.'!important;}
.dark_menu_style .cart_dropdown_widget .widget_shopping_cart_content .buttons a:first-of-type{color: '.$main_color.'!important;}
.dark_menu_style .cart_dropdown_widget .widget_shopping_cart_content .buttons a:first-of-type:hover{background: '.$main_color.'!important;border-color: '.$main_color.'!important;}
.woocommerce .woocommerce-error .button:hover,.woocommerce .woocommerce-info .button:hover,.woocommerce .woocommerce-message .button:hover,.woocommerce-page .woocommerce-error .button:hover,.woocommerce-page .woocommerce-info .button:hover,.woocommerce-page .woocommerce-message .button:hover{background: '.$main_color.';border-color: '.$main_color.';}
.woocommerce .woocommerce-message:before,.woocommerce-page .woocommerce-message:before{color:'.$main_color.';}
.woocommerce .woocommerce-info:before,.woocommerce-page .woocommerce-info:before{color:'.$main_color.';}
.woocommerce .woocommerce-breadcrumb a,.woocommerce-page .woocommerce-breadcrumb a{color:'.$main_color.';}
.woocommerce .woocommerce-breadcrumb a:hover,.woocommerce-page .woocommerce-breadcrumb a:hover{color:'.$main_color.';}
.woocommerce .incomeup_single_product_details div.product .single_product_navigation a:hover,.woocommerce-page .incomeup_single_product_details div.product .single_product_navigation a:hover{background: '.$main_color.';}
.woocommerce #content div.product p.price del,.woocommerce #content div.product span.price del,.woocommerce div.product p.price del,.woocommerce div.product span.price del,.woocommerce-page #content div.product p.price del,.woocommerce-page #content div.product span.price del,.woocommerce-page div.product p.price del,.woocommerce-page div.product span.price del{color:'.$main_color.';}
.woocommerce #content div.product .woocommerce-tabs ul.tabs li:hover a,.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a,.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li:hover a,.woocommerce-page div.product .woocommerce-tabs ul.tabs li:hover a{color: '.$main_color.' !important;}
.woocommerce .woocommerce-tabs .tabs .active a{color: '.$main_color.'!important;}
.woocommerce #content div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist,.woocommerce div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist,.woocommerce-page #content div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist,.woocommerce #content div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist:before,.woocommerce div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist:before,.woocommerce-page #content div.product .related form.cart .yith-wcwl-add-button:hover a.add_to_wishlist:before{color: '.$main_color.' !important;}
.woocommerce #content div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce-page #content div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce-page div.product form.cart.woocommerce #content div.product form.cart:hover,.woocommerce div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover,.woocommerce-page #content div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover,.woocommerce-page div.product form.cart.woocommerce #content div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover,.woocommerce div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover,.woocommerce-page #content div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover,.woocommerce-page div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover{color: '.$main_color.';}
.woocommerce #content div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce-page #content div.product form.cart .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce-page div.product form.cart.woocommerce #content div.product form.cart:hover:before,.woocommerce div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover:before,.woocommerce-page #content div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover:before,.woocommerce-page div.product form.cart.woocommerce #content div.product form.cart .yith-wcwl-wishlistaddedbrowse:hover:before,.woocommerce div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover:before,.woocommerce-page #content div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover:before,.woocommerce-page div.product form.cart .yith-wcwl-wishlistexistsbrowse:hover:before{color: '.$main_color.';}
.woocommerce span.sale-badge.sale-50,.woocommerce-page span.sale-badge.sale-50{background: '.$main_color.';}
.woocommerce .product_badges span.featured i,.woocommerce-page .product_badges span.featured i{color: '.$main_color.';}
.woocommerce ul.products li.product h3:hover a,.woocommerce-page ul.products li.product h3:hover a{color: '.$main_color.';}
.woocommerce ul.products li.product .button.add_to_cart_button,.woocommerce-page ul.products li.product .button.add_to_cart_button,.woocommerce ul.products li.product .button.product_type_variable,.woocommerce-page ul.products li.product .button.product_type_variable{background-color: '.$main_color.';}
.woocommerce ul.products .product .product_loop_hover_rating a:hover,.woocommerce-page ul.products .product .product_loop_hover_rating a:hover{color: '.$main_color.';}
.woocommerce ul.products .product .product_loop_hover_rating .compare:before,.woocommerce-page ul.products .product .product_loop_hover_rating .compare:before{color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .rating a:hover,.woocommerce-page ul.products li.product.incomeup_products_list .rating a:hover{color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .count a:hover,.woocommerce-page ul.products li.product.incomeup_products_list .count a:hover{color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .single_add_to_cart_button,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .single_add_to_cart_button{background: '.$main_color.';border-color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .single_add_to_cart_button:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .single_add_to_cart_button:hover{color: '.$main_color.'!important;border-color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .add_cart_wishlist.button:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .add_cart_wishlist.button:hover{background: '.$main_color.';border-color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .button:hover i,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .button:hover i{color: '.$main_color.'!important;}
.woocommerce ul.products li.product .cart_list_item .single_add_to_cart_button:hover i,.woocommerce-page ul.products li.product .cart_list_item .single_add_to_cart_button:hover i{color: '.$main_color.' !important;}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistaddedbrowse:hover,.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistaddedbrowse:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse:hover,.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse a:hover,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse a:hover{color: '.$main_color.';}
.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistaddedbrowse:hover:before,.woocommerce ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse:hover:before,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistaddedbrowse:hover:before,.woocommerce-page ul.products li.product.incomeup_products_list .cart_list_item .yith-wcwl-wishlistexistsbrowse:hover:before{color: '.$main_color.';}
.woocommerce-pagination a:focus,.woocommerce-pagination .current{color: '.$main_color.';}
nav.woocommerce-pagination a:hover{background: '.$main_color.';}
.woocommerce #content input.button,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce-page #content input.button,.woocommerce-page #respond input#submit,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button{color: '.$main_color.';}
.woocommerce .incomeup_single_product_details a.button.compare:before,.woocommerce-page .incomeup_single_product_details button.button.compare:before{color: '.$main_color.' !important;  }
.woocommerce .incomeup_single_product_details a.button.compare:hover:before,.woocommerce-page .incomeup_single_product_details button.button.compare:hover:before{background: '.$main_color.'; }
.woocommerce .incomeup_single_product_details p a.button.alt:before,.woocommerce-page .incomeup_single_product_details p button.button.alt:before{color: '.$main_color.' !important;background: #fbfcfc;}
.woocommerce .incomeup_single_product_details p a.button.alt:hover:before,.woocommerce-page .incomeup_single_product_details p button.button.alt:hover:before{background: '.$main_color.'; }
.woocommerce .incomeup_single_product_details a.button.compare:hover,.woocommerce-page .incomeup_single_product_details button.button.compare:hover,.woocommerce .incomeup_single_product_details p a.button.alt:hover,.woocommerce-page .incomeup_single_product_details p button.button.alt:hover{color: '.$main_color.' !important;}
.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:hover,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover{color: '.$main_color.';}
.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:before,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before{color: '.$main_color.';}
.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:hover:before,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover:before,.woocommerce .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover:before,.woocommerce-page .incomeup_single_product_details .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover:before{background: '.$main_color.';}
.woocommerce #content input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce-page #content input.button:hover,.woocommerce-page #respond input#submit:hover,.woocommerce-page a.button:hover,.woocommerce-page button.button:hover,.woocommerce-page input.button:hover{background:'.$main_color.';border-color: '.$main_color.';}
.woocommerce .cart .button,.woocommerce .cart input.button,.woocommerce-page .cart .button,.woocommerce-page .cart input.button{ color: '.$main_color.' !important;}
.woocommerce .cart .button:hover,.woocommerce .cart input.button:hover,.woocommerce-page .cart .button:hover,.woocommerce-page .cart input.button:hover{background: '.$main_color.';}
.woocommerce .incomeup_single_product_details form.cart .single_add_to_cart_button,.woocommerce-page .incomeup_single_product_details form.cart .single_add_to_cart_button{background: '.$main_color.' !important;}
.woocommerce .incomeup_single_product_details form.cart .single_add_to_cart_button:hover,.woocommerce-page .incomeup_single_product_details form.cart .single_add_to_cart_button:hover{color: '.$main_color.' !important;border-color: '.$main_color.';}
.woocommerce #content .quantity .minus:hover,.woocommerce #content .quantity .plus:hover,.woocommerce .quantity .minus:hover,.woocommerce .quantity .plus:hover,.woocommerce-page #content .quantity .minus:hover,.woocommerce-page #content .quantity .plus:hover,.woocommerce-page .quantity .minus:hover,.woocommerce-page .quantity .plus:hover{color:'.$main_color.';}
.woocommerce .star-rating span:before,.woocommerce-page .star-rating span:before{color: '.$main_color.';}
.woocommerce .products .product_loop_hover_rating .add_cart_wishlist:last-child:hover i,.woocommerce-page .products .product_loop_hover_rating .add_cart_wishlist:last-child:hover i{color: '.$main_color.';}
.woocommerce .products .products_loop_image_wrapper .product_loop_hover_rating .cart_list_item a.button.compare:hover,.woocommerce-page .products .products_loop_image_wrapper .product_loop_hover_rating .cart_list_item a.button.compare:hover{color: '.$main_color.'!important;}
.woocommerce .products .products_loop_image_wrapper .product_loop_hover_rating .cart_list_item .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,.woocommerce-page .products .products_loop_image_wrapper .product_loop_hover_rating .cart_list_item .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover{color: '.$main_color.';}
.woocommerce .products .product_loop_hover_rating .add_cart_wishlist:hover,.woocommerce-page .products .product_loop_hover_rating .add_cart_wishlist:hover,.woocommerce .products .product_loop_hover_rating .add_cart_wishlist.in-cart,.woocommerce-page .products .product_loop_hover_rating .add_cart_wishlist.in-cart,.woocommerce .products .product_loop_hover_rating .add_cart_wishlist.active,.woocommerce-page .products .product_loop_hover_rating .add_cart_wishlist.active{color: '.$main_color.';}
.woocommerce .products .incomeup_products_list .button.compare:hover,.woocommerce-page .products .incomeup_products_list .button.compare:hover{color: '.$main_color.' !important;}
.woocommerce .products .incomeup_products_list .button.compare:hover:before,.woocommerce-page .products .incomeup_products_list .button.compare:hover:before{background: '.$main_color.' !important;border-color: '.$main_color.';}
.woocommerce p.stars a.star-1.active:after,.woocommerce p.stars a.star-1:hover:after,.woocommerce-page p.stars a.star-1.active:after,.woocommerce-page p.stars a.star-1:hover:after{color: '.$main_color.';}
.woocommerce p.stars a.star-2.active:after,.woocommerce p.stars a.star-2:hover:after,.woocommerce-page p.stars a.star-2.active:after,.woocommerce-page p.stars a.star-2:hover:after{color: '.$main_color.';}
.woocommerce p.stars a.star-3.active:after,.woocommerce p.stars a.star-3:hover:after,.woocommerce-page p.stars a.star-3.active:after,.woocommerce-page p.stars a.star-3:hover:after{color: '.$main_color.';}
.woocommerce p.stars a.star-4.active:after,.woocommerce p.stars a.star-4:hover:after,.woocommerce-page p.stars a.star-4.active:after,.woocommerce-page p.stars a.star-4:hover:after{color: '.$main_color.';}
.woocommerce p.stars a.star-5.active:after,.woocommerce p.stars a.star-5:hover:after,.woocommerce-page p.stars a.star-5.active:after,.woocommerce-page p.stars a.star-5:hover:after{color: '.$main_color.';}
.woocommerce table.shop_table tr.order-total .amount,.woocommerce-page table.shop_table tr.order-total .amount{color: '.$main_color.';}
.woocommerce td.product-name a:hover,.woocommerce-page td.product-name a:hover{color: '.$main_color.';}
.single_thumb_wrapper .prev_thumb:hover,.single_thumb_wrapper .next_thumb:hover{background: '.$main_color.';}
.woocommerce .shipping_calculator .button,.woocommerce-page .shipping_calculator .button{display:block color: '.$main_color.' !important;}
.woocommerce .shipping_calculator .button:hover,.woocommerce-page .shipping_calculator .button:hover{background: '.$main_color.';border-color: '.$main_color.';}
.cart-collaterals .order-total .amount{color: '.$main_color.';}
.cart-collaterals input.button-link{color: '.$main_color.' !important;}
.cart-collaterals input.button-link:hover{background: '.$main_color.';border-color: '.$main_color.';}
.woocommerce .cart-collaterals .cart_totals table td strong .amount,.woocommerce-page .cart-collaterals .cart_totals table td strong .amount{color: '.$main_color.';}
.woocommerce #payment ul.payment_methods li input[type="radio"]:checked,.woocommerce-page #payment ul.payment_methods li input[type="radio"]:checked{background: '.$main_color.' !important;}
.woocommerce .widget_layered_nav ul li a:hover,.woocommerce .widget_layered_nav ul li span:hover,.woocommerce-page .widget_layered_nav ul li a:hover,.woocommerce-page .widget_layered_nav ul li span:hover{color: '.$main_color.';}
.woocommerce .widget_price_filter .price_slider_amount .button,.woocommerce-page .widget_price_filter .price_slider_amount .button{color: '.$main_color.' !important;}
.woocommerce .widget_price_filter .price_slider_amount .button:hover,.woocommerce-page .widget_price_filter .price_slider_amount .button:hover{background: '.$main_color.';border-color: '.$main_color.';}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range{background:'.$main_color.';}
#incomeup_products_sorting_view_bar .grid_selector,#incomeup_products_sorting_view_bar .list_selector{color: '.$main_color.';}
#incomeup_products_sorting_view_bar .inactive:hover i{color:'.$main_color.';}
#incomeup_woo_product_share a:hover{color: '.$main_color.';}
.itemprop_offers .price .amount{color: '.$main_color.';}
.product-type-variable form.cart a.add_cart_wishlist.button{background: '.$main_color.';border-color: '.$main_color.';}
.product-type-variable form.cart a.add_cart_wishlist.button:hover{color: '.$main_color.'!important;border-color: '.$main_color.'!important;}
.product-type-variable form.cart a.add_cart_wishlist.button:hover i{color: '.$main_color.';}
.wccm-tr .wccm-td ins{color: '.$main_color.';}
#ABdev_menu_toggle{color: '.$main_color.';}
#ABdev_menu_toggle{color: '.$main_color.';}
nav > ul ul li:hover > a{color: '.$main_color.' !important;}
.dnd-tabs.dnd-tabs-position-top.dnd-tabs-boxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-top.dnd-tabs-boxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.' !important;}
.dnd-tabs.dnd-tabs-position-top.dnd-tabs-unboxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.' !important;}
.dnd-tabs.dnd-tabs-position-top.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs .ui-tabs-nav li.ui-tabs-active a{color: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-boxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-boxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.'!important;}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-unboxed .ui-tabs-nav li:last-child:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-unboxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.'!important;}
.dnd-tabs.dnd-tabs-position-bottom .ui-tabs-nav li.ui-tabs-active a{color: '.$main_color.';}
.dnd-tabs-position-left.dnd-tabs-boxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs-position-left.dnd-tabs-boxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.'!important;}
.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background: '.$main_color.';}
.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li:last-child:hover a{background: '.$main_color.';}
.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.'!important;}
.dnd-tabs-position-right.dnd-tabs-boxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs-position-right.dnd-tabs-boxed .ui-tabs-nav li.ui-tabs-active:hover a{color: '.$main_color.'!important;}
.dnd-tabs-position-right.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background: '.$main_color.';}
.dnd-tabs-position-right.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background: '.$main_color.';}
.dnd-tabs-position-right.dnd-tabs-unboxed .ui-tabs-nav li:last-child:hover a{background: '.$main_color.';}
.dnd-tabs.dnd-tabs-timeline ul li:hover a{color: '.$main_color.';}
.ui-accordion-header.ui-state-hover{background: '.$main_color.';}
.dnd-accordion .ui-accordion-header-active { color:'.$main_color.';}
.dnd-accordion .ui-icon-triangle-1-s,.dnd-accordion .ui-icon-triangle-1-e{background: '.$main_color.';}
.dnd-accordion.dnd_accordion_circled_icons .ui-accordion-header-active:before{border-color: '.$main_color.';}
.dnd-accordion.dnd_accordion_icons_left .ui-accordion-header-active:before{border-color: '.$main_color.';}
.dnd_alert_info,.dnd_alert_info .dnd_alert_box_close{background: #eff5fa;color: '.$main_color.';}
.dnd_blockquote small{color: '.$main_color.';}
.dnd_blockquote_style1{border-left-color:'.$main_color.';}
.dnd_blockquote_style4{background: '.$main_color.';}
.dnd_team_member_link .dnd_team_member_name:hover,.dnd_team_member:hover .dnd_team_member_position{color: '.$main_color.';}
.dnd_posts_shortcode.dnd_posts_shortcode-1 .dnd_latest_news_shortcode_content h5 a:hover{color: '.$main_color.';}
.dnd_posts_shortcode.dnd_posts_shortcode-2 .dnd_latest_news_shortcode_content h5 a:hover{color: '.$main_color.';}
.dnd_pricing-table-1.dnd_pricing-table-blue .dnd_pricebox_info{background: '.$main_color.';}
.dnd_pricing-table-2.dnd_pricing-table-blue .dnd_pricebox_info{background: '.$main_color.';}
.dnd_pricing-table-3.dnd_pricing-table-blue .dnd_pricebox_header{background: '.$main_color.';}
.dnd_pricing-table-4.dnd_pricing-table-blue .dnd_pricebox_info{background: '.$main_color.';}
.dnd_pricing-table-5.dnd_pricing-table-blue .dnd_pricebox_header{background: '.$main_color.';}
.dnd_progress_bar_default .dnd_meter .dnd_meter_percentage {background-color: '.$main_color.';}
.dnd_search input:focus{-moz-box-shadow: inset 0 0 2px '.$main_color.';-webkit-box-shadow: inset 0 0 2px '.$main_color.';box-shadow: inset 0 0 2px '.$main_color.';}
.dnd_search .submit i:hover{color: '.$main_color.';}
.dnd_service_box:hover a.dnd_icon_boxed{background: '.$main_color.';}
.dnd_service_box p a i{color: '.$main_color.' !important;}
.dnd_service_box.dnd_service_box_round_text_aside:hover a.dnd_icon_boxed{background: '.$main_color.' !important;}
.dnd_service_box_round_text_aside a:hover h3 {color: '.$main_color.';}
.dnd_service_box_round_text_aside_middle a:hover h3{color: '.$main_color.';}
.dnd_service_box_round_text_aside_middle:hover a.dnd_icon_boxed{background: '.$main_color.' !important;}
.dnd_service_box_boxed a:hover h3{color: '.$main_color.';}
.dnd_service_box_boxed:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
.dnd_service_box_unboxed_round a:hover h3{color: '.$main_color.';}
.dnd_service_box_unboxed_round:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
.dnd_service_box_unboxed_square a:hover h3{color: '.$main_color.';}
.service_box_process_full:after{ background: '.$main_color.';}
.service_box_process_full:first-child:after{ background: '.$main_color.';}
.dnd_dropcap_style2{background: '.$main_color.';}
.dnd-callout_box_style_5 .dnd-icon-button i:hover{color: '.$main_color.';}
.dnd-button_light{ color: '.$main_color.';}
.dnd-button_blue{background: '.$main_color.';border-color: '.$main_color.';}
.dnd-button_dark:hover{background: '.$main_color.';}
.countdown {background: '.$main_color.';}
.carousel_navigation a:hover{color: '.$main_color.';}
a{ color: '.$main_color.';}
button,input[type="submit"]{ border-color: '.$main_color.'; background: '.$main_color.';}
.blue_text{ color: '.$main_color.';}
.text_blue{ color: '.$main_color.';}
::selection{ background: '.$main_color.';}
.quick_contact_mail a:hover{ color: '.$main_color.';}
.shop_nav_links a:hover{ color: '.$main_color.';}
.shop_nav_links a.link_cart{ color: '.$main_color.';}
.transparent .search-icon i{ color: '.$main_color.'; }
.transparent #search-container .widget_search i:hover{ color: '.$main_color.';}
.header_layout_1 .widget_search input:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.header_layout_1 .widget_search i:hover{ color: '.$main_color.';}
.header_layout_2 .widget_search input:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.header_layout_2 .widget_search i:hover{ color: '.$main_color.';}
.header_layout_3 .widget_search input:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.header_layout_3 .widget_search i:hover{ color: '.$main_color.';}
.dark_menu_style nav > ul ul li:hover{ color: '.$main_color.';  }
nav > ul > li a:hover{ color: '.$main_color.';}
nav > ul > li:hover a:after{ color: '.$main_color.';}
nav > ul ul li:hover a{ color: '.$main_color.';}
nav > ul ul ul li > a:hover{ color: '.$main_color.'!important;}
nav > ul > .current-menu-item > a,nav > ul > .current-post-ancestor > a,nav > ul > .current-menu-ancestor > a,nav > ul ul > .current-menu-item > a{ color: '.$main_color.' !important;}
#ABdev_main_header.transparent nav > ul > .current-menu-item > a,#ABdev_main_header.transparent nav > ul > .current-post-ancestor > a,#ABdev_main_header.transparent nav > ul > .current-menu-ancestor > a{ color: '.$main_color.';}
#ABdev_main_header.transparent nav > ul > li a:hover{ color: '.$main_color.' !important;}
nav > ul .sf-mega-inner .description_menu_item a{ color: '.$main_color.';}
.sf-mega ul ul li:hover a{ color: '.$main_color.' !important;}
#title_breadcrumbs_bar .breadcrumbs,#title_breadcrumbs_bar .breadcrumbs a,#title_breadcrumbs_bar .breadcrumbs i{ color: '.$main_color.';}
.search-toggle:hover .search-icon i{ background: '.$main_color.';}
.search-icon.active i{ background: '.$main_color.';}
#search-container .widget_search input[type="text"]:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
#search-container .widget_search i{ color: '.$main_color.';}
.tp-leftarrow.default:hover:before,.tp-rightarrow.default:hover:before{ color: '.$main_color.';}
.tp-bullets.simplebullets.round .bullet.selected{ border-color: '.$main_color.'; background: '.$main_color.';}
.tp-bullets.simplebullets.round .bullet:hover,.tp-bullets.simplebullets.round .bullet.selected{ background-color: '.$main_color.';}
.tp-caption.Blue_Button:hover a{ color: '.$main_color.' !important;}
.timeline_post h5:hover a{ color: '.$main_color.';}
.timeline_postmeta a:hover{ color: '.$main_color.';}
.timeline_post_left:after,.timeline_post_right:after{ background: '.$main_color.';}
#timeline_posts .post-readmore a.more-link{ color: '.$main_color.'; }
#timeline_posts .post-readmore a.more-link:hover{ background: '.$main_color.';}
.grid_post h5:hover a{ color: '.$main_color.';}
.grid_postmeta a:hover{ color: '.$main_color.';}
#grid_posts .post-readmore a.more-link{ color: '.$main_color.'; }
#grid_posts .post-readmore a.more-link:hover{ background: '.$main_color.';}
.blog_category_index_right .post_date,.blog_category_index_left .post_date,.blog_category_index_none .post_date{ background: '.$main_color.';}
.blog_category_index_right .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_left .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_none .post_main .post_main_inner_wrapper h5:hover a{ color: '.$main_color.';}
.blog_category_index_right .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_left .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_none .post_main .post_main_inner_wrapper .post_category a:hover{ color: '.$main_color.';}
.blog_category_index_right .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_left .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none .post_main .post_main_inner_wrapper .post-readmore .more-link{ color: '.$main_color.'; }
.blog_category_index_right .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_left .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{ background: '.$main_color.';}
.blog_category_index_right2 .post_date,.blog_category_index_left2 .post_date,.blog_category_index_none2 .post_date{ background: '.$main_color.';}
.blog_category_index_right2 .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_left2 .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_none2 .post_main .post_main_inner_wrapper h5:hover a{ color: '.$main_color.';}
.blog_category_index_right2 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_left2 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post_category a:hover{ color: '.$main_color.';}
.blog_category_index_right2 .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_left2 .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post-readmore .more-link{ color: '.$main_color.'; }
.blog_category_index_right2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_left2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{ background: '.$main_color.';}
.blog_category_index_right3 .post_date,.blog_category_index_left3 .post_date,.blog_category_index_none3 .post_date{ background: '.$main_color.';}
.blog_category_index_right3 .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_left3 .post_main .post_main_inner_wrapper h5:hover a,.blog_category_index_none3 .post_main .post_main_inner_wrapper h5:hover a{ color: '.$main_color.';}
.blog_category_index_right3 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_left3 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post_category a:hover{ color: '.$main_color.';}
.blog_category_index_right3 .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_left3 .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post-readmore .more-link{ color: '.$main_color.'; }
.blog_category_index_right3 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_left3 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{ background: '.$main_color.';}
.blog_category_index_right_mini .post_type,.blog_category_index_left_mini .post_type,.blog_category_index_none_mini .post_type{ background: '.$main_color.';}
.blog_category_index_right_mini .post_main h5 a:hover,.blog_category_index_left_mini .post_main h5 a:hover,.blog_category_index_none_mini .post_main h5 a:hover{ color: '.$main_color.';}
.blog_category_index_right_mini .post_main .post_author span.post_category a:hover,.blog_category_index_left_mini .post_main .post_author span.post_category a:hover,.blog_category_index_none_mini .post_main .post_author span.post_category a:hover{ color: '.$main_color.';}
.blog_category_index_right_mini .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_left_mini .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none_mini .post_main .post_main_inner_wrapper .post-readmore .more-link{ color: '.$main_color.'; }
.blog_category_index_right_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_left_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{ background: '.$main_color.';}
.mini2_post .post_type{ background: '.$main_color.';}
.mini2_post .post_category a:hover{ color: '.$main_color.';}
.mini2_post .post_main_inner_wrapper h5 a:hover{ color: '.$main_color.';}
.blog_category_index_dual .post_main .post_main_inner_wrapper h5:hover a{ color: '.$main_color.';}
.blog_category_index_dual .post_main .post_author span.post_category a:hover{ color: '.$main_color.';}
.blog_category_index_dual .post_main .post_main_inner_wrapper .post-readmore .more-link{ color: '.$main_color.'; }
.blog_category_index_dual .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{ background: '.$main_color.';}
.post_content .post_main h3 a:hover{ color: '.$main_color.';}
.post_main .postmeta-above a:hover{ color: '.$main_color.';}
.more-link{ color: '.$main_color.';}
.previous_post:hover a,.next_post:hover a{ color: '.$main_color.';}
.previous_post:hover i,.next_post:hover i{ color: '.$main_color.';}
.related_item_meta a:hover{ color: '.$main_color.';}
.comment .reply,.comment .edit-link,.comment .reply a,.comment .edit-link a{ color: '.$main_color.';}
#respond #comment-submit{ background: '.$main_color.';}
#respond #comment-submit:hover{ color: '.$main_color.'; border-color: '.$main_color.'; }
#blog_pagination .page-numbers:hover{ background: '.$main_color.';}
#blog_pagination .page-numbers.current{ color: '.$main_color.';}
#blog_pagination .page-numbers.current:hover{ color: '.$main_color.'; }
#inner_post_pagination > a:hover{ color: '.$main_color.';}
.wpcf7 input:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.wpcf7 textarea:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.wpcf7-submit{ background: '.$main_color.';}
.wpcf7 input[type="submit"]{ background: '.$main_color.';}
aside .widget a:hover{ color: '.$main_color.';}
.widget_search i:hover{ color: '.$main_color.';}
.widget_search input:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.tagcloud a:hover{ background: '.$main_color.';}
#ABdev_main_footer .tagcloud a:hover{ border-color: '.$main_color.'; background: '.$main_color.';}
.rpwe-title a:hover{ color: '.$main_color.';}
#ABdev_main_footer a.footer_text_readmore:hover{ color: '.$main_color.';}
#ABdev_main_footer a.footer_text_readmore:hover i{ color: '.$main_color.';}
.sidebar .ab-tweet-item .ab-tweet-username{ color: '.$main_color.';}
.widget_recent_comments .recentcomments .url:hover{ color: '.$main_color.';}
.portfolio_icon{ border-color: '.$main_color.'; background: '.$main_color.';}
.portfolio_item_meta h6 a:hover,.portfolio_item_meta h5 a:hover{ color: '.$main_color.';}
.portfolio_item_view_link a{ background: '.$main_color.';}
.portfolio_item_view_link a:hover{ color: '.$main_color.'; border-color: '.$main_color.'; }
.portfolio_filter li a.selected,.portfolio_filter li:hover,.portfolio_filter li:hover a{ color: '.$main_color.';}
.more_portfolio_link a{ color: '.$main_color.'; }
#single_portfolio_pagination .prev:hover i,#single_portfolio_pagination .prev:hover a,#single_portfolio_pagination.single_portfolio_pagination_bottom .prev:hover i,#single_portfolio_pagination .list:hover i,#single_portfolio_pagination .list:hover a,#single_portfolio_pagination.single_portfolio_pagination_bottom .list:hover i,#single_portfolio_pagination .next:hover i,#single_portfolio_pagination .next:hover a,#single_portfolio_pagination.single_portfolio_pagination_bottom .next:hover i{ color: '.$main_color.';}
#single_portfolio_pagination i,#single_portfolio_pagination.single_portfolio_pagination_bottom i{ color: '.$main_color.';}
.portfolio_navigation a:hover{ color: '.$main_color.';}
.portfolio_2columns_description .portfolio_item_meta_detail_description h6 a:hover{ color: '.$main_color.';}
.portfolio_3columns_description .portfolio_item_meta_detail_description h6 a:hover{ color: '.$main_color.';}
.portfolio_4columns_description .portfolio_item_meta_detail_description h6 a:hover{ color: '.$main_color.';}
.portfolio_list_fullwidth .post-readmore.portfolio-readmore a.more-link{ color: '.$main_color.'; }
.portfolio_list_fullwidth .post-readmore.portfolio-readmore a.more-link:hover{ border-color: '.$main_color.'; background: '.$main_color.';}
.ABss_inline_form .ABss_subscriber_email:focus{ -webkit-box-shadow: inset 0 0 2px '.$main_color.'; -moz-box-shadow: inset 0 0 2px '.$main_color.'; box-shadow: inset 0 0 2px '.$main_color.';}
.ABss_inline_form input[type="submit"]{ background: '.$main_color.';}
.ABss_success_message{ color: '.$main_color.';}
.ABt_testimonials_wrapper.picture_middle .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_middle .ABt_pagination a.selected{ background: '.$main_color.';}
.ABt_testimonials_wrapper.picture_middle .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_middle .ABt_pagination a:hover{ background: '.$main_color.';}
.ABt_testimonials_wrapper.testimonials_big .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.testimonials_big .ABt_pagination a.selected{ background: '.$main_color.';}
.ABt_testimonials_wrapper.testimonials_big .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.testimonials_big .ABt_pagination a:hover{ border-color: '.$main_color.'; background: '.$main_color.';}
.ABt_testimonials_wrapper.picture_bottom .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_bottom .ABt_pagination a.selected{ background: '.$main_color.';}
.ABt_testimonials_wrapper.picture_bottom .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_bottom .ABt_pagination a:hover{ background: '.$main_color.';}
.ABt_testimonials_wrapper.picture_top .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_top .ABt_pagination a.selected{ background: '.$main_color.';}
.ABt_testimonials_wrapper.picture_top .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_top .ABt_pagination a:hover{ background: '.$main_color.';}
#ABdev_main_footer a:hover{ color: '.$main_color.';}
#footer_landing_container #back_to_top:hover i{ color: '.$main_color.';}
#footer_copyright #footer_menu ul li a:hover{ color: '.$main_color.';}
.tcvpb_team_member:hover .tcvpb_overlayed .tcvpb_overlay{background: '.$hover_rgba.';}
.tcvpb_team_member:hover .tcvpb_overlayed .tcvpb_overlay{background: '.$hover_rgba.';}
.dnd_team_member:hover .dnd_overlayed .dnd_overlay{background: '.$hover_rgba.';}
.related_article:hover .overlayed .overlay{background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,  '.$hover_rgba.' 75%); background:linear-gradient(to bottom, rgba(0,0,0,0) 0%, '.$hover_rgba.' 75%);}
';

$custom_css.= '
	.dnd_section_dd header h3:after,.column_title_left:after{background: '.$secondary_color.';}
	.tcvpb_section_tc header h3:after{background: '.$secondary_color.';}
	.tcvpb_stats_excerpt .tcvpb_stats_number:after{background: '.$secondary_color.';}
	.dnd_stats_excerpt .dnd_stats_number:after{background: '.$secondary_color.';}
	.portfolio_item .overlayed:hover .overlay{background: '.$hover_rgba_sec.';}
	.portfolio_item .overlayed_detailed:hover .overlay{background: '.$hover_rgba_sec.';}
';

if(get_theme_mod('header_retina_logo', '') !='' ){
	$custom_css.= '
	#main_logo{display:inline;}
	.transparent $main_logo{display:none;}
	#retina_logo{display:none;}
	.transparent #retina_logo{display:none!important;}
	@media only screen and (-webkit-min-device-pixel-ratio: 1.3),
	only screen and (-o-min-device-pixel-ratio: 13/10),
	only screen and (min-resolution: 120dpi) {
		#main_logo{display:none!important;}
		.transparent $main_logo{display:none!important;}
		#retina_logo{display:inline;}
		.transparent #retina_logo{display:none;}
	}';
}

if(get_theme_mod('header_inverted_retina_logo', '') !='' ){
	$custom_css.= '
	#inverted_logo{display:inline;}
	.default #inverted_logo{display:none;}
	#inverted_retina_logo{display:none;}
	.default #inverted_retina_logo{display:none!important;}
	@media only screen and (-webkit-min-device-pixel-ratio: 1.3),
	only screen and (-o-min-device-pixel-ratio: 13/10),
	only screen and (min-resolution: 120dpi) {
		#inverted_logo{display:none!important;}
		.default #inverted_logo{display:none;}
		#inverted_retina_logo{display:inline;}
		.default #inverted_retina_logo{display:none;}
	}';
}


if (get_theme_mod('boxed_body', false)) {
	$bg_color = get_theme_mod('bg_color', '#50a2de');
	$bg_color = ($bg_color!='') ? ' background-color:'.$bg_color : '';

	$custom_bg_image = get_theme_mod('custom_bg_image', '');
	$custom_bg_image = ($custom_bg_image!='') ? ' background-image:url("'.$custom_bg_image.'")' : '';

	$incomeup_background_repeat = get_theme_mod('incomeup_background_repeat', 'no-repeat');
	$incomeup_background_repeat = ($incomeup_background_repeat!='' && get_theme_mod('custom_bg_image', '') != '') ? ' background-repeat:'.$incomeup_background_repeat : '';

	$incomeup_background_size = get_theme_mod('incomeup_background_size', 'cover');
	$incomeup_background_size = ($incomeup_background_size!='' && get_theme_mod('custom_bg_image', '') != '') ? ' background-size:'.$incomeup_background_size : '';

	$incomeup_background_position = get_theme_mod('incomeup_background_position', 'center center');
	$incomeup_background_position = ($incomeup_background_position!='' && get_theme_mod('custom_bg_image', '') != '') ? ' background-position:'.$incomeup_background_position : '';

	$incomeup_background_attachment = get_theme_mod('incomeup_background_attachment', 'fixed');
	$incomeup_background_attachment = ($incomeup_background_attachment!='' && get_theme_mod('custom_bg_image', '') != '') ? ' background-attachment:'.$incomeup_background_attachment : '';


	$custom_css.= 'body{'.$bg_color.'; '.$custom_bg_image.'; '.$incomeup_background_repeat.'; '.$incomeup_background_size.'; '.$incomeup_background_position.'; '.$incomeup_background_attachment.';}';

}

/* Title Breadcrumbs Bar Background */
	$incomeup_title_breadcrumbs_color = get_theme_mod('incomeup_title_breadcrumbs_color', '#f6f6f6');
	$incomeup_title_breadcrumbs_color = ($incomeup_title_breadcrumbs_color != '') ? ' background-color:'.$incomeup_title_breadcrumbs_color : '';

	$incomeup_title_breadcrumbs_image = get_theme_mod('incomeup_title_breadcrumbs_image', '');
	$featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	
	if($featured_image!='' && is_page()){
		$incomeup_title_breadcrumbs_image = ($featured_image != '') ? ' background-image:url("'.$featured_image.'")' : '';
	}
	else{
		$incomeup_title_breadcrumbs_image = ($incomeup_title_breadcrumbs_image != '') ? ' background-image:url("'.$incomeup_title_breadcrumbs_image.'")' : '';
	}


	$incomeup_background_repeat_breadcrumbs_image = get_theme_mod('incomeup_title_breadcrumbs_bar_background_repeat', 'no-repeat');
	$incomeup_background_repeat_breadcrumbs_image = ($incomeup_background_repeat_breadcrumbs_image!='' && $incomeup_title_breadcrumbs_image!= '') ? ' background-repeat:'.$incomeup_background_repeat_breadcrumbs_image : '';
	$incomeup_background_size_breadcrumbs_image = get_theme_mod('incomeup_title_breadcrumbs_bar_background_size', 'cover');
	$incomeup_background_size_breadcrumbs_image = ($incomeup_background_size_breadcrumbs_image!='' && $incomeup_title_breadcrumbs_image!= '') ? ' background-size:'.$incomeup_background_size_breadcrumbs_image : '';

	$incomeup_background_position_breadcrumbs_image = get_theme_mod('incomeup_title_breadcrumbs_bar_background_position', 'center center');
	$incomeup_background_position_breadcrumbs_image = ($incomeup_background_position_breadcrumbs_image!='' && $incomeup_title_breadcrumbs_image!= '') ? ' background-position:'.$incomeup_background_position_breadcrumbs_image : '';

	$custom_css.= '#title_breadcrumbs_bar{'.$incomeup_title_breadcrumbs_color.'; '.$incomeup_title_breadcrumbs_image.'; '.$incomeup_background_repeat_breadcrumbs_image.'; '.$incomeup_background_size_breadcrumbs_image.'; '.$incomeup_background_position_breadcrumbs_image.';}';



	$bg_color_cs = get_theme_mod('coming_soon_header_color', '#222222');
	$bg_color_cs = ($bg_color_cs!='') ? ' background-color:'.$bg_color_cs : '';

	$custom_bg_image_cs = get_theme_mod('coming_soon_bg_image', '');
	$custom_bg_image_cs = ($custom_bg_image_cs!='') ? ' background-image:url("'.$custom_bg_image_cs.'")' : '';

	$incomeup_background_repeat_cs = get_theme_mod('incomeup_coming_soon_background_repeat', 'no-repeat');
	$incomeup_background_repeat_cs = ($incomeup_background_repeat_cs!='' && get_theme_mod('coming_soon_bg_image', '')!= '') ? ' background-repeat:'.$incomeup_background_repeat_cs : '';

	$incomeup_background_size_cs = get_theme_mod('incomeup_coming_soon_background_size', 'cover');
	$incomeup_background_size_cs = ($incomeup_background_size_cs!='' && get_theme_mod('coming_soon_bg_image', '')!= '') ? ' background-size:'.$incomeup_background_size_cs : '';

	$incomeup_background_position_cs = get_theme_mod('incomeup_coming_soon_background_position', 'center center');
	$incomeup_background_position_cs = ($incomeup_background_position_cs!='' && get_theme_mod('coming_soon_bg_image', '')!= '') ? ' background-position:'.$incomeup_background_position_cs : '';

	$incomeup_background_attachment_cs = get_theme_mod('incomeup_coming_soon_background_attachment', 'fixed');
	$incomeup_background_attachment_cs = ($incomeup_background_attachment_cs!='' && get_theme_mod('coming_soon_bg_image', '')!= '') ? ' background-attachment:'.$incomeup_background_attachment_cs : '';


	$custom_css.= '#coming_soon_header{'.$bg_color_cs.'; '.$custom_bg_image_cs.'; '.$incomeup_background_repeat_cs.'; '.$incomeup_background_size_cs.'; '.$incomeup_background_position_cs.'; '.$incomeup_background_attachment_cs.';}';
