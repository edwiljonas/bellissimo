<?php
$columnLayout = intval($GLOBALS['knack']['settings']['footer']['columnLayout']);
$footerLogo = $GLOBALS['knack']['settings']['footer']['footerLogo'];
$cols = '';
switch($columnLayout){
    case 1:
        $cols = '12';
        break;
    case 2:
        $cols = '6';
        break;
    case 3:
        $cols = '4';
        break;
    case 4:
        $cols = '3';
        break;
}
?>
<div class="container-fluid knack-footer">
    <div class="container">
        <?php if($footerLogo != ''){ ?>
        <div class="row footer-logo">
            <div class="col-md-12">
                <a href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php echo esc_url($footerLogo); ?>" height="50"></a>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <?php if($columnLayout > 0){ ?>
            <div class="col-md-<?php echo esc_attr($cols); ?>">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 1') ) : else : ?>
                    <div class="knack_footer_heading">
                        <?php esc_html_e('Footer Widget Area (1)', 'knack'); ?>
                    </div>
                    <div class="knack_footer_content">
                        <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Click here', 'knack'); ?></a> <?php esc_html_e('to add widgets.', 'knack'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php } ?>
            <?php if($columnLayout > 1){ ?>
            <div class="col-md-<?php echo esc_attr($cols); ?>">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 2') ) : else : ?>
                    <div class="knack_footer_heading">
                        <?php esc_html_e('Footer Widget Area (2)', 'knack'); ?>
                    </div>
                    <div class="knack_footer_content">
                        <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Click here', 'knack'); ?></a> <?php esc_html_e('to add widgets.', 'knack'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php } ?>
            <?php if($columnLayout > 2){ ?>
            <div class="col-md-<?php echo esc_attr($cols); ?>">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 3') ) : else : ?>
                    <div class="knack_footer_heading">
                        <?php esc_html_e('Footer Widget Area (3)', 'knack'); ?>
                    </div>
                    <div class="knack_footer_content">
                        <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Click here', 'knack'); ?></a> <?php esc_html_e('to add widgets.', 'knack'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php } ?>
            <?php if($columnLayout > 3){ ?>
            <div class="col-md-<?php echo esc_attr($cols); ?>">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 4') ) : else : ?>
                    <div class="knack_footer_heading">
                        <?php esc_html_e('Footer Widget Area (4)', 'knack'); ?>
                    </div>
                    <div class="knack_footer_content">
                        <a href="<?php echo esc_url(admin_url('widgets.php')); ?>"><?php esc_html_e('Click here', 'knack'); ?></a> <?php esc_html_e('to add widgets.', 'knack'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>