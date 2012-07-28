<?php

class ModeratorController extends Controller
{
	public $layout = '/admin/content_layout';
	
	public function actionIndex()
	{
		$this->layout = '/admin/full_layout';
		$this->render('index');
	}
	
	public function actionDashboard(){
		
		$this->render('dashboard');
		
		 
	}
	
	public function actionLogin(){
	
		$this->render('login');
	
			
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