<?php foreach($_POST['options']['settings']['typography']['fonts'] as $key=>$font){ ?>
<div class="row">
    <div class="col-12">
        <span class="settings-inner-header"><?php echo esc_html($font['label']); ?></span>
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
        <label for="lineHeight<?php echo esc_attr($key); ?>"><?php esc_html_e('Line Height', 'knack'); ?></label>
        <select id="lineHeight<?php echo esc_attr($key); ?>" class="form-control">
            <?php for($i = 1; $i <= 100; $i++){ ?>
                <option value="<?php echo esc_html($i); ?>"><?php echo esc_html($i); ?>px</option>
            <?php } ?>
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
    <div class="form-group col-6">
        <label for="color<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="color<?php echo esc_attr($key); ?>">
    </div>
    <div class="form-group col-6">
        <label for="hoverColor<?php echo esc_attr($key); ?>"><?php esc_html_e('Font Hover Color', 'knack'); ?></label>
        <input type="text" class="form-control color-field" id="hoverColor<?php echo esc_attr($key); ?>">
    </div>
</div>
<?php } ?>