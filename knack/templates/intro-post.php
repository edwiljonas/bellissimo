<?php
$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'knack-image-1500' );
$author = get_the_author();
$author_name = get_the_author_meta( 'nickname' );
?>
<div class="knack-parallax knack-intro-post">
    <div class="knack-down fa fa-angle-down"></div>
    <div class="container-fluid" style="background-image: url(<?php echo esc_url($image[0]); ?>)">
        <div class="container">
            <h1>
                <?php get_template_part( 'knack/templates/titles' ); ?>
                <span>
                    <?php esc_html_e('By', 'knack'); ?> <?php echo esc_html($author_name); ?>, <?php the_time(get_option( 'date_format' )); ?>
                </span>
                <?php get_template_part( 'knack/templates/sharing'); ?>
            </h1>
        </div>
    </div>
</div>