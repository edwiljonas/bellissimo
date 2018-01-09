<?php

$mobile =  $GLOBALS['knack']['settings']['header']['mobileLogo'];

if($mobile != ''){
    ?>
        <img src="<?php echo esc_url($mobile); ?>" height="40">
    <?php
} else {
    echo get_option('blogname');
}

?>
