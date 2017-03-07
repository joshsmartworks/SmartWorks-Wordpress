<?php

/*********** Shortcode: Latest Post ************************************************************/

$ABdevDND_shortcodes['posts_dd'] = array(
	'attributes' => array(
		'category' => array(
			'description' => __( 'Category', 'ABdev_incomeup' ),
		),
		'ids' => array(
			'description' => __( 'Posts IDs', 'ABdev_incomeup' ),
		),
		'style' => array(
			'default' => '1',
			'type' => 'select',
			'values' => array(
				'1' => __('Style 1', 'dnd-shortcodes'),
				'2' => __('Style 2', 'dnd-shortcodes'),
			),
			'description' => __('Style', 'dnd-shortcodes'),
		),
		'order' => array(
			'default' => 'DESC',
			'description' => __( 'Order', 'ABdev_incomeup' ),
			'values' => array(
				'ASC' =>  __( 'ASC', 'ABdev_incomeup' ),
				'DESC' =>  __( 'DESC', 'ABdev_incomeup' ),
			),      
		),
		'orderby' => array(
			'default' => 'date',
			'description' => __( 'Order by', 'ABdev_incomeup' ),
			'values' => array(
				'ID' =>  __( 'ID', 'ABdev_incomeup' ),
				'none' =>  __( 'none', 'ABdev_incomeup' ),
				'author' =>  __( 'author', 'ABdev_incomeup' ),
				'title' =>  __( 'title', 'ABdev_incomeup' ),
				'name' =>  __( 'name', 'ABdev_incomeup' ),
				'date' =>  __( 'date', 'ABdev_incomeup' ),
				'modified' =>  __( 'modified', 'ABdev_incomeup' ),
				'parent' =>  __( 'parent', 'ABdev_incomeup' ),
				'rand' =>  __( 'rand', 'ABdev_incomeup' ),
				'menu_order' =>  __( 'menu_order', 'ABdev_incomeup' ),
				'post__in' =>  __( 'post__in', 'ABdev_incomeup' ),
			),      
		),
		'post_parent' => array(
			'description' => __( 'Post Parent', 'ABdev_incomeup' ),
		),
		'post_type' => array(
			'default' => 'post',
			'description' => __( 'Post Type', 'ABdev_incomeup' ),
		),
		'posts_no' => array(
			'default' => '4',
			'description' => __( 'Number of Posts', 'ABdev_incomeup' ),
		),
		'offset' => array(
			'default' => '0',
			'description' => __( 'Offset', 'ABdev_incomeup' ),
		),
		'tag' => array(
			'description' => __( 'Tag', 'ABdev_incomeup' ),
		),
		'tax_operator' => array(
			'default' => 'IN',
			'description' => __( 'Tax Operator', 'ABdev_incomeup' ),
		),
		'tax_term' => array(
			'description' => __( 'Tax Term', 'ABdev_incomeup' ),
		),
		'taxonomy' => array(
			'description' => __( 'Taxonomy', 'ABdev_incomeup' ),
		),
		'excerpt' => array(
			'description' => __( 'Custom Excerpt Limit Words', 'ABdev_incomeup' ),
			'info' => __( 'How many words you want to display? If left empty default WordPress excerpt will be used.', 'ABdev_incomeup' ),
		),
	),
	'description' => __( 'Posts Excerpts', 'ABdev_incomeup' )
);

if ( ! function_exists( 'ABdevDND_posts_dd_shortcode' ) ){
	function ABdevDND_posts_dd_shortcode( $attributes ) {
		extract(shortcode_atts(ABdevDND_extract_attributes('posts_dd'), $attributes));

		$args = array(
			'category_name'  => $category,
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_no,
			'offset'         => $offset,
			'tag'            => $tag,
		);
		if( $ids ) {
			$posts_in = array_map( 'intval', explode( ',', $ids ) );
			$args['post__in'] = $posts_in;
		}
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			$tax_term = explode( ', ', $tax_term );
			if( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ){
				$tax_operator = 'IN';
			}
			$tax_args = array(
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'slug',
						'terms'    => $tax_term,
						'operator' => $tax_operator
					)
				)
			);
			$args = array_merge( $args, $tax_args );
		}
		if( $post_parent ) {
			if( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = $post_parent;
		}
		$listing = new WP_Query( apply_filters( 'display_posts_shortcode_args', $args, $attributes ) );
		if ( ! $listing->have_posts() ){
			return apply_filters( 'display_posts_shortcode_no_results', false );
		}
		$output = '';
		while ( $listing->have_posts() ): $listing->the_post(); 
			global $post;

			$thumbnail = get_the_post_thumbnail($post->ID,'thumbnail');
			$hasthumb_class = ($thumbnail!='') ? ' has_thumbnail' : ' without_thumbnail';
			
			$output_date2 = '<div class="date_container">
								<div class="dnd_posts_date"><i class="ci_icon-time"></i> ' . get_the_date('d F') . '</div>
								<div class="dnd_posts_comments"><i class="ci_icon-comment"></i> ' . get_comments_number() . '</div>
							</div>';

			$output_date = '<div class="date_container">
								<div class="dnd_posts_date">' . get_the_date('d F, Y') . '</div>
								<div class="dnd_posts_comments"><i class="ci_icon-comment"></i> ' . get_comments_number() . '</div>
							</div>';

			$output .= '<div class="dnd_posts_shortcode dnd_posts_shortcode-'.esc_attr($style).' clearfix'.esc_attr($hasthumb_class).'">';
			$output .= ($thumbnail!='') ? '<a class="dnd_latest_news_shortcode_thumb" href="' . esc_url(get_permalink()) . '">' . get_the_post_thumbnail($post->ID,'full') . '</a>' :'';
			$output .= '<div class="dnd_latest_news_shortcode_content">';
			$output .= '<h5><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h5>';
			$output .= ($style == 1) ? $output_date : '';
			if($excerpt > 0){
				$text = do_shortcode(get_the_content());
				$text = apply_filters('the_content', $text);
				$text = str_replace(']]>', ']]&gt;', $text);
				$text = strip_tags($text);
				$words = preg_split("/[\n\r\t ]+/", $text, $excerpt+1, PREG_SPLIT_NO_EMPTY);
				$ending = (count($words) > $excerpt) ? '...':'';
				$words = array_slice($words, 0, $excerpt);
				$text = implode(' ', $words).$ending;
			}
			else{
				$text = get_the_excerpt();
			}
			$output .= '<p>' . $text . '</p>';
			$output .= ($style == 2) ? $output_date2 : '';
			$output .= '</div>';
			$output .= '</div>';
		endwhile; 
		wp_reset_postdata();
		return $output;
	}
}

