<?php get_header(); ?>

<?php if(strpos(get_the_content(), 'vc_row') == true){ ?>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <div class="container-fluid knack-content">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
    endif;
    ?>
<?php } else { ?>
    <div class="knack-content padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>