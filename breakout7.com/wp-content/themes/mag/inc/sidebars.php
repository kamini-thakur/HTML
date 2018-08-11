<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Register sidebars
*	--------------------------------------------------------------------- 
*/

function mnky_sidebars() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'mag' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Appears in blog layout', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Sidebar', 'mag' ),
		'id' => 'single-sidebar',
		'description' => esc_html__( 'Appears in single posts', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'mag' ),
		'id' => 'default-sidebar',
		'description' => esc_html__( 'Appears as default sidebar on pages', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Single Post Header Sidebar', 'mag' ),
		'id' => 'post-header-sidebar',
		'description' => esc_html__( 'Appears in single post header', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar', 'mag' ),
		'id' => 'post-content-sidebar',
		'description' => esc_html__( 'Appears within single post content', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Top', 'mag' ),
		'id' => 'post-content-top-sidebar',
		'description' => esc_html__( 'Appears before single post content', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Bottom', 'mag' ),
		'id' => 'post-content-bottom-sidebar',
		'description' => esc_html__( 'Appears after single post content', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Before Single Post Sidebar', 'mag' ),
		'id' => 'before-single-post-sidebar',
		'description' => esc_html__( 'Appears above single post content and sidebar', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'After Single Post Sidebar', 'mag' ),
		'id' => 'after-single-post-sidebar',
		'description' => esc_html__( 'Appears after single post', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Overlay Sidebar', 'mag' ),
		'id' => 'overlay-sidebar',
		'description' => esc_html__( 'Appears in full-screen overlay', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Side Navigation Sidebar', 'mag' ),
		'id' => 'menu-sidebar',
		'description' => esc_html__( 'Appears in side menu after the navigation', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Left', 'mag' ),
		'id' => 'top-left-widget-area',
		'description' => esc_html__( 'Top bar widget area (align left)', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Right', 'mag' ),
		'id' => 'top-right-widget-area',
		'description' => esc_html__( 'Top bar widget area (align right)', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 1', 'mag' ),
		'id' => 'footer-widget-area-1',
		'description' => esc_html__( 'Appears in the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 2', 'mag' ),
		'id' => 'footer-widget-area-2',
		'description' => esc_html__( 'Appears in the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 3', 'mag' ),
		'id' => 'footer-widget-area-3',
		'description' => esc_html__( 'Appears in the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 4', 'mag' ),
		'id' => 'footer-widget-area-4',
		'description' => esc_html__( 'Appears in the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Second Level Sidebar 1', 'mag' ),
		'id' => 'footer-second-widget-area-1',
		'description' => esc_html__( 'Appears on second row of the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Second Level Sidebar 2', 'mag' ),
		'id' => 'footer-second-widget-area-2',
		'description' => esc_html__( 'Appears on second row of the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Second Level Sidebar 3', 'mag' ),
		'id' => 'footer-second-widget-area-3',
		'description' => esc_html__( 'Appears on second row of the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Second Level Sidebar 4', 'mag' ),
		'id' => 'footer-second-widget-area-4',
		'description' => esc_html__( 'Appears on second row of the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Copyright Area', 'mag' ),
		'id' => 'copyright-widget-area',
		'description' => esc_html__( 'Appears in the footer section', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Header Sidebar', 'mag' ),
		'id' => 'mobile-header-widget-area',
		'description' => esc_html__( 'Mobile header widget area', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Menu Sidebar', 'mag' ),
		'id' => 'mobile-menu-widget-area',
		'description' => esc_html__( 'Mobile menu widget area', 'mag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

}

add_action( 'widgets_init', 'mnky_sidebars' );