<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Menu Sidebar
*	--------------------------------------------------------------------- 
*/
?>
	
<?php if ( is_active_sidebar( 'menu-sidebar' ) ) : ?>
	<div id="menu-sidebar">
		<?php dynamic_sidebar( 'menu-sidebar' ); ?>
	</div>
<?php endif; ?>	