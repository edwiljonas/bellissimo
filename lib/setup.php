<?php

/**
 * Setup
 */
function setup() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'editor-style' );
    add_theme_support( 'post-formats', array('quote', 'video', 'gallery') );

    if(function_exists('add_theme_support')) {
        add_theme_support('automatic-feed-links');
    }

    if ( class_exists( 'WooCommerce' ) ){
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'knack' ),
        'secondary'  => esc_html__( 'Secondary Menu', 'knack' ),
        'footer'  => esc_html__( 'Footer Menu', 'knack' ),
    ) );

    #ADD MULTIPLE IMAGE SIZES
    add_image_size( 'knack-image-50', 50, 9999, false );
    add_image_size( 'knack-image-100', 100, 9999, false );
    add_image_size( 'knack-image-165', 165, 165, false );
    add_image_size( 'knack-image-200', 200, 9999, false );
    add_image_size( 'knack-image-300', 300, 9999, false );
    add_image_size( 'knack-image-400', 400, 9999, false );
    add_image_size( 'knack-image-500', 500, 9999, false );
    add_image_size( 'knack-image-600', 600, 9999, false );
    add_image_size( 'knack-image-700', 700, 9999, false );
    add_image_size( 'knack-image-800', 800, 9999, false );
    add_image_size( 'knack-image-900', 900, 9999, false );
    add_image_size( 'knack-image-1500', 1500, 9999, false );
    add_image_size( 'knack-image-2000', 2000, 9999, false );

    #REQUIRED FOR THEME-CHECK
    if ( ! isset( $content_width ) ) $content_width = 900;

    #EDITOR STYLES
    add_editor_style( 'assets/css/editor.css' );

}

add_action('after_setup_theme', 'setup');

/**
 * AJAX URL
 */
function knack_ajax() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}

add_action('wp_head','knack_ajax');

/**
 * Register sidebars
 */
function widgets_init() {
    register_sidebar([
        'name'          => __('Blog Sidebar', 'knack'),
        'id'            => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name'          => __('WooCommerce', 'knack'),
        'id'            => 'sidebar-woo',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name'          => __('Footer 1', 'knack'),
        'id'            => 'sidebar-footer-1',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ]);
    register_sidebar([
        'name'          => __('Footer 2', 'knack'),
        'id'            => 'sidebar-footer-2',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ]);
    register_sidebar([
        'name'          => __('Footer 3', 'knack'),
        'id'            => 'sidebar-footer-3',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ]);
    register_sidebar([
        'name'          => __('Footer 4', 'knack'),
        'id'            => 'sidebar-footer-4',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ]);
}
add_action('widgets_init', 'widgets_init');

/**
 * Theme assets
 */
function assets() {

  //wp_enqueue_media();

  wp_enqueue_style('knack-css', get_template_directory_uri().'/assets/css/main.css', false, null);
  wp_enqueue_style('knack-fonts', get_template_directory_uri().'/assets/css/font-awesome.css', false, null);

  # STYLES CLASS
  $knack_css = new \knack_styles();
  $knack_js = new \knack_scripts();

  # KNACK CUSTOM STYLES
  $css = $knack_css->knack_get_styles();
  wp_add_inline_style( 'knack-css', $css );

  # GOOGLE FONTS
  wp_enqueue_style( 'knack-google', knack_google(), array(), '1.0.0' );

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

    wp_enqueue_script('knack-tether-js', get_template_directory_uri().'/assets/js/tether.min.js', array('jquery'), null, true);
    wp_enqueue_script('knack-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('knack-owl', get_template_directory_uri().'/assets/js/owl.js', ['jquery'], null, true);
    wp_enqueue_script('knack-js', get_template_directory_uri().'/assets/js/main.js', ['jquery'], null, true);
    wp_enqueue_script( 'knack-pin', '//assets.pinterest.com/js/pinit.js', array( 'jquery' ) );
    wp_enqueue_script( 'knack-googleplus', 'https://apis.google.com/js/platform.js', array( 'jquery' ) );
    wp_enqueue_script( 'knack-twitter', 'https://platform.twitter.com/widgets.js', array( 'jquery' ) );

    $facebookID = $GLOBALS['knack']['settings']['social']['facebookId'];
    if($facebookID != ''){
        $script = $knack_js->knack_fb();
        wp_add_inline_script( 'knack-js', $script );
    }

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Google Fonts
 */
function knack_google(){

    #INSTANTIATE CREATE CSS CLASS
    $knack_css = new \knack_styles();

    #ENQUEUE GOOGLE FONTS
    $google_fonts = implode('|', array_unique($knack_css->knack_get_fonts()));

    $font_url = '';

    #GENERATE URL
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'knack' ) ) {
        $font_url = add_query_arg( 'family', $google_fonts, "//fonts.googleapis.com/css" );
    }

    return $font_url;

}

/**
 * Admin Scripts
 */
function knack_add_admin_scripts(){

    # GET CURRENT SCREEN
    $screen = get_current_screen();

    # ADD ADMIN STYLES
    if(is_admin() && isset($_GET['page']) == 'knack_settings'){

        # CSS
        wp_enqueue_style( 'knack-styles', get_template_directory_uri().'/assets/css/admin.css' );

        # JS
        wp_enqueue_script( 'knack-comp', get_template_directory_uri().'/assets/js/comp.js' );

        # JS
        wp_enqueue_script( 'knack-global', get_template_directory_uri().'/assets/js/global.js' );

        if(isset($_GET['page']) == 'knack_settings' || isset($_GET['taxonomy']) == 'category'){

            wp_enqueue_media();

            // Add the color picker css file
            wp_enqueue_style( 'wp-color-picker' );

            // Include our custom jQuery file with WordPress Color Picker dependency
            wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

        }

    }

    if(is_admin()){

        # META
        wp_enqueue_style( 'knack-styles', get_template_directory_uri().'/assets/css/metabox.css' );

        # VC
        wp_enqueue_style( 'knack-vc', get_template_directory_uri().'/assets/css/vc.css' );

    }

}

add_action( 'admin_enqueue_scripts', 'knack_add_admin_scripts' );

/**
 * Body Class
 */
function knack_classes($classes){

    $classes[] = esc_attr( 'knack-has-slider' );
    $classes[] = esc_attr( 'woocommerce' );

    //$classes[] = knack_get_top();

    return $classes;

}

add_filter( 'body_class', 'knack_classes' );

function knack_get_top(){

    $val = '';

    if ( is_front_page() && is_home() ) {
        $val = '';
    } elseif ( is_front_page() ) {
        $val = '';
    } elseif ( is_home() ) {
        $val = '';
    } else {

        if(class_exists( 'WooCommerce' ) && is_account_page()){
            $val = '';
        } elseif (class_exists( 'WooCommerce' ) && is_checkout()){
            $val = '';
        } elseif (class_exists( 'WooCommerce' ) && is_cart()){
            $val = '';
        } elseif (is_page()){
            $val = '';
        } elseif (is_singular('post')){
            $val = 'knack-small-top-height';
        } elseif (class_exists( 'WooCommerce' ) && is_single() && is_product()){
            $val = 'knack-none-top-height';
        } elseif (is_single()){
            $val = 'knack-small-top-height';
        } elseif (class_exists( 'WooCommerce' ) && is_shop()){
            $val = 'knack-small-top-height';
        } elseif (is_search()){
            $val = 'knack-small-top-height';
        } elseif (is_archive()){
            $val = 'knack-small-top-height';
        } elseif (is_category()){
            $val = 'knack-small-top-height';
        } elseif (is_404()){
            $val = 'knack-small-top-height';
        }

    }

    return $val;

}