<?php get_header(); ?>

<?php
    $sidebar = $GLOBALS['knack']['settings']['blog']['singleLayout'];
    $mxauto = '';
    if($sidebar == 'none'){
        $mxauto = 'mx-auto';
    }
?>

    <div class="knack-content padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-9 <?php echo esc_attr($mxauto); ?>">
                    <?php get_template_part( 'knack/templates/single' ); ?>
                </div>
                <?php if($sidebar != 'none'){ ?>
                    <div class="col-md-3 blog-sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>