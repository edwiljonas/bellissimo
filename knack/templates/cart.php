<?php global $product, $woocommerce; $box_product = wc_get_product( $product_i ); ?>
<div class="row">
    <div class="col-md-12">
        <a class="top-product-item" href="<?php echo get_permalink($product_i); ?>">
            <div class="image" style="background-image: url(<?php echo esc_url($image); ?>)"></div>
            <h5>
                <?php echo esc_html($title); ?>
                <span class="cart-price-top"><?php echo $box_product->get_price_html(); ?></span>
            </h5>
        </a>
    </div>
</div>