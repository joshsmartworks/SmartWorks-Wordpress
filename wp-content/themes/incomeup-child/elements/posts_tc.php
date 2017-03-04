<?php

/*********** Shortcode: Latest Post ************************************************************/

$tcvpb_elements['posts_tc'] = array(
	'name' => esc_html__('Posts', 'ABdev_incomeup' ),
	'type' => 'block',
	'icon' => 'pi-posts',
	'category' =>  esc_html__('Social', 'ABdev_incomeup'),
	'attributes' => array(
		'category' => array(
			'description' => esc_html__( 'Category', 'ABdev_incomeup' ),
		),
		'ids' => array(
			'description' => esc_html__( 'Posts IDs', 'ABdev_incomeup' ),
			'divider' => 'true',
		),
		'style' => array(
			'default' => '1',
			'type' => 'select',
			'values' => array(
				'1' => esc_html__('Style 1', 'ABdev_incomeup'),
				'2' => esc_html__('Style 2', 'ABdev_incomeup'),
			),
			'description' => esc_html__('Style', 'ABdev_incomeup'),
			'divider' => 'true',
		),
		'order' => array(
			'default' => 'DESC',
			'type' => 'select',
			'description' => esc_html__( 'Order', 'ABdev_incomeup' ),
			'values' => array(
				'ASC' =>  esc_html__( 'ASC', 'ABdev_incomeup' ),
				'DESC' =>  esc_html__( 'DESC', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Order By', 'ABdev_incomeup'),
		),
		'orderby' => array(
			'default' => 'date',
			'type' => 'select',
			'description' => esc_html__( 'Order by', 'ABdev_incomeup' ),
			'values' => array(
				'ID' =>  esc_html__( 'ID', 'ABdev_incomeup' ),
				'none' =>  esc_html__( 'none', 'ABdev_incomeup' ),
				'author' =>  esc_html__( 'author', 'ABdev_incomeup' ),
				'title' =>  esc_html__( 'title', 'ABdev_incomeup' ),
				'name' =>  esc_html__( 'name', 'ABdev_incomeup' ),
				'date' =>  esc_html__( 'date', 'ABdev_incomeup' ),
				'modified' =>  esc_html__( 'modified', 'ABdev_incomeup' ),
				'parent' =>  esc_html__( 'parent', 'ABdev_incomeup' ),
				'rand' =>  esc_html__( 'rand', 'ABdev_incomeup' ),
				'menu_order' =>  esc_html__( 'menu_order', 'ABdev_incomeup' ),
				'post__in' =>  esc_html__( 'post__in', 'ABdev_incomeup' ),
			),
			'tab' => esc_html__('Order By', 'ABdev_incomeup'),
		),
		'post_parent' => array(
			'description' => esc_html__( 'Post Parent', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'post_type' => array(
			'default' => 'post',
			'description' => esc_html__( 'Post Type', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'posts_no' => array(
			'default' => '4',
			'description' => esc_html__( 'Number of Posts', 'ABdev_incomeup' ),
		),
		'offset' => array(
			'default' => '0',
			'description' => esc_html__( 'Offset', 'ABdev_incomeup' ),
		),
		'tag' => array(
			'description' => esc_html__( 'Tag', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'tax_operator' => array(
			'default' => 'IN',
			'description' => esc_html__( 'Tax Operator', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'tax_term' => array(
			'description' => esc_html__( 'Tax Term', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'taxonomy' => array(
			'description' => esc_html__( 'Taxonomy', 'ABdev_incomeup' ),
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'lightbox' => array(
			'description' => __( 'Lightbox on Images', 'ABdev_incomeup' ),
			'type' => 'checkbox',
			'default' => 0,
			'tab' => esc_html__('Custom', 'ABdev_incomeup'),
		),
		'excerpt' => array(
			'description' => esc_html__( 'Custom Excerpt Limit Words', 'ABdev_incomeup' ),
			'info' => esc_html__( 'How many words you want to display? If left empty default WordPress excerpt will be used.', 'ABdev_incomeup' ),
		),
		'id' => array(
			'description' => esc_html__('ID', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom ID', 'ABdev_incomeup'),
			'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
		),
		'class' => array(
			'description' => esc_html__('Class', 'ABdev_incomeup'),
			'info' => esc_html__('Additional custom classes for custom styling', 'ABdev_incomeup'),
			'tab' => esc_html__('Advanced', 'ABdev_incomeup'),
		),
	),
	'description' => esc_html__( 'Posts Excerpts', 'ABdev_incomeup' )
);

if ( ! function_exists( 'tcvpb_posts_tc_shortcode' ) ){
	function tcvpb_posts_tc_shortcode( $attributes ) {
		extract(shortcode_atts(tcvpb_extract_attributes('posts_tc'), $attributes));
		$id_out = ($id!='') ? 'id='.$id.'' : '';

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
								<div class="tcvpb_posts_date"><i class="ci_icon-time"></i> ' . get_the_date('d F') . '</div>
								<div class="tcvpb_posts_comments"><i class="ci_icon-comment"></i> ' . get_comments_number() . '</div>
							</div>';

			$output_date = '<div class="date_container">
								<div class="tcvpb_posts_date">' . get_the_date('d F, Y') . '</div>
								<div class="tcvpb_posts_comments"><i class="ci_icon-comment"></i> ' . get_comments_number() . '</div>
							</div>';

			$output .= '<div class="tcvpb_posts_shortcode tcvpb_posts_shortcode-'.esc_attr($style).' clearfix'.esc_attr($hasthumb_class).'">';
			$output .= ($thumbnail!='') ? '<a class="tcvpb_latest_news_shortcode_thumb" href="' . esc_url(get_permalink()) . '">' . get_the_post_thumbnail($post->ID,'full') . '</a>' :'';
			$output .= '<div class="tcvpb_latest_news_shortcode_content">';
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

