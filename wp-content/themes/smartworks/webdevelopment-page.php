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

<section class="sw-services-webdev">
	<div class="col-md-6 services-web-block">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/people.jpeg" alt="">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img1.jpg" alt="">

	</div>
	<div class="col-md-6 services-web-block">
		<div class="row">
			<h2>Web Design & Development</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora voluptatem assumenda dolore repellat quas sunt commodi alias? Voluptatibus, quod quam doloremque doloribus impedit incidunt, officiis praesentium blanditiis in ab alias.</p>
		</div>
	</div>
</section>





<?php
get_footer( 'sw' );
