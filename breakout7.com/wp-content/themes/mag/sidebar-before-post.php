<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Before single post sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'before-single-post-sidebar' ) ) : ?>
	<aside id="before-post-sidebar" class="clearfix">
		<div class="before-post-widget-area">
			<?php dynamic_sidebar( 'before-single-post-sidebar' ); ?>
		</div>
	</aside>
<?php endif; ?>	