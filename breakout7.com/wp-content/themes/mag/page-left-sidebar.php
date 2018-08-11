<?php
/**
 * Template Name: Content / Left Sidebar
 */
?>

<?php get_header(); ?>

		<div id="container" class="clearfix">
		<?php mnky_hook_page_top(); ?>
			<div id="content" class="float-right">
			<?php mnky_hook_page_content_top(); ?>
			
				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >

					<div class="entry-content">
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
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php if ( comments_open() ) {
					comments_template( '', true );
				} ?>
				
			<?php mnky_hook_page_content_bottom(); ?>			
			</div><!-- #content -->

			<div itemscope itemtype="http://schema.org/WPSideBar" id="sidebar" class="float-left">
				<?php get_sidebar(); ?>
			</div>
		<?php mnky_hook_page_bottom(); ?>
		</div><!-- #container -->
		
<?php get_footer(); ?>