<span class="badge badge-secondary">
<?php
switch($type){
    case 'wishlist':
        esc_html_e('You don\'t have any wishlist items.', 'knack');
        break;
    case 'cart':
        esc_html_e('You don\'t have any wishlist items.', 'knack');
        break;
}
?>
</span>
