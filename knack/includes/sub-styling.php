<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Accent Colors', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <?php foreach($_POST['options']['settings']['styling']['accents'] as $key=>$accent){ ?>
        <div class="form-group col-6">
            <label for="exampleInputEmail1"><?php echo esc_html($accent['title']); ?></label>
            <input type="text" class="form-control color-field" id="accent<?php echo esc_attr($key); ?>">
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-12">
        <span class="settings-header"><?php esc_html_e('Button Styling', 'knack'); ?></span>
    </div>
</div>
<div class="row">
    <?php foreach($_POST['options']['settings']['styling']['buttons'] as $key=>$button){ ?>
        <div class="col-12">
            <span class="settings-inner-header"><?php echo esc_html($button['title']); ?></span>
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
            <label for="transform<?php echo esc_attr($key); ?>"><?php esc_html_e('Transform', 'knack'); ?></label>
            <select id="transform<?php echo esc_attr($key); ?>" class="form-control">
                <option value="none">None</option>
                <option value="uppercase">UPPERCASE</option>
                <option value="inherit">inherit</option>
                <option value="capitalize">Capitalize</option>
                <option value="lowercase">lowercase</option>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="spacing<?php echo esc_attr($key); ?>"><?php esc_html_e('Letter Spacing', 'knack'); ?></label>
            <select id="spacing<?php echo esc_attr($key); ?>" class="form-control">
                <option value="default">Default</option>
                <?php for($i = 1; $i <= 10; $i++){ ?>
                    <option value="<?php echo esc_html($i); ?>"><?php echo esc_html($i); ?>px</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="weight<?php echo esc_attr($key); ?>"><?php esc_html_e('Weight', 'knack'); ?></label>
            <select id="weight<?php echo esc_attr($key); ?>" class="form-control">
                <option value="default">Default</option>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="opacity<?php echo esc_attr($key); ?>"><?php esc_html_e('Opacity', 'knack'); ?></label>
            <select id="opacity<?php echo esc_attr($key); ?>" class="form-control">
                <?php for($i = 0; $i <= 9; $i++){ ?>
                    <option value="0.<?php echo esc_html($i); ?>">0.<?php echo esc_html($i); ?></option>
                <?php } ?>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="color<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Color', 'knack'); ?></label>
            <input type="text" class="form-control color-field" id="color<?php echo esc_attr($key); ?>">
        </div>
        <div class="form-group col-6">
            <label for="hoverColor<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Hover Color', 'knack'); ?></label>
            <input type="text" class="form-control color-field" id="hoverColor<?php echo esc_attr($key); ?>">
        </div>
        <div class="form-group col-6">
            <label for="background<?php echo esc_attr($key); ?>"><?php esc_html_e('Background', 'knack'); ?></label>
            <input type="text" class="form-control color-field" id="background<?php echo esc_attr($key); ?>">
        </div>
        <div class="form-group col-6">
            <label for="backgroundHover<?php echo esc_attr($key); ?>"><?php esc_html_e('Background Hover', 'knack'); ?></label>
            <input type="text" class="form-control color-field" id="backgroundHover<?php echo esc_attr($key); ?>">
        </div>
    <?php } ?>
</div>