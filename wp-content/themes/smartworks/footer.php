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
						<li><p><i class="fa fa-envelope" aria-hidden="true"></i>yannick@smartworksintl.com </p></li>
						<li><p><i class="fa fa-phone" aria-hidden="true"></i>  424-272-0570</p></li>
					</ul>
				</div>
				<div class="col-sm-4 col-xs-12 sw-footer-box">
					<ul>
						<li><h4>Quick Links</h4></li>
						<li><a href="http://localhost/smartworksintl">Home</a></li>
						<li><a href="http://localhost/smartworksintl/about/">About</a></li>
						<li><a href="http://localhost/smartworksintl/services/">Services</a></li>
						<li><a href="http://localhost/smartworksintl/services/"> Clients Connect</a></li>
						<li><a href="http://localhost/smartworksintl/services/" data-toggle="modal" data-target="#myModal"> Request a Quote</a></li>
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
							<li><a href="https://www.facebook.com/SmartWorksIntl/" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href="https://www.twitter.com/smartworksintl" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href="https://plus.google.com/u/0/103618327890944078034" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a></li>
							<li><a href="https://www.instagram.com/smartworksintl/" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>
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
	        <?php echo do_shortcode( '[contact-form-7 id="38" title="Request Form"]' ); ?>
	      </div>
	      <!-- <div class="modal-footer">
	      <div class="col-sm-4 col-sm-offset-4">
	        <button type="button" class="btn btn-primary btn-block btn-lg">Submit</button>
	      </div>
	      </div> -->
	    </div>
	  </div>

	</div> <!-- End Modal -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory');?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_directory');?>/assets/js/owl.carousel.min.js"></script>

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
		<script>
			$(".navbar-collapse").attr('id', 'navbar');
			$("#myModal").modal('hide').on('hidden.bs.modal');
		</script>

		<script>

		var num= 80;

			$(function(){
				$(window).bind('scroll', function(){
					if($(window).scrollTop() > num){
						$('.navbar-default-block').addClass('top-fixed');
					}else{
						$('.navbar-default-block').removeClass('top-fixed');
					}
				});
			});
		</script>


</body>
</html>
