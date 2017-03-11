<?php
/**
Template Name: Connect Page
 */


if( is_front_page() ){
	get_header();
} else {
	get_header( 'sw' ); 
}

?>

<section class="hero-contact">
	<div class="text-center">
		<h1>Contact Us</h1>
		<p>We're here and happy to help you with anything you need.</p>
	</div>
</section>

<section class="contact-form">
	<div class="container">
		<div class="row">
			<div class="col-md-5 sw-form-block">
				<h2>SmartWorks International</h2>
				<p>8605 Santa Monica Blvd #75714
					Santa Monica CA, 90069 </p>
				<a href="mailto:yannick@smartworksintl.com">424-272-0570</a>
				<a href="mailto:yannick@smartworksintl.com">yannick@smartworksintl.com</a>
				<h2>Follow Us</h2>
				<ul class="list-inline">
					<li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus fa-2x"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
				</ul>
			</div>
			<div class="col-md-7 sw-form-block">
				<h2>Message</h2>
				 <?php echo do_shortcode( '[contact-form-7 id="4" title="Contact form 1"]' ); ?>
			</div>
		</div>
	</div>
</section>

<section>
	<div id="map" style="width:100%;height:300px"></div>
</section>
	
<?php


get_footer( 'sw' );






