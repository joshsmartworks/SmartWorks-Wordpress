<?php 
get_header();

get_template_part('partials/header_menu'); 

global $ABdev_title_bar_title;
$ABdev_title_bar_title  = __('Search results','ABdev_incomeup');
get_template_part('partials/title_breadcrumbs_bar');
?>
	
	<section>
		<div class="container">
			<h3 id="search_results_sum_title"><?php _e('Showing Results for: ', 'ABdev_incomeup');?> <?php the_search_query(); ?> (<?php echo $wp_query->found_posts; ?>)</h3>
			<div class="row">
				<div class="span9 content_with_right_sidebar">
					<?php if (have_posts()) : 
						$i = (((get_query_var('paged')) ? get_query_var('paged') : 1) - 1 ) * get_option('posts_per_page');
						while (have_posts()) : the_post(); 
							$i++; ?>

						<div class="search_results_content_item">
							<h5><a href="<?php the_permalink(); ?>"><?php ABdev_incomeup_search_title_highlight(); ?></a></h5>
							<span class="search_resuls_number"><?php echo $i; ?>.</span>
							<p><?php ABdev_incomeup_search_content_highlight(); ?></p>
						</div>

					<?php endwhile; ?>
					<?php else: ?>
						<?php _e('Sorry, your search query yielded no results.', 'ABdev_incomeup'); ?>
					<?php endif;?>
				</div>
				<aside class="span3 sidebar">
					<?php dynamic_sidebar(__( 'Search Results Sidebar', 'ABdev_incomeup' )); ?>
				</aside>
			</div>
		</div>
	</section>


<?php get_template_part( 'partials/pagination-search' ); ?>


<?php get_footer();