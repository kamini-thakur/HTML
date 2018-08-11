<?php

if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}


/**
||-> cryptic_redux
*/
function cryptic_redux($redux_meta_name1 = '',$redux_meta_name2 = ''){

    global  $cryptic_redux;

    $html = '';
    if (isset($redux_meta_name1) && !empty($redux_meta_name2)) {
        $html = $cryptic_redux[$redux_meta_name1][$redux_meta_name2];
    }elseif(isset($redux_meta_name1) && empty($redux_meta_name2)){
        $html = $cryptic_redux[$redux_meta_name1];
    }
    
    return $html;

}


/**
||-> cryptic_setup
*/
function cryptic_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on cryptic, use a find and replace
     * to change 'cryptic' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'cryptic', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary menu', 'cryptic' )
    ) );

    global  $cryptic_redux;

    // ADD THEME SUPPORT
    // WOOCOMMERCE
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    // ADD THEME SUPPORT
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    // Enable support for Post Formats.
    add_theme_support( 'custom-background', apply_filters( 'smartowl_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );// Set up the WP core custom background feature.

}
add_action( 'after_setup_theme', 'cryptic_setup' );


/**
||-> Register widget areas.
*/
function cryptic_widgets_init() {

    global  $cryptic_redux;

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'cryptic' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main Theme Sidebar', 'cryptic' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Woocommerce sidebar', 'cryptic' ),
        'id'            => 'woocommerce',
        'description'   => esc_attr__( 'Used on WooCommerce pages', 'cryptic' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    if (!empty($cryptic_redux['mt_dynamic_sidebars'])){
        foreach ($cryptic_redux['mt_dynamic_sidebars'] as &$value) {
            $id           = str_replace(' ', '', $value);
            $id_lowercase = strtolower($id);
            if ($id_lowercase) {
                register_sidebar( array(
                    'name'          => esc_attr($value),
                    'id'            => esc_attr($id_lowercase),
                    'description'   => esc_html__( 'Sidebar ', 'cryptic' ) . esc_attr($value),
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
    
    // FOOTER ROW 1
    if (isset($cryptic_redux['mt_footer_row_1_layout'])) {
        $footer_row_1 = $cryptic_redux['mt_footer_row_1_layout'];
        $nr1 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_1, $nr1)) {
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_half_sub_half' || $footer_row_1 == 'column_sub_half_half') {
            $footer_row_1 = '3';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_fourth_third' || $footer_row_1 == 'column_third_sub_fourth') {
            $footer_row_1 = '5';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_third_half' || $footer_row_1 == 'column_half_sub_third') {
            $footer_row_1 = '4';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    // FOOTER ROW 2
    if (isset($cryptic_redux['mt_footer_row_2_layout'])) {
        $footer_row_2 = $cryptic_redux['mt_footer_row_2_layout'];
        $nr2 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_2, $nr2)) {
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_url($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_half_sub_half' || $footer_row_2 == 'column_sub_half_half') {
            $footer_row_2 = '3';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_fourth_third' || $footer_row_2 == 'column_third_sub_fourth') {
            $footer_row_2 = '5';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_third_half' || $footer_row_2 == 'column_half_sub_third') {
            $footer_row_2 = '4';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    // FOOTER ROW 3
    if (isset($cryptic_redux['mt_footer_row_3_layout'])) {
        $footer_row_3 = $cryptic_redux['mt_footer_row_3_layout'];
        $nr3 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_3, $nr3)) {
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ', 'cryptic').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_half_sub_half' || $footer_row_3 == 'column_sub_half_half') {
            $footer_row_3 = '3';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_fourth_third' || $footer_row_3 == 'column_third_sub_fourth') {
            $footer_row_3 = '5';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_third_half' || $footer_row_3 == 'column_half_sub_third') {
            $footer_row_3 = '4';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','cryptic').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'cryptic' ) . esc_attr($i),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
}
add_action( 'widgets_init', 'cryptic_widgets_init' );


/**
||-> Enqueue scripts and styles.
*/
function cryptic_scripts() {

    global  $cryptic_redux;

    //STYLESHEETS
    wp_enqueue_style( "font-awesome", get_template_directory_uri().'/css/font-awesome.min.css' );
    // wp_enqueue_style( "cryptocoins", get_template_directory_uri().'/fonts/cryptocoins.css' );
    wp_enqueue_style( "cryptic-responsive", get_template_directory_uri().'/css/responsive.css' );
    wp_enqueue_style( "cryptic-media-screens", get_template_directory_uri().'/css/media-screens.css' );
    wp_enqueue_style( "owl-carousel", get_template_directory_uri().'/css/owl.carousel.css' );
    wp_enqueue_style( "animate", get_template_directory_uri().'/css/animate.css' );
    wp_enqueue_style( "cryptic-style", get_template_directory_uri().'/css/styles.css' );
    wp_enqueue_style( 'cryptic-mt-style', get_stylesheet_uri() );
    wp_enqueue_style( "cryptic-blogloops-style", get_template_directory_uri().'/css/styles-module-blogloops.css' );
    wp_enqueue_style( "cryptic-navigations-style", get_template_directory_uri().'/css/styles-module-navigations.css' );
    wp_enqueue_style( "cryptic-woocommerce-style", get_template_directory_uri().'/css/styles-module-woocommerce.css' );
    wp_enqueue_style( "cryptic-learnpress-style", get_template_directory_uri().'/css/styles-module-learnpress.css' );
    wp_enqueue_style( "cryptic-header-style", get_template_directory_uri().'/css/styles-headers.css' );
    wp_enqueue_style( "cryptic-footer-style", get_template_directory_uri().'/css/styles-footer.css' );
    wp_enqueue_style( "loaders", get_template_directory_uri().'/css/loaders.css' );
    // wp_enqueue_style( "simple-line-icons", get_template_directory_uri().'/css/simple-line-icons.css' );
    wp_enqueue_style( "js_composer", get_template_directory_uri().'/css/js_composer.css' );

    //SCRIPTS
    wp_enqueue_script( 'cryptic-plugins-js', get_template_directory_uri() . '/js/cryptic-plugins.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'cryptic-custom-js', get_template_directory_uri() . '/js/cryptic-custom.js', array('jquery'), '1.0.0', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'cryptic_scripts' );


/**
||-> Enqueue admin css/js
*/
function cryptic_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( "cryptic_admin_scripts", get_template_directory_uri().'/js/cryptic-admin-scripts.js' , array( 'jquery' ) );
    wp_enqueue_script( "loaders", get_template_directory_uri().'/js/loaders.css.js' , array( 'jquery' ) );
    // CSS
    wp_enqueue_style( "cryptic_admin_css", get_template_directory_uri().'/css/admin-style.css' );
    wp_enqueue_style( "loaders", get_template_directory_uri().'/css/loaders.css' );
}
add_action('admin_enqueue_scripts', 'cryptic_enqueue_admin_scripts');


/**
||-> Enqueue css to js_composer
*/
add_action( 'vc_base_register_front_css', 'cryptic_enqueue_front_css_foreever' );
function cryptic_enqueue_front_css_foreever() {
    wp_enqueue_style( 'js_composer_front' );
}


/**
||-> Enqueue css to redux
*/
function cryptic_register_fontawesome_to_redux() {
    wp_register_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), time(), 'all' );  
    wp_enqueue_style( 'font-awesome' );
}
add_action( 'redux/page/redux_demo/enqueue', 'cryptic_register_fontawesome_to_redux' );


/**
||-> Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
*/
add_action( 'vc_before_init', 'cryptic_vcSetAsTheme' );
function cryptic_vcSetAsTheme() {
    vc_set_as_theme( true );
}


/**
||-> Other required parts/files
*/
/* ========= LOAD CUSTOM FUNCTIONS ===================================== */
require_once get_template_directory() . '/inc/custom-functions.php';
require_once get_template_directory() . '/inc/custom-functions.header.php';
require_once get_template_directory() . '/inc/custom-functions.footer.php';
require_once get_template_directory() . '/inc/custom-functions.woocommerce.php';
/* ========= Customizer additions. ===================================== */
require_once get_template_directory() . '/inc/customizer.php';
/* ========= Load Jetpack compatibility file. ===================================== */
require_once get_template_directory() . '/inc/jetpack.php';
/* ========= Include the TGM_Plugin_Activation class. ===================================== */
require_once get_template_directory() . '/inc/tgm/include_plugins.php';
/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once get_template_directory() . '/redux-framework/modeltheme-config.php';
/* ========= CUSTOM COMMENTS ===================================== */
require_once get_template_directory() . '/inc/custom-comments.php';
/* ========= THEME DEFAULTS ===================================== */
require_once get_template_directory() . '/inc/theme-defaults.php';
/* ========= LEANRPRESS CUSTOM FUNCTIONs ===================================== */
require_once get_template_directory() . '/inc/custom-functions.learnpress.php';

/**
||-> add_image_size //Resize images
*/
/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'cryptic_related_post_pic500x300', 500, 300, true );
add_image_size( 'cryptic_post_pic700x450',         700, 450, true );
add_image_size( 'cryptic_post_widget_pic100x100',  100, 100, true );
add_image_size( 'cryptic_about_625x415',           625, 415, true );
add_image_size( 'cryptic_listing_archive_featured_square',    600, 370, true );
add_image_size( 'cryptic_listing_archive_featured',    800, 500, true );
add_image_size( 'cryptic_listing_archive_thumbnail',   300, 180, true );
add_image_size( 'cryptic_listing_single_featured',     1200, 200, true );
add_image_size( 'cryptic_news_shortcode_800x666',     800, 666, true );
add_image_size( 'cryptic_news_shortcode_1000x500',     1000, 500, true );
add_image_size( 'cryptic_post_archived',     800, 900, true );

// Blogloop-v2
add_image_size( 'cryptic_blog_900x550',           900, 550, true );




/**
||-> LIMIT POST CONTENT
*/
function cryptic_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}


/**
||-> BREADCRUMBS
*/
function cryptic_breadcrumb() {
    
    $delimiter = '';
    $html =  '';

    $name = esc_html__("Home", "cryptic");
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';

        if (!is_home() && !is_front_page() || is_paged()) {
            global  $post;
            $home = esc_url(home_url('/'));
            $html .= '<li><a href="' . esc_url($home) . '">' . esc_attr($name) . '</a></li> ' . esc_attr($delimiter) . '';
        
        if (is_category()) {
            global  $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
            $html .= (get_category_parents($parentCat, true, '' . esc_attr($delimiter) . ''));
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        }elseif (is_tax()) {
            global  $wp_query;
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        } elseif (is_day()) {
            $html .= '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . esc_attr($delimiter) . '';
            $html .= '<li><a href="' . esc_url(get_month_link(get_the_time('Y')), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . esc_attr($delimiter) . ' ';
            $html .= $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            $html .= '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . esc_attr($delimiter) . '';
            $html .= $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            $html .= $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_attachment()) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
            $html .= $currentBefore;
            $html .= esc_html__('Shop','cryptic');
            $html .= $currentAfter;
        } elseif (is_single()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                $html .= '<li>' . get_category_parents($cat, true, ' ' . esc_attr($delimiter) . '') . '</li>';
            }
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                $html .= $crumb . ' ' . esc_attr($delimiter) . ' ';
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_search()) {
            $html .= $currentBefore . get_search_query() . $currentAfter;
        } elseif (is_tag()) {
            $html .= $currentBefore . single_tag_title( '', false ) . $currentAfter;
        } elseif (is_author()) {
            global  $author;
            $userdata = get_userdata($author);
            $html .= $currentBefore . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            $html .= $currentBefore . esc_html__('404 Not Found','cryptic') . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentBefore;
            $html .= esc_html__('Page','cryptic') . ' ' . get_query_var('paged');
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentAfter;
        }
    }

    return $html;
}


/**
||-> PAGINATION
*/
if ( ! function_exists( 'cryptic_pagination' ) ) {
    function cryptic_pagination($query = null) {

        if (!$query) {
            global  $wp_query;
            $query = $wp_query;
        }
        
        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : '1');
        echo paginate_links( 
            array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => '?paged=%#%',
                'current'       => max( 1, $current ),
                'total'         => $query->max_num_pages,
                'prev_text'     => '&#171;',
                'next_text'     => '&#187;',
            )
        );
    }
}


/**
||-> SEARCH FOR POSTS ONLY
*/
if (!is_admin()) {
	function cryptic_search_filter($query) {
	    if ($query->is_search && !isset($_GET['post_type'])) {
	        if (!cryptic_plugin_active('modeltheme-framework/modeltheme-framework.php')) {
	            $query->set('post_type', 'post');
	        }else{
	            $query->set('post_type', 'post');
	        }
	    }
	    return $query;
	}
	add_filter('pre_get_posts','cryptic_search_filter');
}


/**
||-> FUNCTION: ADD EDITOR STYLE
*/
function cryptic_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'cryptic_add_editor_styles' );



