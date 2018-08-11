<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Post Content Sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'post-content-sidebar' ) ) : ?>
	<aside id="post-content-sidebar" class="clearfix">
		<div class="post-widget-area">
			<?php dynamic_sidebar( 'post-content-sidebar' ); ?>
		</div>
	</aside>
<?php endif; ?>	
