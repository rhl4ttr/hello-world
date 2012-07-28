<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	
	const MODERATOR = 1;
	const EDITOR = 2;
	const STUDENT = 4;
	const SUPERADMIN = 8;
	
	public $type;
	
	public function __construct($email, $password, $type){
		
		parent::__construct($email, $password);
		
		$this->type = $type;
	}
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		
		$returnValue = false;
		
		switch ($this->type) {
			case self::MODERATOR :
				$returnValue = $this->authenticateModerator();
				break;
				
			case self::EDITOR :
				break;
				
			case self::STUDENT :
				break;
				
			case self::SUPERADMIN :
				break;
		}
		
		if($returnValue===true){
			$this->errorCode = self::ERROR_NONE;
		}
		
		
		return true;
	}
	
	
	public function authenticateModerator() {
		
		
		if($_SESSION["loggedIn"]){
			return true;
		}
		
		if (Utils::isValidEmailAddress ( $this->username )) {
				
			$moderator = new Moderator ();
			$moderator->email = $this->username;
				
			$moderators = $moderator->find ();
			if(!empty($moderators)){
				$myModerator = $moderators[0];
				if($this->password == $myModerator->password){
					
					session_start();
					$_SESSION["email"] = $this->username;
					$_SESSION["password"] = $this->password;
					$_SESSION["loggedIn"] = true;
					
					return true;
				}else{
					return false;
				}
			}
			
			
		}
	}
}