<?php
$output = $image_src = $image = $thumbnail = $thumbnail_size = $date = $publisher = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'grid_layout' => 'mpg-layout-1',
		'grid_height' => '500',
		'category_1' => '',
		'category_2' => '',
		'category_3' => '',
		'category_4' => '',
		'category_5' => '',
		'category_6' => '',
		'thumbnail_size' => 'mnky_size-600x400',
		'order' => 'DESC',
		'orderby' => 'date',
		'el_class' => '',
		'cat_hide' => '',
		'views_hide' => '',
		'comments_hide' => '',
		'label_hide' => '',
		'post_format_hide' => '',
		'post_format_text_hide' => '',	
		'no_duplicate' => '',
		'allow_duplicate' => '',
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts ) );
	
	$el_class = $this->getExtraClass($el_class);
	$grid_layout = $this->getExtraClass($grid_layout);
	$grid_height = preg_replace('/[^0-9.]+/', '', $grid_height) .'px';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-posts-grid clearfix'.$grid_layout.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	$categories = array($category_1, $category_2, $category_3); 

	if( $grid_layout == ' mpg-layout-1' || $grid_layout == ' mpg-layout-2' || $grid_layout == ' mpg-layout-3' || $grid_layout == ' mpg-layout-6' || $grid_layout == ' mpg-layout-7' ){
		$categories[] = $category_4;
	}		
	if( $grid_layout == ' mpg-layout-1' || $grid_layout == ' mpg-layout-3' ){
		$categories[] = $category_5;
	}	
	if( $grid_layout == ' mpg-layout-3' ){
		$categories[] = $category_6;
	}	


	// Store shown post IDs
	$mp_do_not_duplicate = array();
	global $mp_do_not_duplicate;
	
	$mpg_do_not_duplicate = array();
	$count = 0;	
	
	// If do not duplicate
	if( $no_duplicate == 'yes' && ! empty( $mp_do_not_duplicate ) ) {
		$mpg_do_not_duplicate = array_merge($mpg_do_not_duplicate, $mp_do_not_duplicate );
	}
	

	
    foreach ( $categories as $category ) {
		$count++;
		 
		// Set up initial query for post
		$args = array(
			'post_type' => explode( ',', $post_type ),
			'posts_per_page' => '1',
			'post__not_in' => $mpg_do_not_duplicate,		
			'order' => $order,
			'orderby' => $orderby,
			'no_found_rows' => true			
		);
		
		if ( $post_type == 'post' ){
			$args['category_name'] = $category;
		}
		
		if( $orderby == 'meta_value_num' ) {
				$args['meta_key'] = 'mnky_post_views_count';
		}
	
		$query = new WP_Query( $args );
		
		if ( ! $query -> have_posts() )
			return false;
		
		while ( $query -> have_posts() ): $query -> the_post(); 
			
			$mpg_do_not_duplicate[] = get_the_ID();
	
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
			
			
			if( $label_hide != 'off' && $post_type == 'post' ){
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
				$thumbnail = '<a href="'. esc_url( get_the_permalink() ) .'" class="mpg-image-url" rel="bookmark">'. $label . $post_format .'<div class="mpg-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">'. $image .'<meta itemprop="url" content="'. esc_url( $image_attr[0] ) .'"><meta itemprop="width" content="'. esc_attr($image_attr[1] ) .'"><meta itemprop="height" content="'. esc_attr( $image_attr[2] ) .'"></div></a>';
			} else {
				$thumbnail = '';
			}
			
			
			if( $cat_hide == 'off' && $post_type == 'post' ) {
				$cat = '';
			} else {
				$cat = '<div class="mpg-category">' . get_the_category_list( ' ' ) . '</div>';
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

			$author = '<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="'. esc_html(get_the_author()) .'"></div>';
							
			$date = '<time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished"></time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified"></time>';
	
			$article_meta = '<div class="mpg-article-meta">'. $author . $date .'</div>';						
			
			
			if( $comments_hide == 'off' && $views_hide == 'off' ) {
				$article_interaction_meta = '';
			} else {				
				$article_interaction_meta = '<span class="mp-article-interaction-meta">'. $comments . $post_views .'</span>';						
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

			$title = '<div class="mpg-header"><h2 class="mpg-title"><a itemprop="mainEntityOfPage" href="'. esc_url( get_the_permalink() ) .'" title="'. sprintf( esc_attr__( 'View %s', 'core-extend' ), the_title_attribute( 'echo=0' ) ) .'" rel="bookmark"><span itemprop="headline" >'. esc_html( get_the_title() ) .'</span></a>'. $article_interaction_meta .'</h2></div>';

			
			$output .= '<div itemscope itemtype="http://schema.org/Article" class="mpg-item mpg-item-'.esc_attr( $count ).'">';			
			$output .= '<div class="mpg-content">'. $cat . $title . $article_meta . $publisher .'</div>';
			$output .= '<div class="mpg-bg-img">'. $thumbnail .'</div>';
			$output .= '</div>';
			
		endwhile; 
		wp_reset_postdata();
	}
	
	
	$output = '<div class="'.esc_attr( trim( $css_class ) ).'" style="height:'. esc_html( $grid_height ) .'">'. $output .'</div>';

echo $output;