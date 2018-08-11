<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Post Header Sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'post-header-sidebar' ) ) : ?>
	<aside id="post-header-sidebar" class="clearfix">
		<div class="post-header-widget-area">
			<?php dynamic_sidebar( 'post-header-sidebar' ); ?>
		</div>
	</aside>
<?php endif; ?>	