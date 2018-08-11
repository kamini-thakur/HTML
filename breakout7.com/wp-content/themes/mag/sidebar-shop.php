<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Default page sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'shop-widget-area' ) ) : ?>
	<div class="page-sidebar">
		<div class="widget-area">
			<?php dynamic_sidebar( 'shop-widget-area' ); ?>
		</div>
	</div><!-- .page-sidebar -->
<?php endif; ?>	
		