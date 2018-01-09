<?php get_header(); ?>

<?php
    $sidebar = $GLOBALS['knack']['settings']['blog']['layout'];
    $mxauto = '';
    if($sidebar == 'none'){
        $mxauto = 'mx-auto';
    }
?>

    <div class="knack-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 <?php echo esc_attr($mxauto); ?>">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'knack/templates/archive' );
                        endwhile;
                    else :
                        get_template_part( 'knack/templates/none' );
                    endif;
                    get_template_part( 'knack/templates/pager' );
                    ?>
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