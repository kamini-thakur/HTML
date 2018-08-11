<?php
/**
 * The template for displaying posts in blog page
 *
 */
?>
	<?php 
		
		$post_style = ot_get_option('archive_post_style');
		$post_columns = ot_get_option('archive_post_layout', 'layout-one-column');
		$content_type = ot_get_option('content_type', 'full_content');
		$article_class = 'archive-style-'. $post_style;
		$blog_loop_content = mnky_blog_loop_content();
		
		if( is_category() ){
			$category_styles = ot_get_option( 'category_styles', array() );
			if( ! empty( $category_styles ) ) {
				foreach( $category_styles as $category_style ) {
					if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						if( $category_style['cat_post_style'] != 'default' ) {
							$post_style = $category_style['cat_post_style'];
							$article_class = 'archive-style-'. $category_style['cat_post_style'];
						}
						if( $category_style['cat_post_layout'] != 'default' ) {
							$post_columns = $category_style['cat_post_layout'];
						}
						if( $category_style['cat_loop_content'] != 'off' ) {
							$blog_loop_content = mnky_blog_loop_content();
						} else {
							$blog_loop_content = '';
						}
						if( $category_style['cat_content_type'] != 'default' ) {
							$content_type = $category_style['cat_content_type'];
						}
					}
				}
			}
		}
		
		$article_class .= ' '. $post_columns;

		

		if( is_search() ){
			$content_type = 'excerpt';
		}	
		
		if( ot_get_option( 'post_review_rating' ) != 'off' && get_post_meta( get_the_ID(), 'mnky_enable_review', true ) == 'on' ){	
				if ( get_post_meta( get_the_ID(), 'mnky_review_breakdown', true ) == 'off' ) {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
				} else {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ).'%"></span></div></div>';
				}
		} else {
			$rating = '';
		}
	?>
	
	<article itemtype="http://schema.org/Article" itemscope="" id="post-<?php the_ID(); ?>" <?php post_class('archive-layout clearfix '. esc_attr($article_class) ); ?> >
	
	<?php
	$thumbnail = $image = $image_attr = $post_link = $post_link_target = $post_format = '';

	if( has_post_format( 'gallery', get_the_ID() ) ) {
		$post_format = '<span class="post-format-badge"><i class="fa fa-picture-o" aria-hidden="true"></i>'. esc_html__( 'Photos', 'mag' ) .'</span>';
	} elseif( has_post_format( 'video', get_the_ID() ) ) {
		$post_format = '<span class="post-format-badge"><i class="fa fa-play" aria-hidden="true"></i>'. esc_html__( 'Video', 'mag' ) .'</span>';
	} elseif( has_post_format( 'link', get_the_ID() ) ) {
		$post_format = '<span class="post-format-badge"><i class="fa fa-link" aria-hidden="true"></i>'. esc_html__( 'Link', 'mag' ) .'</span>';
	} else {
		$post_format = '';
	}

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
	
	if ( has_post_format( 'link' ) && get_post_meta( get_the_ID(), 'mnky_custom_post_link_url', true) != '' ){
		$post_link = get_post_meta( get_the_ID(), 'mnky_custom_post_link_url', true);
		$post_link_target = '_blank';
	} else {
		$post_link = get_the_permalink();
		$post_link_target = '_self';
	}
	
	if( has_post_thumbnail() ){
		if( function_exists( 'ot_get_option' ) && $post_columns == 'layout-one-column'){
			$image = get_the_post_thumbnail( get_the_ID(), 'mnky_size-1200x800' );
		} else {
			$image = get_the_post_thumbnail( get_the_ID(), 'mnky_size-600x400' );	
		}
		$image_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	} elseif( function_exists( 'ot_get_option' ) && ot_get_option('default_post_image') ) {
		if( $post_columns ){
			$image = '<img src="'. wp_get_attachment_image_url( ot_get_option('default_post_image' ), 'mnky_size-1200x800' ) .'" alt="'. get_post_meta( ot_get_option('default_post_image'), '_wp_attachment_image_alt', true) .'">'; 
		} else {
			$image = '<img src="'. wp_get_attachment_image_url( ot_get_option('default_post_image' ), 'mnky_size-600x400' ) .'" alt="'. get_post_meta( ot_get_option('default_post_image'), '_wp_attachment_image_alt', true) .'">'; 
		}
		$image_attr = wp_get_attachment_image_src( ot_get_option( 'default_post_image' ), 'full' );
	} else {
		$image = $image_attr = '';
	}
	
	
	if( $image != '' ){
		$thumbnail = '<a class="post-preview" href="'. esc_url( $post_link ) .'" target="'. esc_attr( $post_link_target ). '" rel="bookmark">'. $label . $post_format .'<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">'. $image .'<meta itemprop="url" content="'. esc_url( $image_attr[0] ) .'"><meta itemprop="width" content="'. esc_attr( $image_attr[1] ) .'"><meta itemprop="height" content="'. esc_attr( $image_attr[2] ) .'"></div></a>';
	} else {
		$thumbnail = '';
	}	
	
	?>
		
			
		<?php if( $post_style == '3' ) : // Style 3 - Image left style ?>
						
			<?php if( ot_get_option('post_image_blog') != 'off') {
				echo $thumbnail;
			} ?>
			
			<div class="post-content-wrapper">
			
				<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
					<div class="entry-category"><?php the_category( ', ' ); ?></div>
				<?php endif; ?>
				
				<header class="post-entry-header">
					<h2 class="entry-title"><a itemprop="mainEntityOfPage" href="<?php echo esc_url($post_link) ?>" target="<?php echo esc_attr($post_link_target) ?>" title="<?php printf( esc_attr__( 'View %s', 'mag' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span itemprop="headline"><?php the_title(); ?></span></a><?php mnky_blog_interaction_meta(); ?></h2>
				</header><!-- .entry-header -->
				
				<?php mnky_blog_meta(); ?>
				
				<?php echo $rating; ?>

				<?php if ( $content_type == 'full_content' && strlen(get_the_content()) > 0 ) : ?>
					<div itemprop="articleBody" class="entry-content">
						<?php $more_link_text = esc_html__('Read more','mag');
						the_content($more_link_text); ?>
					</div>
				<?php elseif ( $content_type == 'excerpt' && strlen(get_the_excerpt()) > 0) : ?>
					<div itemprop="articleBody" class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>
				
				<?php echo $blog_loop_content; ?>
			
			</div><!-- .post-content-wrapper -->
					
		<?php elseif( $post_style == '2' ) : // Style 2 - Image overlay style ?>	
						
			<div class="post-content-bg">
				<?php if( ot_get_option('post_image_blog') != 'off') {
					echo $thumbnail;
				} ?>
				<div class="post-content-wrapper">
					<?php echo $blog_loop_content; ?>
					
					<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
						<div class="entry-category"><?php the_category( ', ' ); ?></div>
					<?php endif; ?>
					
					<header class="post-entry-header">
						<h2 class="entry-title"><a itemprop="mainEntityOfPage" href="<?php echo esc_url($post_link) ?>" target="<?php echo esc_attr($post_link_target) ?>" title="<?php printf( esc_attr__( 'View %s', 'mag' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span itemprop="headline"><?php the_title(); ?></span></a><?php mnky_blog_interaction_meta(); ?></h2>
					</header><!-- .entry-header -->

					<?php mnky_blog_meta(); ?>
					
					<?php echo '<div class="mp-rating-block">'. $rating .'</div>'; ?>
					
					<?php if ( $content_type == 'full_content' && strlen(get_the_content()) > 0 ) : ?>
						<div itemprop="articleBody" class="entry-content">
							<?php $more_link_text = esc_html__('Read more','mag');
							the_content($more_link_text); ?>
						</div>
					<?php elseif ( $content_type == 'excerpt' && strlen(get_the_excerpt()) > 0) : ?>
						<div itemprop="articleBody" class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
					
				</div><!-- .post-content-wrapper -->
			</div><!-- .post-content-bg -->
			
		<?php else : // Style 1 - Default style ?>	
			
			<?php if( ot_get_option('post_image_blog') != 'off') {
				echo $thumbnail;
			} ?>
			
			<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
				<div class="entry-category"><?php the_category( ', ' ); ?></div>
			<?php endif; ?>
			
			<header class="post-entry-header">
				<h2 class="entry-title"><a itemprop="mainEntityOfPage" href="<?php echo esc_url($post_link) ?>" target="<?php echo esc_attr($post_link_target) ?>" title="<?php printf( esc_attr__( 'View %s', 'mag' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span itemprop="headline"><?php the_title(); ?></span></a><?php mnky_blog_interaction_meta(); ?></h2>
			</header><!-- .entry-header -->
			
			<?php mnky_blog_meta(); ?>
			
			<?php echo $rating; ?>

			<?php if ( $content_type == 'full_content' && strlen(get_the_content()) > 0 ) : ?>
				<div itemprop="articleBody" class="entry-content">
					<?php $more_link_text = esc_html__('Read more','mag');
					the_content($more_link_text); ?>
				</div>
			<?php elseif ( $content_type == 'excerpt' && strlen(get_the_excerpt()) > 0) : ?>
				<div itemprop="articleBody" class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
			
			<?php echo $blog_loop_content; ?>

		<?php endif; ?>	
		
		<?php if( ot_get_option('post_image_blog') == 'off')  : ?>
		<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="<?php echo esc_url($image_attr[0]); ?>"><meta itemprop="width" content="<?php echo esc_attr($image_attr[1]); ?>"><meta itemprop="height" content="<?php echo esc_attr($image_attr[2]); ?>"></div>	
		<?php endif; ?>

		<?php if( ot_get_option('post_date_blog') == 'off') : ?>
			<time datetime="<?php echo esc_attr(get_the_date( 'c' )) ?>" itemprop="datePublished"></time><time datetime="<?php echo esc_attr(get_the_modified_date( 'c' )) ?>" itemprop="dateModified"></time>
		<?php endif; ?>
		
		
		<?php if( ot_get_option('post_author_blog') == 'off') : ?>
			<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="<?php echo esc_html(get_the_author()) ?>"></div>
		<?php endif; ?>
		
		<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="<?php echo esc_attr(ot_get_option('logo')) ?>">
			<meta itemprop="width" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_width') )) ?>">
			<meta itemprop="height" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_height') )) ?>">
			</div>
			<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')) ?>">
		</div>	
	</article><!-- #post-<?php the_ID(); ?> -->