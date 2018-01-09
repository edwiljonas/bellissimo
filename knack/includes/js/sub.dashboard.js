function knack_run(){

    // SET HEADING
    jQuery('body').find('.knack-settings .heading h1').html('DASHBOARD');

    // SET DATA
    knack_set_data();

    // UPDATE DATA
    knack_update_data();

    // RUN ISNTALL
    knack_install();

    // COMPONENTS
    knack_convert();

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

function knack_set_data(){}

function knack_update_data(){}