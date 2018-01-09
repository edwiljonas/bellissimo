<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Layout', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="shopLayout"><?php esc_html_e('Shop Archive Layout', 'knack'); ?></label>
        <select id="shopLayout" class="form-control">
            <option value="standard">With Sidebar</option>
            <option value="none">No Sidebar</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable sidebar for the archive page.', 'knack'); ?></small>
    </div>
    <div class="form-group col-6">
        <label for="perPage">Products Per Page</label>
        <select id="perPage" class="form-control">
            <?php for($i = 1; $i <= 40; $i++){ ?>
                <option value="<?php echo esc_html($i); ?>"><?php echo esc_html($i); ?></option>
            <?php } ?>
        </select>
        <small id="emailHelp" class="form-text text-muted">This is how you add a text input</small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Enable', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="nextPrev"><?php esc_html_e('Next & Previous Navigation', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="nextPrev" value="true">
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable next and previous navigation to the single product page.', 'knack'); ?></small>
    </div>
    <div class="form-group col-6">
        <label for="socialIcons"><?php esc_html_e('Social Icons', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="socialIcons" value="true">
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable the social icons for the single product page.', 'knack'); ?></small>
    </div>
    <div class="form-group col-4 hide-element">
        <label for="accountIcons"><?php esc_html_e('Account Icons', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="accountIcons" value="true">
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Enable the account icons for woocommerce.', 'knack'); ?></small>
    </div>
</div>