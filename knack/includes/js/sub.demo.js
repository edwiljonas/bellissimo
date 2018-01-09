function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('DEMO INSTALL');

    // WRITE FILE
    knack_demo();

    // RUN ISNTALL
    knack_install();

}

function knack_demo(){


}

function knack_install(){

    jQuery('.run-demo').on('click', function(){

        knack_loader('show');

        // GET TEST OBJECT
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'knack_install'
            },
            dataType: "json"
        }).done(function(data){
            knack_loader('hide');
            console.log('Data');
            console.log(data);
        }).fail(function(event){
            console.log(event);
        });

    });

}