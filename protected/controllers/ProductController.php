<?php

class ProductController extends Controller
{

	const PAGE_SIZE=16;
	public $defaultAction='list';

	private $_model;
	public $title;
	public $cate_id;
	
	public function init(){
	    parent::init();
	    $this->breadcrumbs[] = '华科产品';
	}


	public function actionNew()
	{
		$this->title= "New Products";

		$criteria=new CDbCriteria;

		$criteria->order = "date ";
		$criteria->limit = 16;
		$models=product::model()->findAll($criteria);
		/*
		$this->render('index',array(
			'models'=>$models,
			'pages'=>$pages,
		));
		*/
		$this->render('index',array(
			'models'=>$models,
		));
	}

	public function actionList()
	{
		$criteria=new CDbCriteria;
		$view = 'index';
		$this->title = 'products';

        $cate_id = !empty($_GET['cate_id']) ? $_GET['cate_id'] : 4;
		
		$this->cate_id = $cate_id; 
		$cate = tree::model()->findByPk($cate_id);
		if(!empty($cate))
		{
			//分类标题
			$this->title = $cate->name;
			//指定类别
			$criteria->condition = "cate_id = $cate_id";
			//是否有子类
			$childrens = $cate->getChildNodes();
			if(!empty($childrens))
			{
				foreach($childrens as $child)
				{
					$cate_id = $child->id;
					$criteria->condition .= " OR cate_id = $cate_id";
				}
			}
		}
		else
		{
			$_GET['cate_id'] ='';
		}
		
        $criteria->addCondition("state=1");
		if(!empty($_GET['keyword']))
		{
			$this->breadcrumbs[] = '搜索结果';
			$keyword = $_GET['keyword'];
			$criteria->condition .= " title like '%$keyword%'";
		}
        $criteria->order = "sort desc";
		$pages=new CPagination(product::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=product::model()->findAll($criteria);

		$this->render($view,array(
			'models'=>$models,
			'pages'=>$pages,
		    'cates'=>$childrens,
		));

	}

	public function actionShow(){
		$model = $this->loadproduct();
		$this->breadcrumbs[] = $model->title;
		$this->cate_id = $model->cate_id;
		$this->render('show',array('model'=>$model));
	}
	
	public function actionPicture(){
	    $model = $this->loadproduct();
	    $this->breadcrumbs[] = $model->title;
	    $this->render('picture',array('model'=>$model));
	}
	
	public function actionSection(){
	    $model = $this->loadproduct();	    
	    $this->breadcrumbs[] = $model->title;
	    $this->render('section',array('model'=>$model));
	}
	
    public function actionRegister()
    {
        $model=new ProductRegister;
        $product = $this->loadproduct();
		$this->breadcrumbs[] = $product->title;
        // uncomment the following code to enable ajax-based validation
        if(isset($_POST['ajax']) && $_POST['ajax']==='product-register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
    
        if(isset($_POST['ProductRegister']))
        {
            $model->attributes=$_POST['ProductRegister'];
            $model->product_id = $product->id;
            if($model->validate())
            {
                $model->save(false);
                $model->refresh();
                $this->sendEmail($model);
                Yii::app()->user->setFlash('register-submited', '您的登记已提交成功，感谢您的参与！');
                $this->refresh();
            }
        }
        $this->render('register',array('model'=>$model));
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
        $mailer->AddAddress(Yii::app()->params['register_email']);
        $mailer->Subject = '诚意登记 - '.$model->product->title;
        $mailer->getView('register', array('model'=>$model));
        //$mailer->SMTPDebug = true;
        $mailer->CharSet = 'UTF-8';;
        $mailer->Send();
        //var_dump($mailer->errorInfo);exit;
	}

	public function loadproduct($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=product::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

}
