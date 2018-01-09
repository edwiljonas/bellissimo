<?php
$format = get_post_format( $post->ID );

switch($format){
    case 'video':

        break;
    case 'gallery':

        break;
    case '':
        $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'knack-image-900' );
        if(!empty($image)){
        ?>
        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="image">
            <img src="<?php echo esc_url($image[0]); ?>" >
        </a>
        <?php
        }
        break;
}