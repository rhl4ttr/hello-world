<?php

class ModeratorController extends Controller
{
	public $layout = '/admin/content_layout';
	
	public function actionIndex()
	{
		//if(Yii::app()->user->checkAccess('deletePost'))
		//{
		
		if(Yii::app()->user->getIsGuest()){
			
			$this->redirect('/admin/moderator/login');
	
			
		}else{

			$this->layout = '/admin/full_layout';
			
			$this->render('/admin/moderator/index');
		}
	//	}
		
	}
	
	public function actionDashboard(){
		
		$this->render('dashboard');
		
		 
	}
	
	public function actionLogin(){
		
		if(Yii::app()->request->isPostRequest){
			
			
			$userIdentity = new UserIdentity($_POST["username"], $_POST["password"], UserIdentity::MODERATOR);
			$return = $userIdentity->authenticate();
			
			
			
			if($return){
				$this->redirect('/admin/moderator');
			}
		}
		
		
		$this->layout = '/admin/login_layout';
		
		$this->render('/admin/login');
	
	
			
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