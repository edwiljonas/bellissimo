<div class="knack-pager">
<?php
    $args = array(
        'prev_next'          => false,
        'prev_text'          => esc_html__('Newer Posts', 'knack'),
        'next_text'          => esc_html__('Older Posts', 'knack'),
    );
    echo paginate_links($args);
?>
</div>
