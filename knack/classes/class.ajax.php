<?php

# CLASS AJAX

class knack_ajax{

	# VARIABLES
	public $knack_ajax_calls_array;
	public $knack_ajax_frontend_calls_array;
	public $knack_ajax_frontend_forms_array;
	public $knack_ajax_frontend_array;
	public $backend;
	public $frontend;

	# CONSTRUCT
	public function __construct($backend, $frontend){

		# GET ARRAY DATA
		$this->knack_ajax_calls_array = $this->knack_get_ajax_calls();

		# GET FORMS DATA
		$this->knack_ajax_frontend_forms_array = $this->knack_get_forms_ajax_calls();

        # GET FRONTEND DATA
        $this->knack_ajax_frontend_array = $this->knack_get_frontend_ajax_calls();

		# SET ADMIN BACKEND CALL IDENTIFIER
		$this->backend = $backend;
		//$this->forms = $forms;
        $this->frontend = $frontend;

		# ADD ACTIONS
		$this->knack_set_ajax_calls();
		$this->knack_set_forms_ajax_calls();
        $this->knack_set_frontend_ajax_calls();

	}

	# ADD AJAX HOOKS
	public function knack_set_ajax_calls() {

		# ADD AJAX CALL ACTION
		if(isset($this->knack_ajax_calls_array) && count($this->knack_ajax_calls_array) > 0){
			foreach($this->knack_ajax_calls_array as $call){
				add_action( 'wp_ajax_'. $call['action'], array(&$this->backend, $call['method']) );
			}
		}

	}

	public function knack_get_ajax_calls(){

		# ADMIN AJAX ARRAY CALLS
		$array = array(
			array('action' => 'knack_get_includes','method' => 'knack_get_includes'),
			array('action' => 'knack_get_options','method' => 'knack_get_options'),
            array('action' => 'knack_save','method' => 'knack_save'),
			array('action' => 'knack_set_page_shortcode','method' => 'knack_set_page_shortcode'),
            array('action' => 'knack_write','method' => 'knack_write'),
            array('action' => 'knack_install','method' => 'knack_install'),
		);

		# RETURN
		return $array;

	}

	# ADD FORMS AJAX HOOKS
	public function knack_set_forms_ajax_calls() {

		# ADD AJAX CALL ACTION
		if(isset($this->knack_ajax_frontend_forms_array) && count($this->knack_ajax_frontend_forms_array) > 0){
			foreach($this->knack_ajax_frontend_forms_array as $call){
				add_action('wp_ajax_'. $call['action'], array(&$this->forms, $call['method']));
				add_action('wp_ajax_nopriv_'. $call['action'], array(&$this->forms, $call['method']));
			}
		}

	}

	# LIST OF AJAX CALLS
	public function knack_get_forms_ajax_calls(){

		# FRONT END AJAX ARRAY CALLS
		$array = array(
			array('action' => 'knack_check_forms','method' => 'knack_check_forms'),
		);

		# RETURN
		return $array;

	}

    # ADD FRONTEND AJAX HOOKS
    public function knack_set_frontend_ajax_calls() {

        # ADD AJAX CALL ACTION
        if(isset($this->knack_ajax_frontend_array) && count($this->knack_ajax_frontend_array) > 0){
            foreach($this->knack_ajax_frontend_array as $call){
                add_action('wp_ajax_'. $call['action'], array(&$this->frontend, $call['method']));
                add_action('wp_ajax_nopriv_'. $call['action'], array(&$this->frontend, $call['method']));
            }
        }

    }

    # LIST OF AJAX CALLS
    public function knack_get_frontend_ajax_calls(){

        # FRONT END AJAX ARRAY CALLS
        $array = array(
            array('action' => 'knack_popup_images','method' => 'knack_popup_images'),
            array('action' => 'knack_count','method' => 'knack_count'),
            array('action' => 'knack_add_wish','method' => 'knack_add_wish'),
            array('action' => 'knack_get_wish','method' => 'knack_get_wish'),
            array('action' => 'knack_get_wish_data','method' => 'knack_get_wish_data'),
            array('action' => 'knack_get_cart','method' => 'knack_get_cart'),
            array('action' => 'knack_signup','method' => 'knack_signup'),
            array('action' => 'knack_preview','method' => 'knack_preview'),
            array('action' => 'knack_signup_form','method' => 'knack_signup_form'),
        );

        # RETURN
        return $array;

    }

}