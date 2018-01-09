function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('FOOTER SETTINGS');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var layout = knack_global_options.settings.footer.layout;
    var footerLogo = knack_global_options.settings.footer.footerLogo;
    var columnLayout = knack_global_options.settings.footer.columnLayout;
    var backgroundPrimary = knack_global_options.settings.footer.backgroundPrimary;
    var backgroundSecondary = knack_global_options.settings.footer.backgroundSecondary;
    var copyright = knack_global_options.settings.footer.copyright;
    var copyrightText = knack_global_options.settings.footer.copyrightText;
    var social = knack_global_options.settings.footer.social;

    // SET INPUTS
    if(layout){
        jQuery('#layout option').each(function(index, element) {
            if(jQuery(this).val() == layout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(footerLogo){
        jQuery('#footerLogo').val(footerLogo);
        // PREVIEW
        jQuery('#preview-footerLogo').css({
            'background-image' : 'url('+footerLogo+')'
        });
    }
    if(columnLayout){
        jQuery('#columnLayout option').each(function(index, element) {
            if(jQuery(this).val() == columnLayout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(backgroundPrimary){
        jQuery('#backgroundPrimary').val(backgroundPrimary);
    }
    if(backgroundSecondary){
        jQuery('#backgroundSecondary').val(backgroundSecondary);
    }
    if(copyright){
        if(jQuery('#copyright').val() == copyright){
            jQuery('#copyright').attr('checked', 'checked');
        }
    }
    if(social){
        if(jQuery('#social').val() == social){
            jQuery('#social').attr('checked', 'checked');
        }
    }
    if(copyrightText){
        jQuery('#copyrightText').val(copyrightText);
    }

    // SET COLOR SWITCHER FOR NON DYNAMIC INPUTS
    jQuery('#backgroundPrimary').wpColorPicker({
        change: function(event, ui){
            knack_global_options.settings.footer.backgroundPrimary = ui.color.toString();
            knack_enable_save(true);
        }
    });
    jQuery('#backgroundSecondary').wpColorPicker({
        change: function(event, ui){
            knack_global_options.settings.footer.backgroundSecondary = ui.color.toString();
            knack_enable_save(true);
        }
    });

}

function knack_update_data(){

    // VARIABLES
    var layout = jQuery('#layout');
    var footerLogo = jQuery('#footerLogo');
    var columnLayout = jQuery('#columnLayout');
    var backgroundPrimary = jQuery('#backgroundPrimary');
    var backgroundSecondary = jQuery('#backgroundSecondary');
    var copyright = jQuery('#copyright');
    var copyrightText = jQuery('#copyrightText');
    var social = jQuery('#social');

    // UPDATE INPUTS
    jQuery(layout).on('change', function(){
        knack_global_options.settings.footer.layout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(footerLogo).on('change', function(){
        knack_global_options.settings.footer.footerLogo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-footerLogo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(columnLayout).on('change', function(){
        knack_global_options.settings.footer.columnLayout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(copyright).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.footer.copyright = jQuery(this).val() : knack_global_options.settings.footer.copyright = false;
        knack_enable_save(true);
    });
    jQuery(social).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.footer.social = jQuery(this).val() : knack_global_options.settings.footer.social = false;
        knack_enable_save(true);
    });
    jQuery(copyrightText).on('change', function(){
        knack_global_options.settings.footer.copyrightText = jQuery(this).val();
        knack_enable_save(true);
    });

}