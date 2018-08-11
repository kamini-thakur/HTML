<?php
function mnky_custom_css() {
	
/*	
*	---------------------------------------------------------------------
*	General
*	--------------------------------------------------------------------- 
*/
	
	$custom_css = '';
	
	// Define theme accent colors
	$accent_color = ot_get_option('accent_color', '#ffda23');
	$accent_contrast_color = ot_get_option('accent_contrast_color', '#1b1b1b');
	
	// If different post/page custom color 
	if( is_page() || is_single() ){
		if( get_post_meta( get_the_ID(), 'mnky_custom_accent_color', true) ){
			$accent_color = get_post_meta( get_the_ID(), 'mnky_custom_accent_color', true);
		}
		if( get_post_meta( get_the_ID(), 'mnky_custom_accent_contrast_color', true) ){
			$accent_contrast_color = get_post_meta( get_the_ID(), 'mnky_custom_accent_contrast_color', true);
		}
	}	
	
	// Accent color (background-color)
	$custom_css .= '
		input[type=\'submit\'],input[type=button], button, blockquote p:before, #site-navigation ul li.menu-button-full a, #header-container .menu-toggle-wrapper:hover span, .toggle-overlay-sidebar:hover span, .toggle-overlay-sidebar:hover span:after, .toggle-overlay-sidebar:hover span:before, .overlay-sidebar-close:hover span, .header-search .toggle-header-search:hover span, #wp-calendar #today, .widget-area .widget .tagcloud a, .article-labels span, .archive-layout .post-format-badge i, .archive-layout:not(.archive-style-2) .more-link, .rating-bar-value, .tag-links span a, .mnky-post-links .previous-post-title,.mnky-post-links .next-post-title, .page-links span, .pagination .current, .scrollToTop, .mnky_button a, .mnky_heading_wrapper h1,.mnky_heading_wrapper h2,.mnky_heading_wrapper h3,.mnky_heading_wrapper h4,.mnky_heading_wrapper h5, .mnky_heading_wrapper h6, .mp-post-format i, .mp-post-nr, #load-posts a, .ajax-load-posts .mp-load-posts a, .ajax-infinite-scroll .mp-load-posts a, .ajax-post-carousel .mp-load-posts a, .mnky-posts-grid .mpg-title, .mnt-title, .mnky-posts-slider .flex-direction-nav a {background-color:'. $accent_color .';}
	';
		
	// Accent color (color)
	$custom_css .= '
		#comments span.required, #comments p.comment-notes:before, p.logged-in-as:before, p.must-log-in:before, .sticky .post-preview:after, .format-chat p:nth-child(odd):before, .page-sidebar a:hover, #site-navigation ul li a:hover, #site-navigation ul li.current-menu-item > a, #site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, #site-navigation .mnky-menu-posts .menu-post-container:hover h6, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li.nav-active a, .site-links .search_button:hover, .menu-toggle-wrapper:hover, #site-navigation-side a:hover, #site-navigation-side .menu-container ul li a:hover, #site-navigation-side .toggle-main-menu:hover span, .meta-views, .rating-stars, .archive-style-2 .post-content-wrapper a:hover, .archive-style-2 .post-content-wrapper .entry-content a:hover, .archive-style-2 .post-content-wrapper .mp-rating-stars span, .mp-views, .mp-rating-stars, .mp-layout-5 .mp-content-container a:hover, .mp-widget.mp-layout-5 .mp-container .mp-content-container a:hover, .mnky-posts-grid .mpg-category a, .mnky_category figcaption span, .mnky_category_link:hover figcaption span, .mnky_custom-list-item i, .mnky_service-box .service_icon i, .vc_toggle_default .vc_toggle_title .vc_toggle_icon:after, .separator_w_icon i {color:'. $accent_color .';}		
	';
	
	// Accent color (misc)
	$custom_css .= '
		.mnky_heading_wrapper h6, .mnky-posts-grid .mpg-title {box-shadow: 10px 0 0 '. $accent_color .', -10px 0 0 '. $accent_color .';}
	';
	
	
	// Accent contrast color (color)
	$custom_css .= '
		.archive-layout .post-format-badge i, .tag-links span a, .widget-area .widget .tagcloud a, .mnky-post-links .previous-post-title,.mnky-post-links .next-post-title, .page-links span, .pagination .current, .scrollToTop i, .mnky_button a, .mnky_heading_wrapper h1, .mnky_heading_wrapper h2, .mnky_heading_wrapper h3, .mnky_heading_wrapper h4, .mnky_heading_wrapper h5, .mnky_heading_wrapper h6, .mp-post-format i, .mp-post-nr, .ajax-post-carousel  .mp-load-posts i, .ajax-load-posts .mp-load-posts a, .ajax-infinite-scroll .mp-load-posts a, .mnky-posts-grid .mpg-title, .mnky-posts-grid .mpg-title a, .mnky-posts-grid .mp-views, .mnt-title, .mnky-posts-slider .flex-direction-nav a {color:'. $accent_contrast_color .';}		
	';
	
	// Accent contrast color (background-color)
	$custom_css .= '
		.mnky_category figcaption span, .mnky-posts-grid .mpg-category a  {background-color:'. $accent_contrast_color .';}		
	';
	
	
	// Accent color (border-color)
	$custom_css .= '
		input:focus, textarea:focus, .rating-bar-value:after, #sidebar .widget.widget_nav_menu ul li.current-menu-item a, #sidebar.float-right .widget.widget_nav_menu ul li.current-menu-item a {border-color:'. $accent_color .';}
		.mp-container .mp-comment:after {border-left-color:'. $accent_color .'; border-top-color:'. $accent_color .';}	
		.mp-ajax-loader{border-top-color:'. $accent_color .';}
	';
	
	if ( is_rtl() ) {
		$custom_css .= '.mp-container .mp-comment:after {border-left-color:transparent; border-right-color:'. $accent_color .';}';
	}
	

	// Layout & Content width	
	$content_width = preg_replace('#[^0-9]#','', ot_get_option('content_width', '1200') );
	$layout_style = ot_get_option('layout_style');
	
		// If custom content width or layout
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) ){
				$content_width = preg_replace('#[^0-9]#','', get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) );
			}			
			
			if( get_post_meta( get_the_ID(), 'mnky_custom_layout_style', true) ){
				$layout_style = get_post_meta( get_the_ID(), 'mnky_custom_layout_style', true);
			}
		}	  
		
		// Website width
		$custom_css .= '#main, #site-header #header-container, #overlay-sidebar-inner, #top-bar, #mobile-site-header, #container, .inner, .page-header-inner, .header-search, .header-search .search-input {max-width:'. $content_width  .'px; }';	
		
		$custom_css .= '.mps-content-container {width:'. ($content_width+60).'px; }';	
		
		$custom_css .= '#site-navigation ul li.megamenu > ul{max-width:'. $content_width .'px; left: calc(50% - '. $content_width/2 .'px);}';
		
		$custom_css .= '@media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{left:0;}}';
		
		$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){.searchform-wrapper {padding:0 30px;} .header-search .toggle-header-search {right:30px;}}';
		
		if( ot_get_option('header_width') == 'on' ){  
			$custom_css .= '#site-header #header-container, #top-bar, .header-search, .header-search .search-input {max-width:none;} .header-search{box-sizing:border-box;}';
			$custom_css .= '.header-search .searchform-wrapper {padding:0 30px;} .header-search .toggle-header-search {right:30px;}';
			$custom_css .= '#site-navigation ul li.megamenu > ul {left:30px; max-width:calc(100% - 60px);} @media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{max-width:none;}}';
		}
		
		if ( is_rtl() ) {
			$custom_css .= '#site-navigation ul li.megamenu > ul {left:auto; right: calc(50% - '. $content_width/2 .'px);}';
			$custom_css .= '@media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{left:auto; right:0;}}';
			$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){#header-container .header-search .toggle-header-search {left:30px; right:auto;}}';
			if( ot_get_option('header_width') == 'on' ){  
				$custom_css .= '#header-container .header-search .toggle-header-search {left:30px; right:auto;}';
				$custom_css .= '#site-navigation ul li.megamenu > ul {left:auto; right:30px;}';
			}
		}
		
		// Boxed layout width
		if( $layout_style == 'boxed' ){
			$custom_css .= '#wrapper{background:none;}';
			$custom_css .= '#main {box-sizing: border-box;}';
			$custom_css .= '.single-post .mnky-featured-image-caption-header {box-sizing: border-box;}';
			$custom_css .= '.pre-content {max-width:'. $content_width  .'px; }';	
		}		

		
