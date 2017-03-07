<?php
/**
Template Name: Services Page
 */

if( is_front_page() ){
	get_header();
} else {
	get_header( 'sw' ); 
}

?>

<section class="hero-services">
	<div class="text-center">
		<h1>Win More Customers Online</h1>
		<p>All Your Outsourcing Needs</p>
	</div>
</section>


<section class="sw-services-content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="text-center">
					<i class="fa fa-desktop fa-3x"></i>
					<h2>Website Design & Development</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptas, quae itaque, labore omnis atque ab ad a adipisci voluptatem explicabo nesciunt nam blanditiis quisquam nisi rerum illum esse repellat.</p>
					<a href="#" class="btn btn-default">Learn More</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="text-center">
					<i class="fa fa-snowflake-o fa-3x"></i>
					<h2>Print Design</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptas, quae itaque, labore omnis atque ab ad a adipisci voluptatem explicabo nesciunt nam blanditiis quisquam nisi rerum illum esse repellat.</p>
					<a href="#" class="btn btn-default">Learn More</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="text-center">
					<i class="fa fa-envelope-open-o fa-3x"></i>
					<h2>Digital Marketing</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptas, quae itaque, labore omnis atque ab ad a adipisci voluptatem explicabo nesciunt nam blanditiis quisquam nisi rerum illum esse repellat.</p>
					<a href="#" class="btn btn-default">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sw-services-block-inverse">
	<div class="text-center">
		<h2>Is your website working hard enough?</h2>
	</div>
</section>

<section class="sw-services-block-contact">
	<div class="text-center">
		<h2>Start growing your Business Online Today</h2>
		<a href="#" class="btn btn-default btn-lg">Hire Us</a>
	</div>
</section>


<?php
get_footer( 'sw' );
