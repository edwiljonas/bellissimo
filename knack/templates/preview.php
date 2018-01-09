<?php

global $post, $product;

$array = [];
$single = 'preview-gallery';

array_push($array, array('image'=> $image));

if(!empty($product->get_gallery_attachment_ids())){
    foreach($product->get_gallery_attachment_ids() as $img){
        $image = wp_get_attachment_image_src( $img, 'knack-image-1000' );
        array_push($array, array('image'=> $image[0]));
    }
}
if(count($array) <= 1 ){
    $single = 'single-image';
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class('knack-content'); ?>>
    <div class="row">
        <div class="col-md-6 <?php echo esc_attr($single); ?>">
            <?php foreach($array as $i){ ?>
                <div class="image" style="background-image: url(<?php echo esc_url($i['image']); ?>)"></div>
            <?php } ?>
        </div>
        <div class="col-md-6 <?php echo esc_attr($htheme_single); ?> summary entry-summary">
            <?php do_action( 'woocommerce_single_product_summary' ); ?>
        </div>
    </div>
</div>