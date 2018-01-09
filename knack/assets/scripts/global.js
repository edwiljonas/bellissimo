var knack_global_options;
var knack_global_fonts;
var knack_global_fonts_search = [];
var knack_save_status = false;

jQuery(document).ready(function() {

    knack_get_options();
    knack_enable_save(false);
    knack_google_fonts();
    knack_enable_nav();

});

function knack_enable_nav(){

    var top = jQuery(window).scrollTop();

    jQuery(window).on('scroll', function(){

        top = jQuery(window).scrollTop();

        if(top > 200){
            jQuery('.heading-wrap').addClass('heading-sticky');
        } else {
            jQuery('.heading-wrap').removeClass('heading-sticky');
        }

    });

}

function knack_get_options(){

    // GET TEST OBJECT
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
            'action': 'knack_get_options'
        },
        dataType: "json"
    }).done(function(data){
        knack_global_options = data;
        knack_sidebar();
    }).fail(function(event){
    });

}

function knack_enable_save(status){

    if(status){
        // REBIND THE CLICK
        jQuery('.save-button').removeClass('no-save').bind('click');
        // SET THE SAVE
        knack_save();
        // SET STATUS
        knack_save_status = true;
    } else {
        // UNBIND THE CLICK
        jQuery('.save-button').addClass('no-save').unbind('click');
        // SET STATUS
        knack_save_status = false;
    }

}

function knack_save(){

    //SAVE OBJECT
    jQuery('.save-button').off().on('click', function(){
        knack_loader('show');
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'options':JSON.stringify(knack_global_options),
                'action': 'knack_save'
            },
            dataType: "json"
        }).done(function(data){
            knack_loader('hide');
            // SET THE SAVE BUTTON (ON/OFF)
            knack_enable_save(false);
        }).fail(function(event){
        });
    });

}

function knack_sidebar(){

    // CLICK
    jQuery('.knack-settings .sidebar li').off().on('click', function(){

        knack_loader('show');

        jQuery("*").removeClass('knack-active');

        if(jQuery(this).attr('data-slug')){

            // VARIABLES
            var slug = jQuery(this).attr('data-slug');

            // AJAX
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: {
                    'slug':slug,
                    'dir':global_theme_directory,
                    'options': knack_global_options,
                    'action': 'knack_get_includes'
                },
                dataType: "html"
            }).done(function(data){
                knack_loader('hide');
                jQuery('body').find('.load-elements').html(data);
                jQuery.getScript( global_theme_directory + "/knack/includes/js/sub."+slug+".js", function( script, textStatus, jqxhr ){
                    knack_run();
                });
                var height = jQuery('.knack-settings .options').height();
                jQuery('.knack-settings .sidebar').height(height);
            }).fail(function(event){
                //console.log(event);
            });

        }

        // ADD ACTIVE STATE
        jQuery(this).addClass('knack-active');

    });

    // TRIGGER FIRST LOAD
    jQuery('.knack-settings .sidebar li').first().trigger('click');

}

function knack_loader(status){

    var height = jQuery('.knack-settings').height();
    jQuery('.animate-loader').height(height);

    if(status === 'show'){
        jQuery('.animate-loader').show();
    } else {
        jQuery('.animate-loader').hide();
    }

}

function knack_google_fonts(){

    //AJAX CALL FOR GOOGLE FONTS
    jQuery.ajax({
        url: 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCe3XGw8IKuzIXe7bL6ZQc1xbe3MX5DR-s',
        type: "GET",
        dataType: "json"
    }).done(function(data){
        knack_global_fonts = data.items;
        knack_google_search(knack_global_fonts);
    }).fail(function(){
    });

}

function knack_google_search(data){

    jQuery(data).each(function(index, element){
        knack_global_fonts_search.push(element.family);
    });

}

function knack_google_options(select){

    var html = '';
    jQuery(select).each(function(index, element){
        jQuery(knack_global_fonts_search).each(function(idx,ele){
            html += "<option value='"+ele+"'>"+ele+"</option>";
        });
        jQuery('#'+element).html(html);
    });

}

// WEIGHT
function knack_weight(index, element){

    var family = jQuery('#family'+index);

    jQuery(family).on('change', function(){
        var selected = jQuery(this).children('option:selected').val();
        knack_set_weight(index, selected);
    });

}

// SET WEIGHT
function knack_set_weight(index, selected){

    var html = '';

    jQuery(knack_global_fonts).each(function(idx, ele){

        if(ele.family === selected){
            jQuery(ele.variants).each(function(i,e){
                html += '<option value="'+e+'">'+e+'</option>';
            });
        }

    });

    jQuery('#weight'+index).html(html);

}