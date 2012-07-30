<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	/*
	public function accessRules()
	{
		return array(

				array('allow',
						'controllers'=>array('admin/batch'),
						'actions'=>array('index', 'edit', 'delete', 'list'),
						'users'=>array('*'),
				),
				array('deny',
						'actions'=>array('delete'),
						'users'=>array('*'),
				),
		);
	}
	
	
	public function filters()
	{
		return array(
				'accessControl',
		);
	}
	*/
	
	
	public function beforeAction($action){
		

		return parent::beforeAction($action);
		
		//echo $action->id;
		//return true;
		$userIdentity = new UserIdentity(null, null, null);
		//$url = $this->id.'/'.$action;
		
		switch($this->id){
			case $this->id:
				if($action->id!="login"){
					$return = $userIdentity->authenticate();
					
					return true;
				}
				break;
		}
		
		
		return true;
		
	}
}