<?php

class BatchController extends Controller
{
	
	
	public $errors;
	public function actionCreate()
	{
		
		
		
		/*
		 * http://www.yiiframework.com/doc/api/1.1/CHttpRequest
		 * 
		 * */
		if(Yii::app()->request->getIsPostRequest()){
			
			$batch = new Batch();
			
			$errors = BatchHelper::validateBatch($batch);
			
			if(empty($errors)){

				$batch->instituteCode = "abc";
				$batch->instituteId = 567;
				
				$batch->save();
			}
			
			$this->errors = $errors;
			$this->layout = '/admin/content_layout';
			$this->render('create');
			
			
		}else{
			$this->layout = '/admin/content_layout';
			$this->render('create');
		}
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