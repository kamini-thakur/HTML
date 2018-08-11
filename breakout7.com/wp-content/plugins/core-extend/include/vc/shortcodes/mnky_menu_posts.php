<?php
$output = $image_alt = $image_src = $image = $title = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'offset' => 0,
		'num' => '4',
		'order' => 'DESC',
		'orderby' => 'date',
		'category' => '',
		'tag' => '',
		'thumbnail_size' => 'mnky_size-600x400',
		'rating_show' => '',
		'date_show' => '',
		'excerpt_show' => '',
		'label_show' => '',
		'post_format_hide' => '',
		'post_format_text_hide' => '',
		'rating_star_style' => '',
		'custom_tax' => '',
		'custom_tax_terms' => '',
	), $atts ) );
		
	
	// Set up initial query for post
	$args = array(
		'post_type' => explode( ',', $post_type ),
		'posts_per_page' => $num,
		'order' => $order,
		'orderby' => $orderby,
		'offset' => $offset,
		'no_found_rows' => true
	);
	
	// If category
	if( $category != '' && $post_type == 'post' ) {
		$args['category_name'] = $category;
	}
	
	// If tag
	if( $tag != '' && $post_type == 'post' ) {
		$args['tag'] = $tag;
	}

	// If custom taxonomy
	if ( $post_type != 'post' && $custom_tax != '' && $custom_tax_terms != '' ) {
		
		// Term string to array
		$tax_term = explode( ', ', $custom_tax_terms );
	
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $custom_tax,
					'field' => 'slug',
					'terms' => $tax_term,
					'operator' => 'IN'
				)
			)
		);
		
		$args = array_merge( $args, $tax_args );
	}
	
	
	$query = new WP_Query( $args );
	
	if ( ! $query -> have_posts() )
		return false;
	
	while ( $query -> have_posts() ): $query -> the_post(); 
		global $post;
		
		// Post format	
		if( has_post_format( 'gallery', get_the_ID()) && $post_format_hide != 'off' ) {
			$post_format = '<span class="mp-post-format mp-post-format-gallery"><i class="fa fa-picture-o" aria-hidden="true"></i>';
			if ( $post_format_text_hide != 'off' ) {
				$post_format .= '<span class="mp-post-format-txt">'. esc_html__( 'Photos', 'core-extend' ) .'</span>';
			}
			$post_format .= '</span>';
		} elseif( has_post_format( 'video', get_the_ID()) && $post_format_hide != 'off' ) {
			$post_format = '<span class="mp-post-format mp-post-format-video"><i class="fa fa-play" aria-hidden="true"></i>';
			if ( $post_format_text_hide != 'off' ) {
				$post_format .= '<span class="mp-post-format-txt">'. esc_html__( 'Video', 'core-extend' ) .'</span>';
			}
			$post_format .= '</span>';
		} elseif( has_post_format( 'link', get_the_ID()) && $post_format_hide != 'off' ) {
			$post_format = '<span class="mp-post-format mp-post-format-link"><i class="fa fa-link" aria-hidden="true"></i>';
			if ( $post_format_text_hide != 'off' ) {
				$post_format .= '<span class="mp-post-format-txt">'. esc_html__( 'Link', 'core-extend' ) .'</span>';
			}
			$post_format .= '</span>';
		} else {
			$post_format = '';
		}
		
		// Post label	
		if( $label_show != 'on' ){
			$label = '';
		} else {
			$post_labels = get_post_meta( get_the_ID(), 'mnky_post_labels', true);			
			if( ! empty( $post_labels ) ) {
				$label = '<div class="article-labels">';
				foreach( $post_labels as $post_label ) {
					$inline_styles = array();
					if ( ! empty( $post_label['mnky_post_label_text_color'] ) ) {
						$inline_styles [] = 'color: '.$post_label['mnky_post_label_text_color'].';';
					}	
					if ( ! empty( $post_label['mnky_post_label_color'] ) ) {
						$inline_styles [] = 'background-color: '.$post_label['mnky_post_label_color'].';';
					}						
					$inline_styles = implode( ' ', $inline_styles );		
					if ( ! empty( $inline_styles ) ) {
						$inline_styles = 'style="'. esc_attr( $inline_styles ) .'"';
					}
					$label .= '<span '. $inline_styles .'>'. esc_html( $post_label['mnky_post_label_text'] ).'</span>';
				}
				$label .= '</div>';
			} else {
				$label = '';
			}
		}		
		
		
		if( $thumbnail_size == '' ) { 
			$thumbnail_size = 'mnky_size-600x400';
		}

		if( has_post_thumbnail() ){
			$image = get_the_post_thumbnail( get_the_ID(), $thumbnail_size );
			$image_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		} elseif( function_exists( 'ot_get_option' ) && ot_get_option('default_post_image') ) {
			$image = '<img src="'. wp_get_attachment_image_url( ot_get_option('default_post_image' ), $thumbnail_size ) .'" alt="'. get_post_meta( ot_get_option('default_post_image'), '_wp_attachment_image_alt', true) .'">'; 
			$image_attr = wp_get_attachment_image_src( ot_get_option( 'default_post_image' ), 'full' );
		} else {
			$image = '';
			$image_attr = null;
		}	
			
			
		if( $image != '' ){
			$thumbnail = '<div class="mmp-img">'. $label . $post_format . $image .'</div>';
		} else {
			$thumbnail = '';
		}

		if( $rating_show == 'on' && get_post_meta( get_the_ID(), 'mnky_enable_review', true ) == 'on' && function_exists( 'mnky_review_sum' ) ){	
				if ( get_post_meta( get_the_ID(), 'mnky_review_breakdown', true ) == 'off' ) {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
				} else {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ).'%"></span></div></div>';
				}
		} else {
			$rating = '';
		}
		
		if ( function_exists( 'mnky_post_time' )) {
		if( $date_show != 'on' ) {
			$date = '';
		} else {			
			$date = '<div class="mmp-date">'. esc_html(mnky_post_time()) .'</div>';
		}
		}		

		if( $excerpt_show != 'on' ) {
			$excerpt = '';
		} else {			
			$excerpt = '<span class="mmp-excerpt">'. esc_html(get_the_excerpt()) .'</span>';
		}	

		if( $rating_star_style != 'overlay' ) {
			$rating_style = '';
		} else {			
			$rating_style = ' rating-overlay';
		}			
		
		$title = get_the_title();
		
		$output .= '<li class="menu-post-container '. esc_attr($post_format) . esc_attr($rating_style) .'"><a href="'. esc_url( get_the_permalink() ) .'" rel="bookmark">'. $thumbnail .'<h6>'. esc_html( $title ) .'</h6></a>'. $rating . $date . $excerpt .'</li>';
		
	endwhile; 
	wp_reset_postdata();

	$output = '<ul class="mnky-menu-posts mmp-'. esc_attr( $num ) .'" >'. $output .'</ul>';

echo $output;