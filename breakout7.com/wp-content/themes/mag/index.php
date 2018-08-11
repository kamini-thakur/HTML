<?php get_header(); ?>

		<?php 
			// Layout setting
			$page_layout = ot_get_option('blog_layout', 'right-sidebar' );
			
			if( is_category() ){
				$category_styles = ot_get_option( 'category_styles', array() );
				if( ! empty( $category_styles ) ) {
					foreach( $category_styles as $category_style ) {
						if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
							if( $category_style['cat_layout'] != '' ){
								$page_layout = $category_style['cat_layout'];
							}
						}
					}
				}
			}
		
		?>


		<div id="container">
			<?php if( $page_layout == 'full-width' ) : ?>
		
				<div id="content">
					<div class="archive-container clearfix">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content' );
							endwhile;
						else :
							get_template_part( 'content', 'none' );
						endif;
						?>
						
						<?php if (ot_get_option( 'pagination' ) == 'load-more') :
							wp_enqueue_script( 'mnky_ajax_load_posts' );
							wp_localize_script(
								'mnky_ajax_load_posts',
								'mnky_load_post',
								array(
									'startPage' => max( 1, get_query_var('paged') ),
									'maxPages' => $wp_query->max_num_pages,
									'nextLink' => next_posts($wp_query->max_num_pages, false)
								)
							);		
							?>
							<div id="load-posts"><a><span class="bttn-load"><?php echo esc_html__( 'Load More Articles', 'mag' ); ?></span><span class="bttn-loading"><?php echo esc_html__( 'Loading Articles...', 'mag' ); ?></span><span class="bttn-no-posts"><?php echo esc_html__( 'No More Articles to Load', 'mag' ); ?></span></a></div>
							
						<?php elseif (ot_get_option( 'pagination' ) == 'infinite-scroll') : 
							wp_enqueue_script( 'mnky_ajax_infinite_scroll' );
							wp_localize_script(
								'mnky_ajax_infinite_scroll',
								'mnky_infinite_scroll',
								array(
									'startPage' => max( 1, get_query_var('paged') ),
									'maxPages' => $wp_query->max_num_pages,
									'nextLink' => next_posts($wp_query->max_num_pages, false)
								)
							);		
							?>
							<div id="load-posts"><a><span class="bttn-load"><?php echo esc_html__( 'Load More Articles', 'mag' ); ?></span><span class="bttn-loading"><?php echo esc_html__( 'Loading Articles...', 'mag' ); ?></span><span class="bttn-no-posts"><?php echo esc_html__( 'No More Articles to Load', 'mag' ); ?></span></a></div>
		
						<?php else : ?>
							<div class="pagination">
								<?php mnky_numeric_pagination();?>
							</div>
						<?php endif; ?>
					</div>
					
				</div><!-- #content -->
				
			<?php else : ?>

				<div id="content" class="<?php if( $page_layout == 'right-sidebar' ) { echo 'float-left with-sidebar'; } else { echo 'float-right with-sidebar'; } ?>">
					<div class="archive-container clearfix">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content' );
							endwhile;
						else :
							get_template_part( 'content', 'none' );
						endif;
						?>
						
						<?php if (ot_get_option( 'pagination' ) == 'load-more') :
							wp_enqueue_script( 'mnky_ajax_load_posts' );
							wp_localize_script(
								'mnky_ajax_load_posts',
								'mnky_load_post',
								array(
									'startPage' => max( 1, get_query_var('paged') ),
									'maxPages' => $wp_query->max_num_pages,
									'nextLink' => next_posts($wp_query->max_num_pages, false)
								)
							);		
							?>
							<div id="load-posts"><a><span class="bttn-load"><?php echo esc_html__( 'Load More Articles', 'mag' ); ?></span><span class="bttn-loading"><?php echo esc_html__( 'Loading Articles...', 'mag' ); ?></span><span class="bttn-no-posts"><?php echo esc_html__( 'No More Articles to Load', 'mag' ); ?></span></a></div>
							
						<?php elseif (ot_get_option( 'pagination' ) == 'infinite-scroll') : 
							wp_enqueue_script( 'mnky_ajax_infinite_scroll' );
							wp_localize_script(
								'mnky_ajax_infinite_scroll',
								'mnky_infinite_scroll',
								array(
									'startPage' => max( 1, get_query_var('paged') ),
									'maxPages' => $wp_query->max_num_pages,
									'nextLink' => next_posts($wp_query->max_num_pages, false)
								)
							);		
							?>
							<div id="load-posts"><a><span class="bttn-load"><?php echo esc_html__( 'Load More Articles', 'mag' ); ?></span><span class="bttn-loading"><?php echo esc_html__( 'Loading Articles...', 'mag' ); ?></span><span class="bttn-no-posts"><?php echo esc_html__( 'No More Articles to Load', 'mag' ); ?></span></a></div>
		
						<?php else : ?>
							<div class="pagination">
								<?php mnky_numeric_pagination();?>
							</div>
						<?php endif; ?>
					</div>
					
				</div><!-- #content -->

				<div id="sidebar" class="<?php if( $page_layout == 'right-sidebar' ) { echo 'float-right'; } else { echo 'float-left'; } ?>">
					<?php get_sidebar('blog'); ?>
				</div>
				
			<?php endif; ?>
		</div><!-- #container -->
		
<?php get_footer(); ?>