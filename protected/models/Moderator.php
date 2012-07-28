<?php


class Moderator extends MockData{

	protected $databaseName = DbConnection::DB_MOCK;
	protected $pKey = "id";
	protected $tableName = "mock_moderators";
	protected $mappings = array(
			"id"=>"id",
			"email"=>"email",
			"password"=>"password",
			"fullName"=>"full_name",
			"organizationId" => "org_id");


	public $id;
	public $email;
	public $password;
	public $fullName;
	public $organizationId;
	
	

}


?>