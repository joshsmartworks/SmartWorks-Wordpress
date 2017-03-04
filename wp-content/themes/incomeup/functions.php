<?php
define('THEME_NAME', 'IncomeUp');
define('THEME_VERSION', '2.3.0');
define('TEMPPATH', get_template_directory_uri());
define('IMAGES', TEMPPATH . "/images");


/********* theme options - customizer ***********/
require_once( get_template_directory(). '/inc/customizer/customizer.php' );

/********* Woocommerce ***********/
require_once( get_template_directory(). '/inc/woocommerce_additionals.php' );

/********* Timeline AJAX ***********/
require_once( get_template_directory(). '/inc/timeline_ajax.php' );

/********* Creator Support ***********/
function tcvpb_support() {
    add_theme_support( 'the-creator-vpb' );
}
add_action( 'after_setup_theme', 'tcvpb_support');

function tcvpb_elements() {
	global $tcvpb_elements;
	$files = scandir(get_stylesheet_directory() . '/elements');

	foreach($files as $file) {
		if(is_file(get_stylesheet_directory() . '/elements/'.$file)){
	  		include_once (get_stylesheet_directory() . '/elements/'.$file);
		}
	}
}

if( in_array('the-creator-vpb/the-creator-vpb.php', get_option('active_plugins')) ){
	add_action( 'init', 'tcvpb_elements');
}


if ( ! function_exists( 'ABdev_incomeup_theme_setup' ) ){
	function ABdev_incomeup_theme_setup(){

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		require_once 'inc/activate_plugins.php';

		if( !isset($content_width) ){
			$content_width = 1170;
		}

		load_theme_textdomain('ABdev_incomeup', get_template_directory() . '/languages');

		/********* Register sidebars ***********/
		require_once 'inc/sidebars.php';

		/*****Widgets!******/
		add_filter('widget_text', 'do_shortcode');
		require_once 'inc/widgets/contact-info.php';
		require_once 'inc/widgets/flickr.php';

		/*****Breadcrumbs!******/
		require_once 'inc/breadcrumbs.php';

		/********* Additional fields in page and post editor ***********/
		require_once 'inc/admin/page_additional_fields.php';
		require_once 'inc/admin/post_additional_fields.php';

		/********* Additional fields in categories ***********/
		require_once 'inc/admin/categories_additional_fields.php';

		add_action( 'wp_enqueue_scripts', 'ABdev_incomeup_scripts');
		add_action('admin_enqueue_scripts', 'ABdev_load_admin_menu_script');

		add_action('init', 'ABdev_incomeup_register_my_menus');
		add_filter( 'the_content_more_link', 'ABdev_incomeup_remove_more_link_scroll_wrap');

		require_once 'inc/menu_walker.php';
		if ( ! function_exists( 'ABdev_incomeup_register_my_menus' ) ){
			function ABdev_incomeup_register_my_menus(){
				register_nav_menus(array(
					'header-menu'  => esc_html__('Header Menu', 'ABdev_incomeup'),
					'footer-menu'  => esc_html__('Footer Menu', 'ABdev_incomeup'),
				));

			}
		}

		/***** Set Revolution Slider as Theme ******/
		if( function_exists( 'set_revslider_as_theme' )){
			add_action( 'init', 'ABdev_incomeup_set_revslider_as_theme' );
		}
	}
}
add_action('after_setup_theme', 'ABdev_incomeup_theme_setup');


/********* Set Revolution Slider as Theme ***********/
if (!function_exists('ABdev_incomeup_set_revslider_as_theme')) {
	function ABdev_incomeup_set_revslider_as_theme() {
		set_revslider_as_theme();
		remove_action('admin_notices', array('RevSliderAdmin', 'add_plugins_page_notices'));
	}
}


