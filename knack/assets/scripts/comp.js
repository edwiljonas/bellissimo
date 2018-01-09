jQuery(document).ready(function() {

    knack_convert();

});

function knack_convert(){

    // MEDIA UPLOADER
    jQuery('.upload-media').each(function(index, element) {
        upload_media(element);
    });

    //jQuery('.color-field').wpColorPicker();

}

// ACTIVATE MEDIA LOADER
function upload_media(elements){

    var file_frame;

    jQuery(elements).off().on('click', function(event){

        //connected with an items ID
        var the_connected_input = jQuery('#'+jQuery(this).data('connect'));

        //set multiple status true for multiple, false for single selection
        var the_mulitple_status = jQuery(this).data('multiple');

        //set the image size
        var the_size = jQuery(this).data('size');

        if(the_mulitple_status){
            the_mulitple_status = 'add';
        }else{
            the_mulitple_status = false;
        }

        event.preventDefault();

        if(file_frame){
            file_frame.open();
            return;
        }
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('title'),
            button: {
                text: jQuery(this).data('text')
            },
            multiple: the_mulitple_status
        });

        // MEDIA FRAME
        file_frame.on( 'select', function() {

            // VARAIBLES
            var my_img_array = [];
            var img_string = '';

            if(the_mulitple_status == 'add'){

                var current_values = the_connected_input.val();

                attachment = file_frame.state().get('selection');

                // LOOP
                jQuery(attachment.models).each(function(index,element){
                    my_img_array.push(element.attributes.sizes.full.url);
                });

                // SET VARIABLE
                img_string = my_img_array.toString() + ',' + current_values;

                // SET INPUT
                the_connected_input.val(img_string.replace(/^,|,$/g,''));

            } else {

                attachment = file_frame.state().get('selection').first().toJSON();

                // SET VARIABLE
                if(the_size == 'large'){
                    if(attachment.sizes.large){
                        img_string = attachment.sizes.large.url;
                    } else {
                        img_string = attachment.sizes.full.url;
                    }
                } else {
                    img_string = attachment.sizes.full.url;
                }

                // SET INPUT
                the_connected_input.val(img_string);

            }

            // TRIGGER
            jQuery(the_connected_input).trigger('change');

        });
        file_frame.open();
    });
}

