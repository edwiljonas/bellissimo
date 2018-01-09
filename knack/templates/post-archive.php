<?php $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'knack-image-400' ); ?>
<a href="<?php echo get_permalink($post->ID); ?>" class="post-archive-item" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
    <div class="inner-content">
        <span>
            <?php the_title(); ?>
        </span>
    </div>
</a>