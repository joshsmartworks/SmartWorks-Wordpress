<?php
get_header();

$portfolio_data = get_post_custom();

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
<?php endif; ?>
<?php if(isset($portfolio_data['ABp_portfolio_show_slider'][0]) && $portfolio_data['ABp_portfolio_show_slider'][0]==1): ?>
	<section id="ABdev_main_slider">
		<?php
		if( isset( $portfolio_data['ABp_portfolio_revslider_alias'][0]) && $portfolio_data['ABp_portfolio_revslider_alias'][0] != '' ){
			if(function_exists('putRevSlider')){
				putRevSlider( $portfolio_data['ABp_portfolio_revslider_alias'][0] );
			}
		}
		else{
			_e('You did not select any slider in <i>Portfolio Slider</i> metabox.', 'ABdev_incomeup');
		}
		?>
	</section>
<?php endif; ?>


<?php if(isset($portfolio_data['ABp_portfolio_layout'][0]) && $portfolio_data['ABp_portfolio_layout'][0]=='style1'): ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<section id="simple_item_portfolio">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link','<i class="ci_icon-chevron-left"></i>'); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Projects', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="span8">
						<?php
						if(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='soundcloud'){
							echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$portfolio_data['ABp_portfolio_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='youtube'){
							echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$portfolio_data['ABp_portfolio_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='vimeo'){
							echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$portfolio_data['ABp_portfolio_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='gallery'){
						echo'<div class="slider-wrapper theme-default">
    							   <div id="portfolio_gallery_slider" class="nivoSlider">';
    							   if (isset($portfolio_data['portfolio_gallery'][0]) && $portfolio_data['portfolio_gallery'][0] != '') {
										foreach (explode(',', $portfolio_data['portfolio_gallery'][0]) as $key) {
					 						echo '<img src="'.esc_url(wp_get_attachment_url($key)).'" data-thumb="'.esc_attr(wp_get_attachment_url($key)).'" alt="">';
										}
    							   }
					 	echo '</div>
    						</div>';
						}
						else{
							the_post_thumbnail('full', array('class' => 'portfolio_item_image'));
						}
						?>
					</div>
					<div class="span4 portfolio_item_meta">
						<h5 class="column_title_left"><?php _e('Project Description', 'ABdev_incomeup'); ?></h5>
						<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
							<p class="portfolio_single_description">
								<?php echo $portfolio_data['ABp_portfolio_description'][0];?>
							</p>
						<?php endif; ?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Date:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php the_date();?></span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_client'][0])):?>
							<p class="portfolio_single_detail">
								<span class="portfolio_item_meta_label"><?php _e('Client:', 'ABdev_incomeup');?></span>
								<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_client'][0];?></span>
							</p>
						<?php endif; ?>
						<?php if(isset($portfolio_data['ABp_portfolio_skills'][0])):?>
							<p class="portfolio_single_detail">
								<span class="portfolio_item_meta_label"><?php _e('Skills:', 'ABdev_incomeup');?></span>
								<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_skills'][0];?></span>
							</p>
						<?php endif; ?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Category:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data">
							<?php
							$terms = get_the_terms( $post->ID , 'portfolio-category' );
							if(is_array($terms)){
								foreach ( $terms as $term ) {
									if(is_object($term)){
										$categories[] = $term->name;
										$related_cat[] = $term->slug;
									}
								}
							}
							$categories = (isset($categories) && is_array($categories)) ? implode(', ', $categories) : '';
							echo $categories;
							?>
							</span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_link'][0])):?>
							<p class="portfolio_item_view_link">
								<a href="<?php echo esc_url($portfolio_data['ABp_portfolio_link'][0]);?>" target="<?php echo esc_attr($portfolio_data['ABp_portfolio_link_target'][0]);?>"><?php _e('View work','ABdev_incomeup');?></a>
							</p>
						<?php endif; ?>
						<p class="post_meta_share portfolio_share_social">
							<?php _e('Share','ABdev_incomeup');?>
							<a class="post_share_facebook dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

							<a class="post_share_twitter dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

							<a class="post_share_googleplus dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?> ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

							<a class="post_share_linkedin dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title('', '' , false)).'&url='. urlencode(get_permalink())); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
						</p>
					</div>
				</div>
			</div>
		</section>
		<?php the_content();?>
		<?php if(isset($portfolio_data['ABp_portfolio_show_related'][0]) && $portfolio_data['ABp_portfolio_show_related'][0]==1): ?>
			<section id="related_portfolio">
				<div class="container">
					<h4 class="column_title_center"><?php _e('Related Projects', 'ABdev_incomeup'); ?></h4>
					<div class="row portfolio_4column">
						<?php
						$related_cat = implode(', ', $related_cat);
						$args = array(
							'post_type' => 'portfolio',
							'portfolio-category' => $related_cat,
							'posts_per_page'=>4,
							'post__not_in'=>array($post->ID),
							);
						$related = new WP_Query( $args );
						$out = $error = '';
						if ($related->have_posts()){
							while ($related->have_posts()){
								$related->the_post();
								$slugs=$in_category='';
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$slugs.=' '.$term->slug;
											$filter_slugs[$term->slug] = $term->name;
											$in_category[] = $term->name;
										}
									}
								}
								$in_category = (isset($in_category) && is_array($in_category)) ? implode(', ', $in_category) : '';
								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$thumbnail_object = get_post($thumbnail_id);
								$thumbnail_src=$thumbnail_object->guid;
								echo '<div class="span3">
										<div class="portfolio_inner_content">
											<div class="portfolio_item">
												<div class="overlayed">
													'.get_the_post_thumbnail().'
													<a class="overlay" href="'.esc_url(get_the_permalink()).'">
														<p class="overlay_title">'.get_the_title().'</p>
														<p class="portfolio_item_tags">'.$in_category.'</p>
													</a>
												</div>
											</div>
											<div class="portfolio_item_meta">
												<h6 class="column_title_center"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h6>
												<p class="portfolio_4column_info"><span class="portfolio_item_meta_data">'.$in_category.'</span></p>
											</div>
										</div>
									</div>';
							}
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<section id="porfolio_pagination">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link', '<i class="ci_icon-chevron-left"></i>' ); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Projects', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; endif;?>

<?php elseif(isset($portfolio_data['ABp_portfolio_layout'][0]) && $portfolio_data['ABp_portfolio_layout'][0]=='style2'): ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<section id="single_portfolio_pagination_layout2">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev"><?php previous_post_link('%link','<i class="ci_icon-chevron-left"></i>'.__('Previous project','ABdev_incomeup')); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Projects', 'ABdev_incomeup') ?>" data-gravity="n"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next"><?php next_post_link('%link',  __('Next project','ABdev_incomeup').'<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="span8">
						<h5 class="column_title_left"><?php _e('Project Description', 'ABdev_incomeup'); ?></h5>
						<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
							<p class="portfolio_single_description"><?php echo $portfolio_data['ABp_portfolio_description'][0];?></p>
							<p class="post_meta_share portfolio_share_social"><?php _e('Share','ABdev_incomeup');?>
								<a class="post_share_facebook dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

								<a class="post_share_twitter dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

								<a class="post_share_googleplus dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?> ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

								<a class="post_share_linkedin dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title('', '' , false)).'&url='. urlencode(get_permalink())); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
							</p>
						<?php endif; ?>
					</div>
					<div class="span4 portfolio_item_meta">
						<h5 class="column_title_left"><?php _e('Project Details', 'ABdev_incomeup'); ?></h5>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Date:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php the_date();?></span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_client'][0])):?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Client:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_client'][0];?></span>
						</p>
						<?php endif; ?>
						<?php if(isset($portfolio_data['ABp_portfolio_skills'][0])):?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Skills:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_skills'][0];?></span>
						</p>
						<?php endif; ?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Category:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data">
								<?php
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$categories[] = $term->name;
											$related_cat[] = $term->slug;
										}
									}
								}
								$categories = (isset($categories) && is_array($categories)) ? implode(', ', $categories) : '';
								echo $categories;
								?>
							</span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_link'][0])):?>
							<p class="portfolio_item_view_link">
								<a href="<?php echo esc_url($portfolio_data['ABp_portfolio_link'][0]);?>" target="<?php echo esc_attr($portfolio_data['ABp_portfolio_link_target'][0]);?>"><?php _e('View work','ABdev_incomeup');?></a>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php the_content();?>
		<?php if(isset($portfolio_data['ABp_portfolio_show_related'][0]) && $portfolio_data['ABp_portfolio_show_related'][0]==1): ?>
			<section id="related_portfolio">
				<div class="container">
					<h4 class="column_title_center"><?php _e('Related Projects', 'ABdev_incomeup'); ?></h4>
					<div class="dnd_column_dd_span12 ">
						<div class="ABp_latest_portfolio"><ul class="clearfix">
						<?php
						$args = array(
							'post_type' => 'portfolio',
							'portfolio-category' => $categories,
							'posts_per_page'=>-1,
							'post__not_in'=>array($post->ID),
							);
						$related = new WP_Query( $args );
						$out = $error = '';
						if ($related->have_posts()){
							while ($related->have_posts()){
								$related->the_post();
								$slugs=$in_category='';
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$slugs.=' '.$term->slug;
											$filter_slugs[$term->slug] = $term->name;
											$in_category[] = $term->name;
										}
									}
								}
								$in_category = (isset($in_category) && is_array($in_category)) ? implode(', ', $in_category) : '';
								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$thumbnail_object = get_post($thumbnail_id);
								$thumbnail_src=$thumbnail_object->guid;

								echo '
										<li class="portfolio_item portfolio_item_4 ' . esc_attr($slugs) . '">
											<div class="overlayed">
												' . get_the_post_thumbnail() . '
												<div class="overlay">
													<div class="portfolio_icon_container">
														<a class="portfolio_icon lightbox" data-lightbox="portfolio" href="'.esc_url(wp_get_attachment_url( $thumbnail_id )).'"><i class="ci_icon-search"></i></a>
														<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
													</div>
												</div>
											</div>
											<p class="overlay_title">' . get_the_title() . '</p>
											<p class="portfolio_item_tags">
												'.$in_category.'
											</p>
										</li>
									';
							}
						}
						wp_reset_postdata();
						?>
						</ul>
						<div class="portfolio_navigation">
							<a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a>
							<a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<section id="porfolio_pagination">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link', '<i class="ci_icon-chevron-left"></i>' ); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; endif;?>

