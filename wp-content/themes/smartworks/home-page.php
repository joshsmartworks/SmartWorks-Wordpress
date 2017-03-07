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
							<p>While other similar products offer a few features that you can really consider useful, Smartworks is always develop one step ahead of competitors. Find out why you should use Smartworks for your startup development.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nobis suscipit provident minima itaque soluta rerum enim repellendus repudiandae sint dolorum iure laboriosam atque error neque, aliquid, expedita alias tempora.</p>
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis temporibus nam velit non adipisci cupiditate consequatur quae tenetur, nulla maxime debitis ea, labore autem, accusantium obcaecati, saepe facilis assumenda voluptatem.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolor dolorem, inventore cupiditate fuga natus ut consectetur nam! Excepturi esse sequi praesentium et eos consequuntur accusamus perferendis fugiat, debitis cum?</p>
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
							<h4>We Help you Grow</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eaque voluptas repudiandae impedit consequatur corporis qui doloremque quasi officia, dignissimos officiis deleniti illo est, numquam ut molestiae. Perferendis distinctio, adipisci.</p>
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
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus possimus, dolores inventore incidunt saepe dicta facere, non temporibus quos ea! Deserunt earum, saepe fugiat placeat excepturi alias laboriosam, et quis!</p>
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
						<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
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
				<a href="#" class="button button-hire">Hire Us</a>
			</div>
			</div>
		</div>
	</section>

<?php
get_footer();