/*	
*	-------------------------------------------------------------------------------------------------
*	Typography
*	-------------------------------------------------------------------------------------------------
*/	

	// Body typo
	$body_typo_array = ot_get_option('body_font');
	if ( ! empty( $body_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$body_typo_array['font-family']]['family'] ) ) {
			$body_typo = 'font-family: "' . $ot_google_fonts[$body_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$body_typo = 'font-family: "' . $body_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $body_typo_array['font-weight'] ) ) { $body_typo .= 'font-weight:'. $body_typo_array['font-weight'] .';'; }
		if( ! empty( $body_typo_array['line-height'] ) ) { $body_typo .= 'line-height:'. $body_typo_array['line-height'] .';'; }
		if( ! empty( $body_typo_array['letter-spacing'] ) ) { $body_typo .= 'letter-spacing:'. $body_typo_array['letter-spacing'] .';'; }
		if( ! empty( $body_typo_array['text-transform'] ) ) { $body_typo .= 'text-transform:'. $body_typo_array['text-transform'] .';'; }

		$custom_css .= 'body, select, textarea, input, button{'.$body_typo.'}';
	}

	$custom_css .= 'body{color:'. ot_get_option('body_text_color', '#333333') .'; font-size:'. ot_get_option('body_size').'}';

	(ot_get_option('body_text_color') != '') ? $custom_css .= 'a, #content h4.wpb_toggle, .entry-meta-blog .meta-author, .entry-header .entry-meta, .entry-header .entry-meta a, .pagination a, .page-links a, #comments .comment-meta a, #comments .comment-reply-link, #comments h3.comment-reply-title #cancel-comment-reply-link, #comments .comment-navigation a, .mp-author a, .mp-widget .mp-container,.mp-widget .mp-container a, .mp-widget .mp-container a:hover {color:'. ot_get_option('body_text_color', '#333333') .';}' : '';
	
	
	// Menu typo
	$menu_typo_array = ot_get_option('menu_font');
	if ( ! empty( $menu_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$menu_typo_array['font-family']]['family'] ) ) {
			$menu_typo = 'font-family: "' . $ot_google_fonts[$menu_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$menu_typo = 'font-family: "' . $menu_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $menu_typo_array['font-weight'] ) ) { $menu_typo .= 'font-weight:'. $menu_typo_array['font-weight'] .';'; }
		if( ! empty( $menu_typo_array['letter-spacing'] ) ) { $menu_typo .= 'letter-spacing:'. $menu_typo_array['letter-spacing'] .';'; }
		if( ! empty( $menu_typo_array['text-transform'] ) ) { $menu_typo .= 'text-transform:'. $menu_typo_array['text-transform'] .';'; }

		$custom_css .= '#site-navigation, #site-navigation ul li a, #site-navigation-side .menu-container ul li a, #site-navigation .mnky-menu-posts h6 {'.$menu_typo.'}';
	}	
	
	// Side menu typo
	$side_menu_typo_array = ot_get_option('side_menu_font');
	if ( ! empty( $side_menu_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$side_menu_typo_array['font-family']]['family'] ) ) {
			$side_menu_typo = 'font-family: "' . $ot_google_fonts[$side_menu_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$side_menu_typo = 'font-family: "' . $side_menu_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $side_menu_typo_array['font-weight'] ) ) { $side_menu_typo .= 'font-weight:'. $side_menu_typo_array['font-weight'] .';'; }
		if( ! empty( $side_menu_typo_array['line-height'] ) ) { $side_menu_typo .= 'line-height:'. $side_menu_typo_array['line-height'] .';'; }
		if( ! empty( $side_menu_typo_array['letter-spacing'] ) ) { $side_menu_typo .= 'letter-spacing:'. $side_menu_typo_array['letter-spacing'] .';'; }
		if( ! empty( $side_menu_typo_array['text-transform'] ) ) { $side_menu_typo .= 'text-transform:'. $side_menu_typo_array['text-transform'] .';'; }

		$custom_css .= '#site-navigation-side .menu-container ul li a{'.$side_menu_typo.'}';
	}	
	
	
	// Heading typo
	$heading_typo_array = ot_get_option('heading_font');
	if ( ! empty( $heading_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$heading_typo_array['font-family']]['family'] ) ) {
			$heading_typo = 'font-family: "' . $ot_google_fonts[$heading_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$heading_typo = 'font-family: "' . $heading_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $heading_typo_array['font-weight'] ) ) { $heading_typo .= 'font-weight:'. $heading_typo_array['font-weight'] .';'; }
		if( ! empty( $heading_typo_array['line-height'] ) ) { $heading_typo .= 'line-height:'. $heading_typo_array['line-height'] .';'; }
		if( ! empty( $heading_typo_array['letter-spacing'] ) ) { $heading_typo .= 'letter-spacing:'. $heading_typo_array['letter-spacing'] .';'; }
		if( ! empty( $heading_typo_array['text-transform'] ) ) { $heading_typo .= 'text-transform:'. $heading_typo_array['text-transform'] .';'; }

		$custom_css .= 'h1, h2, h3, h4, h5, h6, .previous-post-link a, .next-post-link a{'.$heading_typo.'}';
	}		
	
	
	// Single post typo
	$single_typo_array = ot_get_option('single_post_font');
	if ( ! empty( $single_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$single_typo_array['font-family']]['family'] ) ) {
			$single_typo = 'font-family: "' . $ot_google_fonts[$single_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$single_typo = 'font-family: "' . $single_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $single_typo_array['font-weight'] ) ) { $single_typo .= 'font-weight:'. $single_typo_array['font-weight'] .';'; }
		if( ! empty( $single_typo_array['line-height'] ) ) { $single_typo .= 'line-height:'. $single_typo_array['line-height'] .';'; }
		if( ! empty( $single_typo_array['letter-spacing'] ) ) { $single_typo .= 'letter-spacing:'. $single_typo_array['letter-spacing'] .';'; }
		if( ! empty( $single_typo_array['text-transform'] ) ) { $single_typo .= 'text-transform:'. $single_typo_array['text-transform'] .';'; }

		$custom_css .= '.single-post .entry-content{'.$single_typo.'}';
	}	
	
	$custom_css .= '.single-post .entry-content, .single-post .post_lead_content {font-size:'. ot_get_option('single_post_text_font_size').'}';
	
	
	// Widget typo
	$widget_typo_array = ot_get_option('widget_font');
	if ( ! empty( $widget_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$widget_typo_array['font-family']]['family'] ) ) {
			$widget_typo = 'font-family: "' . $ot_google_fonts[$widget_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$widget_typo = 'font-family: "' . $widget_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $widget_typo_array['font-weight'] ) ) { $widget_typo .= 'font-weight:'. $widget_typo_array['font-weight'] .';'; }
		if( ! empty( $widget_typo_array['line-height'] ) ) { $widget_typo .= 'line-height:'. $widget_typo_array['line-height'] .';'; }
		if( ! empty( $widget_typo_array['letter-spacing'] ) ) { $widget_typo .= 'letter-spacing:'. $widget_typo_array['letter-spacing'] .';'; }
		if( ! empty( $widget_typo_array['text-transform'] ) ) { $widget_typo .= 'text-transform:'. $widget_typo_array['text-transform'] .';'; }

		$custom_css .= '.widget .widget-title{'.$widget_typo.'}';
	}
	
	
	// Headings
	$custom_css .= 'h1{font-size:'. ot_get_option('h1', '30px') .'}';
	$custom_css .= 'h2{font-size:'. ot_get_option('h2', '24px') .'}';
	$custom_css .= 'h3{font-size:'. ot_get_option('h3', '20px') .'}';
	$custom_css .= 'h4{font-size:'. ot_get_option('h4', '18px') .'}';
	$custom_css .= 'h5{font-size:'. ot_get_option('h5', '16px') .'}';
	$custom_css .= 'h6{font-size:'. ot_get_option('h6', '14px') .'}';
	(ot_get_option('headings_color') != '') ? $custom_css .= 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color:'. ot_get_option('headings_color') .'}' : '';
	
	(ot_get_option('headings_color') != '') ? $custom_css .= '#comments .comment-author .fn, #wrapper .author .fn a, .mp-widget .mp-container  h2 a, .mp-widget .mp-container  h2 a:hover {color:'. ot_get_option('headings_color') .'}' : '';
	
	