/**
||-> REMOVE PLUGINS NOTIFICATIONS and NOTICES
*/
// |---> REVOLUTION SLIDER
if(function_exists( 'set_revslider_as_theme' )){
    add_action( 'init', 'cryptic_disable_revslider_update_notices' );
    function cryptic_disable_revslider_update_notices() {
        set_revslider_as_theme();
    }
}


// |---> REDUX FRAMEWORK
function cryptic_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'cryptic_RemoveDemoModeLink');

/* Custom class for login/register page to avoid duplicate id's */
function shortcode_class( $class ) {
    global $post;
    if( isset($post->post_content) && has_shortcode( $post->post_content, 'login-form' ) ) {
        $class[] = 'login-register-page';
    }
    return $class;
}
add_filter( 'body_class', 'shortcode_class' );


add_shortcode( 'login-form', 'my_login_form_shortcode' );

function my_login_form_shortcode() {

    $content = '';
    if ( is_user_logged_in() ) {
        $content .= '<div class="logged-in-shortcode">';
            $content .= '<div class="logged-in-content-shortcode">';
                $content .= '<h3>You are already logged in as '.wp_get_current_user()->user_login.'!</h3>';
                $content .= '<a class="back-home" href="'.esc_url(site_url()).'">'.esc_html__('Back to homepage','cryptic').'</a>';
            $content .= '</div>';
        $content .= '</div>';
        return $content;
    } else {
        $content .= '<div class="login-register-shortcode">';
            $content .= '<div id="login-content-shortcode">';
                $content .= '<h3 class="relative">'.esc_html__('Login to Your Account','cryptic').'</h3>';
                $content .= '<div class="login-content-row row">';
                    $content .= '<div class="col-md-12">';
                        $content .= wp_login_form(array( 'echo' => false ));
                        if(cryptic_plugin_active('ultimate-member/index.php')){ 
                            $content .= '<a class="btn btn-register-shortcode" id="register-btn-shortcode">'.esc_html__('Register','cryptic').'</a>';
                        }
                    $content .= '</div>';
                $content .= '</div>';
            $content .= '</div>';
            $content .= '<div id="register-content-shortcode">';
                $content .= '<h3 class="relative">'.esc_html__('Personal Details','cryptic').'</h3>';
                $content .= '<div class="register-content-row row">';
                    $content .= '<div class="col-md-12">';
                        $content .= do_shortcode('[ultimatemember form_id=7]');
                    $content .= '</div>';
                $content .= '</div>';
            $content .= '</div>';
        $content .= '</div>';
        return $content;
    }
}

