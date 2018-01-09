function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('WOOCOMMERCE');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var shopLayout = knack_global_options.settings.woocommerce.shopLayout;
    var nextPrev = knack_global_options.settings.woocommerce.nextPrev;
    var socialIcons = knack_global_options.settings.woocommerce.socialIcons;
    var accountIcons = knack_global_options.settings.woocommerce.accountIcons;
    var perPage = knack_global_options.settings.woocommerce.perPage;

    // SET INPUTS
    if(shopLayout){
        jQuery('#shopLayout option').each(function(index, element) {
            if(jQuery(this).val() == shopLayout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(perPage){
        jQuery('#perPage option').each(function(index, element) {
            if(jQuery(this).val() == perPage){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(nextPrev){
        if(jQuery('#nextPrev').val() == nextPrev){
            jQuery('#nextPrev').attr('checked', 'checked');
        }
    }
    if(socialIcons){
        if(jQuery('#socialIcons').val() == socialIcons){
            jQuery('#socialIcons').attr('checked', 'checked');
        }
    }
    if(accountIcons){
        if(jQuery('#accountIcons').val() == accountIcons){
            jQuery('#accountIcons').attr('checked', 'checked');
        }
    }


}

function knack_update_data(){

    // VARIABLES
    var shopLayout = jQuery('#shopLayout');
    var nextPrev = jQuery('#nextPrev');
    var socialIcons = jQuery('#socialIcons');
    var accountIcons = jQuery('#accountIcons');
    var perPage = jQuery('#perPage');

    // UPDATE INPUTS
    jQuery(shopLayout).on('change', function(){ // SELECT
        knack_global_options.settings.woocommerce.shopLayout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(perPage).on('change', function(){ // SELECT
        knack_global_options.settings.woocommerce.perPage = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(nextPrev).on('change', function(){ // CHECKBOX
        jQuery(this).prop('checked') ? knack_global_options.settings.woocommerce.nextPrev = jQuery(this).val() : knack_global_options.settings.woocommerce.nextPrev = false;
        knack_enable_save(true);
    });
    jQuery(socialIcons).on('change', function(){ // CHECKBOX
        jQuery(this).prop('checked') ? knack_global_options.settings.woocommerce.socialIcons = jQuery(this).val() : knack_global_options.settings.woocommerce.socialIcons = false;
        knack_enable_save(true);
    });
    jQuery(accountIcons).on('change', function(){ // CHECKBOX
        jQuery(this).prop('checked') ? knack_global_options.settings.woocommerce.accountIcons = jQuery(this).val() : knack_global_options.settings.woocommerce.accountIcons = false;
        knack_enable_save(true);
    });

}