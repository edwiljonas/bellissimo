<?php

$logo =  $GLOBALS['knack']['settings']['header']['srcLogo'];

if($logo != ''){
    ?>
        <img src="<?php echo esc_url($logo); ?>" height="40">
    <?php
} else {
    echo get_option('blogname');
}

?>