/*	
*	-------------------------------------------------------------------------------------------------
*	Header
*	-------------------------------------------------------------------------------------------------
*/

	// Header style	
	(ot_get_option('header_height') != '') ? $custom_css .= '#site-header, #site-header #header-wrapper {height:'. ot_get_option('header_height') .';}' : '';
	(ot_get_option('header_bg') != '') ? $custom_css .= '#site-header, #site-header #header-wrapper, #mobile-site-header, #mobile-site-navigation .mobile-menu-header {background-color:'. ot_get_option('header_bg') .';}' : '';	
	
	if( ot_get_option('header_border') == 'on' ){  
		$custom_css .= '#site-header #header-wrapper {box-shadow:0px 1px 3px rgba(0,0,0,0.12);} #site-header.header-overlay #header-wrapper {box-shadow:none;}';
	}
		
	// Top bar style
	(ot_get_option('top_bar_bg') != '') ? $custom_css .= '#top-bar-wrapper, #top-bar .widget_nav_menu ul li ul{background:'. ot_get_option('top_bar_bg') .'}' : '';
	(ot_get_option('top_bar_text_color') != '') ? $custom_css .= '#top-bar-wrapper .widget, #top-bar .widget-title, #top-bar .search-input {color:'. ot_get_option('top_bar_text_color') .'}' : '';
	(ot_get_option('top_bar_link_color') != '') ? $custom_css .= '#top-bar-wrapper .widget a {color:'. ot_get_option('top_bar_link_color') .'}' : '';
	(ot_get_option('top_bar_link_hover') != '') ? $custom_css .= '#top-bar-wrapper .widget a:hover{color:'. ot_get_option('top_bar_link_hover') .'}' : '';
	
	// Overlay sidebar style
	(ot_get_option('overlay_sidebar_bg') != '') ? $custom_css .= '#overlay-sidebar-wrapper {background:'. ot_get_option('overlay_sidebar_bg') .'}' : '';
	(ot_get_option('overlay_sidebar_text_color') != '') ? $custom_css .= '#overlay-sidebar-inner .widget, #overlay-sidebar-inner .widget a:not(.mnky_category_link), #overlay-sidebar-inner .widget-title {color:'. ot_get_option('overlay_sidebar_text_color') .'}' : '';
	(ot_get_option('overlay_sidebar_link_hover') != '') ? $custom_css .= '#overlay-sidebar-inner .widget a:not(.mnky_category_link):hover{color:'. ot_get_option('overlay_sidebar_link_hover') .'}' : '';
	(ot_get_option('overlay_sidebar_text_color') != '') ? $custom_css .= '.overlay-sidebar-close span {background-color:'. ot_get_option('overlay_sidebar_text_color') .'}' : '';
	(ot_get_option('overlay_sidebar_link_hover') != '') ? $custom_css .= '.overlay-sidebar-close:hover span {background-color:'. ot_get_option('overlay_sidebar_link_hover') .'}' : '';
	
	
	// Menu style		
	(ot_get_option('header_height') != '') ? $custom_css .= '#site-navigation ul > li > a, .site-links .menu-toggle-wrapper, .site-links .search_button, #site-logo .site-title, #site-navigation #menu-sidebar, .overlay-toggle-wrapper {line-height:'. ot_get_option('header_height') .'}' : '';
	(ot_get_option('header_height') != '') ? $custom_css .= '.header-search .search-input {height:'. ot_get_option('header_height') .'}' : '';
	(ot_get_option('menu_font_size') != '15px') ? $custom_css .= '#site-navigation ul li a {font-size:'. ot_get_option('menu_font_size') .'}' : '';
	(ot_get_option('side_overlay_menu_font_size') != '24px') ? $custom_css .= '#site-navigation-side .menu-container ul li a {font-size:'. ot_get_option('side_overlay_menu_font_size') .'}' : '';
	
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '#site-navigation ul li a, #site-logo .site-title a, .site-links .search_button, .toggle-mobile-menu i, #mobile-site-header #mobile-site-logo h1.site-title a, #mobile-site-header .toggle-mobile-menu i, #mobile-site-navigation .mobile-menu-header, .header-search .search-input, .menu-toggle-wrapper {color:'. ot_get_option('default_menu_link') .'}' : '';
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '.header-search .toggle-header-search span, #header-container .menu-toggle-wrapper span, .toggle-overlay-sidebar span, .toggle-overlay-sidebar span:after {background-color:'. ot_get_option('default_menu_link') .'}' : '';
 
	(ot_get_option('default_menu_link_h') != '') ? $custom_css .= '#site-navigation ul li a:hover, .site-links .search_button:hover, #site-navigation ul li.current-menu-item > a, .menu-toggle-wrapper:hover {color:'. ot_get_option('default_menu_link_h') .'}' : '';
	(ot_get_option('default_menu_link_h') != '') ? $custom_css .= '#header-container .menu-toggle-wrapper:hover span, .toggle-overlay-sidebar:hover span, .toggle-overlay-sidebar:hover span:after, .toggle-overlay-sidebar:hover span:before, .header-search .toggle-header-search:hover span {background-color:'. ot_get_option('default_menu_link_h') .'}' : '';
	
	
	// Side menu style
	$side_navigation_bg = ot_get_option('side_navigation_bg');
	if ( ! empty( $side_navigation_bg ) ){
		$side_navigation_styles = array(
			($side_navigation_bg['background-color'] != '') ? 'background-color:'. $side_navigation_bg['background-color'] : null,
			($side_navigation_bg['background-image'] != '') ? 'background-image: url('. $side_navigation_bg['background-image'] .')' : null,
			($side_navigation_bg['background-repeat'] != '') ? 'background-repeat:'. $side_navigation_bg['background-repeat'] : null,
			($side_navigation_bg['background-position'] != '') ? 'background-position:'. $side_navigation_bg['background-position'] : null,
			($side_navigation_bg['background-attachment'] != '') ? 'background-attachment:'. $side_navigation_bg['background-attachment'] : null,
			($side_navigation_bg['background-size'] != '') ? 'background-size:'. $side_navigation_bg['background-size'] : null,
			
		);
	
		$side_navigation_styles = implode('; ', array_filter($side_navigation_styles));	
		$custom_css .= '#site-navigation-side {'.$side_navigation_styles.'}';
	}
	
	(ot_get_option('side_navigation_border') != '') ? $custom_css .= '#site-navigation-side {border-color:'. ot_get_option('side_navigation_border') .'}' : '';
	(ot_get_option('side_navigation_text') != '') ? $custom_css .= '#site-navigation-side, #menu-sidebar .widget-title, #site-navigation-side .mp-title, #site-navigation-side .mnky-posts a, #site-navigation-side .mnky-posts a:hover, #site-navigation-side .mnky-related-posts h6 {color:'. ot_get_option('side_navigation_text') .'}' : '';
	(ot_get_option('side_navigation_link') != '') ? $custom_css .= '#site-navigation-side a, #site-navigation-side .menu-container ul li a {color:'. ot_get_option('side_navigation_link') .'}' : '';
	(ot_get_option('side_navigation_link') != '') ? $custom_css .= '#site-navigation-side .toggle-main-menu span {background:'. ot_get_option('side_navigation_link') .'}' : '';		
	(ot_get_option('side_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-side a:hover, #site-navigation-side .menu-container ul li a:hover {color:'. ot_get_option('side_navigation_link_hover') .'}' : '';
	(ot_get_option('side_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-side .toggle-main-menu:hover span {background:'. ot_get_option('side_navigation_link_hover') .'}' : '';


	
	// Overlay header style
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			
			(ot_get_option('overlay_header_bg') != '') ? $custom_css .= '#site-header.header-overlay {background-color:'. ot_get_option('overlay_header_bg') .'}' : '';	
			
			(ot_get_option('overlay_menu_link') != '') ? $custom_css .= '#site-navigation ul li a, .site-links .search_button, .toggle-mobile-menu i,  .header-search .search-input, .menu-toggle-wrapper {color:'. ot_get_option('overlay_menu_link') .'}' : '';
			(ot_get_option('overlay_menu_link') != '') ? $custom_css .= '.header-search .toggle-header-search span, #header-container .menu-toggle-wrapper span, .toggle-overlay-sidebar span, .toggle-overlay-sidebar span:after {background-color:'. ot_get_option('overlay_menu_link') .'}' : '';
			
			(ot_get_option('overlay_menu_link_h') != '') ? $custom_css .= '#site-navigation ul li a:hover, #site-navigation ul li.current-menu-item > a, .site-links .search_button:hover, .menu-toggle-wrapper:hover {color:'. ot_get_option('overlay_menu_link_h') .'}' : '';
			(ot_get_option('overlay_menu_link_h') != '') ? $custom_css .= '#header-container .menu-toggle-wrapper:hover span, .toggle-overlay-sidebar:hover span, .toggle-overlay-sidebar:hover span:after, .toggle-overlay-sidebar:hover span:before, .header-search .toggle-header-search:hover span {background-color:'. ot_get_option('overlay_menu_link_h') .'}' : '';
			
			(ot_get_option('overlay_sticky_menu_bg') != '') ? $custom_css .= '#site-header.header-overlay #header-wrapper.header-sticky {background-color:'. ot_get_option('overlay_sticky_menu_bg') .'}' : '';		
		
			if( ot_get_option('detached_overlay_header') == 'on' ){  
				$custom_css .= '#site-header{margin-top:40px;} #site-header.header-overlay #header-container {background-color:'. ot_get_option('detached_overlay_header_background','#ffffff') .'; padding:0 40px; box-shadow: 5px 5px 0px 0px rgba(0,0,0,0.11); box-sizing:border-box;} .header-overlay#site-header .header-sticky#header-wrapper {background:none;} #site-header.header-overlay .header-search .search-input{padding:0 40px} #site-header.header-overlay .header-search .toggle-header-search {right:40px}';
				$custom_css .= '#site-navigation ul li.megamenu-tabs>ul.sub-menu {max-width:'. $content_width .'px; left: calc(50% - '. $content_width/2 .'px);}';
				$custom_css .= '@media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs>ul.sub-menu{left:30px; width:calc(100% - 60px)}}';
			}			
			
			(ot_get_option('overlay_header_height') != '') ? $custom_css .= '#site-header.header-overlay ul > li > a, #site-header.header-overlay .site-links .menu-toggle-wrapper, #site-header.header-overlay .site-links .search_button, #site-logo .site-title, .overlay-toggle-wrapper {line-height:'. ot_get_option('overlay_header_height') .'}' : '';
			(ot_get_option('overlay_header_height') != '') ? $custom_css .= '#site-header.header-overlay, #site-header.header-overlay #header-wrapper, #site-header.header-overlay .header-search .search-input {height:'. ot_get_option('overlay_header_height') .'}' : '';	
			
		}
	}

	
	// Sub-menu style
	(ot_get_option('sub_menu_font_size') != '13px') ? $custom_css .= '#site-navigation ul li ul li a {font-size:'. ot_get_option('sub_menu_font_size') .'}' : '';
	(ot_get_option('submenu_background') != '') ? $custom_css .= '#site-navigation ul li ul {background-color:'. ot_get_option('submenu_background'). '}' : '';
	(ot_get_option('submenu_background') != '') ? $custom_css .= '#site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav {background-color:'. mnky_ColorDarken( ot_get_option('submenu_background') ) .'}' : '';	
	(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-navigation ul li ul li a, #site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a, #site-navigation .mnky-menu-posts .menu-post-container h6 {color:'. ot_get_option('submenu_link_color'). '}' : '';
	(ot_get_option('submenu_link_bg_color') != '') ? $custom_css .= '#site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a, .single-post #site-navigation ul li ul li.current_page_parent > a, #site-navigation ul li ul li.current-menu-ancestor > a {background-color:'. ot_get_option('submenu_link_bg_color'). '}' : '';
	
	
	// Megamenu
	$megamenu_bg = ot_get_option('megamenu_bg');
	if ( ! empty( $megamenu_bg ) ){
		$megamenu_styles = array(
			($megamenu_bg['background-color'] != '') ? 'background-color:'. $megamenu_bg['background-color'] : null,
			($megamenu_bg['background-image'] != '') ? 'background-image: url('. $megamenu_bg['background-image'] .')' : null,
			($megamenu_bg['background-repeat'] != '') ? 'background-repeat:'. $megamenu_bg['background-repeat'] : null,
			($megamenu_bg['background-position'] != '') ? 'background-position:'. $megamenu_bg['background-position'] : null,
			($megamenu_bg['background-attachment'] != '') ? 'background-attachment:'. $megamenu_bg['background-attachment'] : null,
			($megamenu_bg['background-size'] != '') ? 'background-size:'. $megamenu_bg['background-size'] : null		
		);
	
		$megamenu_styles = implode('; ', array_filter($megamenu_styles));	
		$custom_css .= '#site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs .submenu-content {'.$megamenu_styles.'}';
		($megamenu_bg['background-color'] != '') ? $custom_css .= '#site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav {background-color:'. mnky_ColorDarken( $megamenu_bg['background-color'] ) .'}' : null;	
	}
	
	(ot_get_option('megamenu_item_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu ul li ul li a, #site-navigation .mnky-menu-posts .menu-post-container h6, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li a {color:'. ot_get_option('megamenu_item_color') .';}' : '';
	
	(ot_get_option('megamenu_active_item_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, #site-navigation .mnky-menu-posts .menu-post-container:hover h6, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li.nav-active a {color:'. ot_get_option('megamenu_active_item_color') .';}' : '';
		
	(ot_get_option('megamenu_title_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu > ul > li > a, #site-navigation ul li.megamenu > ul > li > a:hover{color:'. ot_get_option('megamenu_title_color'). ' !important}' : '';
		
	(ot_get_option('megamenu_separator_color') != '') ? $custom_css .= '#site-navigation ul > li.megamenu > ul > li {border-right-color:'. ot_get_option('megamenu_separator_color'). '}' : '';
	
	if ( is_rtl() ) {
		(ot_get_option('megamenu_separator_color') != '') ? $custom_css .= '#site-navigation ul.menu > li.megamenu > ul > li {border-left-color:'. ot_get_option('megamenu_separator_color'). '}' : '';
	}
	
	// Mobile menu style
	(ot_get_option('mobile_menu_background') != '') ? $custom_css .= '#mobile-site-header, #mobile-site-navigation .mobile-menu-header{background:'. ot_get_option('mobile_menu_background'). '}' : '';
	(ot_get_option('mobile_menu_toggle_color') != '') ? $custom_css .= '#mobile-site-header .toggle-mobile-menu i, #mobile-site-header #mobile-site-logo h1.site-title a, #mobile-header-sidebar .widget, #mobile-header-sidebar .widget a, #mobile-site-navigation .mobile-menu-header {color:'. ot_get_option('mobile_menu_toggle_color'). '}' : '';
	
	// Logo
	(ot_get_option('logo_top') != '') ? $custom_css .= '#site-logo {margin-top:'. ot_get_option('logo_top') .'}' : '';
	(ot_get_option('logo_retina') != '' && ot_get_option('retina_logo_width') != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. ot_get_option('retina_logo_width') .'; height:'. ot_get_option('retina_logo_height') .';}' : '';
	(ot_get_option('mobile_logo_retina') != '' && ot_get_option('mobile_retina_logo_width') != '') ? $custom_css .= '#mobile-site-header #site-logo img.retina-logo{width:'. ot_get_option('mobile_retina_logo_width') .'; height:'. ot_get_option('mobile_retina_logo_height') .';}' : '';
	
	// Overlay logo
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			(ot_get_option('overlay_logo_top') != '') ? $custom_css .= '#site-logo {margin-top:'. ot_get_option('overlay_logo_top') .'}' : '';
			(ot_get_option('overlay_logo_retina') != '' && ot_get_option('overlay_retina_logo_width') != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. ot_get_option('overlay_retina_logo_width') .'; height:'. ot_get_option('overlay_retina_logo_height') .';}' : '';
		}
	}

		
		
/*	
*	-------------------------------------------------------------------------------------------------
*	Content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Content style
	(ot_get_option('theme_button_color') != '') ? $custom_css .= 'input[type=\'submit\'],input[type=button], button, .archive-layout:not(.archive-style-2) .more-link, #load-posts a, .ajax-load-posts .mp-load-posts a, .ajax-infinite-scroll .mp-load-posts a, .ajax-post-carousel .mp-load-posts a, .scrollToTop {background-color:'. ot_get_option('theme_button_color') .'}' : '';
	(ot_get_option('button_text_color') != '') ? $custom_css .= 'input[type=\'submit\'],input[type=button], button, input[type=\'submit\']:active,input[type=button]:active, button:active, .archive-layout:not(.archive-style-2) .more-link, #load-posts a, .ajax-load-posts .mp-load-posts a, .ajax-infinite-scroll .mp-load-posts a, .ajax-post-carousel .mp-load-posts a, .scrollToTop {color:'. ot_get_option('button_text_color') .'}' : '';
		
	// If custom page title styles
	$page_title_paddings = ot_get_option('page_title_paddings');
	$page_title_text_color = ot_get_option('page_title_text_color');
	$page_title_bg_color = ot_get_option('page_title_background_color');
	$page_title_bg_gradient_switch = ot_get_option('page_title_background_gradient');
	$page_title_bg_gradient_start = ot_get_option('page_title_background_gradient_start');
	$page_title_bg_gradient_end = ot_get_option('page_title_background_gradient_end');
	$page_title_bg_image_switch = ot_get_option('page_title_background_image_switch');
	$page_title_bg_image = ot_get_option('page_title_background_image');
	
	if( is_page() ){
		if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_styles', true) == 'on' ){
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_paddings', true) ){
				$page_title_paddings = get_post_meta( get_the_ID(), 'mnky_custom_page_title_paddings', true); 
			}
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_text_color', true) ){
				$page_title_text_color = get_post_meta( get_the_ID(), 'mnky_custom_page_title_text_color', true); 
			}
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_color', true) ){
				$page_title_bg_color = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_color', true); 
			}
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient', true) ){
				$page_title_bg_gradient_switch = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient', true); 
			}
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient_start', true) && get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient_end', true) ){
				$page_title_bg_gradient_start = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient_start', true); 
				$page_title_bg_gradient_end = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_gradient_end', true); 
			}	
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_image_switch', true) ){
				$page_title_bg_image_switch = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_image_switch', true); 
			}
			if( get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_image', true) ){
				$page_title_bg_image = get_post_meta( get_the_ID(), 'mnky_custom_page_title_background_image', true); 
			}
		}
	}	 
	
	if( is_home() ){
		if( ot_get_option('blog_custom_page_title_styles') == 'on' ){
			if( ot_get_option('blog_custom_page_title_paddings') != '' ){
				$page_title_paddings = ot_get_option('blog_custom_page_title_paddings'); 
			}
			if( ot_get_option('blog_custom_page_title_text_color') != '' ){
				$page_title_text_color = ot_get_option('blog_custom_page_title_text_color'); 
			}
			if( ot_get_option('blog_custom_page_title_background_color') != '' ){
				$page_title_bg_color = ot_get_option('blog_custom_page_title_background_color'); 
			}
			if( ot_get_option('blog_custom_page_title_background_gradient') != '' ){
				$page_title_bg_gradient_switch = ot_get_option('blog_custom_page_title_background_gradient'); 
			}
			if( ot_get_option('blog_custom_page_title_background_gradient_start') != '' && ot_get_option('blog_custom_page_title_background_gradient_end') != '' ){
				$page_title_bg_gradient_start = ot_get_option('blog_custom_page_title_background_gradient_start'); 
				$page_title_bg_gradient_end = ot_get_option('blog_custom_page_title_background_gradient_end'); 
			}	
			if( ot_get_option('blog_custom_page_title_background_image_switch') != '' ){
				$page_title_bg_image_switch = ot_get_option('blog_custom_page_title_background_image_switch'); 
			}
			if( ot_get_option('blog_custom_page_title_background_image') != '' ){
				$page_title_bg_image = ot_get_option('blog_custom_page_title_background_image'); 
			}
		}
	}	
	
	if( is_category() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
					$cat_custom_page_title_styles = $category_style['cat_custom_page_title_styles'];
					if( $category_style['cat_custom_page_title_styles'] == 'on' ){
						if( $category_style['cat_custom_page_title_paddings'] != '' ) {
							$page_title_paddings = $category_style['cat_custom_page_title_paddings']; 
						}
						if( $category_style['cat_custom_page_title_text_color'] != '' ){
							$page_title_text_color = $category_style['cat_custom_page_title_text_color']; 
						}
						if( $category_style['cat_custom_page_title_background_color'] != '' ){
							$page_title_bg_color = $category_style['cat_custom_page_title_background_color']; 
						}
						if( $category_style['cat_custom_page_title_background_gradient'] != '' ){
							$page_title_bg_gradient_switch = $category_style['cat_custom_page_title_background_gradient']; 
						}
						if( $category_style['cat_custom_page_title_background_gradient_start'] != '' && $category_style['cat_custom_page_title_background_gradient_end'] != '' ){
							$page_title_bg_gradient_start = $category_style['cat_custom_page_title_background_gradient_start']; 
							$page_title_bg_gradient_end = $category_style['cat_custom_page_title_background_gradient_end']; 
						}	
						if( $category_style['cat_custom_page_title_background_image_switch'] != '' ){
							$page_title_bg_image_switch = $category_style['cat_custom_page_title_background_image_switch']; 
						}
						if( $category_style['cat_custom_page_title_background_image'] != '' ){
							$page_title_bg_image = $category_style['cat_custom_page_title_background_image']; 
						}
					}
				}
			}
		}
	}
	
	($page_title_paddings != '') ? $custom_css .= '.page-header {padding:'. $page_title_paddings .'}' : '';
	($page_title_text_color != '') ? $custom_css .= '.page-header h1, .mnky_breadcrumbs, .mnky_breadcrumbs a {color:'. $page_title_text_color .'}' : '';
	($page_title_bg_color != '') ? $custom_css .= '.page-header {background:'. $page_title_bg_color .'}' : '';
	
	if ( $page_title_bg_gradient_switch == 'on' ) {
		($page_title_bg_gradient_start && $page_title_bg_gradient_end != '') ? $custom_css .= '.page-header {background: linear-gradient(to right, '. $page_title_bg_gradient_start .' 0%, '. $page_title_bg_gradient_end .' 100%)}' : '';
	}

	if ( $page_title_bg_image_switch == 'on' ) {
		if ( ! empty( $page_title_bg_image ) ){
			$page_title_bg_styles = array(
				($page_title_bg_image['background-color'] != '') ? 'background-color:'. $page_title_bg_image['background-color'] : null,
				($page_title_bg_image['background-image'] != '') ? 'background-image: url('. $page_title_bg_image['background-image'] .')' : null,
				($page_title_bg_image['background-repeat'] != '') ? 'background-repeat:'. $page_title_bg_image['background-repeat'] : null,
				($page_title_bg_image['background-position'] != '') ? 'background-position:'. $page_title_bg_image['background-position'] : null,
				($page_title_bg_image['background-attachment'] != '') ? 'background-attachment:'. $page_title_bg_image['background-attachment'] : null,
				($page_title_bg_image['background-size'] != '') ? 'background-size:'. $page_title_bg_image['background-size'] : null,	
			);
				
			$page_title_bg_styles = implode('; ', array_filter($page_title_bg_styles));	
			$custom_css .= '.page-header{'.$page_title_bg_styles.'}';
		}
	}

	(ot_get_option('sidebar_text_color') != '') ? $custom_css .= '.page-sidebar .widget{color:'. ot_get_option('sidebar_text_color') .'}' : '';
	(ot_get_option('sidebar_link_color') != '') ? $custom_css .= '.page-sidebar a{color:'. ot_get_option('sidebar_link_color') .'}' : '';
	(ot_get_option('sidebar_link_hover_color') != '') ? $custom_css .= '.page-sidebar a:hover{color:'. ot_get_option('sidebar_link_hover_color') .'}' : '';
	(ot_get_option('sidebar_title_color') != '') ? $custom_css .= '.page-sidebar .widget .widget-title {color:'. ot_get_option('sidebar_title_color') .'}' : '';
	(ot_get_option('sidebar_divider_color') != '') ? $custom_css .= '.page-sidebar .widget ul li,.page-sidebar .widget ul ul,.page-sidebar .widget_categories .children, .page-sidebar .widget_pages .children{border-color:'. ot_get_option('sidebar_divider_color') .'}' : '';
	
	// Article
	if( is_single() ){
		
		$post_header_style = ot_get_option('post_header_style_opt', 'style_default');
		$post_title_align = ot_get_option('mnky_overlay_post_title_align', 'left');
		$post_title_gradient = ot_get_option('mnky_overlay_post_title_gradient', 'off');
		if ( is_rtl() ) {
			if( $post_title_align = 'left') {
				$post_title_align = 'right' ;
			} elseif ( $post_title_align = 'right') {
				$post_title_align = 'left' ;
			}
		}

		if( get_post_meta( get_the_ID(), 'mnky_post_header_style', true ) != 'opt_default' ) {
			$post_header_style = get_post_meta( get_the_ID(), 'mnky_post_header_style', true );
			$post_title_align = get_post_meta( get_the_ID(), 'mnky_overlay_post_title_align', true);
			$post_title_gradient = get_post_meta( get_the_ID(), 'mnky_overlay_post_title_gradient', true );
		}
		
		if( $post_header_style == 'style_2' ) {
			$custom_css .= '.entry-header-overlay{text-align:'. $post_title_align .'}';

			if( $post_title_gradient == 'on') {
				$custom_css .= '.pre-content:before {content:""; background:linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.6)); height:100%; width:100%; position:absolute;}';
			}	
		}
		
		$post_width = ot_get_option( 'mnky_post_width' );
		if( get_post_meta( get_the_ID(), 'mnky_post_width', true) != '' ){
			$post_width = get_post_meta( get_the_ID(), 'mnky_post_width', true);
		}
		if( $post_width != '' ){
			$post_width = preg_replace( '/\D/', '', $post_width );
			$custom_css .= '.single-layout:not(.single-related) .entry-content p, .single-layout:not(.single-related) .entry-content h1, .single-layout:not(.single-related) .entry-content h2, .single-layout:not(.single-related) .entry-content h3, .single-layout:not(.single-related) .entry-content h4, .single-layout:not(.single-related) .entry-content h5, .single-layout:not(.single-related) .entry-content h6 {max-width:'. $post_width .'px; margin-left:auto; margin-right:auto;}';
		} 
		
	}
	
	(ot_get_option('article_views_color') != '') ? $custom_css .= '.meta-views, .mp-views {color:'. ot_get_option('article_views_color') .'}' : '';
	(ot_get_option('article_overlay_background') != '') ? $custom_css .= '.archive-style-2 .entry-title, .archive-style-2 .entry-category,.archive-style-2 .entry-meta-blog, .archive-style-2 .entry-content p, .archive-style-2 .entry-summary p, .archive-style-2 .mp-rating-wrapper, .mp-layout-5 .mp-title, .mp-layout-5 .mp-category, .mp-layout-5 .mp-article-meta, .mp-layout-5 .mp-full-content p, .mp-layout-5 .mp-excerpt p, .mp-layout-5 .mp-rating-wrapper{background-color:'. ot_get_option('article_overlay_background') .'}' : '';
	(ot_get_option('article_overlay_background') != '') ? $custom_css .= '.archive-style-2 .entry-title, .archive-style-2 .entry-category,.archive-style-2 .entry-meta-blog, .archive-style-2 .entry-content p, .archive-style-2 .entry-summary p, .archive-style-2 .mp-rating-wrapper, .mp-layout-5 .mp-title, .mp-layout-5 .mp-category, .mp-layout-5 .mp-article-meta, .mp-layout-5 .mp-full-content p, .mp-layout-5 .mp-excerpt p, .mp-layout-5 .mp-rating-wrapper{box-shadow: 10px 0 0 '. ot_get_option('article_overlay_background') .', -10px 0 0 '. ot_get_option('article_overlay_background') .'}' : '';
	(ot_get_option('article_overlay_text') != '') ? $custom_css .= '.archive-style-2 .post-content-wrapper, .archive-style-2 a, .archive-style-2 .meta-views, .archive-style-2 .meta-comments, .archive-style-2 .meta-comments a, .archive-style-2 .post-content-wrapper .meta-comments a:hover, .archive-style-2 .entry-meta-blog a, .archive-style-2 .entry-category, .mp-layout-5 .mp-content-container, .mp-layout-5 a, .mp-layout-5 .mp-views, .mp-layout-5 .mp-comment, .mp-layout-5 .mp-comment a, .mp-layout-5 .mp-content-container .mp-comment a:hover, .mp-layout-5 .mp-article-meta a, .mp-layout-5 .mp-category, .mp-widget.mp-layout-5 .mp-container .mp-content-container, .mp-widget.mp-layout-5 .mp-container a, .mp-widget.mp-layout-5 .mp-container .mp-views, .mp-widget.mp-layout-5 .mp-container .mp-comment, .mp-widget.mp-layout-5 .mp-container .mp-comment a, .mp-widget.mp-layout-5 .mp-container .mp-article-meta a, .mp-widget.mp-layout-5 .mp-container .mp-category{color:'. ot_get_option('article_overlay_text') .'}' : '';
	(ot_get_option('article_overlay_hover') != '') ? $custom_css .= '.archive-style-2 .post-content-wrapper a:hover, .archive-style-2 .post-content-wrapper .entry-content a:hover, .mp-layout-5 .mp-content-container a:hover, .mp-widget.mp-layout-5 .mp-container .mp-content-container a:hover {color:'. ot_get_option('article_overlay_hover') .'}' : '';
	
	// Body background
	$body_bg = ot_get_option('body_background');
		
		// If custom body background
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'mnky_custom_body_background', true) ){
				$body_bg = get_post_meta( get_the_ID(), 'mnky_custom_body_background', true); 
			}	
		}
		
	if ( ! empty( $body_bg ) ){
		$body_styles = array(
			($body_bg['background-color'] != '') ? 'background-color:'. $body_bg['background-color'] : null,
			($body_bg['background-image'] != '') ? 'background-image: url('. $body_bg['background-image'] .')' : null,
			($body_bg['background-repeat'] != '') ? 'background-repeat:'. $body_bg['background-repeat'] : null,
			($body_bg['background-position'] != '') ? 'background-position:'. $body_bg['background-position'] : null,
			($body_bg['background-attachment'] != '') ? 'background-attachment:'. $body_bg['background-attachment'] : null,
			($body_bg['background-size'] != '') ? 'background-size:'. $body_bg['background-size'] : null,
				
		);
		
		$body_styles = implode('; ', array_filter($body_styles));	
		$custom_css .= 'body{'.$body_styles.'}';
	}
	
	// Blog and category post title
	(ot_get_option('blog_post_title_size') != '') ? $custom_css .= '.archive-layout .entry-title {font-size:'. ot_get_option('blog_post_title_size') .'}' : '';
	(ot_get_option('blog_post_title_size_responsive') != '') ? $custom_css .= '@media only screen and (max-width: 767px) {.archive-layout .entry-title {font-size:'. ot_get_option('blog_post_title_size_responsive') .'}}' : '';
	if( is_category() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
					$cat_post_title_size = $category_style['cat_post_title_size'];
					if ( ! empty( $cat_post_title_size ) ){
						$custom_css .= '.archive-layout .entry-title{font-size:'.$cat_post_title_size.'}';	
					}
					$cat_post_title_size_responsive = $category_style['cat_post_title_size_responsive'];
					if ( ! empty( $cat_post_title_size_responsive ) ){
						$custom_css .= '@media only screen and (max-width: 767px) {.archive-layout .entry-title{font-size:'.$cat_post_title_size_responsive.'}}';	
					}
				}
			}
		}
	}

	
/*	
*	-------------------------------------------------------------------------------------------------
*	Pre-content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Default pre-content style
	if( is_page() || is_single() ){
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) {
			$pre_header_bg = get_post_meta( get_the_ID(), 'mnky_pre_content_bg', true);
			if ( ! empty( $pre_header_bg ) ){
				$pre_header_styles = array(
					($pre_header_bg['background-color'] != '') ? 'background-color:'. $pre_header_bg['background-color'] : null,
					($pre_header_bg['background-image'] != '') ? 'background-image: url('. $pre_header_bg['background-image'] .')' : null,
					($pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $pre_header_bg['background-repeat'] : null,
					($pre_header_bg['background-position'] != '') ? 'background-position:'. $pre_header_bg['background-position'] : null,
					($pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $pre_header_bg['background-attachment'] : null,
					($pre_header_bg['background-size'] != '') ? 'background-size:'. $pre_header_bg['background-size'] : null,
					
				);
			
				$pre_header_styles = implode('; ', array_filter($pre_header_styles));	
				$custom_css .= '.pre-content{'.$pre_header_styles.'}';
			}
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_responsive_height', true ) == 'on' ){
			$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
			}
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_paddings', true ) != '' ){
			$custom_css .= '.pre-content-html {padding:'.get_post_meta( get_the_ID(), 'mnky_pre_content_paddings', true ).'}';
			}
		}
	}

	// Blog pre-content style
	if( is_home() ){
		$blog_pre_header_bg = ot_get_option('blog_pre_content_bg');
		if ( ! empty( $blog_pre_header_bg ) ){
			$blog_pre_header_styles = array(
				($blog_pre_header_bg['background-color'] != '') ? 'background-color:'. $blog_pre_header_bg['background-color'] : null,
				($blog_pre_header_bg['background-image'] != '') ? 'background-image: url('. $blog_pre_header_bg['background-image'] .')' : null,
				($blog_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $blog_pre_header_bg['background-repeat'] : null,
				($blog_pre_header_bg['background-position'] != '') ? 'background-position:'. $blog_pre_header_bg['background-position'] : null,
				($blog_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $blog_pre_header_bg['background-attachment'] : null,
				($blog_pre_header_bg['background-size'] != '') ? 'background-size:'. $blog_pre_header_bg['background-size'] : null,
				
			);
		
			$blog_pre_header_styles = implode('; ', array_filter($blog_pre_header_styles));	
			$custom_css .= '.pre-content{'.$blog_pre_header_styles.'}';
		}
		
		if (  ot_get_option('blog_pre_content_responsive_height') == 'on' ){
		$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
		}
		if ( ot_get_option('blog_pre_content_paddings') != '' ){
		$custom_css .= '.pre-content-html {padding:'. ot_get_option('blog_pre_content_paddings') .'}';
		}
	}

	// Category pre-content style
	if( is_category() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
				
					$cat_pre_header_bg = $category_style['cat_pre_content_bg'];
					if ( ! empty( $cat_pre_header_bg ) ){
						$cat_pre_header_styles = array(
							($cat_pre_header_bg['background-color'] != '') ? 'background-color:'. $cat_pre_header_bg['background-color'] : null,
							($cat_pre_header_bg['background-image'] != '') ? 'background-image: url('. $cat_pre_header_bg['background-image'] .')' : null,
							($cat_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $cat_pre_header_bg['background-repeat'] : null,
							($cat_pre_header_bg['background-position'] != '') ? 'background-position:'. $cat_pre_header_bg['background-position'] : null,
							($cat_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $cat_pre_header_bg['background-attachment'] : null,
							($cat_pre_header_bg['background-size'] != '') ? 'background-size:'. $cat_pre_header_bg['background-size'] : null,
							
						);
					
						$cat_pre_header_styles = implode('; ', array_filter($cat_pre_header_styles));	
						$custom_css .= '.pre-content{'.$cat_pre_header_styles.'}';
					}
					
				if (  $category_style['cat_pre_content_responsive_height'] == 'on' ){
				$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
				}
				if ( $category_style['cat_pre_content_paddings'] != '' ){
				$custom_css .= '.pre-content-html {padding:'. $category_style['cat_pre_content_paddings'] .'}';
				}				
				
				}
			}
		}
	}


/*	
*	-------------------------------------------------------------------------------------------------
*	Footer
*	-------------------------------------------------------------------------------------------------
*/
		
	// Footer background
	$footer_bg = ot_get_option('footer_bg');
	if ( ! empty( $footer_bg ) ){
		$footer_styles = array(
			($footer_bg['background-color'] != '') ? 'background-color:'. $footer_bg['background-color'] : null,
			($footer_bg['background-image'] != '') ? 'background-image: url('. $footer_bg['background-image'] .')' : null,
			($footer_bg['background-repeat'] != '') ? 'background-repeat:'. $footer_bg['background-repeat'] : null,
			($footer_bg['background-position'] != '') ? 'background-position:'. $footer_bg['background-position'] : null,
			($footer_bg['background-attachment'] != '') ? 'background-attachment:'. $footer_bg['background-attachment'] : null,
			($footer_bg['background-size'] != '') ? 'background-size:'. $footer_bg['background-size'] : null,
			
		);
	
		$footer_styles = implode('; ', array_filter($footer_styles));	
		$custom_css .= '.footer-sidebar{'.$footer_styles.'}';
	}
	// Footer columns
	$footer_columns = ot_get_option('footer_columns', 'vc_col-sm-3');
	
	if ( $footer_columns == 'vc_col-sm-6') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-4') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-3') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	(ot_get_option('footer_column_4_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(4) {width:'. ot_get_option('footer_column_4_width') .'}' : '';
	}
	
	// Footer second row columns
	$footer_second_columns = ot_get_option('footer_second_columns', 'vc_col-sm-3');
	
	if ( $footer_second_columns == 'vc_col-sm-6') {
	(ot_get_option('footer_second_column_1_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-6:nth-child(1) {width:'. ot_get_option('footer_second_column_1_width') .'}' : '';
	(ot_get_option('footer_second_column_2_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-6:nth-child(2) {width:'. ot_get_option('footer_second_column_2_width') .'}' : '';
	}
	
	if ( $footer_second_columns == 'vc_col-sm-4') {
	(ot_get_option('footer_second_column_1_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-4:nth-child(1) {width:'. ot_get_option('footer_second_column_1_width') .'}' : '';
	(ot_get_option('footer_second_column_2_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-4:nth-child(2) {width:'. ot_get_option('footer_second_column_2_width') .'}' : '';
	(ot_get_option('footer_second_column_3_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-4:nth-child(3) {width:'. ot_get_option('footer_second_column_3_width') .'}' : '';
	}
	
	if ( $footer_second_columns == 'vc_col-sm-3') {
	(ot_get_option('footer_second_column_1_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-3:nth-child(1) {width:'. ot_get_option('footer_second_column_1_width') .'}' : '';
	(ot_get_option('footer_second_column_2_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-3:nth-child(2) {width:'. ot_get_option('footer_second_column_2_width') .'}' : '';
	(ot_get_option('footer_second_column_3_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-3:nth-child(3) {width:'. ot_get_option('footer_second_column_3_width') .'}' : '';
	(ot_get_option('footer_second_column_4_width') != '') ? $custom_css .= '.footer-sidebar .row_two .vc_col-sm-3:nth-child(4) {width:'. ot_get_option('footer_second_column_4_width') .'}' : '';
	}
	
	// Footer style
	(ot_get_option('footer_text_color') != '') ? $custom_css .= '.footer-sidebar .widget, .footer-sidebar .widget input, .footer-sidebar .mp-widget:not(.mp-layout-5) .mp-container, .footer-sidebar .mp-widget:not(.mp-layout-5) .mp-container h2{color:'. ot_get_option('footer_text_color') .'}' : '';
	(ot_get_option('footer_link') != '') ? $custom_css .= '.footer-sidebar .widget a, .footer-sidebar .mp-widget:not(.mp-layout-5) .mp-container a, .footer-sidebar .mnky-related-posts h6{color:'. ot_get_option('footer_link') .'}' : '';
	(ot_get_option('footer_link_hover') != '') ? $custom_css .= '.footer-sidebar .widget a:hover, .footer-sidebar .mp-widget:not(.mp-layout-5) .mp-container a:hover, .footer-sidebar .mnky-related-posts a:hover h6{color:'. ot_get_option('footer_link_hover') .'}' : '';
	(ot_get_option('footer_widget_title') != '') ? $custom_css .= '.footer-sidebar .widget .widget-title{color:'. ot_get_option('footer_widget_title') .'}' : '';
	
	
	// Copyright background
	$copyright_bg = ot_get_option('copyright_bg');
	if ( ! empty( $copyright_bg ) ){
		$copyright_styles = array(
			($copyright_bg['background-color'] != '') ? 'background-color:'. $copyright_bg['background-color'] : null,
			($copyright_bg['background-image'] != '') ? 'background-image: url('. $copyright_bg['background-image'] .')' : null,
			($copyright_bg['background-repeat'] != '') ? 'background-repeat:'. $copyright_bg['background-repeat'] : null,
			($copyright_bg['background-position'] != '') ? 'background-position:'. $copyright_bg['background-position'] : null,
			($copyright_bg['background-attachment'] != '') ? 'background-attachment:'. $copyright_bg['background-attachment'] : null,
			($copyright_bg['background-size'] != '') ? 'background-size:'. $copyright_bg['background-size'] : null,
			
		);
	
		$copyright_styles = implode('; ', array_filter($copyright_styles));	
		$custom_css .= '.site-info{'.$copyright_styles.'}';
	}
	
	// Copyright style
	(ot_get_option('copyright_text_align') != '') ? $custom_css .= '.site-info {text-align:'. ot_get_option('copyright_text_align') .'}' : '';
	(ot_get_option('copyright_separator_color') != '') ? $custom_css .= '.site-info .copyright-separator {border-color:'. ot_get_option('copyright_separator_color') .'}' : '';
	(ot_get_option('copyright_text_color') != '') ? $custom_css .= '.site-info .widget, .footer-sidebar .widget input, .site-info .widget-title{color:'. ot_get_option('copyright_text_color') .'}' : '';
	(ot_get_option('copyright_link') != '') ? $custom_css .= '.site-info .widget a{color:'. ot_get_option('copyright_link') .'}' : '';
	(ot_get_option('copyright_link_hover') != '') ? $custom_css .= '.site-info .widget a:hover{color:'. ot_get_option('copyright_link_hover') .'}' : '';
	(ot_get_option('copyright_widget_title') != '') ? $custom_css .= '.site-info .widget .widget-title{color:'. ot_get_option('copyright_widget_title') .'}' : '';


	
/*	
*	-------------------------------------------------------------------------------------------------
*	Misc
*	-------------------------------------------------------------------------------------------------
*/

	// Section pagination
	if( is_page() && get_post_meta( get_the_ID(), 'mnky_section_scroll', true) == 'on' ){
		if( get_post_meta( get_the_ID(), 'mnky_section_pagination_color', true) ){
			$custom_css .= '.section-pagination a:after{background:'. get_post_meta( get_the_ID(), 'mnky_section_pagination_color', true) .'}';
		}
		if( get_post_meta( get_the_ID(), 'mnky_section_pagination', true) == 'off' ){
			$custom_css .= '.section-pagination {display:none;}';
		}
	}	
	
	// Mobile style
	if ( class_exists('Mobile_Detect') ){
		$detect = new Mobile_Detect;
		if ( $detect->isMobile() ) {
			$custom_css .= '@media only screen and (max-width : 1024px){
				.wpb_row, .pre-content {background-attachment:scroll !important;}
			}';
		}
	}
	
	
	$custom_css = preg_replace('/\r|\n/', '', $custom_css);
	
	wp_add_inline_style( 'mnky_main', wp_strip_all_tags( $custom_css ) );
}

add_action('wp_enqueue_scripts', 'mnky_custom_css');