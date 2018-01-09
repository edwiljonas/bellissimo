<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Layout', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="layout"><?php esc_html_e('Blog Archive Layout', 'knack'); ?></label>
        <select id="layout" class="form-control">
            <option value="standard">With Sidebar</option>
            <option value="none">No Sidebar</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable sidebar for the archive page.', 'knack'); ?></small>
    </div>
    <div class="form-group col-6">
        <label for="singleLayout"><?php esc_html_e('Single Post Layout', 'knack'); ?></label>
        <select id="singleLayout" class="form-control">
            <option value="standard">With Sidebar</option>
            <option value="none">No Sidebar</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable sidebar for the single post page.', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Enable', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label for="socialIcons"><?php esc_html_e('Enable Social', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="socialIcons" value="true">
    </div>
    <div class="form-group col-3">
        <label for="tags"><?php esc_html_e('Enable Tags', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="tags" value="true">
    </div>
    <div class="form-group col-3">
        <label for="categories"><?php esc_html_e('Enable Categories', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="categories" value="true">
    </div>
    <div class="form-group col-3">
        <label for="author"><?php esc_html_e('Enable Author', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="author" value="true">
    </div>
</div>