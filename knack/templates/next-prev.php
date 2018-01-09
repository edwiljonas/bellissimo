<?php

$next_post = get_next_post();
$next = '';
if(!empty($next_post)){
    $next = wp_get_attachment_image_src ( get_post_thumbnail_id ( $next_post->ID ), 'knack-image-600' );
    $next = $next[0];
}

$previous_post = get_previous_post();
$previous = '';
if(!empty($previous_post)){
    $previous = wp_get_attachment_image_src ( get_post_thumbnail_id ( $previous_post->ID ), 'knack-image-600' );
    $previous = $previous[0];
}

the_post_navigation( array(
    'next_text' => '<span class="next-prev-link">%title</span><div class="image" style="background-image: url('.$next.')"></div>',
    'prev_text' => '<span class="next-prev-link">%title</span><div class="image" style="background-image: url('.$previous.')"></div>',
) );

?>