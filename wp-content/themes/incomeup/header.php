<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
	if ( ! function_exists( '_wp_render_title_tag' ) ) :
	    function theme_slug_render_title() {
			?>
			<title><?php wp_title( ' ', true, 'right' ); ?></title>
			<?php
		}
		add_action( 'wp_head', 'theme_slug_render_title' );
	endif;
?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
$classes='';

if(get_theme_mod('enable_preloader', false)){
	$classes = 'preloader';
}

if ( is_singular() ){
	wp_enqueue_script( "comment-reply" );
}
wp_head();
?>
</head>

<body <?php body_class($classes); ?>>

<?php
	echo (get_theme_mod('boxed_body', false)) ? '<div class="boxed_body_wrapper">' : '';

	$header_layout = get_theme_mod('header_layout', 'default');
	$header_layout = (is_page_template('page-coming-soon.php')) ? 'coming_soon' : $header_layout;
	get_template_part('partials/header_layout_'.$header_layout);
