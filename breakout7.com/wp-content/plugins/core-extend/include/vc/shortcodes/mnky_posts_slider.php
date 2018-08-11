<?php
$output = $image = $thumbnail_size = $date = $publisher = $css_class = $label = $article_meta = $meta_image = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'offset' => 0,
		'posts_per_page' => '4',
		'order' => 'DESC',
		'orderby' => 'date',
		'author' => '',
		'custom_tax' => '',
		'custom_tax_terms' => '',
		'category' => '',
		'tag' => '',
		'category_2' => '',
		'tag_2' => '',
		'taxonomy' => '',
		'tax_term' => '',
		'tax_operator' => 'IN',
		'tax_2' => '',
		'taxonomy_2' => '',
		'tax_term_2' => '',
		'tax_operator_2' => 'IN',
		'tax_relation' => 'OR',
		'time_limit' => '',
		'title_size' => '',
		'el_class' => '',
		'el_id' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'no_duplicate' => '',
		'allow_duplicate' => '',
		'content_type' => '',
		'thumbnail_size' => 'mnky_size-600x400',
		'cat_hide' => '',
		'date_hide' => '',
		'views_hide' => '',
		'comments_hide' => '',
		'author_hide' => '',
		'rating_hide' => '',
		'label_hide' => '',
		'post_format_hide' => '',
		'post_format_text_hide' => '',
		'slider_height' => '450px',
		'slider_fx' => 'fade',
		'slider_interval' => 5
	), $atts ) );
	
	wp_enqueue_style('flexslider');
    wp_enqueue_script('flexslider');
	
	$el_class = $this->getExtraClass($el_class);
	$el_id = str_replace('-', '_', $el_id);
	($title_size != '') ? $title_size  = 'style="font-size:' . esc_attr( $title_size  ) . ';"' : '';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-posts-slider clearfix '.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';		

	// Set up initial query for post
	$args = array(
		'post_type' => explode( ',', $post_type ),
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
	);
	
	// Store shown post IDs
	$mp_do_not_duplicate = array();
	global $mp_do_not_duplicate;
	
	// Offset
	if( $offset != 0 && $offset != '') {
		$args['offset'] = $offset;
	}	
	
	// If do not duplicate
	if( $no_duplicate == 'yes' ) {
		$args['post__not_in'] = $mp_do_not_duplicate;
	}
	
	// If order by views
	if( $orderby == 'meta_value_num' ) {
		$args['meta_key'] = 'mnky_post_views_count';
	}	
	
	// If author selected
	if( $taxonomy == 'author' ) {
		if( $author != 'all' ) {
			$args['author__in'] = $author;
		}
	}	
	
	// If time limit
	if( $time_limit != '' ) {
		$date_args = array();
		
		if( $time_limit == 'today' ) {
			$today = getdate();
			$date_args = array(
				'date_query' => array(
					array(
						'year'  => $today['year'],
						'month' => $today['mon'],
						'day'   => $today['mday'],
					),
				)
			);
		} elseif( $time_limit == 'week' ) {
			$date_args = array(
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'week' => date( 'W' ),
					)
				)
			);
		} elseif( $time_limit == 'month' ) {
			$date_args = array(
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'month' => date( 'n' ),
					)
				)
			);
		}
		$args = array_merge( $args, $date_args );
	}
	
	// If taxonomy attributes, create a taxonomy query
	if ( ( $taxonomy != 'all_posts' &&  $taxonomy != 'author' &&  $taxonomy != 'custom' ) && ( ! empty( $category ) || ! empty( $tag ) ) ) {
		
		// Term string to array
		if($taxonomy == 'category') {
			$tax_term = explode( ', ', $category );
		} else {
			$tax_term = explode( ', ', $tag );
		}
	
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $tax_term,
					'operator' => $tax_operator
				)
			)
		);
		
		if( $taxonomy_2 != 'none' && ( ! empty( $category_2 ) || ! empty( $tag_2 ) ) ) {
			// Term string to array
			if($taxonomy_2 == 'category') {
				$tax_term_2 = explode( ', ', $category_2 );
			} else {
				$tax_term_2 = explode( ', ', $tag_2 );
			}
			
			$tax_args['tax_query']['relation'] = $tax_relation;
			$tax_2 = array(
				'taxonomy' => $taxonomy_2,
				'field' => 'slug',
				'terms' => $tax_term_2,
				'operator' => $tax_operator_2
			);
			array_push($tax_args['tax_query'], $tax_2);
		}
		
		$args = array_merge( $args, $tax_args );
	}

	// If custom taxonomy
	if ( $taxonomy == 'custom' && $custom_tax != '' && $custom_tax_terms != '' ) {
		
		// Term string to array
		$tax_term = explode( ', ', $custom_tax_terms );
	
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $custom_tax,
					'field' => 'slug',
					'terms' => $tax_term,
					'operator' => $tax_operator
				)
			)
		);
		$args = array_merge( $args, $tax_args );
	}
	
	// Start loop
	$query = new WP_Query( $args );
	
	if ( ! $query -> have_posts() )
		return false;
	
	$count = 0;
	while ( $query -> have_posts() ): $query -> the_post(); 
		$count++;
							
		if( $allow_duplicate != 'yes' ) {
			$mp_do_not_duplicate[] = get_the_ID();
		}
		
		
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
		
		
		if( $label_hide != 'off' ){
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
		} else	{
			$label = '';
		}

			
		
		if( $thumbnail_size == '' ) { 
		$thumbnail_size = 'mnky_size-600x400';
		}
		
		if( has_post_thumbnail() ){
			$image = get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size );
			$image_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		} elseif( function_exists( 'ot_get_option' ) && ot_get_option('default_post_image') ) {
			$image = wp_get_attachment_image_url( ot_get_option('default_post_image' ), $thumbnail_size ); 
			$image_attr = wp_get_attachment_image_src( ot_get_option( 'default_post_image' ), 'full' );
		} else {
			$image = '';
			$image_attr = null;
		}	
		
		if( $image != '' ){
			$meta_image = '<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="'. esc_url($image_attr[0]) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1]) .'"><meta itemprop="height" content="'. esc_attr($image_attr[2]) .'"></div>';
		} else {
			$meta_image = '';
		}
		
		
		if( $cat_hide == 'off' ) {
			$cat = '';
		} else {
			$cat = '<div class="mps-category mps-element">'. get_the_category_list( ', ' ) .'</div>';
		}
		
		
		if( $rating_hide != 'off' && get_post_meta( get_the_ID(), 'mnky_enable_review', true ) == 'on' && function_exists( 'mnky_review_sum' ) ){	
			if ( get_post_meta( get_the_ID(), 'mnky_review_breakdown', true ) == 'off' ) {
				$rating = '<div class="mps-rating-wrapper mps-element"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
			} else {
				$rating = '<div class="mps-rating-wrapper mps-element"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ) .'%"></span></div></div>';
			}
		} else {
			$rating = '';
		}	

			
		if( $author_hide == 'off' ) {
			$author = '<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="'. esc_html(get_the_author()) .'"></div>';
		} else {	
			$author = '<span class="mps-author"><a class="author-url" href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) .'" title="'. esc_attr(sprintf( __( 'View all posts by %s', 'core-extend' ), get_the_author() )) .'" rel="author"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'. esc_html( get_the_author() ) .'</span></span></a></span>';
		}		
			
			
		if( $date_hide == 'off' ) {
			$date = '<time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished"></time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified"></time>';
		} else {
			if ( function_exists( 'mnky_post_time' ) ) {
				$date = '<span class="mps-date"><time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html( mnky_post_time() ) .'</time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time></span>';
			} else {
				$date =  esc_html( get_the_date() );
			}	
		}
			
		
		if( $comments_hide != 'off' && comments_open() ){
			$comments = '<span class="mps-comment"><i class="post-icon icon-comments"></i> <a href="'. esc_url( get_comments_link() ) .'" title="'. esc_html__( 'Comments', 'core-extend' ) .'">'.	esc_html( get_comments_number() ) .'</a></span><meta itemprop="interactionCount" content="UserComments:'. esc_html( get_comments_number() ) .'"/>';
		} else {
			$comments = '';
		}
			
			
		if( $views_hide != 'off' && function_exists( 'mnky_getPostViews' ) ) {			
			$post_views = '<span class="mps-views">'. mnky_getPostViews( get_the_ID() ) .'</span>';
		} else {
			$post_views = '';
		}	
		

		if( $author_hide == 'off' && $date_hide == 'off' ) {
			$article_meta = $author . $date;
		} else {				
			$article_meta = '<div class="mps-article-meta mps-element">'. $author . $date .'</div>';						
		}
		
		if( $comments_hide == 'off' && $views_hide == 'off' ) {
			$article_interaction_meta = '';
		} else {				
			$article_interaction_meta = '<span class="mps-article-interaction-meta">'. $comments . $post_views .'</span>';						
		}
			
		$title = '<div class="mps-header mps-element"><h2 class="mps-title" '. $title_size .'><a itemprop="mainEntityOfPage" href="'. esc_url( get_the_permalink() ) .'" title="'. sprintf( esc_attr__( 'View %s', 'core-extend' ), the_title_attribute( 'echo=0' ) ) .'" rel="bookmark"><span itemprop="headline" >'. esc_html( get_the_title() ) .'</span></a>'. $article_interaction_meta .'</h2></div>';
		
		
		if( $content_type == 'excerpt' ){	
			$excerpt = '<div itemprop="articleBody" class="mps-excerpt mps-element">'. wpautop( esc_html( get_the_excerpt() ) ) .'</div>';
		} else {
			$excerpt = '';
		}
					
		if ( function_exists( 'mnky_post_time' ) ) {
			$date = '<span class="mps-date"><time datetime="'. esc_attr( get_the_date( 'c' ) ) .'" itemprop="datePublished">'. esc_html( mnky_post_time() ) .'</time><time class="meta-date-modified" datetime="'. esc_attr( get_the_modified_date( 'c' ) ) .'" itemprop="dateModified">'. esc_attr( get_the_modified_date() ) .'</time></span>';
		} else {
			$date =  esc_html( get_the_date() );
		}	
		
		
		if( function_exists( 'ot_get_option' ) ){
			$publisher = '<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="'. esc_attr( ot_get_option('logo') )  .'">
			<meta itemprop="width" content="'. esc_attr( str_replace( "px", "", ot_get_option('retina_logo_width') ) ) .'">
			<meta itemprop="height" content="'. esc_attr( str_replace( "px", "", ot_get_option('retina_logo_height') ) ) .'">
			</div>
			<meta itemprop="name" content="'. esc_attr( get_bloginfo('name') ) .'">
			</div>';
		} else {
			$publisher = '';
		}	

		
		$output .= '<li itemscope itemtype="http://schema.org/Article" class="clearfix mps-container mps-post-'. esc_attr($count) .'">'. $label . $post_format .'<div class="mps-content-container">'. $cat . $title . $article_meta .'<div class="mps-rating-block">'. $rating .'</div>'. $excerpt . $publisher . $meta_image .'</div><div class="mps-bg-img" style="background-image:url('. esc_url($image) .'); height:'. esc_attr( $slider_height ) .'"></div></li>';
		
	
	endwhile; 

	wp_reset_postdata();

	$output = '<div class="'.esc_attr( trim( $css_class ) ).'" data-id="'. $el_id .'" ><div class="wpb_flexslider flexslider" data-interval="'. esc_attr( $slider_interval ) .'" data-flex_fx="'. esc_attr( $slider_fx ) .'" style="height:'. esc_html( $slider_height ) .'; overflow:hidden;"><ul class="slides">'. $output .'</ul><div class="mp-ajax-loader"></div></div></div>';

echo $output;