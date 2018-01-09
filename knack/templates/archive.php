<?php
$author = get_the_author();
$author_name = get_the_author_meta( 'nickname' );
?>
<div <?php post_class('archive-item'); ?>>
    <div class="row">
        <div class="col-md-12">
            <?php get_template_part( 'knack/templates/format', 'header'); ?>
            <?php if(has_category()){ ?>
            <span class="archive-category">
                <?php the_category( ', ' ); ?>
            </span>
            <?php } ?>
            <span class="archive-date">
                <?php esc_html_e('By', 'knack'); ?> <?php echo esc_html($author_name); ?>, <?php the_time(get_option( 'date_format' )); ?>
            </span>
            <?php get_template_part( 'knack/templates/sharing'); ?>
            <h3>
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="inner-content">
                <?php the_excerpt(); ?>
            </div>

            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="knack-button"><?php esc_attr_e('Continue Reading', 'knack'); ?></a>
        </div>
    </div>
</div>