<?php elseif(isset($portfolio_data['ABp_portfolio_layout'][0]) && $portfolio_data['ABp_portfolio_layout'][0]=='style3'): ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<section id="simple_item_portfolio">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link','<i class="ci_icon-chevron-left"></i>'); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="span12">
						<?php
						if(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='soundcloud'){
							echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$portfolio_data['ABp_portfolio_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='youtube'){
							echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$portfolio_data['ABp_portfolio_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='vimeo'){
							echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$portfolio_data['ABp_portfolio_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='gallery') {
						 	echo'<div class="slider-wrapper theme-default">
									   <div id="slider" class="nivoSlider">';
						 	$attachments = get_posts( array(
						 							'post_type' => 'attachment',
						 							'posts_per_page' => -1,
						 							'post_parent' => $post->ID,
						 							'exclude'	 => get_post_thumbnail_id()
						 							) );
						 	if ( $attachments ) {
						 		foreach ( $attachments as $attachment ) {
						 			$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'full' );
						 				echo '<img src="'.esc_url($thumbimg[0]).'" data-thumb="'.esc_url($thumbimg[0]).'" alt="">';
						 			}
						 		}
						 	echo '</div>
								</div>';
						}
						else{
							the_post_thumbnail('full', array('class' => 'portfolio_item_image'));
						}
						?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="span8">
						<h5 class="column_title_left"><?php _e('Project Description', 'ABdev_incomeup'); ?></h5>
						<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
							<p class="portfolio_single_description"><?php echo $portfolio_data['ABp_portfolio_description'][0];?></p>
							<p class="post_meta_share portfolio_share_social"><?php _e('Share','ABdev_incomeup');?>
								<a class="post_share_facebook dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

								<a class="post_share_twitter dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

								<a class="post_share_googleplus dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?> ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

								<a class="post_share_linkedin dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title('', '' , false)).'&url='. urlencode(get_permalink())); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
							</p>
						<?php endif; ?>
					</div>
					<div class="span4 portfolio_item_meta">
						<h5 class="column_title_left"><?php _e('Project Details', 'ABdev_incomeup'); ?></h5>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Date:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php the_date();?></span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_client'][0])):?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Client:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_client'][0];?></span>
						</p>
						<?php endif; ?>
						<?php if(isset($portfolio_data['ABp_portfolio_skills'][0])):?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Skills:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_skills'][0];?></span>
						</p>
						<?php endif; ?>
						<p class="portfolio_single_detail">
							<span class="portfolio_item_meta_label"><?php _e('Category:', 'ABdev_incomeup');?></span>
							<span class="portfolio_item_meta_data">
								<?php
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$categories[] = $term->name;
											$related_cat[] = $term->slug;
										}
									}
								}
								$categories = (isset($categories) && is_array($categories)) ? implode(', ', $categories) : '';
								echo $categories;
								?>
							</span>
						</p>
						<?php if(isset($portfolio_data['ABp_portfolio_link'][0])):?>
							<p class="portfolio_item_view_link">
								<a href="<?php echo esc_url($portfolio_data['ABp_portfolio_link'][0]);?>" target="<?php echo esc_url($portfolio_data['ABp_portfolio_link_target'][0]);?>"><?php _e('View work','ABdev_incomeup');?></a>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php the_content();?>
		<?php if(isset($portfolio_data['ABp_portfolio_show_related'][0]) && $portfolio_data['ABp_portfolio_show_related'][0]==1): ?>
			<section id="related_portfolio">
				<div class="container">
					<h4 class="column_title_center"><?php _e('Related Projects', 'ABdev_incomeup'); ?></h4>
					<div class="dnd_column_dd_span12 ">
						<div class="ABp_latest_portfolio"><ul class="clearfix">
						<?php
						$args = array(
							'post_type' => 'portfolio',
							'portfolio-category' => $categories,
							'posts_per_page'=>-1,
							'post__not_in'=>array($post->ID),
							);
						$related = new WP_Query( $args );
						$out = $error = '';
						if ($related->have_posts()){
							while ($related->have_posts()){
								$related->the_post();
								$slugs=$in_category='';
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$slugs.=' '.$term->slug;
											$filter_slugs[$term->slug] = $term->name;
											$in_category[] = $term->name;
										}
									}
								}
								$in_category = (isset($in_category) && is_array($in_category)) ? implode(', ', $in_category) : '';
								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$thumbnail_object = get_post($thumbnail_id);
								$thumbnail_src=$thumbnail_object->guid;

								echo '
									<li class="portfolio_item portfolio_item_4 ' . esc_attr($slugs) . '">
										<div class="overlayed">
											' . get_the_post_thumbnail() . '
											<div class="overlay">
												<div class="portfolio_icon_container">
													<a class="portfolio_icon lightbox" data-lightbox="portfolio" href="'.esc_url(wp_get_attachment_url( $thumbnail_id )).'"><i class="ci_icon-search"></i></a>
													<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
												</div>
											</div>
										</div>
										<p class="overlay_title">' . get_the_title() . '</p>
										<p class="portfolio_item_tags">
											'.$in_category.'
										</p>
									</li>
								';
							}
						}
						wp_reset_postdata();
						?>
						</ul>
						<div class="portfolio_navigation">
							<a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a>
							<a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<section id="porfolio_pagination">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
							<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link', '<i class="ci_icon-chevron-left"></i>' ); ?></span>
							<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
							<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; endif;?>

