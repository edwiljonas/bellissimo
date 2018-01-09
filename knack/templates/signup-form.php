<?php
$bg = $GLOBALS['knack']['settings']['header']['modalBg'];
$title = $GLOBALS['knack']['settings']['header']['modalTitle'];
$text = $GLOBALS['knack']['settings']['header']['modalText'];
?>
<div class="sign-up-form-modal" style="background-image: url(<?php echo esc_url($bg); ?>)">
    <div class="inner-form">
        <h1><?php echo esc_html($title); ?></h1>
        <span><?php echo esc_html($text); ?></span>
        <div class="form-holder">
            <form id="knack-signup-form" class="signup-form">
                <div class="col-md-6 signup-col">
                    <div class="input-group">
                        <input id="signup-name" name="signup-name" type="text" class="form-control" placeholder="<?php esc_html_e('Name', 'knack') ?>" aria-label="Name" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-6 signup-col">
                    <div class="input-group">
                        <input id="signup-email" name="signup-email" type="text" class="form-control" placeholder="<?php esc_html_e('Email', 'knack') ?>" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-12 signup-col">
                    <div class="knack-button">
                        Join Us
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>