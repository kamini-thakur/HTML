<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: before content area
*	--------------------------------------------------------------------- 
*/
?>

<?php 	
$content_width = preg_replace('#[^0-9]#','', ot_get_option('content_width', '1200') );
	
// If custom content width or layout
if( is_page() || is_single() ){
	if( get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) ){
		$content_width = preg_replace('#[^0-9]#','', get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) );
	}			
}
		
if ( is_page() ) :  // Page  ?>
	
	<?php if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) : ?>
	
		<?php
		$style = '';
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_height', true ) ) {
			$style .= 'height:'. esc_attr(get_post_meta( get_the_ID(), 'mnky_pre_content_height', true )) .';';
		}
		
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) { 
			$style .='max-width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) .';'; 
		} else {
			$style .= 'max-width:'. esc_attr($content_width) .'px;';
		} 
		?>

		<div class="pre-content">	
				<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post (get_post_meta( get_the_ID(), 'mnky_pre_content_html', true ) ) ); ?></div>		
		</div><!-- .pre-content -->
		
	<?php endif; ?>
	
<?php elseif ( is_single() ) :  // Single post ?>

	<?php 
		$post_header_style = ot_get_option('post_header_style_opt', 'style_default');
		if( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) && get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) != 'opt_default') {
			$post_header_style = get_post_meta( get_the_ID(), 'mnky_post_header_style', true );
		}
	?>

	<?php if( $post_header_style != 'style_default' || get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) : ?>
		<?php 
			$style = '';
			if ( has_post_thumbnail() && $post_header_style != 'style_default' && ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) != 'on' || get_post_meta( get_the_ID(), 'mnky_pre_content_bg', true) == '' ) ) {	
				$img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$style = 'background-image:url('. esc_attr($img_url) .'); background-size:cover; background-repeat:no-repeat; background-position:center;'; 
			}
			
			$inner_style = '';
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' && get_post_meta( get_the_ID(), 'mnky_pre_content_height', true ) ) {
				$inner_style .= 'height:'. esc_attr(get_post_meta( get_the_ID(), 'mnky_pre_content_height', true )) .';'; } 
			else { 
				$inner_style .= 'height:450px;'; 
			}
			
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) { 
				$inner_style .='max-width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) .';position:relative'; 
			} else {
				$inner_style .= 'max-width:'. esc_attr($content_width) .'px;position:relative';
			}
			$caption_style = '';
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) { 
				$caption_style .='max-width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) .''; 
			} else {
				$caption_style .= 'max-width:'. esc_attr($content_width) .'px';
			}
		?>

		<div class="pre-content" style="<?php echo esc_attr($style); ?>">
			<?php if (get_post_meta( get_the_ID(), 'mnky_single_post_header', true ) != 'off' && $post_header_style == 'style_2' ) : ?>
				<div class="pre-content-html" style="<?php echo esc_attr($inner_style); ?>">
					<div class="entry-header-overlay clearfix">
						<?php mnky_label(); ?>	
						<?php if ( ot_get_option('post_category') != 'off' ) : ?>
						<h5 class="entry-category"><?php the_category( ', ' ); ?></h5>
						<?php endif; ?>
						<h1 class="entry-title"><span><?php the_title(); ?></span><?php mnky_post_interaction_meta(); ?></h1>
					</div><!-- .entry-header -->
				</div>
			<?php endif; ?>
		
			<?php if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' && $post_header_style != 'style_2' || get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' && $post_header_style == 'style_2' && get_post_meta( get_the_ID(), 'mnky_single_post_header', true ) == 'off' || $post_header_style == 'style_1' ) : ?>
				<div class="pre-content-html" style="<?php echo esc_attr($inner_style); ?>"><?php echo do_shortcode( wp_kses_post( get_post_meta( get_the_ID(), 'mnky_pre_content_html', true ) ) ); ?></div>
			<?php endif; ?>
		</div>
		
		<?php if( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true) != '' && has_post_thumbnail() &&  $post_header_style != 'style_default' && get_post_meta( get_the_ID(), 'mnky_content_featured_img', true) == 'off') {
			echo '<div class="mnky-featured-image-caption-header clearfix" style="'. esc_attr($caption_style) .'">'. wp_kses_post( get_post_meta( get_the_ID(), 'mnky_featured_image_caption_text', true ) ) .'</div>';
		} ?>
		
	<?php endif; ?>
	
<?php elseif ( is_category() ) : // If is category 
	
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) :
		foreach( $category_styles as $category_style ) :
			if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ) :
			
				if ( $category_style['cat_pre_content_area'] == 'on' ) : ?>
				
					<?php
					$style = '';
					if ( $category_style['cat_pre_content_height'] != '' ) {
						$style .= 'height:'. esc_attr($category_style['cat_pre_content_height']) .';';
					}
					
					if ( $category_style['cat_pre_content_width'] != '' ) { 
						$style .='max-width:'. esc_attr($category_style['cat_pre_content_height']) .';'; 
					} else {
						$style .= 'max-width:'. esc_attr($content_width) .'px;';
					} 
					?>
					
					<div class="pre-content">						
							<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post( $category_style['cat_pre_content_html'] ) ); ?></div>							
					</div><!-- .pre-content -->
				<?php 
				endif;
			endif;
		endforeach;
	endif;
	
elseif ( is_home() ) : // If is blog ?>
	
	<?php if ( ot_get_option('blog_pre_content_area') == 'on' ) : ?>
	
		<?php
		$style = '';
		if ( ot_get_option('blog_pre_content_height') != '' ) {
			$style .= 'height:'. esc_attr(ot_get_option('blog_pre_content_height')) .';';
		}
					
		if ( ot_get_option('blog_pre_content_width') != '' ) { 
			$style .='max-width:'. esc_attr(ot_get_option('blog_pre_content_width')) .';'; 
		} else {
			$style .= 'max-width:'. esc_attr($content_width) .'px;';
		} 
		?>	
		
		<div class="pre-content">
				<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post ( ot_get_option('blog_pre_content_html') ) ); ?></div>
		</div><!-- .pre-content -->
	<?php endif; ?>
					
<?php endif; ?>
