function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('SOCIAL');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    //SET UPDATE
    jQuery(knack_global_options.settings.social.shares).each(function(index, element){
        jQuery(element.socialItems).each(function(idx, ele){
            knack_set_social_data(index, idx, ele.label, element.postType);
            knack_update_social_data(index, idx, ele.label, element.postType);
        });
    });

    // SET - ICONS
    jQuery(knack_global_options.settings.social.socialItems).each(function(index, element){
        knack_set_icons(index, element);
        jQuery('#icon_hoverColor'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.social.socialItems[index].hoverColor = ui.color.toString();
                knack_enable_save(true);
            }
        });
    });

    // UPDATE - ICONS
    jQuery(knack_global_options.settings.social.socialItems).each(function(index, element){
        knack_update_icons(index, element);
    });

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var facebookId = knack_global_options.settings.social.facebookId;
    var socialIcons = knack_global_options.settings.social.socialIcons;
    var socialPrimaryColor = knack_global_options.settings.social.socialPrimaryColor;

    // SET INPUTS
    if(facebookId){ // TEXT
        jQuery('#facebookId').val(facebookId);
    }

    if(socialIcons){
        if(jQuery('#socialIcons').val() == socialIcons){
            jQuery('#socialIcons').attr('checked', 'checked');
        }
    }

    if(socialPrimaryColor){
        jQuery('#socialPrimaryColor').val(socialPrimaryColor);
    }

    jQuery('#socialPrimaryColor').wpColorPicker({
        change: function(event, ui){
            knack_global_options.settings.social.socialPrimaryColor = ui.color.toString();
            knack_enable_save(true);
        }
    });

}

function knack_update_data(){

    // VARIABLES
    var facebookId = jQuery('#facebookId');
    var socialIcons = jQuery('#socialIcons');

    // UPDATE INPUTS
    jQuery(facebookId).on('change', function(){
        knack_global_options.settings.social.facebookId = jQuery(this).val();
        knack_enable_save(true);
    });

    jQuery(socialIcons).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.social.socialIcons = jQuery(this).val() : knack_global_options.settings.social.socialIcons = false;
        knack_enable_save(true);
    });

}

function knack_set_social_data(primary_index, social_index, label, pointer){

    if(knack_global_options.settings.social.shares[primary_index].socialItems[social_index].status){
        if(jQuery("#"+pointer+label).val() == knack_global_options.settings.social.shares[primary_index].socialItems[social_index].status){
            jQuery("#"+pointer+label).attr('checked', 'checked');
        }
    }

}

function knack_update_social_data(primary_index, social_index, label, pointer){

    jQuery("#"+pointer+label).off().on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.social.shares[primary_index].socialItems[social_index].status = jQuery(this).val() : knack_global_options.settings.social.shares[primary_index].socialItems[social_index].status = false;
        knack_enable_save(true);
    });

}

function knack_set_icons(index, element){

    var status = knack_global_options.settings.social.socialItems[index].status;
    var url = knack_global_options.settings.social.socialItems[index].url;
    var hoverColor = knack_global_options.settings.social.socialItems[index].hoverColor;

    if(status){
        if(jQuery('#status'+index).val() == status){
            jQuery('#status'+index).attr('checked', 'checked');
        }
    }
    if(url){
        jQuery('#url'+index).val(url);
    }
    if(hoverColor){
        jQuery('#icon_hoverColor'+index).val(hoverColor);
    }

}

function knack_update_icons(index, element){

    var status = jQuery('#status'+index);
    var url = jQuery('#url'+index);

    jQuery(status).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.social.socialItems[index].status = jQuery(this).val() : knack_global_options.settings.social.socialItems[index].status = false;
        knack_enable_save(true);
    });
    jQuery(url).on('change', function(){
        knack_global_options.settings.social.socialItems[index].url = jQuery(this).val();
        knack_enable_save(true);
    });

}