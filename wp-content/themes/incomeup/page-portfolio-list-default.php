<?php

/*
Template Name: Portfolio - List
*/

$read_more=__('Read More','ABdev_incomeup');

$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");

get_header();

$portfolio_data = get_post_custom();

$values = get_post_custom( $post->ID );

get_template_part('partials/header_menu');
get_template_part('partials/title_breadcrumbs_bar');

?>

<?php //check if portfolio plugin is activated
if(current_user_can( 'manage_options' ) && !in_array( 'abdev-portfolio/abdev-portfolio.php', get_option( 'active_plugins') )):?>
	<section>
		<div class="container">
			<p>
				<strong><?php _e('This page requires Portfolio plugin to be activated','ABdev_incomeup');?></strong>
			</p>
		</div>
	</section>
<?php
endif;


if (have_posts()) : while (have_posts()) : the_post();
	$content = do_shortcode(get_the_content());
	if ($content != ''):?>
		<section>
			<div class="container">
				<?php echo $content;?>
			</div>
		</section>
<?php endif; endwhile; endif;?>



<section class="<?php echo ($content != '') ? 'section_border_top' : '';?> portfolio_single">
	<div class="container">
		<div class="row">
			<div class="<?php echo(isset($values['ABdev_portfolio_page_layout'][0])) ? esc_attr($values['ABdev_portfolio_page_layout'][0]) : '' ;?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_full_width' )?'span12 content':'span9 content';?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar')?'content_with_left_sidebar': ( (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_right_sidebar') ?'content_with_right_sidebar' : '');?>">

			<?php
			$values = get_post_custom( $post->ID );
			$selected_categories = isset($values['categories'][0]) ? $values['categories'][0] : '';
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$portfolio_data = get_post_custom();

			$args = array(
				'post_type' => 'portfolio',
				'portfolio-category' => $selected_categories,
				'paged'=>$paged,
			);
			$posts = new WP_Query( $args );
			$out = '';
			if ($posts->have_posts()){
				while ($posts->have_posts()){

					$posts->the_post();
					$in_category=array();
					$terms = get_the_terms( $post->ID , 'portfolio-category' );
					if(is_array($terms)){
						foreach ( $terms as $term ) {
							if(is_object($term)){
								$in_category[] = $term->name;
							}
						}
					$portfolio_data = get_post_custom($post->ID );
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					}

					$in_category = implode(', ', $in_category);

					$out.= '<div class="portfolio_list_fullwidth">
								<div class="portfolio_item portfolio_single_column_item portfolio_list_fullwidth">
									<div class="overlayed">
										' . get_the_post_thumbnail() . '
										<a class="overlay lightbox" data-lightbox="portfolio"  href="'.esc_url($url).'" >
										<p class="overlay_title">' . get_the_title() . '</p>
										<p class="portfolio_item_tags">'.$in_category.'</p>
										</a>
									</div>
									<div class="portfolio_item_meta">
										<h5 class="portfolio_title"><a href="'.esc_url(get_permalink()).'">' . get_the_title() . '</a></h5>
										<p class="portfolio_item_meta_category"> '.__('Category: ', 'ABdev_incomeup').''.$in_category.'</p>
										<div class="portfolio_single_content">
										'.((isset($portfolio_data['ABp_portfolio_description'][0])) ? $portfolio_data['ABp_portfolio_description'][0] : '').'
										</div>
										<div class="post-readmore portfolio-readmore">
											<a href="'.esc_url(get_permalink()).'" class="more-link"> '.__('Learn more', 'ABdev_incomeup').'</a>
										</div>
									</div>
								</div>
							</div>';
				}
			}
			else{
				echo '<p>' . __('No Portfolio Posts Found.', 'ABdev_incomeup') . '</p>';
			}

			?>

				<div class="portfolio_items clearfix">
					<?php echo $out;?>
				</div>
				<?php get_template_part( 'partials/pagination-portfolio' ); ?>
			</div>

			<?php if (isset($values['ABdev_portfolio_page_layout'][0]) && in_array($values['ABdev_portfolio_page_layout'][0], array('portfolio_left_sidebar','portfolio_right_sidebar'))) : ?>
			<aside class="span3 sidebar <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar' )?'sidebar_left':'sidebar_right';?>">
				<?php get_sidebar(); ?>
			</aside>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php
	$content_after_portfolio = get_theme_mod('content_after_portfolio','');
	if($content_after_portfolio!=''){
		echo do_shortcode($content_after_portfolio);
	}
?>

<?php get_footer();