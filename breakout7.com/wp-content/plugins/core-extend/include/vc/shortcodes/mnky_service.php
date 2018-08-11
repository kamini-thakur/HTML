<?php
$output = $heading_style = $text_style = $icon_style = $link = $a_href = $a_title = $a_target = $a_rel = '';
	
	extract(shortcode_atts(array(
		'el_class' => '',
		'title' => 'Your service title',
		'icon_color' => '',
		'heading_color' => '',
		'text_color' => '',
		'link' => '',
		'position' => '',
		'icon_type' => 'fontawesome',
		'icon_fontawesome' => 'fa fa-info-circle',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'icon_linecons' => '',
		'icon_entypo' => '',
		'icon_material' => '',
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$position = $this->getExtraClass($position);
	($icon_color != '') ? $icon_style = 'style="color:' . esc_attr( $icon_color ) . ';"' : '';
	($heading_color != '') ? $heading_style = 'style="color:' . esc_attr( $heading_color ) . ';"' : '';
	($text_color != '') ? $text_style = 'style="color:' . esc_attr( $text_color ) . ';"' : '';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'service_icon', $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	vc_icon_element_fonts_enqueue( $icon_type );

	//parse link
	$link = ( '||' === $link ) ? '' : $link;
	$link = vc_build_link( $link );
	$use_link = false;
	if ( strlen( $link['url'] ) > 0 ) {
		$use_link = true;
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];
		$a_rel = $link['rel'];
	}
	
	$link_attributes = array();
	
	if ( $use_link ) {
	$link_attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
	$link_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$link_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$link_attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
	}
	
	$link_attributes = implode( ' ', $link_attributes );
	
	if ( $use_link ) {
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><i '. $icon_style .' " class="'.esc_attr( ${"icon_" . $icon_type} ).'"></i></div>';
		$output .= '<div class="service-content" '. $text_style .'><h5 '. $heading_style .'>'. esc_html( $title ) .'</h5>';
		$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';
		$output = '<div class="clearfix mnky_service-box'. esc_attr( $el_class ) . esc_attr( $position ) .'"><a ' .$link_attributes. '>' . $output . '</a></div>';
	} else {
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><i '. $icon_style .' class="'.esc_attr( ${"icon_" . $icon_type} ).'"></i></div>';
		$output .= '<div class="service-content" '. $text_style .'><h5 '. $heading_style .'>'. esc_html( $title ) .'</h5>';
		$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';
		$output = '<div class="clearfix mnky_service-box'. esc_attr( $el_class ) . esc_attr( $position ) .'">' . $output . '</div>';
	}

	
echo $output;
