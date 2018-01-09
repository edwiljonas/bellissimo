<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Layout', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-4">
        <label for="layout"><?php esc_html_e('Layout', 'knack'); ?></label>
        <select id="layout" class="form-control">
            <option value="default">Default</option>
            <option value="full">Full Width</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the layout for the navigation header.', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Logo Uploads', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="srcLogo"><?php esc_html_e('Logo', 'knack'); ?></label>
        <input type="text" class="form-control" id="srcLogo" placeholder="<?php esc_html_e('Icon', 'knack') ?>">
        <div class="options-button upload-media" data-connect="srcLogo" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-srcLogo"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a logo for the site', 'knack'); ?></small>
    </div>
    <div class="form-group col-6 hide-element">
        <label for="altLogo"><?php esc_html_e('Alternative Logo', 'knack'); ?></label>
        <input type="text" class="form-control" id="altLogo" placeholder="<?php esc_html_e('Icon', 'knack') ?>">
        <div class="options-button upload-media" data-connect="altLogo" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-altLogo"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a alternative logo for the site', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="form-group col-6 hide-element">
        <label for="stickyLogo"><?php esc_html_e('Sticky Logo', 'knack'); ?></label>
        <input type="text" class="form-control" id="stickyLogo" placeholder="<?php esc_html_e('Icon', 'knack') ?>">
        <div class="options-button upload-media" data-connect="stickyLogo" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-stickyLogo"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a sticky logo for the site', 'knack'); ?></small>
    </div>
    <div class="form-group col-6">
        <label for="mobileLogo"><?php esc_html_e('Mobile Logo', 'knack'); ?></label>
        <input type="text" class="form-control" id="mobileLogo" placeholder="<?php esc_html_e('Icon', 'knack') ?>">
        <div class="options-button upload-media" data-connect="mobileLogo" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-mobileLogo"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a mobile logo for the site', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Account Settings', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label for="optionAccount"><?php esc_html_e('Enable Account', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="optionAccount" value="true">
    </div>
    <div class="form-group col-3">
        <label for="optionCart"><?php esc_html_e('Enable Cart', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="optionCart" value="true">
    </div>
    <div class="form-group col-3">
        <label for="optionWishlist"><?php esc_html_e('Enable Wishlist', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="optionWishlist" value="true">
    </div>
    <div class="form-group col-3">
        <label for="optionSearch"><?php esc_html_e('Enable Search', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="optionSearch" value="true">
    </div>
</div>
<div class="row hide-element">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Mobile Switch', 'knack'); ?></span>
    </div>
</div>
<div class="row hide-element">
    <div class="form-group col-6">
        <label for="mobileSwitch"><?php esc_html_e('Mobile Switch Point', 'knack'); ?></label>
        <select id="mobileSwitch" class="form-control">
            <option value="550">550px</option>
            <option value="768">768px</option>
            <option value="980">980px</option>
            <option value="1024">1024px</option>
        </select>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Set the switch point for the mobile collapse', 'knack'); ?></small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Header Styling', 'knack'); ?></span>
    </div>
</div>
<?php foreach($_POST['options']['settings']['header']['stylingOptions'] as $key=>$header){ ?>
<div class="row">
    <div class="col-12">
        <span class="settings-inner-header"><?php echo esc_html($header['title']); ?></span>
    </div>
    <div class="form-group col-4">
        <label for="family<?php echo esc_attr($key); ?>"><?php esc_html_e('Family', 'knack'); ?></label>
        <select id="family<?php echo esc_attr($key); ?>" class="form-control">
            <option value="none">Arial</option>
        </select>
    </div>
    <div class="form-group col-4">
        <label for="size<?php echo esc_attr($key); ?>"><?php esc_html_e('Size', 'knack'); ?></label>
        <select id="size<?php echo esc_attr($key); ?>" class="form-control">
            <?php for($i = 1; $i <= 100; $i++){ ?>
                <option value="<?php echo esc_html($i); ?>"><?php echo esc_html($i); ?>px</option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-4">
        <label for="weight<?php echo esc_attr($key); ?>"><?php esc_html_e('Weight', 'knack'); ?></label>
        <select id="weight<?php echo esc_attr($key); ?>" class="form-control">
            <option value="300">300</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="opacity<?php echo esc_attr($key); ?>"><?php esc_html_e('Opacity', 'knack'); ?></label>
        <select id="opacity<?php echo esc_attr($key); ?>" class="form-control">
            <?php for($i = 0; $i <= 9; $i++){ ?>
                <option value="0.<?php echo esc_html($i); ?>">0.<?php echo esc_html($i); ?></option>
            <?php } ?>
            <option value="1">1</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="style<?php echo esc_attr($key); ?>"><?php esc_html_e('Style', 'knack'); ?></label>
        <select id="style<?php echo esc_attr($key); ?>" class="form-control">
            <option value="inherit">inherit</option>
            <option value="normal">normal</option>
            <option value="italic">italic</option>
            <option value="oblique">oblique</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="transform<?php echo esc_attr($key); ?>"><?php esc_html_e('Transform', 'knack'); ?></label>
        <select id="transform<?php echo esc_attr($key); ?>" class="form-control">
            <option value="none">None</option>
            <option value="uppercase">UPPERCASE</option>
            <option value="inherit">inherit</option>
            <option value="capitalize">Capitalize</option>
            <option value="lowercase">lowercase</option>
        </select>
    </div>
    <div class="form-group col-3">
        <label for="spacing<?php echo esc_attr($key); ?>"><?php esc_html_e('Letter Spacing', 'knack'); ?></label>
        <select id="spacing<?php echo esc_attr($key); ?>" class="form-control">
            <option value="default">Default</option>
            <?php for($i = 1; $i <= 10; $i++){ ?>
                <option value="<?php echo esc_html($i); ?>"><?php echo esc_html($i); ?>px</option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-4">
        <label for="color<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="color<?php echo esc_attr($key); ?>">
    </div>
    <div class="form-group col-4">
        <label for="hoverColor<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Hover Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="hoverColor<?php echo esc_attr($key); ?>">
    </div>
    <div class="form-group col-4">
        <label for="background<?php echo esc_attr($key); ?>"><?php esc_html_e('Background Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="background<?php echo esc_attr($key); ?>">
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Center Content', 'knack'); ?></span>
    </div>
</div>
<?php foreach($_POST['options']['settings']['header']['centerContent'] as $key=>$center){ ?>
    <div class="row">
        <div class="col-12">
            <span class="settings-inner-header"><?php echo esc_html($center['title']); ?></span>
        </div>
        <div class="form-group col-4">
            <label for="icon_select<?php echo esc_attr($key); ?>"><?php esc_html_e('Icon', 'knack'); ?></label>
            <select id="icon_select<?php echo esc_attr($key); ?>" class="form-control">
                <?php get_template_part( 'knack/templates/icons' ); ?>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="label<?php echo esc_attr($key); ?>"><?php esc_html_e('Title', 'knack'); ?></label>
            <input type="text" class="form-control" id="label<?php echo esc_attr($key); ?>">
        </div>
        <div class="form-group col-4">
            <label for="sub<?php echo esc_attr($key); ?>"><?php esc_html_e('Sub Title', 'knack'); ?></label>
            <input type="text" class="form-control" id="sub<?php echo esc_attr($key); ?>">
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-12 awesome-icons">
        <a target="_blank" class="options-button" href="http://fontawesome.io/icons/"><?php esc_html_e('List of FontAwesome icons'); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Eyebrow', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="eyebrowText"><?php esc_html_e('Eyebrow Text', 'knack'); ?></label>
        <input type="text" class="form-control" id="eyebrowText">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Eyebrow Modal Sign-up', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label for="modal"><?php esc_html_e('Enable Modal', 'knack'); ?></label>
        <input type="checkbox" class="form-control" id="modal" value="true">
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="modalTitle"><?php esc_html_e('Modal Titile', 'knack'); ?></label>
        <input type="text" class="form-control" id="modalTitle">
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="modalText"><?php esc_html_e('Modal Titile', 'knack'); ?></label>
        <input type="text" class="form-control" id="modalText">
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="modalColor"><?php esc_html_e('Modal Font Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="modalColor">
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="modalBg"><?php esc_html_e('Background Image', 'knack'); ?></label>
        <input type="text" class="form-control" id="modalBg" placeholder="<?php esc_html_e('Background Image', 'knack') ?>">
        <div class="options-button upload-media" data-connect="modalBg" data-multiple="false" data-size="full"><?php esc_html_e('Upload', 'knack') ?></div>
        <div class="image-preview" id="preview-modalBg"></div>
        <small id="emailHelp" class="form-text text-muted"><?php esc_html_e('Upload a bg for the modal popup', 'knack'); ?></small>
    </div>
</div>