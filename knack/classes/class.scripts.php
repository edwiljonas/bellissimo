<?php

# CLASS SCRIPTS

class knack_scripts{

	# CONSTRUCT
	public function __construct(){}

    #FB SCRIPT
    public function knack_fb(){

        #VARIABLES
        $facebookID = $GLOBALS['knack']['settings']['social']['facebookId'];
        $js = '';

        $js .= '
			"use strict";
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '.esc_html($facebookID).',
					xfbml      : true,
					version    : "v2.7"
				});
			};
			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));
		';

        return $js;

    }

}