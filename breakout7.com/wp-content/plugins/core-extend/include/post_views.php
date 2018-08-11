<?php
// Track post views without a plugin using post meta. 
// Author: Kevin Chard 
// URL: http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
function mnky_getPostViews($postID){
    $count_key = 'mnky_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count == '' ){
		$count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
	
    return '<span class="mnky-views" title="'. esc_html__('Views' , 'core-extend') .'"><i class="post-icon icon-views"></i> '. esc_html($count) .'</span><meta itemprop="interactionCount" content="UserPageVisits:'. esc_html($count) .'"/>';
}

function mnky_getPostViewsRaw($postID){
    $count_key = 'mnky_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count == '' ){
		$count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
	
    return '<span class="mnky-views" title="'. esc_html__('Views' , 'core-extend') .'"><i class="post-icon icon-views"></i> '. esc_html($count) .'</span>';
}

function mnky_setPostViews($postID) {
    $count_key = 'mnky_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count=='' ){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
