<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Set Page Layout', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="layout"><?php esc_html_e('Pages', 'knack'); ?></label>
        <select id="layout" class="form-control">
            <option value="default">Default</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Select the page you want to add a pre-built layout too.', 'knack'); ?></small>
    </div>
</div>
<div class="row demo-holder">
    <div class="col-md-3" data-id="" style="background-image: url(<?php echo KNACK_ASSETS . 'images/demo-1.jpg'; ?>)">
        <span>Home Demo 1</span>
    </div>
    <div class="col-md-3 active" data-id="" style="background-image: url(<?php echo KNACK_ASSETS . 'images/demo-2.jpg'; ?>)">
        <span>Home Demo 2</span>
    </div>
    <div class="col-md-3" data-id="" style="background-image: url(<?php echo KNACK_ASSETS . 'images/demo-3.jpg'; ?>)">
        <span>Home Demo 3</span>
    </div>
    <div class="col-md-3" data-id="" style="background-image: url(<?php echo KNACK_ASSETS . 'images/demo-4.jpg'; ?>)">
        <span>Home Demo 4</span>
    </div>
    <div class="col-md-3" data-id="" style="background-image: url(<?php echo KNACK_ASSETS . 'images/demo-5.jpg'; ?>)">
        <span>Home Demo 5</span>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Full Demo Install', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="demo-install">
            <div class="inner">
                <h1><?php esc_html_e('Demo Install', 'knack') ?></h1>
                <div class="options-button run-demo">
                    <?php esc_html_e('Run Full Install', 'knack') ?>
                </div>
            </div>
        </div>
    </div>
</div>