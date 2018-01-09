<?php

$show_account =  $GLOBALS['knack']['settings']['header']['optionAccount'];

if ( is_user_logged_in() && class_exists( 'WooCommerce' ) ) {
    $user = wp_get_current_user();
    $logged= true;
}

if($show_account == 'true'){
    ?>
<div class="account">
    <?php
    if( is_user_logged_in() && class_exists( 'WooCommerce' ) ) {
        ?>
        <div class="login-wrap knack-tooltip" data-toggle="tooltip" data-placement="left" title="<?php esc_html_e('View Account', 'knack'); ?>">
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="fa fa-user-circle"></a>
            <div class="hide-mobile"> <?php esc_html_e('Hey there ', 'knack'); ?> <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html($user->user_nicename); ?></a>,  <?php esc_html_e('welcome back ', 'knack'); ?>
            <!-- <a href="--><?php //echo esc_url(wp_logout_url()); ?><!--">--><?php //esc_html_e('Logout', 'knack'); ?><!--</a>--></div>
        </div>
        <?php
    } else {
        ?>
        <div class="login-wrap">
            <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
                <div class="fa fa-sign-in"></div>
                <?php esc_html_e('Login', 'knack'); ?>
            </a>
        </div>
        <?php
    }
    ?>
</div>
    <?php
}

?>
