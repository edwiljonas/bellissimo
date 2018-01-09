function knack_run(){

    // GOOGLE FONTS
    jQuery(knack_global_options.settings.header.stylingOptions).each(function(index, element) {
        var google_fonts = ['family' + index];
        knack_google_options(google_fonts);
    });

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('HEADER');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // SET - HEADER STYLES
    jQuery(knack_global_options.settings.header.stylingOptions).each(function(index, element){
        var selected = knack_global_options.settings.typography.fonts[index].family;
        knack_set_weight(index, selected);
        knack_set_header_styles(index, element);
        jQuery('#color'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.header.stylingOptions[index].color = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#hoverColor'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.header.stylingOptions[index].hoverColor = ui.color.toString();
                knack_enable_save(true);
            }
        });
        jQuery('#background'+index).wpColorPicker({
            change: function(event, ui){
                knack_global_options.settings.header.stylingOptions[index].background = ui.color.toString();
                knack_enable_save(true);
            }
        });
    });

    // UPDATE - HEADER STYLES
    jQuery(knack_global_options.settings.header.stylingOptions).each(function(index, element){
        knack_update_header_styles(index, element);
        knack_weight(index, element);
    });

    // SET CENTER CONTENT
    jQuery(knack_global_options.settings.header.centerContent).each(function(index, element){
        knack_set_center(index, element);
    });

    // UPDATE CENTER CONTENT
    jQuery(knack_global_options.settings.header.centerContent).each(function(index, element){
        knack_update_center(index, element);
    });

    // COMPONENTS
    knack_convert();

}

