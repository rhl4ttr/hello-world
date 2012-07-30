<?php

class Utils {
	
	
	public static function isValidMobileNumber($userMobile) {
		$mobilenumberLen = strlen($userMobile);
	
		if(isset($userMobile) && $mobilenumberLen > 0){
	
			if(!is_numeric($userMobile)) {
	
				return "Please enter a valid 10 digit mobile number";
	
			} else if($mobilenumberLen < 10 || $mobilenumberLen > 10) {
	
				return "Please enter a valid 10 digit mobile number";
	
			} else if (substr($userMobile,0,1) != 9 && substr($userMobile,0,1) != 8 && substr($userMobile,0,1) !=7) {
	
				return "Please enter a mobile number starting with 9 or 8 or 7";
			}
	
			return true;
				
		} else {
	
			return "Please enter a mobile number";
		}
	}
	
	public static function isValidEmailAddress($email) {
		$pattern = '/[a-zZ-Z0-9\._]+@[a-zZ-Z0-9\.]+\.[a-z]+/';
		
		
		return preg_match($pattern, $email)!==0;
	
	}

}