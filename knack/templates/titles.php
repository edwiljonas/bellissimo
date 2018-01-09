<?php
    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            echo get_the_title(get_option('page_for_posts', true));
        } else {
            esc_html_e('Latest Posts', 'knack');
        }
    } elseif (is_post_type_archive()) {
        echo post_type_archive_title();
    } elseif (is_archive()) {
        echo single_cat_title();
    } elseif (is_search()) {
        echo sprintf(__('Search Results for %s', 'knack'), get_search_query());
    } elseif (is_404()) {

    } else {
        echo get_the_title();
    }
?>