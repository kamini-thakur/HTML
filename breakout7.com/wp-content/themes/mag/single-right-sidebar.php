<?php
/*
Single Post Template: Right Sidebar
*/
?>
<?php get_header(); ?>
<?php if ( ! function_exists( 'mnky_ajax_enqueue_scripts' ) && function_exists( 'mnky_getPostViews' ) ) { mnky_setPostViews( get_the_ID() );} ?>
<?php get_sidebar('before-post'); ?>

	<div id="container" class="clearfix">
	<?php mnky_hook_post_top(); ?>
		<div id="content" class="float-left">
		<?php mnky_hook_post_content_top(); ?>
				
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
						
			<?php endwhile; ?>

		<?php mnky_hook_post_content_bottom(); ?>			
		</div><!-- #content -->
				
		<div itemscope itemtype="http://schema.org/WPSideBar" id="sidebar" class="float-right">
			<?php get_sidebar('single'); ?>
		</div>		
		
	<?php mnky_hook_post_bottom(); ?>
	</div><!-- #container -->

<?php get_footer(); ?>