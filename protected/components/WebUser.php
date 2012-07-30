<?php
class WebUser extends CWebUser
{
	//public $role;
	//public $isModerator;
	//public $isAdmin;
	//public $isStudent;
	
	
	public $userObj;

	
	public function isModerator(){
		return $this->userObj->role == UserIdentity::MODERATOR;
	}
	
	
	public function isSuperAdmin(){
		return $this->userObj->role == UserIdentity::SUPERADMIN;
	}
	
	public function isEditor(){
		return $this->userObj->role == UserIdentity::EDITOR;
	}
	
	
	public function isStudent(){
		return $this->userObj->role == UserIdentity::STUDENT;
	}
	
	
	
	protected function afterLogin($fromCookie)
	{
		if($this->getState("role")==UserIdentity::MODERATOR){
			$this->userObj = new Moderator();
			$this->userObj->load($this->getId());
		}		
	}

}
?>