<?php
/**
Template Name: Home Page
 */

if( is_front_page() ){
	get_header();
} else {
	get_header( 'sw' ); 
}

?>

<section class="sw-services">
		<div class="sw-services-box">
			<div class="container">
				<div class="row">
					<div class="services-development">
						<div class="col-sm-6 col-sm-push-6">
							<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/home-03.png" alt="">
						</div>
						<div class="col-sm-6 col-sm-pull-6">
							<h2>Development</h2>
							<p>Create stunning and responsive technologies across website, mobile, e-commerce, and social media platforms. With the capacity to dedicate full time professionals to your project, Smart Works Intl. develops cutting edge and user friendly online experiences to maximize your presence and potential everywhere your clients and customers choose to connec</p>
							<a href="#" class="button button-learn">Learn More</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="services-design">
						<div class="col-sm-6">
							<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/home-01.png" alt="" style="width:550px;">
						</div>
						<div class="col-sm-6">
							<h2>Design</h2>
							<p>Transform your vision into an effective business tool. Leave a lasting impression in digital and print media through impactful design, personalized to your organizations unique style and purpose. Our team of dedicated graphic design and branding specialists work with you to solve and streamline your print, packaging, advertising, web, and mobile design needs</p>
							<a href="#" class="button button-learn">Learn More</a>
						</div>
					</div>
				</div>
			</div>
			<div class="services-marketing">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<h2>Marketing</h2>
							<p>Engage and excite your target audience with impactful dialogue while effectively reach new markets. Increase visibility and sales with a comprehensive marketing strategy that integrates Press, Social Media, and SEO driven content, turning meaningful conversation into conversions</p>
							<a href="#" class="button button-market">Try Now</a>
						</div>
						<div class="col-sm-6 text-center hidden-xs">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/presentation.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="portfolio">
		<div class="container">
			<div class="row">
				<h2 class="text-center">Portfolio</h2>
				<p class="text-center">“Partnerships with dedicated passion”</p>
			</div>
		</div>
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class="item">
	            <div class="thumbnail-caption">
	            <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/web-strategy-chicago.jpg" alt="">
	            </div>
            </div>
            <div class="item">
              <div class="thumbnail-caption">
	            <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/responsive-web-design1.jpg" alt="">
	            </div>
            </div>
            <div class="item">
             	<div class="thumbnail-caption">
	            	<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Mobile-Web-Design-Portfolio.jpg" alt="">
	            </div>
            </div>
            <div class="item">
              <div class="thumbnail-caption">
	            	<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Glendevon.jpg" alt="">
	            </div>
            </div>
          </div>
        </div>
	</section>

	<section class="customers">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="text-center">
						<h2>Over 100 Clients Served World Wide</h2>
						<h4>Connecting clients and customers across the globe.</h4>
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/6409-1.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts">
		<div class="container">
			<div class="row">
			<div class="text-center">
				<h2>Contact us to take your business to the next level</h2>
				<a href="http://localhost/smartworksintl/connect/" class="button button-hire">Hire Us</a>
			</div>
			</div>
		</div>
	</section>

<?php
get_footer();
