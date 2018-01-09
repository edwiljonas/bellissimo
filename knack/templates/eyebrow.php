<?php

$eyebrowText =  $GLOBALS['knack']['settings']['header']['eyebrowText'];
$modal = $GLOBALS['knack']['settings']['header']['modal'];

if($modal == 'true'){
?>
<span data-toggle="modal" data-modal="signup" data-target=".bd-example-modal-lg">
<?php
}
    echo wp_kses($eyebrowText, $GLOBALS['knack_html']);
if($modal == 'true'){
?>
</span>
<?php } ?>