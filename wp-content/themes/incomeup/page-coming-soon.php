<?php

/*
Template Name: Coming Soon Page
*/


get_header();

get_template_part('partials/header_menu'); 

?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<div id="wrapper">
			<?php the_content();?>
		</div>
	<?php endwhile; endif;?>
	
<?php get_footer();