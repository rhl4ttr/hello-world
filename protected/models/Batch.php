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
			"instituteId"=>"institute_id",
			"instituteCode"=>"institute_code"			
	);


	public $id;
	public $code;
	public $location;
	public $startDate;
	public $endDate;
	public $comments;
	public $instituteId;
	public $instituteCode;
	
	

}


?>