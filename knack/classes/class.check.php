<?php

# CHECK CLASS

class knack_check{

	//string
	public function knack_checkString($string){
		if(strlen($string) >= 1){
			return true;
		}
		return false;
	}

	//email
	public function knack_checkEmail($string){
		if(preg_match('/.+@.+\.[a-z]/', $string)){
			return true;
		}
		return false;
	}

	//number
	public function knack_checkNumber($string){
		if(is_numeric($string)){
			return true;
		}
		return false;
	}

	//contact number
	public function knack_checkContactNumber($string){
		if(preg_match('/\d/', $string) && strlen($string) > 8){
			return true;
		}
		return false;
	}

	//date
	public function knack_checkDate($string){
		if(strtotime($string) !== false){
			return true;
		}
		return false;
	}

}