<?php

class Batch extends MockData{

	protected $databaseName = DbConnection::DB_MOCK;
	protected $pKey = "id";
	protected $tableName = "mock_batches";
	protected $mappings = array(
			"id"=>"id",
			"code"=>"code",
			"location"=>"location",
			"startDate"=>"start_date",
			"endDate"=>"end_date",
			"comments"=>"comments",
			"organizationId"=>"org_id"				
	);


	public $id;
	public $code;
	public $location;
	public $startDate;
	public $endDate;
	public $comments;
	public $organizationId;
	
	
	
	public function getBatchCount(){
	
		$pdo = DbConnection::getInstance()->getConnection($this->databaseName);
		
		
		$sql = 'select count(*) as batchCount from mock_batches where org_id = '. $this->organizationId;
		$prepped = $pdo->query($sql);
		
		
		$row = $prepped->fetch(PDO::FETCH_ASSOC);
		return $row["batchCount"];
	
	}

}


?>