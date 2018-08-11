<?php
$output = $cat_name = $cat_id = $cat_url = '';

	extract(shortcode_atts(array(
		'category' => '',
		'img_url' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'a_title'  => '',
		'a_target'  => '',
		'a_rel'  => '',
		'el_class' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_category'.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	if($img_url != '') {
		$image_alt = get_post_meta($img_url, '_wp_attachment_image_alt', true);	
		$img = wp_get_attachment_image ( $img_url, 'mnky_size-600x400');
	} else {
		$img = '';
		$image_alt = '';
	}

	if($category != ''){
		$category = get_category_by_slug($category); 
		$cat_name = $category->name;
		$cat_id = $category->term_id;
		$cat_url = get_category_link($cat_id);
	}
	
	$link_attributes = array();
	if ( ! empty( $a_title ) ) {
		$link_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	}
	if ( ! empty( $a_target ) ) {
		$link_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$link_attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
	$link_attributes = implode( ' ', $link_attributes );
	
	$output = '<a class="mnky_category_link" href="'. esc_url( $cat_url ) .'" '. $link_attributes .'><figure class="'. esc_attr( trim( $css_class ) ) .'"><div class="mnky_category_image">'. $img .'</div><figcaption><span>'. esc_html( $cat_name ) .'</span></figcaption></figure></a>';

echo $output;
