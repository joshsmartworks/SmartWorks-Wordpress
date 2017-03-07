<?php
get_header();

get_template_part('partials/header_menu');
get_template_part('partials/title_breadcrumbs_bar');

?>
	<section>
		<div class="container">

			<div class="row">
				<?php if (have_posts()) :  while (have_posts()) : the_post();
					$custom = get_post_custom();
				?>
				<div class="<?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='full_width' )? 'span12':'span9';?> <?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='left_sidebar' )?'content_with_left_sidebar':'content_with_right_sidebar';?>">
						<div class="post_content">
							<div <?php post_class('post_main'); ?>>
								<?php
								if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
									echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
									echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
									echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
								}
								else{
									the_post_thumbnail('full');
								}
								?>
								<div class="postmeta-above clearfix">
									<span class="post_author"><?php _e('By ', 'ABdev_incomeup');?> <span><?php the_author(); ?><i class="ci_icon-moonfull"></i></span><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?><i class="ci_icon-moonfull"></i></span><span class="post_category"><?php the_category(', ')?></span></span>
									<p class="post_meta_comments"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
								</div>

								<?php echo ($post->post_excerpt!=='') ? '<h3>'.get_the_excerpt().'</h3>' : '' ?>
								<?php the_content();?>

								<?php wp_link_pages('before=<div id="inner_post_pagination" class="clearfix">&after=</div>&link_before=<span>&link_after=</span>'); ?>
								<div class="postmeta-tags">
									<p class="post_meta_tags"><?php the_tags( '<i class="ci_icon-tags"></i>',', ', ''); ?></p>
								</div>
								<div class="postmeta-under clearfix">
									<div class="postmeta-share">
										<p class="post_meta_share">
											<span><?php _e('Share','ABdev_incomeup'); ?></span>
											<a class="post_share_twitter tcvpb_tooltip dnd_tooltip" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_incomeup'))).get_permalink()); ?>" title="<?php esc_attr_e('Share on Twitter', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-twitter"></i></a>

											<a class="post_share_facebook tcvpb_tooltip dnd_tooltip" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Facebook', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-facebook"></i></a>

											<a class="post_share_googleplus tcvpb_tooltip dnd_tooltip" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Google+', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-googleplus"></i></a>

											<a class="post_share_linkedin tcvpb_tooltip dnd_tooltip" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title()).'&url='.get_permalink()); ?>" title="<?php esc_attr_e('Share on Linkedin', 'ABdev_incomeup') ?>" data-gravity="s"><i class="ci_icon-linkedin"></i></a>
										</p>
									</div>
								</div>

								<?php $author_bio = get_the_author_meta('description'); ?>
								<?php if($author_bio != '' && (!get_theme_mod('hide_author_bio', false) )):?>
									<div class="post_about_author clearfix">
										<?php echo get_avatar( $post->post_author, 100 ); ?>
										<h5><?php the_author();?></h5>
										<p><?php echo get_the_author_meta('description'); ?></p>
									</div>
								<?php endif; ?>

								<?php if(isset($custom['abdev_show_related'][0]) && $custom['abdev_show_related'][0]==1): ?>

									<?php if(has_tag()!=''): ?>
									<section id="related_articles">
										<h3 class="column_title_left"><?php _e('Related Articles', 'ABdev_incomeup'); ?></h3>
												<div class="row related_4column">
													<?php

													$tags = wp_get_post_tags($post->ID);
													if ($tags) {
														$tax_ids = array();
        												foreach( $tags as $individual_tax ) $tax_ids[] = $individual_tax->term_id;
														$args=array(
															'tag__in' => $tax_ids,
															'post__not_in' => array($post->ID),
															'posts_per_page'=>4,
															'ignore_sticky_posts'=>1,
														);

														$related = new WP_Query( $args );
													}


													$out = $error = '';

													if (isset($related) && $related->have_posts()){
														while ($related->have_posts() ){
															$related->the_post();

															echo '<div class="span3">
																	<div class="related_inner_content">
																		<div class="related_article">
																			<div class="overlayed">
																				'.get_the_post_thumbnail(null, 'full').'
																				<a class="overlay" href="'.esc_url(get_the_permalink()).'">
																				<span class="overlay_icon"><i class="ci_icon-linkalt"></i></span>
																				</a>
																			</div>
																		</div>
																		<div class="related_item_meta">
																			<p><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></p>
																		</div>
																	</div>
																</div>';
														}
													}
													wp_reset_query();
													?>

											</div>
									</section>
									<?php endif; ?>
								<?php endif; ?>

							</div>
						</div>

					<?php endwhile;
					else: ?>
						<p><?php _e('No posts were found. Sorry!', 'ABdev_incomeup'); ?></p>
					<?php endif; ?>

					<?php if(!get_theme_mod('hide_comments', false)):?>
						<section id="comments_section" class="section_border_top">
							<?php comments_template('/partials/comments.php'); ?>
						</section>
					<?php endif; ?>

					<div class="post-navigation">
						<div class="previous_post"><?php previous_post_link('%link', '<span class="previous_post_icon"><i class="ci_icon-chevron-left"></i></span>'.__('Previous post', 'ABdev_incomeup')); ?></div>
						<div class="next_post"><?php next_post_link('%link', __('Next post', 'ABdev_incomeup').'<span class="next_post_icon"><i class="ci_icon-chevron-right"></i></span>'); ?></div>
					</div>
				</div><!-- end span9 main-content -->

				<?php if (!isset($custom['abdev_post_layout'][0]) || (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]!='full_width' )) : ?>
					<aside class="span3 sidebar <?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='left_sidebar' )?'sidebar_left':'sidebar_right';?>">
						<?php
						if(isset($custom['custom_sidebar'][0]) && $custom['custom_sidebar'][0]!=''){
							$selected_sidebar=$custom['custom_sidebar'][0];
						}
						else{
							$selected_sidebar=__( 'Primary Sidebar', 'ABdev_incomeup');
						}
						dynamic_sidebar($selected_sidebar);
						?>
					</aside><!-- end span3 sidebar -->
				<?php endif; ?>

			</div><!-- end row -->

		</div>
	</section>


<?php get_footer();