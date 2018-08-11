<?php
$output = $css_class = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'offset' => 0,
		'posts_per_page' => '4',
		'order' => 'DESC',
		'orderby' => 'date',
		'category' => '',
		'tag' => '',
		'tax_relation' => 'OR',
		'time_limit' => '',
		'title' => '',
		'custom_tax' => '',
		'custom_tax_terms' => '',
		'el_class' => '',
	), $atts ) );
	
	wp_enqueue_script( 'news-ticker', MNKY_PLUGIN_URL . 'assets/js/news-ticker.js', array('jquery'), '6.7', true);	
	
	$el_class = $this->getExtraClass($el_class);
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-news-ticker clearfix'.$el_class, $this->settings['base']);
		

	// Set up initial query for post
	$args = array(
		'post_type' => explode( ',', $post_type ),
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
		'no_found_rows' => true
	);	
	
	// If order by views
	if( $orderby == 'meta_value_num' ) {
		$args['meta_key'] = 'mnky_post_views_count';
	}	
	
	// Offset
	if( $offset != 0 && $offset != '' ) {
		$args['offset'] = $offset;
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

	// Filter
	if ( $post_type == 'post' ) {		
		$tax_args = array( 'tax_query' => array() );
		
		if ( ! empty( $category ) ) {
			$tax_args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => explode( ', ', $category ),
						'operator' => 'IN'
					)
				)
			);
		}
		
		if ( ! empty( $tag ) ) {
			$tax_args['tax_query']['relation'] = $tax_relation;
			$tax_2 = array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => explode( ', ', $tag ),
				'operator' => 'IN'
			);
			array_push($tax_args['tax_query'], $tax_2);
		}
		
		$args = array_merge( $args, $tax_args );
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
		
		$output .= '<li><a href="'. esc_url(get_the_permalink()) .'" title="'. sprintf( esc_attr__( 'View %s', 'core-extend' ), the_title_attribute( 'echo=0' ) ) .'" rel="bookmark">'. esc_html(get_the_title()) .'</a></li>';
	endwhile; 	
	
	wp_reset_postdata();

	if ( is_rtl() ) {
		$output = '<div class="'.esc_attr( trim( $css_class ) ).'" ><div class="mnt-title">'. $title .'</div><ul class="mnt-items">'. $output .'</ul><div class="mnt-pagination"><a class="mnt-back"><i class="post-icon icon-right"></i></a><a class="mnt-next"><i class="post-icon icon-left"></i></a></div></div>';
	} else {
		$output = '<div class="'.esc_attr( trim( $css_class ) ).'" ><div class="mnt-title">'. $title .'</div><ul class="mnt-items">'. $output .'</ul><div class="mnt-pagination"><a class="mnt-back"><i class="post-icon icon-left"></i></a><a class="mnt-next"><i class="post-icon icon-right"></i></a></div></div>';
	}

echo $output;