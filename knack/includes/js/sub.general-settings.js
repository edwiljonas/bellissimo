function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('GENERAL SETTINGS');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var favIcon = knack_global_options.settings.general.favIcon;
    var toTop = knack_global_options.settings.general.toTop;
    var page_404_title = knack_global_options.settings.general.page_404_title;
    var page_404_sub = knack_global_options.settings.general.page_404_sub;
    var page_404_description = knack_global_options.settings.general.page_404_description;
    var page_404_button_text = knack_global_options.settings.general.page_404_button_text;
    var page_404_button_url = knack_global_options.settings.general.page_404_button_url;

    // SET INPUTS
    if(favIcon){
        jQuery('#favIcon').val(favIcon);
        // PREVIEW
        jQuery('#preview-favIcon').css({
            'background-image' : 'url('+favIcon+')'
        });
    }
    if(toTop){
        if(jQuery('#toTop').val() == toTop){
            jQuery('#toTop').attr('checked', 'checked');
        }
    }
    if(page_404_title){
        jQuery('#page_404_title').val(page_404_title);
    }
    if(page_404_sub){
        jQuery('#page_404_sub').val(page_404_sub);
    }
    if(page_404_description){
        jQuery('#page_404_description').val(page_404_description);
    }
    if(page_404_button_text){
        jQuery('#page_404_button_text').val(page_404_button_text);
    }
    if(page_404_button_url){
        jQuery('#page_404_button_url').val(page_404_button_url);
    }

}

function knack_update_data(){

    // VARIABLES
    var favIcon = jQuery('#favIcon');
    var toTop = jQuery('#toTop');
    var page_404_title = jQuery('#page_404_title');
    var page_404_sub = jQuery('#page_404_sub');
    var page_404_description = jQuery('#page_404_description');
    var page_404_button_text = jQuery('#page_404_button_text');
    var page_404_button_url = jQuery('#page_404_button_url');

    // UPDATE INPUTS
    jQuery(favIcon).on('change', function(){ // MEDIA UPLOAD
        knack_global_options.settings.general.favIcon = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-favIcon').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(toTop).on('change', function(){ // CHECKBOX
        jQuery(this).prop('checked') ? knack_global_options.settings.general.toTop = jQuery(this).val() : knack_global_options.settings.general.toTop = false;
        knack_enable_save(true);
    });
    jQuery(page_404_title).on('change', function(){
        knack_global_options.settings.general.page_404_title = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(page_404_sub).on('change', function(){
        knack_global_options.settings.general.page_404_sub = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(page_404_description).on('change', function(){
        knack_global_options.settings.general.page_404_description = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(page_404_button_text).on('change', function(){
        knack_global_options.settings.general.page_404_button_text = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(page_404_button_url).on('change', function(){
        knack_global_options.settings.general.page_404_button_url = jQuery(this).val();
        knack_enable_save(true);
    });

}