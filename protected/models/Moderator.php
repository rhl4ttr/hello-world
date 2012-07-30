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
			"organizationId" => "org_id",
			"role" => "user_role");


	public $id;
	public $email;
	public $password;
	public $fullName;
	public $organizationId;
	public $role;
	

	
	public function getBatchCount(){
	
		$pdo = DbConnection::getInstance()->getConnection($this->databaseName);	
		$sql = 'select count(*) as batchCount from mock_batches where institute_id = '. $this->organizationId;	
		$prepped = $pdo->query($sql);	
		$row = $prepped->fetch(PDO::FETCH_ASSOC);	
		return $row["batchCount"];
	
	}
}


?>