<?php

$layout = $GLOBALS['knack']['settings']['footer']['layout'];

if($layout == 'full' || $layout == 'top') {

    get_template_part( 'knack/templates/footer', 'top' );

}

if($layout == 'full' || $layout == 'bottom') {

    get_template_part( 'knack/templates/footer', 'bottom' );

}

wp_footer(); ?>

</body>
</html>