<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Mobile Header Sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( is_active_sidebar( 'mobile-header-widget-area' ) ) : ?>
	<div id="mobile-header-sidebar" class="clearfix">
		<?php dynamic_sidebar( 'mobile-header-widget-area' ); ?>
	</div>
<?php endif; ?>	
