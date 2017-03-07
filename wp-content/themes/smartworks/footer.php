<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smartworks
 */

?>

<<<<<<< HEAD
=======
	

>>>>>>> c19ca9f4e960d9c090efc8092a7090f8b56fa0ca
<?php wp_footer(); ?>
<footer>
		<div class="container">
			<div class="row sw-footer-row-1">
				<div class="col-sm-4 sw-footer-box">
					<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo_2_trans.png" alt=""></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa maxime nam nobis facere rem provident consectetur qui. Provident aut sunt accusantium autem, veritatis quibusdam quidem iusto hic, voluptas omnis vero.</p>
				</div>
				<div class="col-sm-4 col-xs-12 sw-footer-box">
					<ul>
						<li><h4>Connect</h4></li>
						<li><p><i class="fa fa-map" aria-hidden="true"></i> 8605 Santa Monica Blvd CA </p></li>
						<li><p><i class="fa fa-envelope" aria-hidden="true"></i>info@smartworksintl.com </p></li>
						<li><p><i class="fa fa-phone" aria-hidden="true"></i>  +1415 555 2671</p></li>
					</ul>
				</div>
				<div class="col-sm-4 col-xs-12 sw-footer-box">
					<ul>
						<li><h4>Quick Links</h4></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Clients</a></li>
						<li><a href="#">Connect</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 sw-footer-box-two">
					<h4>Web Design & Development</h4>
					<ul>
						<li><p>UX / UI Design</p></li>	
						<li><p>Custom WordPress Themes</p></li>	
						<li><p>E-Commerce</p></li>	
						<li><p>RWD (Responsive Web Design)</p></li>	
						<li><p>UI Design for SAAS and Mobile Apps</p></li>	
					</ul>
				</div>
				<div class="col-sm-4 col-xs-12 sw-footer-box-two">
					<h4>Print Design</h4>
					<ul>
					<li><p>Graphic Design</p></li>
					<li><p>Packaging Design</p></li>
					<li><p>Environmental Graphics</p></li>
					<li><p>Advertising</p></li>
					<li><p>Promotional and Merchandising Items</p></li>
					</ul>
				</div>
				<div class="col-sm-4 col-xs-12 sw-footer-box-two">
					<h4>Digital Marketing</h4>
					<ul>
						<li><p>Integrated Marketing Campaigns</p></li>
						<li><p>SEO (Search Engine Optimization)</p></li>
						<li><p>SEM (Search Engine Marketing)</p></li>
						<li><p>Landing Page Creation and Optimization</p></li>
						<li><p>Email and SMS Marketing</p></li>
					</ul>
				</div>
			</div>
		</div>	
		<div class="footer-block">
			<div class="footer-block-row">
				<div class="container">
				<div class="row">
					<div class="col-md-9 col-xs-12">
						<p>2017 &copy; SmartWorks International. All Rights Reserved</p>
					</div>
					<div class="col-md-3 col-xs-12 footer-block-social">
						<ul class="list-inline pull-right">
							<li><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-center" id="myModalLabel">Let's Talk Business</h4>
	      </div>
	      <div class="modal-body">
	        <p>Tell Us about your project ideas.</p>
	        <form action="" class="form-horizontal">
	        	<div class="form-group">
	        		<label for="name" class="col-sm-2 control-label"><i class="fa fa-user fa-3x" aria-hidden="true"></i></label>
	        		<div class="col-sm-10">
	        			<input type="text" name="name" class="form-control" placeholder="John Doe">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label for="email" class="col-sm-2 control-label"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></label>
	        		<div class="col-sm-10">
	        			<input type="email" name="email" class="form-control" placeholder="johndoe@gmail.com">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label for="phone" class="col-sm-2 control-label"><i class="fa fa-phone-square fa-3x" aria-hidden="true"></i></label>
	        		<div class="col-sm-10">
	        			<input type="text" name="phone" class="form-control" placeholder="ex. +1415 555 2671">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label for="phone" class="col-sm-2 control-label"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></label>
	        		<div class="col-sm-10">
	        			<textarea name="description"  cols="30" rows="10" class="form-control" placeholder="Tell us about your project in your own words? What is, for you, the main goal of the project?"></textarea>
	        		</div>
	        	</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	      <div class="col-sm-4 col-sm-offset-4">
	        <button type="button" class="btn btn-primary btn-block btn-lg">Submit</button>
	      </div>
	      </div>
	    </div>
	  </div>
<<<<<<< HEAD
	</div> <!-- End Modal -->
=======
	</div> 
>>>>>>> c19ca9f4e960d9c090efc8092a7090f8b56fa0ca

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory');?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_directory');?>/assets/js/owl.carousel.min.js"></script>
<<<<<<< HEAD
      
=======

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    	</script>
>>>>>>> c19ca9f4e960d9c090efc8092a7090f8b56fa0ca
	    <script>
			$(function(){
				$('.owl-carousel').owlCarousel({
				    loop:true,
				    margin:10,
				    responsiveClass:true,
				    responsive:{
				        0:{
				            items:3,
				            autoplay:true,
				            autoplayTimeout: 3000,
				            autoWidth:true,
				            nav:true
				        },
				        600:{
				            items:3,
				            autoWidth:true,
				            autoplay:true,
				            autoplayTimeout: 3000,
				            nav:true,
				            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				            nav:false
				        },
				        1000:{
				            items:3,
				            autoplay:true,
				            autoplayTimeout: 3000,
				            autoWidth:true,
				            nav:true,
				            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				            loop:true
				        }
				    }
				})
			})
		</script>
<<<<<<< HEAD
		<script>
			$(".navbar-collapse").attr('id', 'navbar');
			$("#myModal").modal('hide').on('hidden.bs.modal');
		</script>
=======
>>>>>>> c19ca9f4e960d9c090efc8092a7090f8b56fa0ca

</body>
</html>