<?php elseif(isset($portfolio_data['ABp_portfolio_layout'][0]) && $portfolio_data['ABp_portfolio_layout'][0]=='style4'): ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<section id="simple_item_portfolio">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
								<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link','<i class="ci_icon-chevron-left"></i>'); ?></span>
								<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
								<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="span9 content_with_left_sidebar right">
						<?php
						if(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='soundcloud'){
							echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$portfolio_data['ABp_portfolio_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='youtube'){
							echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$portfolio_data['ABp_portfolio_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='vimeo'){
							echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$portfolio_data['ABp_portfolio_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='gallery') {
						 	echo'<div class="slider-wrapper theme-default">
									   <div id="slider" class="nivoSlider">';
						 	$attachments = get_posts( array(
						 							'post_type' => 'attachment',
						 							'posts_per_page' => -1,
						 							'post_parent' => $post->ID,
						 							'exclude'	 => get_post_thumbnail_id()
						 							) );
						 	if ( $attachments ) {
						 		foreach ( $attachments as $attachment ) {
						 			$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'full' );
						 				echo '<img src="'.esc_url($thumbimg[0]).'" data-thumb="'.esc_url($thumbimg[0]).'" alt="">';
						 			}
						 		}
						 	echo '</div>
								</div>';
						}
						else{
							the_post_thumbnail('full', array('class' => 'portfolio_item_image'));
						}
						?>
						<div class="row">
							<div class="span8">
								<h5 class="column_title_left"><?php _e('Project Description', 'ABdev_incomeup'); ?></h5>
								<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
									<p class="portfolio_single_description"><?php echo $portfolio_data['ABp_portfolio_description'][0];?></p>
									<p class="post_meta_share portfolio_share_social"><?php _e('Share','ABdev_incomeup');?>
										<a class="post_share_facebook dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

										<a class="post_share_twitter dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

										<a class="post_share_googleplus dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?> ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

										<a class="post_share_linkedin dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title('', '' , false)).'&url='. urlencode(get_permalink())); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
									</p>
								<?php endif; ?>
							</div>
							<div class="span4 portfolio_item_meta">
								<h5 class="column_title_left"><?php _e('Project Details', 'ABdev_incomeup'); ?></h5>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Date:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php the_date();?></span>
								</p>
								<?php if(isset($portfolio_data['ABp_portfolio_client'][0])):?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Client:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_client'][0];?></span>
								</p>
								<?php endif; ?>
								<?php if(isset($portfolio_data['ABp_portfolio_skills'][0])):?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Skills:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_skills'][0];?></span>
								</p>
								<?php endif; ?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Category:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data">
										<?php
										$terms = get_the_terms( $post->ID , 'portfolio-category' );
										if(is_array($terms)){
											foreach ( $terms as $term ) {
												if(is_object($term)){
													$categories[] = $term->name;
													$related_cat[] = $term->slug;
												}
											}
										}
										$categories = (isset($categories) && is_array($categories)) ? implode(', ', $categories) : '';
										echo $categories;
										?>
									</span>
								</p>
								<?php if(isset($portfolio_data['ABp_portfolio_link'][0])):?>
									<p class="portfolio_item_view_link">
										<a href="<?php echo esc_url($portfolio_data['ABp_portfolio_link'][0]);?>" target="<?php echo esc_attr($portfolio_data['ABp_portfolio_link_target'][0]);?>"><?php _e('View work','ABdev_incomeup');?></a>
									</p>
								<?php endif; ?>
							</div>
						</div>
						<div class="row">
							<?php the_content();?>
						</div>
						<div class="row">
							<?php if(isset($portfolio_data['ABp_portfolio_show_related'][0]) && $portfolio_data['ABp_portfolio_show_related'][0]==1): ?>
								<section id="related_portfolio">
									<h4 class="column_title_center"><?php _e('Related Projects', 'ABdev_incomeup'); ?></h4>
									<div class="dnd_column_dd_span12 ">
						<div class="ABp_latest_portfolio"><ul class="clearfix">
						<?php
						$args = array(
							'post_type' => 'portfolio',
							'portfolio-category' => $categories,
							'posts_per_page'=>-1,
							'post__not_in'=>array($post->ID),
							);
						$related = new WP_Query( $args );
						$out = $error = '';
						if ($related->have_posts()){
							while ($related->have_posts()){
								$related->the_post();
								$slugs=$in_category='';
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$slugs.=' '.$term->slug;
											$filter_slugs[$term->slug] = $term->name;
											$in_category[] = $term->name;
										}
									}
								}
								$in_category = (isset($in_category) && is_array($in_category)) ? implode(', ', $in_category) : '';
								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$thumbnail_object = get_post($thumbnail_id);
								$thumbnail_src=$thumbnail_object->guid;

								echo '
										<li class="portfolio_item portfolio_item_4 ' . $slugs . '">
											<div class="overlayed">
												' . get_the_post_thumbnail() . '
												<div class="overlay">
													<div class="portfolio_icon_container">
														<a class="portfolio_icon lightbox" data-lightbox="portfolio" href="'.esc_url(wp_get_attachment_url( $thumbnail_id )).'"><i class="ci_icon-search"></i></a>
														<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
													</div>
												</div>
											</div>
											<p class="overlay_title">' . get_the_title() . '</p>
											<p class="portfolio_item_tags">
												'.$in_category.'
											</p>
										</li>
									';
							}
						}
						wp_reset_postdata();
						?>
						</ul>
						<div class="portfolio_navigation">
							<a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a>
							<a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a>
						</div>
					</div>
								</section>
							<?php endif; ?>
							<section id="porfolio_pagination">
								<div class="row">
									<div class="span12">
										<div id="single_portfolio_pagination" class="clearfix">
											<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link', '<i class="ci_icon-chevron-left"></i>' ); ?></span>
											<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
											<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<aside class="span3 sidebar sidebar_left">
						<?php get_sidebar(); ?>
					</aside>
				</div>
			</div>
		</section>

	<?php endwhile; endif;?>

