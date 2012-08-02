<?php

class BatchController extends Controller
{
	
	
	public $layout = '/ajax_layout';
	
	
	public function actionCreate()
	{	
		/*
		 * http://www.yiiframework.com/doc/api/1.1/CHttpRequest
		 * 
		 * */
		$data = new stdClass();
		$data->errors = array();
		
		if(Yii::app()->request->isPostRequest){			
			$batch = new Batch();			
			$errors = BatchHelper::validateBatch($batch);
						
			if(empty($errors)){
				
				$batch->organizationId = Yii::app()->user->getOrgId();				
				$batch->save();
			}
			
			
			$data->errors = $errors;		
			
			
		}
			
		$this->render('create', $data);
		
	}
	
	
	public function actionList()
	{		
		$data = new stdClass();
		
		$batch = new Batch();
		
		$batch->organizationId =  Yii::app()->user->getOrgId();
		
		$searchOptions = array();
		$searchField = Yii::app()->request->getQuery("search", "");
		if(!empty($searchField)){
			$searchOptions["code"] = $searchField;
		}
		
		$pager = new Pagination(10, 10, Yii::app()->request->getQuery("page", 1), 100000, false);		
		
		$searchOptions["start"] = $pager->getOffset();
		
		$searchOptions["rows"] = 10;
		
		$batchData = $batch->getBatches($searchOptions);
		
		
		$pager->setTotalItems($batchData["count"], true);
		
		
		
		$data->pager = $pager;
		
		
		$data->batches = $batchData["items"];
		
		
		$this->render('list', $data);
	}
	
	
	
	public function actionEdit($id)
	{
		$batch = new Batch();
		$batch->load($id);
		
		
		$data  =new stdClass();
		$data->errors = array();
				
		if(Yii::app()->request->isPostRequest){
			
			
	
			$errors = BatchHelper::validateBatch($batch);
				
			if(empty($errors)){	
				
				$batch->organizationId = Yii::app()->user->getOrgId();	
				$batch->save();
			}
	
			$data->errors = $errors;	
	
		}else{
	
			$batch->load($id);
						
		}
	
		$data->batch = $batch;
		$this->render('edit', $data);
	}
	
	
	public function actionDelete()
	{
		
		$batchIds = (array)$_POST["batchIds"];
		
		$batch = new Batch();
		$batch->organizationId = Yii::app()->user->getOrgId();/*this is important to avoid one moderator to edit/delete other org batches*/
		
		foreach($batchIds as $bId){
			$batch->id = $bId;
			$batch->delete();
		}
		
		$this->render('delete');
	}
	
	
}