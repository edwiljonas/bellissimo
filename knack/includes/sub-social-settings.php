<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Social Sharing', 'knack'); ?></span>
    </div>
</div>
<?php foreach($_POST['options']['settings']['social']['shares'] as $key=>$social){ ?>
<div class="row">
    <div class="col-12">
        <span class="settings-inner-header"><?php echo esc_attr($social['for']); ?></span>
    </div>
    <?php foreach($social['socialItems'] as $k=>$item){ ?>
    <div class="form-group col-2">
        <label for="<?php echo esc_attr($social['postType'].$item['label']); ?>"><?php echo esc_attr($item['label']); ?></label>
        <input type="checkbox" class="form-control" id="<?php echo esc_attr($social['postType'].$item['label']); ?>" value="true">
    </div>
    <?php } ?>
</div>
<?php } ?>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Facebook ID', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="facebookId"><?php echo esc_html('APP ID'); ?></label>
        <input type="text" class="form-control" id="facebookId" placeholder="<?php esc_attr_e('Facebook app ID', 'knack') ?>">
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the Facebook app ID required for sharing articles to facebook', 'knack') ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Social Icons (Footer and Sidebar)', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-12 hide-element">
        <label for="socialIcons"><?php esc_html_e('Enable Header Icons', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="socialIcons" value="true">
    </div>
    <div class="form-group col-6">
        <label for="socialPrimaryColor"><?php esc_html_e('Primary Icon Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="socialPrimaryColor">
    </div>
</div>
<?php foreach($_POST['options']['settings']['social']['socialItems'] as $key=>$icon){ ?>
    <div class="row">
        <div class="col-12">
            <span class="settings-inner-header"><?php echo esc_html($icon['label']); ?></span>
        </div>
        <div class="form-group col-12">
            <label for="status<?php echo esc_attr($key); ?>"><?php esc_html_e('Enable ', 'knack'); ?> <?php echo esc_html($icon['label']); ?></label>
            <input type="checkbox" class="form-control" id="status<?php echo esc_attr($key); ?>" value="true">
        </div>
        <div class="form-group col-6">
            <label for="icon_hoverColor<?php echo esc_attr($key); ?>"><?php esc_html_e('Hover Icon Color', 'knack'); ?></label>
            <input type="text" class="form-control color-field" id="icon_hoverColor<?php echo esc_attr($key); ?>">
            <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the Hover color for the icon', 'knack'); ?></small>
        </div>
        <div class="form-group col-6">
            <label for="url<?php echo esc_attr($key); ?>"><?php esc_html_e('Link', 'knack'); ?></label>
            <input type="text" class="form-control" id="url<?php echo esc_attr($key); ?>" placeholder="Link">
            <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the URL for the icon', 'knack'); ?></small>
        </div>
    </div>
<?php } ?>
