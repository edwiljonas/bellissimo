function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('SIGNUP\'S');

    // WRITE FILE
    knack_write_file();

}

function knack_write_file(){

    jQuery('.export-signups').on('click', function(){

        //GENERATE
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'knack_write'
            },
            dataType: "json"
        }).done(function(data){
            jQuery('.download-file').show();
        }).fail(function(event){
            //console.log(event);
        });

    });

    jQuery('.download-file').on('click', function(){
        var file = jQuery(this).attr('data-file');
        window.open(file);
    });

}