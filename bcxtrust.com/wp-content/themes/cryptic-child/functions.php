<?php
function cryptic_child_scripts() {
    wp_enqueue_style( 'cryptic-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'cryptic_child_scripts' );
?><?php
 
// Your php code goes here

?>