/* Woocommerce new tab */ 

function crypto_tools_content($atts){
    $content = '';

    $slides = cryptic_redux('slides-crypto-tools');
    if(!empty($slides)) {
        foreach($slides as $slide) {

            $crypto_tools_title = '';
            if(!empty($slide['title'])) {
                $crypto_tools_title = $slide['title'];
            }
            $crypto_tools_description = '';
            if(!empty($slide['description'])) {
                $crypto_tools_description = $slide['description'];
            }
            $crypto_tools_url = '';
            if(!empty($slide['url'])) {
                $crypto_tools_url = $slide['url'];
            }
            $crypto_tools_image = '';
            if(!empty($slide['image'])) {
                $crypto_tools_image = $slide['image'];
            }

            $content .= '<div class="crypto-tools-parent currency-exchange">';
                $content .= '<div class="crypto-tools-image">';
                    $content .= '<a href="'.esc_attr($crypto_tools_url).'"><img src="'.esc_attr($crypto_tools_image).'"></a>';
                $content .= '</div>';
                $content .= '<div class="crypto-tools-content">';
                    $content .= '<a href="'.esc_attr($crypto_tools_url).'"><h3 class="crypto-tools-title">'.esc_attr($crypto_tools_title).'</h3></a>';
                    $content .= '<p class="crypto-tools-paragraph">'.esc_attr($crypto_tools_description).'</p>';
                $content .= '</div>';
                $content .= '<div class="crypto-tools-button">';
                    $content .= '<a href="'.esc_attr($crypto_tools_url).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                $content .= '</div>';
                $content .= '<div class="clearfix"></div>';
            $content .= '</div>';


        }
    }
    $switch = cryptic_redux('switch-slides-crypto');
    if($switch == 1) {
        return $content;
    } else {
        $content_off = '<a class="back-home" href="'.esc_url(site_url()).'">'.esc_html__('Back to homepage','cryptic').'</a>';
        return $content_off;
    }

}
add_shortcode( 'crypto_tools', 'crypto_tools_content' );

 
function bbloomer_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'crypto-tools', EP_ROOT | EP_PAGES );
}
 
