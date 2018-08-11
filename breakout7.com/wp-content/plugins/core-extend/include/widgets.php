<?php
/*---------------------------------------------------------------*/
/* Create custom widgets
/*---------------------------------------------------------------*/

class mnky_article_block_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'mnky_article_block_widget', // Base ID
			esc_html__( 'MAG - Article Block', 'core-extend' ), // Name
			array( 'description' => esc_html__( 'Article block for widget area', 'core-extend' ),
			'customize_selective_refresh' => true,
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		$shortcode_args = '';
		
		if ( ! empty( $instance['title_size'] ) ) {
			$shortcode_args .= ' title_size="'. $instance['title_size'] .'"';
		}		
		if ( ! empty( $instance['layout'] ) ) {
			$shortcode_args .= ' layout="'. $instance['layout'] .'"';
		}			
		if ( ! empty( $instance['column_layout'] ) ) {
			$shortcode_args .= ' column_layout="'. $instance['column_layout'] .'"';
		}		
		if ( ! empty( $instance['thumbnail_size'] ) ) {
			$shortcode_args .= ' thumbnail_size="'. $instance['thumbnail_size'] .'"';
		}	
		if ( ! empty( $instance['bg_image_height'] ) ) {
			$shortcode_args .= ' bg_image_height="'. $instance['bg_image_height'] .'"';
		}		
		if ( ! empty( $instance['category'] ) ) {
			$shortcode_args .= ' taxonomy="category" category="'. $instance['category'] .'"';
		}		
		if ( ! empty( $instance['tag'] ) ) {
			if ( ! empty( $instance['category'] ) ) {
				$shortcode_args .= ' taxonomy_2="post_tag" tag_2="'. $instance['tag'] .'"';
			} else {
				$shortcode_args .= ' taxonomy="post_tag" tag="'. $instance['tag'] .'"';
			}
		}
		if ( ! empty( $instance['tax_relation'] ) ) {
			$shortcode_args .= ' tax_relation="'. $instance['tax_relation'] .'"';
		}			
		if ( ! empty( $instance['orderby'] ) ) {
			$shortcode_args .= ' orderby="'. $instance['orderby'] .'"';
		}		
		if ( ! empty( $instance['order'] ) ) {
			$shortcode_args .= ' order="'. $instance['order'] .'"';
		}		
		if ( ! empty( $instance['content_type'] ) ) {
			$shortcode_args .= ' content_type="'. $instance['content_type'] .'"';
		}		
		if ( ! empty( $instance['posts_per_page'] ) ) {
			$shortcode_args .= ' posts_per_page="'. $instance['posts_per_page'] .'"';
		}		
		if ( ! empty( $instance['time_limit'] ) ) {
			$shortcode_args .= ' time_limit="'. $instance['time_limit'] .'"';
		}		
		if ( ! empty( $instance['offset'] ) ) {
			$shortcode_args .= ' offset="'. $instance['offset'] .'"';
		}		
		if ( ! empty( $instance['post_nr'] ) ) {
			$shortcode_args .= ' post_nr="'. $instance['post_nr'] .'"';
		}		
		if ( ! empty( $instance['rating_hide'] ) ) {
			$shortcode_args .= ' rating_hide="'. $instance['rating_hide'] .'"';
		}
		if ( ! empty( $instance['views_hide'] ) ) {
			$shortcode_args .= ' views_hide="'. $instance['views_hide'] .'"';
		}
		if ( ! empty( $instance['comments_hide'] ) ) {
			$shortcode_args .= ' comments_hide="'. $instance['comments_hide'] .'"';
		}
		if ( ! empty( $instance['author_hide'] ) ) {
			$shortcode_args .= ' author_hide="'. $instance['author_hide'] .'"';
		}		
		if ( ! empty( $instance['label_hide'] ) ) {
			$shortcode_args .= ' label_hide="'. $instance['label_hide'] .'"';
		}		
		if ( ! empty( $instance['post_format_hide'] ) ) {
			$shortcode_args .= ' post_format_hide="'. $instance['post_format_hide'] .'"';
		}		
		if ( ! empty( $instance['post_format_text_hide'] ) ) {
			$shortcode_args .= ' post_format_text_hide="'. $instance['post_format_text_hide'] .'"';
		}
		if ( ! empty( $instance['date_hide'] ) ) {
			$shortcode_args .= ' date_hide="'. $instance['date_hide'] .'"';
		}
		if ( ! empty( $instance['cat_hide'] ) ) {
			$shortcode_args .= ' cat_hide="'. $instance['cat_hide'] .'"';
		}
		
		echo do_shortcode( wp_strip_all_tags( '[mnky_posts '. $shortcode_args .' allow_duplicate="yes" el_class="mp-widget"]') );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$title_size = isset( $instance['title_size'] ) ? $instance['title_size'] : '';
		$category = isset( $instance['category'] ) ? $instance['category'] : '';
		$tag = isset( $instance['tag'] ) ? $instance['tag'] : '';
		$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : '';
		$order = isset( $instance['order'] ) ? $instance['order'] : '';
		$content_type = isset( $instance['content_type'] ) ? $instance['content_type'] : '';
		$posts_per_page = isset( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : '4';
		$time_limit = isset( $instance['time_limit'] ) ? $instance['time_limit'] : '';
		$layout = isset( $instance['layout'] ) ? $instance['layout'] : '';
		$column_layout = isset( $instance['column_layout'] ) ? $instance['column_layout'] : '';
		$thumbnail_size = isset( $instance['thumbnail_size'] ) ? $instance['thumbnail_size'] : '';
		$bg_image_height = isset( $instance['bg_image_height'] ) ? $instance['bg_image_height'] : '';
		$offset = isset( $instance['offset'] ) ? $instance['offset'] : '0';
		$post_nr = isset( $instance['post_nr'] ) ? (bool) $instance['post_nr'] : false;
		$rating_hide = isset( $instance['rating_hide'] ) ? (bool) $instance['rating_hide'] : false;
		$views_hide = isset( $instance['views_hide'] ) ? (bool) $instance['views_hide'] : false;
		$label_hide = isset( $instance['label_hide'] ) ? (bool) $instance['label_hide'] : false;
		$comments_hide = isset( $instance['comments_hide'] ) ? (bool) $instance['comments_hide'] : false;
		$author_hide = isset( $instance['author_hide'] ) ? (bool) $instance['author_hide'] : false;
		$date_hide = isset( $instance['date_hide'] ) ? (bool) $instance['date_hide'] : false;
		$post_format_hide = isset( $instance['post_format_hide'] ) ? (bool) $instance['post_format_hide'] : false;
		$post_format_text_hide = isset( $instance['post_format_text_hide'] ) ? (bool) $instance['post_format_text_hide'] : false;
		$cat_hide = isset( $instance['cat_hide'] ) ? (bool) $instance['cat_hide'] : false;
		$tax_relation = isset( $instance['tax_relation'] ) ? $instance['tax_relation'] : '';
		
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'orderby' => 'date', 'order' => 'DESC', 'content_type' => '', 'title' => '', 'title_size' => '', 'category' => '', 'tag' => '', 'layout' => '1', 'column_layout' => 'column-count-1', 'thumbnail_size' => 'mnky_size-600x400', 'bg_image_height' => '', 'offset' => '0', 'time_limit' => '', 'post_nr' => '', 'rating_hide' => '', 'views_hide' => '', 'comments_hide' => '', 'author_hide' => '', 'post_format_hide' => '', 'post_format_text_hide' => '', 'label_hide' => '', 'date_hide' => '', 'cat_hide' => '', 'tax_relation' => 'OR') );
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" class="widefat">
				<option value="1"<?php selected( $instance['layout'], '1' ); ?>><?php esc_html_e('Image on top', 'core-extend'); ?></option>
				<option value="2"<?php selected( $instance['layout'], '2' ); ?>><?php esc_html_e('Image on the left'); ?></option>
				<option value="3"<?php selected( $instance['layout'], '3' ); ?>><?php esc_html_e('List', 'core-extend'); ?></option>
				<option value="4"<?php selected( $instance['layout'], '4' ); ?>><?php esc_html_e('List with image', 'core-extend'); ?></option>
				<option value="5"<?php selected( $instance['layout'], '5' ); ?>><?php esc_html_e('Content over image', 'core-extend'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'column_layout' ) ); ?>"><?php esc_html_e( 'Columns:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'column_layout' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'column_layout' ) ); ?>" class="widefat">
				<option value="column-count-1"<?php selected( $instance['column_layout'], 'column-count-1' ); ?>><?php esc_html_e('One column', 'core-extend'); ?></option>
				<option value="column-count-2"<?php selected( $instance['column_layout'], 'column-count-2' ); ?>><?php esc_html_e('Two columns'); ?></option>
				<option value="column-count-3"<?php selected( $instance['column_layout'], 'column-count-3' ); ?>><?php esc_html_e('Three columns', 'core-extend'); ?></option>
				<option value="column-count-4"<?php selected( $instance['column_layout'], 'column-count-4' ); ?>><?php esc_html_e('Four columns', 'core-extend'); ?></option>
				<option value="column-count-5"<?php selected( $instance['column_layout'], 'column-count-5' ); ?>><?php esc_html_e('Five columns', 'core-extend'); ?></option>				
				<option value="column-count-6"<?php selected( $instance['column_layout'], 'column-count-6' ); ?>><?php esc_html_e('Six columns', 'core-extend'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_size' ) ); ?>"><?php esc_html_e( 'Custom title size (e.g. 24px):', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_size' ) ); ?>" type="text" value="<?php echo esc_attr( $title_size ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail_size' ) ); ?>"><?php esc_html_e( 'Thumbnail size (not used in list style):', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_size' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_size' ) ); ?>" class="widefat">
				<option value="mnky_size-600x400"<?php selected( $instance['thumbnail_size'], 'column-count-1' ); ?>><?php esc_html_e('600x400', 'core-extend'); ?></option>
				<option value="mnky_size-100x100"<?php selected( $instance['thumbnail_size'], 'mnky_size-100x100' ); ?>><?php esc_html_e('100x100'); ?></option>
				<option value="mnky_size-200x200"<?php selected( $instance['thumbnail_size'], 'mnky_size-200x200' ); ?>><?php esc_html_e('200x200', 'core-extend'); ?></option>
				<option value="mnky_size-300x200"<?php selected( $instance['thumbnail_size'], 'mnky_size-300x200' ); ?>><?php esc_html_e('300x200', 'core-extend'); ?></option>
				<option value="mnky_size-1200x800"<?php selected( $instance['thumbnail_size'], 'mnky_size-1200x800' ); ?>><?php esc_html_e('1200x800', 'core-extend'); ?></option>				
				<option value="thumbnail"<?php selected( $instance['thumbnail_size'], 'thumbnail' ); ?>><?php esc_html_e('Thumbnail', 'core-extend'); ?></option>
				<option value="medium"<?php selected( $instance['thumbnail_size'], 'medium' ); ?>><?php esc_html_e('Medium', 'core-extend'); ?></option>
				<option value="medium_large"<?php selected( $instance['thumbnail_size'], 'medium_large' ); ?>><?php esc_html_e('Medium large', 'core-extend'); ?></option>
				<option value="large"<?php selected( $instance['thumbnail_size'], 'large' ); ?>><?php esc_html_e('Large', 'core-extend'); ?></option>
				<option value="full"<?php selected( $instance['thumbnail_size'], 'full' ); ?>><?php esc_html_e('Full', 'core-extend'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bg_image_height' ) ); ?>"><?php esc_html_e( 'Background image height (for content over image style, e.g. 300px):', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bg_image_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_image_height' ) ); ?>" type="text" value="<?php echo esc_attr( $bg_image_height ); ?>">
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category: (comma separated SLUGS)', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" type="text" value="<?php echo esc_attr( $category ); ?>">
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>"><?php esc_html_e( 'Tag: (comma separated SLUGS)', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag' ) ); ?>" type="text" value="<?php echo esc_attr( $tag ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tax_relation' ) ); ?>"><?php esc_html_e( 'Taxonomy relation:', 'core-extend' ); ?></label> 			
			<select name="<?php echo esc_attr( $this->get_field_name( 'tax_relation' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'tax_relation' ) ); ?>" class="widefat">
				<option value="OR"<?php selected( $instance['tax_relation'], 'OR' ); ?>><?php esc_html_e('OR', 'core-extend'); ?></option>
				<option value="AND"<?php selected( $instance['tax_relation'], 'AND' ); ?>><?php esc_html_e('AND', 'core-extend'); ?></option>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php esc_html_e( 'Posts per page:', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_per_page' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'time_limit' ) ); ?>"><?php esc_html_e( 'Limit posts by time period:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'time_limit' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'time_limit' ) ); ?>" class="widefat">
				<option value=""><?php esc_html_e( 'No Limit', 'core-extend' ); ?></option>
				<option value="today"<?php selected( $instance['time_limit'], 'today' ); ?>><?php esc_html_e('Today', 'core-extend'); ?></option>
				<option value="week"<?php selected( $instance['time_limit'], 'week' ); ?>><?php esc_html_e('This Week', 'core-extend'); ?></option>
				<option value="month"<?php selected( $instance['time_limit'], 'month' ); ?>><?php esc_html_e('This Month', 'core-extend'); ?></option>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order By:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat">
				<option value="date"<?php selected( $instance['orderby'], 'date' ); ?>><?php esc_html_e('Date', 'core-extend'); ?></option>
				<option value="meta_value_num"<?php selected( $instance['orderby'], 'meta_value_num' ); ?>><?php esc_html_e('By post views', 'core-extend'); ?></option>
				<option value="modified"<?php selected( $instance['orderby'], 'modified' ); ?>><?php esc_html_e('By last modified date', 'core-extend'); ?></option>
				<option value="comment_count"<?php selected( $instance['orderby'], 'comment_count' ); ?>><?php esc_html_e('By number of comments', 'core-extend'); ?></option>
				<option value="rand"<?php selected( $instance['orderby'], 'rand' ); ?>><?php esc_html_e('Random order', 'core-extend'); ?></option>
				<option value="title"<?php selected( $instance['orderby'], 'title' ); ?>><?php esc_html_e('By title', 'core-extend'); ?></option>
				<option value="ID"<?php selected( $instance['orderby'], 'ID' ); ?>><?php esc_html_e('By ID', 'core-extend'); ?></option>
				<option value="author"<?php selected( $instance['orderby'], 'author' ); ?>><?php esc_html_e('By author', 'core-extend'); ?></option>
				<option value="name"<?php selected( $instance['orderby'], 'name' ); ?>><?php esc_html_e('By post slug', 'core-extend'); ?></option>
				<option value="parent"<?php selected( $instance['orderby'], 'parent' ); ?>><?php esc_html_e('By post/page parent id', 'core-extend'); ?></option>
				<option value="none"<?php selected( $instance['orderby'], 'none' ); ?>><?php esc_html_e('No order', 'core-extend'); ?></option>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
				<option value="DESC"<?php selected( $instance['order'], 'DESC' ); ?>><?php esc_html_e('DESC', 'core-extend'); ?></option>
				<option value="ASC"<?php selected( $instance['order'], 'ASC' ); ?>><?php esc_html_e('ASC', 'core-extend'); ?></option>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content_type' ) ); ?>"><?php esc_html_e( 'Choose content type:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'content_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
				<option value=""<?php selected( $instance['content_type'], '' ); ?>><?php esc_html_e('No Content', 'core-extend'); ?></option>
				<option value="excerpt"<?php selected( $instance['content_type'], 'excerpt' ); ?>><?php esc_html_e('Excerpt', 'core-extend'); ?></option>
				<option value="content_full"<?php selected( $instance['content_type'], 'content_full' ); ?>><?php esc_html_e('Full Content', 'core-extend'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Offset:', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo esc_attr( $offset ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_nr' ) ); ?>"><?php esc_html_e( 'Add post number before the title (for list & list with image style)?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $post_nr ); ?> id="<?php echo esc_attr( $this->get_field_id( 'post_nr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_nr' ) ); ?>" />
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'label_hide' ) ); ?>"><?php esc_html_e( 'Hide post labels?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $label_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'label_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'label_hide' ) ); ?>" />
		</p>			
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rating_hide' ) ); ?>"><?php esc_html_e( 'Hide review rating?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $rating_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'rating_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rating_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'views_hide' ) ); ?>"><?php esc_html_e( 'Hide views count?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $views_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'views_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'views_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'comments_hide' ) ); ?>"><?php esc_html_e( 'Hide comment count?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $comments_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'comments_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'comments_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_hide' ) ); ?>"><?php esc_html_e( 'Hide author?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $author_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'author_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'date_hide' ) ); ?>"><?php esc_html_e( 'Hide date?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $date_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'date_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cat_hide' ) ); ?>"><?php esc_html_e( 'Hide category?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $cat_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'cat_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_hide' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_format_hide' ) ); ?>"><?php esc_html_e( 'Hide post format? ', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $post_format_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'post_format_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_format_hide' ) ); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_format_text_hide' ) ); ?>"><?php esc_html_e( 'Hide post format text (show icon only)?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $post_format_text_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'post_format_text_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_format_text_hide' ) ); ?>" />
		</p>		
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['title_size'] = sanitize_text_field( $new_instance['title_size'] );
		$instance['bg_image_height'] = sanitize_text_field( $new_instance['bg_image_height'] );
		$instance['category'] = sanitize_text_field( $new_instance['category'] );	
		$instance['tag'] = sanitize_text_field( $new_instance['tag'] );	
		$instance['posts_per_page'] = sanitize_text_field( $new_instance['posts_per_page'] );	
		$instance['offset'] = sanitize_text_field( $new_instance['offset'] );
		$instance['post_nr'] = isset( $new_instance['post_nr'] ) ? 'on' : false;
		$instance['rating_hide'] = isset( $new_instance['rating_hide'] ) ? 'off' : false;
		$instance['views_hide'] = isset( $new_instance['views_hide'] ) ? 'off' : false;
		$instance['comments_hide'] = isset( $new_instance['comments_hide'] ) ? 'off' : false;
		$instance['author_hide'] = isset( $new_instance['author_hide'] ) ? 'off' : false;
		$instance['date_hide'] = isset( $new_instance['date_hide'] ) ? 'off' : false;
		$instance['cat_hide'] = isset( $new_instance['cat_hide'] ) ? 'off' : false;
		$instance['post_format_text_hide'] = isset( $new_instance['post_format_text_hide'] ) ? 'off' : false;
		$instance['post_format_hide'] = isset( $new_instance['post_format_hide'] ) ? 'off' : false;
		$instance['label_hide'] = isset( $new_instance['label_hide'] ) ? 'off' : false;
		
		
		if ( in_array( $new_instance['orderby'], array( 'date', 'meta_value_num', 'modified', 'comment_count', 'rand', 'title', 'ID', 'author', 'name', 'parent', 'none' ) ) ) {
			$instance['orderby'] = $new_instance['orderby'];
		} else {
			$instance['orderby'] = 'date';
		}
		
		if ( in_array( $new_instance['content_type'], array( 'excerpt', 'content_full') ) ) {
			$instance['content_type'] = $new_instance['content_type'];
		} else {
			$instance['content_type'] = '';
		}
		
		if ( in_array( $new_instance['order'], array( 'DESC', 'ASC' ) ) ) {
			$instance['order'] = $new_instance['order'];
		} else {
			$instance['order'] = 'DESC';
		}	
		
		if ( in_array( $new_instance['layout'], array( '1', '2', '3', '4', '5' ) ) ) {
			$instance['layout'] = $new_instance['layout'];
		} else {
			$instance['layout'] = '1';
		}		
		
		if ( in_array( $new_instance['column_layout'], array( 'column-count-1', 'column-count-2', 'column-count-3', 'column-count-4', 'column-count-5', 'column-count-6' ) ) ) {
			$instance['column_layout'] = $new_instance['column_layout'];
		} else {
			$instance['column_layout'] = 'column-count-1';
		}		
		
		if ( in_array( $new_instance['thumbnail_size'], array( 'mnky_size-600x400', 'mnky_size-100x100', 'mnky_size-200x200', 'mnky_size-300x200', 'mnky_size-1200x800', 'thumbnail', 'medium', 'medium_large', 'large', 'full' ) ) ) {
			$instance['thumbnail_size'] = $new_instance['thumbnail_size'];
		} else {
			$instance['thumbnail_size'] = 'column-count-1';
		}

		if ( in_array( $new_instance['tax_relation'], array( 'OR', 'AND' ) ) ) {
			$instance['tax_relation'] = $new_instance['tax_relation'];
		} else {
			$instance['tax_relation'] = 'OR';
		}		
		
		if ( in_array( $new_instance['time_limit'], array( 'today', 'week', 'month' ) ) ) {
			$instance['time_limit'] = $new_instance['time_limit'];
		} else {
			$instance['time_limit'] = '';
		}
		

		return $instance;
	}

}

