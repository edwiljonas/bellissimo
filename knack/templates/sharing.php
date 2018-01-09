<?php
    $type = $post->post_type;
    $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'large' );
    $facebookID = $GLOBALS['knack']['settings']['social']['facebookId'];
    $show = '';
    switch ($type){
        case 'post':
            $show = $GLOBALS['knack']['settings']['blog']['socialIcons'];
            break;
        case 'product':
            $show = $GLOBALS['knack']['settings']['woocommerce']['socialIcons'];
            break;
    }
    $social_array = [];
    foreach($GLOBALS['knack']['settings']['social']['shares'] as $social){
        if($social['postType'] == $type){
            $social_array[] = $social['socialItems'];
        }
    }
?>
<?php if($show == 'true'){ ?>
<div class="social-sharing">
    <?php foreach($social_array[0] as $social) {
        if ($social['status'] == 'true') {
            switch ($social['label']) {
                case 'facebook':
                    $random = rand(5, 150000);
                    if($facebookID != ''){
                    ?>
                    <a id="knack-share-<?php echo esc_attr($random); ?>" class="fa fa-facebook"> </a>
                    <script>
                        document.getElementById('knack-share-<?php echo esc_attr($random); ?>').onclick = function() {
                            FB.ui({
                                method: 'share',
                                mobile_iframe: true,
                                href: '<?php echo get_permalink($post->ID); ?>'
                            }, function(response){});
                        }
                    </script>
                    <?php
                    }
                    break;
                case 'twitter':
                    ?>
                    <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo esc_url(wp_get_shortlink()); ?>&hashtags=&via=username&related=&in-reply-to=" class="fa fa-twitter"> </a>
                   <?php
                    break;
                case 'googleplus':
                    ?>
                    <a class="fa fa-google-plus" href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink($post->ID)); ?>&image=<?php echo esc_url($image[0]); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> </a>
                    <?php
                    break;
                case 'pinterest':
                    ?>
                    <a class="fa fa-pinterest" data-pin-custom="true" href="https://www.pinterest.com/pin/create/button/"> </a>
                    <?php
                    break;
            }
        }
    }?>
</div>
<?php } ?>








