<?php
/*	
*	---------------------------------------------------------------------
*	Mag child theme functions
*	--------------------------------------------------------------------- 
*/

// Theme setup
add_action( 'wp_enqueue_scripts', 'mag_child_enqueue_styles' );
function mag_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// add the extra sidebar

add_action( 'widgets_init', 'child_extra_sidebar' );

function child_extra_sidebar(){
    register_sidebar(array(
        'name' => 'Extra widget',
        'id' => 'sidebar-extra',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="extrasidebar">',
        'after_title' => '</h4>',
    ));
}