/********* Menu  ***********/
if ( ! function_exists( 'ABdev_incomeup_scripts' ) ){
	function ABdev_incomeup_scripts() {

		//CSS styles
		$icons_deps = '';
		wp_enqueue_style('ABdev_icon_font', TEMPPATH.'/css/icons/icons.css', array(), THEME_VERSION);
		$icons_deps = array('ABdev_icon_font');

		wp_enqueue_style('font_css','//fonts.googleapis.com/css?family=Lato:400,700,400italic|Open+Sans:400');
		wp_enqueue_style('ABdev_core_icons', TEMPPATH.'/css/core-icons/core_style.css', $icons_deps, THEME_VERSION);
		wp_enqueue_style('scripts_css', TEMPPATH.'/css/scripts.css', array(), THEME_VERSION);

		/********* The Creator CSS  ***********/
		if( in_array('the-creator-vpb/the-creator-vpb.php', get_option('active_plugins')) ){
			wp_enqueue_style('tcvpb_css', TEMPPATH.'/css/the-creator.css', array(), THEME_VERSION);
		}
		wp_enqueue_style('main_css', get_stylesheet_uri(), array('font_css','ABdev_core_icons','scripts_css', 'wp-mediaelement'), THEME_VERSION);

		$custom_css = $responsive_custom_css = '';
		include 'inc/dynamic_css.php'; //styles from options - appends styles to $custom_css variable

		if(!get_theme_mod('disable_responsiveness', false)){
			wp_enqueue_style('responsive_css', TEMPPATH.'/css/responsive.css', array('main_css'));
			wp_add_inline_style('responsive_css', $responsive_custom_css);
		}

		wp_add_inline_style('main_css', $custom_css);


		/********* The Creator JS  ***********/
		if( in_array('the-creator-vpb/the-creator-vpb.php', get_option('active_plugins')) ){
			wp_enqueue_script( 'tcvpb_init', TEMPPATH.'/js/init.js', array( 'jquery', 'jquery-ui-accordion', 'jquery-effects-slide', 'wp-mediaelement' ),'', true );
			wp_enqueue_script( 'tcvpb_charts', TEMPPATH.'/js/chart.js', array( 'jquery' ),'', true );

			$options = get_option( 'tcvpb_settings' );
			$tcvpb_tipsy_opacity = (isset($options['tcvpb_tipsy_opacity'])) ? $options['tcvpb_tipsy_opacity'] : '0.8';
			$tcvpb_custom_map_style = (isset($options['tcvpb_custom_map_style'])) ? $options['tcvpb_custom_map_style'] : '';
			wp_localize_script( 'tcvpb_init', 'tcvpb_options', array(
				'tcvpb_tipsy_opacity' => $tcvpb_tipsy_opacity,
				'tcvpb_custom_map_style' => preg_replace('!\s+!', ' ', str_replace(array("\n","\r","\t"), '', $tcvpb_custom_map_style)),
			));
		}

		$google_maps_api_key = get_theme_mod('google_maps_api_key', '');
		$google_maps_api_key_out = '';
		if(isset($google_maps_api_key) && $google_maps_api_key != ''){
			$google_maps_api_key_out = '?key='.$google_maps_api_key;
		}
		wp_enqueue_script( 'google_maps_api', '//maps.googleapis.com/maps/api/js'.esc_attr($google_maps_api_key_out).'','','', true);
		wp_enqueue_script( 'scripts', TEMPPATH.'/js/scripts.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'incomeup_custom', TEMPPATH.'/js/custom.js', array( 'scripts', 'wp-mediaelement', 'jquery-ui-accordion', 'jquery-effects-slide'),'', true );
		wp_localize_script( 'incomeup_custom', 'abdev_timeline_posts', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'noposts' => esc_html__('No older posts found', 'ABdev_incomeup')
		));

	}
}

if (!function_exists('ABdev_allowed_tags')) {
	function ABdev_allowed_tags(){
		return array(
			'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'p' => array(),
		    'strong' => array(),
		    'i' => array(
		    	'class' => array()
		    ),
		    'cite' => array(
		    	'title' => array()
		    ),
		);

	}
}

if(!function_exists('ABdev_text_sanitization')){
	function ABdev_text_sanitization($input){
		return wp_kses_post( force_balance_tags($input) );
	}
}

if(!function_exists('ABdev_checkbox_sanitization')){
	function ABdev_checkbox_sanitization($input){
		if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
}

if(!function_exists('ABdev_sanitize_integer')){
	function ABdev_sanitize_integer($input){
		if( is_numeric( $input ) ) {
	        return intval( $input );
	    }
	}
}

if ( ! function_exists( 'ABdev_load_admin_menu_script' ) ){
	function ABdev_load_admin_menu_script($hook) {
		wp_enqueue_style( 'ABdev_admin_css', TEMPPATH.'/css/admin.css', array(), THEME_VERSION );
		if( $hook != 'nav-menus.php')
			return;
		wp_enqueue_script( 'ABdev_additional_menu_fields', TEMPPATH.'/js/admin_additional_menu_fields.js' );
	}
}


if ( ! function_exists( 'ABdev_incomeup_remove_more_link_scroll_wrap' ) ){
	function ABdev_incomeup_remove_more_link_scroll_wrap( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return '<div class="post-readmore">'.$link.'</div>';
	}
}

if ( ! function_exists( 'ABdev_incomeup_search_content_highlight' ) ){
	function ABdev_incomeup_search_content_highlight() {
		$content = ABdev_incomeup_search_res_excerpt(strip_tags(do_shortcode(get_the_content())),get_search_query());
		$keys = implode('|', explode(' ', get_search_query()));
		$content = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $content);
		echo $content;
	}
}

