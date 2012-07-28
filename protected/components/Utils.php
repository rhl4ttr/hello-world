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
		$pattern_email = '^(.*)@(.*)$';
		if (eregi ( $pattern_email, $email )) {
			list ( $local, $domain ) = explode ( "@", $email );
		} else {
			return false;
		}
		$pattern_local = '^([0-9a-z]*([-|_]?[0-9a-z]+)*)(([-|_]?)\.([-|_]?)[0-9a-z]*([-|_]?[0-9a-z]+)+)*([-|_]?)$';
		$pattern_domain = '^([0-9a-z]+([-]?[0-9a-z]+)*)(([-]?)\.([-]?)[0-9a-z]*([-]?[0-9a-z]+)+)*\.[a-z]{2,4}$';
		$match_local = eregi ( $pattern_local, $local );
		$match_domain = eregi ( $pattern_domain, $domain );
		
		if ($match_local && $match_domain) {
			if ($doDomainValidate) {
				return $this->hasValidDomain ( $email );
			} else
				return true;
		} else
			return false;
	
	}

}