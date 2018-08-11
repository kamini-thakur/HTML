<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Top bar sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php if ( ot_get_option('top_bar') == 'on' && get_post_meta( get_the_ID(), 'mnky_top_bar', true ) != 'off' && ( is_active_sidebar( 'top-left-widget-area' ) || is_active_sidebar( 'top-right-widget-area' ) ) ) : ?>
	<div id="top-bar-wrapper" class="clearfix">
		<div id="top-bar" itemscope itemtype="http://schema.org/WPSideBar">
			<?php if ( is_active_sidebar( 'top-left-widget-area' ) ) : ?>
				<div id="topleft-widget-area" class="clearfix">
					<?php dynamic_sidebar( 'top-left-widget-area' ); ?>
				</div>
			<?php endif; ?>	
			
			<?php if ( is_active_sidebar( 'top-right-widget-area' ) ) : ?>
				<div id="topright-widget-area" class="clearfix">
					<?php dynamic_sidebar( 'top-right-widget-area' ); ?>
				</div>
			<?php endif; ?>	
		</div>
	</div>
<?php endif; ?>	
