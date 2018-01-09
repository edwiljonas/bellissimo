function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('BLOG SETTINGS');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // COMPONENTS
    knack_convert();

}

function knack_set_data(){

    // VARIABLES
    var layout = knack_global_options.settings.blog.layout;
    var singleLayout = knack_global_options.settings.blog.singleLayout;
    var socialIcons = knack_global_options.settings.blog.socialIcons;
    var tags = knack_global_options.settings.blog.tags;
    var categories = knack_global_options.settings.blog.categories;
    var author = knack_global_options.settings.blog.author;

    // SET INPUTS
    if(layout){
        jQuery('#layout option').each(function(index, element) {
            if(jQuery(this).val() == layout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(singleLayout){
        jQuery('#singleLayout option').each(function(index, element) {
            if(jQuery(this).val() == singleLayout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(socialIcons){
        if(jQuery('#socialIcons').val() == socialIcons){
            jQuery('#socialIcons').attr('checked', 'checked');
        }
    }
    if(tags){
        if(jQuery('#tags').val() == tags){
            jQuery('#tags').attr('checked', 'checked');
        }
    }
    if(categories){
        if(jQuery('#categories').val() == categories){
            jQuery('#categories').attr('checked', 'checked');
        }
    }
    if(author){
        if(jQuery('#author').val() == author){
            jQuery('#author').attr('checked', 'checked');
        }
    }

}

function knack_update_data(){

    // VARIABLES
    var layout = jQuery('#layout');
    var singleLayout = jQuery('#singleLayout');
    var socialIcons = jQuery('#socialIcons');
    var tags = jQuery('#tags');
    var categories = jQuery('#categories');
    var author = jQuery('#author');

    // UPDATE INPUTS
    jQuery(layout).on('change', function(){
        knack_global_options.settings.blog.layout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(singleLayout).on('change', function(){
        knack_global_options.settings.blog.singleLayout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(socialIcons).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.blog.socialIcons = jQuery(this).val() : knack_global_options.settings.blog.socialIcons = false;
        knack_enable_save(true);
    });
    jQuery(tags).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.blog.tags = jQuery(this).val() : knack_global_options.settings.blog.tags = false;
        knack_enable_save(true);
    });
    jQuery(categories).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.blog.categories = jQuery(this).val() : knack_global_options.settings.blog.categories = false;
        knack_enable_save(true);
    });
    jQuery(author).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.blog.author = jQuery(this).val() : knack_global_options.settings.blog.author = false;
        knack_enable_save(true);
    });

}