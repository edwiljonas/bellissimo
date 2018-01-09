function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('EXAMPLES');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var logo = knack_global_options.settings.dashboard.logo;
    var text = knack_global_options.settings.dashboard.text;
    var check = knack_global_options.settings.dashboard.check;
    var select = knack_global_options.settings.dashboard.select;

    // SET INPUTS
    if(logo){
        jQuery('#logo').val(logo);
        // PREVIEW
        jQuery('#preview-logo').css({
            'background-image' : 'url('+logo+')'
        });
    }

    if(text){ // TEXT
        jQuery('#text').val(text);
    }

    if(check){ // CHECKBOX
        if(jQuery('#check').val() == check){
            jQuery('#check').attr('checked', 'checked');
        }
    }

    if(select){ // SELECT
        jQuery('#select option').each(function(index, element) {
            if(jQuery(this).val() == select){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }

}

function knack_update_data(){

    // VARIABLES
    var logo = jQuery('#logo');
    var text = jQuery('#text');
    var check = jQuery('#check');
    var select = jQuery('#select');

    // UPDATE INPUTS
    jQuery(logo).on('change', function(){ // MEDIA UPLOAD
        knack_global_options.settings.dashboard.logo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-logo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });

    jQuery(text).on('change', function(){ // TEXT
        knack_global_options.settings.dashboard.text = jQuery(this).val();
        knack_enable_save(true);
    });

    jQuery(check).on('change', function(){ // CHECKBOX
        jQuery(this).prop('checked') ? knack_global_options.settings.dashboard.check = jQuery(this).val() : knack_global_options.settings.dashboard.check = false;
        knack_enable_save(true);
    });

    jQuery(select).on('change', function(){ // SELECT
        knack_global_options.settings.dashboard.select = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });

}