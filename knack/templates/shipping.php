<?php

$centerContent = $GLOBALS['knack']['settings']['header']['centerContent'];

?>
<div class="shipping-info">
    <?php
        foreach($centerContent as $center){
            if($center['label'] != ''){
            ?>
            <div class="info-item fa <?php echo esc_attr($center['icon']); ?>">
                <?php if($center['label']){ ?>
                    <span><?php echo esc_html($center['label']); ?></span>
                <?php } ?>
                <?php if($center['sub']){ ?>
                    <span><?php echo esc_html($center['sub']); ?></span>
                <?php } ?>
            </div>
            <?php
            }
        }
    ?>
</div>