<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Emails', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        $signups = get_option( 'knack_theme_signups' );
        ?>
        <ul class="list-group email-list">
        <?php foreach($signups as $s){ ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4"><?php echo esc_html($s['name']) ?></div>
                    <div class="col-md-8"><?php echo esc_html($s['email']) ?></div>
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Export Emails', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="favIcon"><?php esc_html_e('Export Entries', 'knack'); ?></label>
        <div class="options-button export-signups"><?php esc_html_e('Export', 'knack') ?></div>
        <div class="options-button download-file" data-file="<?php echo KNACK_DIR; ?>file/signups.csv"><?php esc_html_e('Download File', 'knack') ?></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Export a list of sign-up entries', 'knack'); ?></small>
    </div>
</div>