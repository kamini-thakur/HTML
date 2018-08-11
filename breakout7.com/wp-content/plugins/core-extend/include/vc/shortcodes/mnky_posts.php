<?php
$output = $image = $thumbnail = $small_thumbnail = $thumbnail_size = $date = $publisher = $layout = $css_class = $label = $article_loop_content = $article_meta = $meta_image = '';

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
		'bg_image_height' => '',
		'title_size' => '',
		'el_class' => '',
		'el_id' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'column_layout' => 'column-count-1',
		'no_duplicate' => '',
		'allow_duplicate' => '',
		'article_background_color' => '',
		'pagination' => '',
		'layout' => '1',
		'content_type' => '',
		'thumbnail_size' => 'mnky_size-600x400',
		'post_nr' => '',
		'post_nr_adjust' => '',
		'cat_hide' => '',
		'date_hide' => '',
		'views_hide' => '',
		'comments_hide' => '',
		'author_hide' => '',
		'rating_hide' => '',
		'label_hide' => '',
		'post_format_hide' => '',
		'post_format_text_hide' => '',
		'loop_content' => '',
		'loop_content_custom_code' => '',
	), $atts ) );
	
	$el_class = $this->getExtraClass($el_class);
	$el_id = str_replace('-', '_', $el_id);
	$column_layout = $this->getExtraClass($column_layout);
	($title_size != '') ? $title_size  = 'style="font-size:' . esc_attr( $title_size  ) . ';"' : '';
	($bg_image_height != '') ? $bg_image_height  = 'style="height:' . esc_attr( $bg_image_height  ) . ';"' : '';
	($post_nr_adjust != '') ? $post_nr_adjust  = 'style="margin-top:' . esc_attr( $post_nr_adjust  ) . ';"' : '';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-posts clearfix mp-layout-'.$layout.$column_layout.$el_class, $this->settings['base']);
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
	
	// Pagination
	if( $pagination == '' ) {
		$args['no_found_rows'] = true;
	}	
	
	if( $pagination != '' ) {
		//Protect against arbitrary paged values
		if ( get_query_var('paged') ) { 
			$paged = get_query_var('paged'); 
		} else if ( get_query_var('page') ) {
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		$args['paged'] = $paged;
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

		if( $post_nr == 'on'){	
			$nr = '<div class="mp-post-nr" '. $post_nr_adjust .'>'. esc_html($count) .'</div>';
			$numbered_post = 'numbered-post';
		} else {
			$nr = '';
			$numbered_post ='';
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
			$thumbnail = '<a href="'. esc_url( get_the_permalink() ) .'" class="mp-image-url" rel="bookmark">'. $label . $post_format .'<div class="mp-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">'. $image .'<meta itemprop="url" content="'. esc_url( $image_attr[0] ) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1] ) .'"><meta itemprop="height" content="'. esc_attr( $image_attr[2] ) .'"></div></a>';
			$small_thumbnail = '<a href="'. esc_url( get_the_permalink() ) .'" class="mp-image-url" rel="bookmark">'. $nr .'<div class="mp-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">'. $image .'<meta itemprop="url" content="'. esc_url( $image_attr[0] ) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1] ) .'"><meta itemprop="height" content="'. esc_attr( $image_attr[2] ) .'"></div></a>';
			$meta_image = '<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="'. esc_url($image_attr[0]) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1]) .'"><meta itemprop="height" content="'. esc_attr($image_attr[2]) .'"></div>';
		} else {
			$thumbnail = $small_thumbnail = $meta_image = '';
		}
		
		
		if( $cat_hide == 'off' ) {
			$cat = '';
		} else {
			$cat = '<div class="mp-category mp-element">'. get_the_category_list( ', ' ) .'</div>';
		}
		
		
		if( $rating_hide != 'off' && get_post_meta( get_the_ID(), 'mnky_enable_review', true ) == 'on' && function_exists( 'mnky_review_sum' ) ){	
			if ( get_post_meta( get_the_ID(), 'mnky_review_breakdown', true ) == 'off' ) {
				$rating = '<div class="mp-rating-wrapper mp-element"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
			} else {
				$rating = '<div class="mp-rating-wrapper mp-element"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ) .'%"></span></div></div>';
			}
		} else {
			$rating = '';
		}	

			
		if( $author_hide == 'off' ) {
			$author = '<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="'. esc_html(get_the_author()) .'"></div>';
		} else {	
			$author = '<span class="mp-author"><a class="author-url" href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) .'" title="'. esc_attr(sprintf( __( 'View all posts by %s', 'core-extend' ), get_the_author() )) .'" rel="author"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'. esc_html( get_the_author() ) .'</span></span></a></span>';
		}		
			
			
		if( $date_hide == 'off' ) {
			$date = '<time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished"></time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified"></time>';
		} else {
			if ( function_exists( 'mnky_post_time' ) ) {
				$date = '<span class="mp-date"><time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html( mnky_post_time() ) .'</time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time></span>';
			} else {
				$date =  esc_html( get_the_date() );
			}	
		}
			
		
		if( $comments_hide != 'off' && comments_open() ){
			$comments = '<span class="mp-comment"><i class="post-icon icon-comments"></i> <a href="'. esc_url( get_comments_link() ) .'" title="'. esc_html__( 'Comments', 'core-extend' ) .'">'.	esc_html( get_comments_number() ) .'</a></span><meta itemprop="interactionCount" content="UserComments:'. esc_html( get_comments_number() ) .'"/>';
		} else {
			$comments = '';
		}
			
			
		if( $views_hide != 'off' && function_exists( 'mnky_getPostViews' ) ) {			
			$post_views = '<span class="mp-views">'. mnky_getPostViews( get_the_ID() ) .'</span>';
		} else {
			$post_views = '';
		}	
		

		if( $author_hide == 'off' && $date_hide == 'off' ) {
			$article_meta = $author . $date;
		} else {				
			$article_meta = '<div class="mp-article-meta mp-element">'. $author . $date .'</div>';						
		}
		
		if( $comments_hide == 'off' && $views_hide == 'off' ) {
			$article_interaction_meta = '';
		} else {				
			$article_interaction_meta = '<span class="mp-article-interaction-meta">'. $comments . $post_views .'</span>';						
		}
			
		$title = '<div class="mp-header mp-element"><h2 class="mp-title" '. $title_size .'><a itemprop="mainEntityOfPage" href="'. esc_url( get_the_permalink() ) .'" title="'. sprintf( esc_attr__( 'View %s', 'core-extend' ), the_title_attribute( 'echo=0' ) ) .'" rel="bookmark"><span itemprop="headline" >'. esc_html( get_the_title() ) .'</span></a>'. $article_interaction_meta .'</h2></div>';
		
		
		if( $content_type == 'excerpt' ){	
			$excerpt = '<div itemprop="articleBody" class="mp-excerpt mp-element">'. wpautop( esc_html( get_the_excerpt() ) ) .'</div>';
		} elseif ( $content_type == 'content_full' ) {	
			$more_link_text = esc_html__('Read more','core-extend');
			$excerpt = '<div itemprop="articleBody" class="mp-full-content mp-element">'. do_shortcode( wpautop( get_the_content($more_link_text) ) ) .'</div>';
		} else {
			$excerpt = '';
		}
					
		if ( function_exists( 'mnky_post_time' ) ) {
			$date = '<span class="mp-date"><time datetime="'. esc_attr( get_the_date( 'c' ) ) .'" itemprop="datePublished">'. esc_html( mnky_post_time() ) .'</time><time class="meta-date-modified" datetime="'. esc_attr( get_the_modified_date( 'c' ) ) .'" itemprop="dateModified">'. esc_attr( get_the_modified_date() ) .'</time></span>';
		} else {
			$date =  esc_html( get_the_date() );
		}	
		
		if( $loop_content == 'loop_content_on' && $loop_content_custom_code != '' ){
			$article_loop_content = '<div class="mp-loop-content mp-element">'. do_shortcode( wp_kses_post( $loop_content_custom_code ) ) .'</div>';
		} else {
			$article_loop_content = ''; 
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
		
		
		if( $layout == 2){ // Image on the left
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="clearfix mp-container mp-post-'. esc_attr($count) .'"><div class="mp-inner-container">'. $thumbnail . '<div class="mp-content-container">'. $cat . $title . $article_meta . $rating . $excerpt . $article_loop_content . $publisher .'</div></div></div>';
				
		} elseif( $layout == 3){ // List
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="clearfix mp-container '.$numbered_post.' mp-post-'. esc_attr($count) .'"><div class="mp-inner-container">'. $nr .'<div class="mp-content-container">'. $label . $post_format . $cat . $title . $article_meta . $rating . $excerpt . $article_loop_content . $meta_image . $publisher .'</div></div></div>';
						
		} elseif( $layout == 4){ // List with image
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="clearfix mp-container '.$numbered_post.' mp-post-'. esc_attr($count) .'"><div class="mp-inner-container">'. $small_thumbnail .'<div class="mp-content-container">'. $label . $post_format . $cat . $title . $article_meta . $rating . $excerpt . $article_loop_content . $meta_image . $publisher .'</div></div></div>';
			
		} elseif( $layout == 5){ // Content over image
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="clearfix mp-container mp-post-'. esc_attr($count) .'"><div class="mp-bg-img" '. $bg_image_height .'>'. $thumbnail .'<div class="mp-content-container">'. $article_loop_content . $cat . $title . $article_meta .'<div class="mp-rating-block">'. $rating .'</div>'. $excerpt . $publisher .'</div></div></div>';
			
		} else { // Default image on top
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="clearfix mp-container mp-post-'. esc_attr($count) .'"><div class="mp-inner-container">'. $thumbnail . '<div class="mp-content-container">'. $cat . $title . $article_meta . $rating . $excerpt . $article_loop_content . $publisher .'</div></div></div>';
		}			
		
	
	endwhile; 
	
	
	if( $pagination == 'load_more' ) {
		wp_enqueue_script( 'ajax-load-posts', MNKY_PLUGIN_URL . 'assets/js/ajax-load-posts.js', array('jquery'), '', true);		
		$max = $query->max_num_pages;
 		
		
 		wp_localize_script(
 			'ajax-load-posts',
 			'mnky_lp_'.$el_id,
			array(
 				'startPage' => max( 1, $paged ),
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)
 		);
		
		$css_class .= ' ajax-load-posts';
		$output .= '<div class="mp-load-posts"><a><span class="mp-load">'. esc_html__( 'Load More Articles', 'core-extend' ) .'</span><span class="mp-loading">'. esc_html__( 'Loading Articles...', 'core-extend' ) .'</span><span class="mp-all-loaded">'. esc_html__( 'No More Articles to Load', 'core-extend' ) .'</span></a></div>';
	}
	
	
	if( $pagination == 'infinite' ) {
		wp_enqueue_script( 'ajax-infinite-scroll', MNKY_PLUGIN_URL . 'assets/js/ajax-infinite-scroll.js', array('jquery'), '', true);		
		$max = $query->max_num_pages;
 		
		
 		wp_localize_script(
 			'ajax-infinite-scroll',
 			'mnky_is_'.$el_id,
			array(
 				'startPage' => max( 1, $paged ),
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)
 		);
		
		$css_class .= ' ajax-infinite-scroll';
		$output .= '<div class="mp-load-posts"><a><span class="mp-load">'. esc_html__( 'Load More Articles', 'core-extend' ) .'</span><span class="mp-loading">'. esc_html__( 'Loading Articles...', 'core-extend' ) .'</span><span class="mp-all-loaded">'. esc_html__( 'No More Articles to Load', 'core-extend' ) .'</span></a></div>';
	} 
	
	
	if ( $pagination == 'carousel' ) {
		wp_enqueue_script( 'ajax-post-carousel', MNKY_PLUGIN_URL . 'assets/js/ajax-post-carousel.js', array('jquery'), '', true);	
		$max = $query->max_num_pages;
		
 		wp_localize_script(
 			'ajax-post-carousel',
 			'mnky_pc_'.$el_id,
			array(
 				'startPage' => max( 1, $paged ),
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)
 		);		
		
		$css_class .= ' ajax-post-carousel';
		
		if ( is_rtl() ) {
		$output .= '<div class="mp-ajax-loader"></div><div class="mp-load-posts"><a class="mp-load-back"><i class="fa fa-angle-right"></i></a><a class="mp-load-next"><i class="fa fa-angle-left"></i></a></div>';
		} else {
		$output .= '<div class="mp-ajax-loader"></div><div class="mp-load-posts"><a class="mp-load-back"><i class="fa fa-angle-left"></i></a><a class="mp-load-next"><i class="fa fa-angle-right"></i></a></div>';
		}
	}	
	
	if( $pagination == 'pagination' ) {
		$output .= '<div class="navigation pagination">';
		$big = 999999999; // need an unlikely integer

		$output .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '/page/%#%',
			'current' => max( 1, $paged ),
			'end_size' => 3,
			'mid_size' => 3,
			'prev_text' => __( 'Previous', 'core-extend' ),
			'next_text' => __( 'Next', 'core-extend' ),
			'total' => $query->max_num_pages
		) );
		$output .= '</div>';
	}

	wp_reset_postdata();

	$output = '<div class="'.esc_attr( trim( $css_class ) ).'" data-id="'. $el_id .'" >'. $output .'</div>';

echo $output;