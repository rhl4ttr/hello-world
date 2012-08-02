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
	
	
	
	public function getBatches($options = array()){
		$data = array();
	
		$pdo = DbConnection::getInstance()->getConnection($this->databaseName);
		
		
		$like = '';
		
		
		$params = array();
		
		if(array_key_exists("code", $options)){
			$like = " AND code LIKE :code OR comments LIKE :comment";
			$params[":code"] = "%{$options["code"]}%";
			$params[":comment"] = "%{$options["code"]}%";
		}
		
		$countSql = 'select count(*) as batchCount from mock_batches where org_id = '. $this->organizationId.$like;
		
		//$prepped = $pdo->query($sql);
		$prepped = $pdo->prepare($countSql);
		
		$prepped->execute($params);
		
		
		$row = $prepped->fetch(PDO::FETCH_ASSOC);
		
		$data["count"] = $row["batchCount"];
		
		$start = '';
		if(array_key_exists("start", $options)){
			$start = "{$options["start"]},";
		}
		
		$rowLimit = 10;
		if(array_key_exists("rows", $options)){
			$rowLimit = $options["rows"];
		}
		
		
		$limit = " LIMIT {$start}{$rowLimit}";
		
		$sql = 'select * from mock_batches where org_id = '. $this->organizationId.$like.$limit;
		$prepped = $pdo->prepare($sql);
		//foreach($params as $name=>$value){
		//	$prepped->bindParam($name, $value);
		//}
		$prepped->execute($params);
		//$prepped->execute();
		
		$batches = $this->getObjects($prepped);
		
		$data["items"] = $batches;
		
		
		return $data;
	
	}
	
	public function searchBatches(){
		
	}

}


?>