<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Layout', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="layout"><?php esc_html_e('Layout', 'knack'); ?></label>
        <select id="layout" class="form-control">
            <option value="full">Full (Includes top and bottom)</option>
            <option value="top">Top (Includes top)</option>
            <option value="bottom">Bottom (Includes bottom)</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the layout for the footer section.', 'knack'); ?></small>
    </div>
    <div class="form-group col-6">
        <label for="columnLayout"><?php esc_html_e('Columns', 'knack'); ?></label>
        <select id="columnLayout" class="form-control">
            <option value="1">1 Column</option>
            <option value="2">2 Columns</option>
            <option value="3">3 Columns</option>
            <option value="4">4 Columns</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the amount of columns for the footer.', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Logo', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="footerLogo"><?php esc_html_e('Footer Logo', 'knack'); ?></label>
        <input type="text" class="form-control" id="footerLogo" placeholder="<?php esc_html_e('Source', 'knack') ?>">
        <div class="options-button upload-media" data-connect="footerLogo" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-footerLogo"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a fav icon for the site', 'knack'); ?></small>
    </div>
    <div class="col-md-6">
        <!-- IMAGE HERE -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Colors', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="backgroundPrimary"><?php esc_html_e('Primary Background Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="backgroundPrimary">
    </div>
    <div class="form-group col-6">
        <label for="backgroundSecondary"><?php esc_html_e('Secondary Background Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="backgroundSecondary">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Other', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label for="copyright"><?php esc_html_e('Enable Copyright', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="copyright" value="true">
    </div>
    <div class="form-group col-3">
        <label for="social"><?php esc_html_e('Enable Social Icons', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="social" value="true">
    </div>
    <div class="form-group col-12">
        <label for="copyrightText"><?php esc_html_e('Copyright Text', 'knack'); ?></label>
        <input type="text" class="form-control" id="copyrightText">
    </div>
</div>