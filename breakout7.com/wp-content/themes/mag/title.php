<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: page title
*	--------------------------------------------------------------------- 
*/
?>

<?php 
if ( is_page() ) :  // Page header options  ?>

	<?php if ( get_post_meta( get_the_ID(), 'mnky_page_title', true ) != 'off' ) : ?>
		<header class="page-header clearfix">
			<div class="page-header-inner">
				<h1><?php the_title(); ?></h1>
				<?php if(function_exists('bcn_display')) {
				echo '<div class="mnky_breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
					bcn_display();
				echo '</div>';
				}?>
			</div>
		</header><!-- .page-header -->
	<?php endif; ?>
	
<?php elseif ( is_single() ) : // If is post ?>
<?php else : // If not page ?>
	
	<?php if ( is_home() ) : // If is blog ?>		
		<?php if( ot_get_option('blog_title', 'on') == 'on' ) : ?>
			<header class="page-header clearfix">
				<div class="page-header-inner">			
					<h1>
						<?php if ( is_front_page() ) {
							echo esc_html__( 'Blog', 'mag');
						} else {
						single_post_title();
						} ?>
					</h1>	
				</div>	
			</header><!-- .page-header -->
		<?php endif; ?>
					
	<?php elseif ( class_exists( 'Woocommerce' ) && is_woocommerce() ) : // If is WooComerce product page ?>	
		
		<?php if( is_shop() ) : ?>
			<header class="page-header clearfix">
				<div class="page-header-inner">	
					<h1><?php echo woocommerce_page_title(); ?>	</h1>		
					<?php if(function_exists('bcn_display')) {
					echo '<div class="mnky_breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
						bcn_display();
					echo '</div>';
					}?>
				</div>	
			</header><!-- .page-header -->
		<?php endif; ?>
												
	<?php elseif ( is_category()  ) : // If is category ?>
		
		<?php 
		$category_title = 'on';
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){					
					if( $category_style['category_title'] == 'off' ) {
						$category_title = 'off';
					}
				}
			} 
		} 
		?>

		<?php if( $category_title != 'off' ) : ?>
			<header class="page-header clearfix">
				<div class="page-header-inner">	
					<h1>
						<?php if ( is_category() || is_tax() ) : // Category title
							echo single_cat_title( '', false );
						endif; ?>				
					</h1>
					<?php if(function_exists('bcn_display')) {
					echo '<div class="mnky_breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
						bcn_display();
					echo '</div>';
					}?>				
					<?php if ( is_category() ) : // Category description
						the_archive_description();				
					endif; ?>
				</div>	
			</header><!-- .page-header -->
		<?php endif; ?>
	
	<?php else : // Taxonomies ?>	
	
		<header class="page-header clearfix">
			<div class="page-header-inner">	
				<h1>
					<?php if ( is_front_page() ) : // Home title
						echo esc_html__( 'Blog', 'mag');
							
					elseif ( is_search() ) : // Search title
						printf( esc_html__( 'Search Results for: %s', 'mag' ), '<span>' . get_search_query() . '</span>' );
							
					elseif ( is_404() ) :
						echo esc_html__( '404', 'mag');
													
					elseif ( is_tax() ) : // Taxanomy title
						echo single_cat_title( '', false );
							
					elseif ( is_tag() ) : // Tag title
						echo single_tag_title( '', false );
					
					elseif ( is_author() ) : // Author page title
						echo get_the_author();		
							
					elseif ( is_archive() ) : // Archive title
						if ( is_day() ) :
							the_date();
						elseif ( is_month() ) :
							single_month_title(' '); 
						elseif ( is_year() ) :
							the_time( 'Y' );					
						else :
							the_archive_title();
						endif; 
					endif; ?>				
				</h1>	
				<?php if(function_exists('bcn_display')) {
				echo '<div class="mnky_breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
					bcn_display();
				echo '</div>';
				}?>			
				<?php if ( is_tag() ) : // Tag description
					the_archive_description();						
				endif; ?>
			</div>	
		</header><!-- .page-header -->
	<?php endif; ?>
<?php endif; ?>