<?php
global $wpdb, $woocommerce;
$show_cart =  $GLOBALS['knack']['settings']['header']['optionCart'];
$show_wishlist =  $GLOBALS['knack']['settings']['header']['optionWishlist'];
$show_search =  $GLOBALS['knack']['settings']['header']['optionSearch'];
?>
<div class="knack-navigation">
    <div class="knack-navigation-inner">
        <div class="container-fluid knack-eyebrow">
            <div class="row">
                <div class="col-md-6"><?php get_template_part( 'knack/templates/eyebrow' ); ?></div>
                <div class="col-md-6">
                    <div class="knack-top-settings">
                        <div class="shopping">
                            <?php if($show_wishlist == 'true' && class_exists( 'WooCommerce' )){ ?>
                            <div class="wishlist knack-tool knack-tooltip">
                                <span class="top-label">
                                    <?php esc_html_e('Wishlist', 'knack') ?>
                                </span>
                                <div class="fa fa-heart">
                                </div>
                                <span class="total-count">0</span>
                                <div class="knack-toolbox" data-toggle="open">
                                    <div class="fa fa-sort-asc"></div>
                                    <?php if(is_user_logged_in()){ ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><?php esc_html_e('Wishlist', 'knack'); ?></h5>
                                        </div>
                                    </div>
                                    <div class="load-html"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="top-buttons">
                                                <a href="#" class="knack-button"><?php esc_html_e('Wishlist', 'knack'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="badge badge-warning"><?php esc_html_e('You must be logged in to view the wishlist.', 'knack'); ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($show_cart == 'true' && class_exists( 'WooCommerce' )){ ?>
                            <div class="cart knack-tool knack-tooltip">
                                <span class="top-label">
                                    <?php esc_html_e('Cart', 'knack') ?>
                                </span>
                                <div class="fa fa-shopping-bag"></div>
                                <span class="total-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
                                <div class="knack-toolbox" data-toggle="open">
                                    <div class="fa fa-sort-asc"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><?php esc_html_e('Cart', 'knack'); ?></h5>
                                        </div>
                                    </div>
                                    <div class="load-html">
                                        <?php if($woocommerce->cart->cart_contents_count == 0){ ?>
                                            <div class="badge badge-warning"><?php esc_html_e('Cart is empty.', 'knack'); ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="top-buttons">
                                                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="knack-button"><?php esc_html_e('View Cart', 'knack'); ?></a>
                                                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="knack-button"><?php esc_html_e('Checkout', 'knack'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php get_template_part( 'knack/templates/login' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-light justify-content-between knack-logo">
            <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                <?php get_template_part( 'knack/templates/logo' ); ?>
            </a>
            <?php get_template_part( 'knack/templates/shipping' ); ?>
            <?php if($show_search == 'true'){ ?>
            <form class="form-inline" action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
                <input type="text" value="<?php esc_attr(get_search_query()); ?>" name="s" id="s" class="form-control mr-sm-2"" placeholder="<?php esc_html_e('Search', 'knack') ?>">
                <div class="fa fa-search"><input type="submit" class="search-button" value=""></div>
            </form>
            <?php } ?>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand mobile-logo" href="<?php echo esc_url(home_url()); ?>">
                <?php get_template_part( 'knack/templates/logo', 'mobile' ); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                    $knack_menu_args = array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav nav-fill',
                        'menu_id' => 'primary',
                        'container' => 'ul',
                    );
                    if ( has_nav_menu( 'primary' ) ) {
                        $knack_menu_args['walker'] = new knack_walker();
                    } else {
                        $knack_menu_args['link_before'] = '<span>';
                        $knack_menu_args['link_after'] = '</span>';
                    }
                    wp_nav_menu( $knack_menu_args );
                ?>
            </div>
        </nav>
    </div>
    <?php
        if(class_exists( 'WooCommerce' )) {
            ?>
                <div class="breadcrumb-holder"><?php woocommerce_breadcrumb(); ?></div>
            <?php
        }
    ?>
</div>