<?php
/**
Template Name: About Page
 */

if( is_front_page() ){
	get_header();
} else {
	get_header( 'sw' ); 
}

?>

<section class="hero-about">
	<div class="text-center">
		<h1>SmartWorks <br />International</h1>
	</div>
</section>

<section class="sw-about-content">
<div class="container">
	<div class="row">
		<div class="text-center">
			<h2>Who We Are</h2>
		</div>
		<div class="col-md-6 sw-about-block-text">
			<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/people.jpg" alt="">

		</div>
		<div class="col-md-6 sw-about-block-text">
			<p><strong>SmartWorks International</strong> was founded by Yannick d’Assignies. Yannick d’Assignies has carved a unique identity in the web and application development space. With more than fifteen years of experience in the development, IT development as well as digital marketing segment, Yannick has helped several companies and reputed brands in improving their client base and expanding their apps for enhanced internal and external communication.</p>
			<p>As a passionate and highly devoted digital marketing professional, Yannick is known for designing and developing new and exciting apps that further help companies in meeting their business goals and ambitions.</p>
		</div>
			
	</div>
</div>
</section>

<section class="sw-about-capabilities">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h2>What We Do</h2>
			</div>
			<div class="col-md-4">
				<h4>Web Design & Development</h4>
				<ul class="list-group">
					<li><p>UX / UI Design</p></li>
					<li><p>Custom WordPress Themes</p></li>	
					<li><p>E-Commerce</p></li>	
					<li><p>RWD (Responsive Web Design)</p></li>	
					<li><p>UI Design for SAAS and Mobile Apps</p></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Print Design</h4>
				<ul class="list-group">
					<li><p>Graphic Design</p></li>
					<li><p>Packaging Design</p></li>
					<li><p>Environmental Graphics</p></li>
					<li><p>Advertising</p></li>
					<li><p>Promotional and Merchandising Items</p></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Digital Marketing</h4>
				<ul class="list-group">
					<li><p>Integrated Marketing Campaigns</p></li>
					<li><p>SEO (Search Engine Optimization)</p></li>
					<li><p>SEM (Search Engine Marketing)</p></li>
					<li><p>Landing Page Creation and Optimization</p></li>
					<li><p>Email and SMS Marketing</p></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="sw-about-team">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h2>Meet the Team</h2>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img1.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img2.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img3.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img3.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img1.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/about/person_img2.jpg" alt="">
						<div class="caption">
							<h3>Yannick d’Assignies</h3>
							<p>Owner, CEO</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo placeat dolores amet laboriosam molestias, magni fugiat, natus atque consequuntur tempora! Quisquam recusandae minus expedita, unde sed sequi at nostrum laudantium.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sw-about-block-inverse">
	<div class="text-center">
		<h2>Tell us your problems.We Do it All</h2>
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
