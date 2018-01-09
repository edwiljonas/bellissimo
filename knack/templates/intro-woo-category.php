<?php
global $wp_query;
$cat = $wp_query->get_queried_object();
$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );
?>
<?php if(!empty($image)){ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="category-heading">
                <?php get_template_part( 'knack/templates/titles' ); ?>
                <?php if($cat->description != ''){ ?>
                    <span><?php echo esc_html($cat->description); ?></span>
                <?php } ?>
            </h1>
        </div>
    </div>
</div>
<div class="knack-intro-category">
    <div class="container-fluid">
        <div class="container">
            <div class="category-image" style="background-image: url(<?php echo esc_url($image); ?>);">
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="knack-parallax knack-intro">
    <div class="container-fluid">
        <div class="container">
            <h1><?php get_template_part( 'knack/templates/titles' ); ?></h1>
        </div>
    </div>
</div>
<?php } ?>