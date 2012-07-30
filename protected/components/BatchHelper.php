<?php
class BatchHelper{
	
	/**
	 * 
	 * @param Batch $batch
	 * 
	 */
	public static function validateBatch($batch){
		
		$code = trim($_POST["batch_code"]);
		$startDate = trim($_POST["batch_start_date"]);
		$endDate = trim($_POST["batch_end_date"]);
		$location = trim($_POST["batch_location"]);
		$remarks = trim($_POST["batch_remarks"]);
		
		
		$errors = array();
		
		if(empty($code)){
			$errors[] = array("el"=>"batch_code", "code"=>"blank", "msg"=>"Batch code can not be blank.");
		}else{
			$batch->code = $code;
		}
		
		if(empty($startDate)){
			$errors[] = array("el"=>"batch_start_date", "code"=>"blank", "msg"=>"Batch start date can not be blank.");
		}else{
			$batch->startDate = strtotime($startDate);
		}
		
		if(empty($endDate)){
			$errors[] = array("el"=>"batch_end_date", "code"=>"blank", "msg"=>"Batch end date can not be blank.");
		}else{
			$batch->endDate = strtotime($endDate);
		}
		
		if(empty($location)){
			$errors[] = array("el"=>"batch_location", "code"=>"blank", "msg"=>"Batch location can not be blank.");
		}else{
			$batch->location = $location;
		}
		
		if(empty($remarks)){
			$errors[] = array("el"=>"batch_remarks", "code"=>"blank", "msg"=>"Batch comments can not be blank.");
		}else{
			$batch->comments = $remarks;
		}
		
		return $errors;
	}
	
	
}

?>