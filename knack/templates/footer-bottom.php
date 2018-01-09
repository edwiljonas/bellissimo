<?php

$copyright = $GLOBALS['knack']['settings']['footer']['copyright'];
$copyrightText = $GLOBALS['knack']['settings']['footer']['copyrightText'];

?>
<div class="container-fluid knack-footer-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($copyright == 'true'){ ?>
                <?php echo wp_kses($copyrightText, $GLOBALS['knack_html']); ?>
                <?php } ?>
            </div>
            <div class="col-md-6 footer-social">
                <?php get_template_part( 'knack/templates/top', 'social' ); ?>
            </div>
        </div>
    </div>
</div>