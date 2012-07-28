<?php
class BatchHelper{
	
	/**
	 * 
	 * @param Batch $batch
	 * 
	 */
	public static function validateBatch($batch){
		
		$code = $_POST["batch_code"];
		$startDate = $_POST["batch_start_date"];
		$endDate = $_POST["batch_end_date"];
		$location = $_POST["batch_location"];
		$remarks = $_POST["batch_remarks"];
		
		
		$errors = array();
		
		if(empty($code)){
			$errors[] = array("el"=>"batch_code", "code"=>"blank", "msg"=>"Batch code can not be blank.");
		}else{
			$batch->code = $code;
		}
		
		if(empty($startDate)){
			$errors[] = array("el"=>"batch_start_date", "code"=>"blank", "msg"=>"Batch start date can not be blank.");
		}else{
			$batch->startDate = 123;
		}
		
		if(empty($endDate)){
			$errors[] = array("el"=>"batch_end_date", "code"=>"blank", "msg"=>"Batch end date can not be blank.");
		}else{
			$batch->endDate = 233;
		}
		
		/*if(empty($location)){
			$errors[] = array("el"=>"batch_location", "code"=>"blank", "msg"=>"Batch location can not be blank.");
		}else{
			$batch->location = $location;
		}*/
		
		/*if(empty($remarks)){
			$errors[] = array("el"=>"batch_remarks", "code"=>"blank", "msg"=>"Batch comments can not be blank.");
		}else{
			$batch->comments = $remarks;
		}*/
		
		return $errors;
	}
	
	
}

?>