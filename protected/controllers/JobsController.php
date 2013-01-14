<?php

class JobsController extends Controller
{
    const PAGE_SIZE=10;
    private $_model;
    
    public function init(){
        parent::init();
        $this->breadcrumbs[] = '人力资源';
        
    }
    
	public function actionIndex()
	{
		$this->breadcrumbs[] = '招聘信息';
	    $criteria=new CDbCriteria;
	    $criteria->order = "sort desc";
		$pages=new CPagination(jobs::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=jobs::model()->findAll($criteria);

		$this->render('index',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}
	
	public function actionShow(){
	    $this->breadcrumbs[] = '招聘信息';
	    $this->render('show', array('model' => $this->loadJob()));
	}
	
	public function actionResume(){
	    $model=new JobsResume;
	    if (isset($_GET['id'])){
	        $job = $this->loadJob($_GET['id']);
	        $model->job_id = $job->id;
	    }
	    $this->breadcrumbs[] = '在线应聘 ';
        
    
        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='jobs-resume-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */
    
        if(isset($_POST['JobsResume']))
        {
            $model->attributes=$_POST['JobsResume'];
            if($model->validate())
            {
                $model->save(false);
                $model->refresh();
                $this->sendEmail($model);
                Yii::app()->user->setFlash('apply-submited', '您的简历已提交成功，如符合要求，我们会尽快联系您！');
                $this->refresh();
            }
        }
        $this->render('resume',array('model'=>$model));
	}
	
	protected function sendEmail($model){
	    $mailer = Yii::app()->mailer;
        $mailer->Host = 'smtp.163.com';
        $mailer->IsSMTP();
        $mailer->IsHtml();
        $mailer->SMTPAuth = true;
        $mailer->From = 'sanqian_ad@163.com';
        $mailer->FromName = Yii::app()->request->getHostInfo();
        $mailer->Username = 'sanqian_ad';    //这里输入发件地址的用户名
        $mailer->Password = 'sanqian_ad3000';    //这里输入发件地址的密码
        $mailer->AddReplyTo('sanqian_ad@163.com');
        //Yii::app()->params['email']
        $mailer->AddAddress(Yii::app()->params['resume_email']);
        $mailer->Subject = '应聘简历 - '.$model->post->title;
        $mailer->getView('resume', array('model'=>$model));
        //$mailer->SMTPDebug = true;
        $mailer->CharSet = 'UTF-8';;
        $mailer->Send();
        //var_dump($mailer->errorInfo);exit;
	}
	
	protected function loadJob($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=jobs::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

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