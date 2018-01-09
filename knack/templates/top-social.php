<?php

$items =  $GLOBALS['knack']['settings']['social']['socialItems'];
$show =  $GLOBALS['knack']['settings']['footer']['social'];

?>
<?php if($show == 'true'): ?>
    <div class="knack-social">
        <?php
        foreach($items as $social){
            if($social['status'] == 'true'){
                ?>
                <a href="<?php echo esc_url($social['url']); ?>" target="<?php echo esc_attr($social['target']); ?>" class="fa fa-<?php echo esc_attr($social['label']); ?>"></a>
                <?php
            }
        }
        ?>
    </div>
<?php endif; ?>