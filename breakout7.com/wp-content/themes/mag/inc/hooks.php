<?php

/**
 * Head top
 *
 * HTML context: top of head tag
 * Location: header.php
 */
function mnky_hook_head_top() {
	do_action( 'mnky_head_top' );
}

/**
 * Head bottom
 *
 * HTML context: bottom of head tag
 * Location: header.php
 */
function mnky_hook_head_bottom() {
	do_action( 'mnky_head_bottom' );
}

/**
 * Top of body
 *
 * HTML context: just after opening body tag
 * Location: header.php
 */
function mnky_hook_body_top() {
	do_action( 'mnky_body_top' );
}

/**
 * Bottom of body
 *
 * HTML context: just before closing body tab
 * Location: footer.php
 */
function mnky_hook_body_bottom() {
	do_action( 'mnky_body_bottom' );
}

/**
 * Top of page
 *
 * HTML context: before page content and sidebar
 * Location: page.php, page-left-sidebar.php, page-right-sidebar.php, page-no-paddings.php
 */
function mnky_hook_page_top() {
	do_action( 'mnky_page_top' );
}

/**
 * Bottom of page
 *
 * HTML context: after page content and sidebar
 * Location: page.php, page-left-sidebar.php, page-right-sidebar.php, page-no-paddings.php
 */
function mnky_hook_page_bottom() {
	do_action( 'mnky_page_bottom' );
}

/**
 * Top of page content
 *
 * HTML context: before page content
 * Location: page.php, page-left-sidebar.php, page-right-sidebar.php, page-no-paddings.php
 */
function mnky_hook_page_content_top() {
	do_action( 'mnky_page_content_top' );
}

/**
 * Bottom of page content
 *
 * HTML context: after page content
 * Location: page.php, page-left-sidebar.php, page-right-sidebar.php, page-no-paddings.php
 */
function mnky_hook_page_content_bottom() {
	do_action( 'mnky_page_content_bottom' );
}

/**
 * Top of post
 *
 * HTML context: before post content and sidebar
 * Location: single.php, single-left-sidebar.php, single-right-sidebar.php
 */
function mnky_hook_post_top() {
	do_action( 'mnky_post_top' );
}

/**
 * Bottom of post
 *
 * HTML context: after post content and sidebar
 * Location: page.php, single-left-sidebar.php, single-right-sidebar.php
 */
function mnky_hook_post_bottom() {
	do_action( 'mnky_post_bottom' );
}

/**
 * Top of post content
 *
 * HTML context: before post content
 * Location: single.php, single-left-sidebar.php, single-right-sidebar.php
 */
function mnky_hook_post_content_top() {
	do_action( 'mnky_post_content_top' );
}

/**
 * Bottom of post content
 *
 * HTML context: after post content
 * Location: page.php, single-left-sidebar.php, single-right-sidebar.php
 */
function mnky_hook_post_content_bottom() {
	do_action( 'mnky_post_content_bottom' );
}

/**
 * Footer top
 *
 * HTML context: before footer widgets
 * Location: sidebar-footer.php
 */
function mnky_hook_footer_top() {
	do_action( 'mnky_footer_top' );
}

/**
 * Footer bottom
 *
 * HTML context: after footer widgets
 * Location: sidebar-footer.php
 */
function mnky_hook_footer_bottom() {
	do_action( 'mnky_footer_bottom' );
}

/**
 * Copyright
 *
 * HTML context: after copyright area
 * Location: sidebar-footer.php
 */
function mnky_hook_copyright() {
	do_action( 'mnky_copyright' );
}
