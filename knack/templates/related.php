<?php

$args = array(
    'post_type' => 'post',
    'category__in' => wp_get_post_categories($post->ID),
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => 'post-format-quote',
            'operator' => 'NOT IN'
        )
    ),
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);

$posts = get_posts($args);

foreach($posts as $p){
    $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $p->ID ), 'knack-image-300' );
    ?>
    <div class="col-md-4">
        <?php if(!empty($image[0])){ ?>
        <a href="<?php echo esc_url(get_permalink($p->ID)); ?>" class="related-image" style="background-image: url(<?php echo esc_url($image[0]) ?>)"></a>
        <?php } ?>
        <h5><a href="<?php echo esc_url(get_permalink($p->ID)); ?>"><?php echo esc_html($p->post_title); ?></a></h5>
        <span class="archive-date">
            <?php the_time(get_option( 'date_format' )); ?>
        </span>
    </div>
    <?php
}

?>