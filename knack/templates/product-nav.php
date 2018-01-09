<?php
$show = $GLOBALS['knack']['settings']['woocommerce']['nextPrev'];
if($show == 'true'){
?>
<div class="product-next-prev">
<?php

    $prev = get_previous_post();

    if(!empty($prev)) {
        $prev_image = wp_get_attachment_image_src(get_post_thumbnail_id($prev->ID), 'knack-image-400');
        ?>
        <a href="<?php echo get_permalink($prev->ID); ?>" class="product-prev">
            <div class="content">
                <h3>Product Name</h3>
                <span>Previous Product</span>
            </div>
            <div class="image" style="background-image: url(<?php echo esc_url($prev_image[0]); ?>);"></div>
            <span class="fa fa-angle-left"></span>
        </a>
        <?php
    }

?>

<?php

    $next = get_next_post();

    if(!empty($next)){
        $next_image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $next->ID ), 'knack-image-400' );
        ?>
        <a href="<?php echo get_permalink($prev->ID); ?>" class="product-next">
            <div class="content">
                <h3>Product Name</h3>
                <span>Previous Product</span>
            </div>
            <div class="image" style="background-image: url(<?php echo esc_url($next_image[0]); ?>);"></div>
            <span class="fa fa-angle-right"></span>
        </a>
        <?php
    }

?>
</div>
<?php } ?>