// register widget
function register_mnky_article_block_widget() {
    register_widget( 'mnky_article_block_widget' );
}
add_action( 'widgets_init', 'register_mnky_article_block_widget' );




class mnky_related_posts_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'mnky_related_posts_widget', // Base ID
			esc_html__( 'MAG - Related Posts', 'core-extend' ), // Name
			array( 'description' => esc_html__( 'Display related posts', 'core-extend' ),
			'customize_selective_refresh' => true,
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		$shortcode_args = '';
	
		if ( ! empty( $instance['id'] ) ) {
			$shortcode_args .= ' id="'. $instance['id'] .'"';
		}		
		if ( ! empty( $instance['orderby'] ) ) {
			$shortcode_args .= ' orderby="'. $instance['orderby'] .'"';
		}		
		if ( ! empty( $instance['order'] ) ) {
			$shortcode_args .= ' order="'. $instance['order'] .'"';
		}		
		if ( ! empty( $instance['num'] ) ) {
			$shortcode_args .= ' num="'. $instance['num'] .'"';
		}			
		if ( ! empty( $instance['tax_relation'] ) ) {
			$shortcode_args .= ' tax_relation="'. $instance['tax_relation'] .'"';
		}		
		if ( ! empty( $instance['offset'] ) ) {
			$shortcode_args .= ' offset="'. $instance['offset'] .'"';
		}		
		if ( ! empty( $instance['no_tags'] ) ) {
			$shortcode_args .= ' no_tags="'. $instance['no_tags'] .'"';
		}
		if ( ! empty( $instance['label_show'] ) ) {
			$shortcode_args .= ' label_show="'. $instance['label_show'] .'"';
		}	
		if ( ! empty( $instance['post_format_hide'] ) ) {
			$shortcode_args .= ' post_format_hide="'. $instance['post_format_hide'] .'"';
		}	
		if ( ! empty( $instance['post_format_text_hide'] ) ) {
			$shortcode_args .= ' post_format_text_hide="'. $instance['post_format_text_hide'] .'"';
		}	

		echo do_shortcode ( wp_strip_all_tags ('[mnky_related_posts '. $shortcode_args .']' ) );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$num = isset( $instance['num'] ) ? $instance['num'] : '';
		$id = isset( $instance['id'] ) ? $instance['id'] : '';
		$offset = isset( $instance['offset'] ) ? $instance['offset'] : '0';
		$tax_relation = isset( $instance['tax_relation'] ) ? $instance['tax_relation'] : '';
		$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : '';
		$order = isset( $instance['order'] ) ? $instance['order'] : '';
		$no_tags = isset( $instance['no_tags'] ) ? (bool) $instance['no_tags'] : false;
		$label_show = isset( $instance['label_show'] ) ? (bool) $instance['label_show'] : false;
		$post_format_hide= isset( $instance['post_format_hide'] ) ? (bool) $instance['post_format_hide'] : false;
		$post_format_text_hide = isset( $instance['post_format_text_hide'] ) ? (bool) $instance['post_format_text_hide'] : false;
		
		// Defaults
		$instance = wp_parse_args( (array) $instance, array( 'orderby' => 'date', 'order' => 'DESC', 'title' => '', 'offset' => '0', 'tax_relation' => 'OR', 'num' => '4', 'id' => '', 'no_tags' => false, 'post_format_hide' => '', 'post_format_text_hide' => '', 'label_hide' => '') );
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no_tags' ) ); ?>"><?php esc_html_e( 'Display only category related posts (no tags)?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $no_tags ); ?> id="<?php echo esc_attr( $this->get_field_id( 'no_tags' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no_tags' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tax_relation' ) ); ?>"><?php esc_html_e( 'Taxonomy relation:', 'core-extend' ); ?></label> 			
			<select name="<?php echo esc_attr( $this->get_field_name( 'tax_relation' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'tax_relation' ) ); ?>" class="widefat">
				<option value="OR"<?php selected( $instance['tax_relation'], 'OR' ); ?>><?php esc_html_e('OR', 'core-extend'); ?></option>
				<option value="AND"<?php selected( $instance['tax_relation'], 'AND' ); ?>><?php esc_html_e('AND', 'core-extend'); ?></option>
			</select>
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"><?php esc_html_e( 'Display related posts for specific post ID (optional):', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>">
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>"><?php esc_html_e( 'How many posts to display:', 'core-extend' ); ?></label> 			
			<select name="<?php echo esc_attr( $this->get_field_name( 'num' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>" class="widefat">
				<option value="1"<?php selected( $instance['num'], '1' ); ?>><?php esc_html_e('1', 'core-extend'); ?></option>
				<option value="2"<?php selected( $instance['num'], '2' ); ?>><?php esc_html_e('2', 'core-extend'); ?></option>
				<option value="3"<?php selected( $instance['num'], '3' ); ?>><?php esc_html_e('3', 'core-extend'); ?></option>
				<option value="4"<?php selected( $instance['num'], '4' ); ?>><?php esc_html_e('4', 'core-extend'); ?></option>
				<option value="5"<?php selected( $instance['num'], '5' ); ?>><?php esc_html_e('5', 'core-extend'); ?></option>
				<option value="6"<?php selected( $instance['num'], '6' ); ?>><?php esc_html_e('6', 'core-extend'); ?></option>
			</select>
		</p>									
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order By:' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat">
				<option value="date"<?php selected( $instance['orderby'], 'date' ); ?>><?php esc_html_e('Date', 'core-extend'); ?></option>
				<option value="meta_value_num"<?php selected( $instance['orderby'], 'meta_value_num' ); ?>><?php esc_html_e('By post views', 'core-extend'); ?></option>
				<option value="modified"<?php selected( $instance['orderby'], 'modified' ); ?>><?php esc_html_e('By last modified date', 'core-extend'); ?></option>
				<option value="comment_count"<?php selected( $instance['orderby'], 'comment_count' ); ?>><?php esc_html_e('By number of comments', 'core-extend'); ?></option>
				<option value="rand"<?php selected( $instance['orderby'], 'rand' ); ?>><?php esc_html_e('Random order', 'core-extend'); ?></option>
				<option value="title"<?php selected( $instance['orderby'], 'title' ); ?>><?php esc_html_e('By title', 'core-extend'); ?></option>
				<option value="ID"<?php selected( $instance['orderby'], 'ID' ); ?>><?php esc_html_e('By ID', 'core-extend'); ?></option>
				<option value="author"<?php selected( $instance['orderby'], 'author' ); ?>><?php esc_html_e('By author', 'core-extend'); ?></option>
				<option value="name"<?php selected( $instance['orderby'], 'name' ); ?>><?php esc_html_e('By post slug', 'core-extend'); ?></option>
				<option value="parent"<?php selected( $instance['orderby'], 'parent' ); ?>><?php esc_html_e('By post/page parent id', 'core-extend'); ?></option>
				<option value="none"<?php selected( $instance['orderby'], 'none' ); ?>><?php esc_html_e('No order', 'core-extend'); ?></option>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order:', 'core-extend' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
				<option value="DESC"<?php selected( $instance['order'], 'DESC' ); ?>><?php esc_html_e('DESC', 'core-extend'); ?></option>
				<option value="ASC"<?php selected( $instance['order'], 'ASC' ); ?>><?php esc_html_e('ASC', 'core-extend'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Offset:', 'core-extend' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo esc_attr( $offset ); ?>">
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'label_show' ) ); ?>"><?php esc_html_e( 'Show post labels?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $label_show ); ?> id="<?php echo esc_attr( $this->get_field_id( 'label_show' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'label_show' ) ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_format_hide' ) ); ?>"><?php esc_html_e( 'Hide post format?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $post_format_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'post_format_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_format_hide' ) ); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_format_text_hide' ) ); ?>"><?php esc_html_e( 'Hide post format text (show icon only)?', 'core-extend' ); ?></label><br>
			<input class="checkbox" type="checkbox"<?php checked( $post_format_text_hide ); ?> id="<?php echo esc_attr( $this->get_field_id( 'post_format_text_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_format_text_hide' ) ); ?>" />
		</p>			
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['id'] = sanitize_text_field( $new_instance['id'] );	
		$instance['offset'] = sanitize_text_field( $new_instance['offset'] );	
		$instance['no_tags'] = isset( $new_instance['no_tags'] ) ? 'on' : false;
		$instance['label_show'] = isset( $new_instance['label_show'] ) ? 'on' : false;
		$instance['post_format_hide'] = isset( $new_instance['post_format_hide'] ) ? 'off' : false;
		$instance['post_format_text_hide'] = isset( $new_instance['post_format_text_hide'] ) ? 'off' : false;
		
		if ( in_array( $new_instance['tax_relation'], array( 'OR', 'AND' ) ) ) {
			$instance['tax_relation'] = $new_instance['tax_relation'];
		} else {
			$instance['tax_relation'] = 'OR';
		}	
		
		if ( in_array( $new_instance['num'], array( '1', '2', '3', '4', '5', '6' ) ) ) {
			$instance['num'] = $new_instance['num'];
		} else {
			$instance['num'] = '4';
		}	
		
		if ( in_array( $new_instance['orderby'], array( 'date', 'meta_value_num', 'modified', 'comment_count', 'rand', 'title', 'ID', 'author', 'name', 'parent', 'none' ) ) ) {
			$instance['orderby'] = $new_instance['orderby'];
		} else {
			$instance['orderby'] = 'date';
		}
		
		if ( in_array( $new_instance['order'], array( 'DESC', 'ASC' ) ) ) {
			$instance['order'] = $new_instance['order'];
		} else {
			$instance['order'] = 'DESC';
		}	
		

		return $instance;
	}

}

// register widget
function register_mnky_related_posts_widget() {
    register_widget( 'mnky_related_posts_widget' );
}
add_action( 'widgets_init', 'register_mnky_related_posts_widget' );