function knack_set_center(index, element) {

    var label = knack_global_options.settings.header.centerContent[index].label;
    var sub = knack_global_options.settings.header.centerContent[index].sub;
    var icon_select = knack_global_options.settings.header.centerContent[index].icon;

    if(icon_select){
        jQuery('#icon_select'+index+' option').each(function(index, element) {
            console.log(element);
            if(jQuery(this).val() === icon_select){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(label){
        jQuery('#label'+index).val(label);
    }
    if(sub){
        jQuery('#sub'+index).val(sub);
    }

}

function knack_update_center(index, element) {

    var label = jQuery('#label' + index);
    var sub = jQuery('#sub' + index);
    var icon_select = jQuery('#icon_select' + index);

    jQuery(icon_select).on('change', function(){
        knack_global_options.settings.header.centerContent[index].icon = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });

    jQuery(label).on('change', function(){
        knack_global_options.settings.header.centerContent[index].label = jQuery(this).val();
        knack_enable_save(true);
    });

    jQuery(sub).on('change', function(){
        knack_global_options.settings.header.centerContent[index].sub = jQuery(this).val();
        knack_enable_save(true);
    });

}

function knack_set_data(){

    // VARIABLES
    var layout = knack_global_options.settings.header.layout;
    var srcLogo = knack_global_options.settings.header.srcLogo;
    var altLogo = knack_global_options.settings.header.altLogo;
    var stickyLogo = knack_global_options.settings.header.stickyLogo;
    var mobileLogo = knack_global_options.settings.header.mobileLogo;
    var optionAccount = knack_global_options.settings.header.optionAccount;
    var optionCart = knack_global_options.settings.header.optionCart;
    var optionWishlist = knack_global_options.settings.header.optionWishlist;
    var optionSearch = knack_global_options.settings.header.optionSearch;
    var mobileSwitch = knack_global_options.settings.header.mobileSwitch;
    var eyebrowText = knack_global_options.settings.header.eyebrowText;

    var modal = knack_global_options.settings.header.modal;
    var modalTitle = knack_global_options.settings.header.modalTitle;
    var modalText = knack_global_options.settings.header.modalText;
    var modalBg = knack_global_options.settings.header.modalBg;
    var modalColor = knack_global_options.settings.header.modalColor;

    // SET INPUTS
    if(layout){
        jQuery('#layout option').each(function(index, element) {
            if(jQuery(this).val() == layout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(srcLogo){
        jQuery('#logo').val(srcLogo);
        // PREVIEW
        jQuery('#preview-srcLogo').css({
            'background-image' : 'url('+srcLogo+')'
        });
    }
    if(altLogo){
        jQuery('#altLogo').val(altLogo);
        // PREVIEW
        jQuery('#preview-altLogo').css({
            'background-image' : 'url('+altLogo+')'
        });
    }
    if(stickyLogo){
        jQuery('#stickyLogo').val(stickyLogo);
        // PREVIEW
        jQuery('#preview-stickyLogo').css({
            'background-image' : 'url('+stickyLogo+')'
        });
    }
    if(mobileLogo){
        jQuery('#logo').val(mobileLogo);
        // PREVIEW
        jQuery('#preview-mobileLogo').css({
            'background-image' : 'url('+mobileLogo+')'
        });
    }
    if(optionAccount){
        if(jQuery('#optionAccount').val() == optionAccount){
            jQuery('#optionAccount').attr('checked', 'checked');
        }
    }
    if(optionCart){
        if(jQuery('#optionCart').val() == optionCart){
            jQuery('#optionCart').attr('checked', 'checked');
        }
    }
    if(optionWishlist){
        if(jQuery('#optionWishlist').val() == optionWishlist){
            jQuery('#optionWishlist').attr('checked', 'checked');
        }
    }
    if(optionSearch){
        if(jQuery('#optionSearch').val() == optionSearch){
            jQuery('#optionSearch').attr('checked', 'checked');
        }
    }
    if(mobileSwitch){
        jQuery('#mobileSwitch option').each(function(index, element) {
            if(jQuery(this).val() == mobileSwitch){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }
    if(eyebrowText){
        jQuery('#eyebrowText').val(eyebrowText);
    }
    if(modalTitle){
        jQuery('#modalTitle').val(modalTitle);
    }
    if(modalText){
        jQuery('#modalText').val(modalText);
    }
    if(modal){
        if(jQuery('#modal').val() == modal){
            jQuery('#modal').attr('checked', 'checked');
        }
    }
    if(modalBg){
        jQuery('#modalBg').val(modalBg);
        // PREVIEW
        jQuery('#preview-modalBg').css({
            'background-image' : 'url('+modalBg+')'
        });
    }
    if(modalColor){
        jQuery('#modalColor').val(modalColor);
    }

    // SET COLOR SWITCHER FOR NON DYNAMIC INPUTS
    jQuery('#modalColor').wpColorPicker({
        change: function(event, ui){
            knack_global_options.settings.header.modalColor = ui.color.toString();
            knack_enable_save(true);
        }
    });

}

function knack_update_data(){

    // VARIABLES
    var layout = jQuery('#layout');
    var srcLogo = jQuery('#srcLogo');
    var altLogo = jQuery('#altLogo');
    var stickyLogo = jQuery('#stickyLogo');
    var mobileLogo = jQuery('#mobileLogo');
    var optionAccount = jQuery('#optionAccount');
    var optionCart = jQuery('#optionCart');
    var optionWishlist = jQuery('#optionWishlist');
    var optionSearch = jQuery('#optionSearch');
    var mobileSwitch = jQuery('#mobileSwitch');
    var eyebrowText = jQuery('#eyebrowText');
    var modal = jQuery('#modal');
    var modalTitle = jQuery('#modalTitle');
    var modalText = jQuery('#modalText');
    var modalBg = jQuery('#modalBg');

    // UPDATE INPUTS
    jQuery(layout).on('change', function(){
        knack_global_options.settings.header.layout = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(srcLogo).on('change', function(){
        knack_global_options.settings.header.srcLogo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-srcLogo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(altLogo).on('change', function(){
        knack_global_options.settings.header.altLogo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-altLogo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(stickyLogo).on('change', function(){
        knack_global_options.settings.header.stickyLogo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-stickyLogo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(mobileLogo).on('change', function(){
        knack_global_options.settings.header.mobileLogo = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-mobileLogo').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });
    jQuery(optionAccount).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.header.optionAccount = jQuery(this).val() : knack_global_options.settings.header.optionAccount = false;
        knack_enable_save(true);
    });
    jQuery(optionCart).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.header.optionCart = jQuery(this).val() : knack_global_options.settings.header.optionCart = false;
        knack_enable_save(true);
    });
    jQuery(optionWishlist).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.header.optionWishlist = jQuery(this).val() : knack_global_options.settings.header.optionWishlist = false;
        knack_enable_save(true);
    });
    jQuery(optionSearch).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.header.optionSearch = jQuery(this).val() : knack_global_options.settings.header.optionSearch = false;
        knack_enable_save(true);
    });
    jQuery(mobileSwitch).on('change', function(){
        knack_global_options.settings.header.mobileSwitch = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(eyebrowText).on('change', function(){
        knack_global_options.settings.header.eyebrowText = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(modal).on('change', function(){
        jQuery(this).prop('checked') ? knack_global_options.settings.header.modal = jQuery(this).val() : knack_global_options.settings.header.modal = false;
        knack_enable_save(true);
    });
    jQuery(modalTitle).on('change', function(){
        knack_global_options.settings.header.modalTitle = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(modalText).on('change', function(){
        knack_global_options.settings.header.modalText = jQuery(this).val();
        knack_enable_save(true);
    });
    jQuery(modalBg).on('change', function(){
        knack_global_options.settings.header.modalBg = jQuery(this).val();
        // PREVIEW
        jQuery('#preview-modalBg').css({
            'background-image' : 'url('+jQuery(this).val()+')'
        });
        knack_enable_save(true);
    });

}

function knack_set_header_styles(index, element){

    var family = knack_global_options.settings.header.stylingOptions[index].family;
    var weight = knack_global_options.settings.header.stylingOptions[index].weight;
    var size = knack_global_options.settings.header.stylingOptions[index].size;
    var style = knack_global_options.settings.header.stylingOptions[index].style;
    var transform = knack_global_options.settings.header.stylingOptions[index].transform;
    var spacing = knack_global_options.settings.header.stylingOptions[index].spacing;
    var color = knack_global_options.settings.header.stylingOptions[index].color;
    var hoverColor = knack_global_options.settings.header.stylingOptions[index].hoverColor;
    var background = knack_global_options.settings.header.stylingOptions[index].background;
    var opacity = knack_global_options.settings.header.stylingOptions[index].opacity;

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
    if(opacity){
        jQuery('#opacity'+index+' option').each(function(index, element) {
            if(jQuery(this).val() == opacity){
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
    if(background){
        jQuery('#background'+index).val(background);
    }

}

function knack_update_header_styles(index, element){

    var family = jQuery('#family'+index);
    var weight = jQuery('#weight'+index);
    var size = jQuery('#size'+index);
    var style = jQuery('#style'+index);
    var transform = jQuery('#transform'+index);
    var spacing = jQuery('#spacing'+index);
    var opacity = jQuery('#opacity'+index);

    jQuery(family).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].family = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(weight).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].weight = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(size).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].size = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(style).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].style = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(transform).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].transform = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(spacing).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].spacing = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });
    jQuery(opacity).on('change', function(){
        knack_global_options.settings.header.stylingOptions[index].opacity = jQuery(this).children('option:selected').val();
        knack_enable_save(true);
    });

}

function knack_set_icons(index, element){

    var status = knack_global_options.settings.header.socialItems[index].status;
    var url = knack_global_options.settings.header.socialItems[index].url;
    var hoverColor = knack_global_options.settings.header.socialItems[index].hoverColor;

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
        jQuery(this).prop('checked') ? knack_global_options.settings.header.socialItems[index].status = jQuery(this).val() : knack_global_options.settings.header.socialItems[index].status = false;
        knack_enable_save(true);
    });
    jQuery(url).on('change', function(){
        knack_global_options.settings.header.socialItems[index].url = jQuery(this).val();
        knack_enable_save(true);
    });

}