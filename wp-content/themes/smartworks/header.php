<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smartworks
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/media.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/owl.carousel.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>

<?php wp_head(); ?>
 <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'smartworks' ); ?></a>

	<header class="top-bar">
		<nav class="navbar navbar-default navbar-default-block">
			<div class="container-fluid container-block">
				<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo_2_trans.png" alt="SmartWorks logo"></a>
			    </div>

			    <?php
			    	wp_nav_menu(array(
			    		'theme_location'	=> 'primary',
			    		'depth'				=> 2,
			    		'container'			=> 'nav',
			    		'container_class'	=> 'navbar-collapse collapse',
			    		'menu_class'		=> 'nav navbar-nav navbar-right',
			    		'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
			    		'walker'			=> new wp_bootstrap_navwalker()	
			    		));
			    ?>

			</div><!-- /.container-fluid -->
		</nav>
		<div class="hero">
			<div class="text-center">
				<h1>It all Starts with Your Stunning Website</h1>
				<p>Smartworks unites beauty and technology</p>
				<a href="#" class="button button-start">Start Now</a><br><br>
			</div>
		</div>
	</header>
