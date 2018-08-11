<?php
$output = $categories = $tags = $image_alt = $image_src = $image = $author = $title = $publisher = $tax_args = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'num' => '4',
		'offset' => 0,
		'order' => 'DESC',
		'orderby' => 'date',
		'id' => '',
		'no_tags' => '',
		'tax_relation' => 'OR',
		'custom_tax' => '',
		'custom_tax_terms' => '',
		'post_format_hide' => '',
		'post_format_text_hide' => '',
		'label_show' => '',		
	), $atts ) );
		
		
	// Get id
	if( $id == '' ) {
		$id = get_the_ID();
	}	
	
	// Set up initial query for post
	$args = array(
		'post_type' => explode( ',', $post_type ),
		'posts_per_page' => $num,
		'order' => $order,
		'orderby' => $orderby,
		'offset' => $offset,
		'no_found_rows' => true		
	);
	
	// If order by views
	if( $orderby == 'meta_value_num' ) {
		$args['meta_key'] = 'mnky_post_views_count';
	}	
	
	// Exclude current post
	$args['post__not_in'] = explode( ',', $id);
	
	// Get post categories
	$categories = wp_get_post_categories( $id );
	
	// Get post tags
	$tags = wp_get_post_tags( $id, array( 'fields' => 'ids' ) );
	
	// Filter
	if ( $post_type == 'post' ) {
		$tax_args = array( 'tax_query' => array() );
		
		if ( ! empty( $categories ) ) {
			$tax_args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $categories,
						'operator' => 'IN'
					)
				)
			);
		}
		
		if ( ! empty( $tags ) && $no_tags != 'on' ) {
			$tax_args['tax_query']['relation'] = $tax_relation;
			$tax_2 = array(
				'taxonomy' => 'post_tag',
				'field' => 'term_id',
				'terms' => $tags,
				'operator' => 'IN'
			);
			array_push($tax_args['tax_query'], $tax_2);
		}
	
		$args = array_merge( $args, $tax_args );		
	}
	
	// If custom taxonomy
	if ( $post_type != 'post' && $custom_tax != '' ) {
		
		// Term string to array
		if ( $custom_tax_terms == '' ) {
			$tax_terms = '';
			$tax_term = wp_get_post_terms( $id, $custom_tax);
			foreach( $tax_term as $tax_term_slug ) {
				$tax_terms[] = $tax_term_slug->slug;
			}
		} else {
			$tax_terms = explode( ', ', $custom_tax_terms );
		}
	
		if( ! empty( $tax_terms ) ) {
			$tax_args = array(
				'tax_query' => array(
					array(
						'taxonomy' => $custom_tax,
						'field' => 'slug',
						'terms' => $tax_terms,
						'operator' => 'IN'
					)
				)
			);
		
			$args = array_merge( $args, $tax_args );
		}
	}

	

	$query = new WP_Query( $args );
	
	if ( ! $query -> have_posts() )
		return false;
	
	while ( $query -> have_posts() ) : $query -> the_post(); 
		
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
		
		// Image size
		$thumbnail_size = 'mnky_size-300x200';
		
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
			$thumbnail = '<a href="'. esc_url( get_the_permalink() ) .'" rel="bookmark">'. $label . $post_format .'<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">'. $image .'<meta itemprop="url" content="'. esc_url( $image_attr[0] ) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1] ) .'"><meta itemprop="height" content="'. esc_attr( $image_attr[2] ) .'"></div></a>';
		} else {
			$thumbnail = '';
		}
		
		if(function_exists( 'ot_get_option' )){
			$publisher = '<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="'. esc_attr(ot_get_option('logo')) .'">
			<meta itemprop="width" content="'. esc_attr(str_replace( "px", "", ot_get_option('retina_logo_width') )) .'">
			<meta itemprop="height" content="'. esc_attr(str_replace( "px", "", ot_get_option('retina_logo_height') )) .'">
			</div>
			<meta itemprop="name" content="'. esc_attr(get_bloginfo('name')) .'">
			</div>';
		} else {
			$publisher = '';
		}	
		
		$author = '<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="'. esc_html(get_the_author()) .'"></div>';
				
		$title = get_the_title();
		
		$output .= '<li itemscope itemtype="http://schema.org/Article" class="related-post-container"><div class="mrp-img">'. $thumbnail .'</div><a itemprop="mainEntityOfPage" href="'. esc_url( get_the_permalink() ) .'" rel="bookmark"><h6 itemprop="headline">'. esc_html( $title ) .'</h6></a><time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished"></time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified"></time>'. $author . $publisher .'</li>';
		
	endwhile; 
	wp_reset_postdata();

	$output = '<ul class="mnky-related-posts mrp-'. esc_attr( $num ) .' clearfix" >'. $output .'</ul>';

echo $output;