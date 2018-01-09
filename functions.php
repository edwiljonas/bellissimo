<?php

$knack_theme = wp_get_theme();

# DEVELOPMENT OPTIONS :: START
if ( ! defined( 'KNACK_DIR' ) ) {
    define('KNACK_DIR', get_template_directory_uri() . '/knack/');
}
if ( ! defined( 'KNACK_ASSETS' ) ) {
    define('KNACK_ASSETS', get_template_directory_uri() . '/assets/');
}
if ( ! defined( 'KNACK_VERSION' ) ) {
    define('KNACK_VERSION', $knack_theme->Version);
}

# REQUIRED
require_once(get_template_directory() . '/knack/classes/class.options.php');
require_once(get_template_directory() . '/knack/classes/class.check.php');
require_once(get_template_directory() . '/knack/classes/class.meta.php');
require_once(get_template_directory() . '/knack/classes/class.walker.php');
//require_once(get_template_directory() . '/knack/classes/class.walker.default.php');
require_once(get_template_directory() . '/knack/classes/class.settings.php');
require_once(get_template_directory() . '/knack/classes/class.backend.php');
require_once(get_template_directory() . '/knack/classes/class.frontend.php');
require_once(get_template_directory() . '/knack/classes/class.ajax.php');
require_once(get_template_directory() . '/knack/classes/class.styles.php');
require_once(get_template_directory() . '/knack/classes/class.scripts.php');
require_once(get_template_directory() . '/knack/classes/class.tgm.php');
require_once(get_template_directory() . '/knack/classes/class.content.php');
require_once(get_template_directory() . '/knack/classes/class.shortcodes.php');
require_once(get_template_directory() . '/knack/classes/class.widgets.follow.php');
require_once(get_template_directory() . '/knack/classes/class.widgets.instagram.php');
require_once(get_template_directory() . '/knack/classes/class.widgets.recent.php');
require_once(get_template_directory() . '/knack/classes/class.update.object.php');
require_once(get_template_directory() . '/knack/classes/class.update.php');
if ( defined( 'WPB_VC_VERSION' ) ) {
    require_once(get_template_directory() . '/knack/classes/class.composer.php');
}
require_once(get_template_directory() . '/knack/classes/class.start.php');

# INSTANTIATE
$knack_meta = new knack_meta();
$knack_options = new knack_options();
$knack_settings = new knack_settings();
$knack_backend = new knack_backend();
$knack_frontend = new knack_frontend();
$gsdh_shortcodes = new knack_shortcodes();
$knack_ajax = new knack_ajax($knack_backend, $knack_frontend);
$knack = new knack_start();

# TGM PLUGIN ACTIVATION
function knack_register_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name' 		=>  esc_html__('Contact Form 7', 'knack'),
            'slug' 		=> 'contact-form-7',
            'required' 	=> true,
        ),
        array(
            'name' 		=> esc_html__('Woocommerce', 'knack'),
            'slug' 		=> 'woocommerce',
            'required' 	=> true,
        ),
        array(
            'name' 		=> esc_html__('Easy Theme and Plugin Upgrades', 'knack'),
            'slug' 		=> 'easy-theme-and-plugin-upgrades',
            'required' 	=> true,
        ),
        array(
            'name'               => esc_html__('WPBakery Page Builder', 'knack'), // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/knack/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => esc_html__('Slider Revolution', 'knack'), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/knack/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.6.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
    );
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'knack_register_plugins' );

# ADD THE TGC CLASS FOR ACTIVATING PLUGINS AND CHECKING THEM

/**
 * Set Globals
 */
function knack_globals(){

    global $knack, $knack_frontend, $knack_html;

    #SET GLOBAL DATA
    $knack = $knack_frontend->knack_get_options();

    #ALLOWED HTML
    $knack_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'img' => array(),
    );

}

/**
 * REGISTER WIDGET
 */

function knack_widgets() {
    //register_widget( 'knack_widgets_instagram' );
    register_widget( 'knack_widgets_follow' );
    register_widget( 'knack_widgets_recent' );
}

add_action( 'widgets_init', 'knack_widgets' );

/**
 * Format Comment
 */
function knack_format($comment, $args, $depth){

    $image =  get_avatar_url( $comment, 'small' );

    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-image" style="background-image:url(<?php echo esc_url($image); ?>);"></div>
        <div class="comment-content">
            <h5 class="comment-name"><?php printf(esc_html__('%s', 'knack'), get_comment_author_link()) ?></h5>
            <span class="comment-date">
                <a class="comment-permalink" href="<?php echo esc_url( htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ); ?>"><?php printf(esc_html__('%1$s', 'knack'), get_comment_date(), get_comment_time()) ?></a>
            </span>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php esc_html_e('Your comment is awaiting moderation.', 'knack') ?></em><br />
            <?php endif; ?>
            <div class="comment-info"><?php comment_text(); ?></div>
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
    </li>

    <?php
}

add_action( 'parse_query', 'knack_globals' );

# REMOVE ACTIONS
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

# PRODUCT THUMBNAIL
function knack_product_thumbnail(){

    global $product, $post, $wpdb;

    setup_postdata( $post );

    $id = get_post_thumbnail_id(); // gets the id of the current post_thumbnail (in the loop)
    $src = wp_get_attachment_image_src($id, 'large'); // gets the image url specific to the passed in size (aka. custom image size)
    //$src_2 = get_post_meta( $post->ID, 'knack_meta_product_image_featured', true );

    ?>
    <div class="knack-product-thumbnail" style="background-image:url(<?php echo esc_url($src[0]); ?>)">
        <div class="knack-product-icons">
            <div data-toggle="modal" data-modal="preview" data-target=".bd-example-modal-lg" data-prod="<?php echo esc_attr($post->ID); ?>" class="knack-product-icon fa fa-eye" data-prod-id="<?php echo esc_attr($post->ID); ?>"></div>
            <div class="knack-product-icon whishlist-button fa fa-heart-o" data-prod-id="<?php echo esc_attr($post->ID); ?>"></div>
        </div>
    </div>
    <?php

}

add_action('woocommerce_before_shop_loop_item_title', 'knack_product_thumbnail', 10 ); #ADD NEW IMAGE AND CONTENT

# PRODUCT COUNT
function knack_product_count($cols){
    $count = $GLOBALS['knack']['settings']['woocommerce']['perPage'];
    return intval($count);
}

add_filter( 'loop_shop_per_page', 'knack_product_count', 20 );

# DEVELOPMENT OPTIONS :: END

$knack_includes = [
  'lib/setup.php',
];

foreach ($knack_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'knack'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);

# PER ROW
function knack_product_columns($cols){
    return intval(3);
}

function knack_columns(){
    $layout = $GLOBALS['knack']['settings']['woocommerce']['shopLayout'];
    if((is_shop() || is_product_taxonomy() || is_product_tag()) && $layout == 'standard'){
        add_filter( 'loop_shop_columns', 'knack_product_columns', 1, 10 );
    }
}
if(class_exists( 'WooCommerce' )) {
    add_action('wp_head', 'knack_columns');
}

//woocommerce_single_product_summary

#ADD CUSTOM TO SINGLE ADD TOO CART
function knack_after_add(){

    #GLOBALS
    global $post;

    #SETUP
    setup_postdata( $post );

    echo '<div class="single-wish-button whishlist-button" data-prod-id="'.esc_attr($post->ID).'">'.esc_html__('Add to wishlist', 'knack').'</div>';

}

add_action('woocommerce_after_add_to_cart_button', 'knack_after_add', 1);