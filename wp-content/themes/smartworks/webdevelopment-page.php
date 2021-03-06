<?php
/**
Template Name: Web Design Page
 */

if( is_front_page() ){
	get_header();
} else {
	get_header( 'sw' ); 
}

?>

<section class="sw-services-content">
	<div class="col-md-6 services-content-block">
		<div class="row">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/services/pexels-photo-225502.jpeg" alt="">
		</div>
	</div>
	<div class="col-md-6 services-content-block">
		<div class="row">
			<h1>Web Design & Development</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora voluptatem assumenda dolore repellat quas sunt commodi.</p>
			<ul>
				<li><i class="fa fa-arrow-right"></i> UX / UI Design</li>	
				<li><i class="fa fa-arrow-right"></i> Custom WordPress Themes</li>	
				<li><i class="fa fa-arrow-right"></i> E-Commerce</li>	
				<li><i class="fa fa-arrow-right"></i> RWD (Responsive Web Design)</li>	
				<li><i class="fa fa-arrow-right"></i> UI Design for SAAS and Mobile Apps</li>	
			</ul>
			<a href="#" class="button button-started">Get Started</a>
		</div>
	</div>
</section>

<section class="sw-services-content-1">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h2>A Range of Advantages</h2>
				<h3>At An Affordable Price</h3>
			</div>
		</div>
		<div class="row services-content-block-1">
			<div class="col-md-4">
				<i class="fa fa-gear fa-4x" aria-hidden="true"></i>
				<h4>Installation and Setup</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ipsum asperiores quam ratione officiis cupiditate tempore.</p>
			</div>
			<div class="col-md-4">
				<i class="fa fa-phone fa-4x" aria-hidden="true"></i>
				<h4>Customer Support</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ipsum asperiores quam ratione officiis cupiditate tempore.</p>
			</div>
			<div class="col-md-4">
				<i class="fa fa-thumbs-o-up fa-4x" aria-hidden="true"></i>
				<h4>Customer satisfaction guarantee</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ipsum asperiores quam ratione officiis cupiditate tempore.</p>
			</div>
		</div>
		<div class="row services-content-block-2">
			<div class="col-md-4 col-md-offset-4">
				<div class="text-center">
					<a href="#" class="btn btn-primary btn-lg btn-block">Hire Us</a>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
get_footer( 'sw' );




