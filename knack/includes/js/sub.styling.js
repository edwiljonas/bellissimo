function knack_run(){

    // GOOGLE FONTS
    jQuery(knack_global_options.settings.styling.accents).each(function(index, element) {
        var google_fonts = ['family' + index];
        knack_google_options(google_fonts);
    });

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('STYLING');

    // SET - ACCENTS
    jQuery(knack_global_options.settings.styling.accents).each(function(index, element){
        knack_set_accent(index, element);
        jQuery('#accent'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.styling.accents[index].color = ui.color.toString();
                knack_enable_save(true);
            }
        });
    });

    // UPDATE - ACCENTS
    jQuery(knack_global_options.settings.styling.accents).each(function(index, element){
        knack_update_accent(index, element);
    });

    // SET - BUTTONS
    jQuery(knack_global_options.settings.styling.buttons).each(function(index, element){
        var selected = knack_global_options.settings.styling.buttons[index].family;
        knack_set_weight(index, selected);
        knack_set_buttons(index, element);
        jQuery('#color'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.styling.buttons[index].color = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#hoverColor'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.styling.buttons[index].hoverColor = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#background'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.styling.buttons[index].background = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#backgroundHover'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.styling.buttons[index].backgroundHover = ui.color.toString();
                knack_enable_save(true);
            }
        });
    });

    jQuery(knack_global_options.settings.styling.buttons).each(function(index, element){
        knack_update_buttons(index, element);
        knack_weight(index, element);
    });

}

function knack_set_accent(index, element){

    if(knack_global_options.settings.styling.accents[index].color){
        jQuery('#accent'+index).val(knack_global_options.settings.styling.accents[index].color);
    }

}

function knack_update_accent(index, element){

    jQuery('#accent'+index).on('change', function (evt) {
        knack_global_options.settings.styling.accents[index].color = jQuery(this).val();
        knack_enable_save(true);
    });

}

function knack_set_buttons(index, element){

    var family = knack_global_options.settings.styling.buttons[index].family;
    var size = knack_global_options.settings.styling.buttons[index].size;
    var transform = knack_global_options.settings.styling.buttons[index].transform;
    var spacing = knack_global_options.settings.styling.buttons[index].spacing;
    var opacity = knack_global_options.settings.styling.buttons[index].opacity;
    var color = knack_global_options.settings.styling.buttons[index].color;
    var hoverColor = knack_global_options.settings.styling.buttons[index].hoverColor;
    var background = knack_global_options.settings.styling.buttons[index].background;
    var backgroundHover = knack_global_options.settings.styling.buttons[index].backgroundHover;
    var weight = knack_global_options.settings.styling.buttons[index].weight;

    if(family){
        jQuery('#family'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == family){
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
    if(weight){
        jQuery('#weight'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == weight){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(opacity){
        jQuery('#opacity'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == opacity){
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
    if(background){
        jQuery('#background'+index).val(background);
    }
    if(backgroundHover){
        jQuery('#backgroundHover'+index).val(backgroundHover);
    }

}

function knack_update_buttons(index, element){

    var family = jQuery('#family'+index);
    var size = jQuery('#size'+index);
    var transform = jQuery('#transform'+index);
    var spacing = jQuery('#spacing'+index);
    var opacity = jQuery('#opacity'+index);
    var weight = jQuery('#weight'+index);
    var color = jQuery('#color'+index);
    var hoverColor = jQuery('#hoverColor'+index);
    var background = jQuery('#background'+index);
    var backgroundHover = jQuery('#backgroundHover'+index);

    jQuery(family).on('change', function(){
        knack_global_options.settings.styling.buttons[index].family = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(size).on('change', function(){
        knack_global_options.settings.styling.buttons[index].size = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(transform).on('change', function(){
        knack_global_options.settings.styling.buttons[index].transform = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(spacing).on('change', function(){
        knack_global_options.settings.styling.buttons[index].spacing = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(opacity).on('change', function(){
        knack_global_options.settings.styling.buttons[index].opacity = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(weight).on('change', function(){
        knack_global_options.settings.styling.buttons[index].weight = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });

}