if ( ! function_exists( 'ABdev_incomeup_search_title_highlight' ) ){
	function ABdev_incomeup_search_title_highlight() {
		$title = get_the_title();
		$keys = implode('|', explode(' ', get_search_query()));
		$title = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $title);
		echo $title;
	}
}

if ( ! function_exists( 'ABdev_incomeup_search_res_excerpt' ) ){
	function ABdev_incomeup_search_res_excerpt($text, $phrase, $radius = 200, $ending = "...") {
		if(empty($phrase)){
			return ;
		}
		$phraseLen = strlen($phrase);
		if ($radius < $phraseLen) {
			$radius = $phraseLen;
		 }
		$phrases = explode (' ',$phrase);
		foreach ($phrases as $phrase) {
			$pos = strpos(strtolower($text), strtolower($phrase));
			if ($pos > -1) {
				break;
			}
		}
		$startPos = 0;
		if ($pos > $radius) {
			$startPos = $pos - $radius;
		}
		$textLen = strlen($text);
		$endPos = $pos + $phraseLen + $radius;
		if ($endPos >= $textLen) {
			$endPos = $textLen;
		}
		$excerpt = substr($text, $startPos, $endPos - $startPos);
		if ($startPos != 0) {
			$excerpt = substr_replace($excerpt, $ending, 0, $phraseLen);
		}
		if ($endPos != $textLen) {
			$excerpt = substr_replace($excerpt, $ending, -$phraseLen);
		}
		return $excerpt;
	}
}

if ( ! function_exists( 'ABdev_incomeup_name_to_class' ) ){
	function ABdev_incomeup_name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
}

if ( ! function_exists( 'ABdev_incomeup_woo_is_in_cart' ) ){
	function ABdev_incomeup_woo_is_in_cart($id) {
		global $woocommerce;
		if(is_object($woocommerce->cart)){
			foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if( $id == $_product->id ) {
					return true;
				}
			}
		}
		return false;
	}
}


if ( ! function_exists( 'ABdev_incomeup_add_to_cart_wishlist' ) ){
	function ABdev_incomeup_add_to_cart_wishlist(){
		global $wpdb, $woocommerce;

		$product_id = $_POST['product_id'];
		$add_to = $_POST['add_to'];

		if($add_to=='cart'){
			$woocommerce->cart->add_to_cart($product_id);
		}
		elseif($add_to=='wishlist'){
			$response = http_get(plugins_url()."/yith-woocommerce-wishlist/yith-wcwl-ajax.php?action=add_to_wishlist&amp;add_to_wishlist=".$product_id);
		}
		die(__('OK', 'dnd-shortcodes'));
	}
}
if ( is_admin() ) {
	add_action('wp_ajax_ABdev_incomeup_add_to_cart_wishlist', 'ABdev_incomeup_add_to_cart_wishlist');
	add_action('wp_ajax_nopriv_ABdev_incomeup_add_to_cart_wishlist', 'ABdev_incomeup_add_to_cart_wishlist');
}


//custom rewrite rules - when you put /%category%/%postname%/ and . for category base - hack!

// add_filter( 'category_rewrite_rules', 'vipx_filter_category_rewrite_rules' );
function vipx_filter_category_rewrite_rules( $rules ) {
    $categories = get_categories( array( 'hide_empty' => false ) );

    if ( is_array( $categories ) && ! empty( $categories ) ) {
        $slugs = array();
        foreach ( $categories as $category ) {
            if ( is_object( $category ) && ! is_wp_error( $category ) ) {
                if ( 0 == $category->category_parent ) {
                    $slugs[] = $category->slug;
                } else {
                    $slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
                }
            }
        }

        if ( ! empty( $slugs ) ) {
            $rules = array();

            foreach ( $slugs as $slug ) {
                $rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')(/page/(\d)+/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
            }
        }
    }
    return $rules;
}

if ( ! function_exists( 'get_theme_mod_not_empty' ) ){
	function get_theme_mod_not_empty($option,$default){
		$return = get_theme_mod($option, $default);
		if($return==''){
			$return = $default;
		}
		return $return;
	}
}