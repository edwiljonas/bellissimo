function knack_run(){

    // GOOGLE FONTS
    jQuery(knack_global_options.settings.typography.fonts).each(function(index, element) {
        var google_fonts = ['family' + index];
        knack_google_options(google_fonts);
    });

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('TYPOGRAPHY');

    // SET - FONTS
    jQuery(knack_global_options.settings.typography.fonts).each(function(index, element){
        var selected = knack_global_options.settings.typography.fonts[index].family;
        knack_set_weight(index, selected);
        knack_set_fonts(index, element);
        jQuery('#color'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.typography.fonts[index].color = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#hoverColor'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.typography.fonts[index].hoverColor = ui.color.toString();
                knack_enable_save(true);
            }
        });
    });

    // UPDATE - FONTS
    jQuery(knack_global_options.settings.typography.fonts).each(function(index, element){
        knack_update_fonts(index, element);
        knack_weight(index, element);
    });

}

function knack_set_fonts(index, element){

    var family = knack_global_options.settings.typography.fonts[index].family;
    var weight = knack_global_options.settings.typography.fonts[index].weight;
    var size = knack_global_options.settings.typography.fonts[index].size;
    var lineHeight = knack_global_options.settings.typography.fonts[index].lineHeight;
    var style = knack_global_options.settings.typography.fonts[index].style;
    var transform = knack_global_options.settings.typography.fonts[index].transform;
    var spacing = knack_global_options.settings.typography.fonts[index].spacing;
    var color = knack_global_options.settings.typography.fonts[index].color;
    var hoverColor = knack_global_options.settings.typography.fonts[index].hoverColor;

    if(family){
        jQuery('#family'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == family){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(weight){
        jQuery('#weight'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == weight){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(size){
        jQuery('#size'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == size){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(lineHeight){
        jQuery('#lineHeight'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == lineHeight){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(style){
        jQuery('#style'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == style){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(transform){
        jQuery('#transform'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == transform){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(spacing){
        jQuery('#spacing'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == spacing){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }

    if(color){
        jQuery('#color'+index).val(color);
    }
    if(hoverColor){
        jQuery('#hoverColor'+index).val(hoverColor);
    }

}

function knack_update_fonts(index, element){

    var family = jQuery('#family'+index);
    var weight = jQuery('#weight'+index);
    var size = jQuery('#size'+index);
    var lineHeight = jQuery('#lineHeight'+index);
    var style = jQuery('#style'+index);
    var transform = jQuery('#transform'+index);
    var spacing = jQuery('#spacing'+index);

    jQuery(family).on('change', function(){
        knack_global_options.settings.typography.fonts[index].family = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(weight).on('change', function(){
        knack_global_options.settings.typography.fonts[index].weight = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(size).on('change', function(){
        knack_global_options.settings.typography.fonts[index].size = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(lineHeight).on('change', function(){
        knack_global_options.settings.typography.fonts[index].lineHeight = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(style).on('change', function(){
        knack_global_options.settings.typography.fonts[index].style = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(transform).on('change', function(){
        knack_global_options.settings.typography.fonts[index].transform = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(spacing).on('change', function(){
        knack_global_options.settings.typography.fonts[index].spacing = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });

}