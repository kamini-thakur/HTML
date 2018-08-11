<?php
$output = $color = $icon = $target = $link = $el_class = $title = $a_href = $a_title = $a_target = $a_rel = '';
	
	extract(shortcode_atts(array(
		'bg_color' => '',
		'color' => '',
		'center_element' => '',
		'link' => '',
		'icon_type' => '',
		'icon_fontawesome' => 'fa fa-info-circle',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'icon_linecons' => '',
		'icon_entypo' => '',
		'icon_material' => '',
		'el_class' => '',
		'title' => __('Text on the button', 'core-extend'),
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$center_element = $this->getExtraClass($center_element);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_button'.$center_element.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';

	vc_icon_element_fonts_enqueue( $icon_type );
	
	($icon_type != '') ? $icon = '<i class="'. esc_attr( trim( ${"icon_" . $icon_type} ) ) .'"></i>' : $icon = ''; 
	
	$inline_styles = array();
	
	if ( ! empty( $bg_color ) ) {
		$inline_styles [] = 'background: '.$bg_color.';';
	}
	if ( ! empty( $color ) ) {
		$inline_styles [] = 'color: '.$color.';';
	}
		
	$inline_styles = implode( ' ', $inline_styles );
	
	if ( ! empty( $inline_styles ) ) {
	$inline_styles = 'style="'. esc_attr( $inline_styles ) .'"';
	}
	
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
	$link_attributes[] = 'href="' .  esc_url( trim( $a_href ) ) . '"';
	$link_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$link_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$link_attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
	}
	
	$link_attributes = implode( ' ', $link_attributes );
	
	$output .= '<span>'. $icon . esc_html($title) .'</span>';
	if( $use_link ){
			$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><a '. $inline_styles .' ' .$link_attributes. '>' . $output . '</a></div>';
	} else {
			$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><a '. $inline_styles . '>' . $output . '</a></div>';
	}

echo $output . $this->endBlockComment('button') . "\n";