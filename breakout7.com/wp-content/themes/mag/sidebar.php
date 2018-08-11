<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Default Page Sidebar
*	--------------------------------------------------------------------- 
*/
?>

<aside class="page-sidebar" itemscope itemtype="http://schema.org/WPSideBar">
	<div class="widget-area">
		<?php if ( ! dynamic_sidebar( 'default-sidebar' ) ) : ?>
			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php esc_html_e( 'Archives', 'mag' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
			</aside>
		<?php endif; ?>
	</div>
</aside><!-- .page-sidebar -->