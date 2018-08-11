<?php
/*	
*	---------------------------------------------------------------------
*	MNKY After single post sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'after-single-post-sidebar' ) ) : ?>
	<aside id="after-post-sidebar" class="clearfix">
		<div class="after-post-widget-area">
			<?php dynamic_sidebar( 'after-single-post-sidebar' ); ?>
		</div>
	</aside>
<?php endif; ?>	