add_action( 'init', 'bbloomer_add_premium_support_endpoint' );
  
function bbloomer_premium_support_query_vars( $vars ) {
    $vars[] = 'crypto-tools';
    return $vars;
}
 
add_filter( 'query_vars', 'bbloomer_premium_support_query_vars', 0 );
 
  
function bbloomer_premium_support_content() {
    echo do_shortcode( '[crypto_tools]' );
}
 
add_action( 'woocommerce_account_crypto-tools_endpoint', 'bbloomer_premium_support_content' );


function custom_my_account_menu_items( $items ) {

        $switch = cryptic_redux('switch-slides-crypto');
        if($switch == 1) {
            $items = array(
                'crypto-tools'      => esc_html__( 'Crypto Tools', 'cryptic' ),
                'dashboard'         => esc_html__( 'Dashboard', 'cryptic' ),
                'orders'            => esc_html__( 'Orders', 'cryptic' ),
                'downloads'         => esc_html__( 'Downloads', 'cryptic' ),
                'edit-address'      => esc_html__( 'Address', 'cryptic' ),
                'edit-account'      => esc_html__( 'Account details', 'cryptic' ),
                'customer-logout'   => esc_html__( 'Logout', 'cryptic' ),
            );
        } else {
            $items = array(
                'dashboard'         => esc_html__( 'Dashboard', 'cryptic' ),
                'orders'            => esc_html__( 'Orders', 'cryptic' ),
                'downloads'         => esc_html__( 'Downloads', 'cryptic' ),
                'edit-address'      => esc_html__( 'Address', 'cryptic' ),
                'edit-account'      => esc_html__( 'Account details', 'cryptic' ),
                'customer-logout'   => esc_html__( 'Logout', 'cryptic' ),
            );
        }
        return $items;
    }
    add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );


?>