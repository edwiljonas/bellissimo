<?php
$favIcon = $GLOBALS['knack']['settings']['general']['favIcon'];
if($favIcon || $favIcon != ''): ?>
    <link rel="shortcut icon" href="<?php echo esc_url($favIcon); ?>" />
<?php endif; ?>