<?php
/**
 * The template for displaying single posts
 *
 */
?>

	<article itemtype="http://schema.org/Article" itemscope="" id="post-<?php the_ID(); ?>" <?php post_class('single-layout clearfix'); ?> >
	
	<link itemprop="mainEntityOfPage" href="<?php the_permalink(); ?>" />
		<?php if ( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) != 'style_2' && !( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) == 'opt_default' && ot_get_option('post_header_style_opt') == 'style_2') ) : ?>
			<header class="entry-header clearfix">
				<?php if (get_post_meta( get_the_ID(), 'mnky_single_post_header', true ) != 'off' ) : ?>
					<?php mnky_label(); ?>	
					<?php if ( ot_get_option('post_category') != 'off' ) : ?>
						<h5 class="entry-category"><?php the_category( ', ' ); ?></h5>
					<?php endif; ?>
					<h1 class="entry-title"><span itemprop="headline"><?php the_title(); ?></span><?php mnky_post_interaction_meta(); ?></h1>
				<?php endif; ?>
				<?php mnky_post_meta(); ?>
				<?php get_sidebar('post-header'); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>
		
		<?php // Overlay title style ?>
		<?php if ( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) == 'style_2' || ( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) == 'opt_default' && ot_get_option('post_header_style_opt') == 'style_2') ) : ?>
			<header class="entry-header clearfix">
				<?php mnky_post_meta(); ?>
				<?php get_sidebar('post-header'); ?>					
			</header><!-- .entry-header -->
		<?php endif; ?>
		
		<div class="entry-content-wrapper clearfix">
			<?php 
			
			if( get_post_meta( get_the_ID(), 'mnky_post_lead_content', true) != '' ) {
				echo '<div class="post_lead_content clearfix">'. do_shortcode( wp_kses_post( get_post_meta( get_the_ID(), 'mnky_post_lead_content', true ) ) ) .'</div>';
			} 
			
			if ( get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
				echo '<div class="post-preview clearfix">', the_post_thumbnail('large') .''; 
			} 
			
			if( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true) != '' && get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
				echo '<div class="mnky-featured-image-caption clearfix">'. wp_kses_post( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true ) ) .'</div>';
			} 
			
			if ( get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
				echo '</div>'; 
			} 
			
			if ( get_post_meta( get_the_ID(), 'mnky_review_position', true ) == 'top' ) { 
				get_template_part( 'review' ); 
			} 
			
			get_sidebar('post-content-top'); 
			
			if( get_post_meta( get_the_ID(), 'mnky_top_post_advertisement', true) != '' ) {
				echo '<div class="article-top-advertisement">'. do_shortcode( '[mnky_ads id="'. esc_html(get_post_meta( get_the_ID(), 'mnky_top_post_advertisement', true)) .'"]' ) . '</div>';
			} 
			
			
			$post_content_sidebar = '';
			$post_content_sidebar = ot_get_option('post_content_sidebar');
			if( is_single() ){
				if( get_post_meta( get_the_ID(), 'mnky_post_content_sidebar', true) ){
					$post_content_sidebar = get_post_meta( get_the_ID(), 'mnky_post_content_sidebar', true); 
				}	
			}
			if ($post_content_sidebar == 'on') : ?>
				<div class="entry-content-inner">
					<div itemprop="articleBody" class="entry-content with-sidebar float-left clearfix">
						<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<nav class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'mag' ) . '</span>',
							'after'       => '</nav>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
					</div><!-- .entry-content -->
					<aside class="entry-content-sidebar float-right clearfix<?php if ( ot_get_option('sticky_sidebar') != 'off') : ?> sticky-container<?php endif; ?>">
						<?php get_sidebar('post-content'); ?>
					</aside><!-- .entry-content-sidebar -->
				</div>
			<?php else : ?>
				<div itemprop="articleBody" class="entry-content clearfix">
					<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<nav class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'mag' ) . '</span>',
						'after'       => '</nav>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>
		</div><!-- .entry-content wrapper -->
		
		<?php if ( get_post_meta( get_the_ID(), 'mnky_review_position', true ) == 'bottom' ) {
			get_template_part( 'review' );	
		} ?>
		
		<?php if( get_post_meta( get_the_ID(), 'mnky_bottom_post_advertisement', true) != '' ) {
			echo '<div class="article-bottom-advertisement">'. do_shortcode( '[mnky_ads id="'. esc_html(get_post_meta( get_the_ID(), 'mnky_bottom_post_advertisement', true)) .'"]' ) . '</div>';
		} ?>
		
		<?php get_sidebar('post-content-bottom'); ?>
		<?php mnky_post_meta_footer(); ?>		
		<?php mnky_post_links(); ?>
	
		<?php if (get_post_meta( get_the_ID(), 'mnky_single_post_header', true ) == 'off' || get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) == 'style_2' || (get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) == 'opt_default' && ot_get_option('post_header_style_opt') == 'style_2')) : ?>
		<meta itemprop="headline " content="<?php the_title(); ?>">
		<?php endif; ?>
	
		<?php if( ot_get_option('post_date') == 'off') : ?>
			<time datetime="<?php echo esc_attr(get_the_date( 'c' )) ?>" itemprop="datePublished"></time><time datetime="<?php echo esc_attr(get_the_modified_date( 'c' )) ?>" itemprop="dateModified"></time>
		<?php endif; ?>
		
		<?php if( ot_get_option('post_author') == 'off') : ?>
			<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="<?php echo esc_html(get_the_author()) ?>"></div>
		<?php endif; ?>
		
		<?php if ( has_post_thumbnail() ) :
			$thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			?>
			<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="<?php echo esc_url($thumb_url_array[0]) ?>">
				<meta itemprop="width" content="<?php echo esc_html($thumb_url_array[1]) ?>">
				<meta itemprop="height" content="<?php echo esc_html($thumb_url_array[2]) ?>">
			</div>
		<?php elseif( ot_get_option('default_post_image') ) :
			$thumb_url_array = wp_get_attachment_image_src( ot_get_option('default_post_image'), 'full' );
			?>
			<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="<?php echo esc_url($thumb_url_array[0]) ?>">
				<meta itemprop="width" content="<?php echo esc_html($thumb_url_array[1]) ?>">
				<meta itemprop="height" content="<?php echo esc_html($thumb_url_array[2]) ?>">
			</div>
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
	
	<?php if ( get_the_author_meta( 'description' ) && ot_get_option('author_description') != 'off' ) : ?>
		<div class="author vcard clearfix">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 100); ?>
			<div class="fn">
				<?php echo '<a class="url" href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) .'" title="'. esc_attr(sprintf( __( 'View all posts by %s', 'mag' ), get_the_author() )) .'" rel="author">'. get_the_author() .'</a>'; ?>
			</div><!-- .fn -->	
			<div class="author-info description note">
				<?php the_author_meta( 'description' ); ?>
			</div><!-- .author-info .description .note -->
		</div><!-- .author .vcard-->
	<?php endif; ?>				

	<?php get_sidebar('after-post'); ?>
	
	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

	
	<?php if( ot_get_option('keep_reading') == 'on' ) : ?>
		
		<div class="keep-reading-wrapper">	
			
			<?php 
			wp_enqueue_script( 'mnky_keep_reading' );
			
			$id = get_the_ID();
			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => ot_get_option('keep_reading_post_count', '1'),
				'order' => ot_get_option('keep_reading_order', 'DESC'),
				'orderby' => ot_get_option('keep_reading_order_by', 'date'),
				'offset' => ot_get_option('keep_reading_offset', '0'),
				'post__not_in'=> array( $id ),
				'no_found_rows' => true
			);
			
			// Get post categories
			$categories = wp_get_post_categories( $id );
			
			// Get post tags
			$tags = wp_get_post_tags( $id, array( 'fields' => 'ids' ) );
			
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
			
			if ( ! empty( $tags ) && ot_get_option('keep_reading_no_tags') != 'no_tags') {
				$tax_args['tax_query']['relation'] = ot_get_option('keep_reading_tax_relation', 'OR');
				$tax_2 = array(
					'taxonomy' => 'post_tag',
					'field' => 'term_id',
					'terms' => $tags,
					'operator' => 'IN'
				);
				array_push($tax_args['tax_query'], $tax_2);
			}

			$args = array_merge( $args, $tax_args );
				
			
			// Start loop	
			$query = new WP_Query( $args );

			if ( $query -> have_posts() ) :
			
				while ( $query -> have_posts() ) : $query -> the_post(); 
				
				global $more; 
				$more = -1;
				?>
				
				<article itemtype="http://schema.org/Article" itemscope="" <?php post_class('single-layout keep-reading-post single-related clearfix'); ?> >
				
					<header class="entry-header clearfix">
					<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php esc_url( the_permalink() ) ?>" title="<?php echo sprintf( esc_attr__( 'View %s', 'mag' ), the_title_attribute( 'echo=0' ) ) ?>" rel="bookmark"><span itemprop="headline"><?php the_title(); ?></span></a><?php mnky_post_interaction_meta(); ?></h2>
					<?php mnky_post_meta(); ?>
					</header><!-- .entry-header -->
					
					<?php 
					if( get_post_meta( get_the_ID(), 'mnky_post_lead_content', true) != '' ) {
						echo '<div class="post_lead_content clearfix">'. do_shortcode( wp_kses_post( get_post_meta( get_the_ID(), 'mnky_post_lead_content', true ) ) ) .'</div>';
					} 
					
					if ( get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
						echo '<div class="post-preview clearfix">', the_post_thumbnail('large') .''; 
					} 
					
					if( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true) != '' && get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
						echo '<div class="mnky-featured-image-caption clearfix">'. wp_kses_post( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true ) ) .'</div>';
					} 
					
					if ( get_post_meta( get_the_ID(), 'mnky_content_featured_img', true ) != 'off' && has_post_thumbnail() ) {
						echo '</div>'; 
					} 
					
					if ( get_post_meta( get_the_ID(), 'mnky_review_position', true ) == 'top' ) { 
						get_template_part( 'review' ); 
					} 
					
					if( get_post_meta( get_the_ID(), 'mnky_top_post_advertisement', true) != '' ) {
						echo '<div class="article-top-advertisement">'. do_shortcode( '[mnky_ads id="'. esc_html(get_post_meta( get_the_ID(), 'mnky_top_post_advertisement', true)) .'"]' ) . '</div>';
					} 
					?>
					
					<div itemprop="articleBody" class="entry-content clearfix">
						<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<nav class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'mag' ) . '</span>',
							'after'       => '</nav>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
					</div>	
					
					<?php if ( get_post_meta( get_the_ID(), 'mnky_review_position', true ) == 'bottom' ) {
						get_template_part( 'review' );	
					} ?>
					
					<?php if( get_post_meta( get_the_ID(), 'mnky_bottom_post_advertisement', true) != '' ) {
						echo '<div class="article-bottom-advertisement">'. do_shortcode( '[mnky_ads id="'. esc_html(get_post_meta( get_the_ID(), 'mnky_bottom_post_advertisement', true)) .'"]' ) . '</div>';
					} ?>

					<?php if( ot_get_option('post_date') == 'off' ) : ?>
						<time datetime="<?php echo esc_attr(get_the_date( 'c' )) ?>" itemprop="datePublished"></time><time datetime="<?php echo esc_attr(get_the_modified_date( 'c' )) ?>" itemprop="dateModified"></time>
					<?php endif; ?>
					
					<?php if( ot_get_option('post_author') == 'off' ) : ?>
						<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="<?php echo esc_html(get_the_author()) ?>"></div>
					<?php endif; ?>
					
					<?php if ( has_post_thumbnail() ) :
						$thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						?>
						<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php echo esc_url($thumb_url_array[0]) ?>">
							<meta itemprop="width" content="<?php echo esc_html($thumb_url_array[1]) ?>">
							<meta itemprop="height" content="<?php echo esc_html($thumb_url_array[2]) ?>">
						</div>
					<?php elseif( ot_get_option('default_post_image') ) :
						$thumb_url_array = wp_get_attachment_image_src( ot_get_option('default_post_image'), 'full' );
						?>
						<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php echo esc_url($thumb_url_array[0]) ?>">
							<meta itemprop="width" content="<?php echo esc_html($thumb_url_array[1]) ?>">
							<meta itemprop="height" content="<?php echo esc_html($thumb_url_array[2]) ?>">
						</div>
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
				
				<?php endwhile; ?>			
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>