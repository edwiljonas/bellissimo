<?php
if ( is_front_page() && is_home() ) {
    ?>
    <div class="float"> Default homepage </div>
    <?php get_template_part( 'knack/templates/intro' ); ?>
    <?php
} elseif ( is_front_page() ) {

    $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'knack-image-2000' );
    $shortcode = get_post_meta( $post->ID, 'meta_shortcode', true );

    if($shortcode != ''){
        echo apply_filters('the_content', $shortcode);
    }else if(!empty($image)){
        get_template_part( 'knack/templates/intro-page' );
    } else {
        get_template_part( 'knack/templates/intro' );
    }

} elseif ( is_home() ) {
    ?>
    <div class="float"> Blog Page </div>
    <?php get_template_part( 'knack/templates/intro' ); ?>
    <?php
} else {
    if(class_exists( 'WooCommerce' ) && is_account_page()){
        ?>
        <div class="float"> Account </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    }elseif(class_exists( 'WooCommerce' ) && is_checkout()){
        ?>
        <div class="float"> Checkout </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    }elseif(class_exists( 'WooCommerce' ) && is_cart()){
        ?>
        <div class="float"> Cart </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    }elseif(is_page()){

        $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'knack-image-2000' );
        $shortcode = get_post_meta( $post->ID, 'meta_shortcode', true );

        if($shortcode != ''){
            echo apply_filters('the_content', $shortcode);
        }else if(!empty($image)){
            get_template_part( 'knack/templates/intro-page' );
        } else {
            get_template_part( 'knack/templates/intro' );
        }

    } elseif (is_singular('post')){
        ?>
        <div class="float"> Single Post </div>
        <?php get_template_part( 'knack/templates/intro-post' ); ?>
        <?php
    } elseif (class_exists( 'WooCommerce' ) && is_single() && is_product()){
        ?>
        <div class="float"> Single Product </div>
        <?php
    } elseif (class_exists( 'WooCommerce' ) && is_product_category()){
        ?>
        <div class="float"> Woo Category </div>
        <?php get_template_part( 'knack/templates/intro-woo-category' ); ?>
        <?php
    } elseif (is_single()){
        ?>
        <div class="float"> Other Single Post </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    } elseif (class_exists( 'WooCommerce' ) && is_shop()){
        ?>
        <div class="float"> Shop </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    } elseif(is_search()){
        ?>
        <div class="float"> Search </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    } elseif(is_archive()){
        ?>
        <div class="float"> Archive </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    } elseif(is_category()){
        ?>
        <div class="float"> Category </div>
        <?php get_template_part( 'knack/templates/intro' ); ?>
        <?php
    } elseif(is_404()){
        ?>
        <div class="float"> 404 </div>
        <?php //get_template_part( 'knack/templates/intro' ); ?>
        <?php
    }
}
?>