<?php else: ?>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<section id="simple_item_portfolio">
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="single_portfolio_pagination" class="clearfix">
								<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link','<i class="ci_icon-chevron-left"></i>'); ?></span>
								<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
								<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="span9 content_with_right_sidebar">
						<?php
						if(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='soundcloud'){
							echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$portfolio_data['ABp_portfolio_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='youtube'){
							echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$portfolio_data['ABp_portfolio_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='vimeo'){
							echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$portfolio_data['ABp_portfolio_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						elseif(isset($portfolio_data['ABp_portfolio_selected_media'][0]) && $portfolio_data['ABp_portfolio_selected_media'][0]=='gallery') {
						 	echo'<div class="slider-wrapper theme-default">
									   <div id="slider" class="nivoSlider">';
						 	$attachments = get_posts( array(
						 							'post_type' => 'attachment',
						 							'posts_per_page' => -1,
						 							'post_parent' => $post->ID,
						 							'exclude'	 => get_post_thumbnail_id()
						 							) );
						 	if ( $attachments ) {
						 		foreach ( $attachments as $attachment ) {
						 			$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'full' );
						 				echo '<img src="'.esc_url($thumbimg[0]).'" data-thumb="'.esc_url($thumbimg[0]).'" alt="">';
						 			}
						 		}
						 	echo '</div>
								</div>';
						}
						else{
							the_post_thumbnail('full', array('class' => 'portfolio_item_image'));
						}
						?>
						<div class="row">
							<div class="span8">
								<h5 class="column_title_left"><?php _e('Project Description', 'ABdev_incomeup'); ?></h5>
								<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
									<p class="portfolio_single_description"><?php echo $portfolio_data['ABp_portfolio_description'][0];?></p>
									<p class="post_meta_share portfolio_share_social"><?php _e('Share','ABdev_incomeup');?>
										<a class="post_share_facebook dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

										<a class="post_share_twitter dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

										<a class="post_share_googleplus dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?> ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

										<a class="post_share_linkedin dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title('', '' , false)).'&url='. urlencode(get_permalink())); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
									</p>
								<?php endif; ?>
							</div>
							<div class="span4 portfolio_item_meta">
								<h5 class="column_title_left"><?php _e('Project Details', 'ABdev_incomeup'); ?></h5>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Date:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php the_date();?></span>
								</p>
								<?php if(isset($portfolio_data['ABp_portfolio_client'][0])):?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Client:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_client'][0];?></span>
								</p>
								<?php endif; ?>
								<?php if(isset($portfolio_data['ABp_portfolio_skills'][0])):?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Skills:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data"><?php echo $portfolio_data['ABp_portfolio_skills'][0];?></span>
								</p>
								<?php endif; ?>
								<p class="portfolio_single_detail">
									<span class="portfolio_item_meta_label"><?php _e('Category:', 'ABdev_incomeup');?></span>
									<span class="portfolio_item_meta_data">
										<?php
										$terms = get_the_terms( $post->ID , 'portfolio-category' );
										if(is_array($terms)){
											foreach ( $terms as $term ) {
												if(is_object($term)){
													$categories[] = $term->name;
													$related_cat[] = $term->slug;
												}
											}
										}
										$categories = (isset($categories) && is_array($categories)) ? implode(', ', $categories) : '';
										echo $categories;
										?>
									</span>
								</p>
								<?php if(isset($portfolio_data['ABp_portfolio_link'][0])):?>
									<p class="portfolio_item_view_link">
										<a href="<?php echo esc_url($portfolio_data['ABp_portfolio_link'][0]);?>" target="<?php echo esc_attr($portfolio_data['ABp_portfolio_link_target'][0]);?>"><?php _e('View work','ABdev_incomeup');?></a>
									</p>
								<?php endif; ?>
							</div>
						</div>
						<div class="row">
							<?php the_content();?>
						</div>
						<div class="row">
							<?php if(isset($portfolio_data['ABp_portfolio_show_related'][0]) && $portfolio_data['ABp_portfolio_show_related'][0]==1): ?>
								<section id="related_portfolio">
									<h4 class="column_title_center"><?php _e('Related Projects', 'ABdev_incomeup'); ?></h4>
									<div class="dnd_column_dd_span12 ">
						<div class="ABp_latest_portfolio"><ul class="clearfix">
						<?php
						$args = array(
							'post_type' => 'portfolio',
							'portfolio-category' => $categories,
							'posts_per_page'=>-1,
							'post__not_in'=>array($post->ID),
							);
						$related = new WP_Query( $args );
						$out = $error = '';
						if ($related->have_posts()){
							while ($related->have_posts()){
								$related->the_post();
								$slugs=$in_category='';
								$terms = get_the_terms( $post->ID , 'portfolio-category' );
								if(is_array($terms)){
									foreach ( $terms as $term ) {
										if(is_object($term)){
											$slugs.=' '.$term->slug;
											$filter_slugs[$term->slug] = $term->name;
											$in_category[] = $term->name;
										}
									}
								}
								$in_category = (isset($in_category) && is_array($in_category)) ? implode(', ', $in_category) : '';
								$thumbnail_id = get_post_thumbnail_id($post->ID);
								$thumbnail_object = get_post($thumbnail_id);
								$thumbnail_src=$thumbnail_object->guid;

								echo '
										<li class="portfolio_item portfolio_item_4 ' . esc_attr($slugs) . '">
											<div class="overlayed">
												' . get_the_post_thumbnail() . '
												<div class="overlay">
													<div class="portfolio_icon_container">
														<a class="portfolio_icon lightbox" data-lightbox="portfolio" href="'.esc_url(wp_get_attachment_url( $thumbnail_id )).'"><i class="ci_icon-search"></i></a>
														<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
													</div>
												</div>
											</div>
											<p class="overlay_title">' . get_the_title() . '</p>
											<p class="portfolio_item_tags">
												'.$in_category.'
											</p>
										</li>
									';
							}
						}
						wp_reset_postdata();
						?>
						</ul>
						<div class="portfolio_navigation">
							<a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a>
							<a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a>
						</div>
					</div>
								</section>
							<?php endif; ?>
							<section id="porfolio_pagination">
								<div class="row">
									<div class="span12">
										<div id="single_portfolio_pagination" class="clearfix">
											<span class="prev dnd_tooltip" title="<?php esc_attr_e('Previous Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php previous_post_link('%link', '<i class="ci_icon-chevron-left"></i>' ); ?></span>
											<span class="list dnd_tooltip" title="<?php esc_attr_e('List of Project', 'ABdev_incomeup') ?>" data-gravity="s"><a href="<?php echo esc_url(get_permalink(get_theme_mod('list_link','')))?>"><i class="ci_icon-th"></i></a></span>
											<span class="next dnd_tooltip" title="<?php esc_attr_e('Next Project', 'ABdev_incomeup') ?>" data-gravity="s"><?php next_post_link('%link', '<i class="ci_icon-chevron-right"></i>'); ?></span>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<aside class="span3 sidebar sidebar_right">
						<?php get_sidebar(); ?>
					</aside>
				</div>
			</div>
		</section>

	<?php endwhile; endif;?>
<?php endif;?>

<?php get_footer();