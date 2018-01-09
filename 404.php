<?php get_header(); ?>

<?php
$title =  $GLOBALS['knack']['settings']['general']['page_404_title'];
$sub =  $GLOBALS['knack']['settings']['general']['page_404_sub'];
$description =  $GLOBALS['knack']['settings']['general']['page_404_description'];
$text =  $GLOBALS['knack']['settings']['general']['page_404_button_text'];
$url =  $GLOBALS['knack']['settings']['general']['page_404_button_url'];
?>

    <div class="knack-content padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="holder-404">
                        <h1><?php echo esc_html($title); ?></h1>
                        <h4><?php echo esc_html($sub); ?></h4>
                        <span><?php echo esc_html($description); ?></span>
                        <a href="<?php echo esc_url($url); ?>" class="knack-button"><?php echo esc_html($text); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>