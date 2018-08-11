<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: site header
*	--------------------------------------------------------------------- 
*/
?>	


<?php 
	$search_button = ot_get_option('search_button', 'on');
	$cart_widget = ot_get_option('cart_widget', 'on');
	$header_class = '';
	
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			$header_class = 'header-overlay';
		}
	}
	
	if ( ! has_nav_menu( 'primary' ) && ! has_nav_menu( 'secondary' ) && ! has_nav_menu( 'side' ) ) {
		$menu_fallback = 'mnky_no_menu';
	} else {
		$menu_fallback = '';
	}	
?>
	
<header id="mobile-site-header" class="mobile-header">
	<div id="mobile-site-logo">
		<?php get_template_part( 'mobile-logo' ); // Include logo.php ?>
	</div>	
	<?php get_sidebar('mobile-header'); ?>	
	<a href="#mobile-site-navigation" class="toggle-mobile-menu"><i class="fa fa-bars"></i></a>	
</header>	
	
<header id="site-header" class="<?php echo sanitize_html_class($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
	<div id="header-wrapper">
		<div id="header-container" class="clearfix">
			<div id="site-logo">
				<?php get_template_part( 'logo' ); // Include logo.php ?>
			</div>			
			
			<div id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => $menu_fallback, 'items_wrap' => '<nav id="primary-navigation" class="menu-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
				
				<div class="site-links">
					
					<?php if( $search_button != 'off' ) : ?>
						<button class="toggle-header-search search_button" type="button">
							<i class="fa fa-search"></i>
						</button>
					<?php endif; ?>	
					
					<?php if ( is_active_sidebar( 'overlay-sidebar' ) ) : ?>
						<div class="overlay-toggle-wrapper">
							<div class="toggle-overlay-sidebar">
								<span></span>
								<span></span>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if( has_nav_menu( 'side' ) || is_active_sidebar( 'menu-sidebar' ) ) : ?>
						<div class="menu-toggle-wrapper">
							<div class="toggle-main-menu">
							  <span></span>
							  <span></span>
							  <span></span>
							</div>
						</div>
					<?php endif; ?>
					
				</div>
			
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
			</div><!-- #site-navigation -->
											
			<?php if( $search_button != 'off' ) : ?>
				<div class="header-search">
					<?php get_search_form(); ?>
					<div class="toggle-header-search">
						<span></span>
						<span></span>
					</div>
				</div>
			<?php endif; ?>

		</div><!-- #header-container -->
	</div><!-- #header-wrapper -->	
</header><!-- #site-header -->

<?php if( has_nav_menu( 'side' ) || is_active_sidebar( 'menu-sidebar' ) ) : ?>		
	<div id="site-navigation-side">
		<div class="menu-toggle-wrapper">
			<div class="toggle-main-menu open">
				<span></span>
				<span></span>
			</div>
		</div>	
		<?php wp_nav_menu( array( 'theme_location' => 'side', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="side-navigation" class="menu-container" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"><ul id="%1$s" class="%2$s">%3$s</ul></nav>' ) ); ?>
		<?php get_sidebar('menu'); ?>
	</div><!-- #site-navigation -->
<?php endif; ?>