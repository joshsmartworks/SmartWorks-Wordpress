<?php

/*
Template Name: 404 page
*/

get_header();

get_template_part('partials/header_menu');
get_template_part('partials/title_breadcrumbs_bar');

?>

	<section id="page404" class="container">
		<p class="big_404"><?php esc_html_e('404', 'ABdev_incomeup') ?></p>
		<p class="big_404_text"><?php esc_html_e('PAGE NOT FOUND', 'ABdev_incomeup') ?></p>
		<p><?php esc_html_e('You can go back to the ', 'ABdev_incomeup') ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Homepage', 'ABdev_incomeup') ?></a> <?php esc_html_e('or search what you are looking', 'ABdev_incomeup') ?></p>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				<?php the_content();?>
			<?php endwhile; endif;?>
	</section>

<?php get_footer();