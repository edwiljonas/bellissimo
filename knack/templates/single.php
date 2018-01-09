<?php
$social = $GLOBALS['knack']['settings']['blog']['socialIcons'];
$tags = $GLOBALS['knack']['settings']['blog']['tags'];
$categories = $GLOBALS['knack']['settings']['blog']['categories'];
$author = $GLOBALS['knack']['settings']['blog']['author'];
?>
<div <?php post_class('single-item'); ?>>
    <div class="row">
        <div class="col-md-12">
            <h3>
                <?php the_title(); ?>
            </h3>
            <div class="inner-content">
                <?php the_content(); ?>
            </div>
            <?php if(has_tag()){ ?>
            <div class="tags">
                <?php if($tags == 'true'){ ?>
                    <?php the_tags( '', '', '' ); ?>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if(has_category()){ ?>
            <div class="tags">
                <?php if($categories == 'true'){ ?>
                    <?php the_category( '' ); ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="row next-prev">
        <div class="col-md-12">
            <?php get_template_part( 'knack/templates/next', 'prev'); ?>
        </div>
    </div>
    <div class="row related-posts">
        <div class="col-md-12">
            <h4><?php esc_html_e('Related Posts', 'knack'); ?></h4>
        </div>
        <?php get_template_part( 'knack/templates/related'); ?>
    </div>
    <?php if ( comments_open() || get_comments_number() ) : ?>
    <div class="row comments-posts">
        <div class="col-md-12">
            <h4><?php esc_html_e('Comments', 'knack'); ?></h4>
        </div>
        <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
    </div>
    <?php endif; ?>
</div>