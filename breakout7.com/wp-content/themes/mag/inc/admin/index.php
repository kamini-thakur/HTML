<?php
// Define welcome screen pages
add_action( 'admin_menu', 'mnky_welcome_screen' );
function mnky_welcome_screen(){
	if ( current_user_can( 'edit_theme_options' ) ) {
		add_theme_page( __( 'Install Demo', 'mag' ), 'Install Demo', 'administrator', 'mag-welcome', 'mnky_welcome' ); 
	}
}

// Include welcome screen pages
function mnky_welcome() {
	get_template_part( 'inc/admin/admin-pages/welcome' );
}

	
// let_to_num function.
function mnky_let_to_num( $size ) {
	$l   = substr( $size, -1 );
	$ret = substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
		case 'T':
			$ret *= 1024;
		case 'G':
			$ret *= 1024;
		case 'M':
			$ret *= 1024;
		case 'K':
			$ret *= 1024;
	}
	return $ret;
}
