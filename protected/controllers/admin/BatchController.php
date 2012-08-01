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
		if(Yii::app()->request->isPostRequest){			
			$batch = new Batch();			
			$errors = BatchHelper::validateBatch($batch);
						
			if(empty($errors)){
				
				$batch->organizationId = Yii::app()->user->getOrgId();				
				$batch->save();
			}
			
			$data = new stdClass();			
			$data->errors = $errors;			
			$this->render('create', $data);			
			
		}else{
			
			$this->render('create');
		}
	}
	
	
	public function actionList()
	{		
		$data = new stdClass();
		
		$batch = new Batch();
		$batch->organizationId =  Yii::app()->user->getOrgId();
		
		$orgBatchCount = $batch->getBatchCount();
		$data->pager = new Pagination(10, 10, Yii::app()->request->getQuery("page", 1), $orgBatchCount, true);
		
		
		$batches = $batch->find(array("rows"=>10, "start"=>$data->pager->getOffset()));
		
		
		$data->batches = $batches;
		
		
		$this->render('list', $data);
	}
	
	
	
	public function actionEdit($id)
	{
		$batch = new Batch();
		$batch->load($id);
		
		
		$data  =new stdClass();
				
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
		$this->renderPartial('edit', $data, false, true);
	}

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}