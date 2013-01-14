<?php

class ProductController extends BaseController
{
	const PAGE_SIZE=10;

	private $cate_id = 4;
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='admin';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public $cate_list;
	/**
	 * @return array action filters
	 */
	public function init() {
		$this->cate_list = $this->getCateList();
	}

	public function getCateList()
	{
		$cate_id = Yii::app()->request->getParam('cate_id');
		
		if(empty($cate_id))
		{
			$cate_id = $this->cate_id;
		}
		$root = tree::model()->findByPK($cate_id);
		if($root->level == 3)
		{
			$root = $root->getParentNode();
		}
		$tree2 = $root->getLevelTree();
		$data = CHtml::listData($tree2, 'id', 'name');
		return $data;
	}

	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		$this->processAdminCommand();
		$model = $this->loadproduct();
		$section = $this->loadSection($model);
	    $this->render('show',array('model'=> $model, 'section' => $section));
	}
	
	/**
	 * Shows a particular model.
	 */
	public function actionView()
	{
		$model = ProductRegister::model()->findByPk($_GET['id']);
	    $this->render('view',array('model'=> $model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new product;
		if(isset($_POST['product']))
		{
			$model->attributes=$_POST['product'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadproduct();
		if(isset($_POST['product']))
		{
			$model->attributes=$_POST['product'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadproduct()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$pages=new CPagination(product::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=product::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}
	
	public function actionAddImage() {
	    if (Yii::app()->request->isPostRequest){
	        $model = new ProductImage;
	        $id = $_POST['product_id'];
	        unset($_POST['product_id']);
	        $model->attributes = $_POST;
	        $this->loadproduct($id)->addImage($model);
    	    echo CJSON::encode($model->attributes);
	    }
	    Yii::app()->end();
	}
	
    public function loadSection($product){
        $model= !isset($_GET['section_id']) ? 
            new ProductSection : ProductSection::model()->findByPk($_GET['section_id']); 
    
        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='product-section-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */
        if(isset($_POST['ProductSection']))
        {
            $model->attributes=$_POST['ProductSection'];
            if ($product->addSection($model)){
                $this->redirect($this->createUrl('product/show', array('id' => $product->id)).'#product-section-form');
            }
        }
        return $model;
    }
	
	
	public function actionCate()
	{
		$this->render('cate',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionRegister()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;


		$pages=new CPagination(ProductRegister::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('ProductRegister');
		$sort->applyOrder($criteria);

		$models=ProductRegister::model()->findAll($criteria);

		$this->render('register',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;
		//添加搜索功能
		$criteria->condition = "1";

		$cate_id = Yii::app()->request->getParam('cate_id');
		$title = Yii::app()->request->getParam('title');

		//$cate_id = !$_GET['cate_id'] ? $_POST['cate_id'] : $_GET['cate_id'];

		if(!empty($cate_id))
		{
			$criteria->condition .= " AND cate_id=:cate_id ";
			$criteria->params = array(':cate_id'=>$cate_id);
		}

		if(!empty($title))
		{
			$criteria->condition .= " AND title like '%$title%'";
		}

		$pages=new CPagination(product::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('product');
		$sort->applyOrder($criteria);

		$models=product::model()->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
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

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command'] === 'delete'){
			$this->loadproduct($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
		
		if(isset($_POST['command'], $_POST['id']) && $_POST['command'] === 'delImage'){
			ProductImage::model()->findByPk($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
		
		if(isset($_POST['command'], $_POST['id']) && $_POST['command'] === 'deleteSection'){
			ProductSection::model()->findByPk($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
		
		if(isset($_POST['command'], $_POST['id']) && $_POST['command'] === 'deleteRegister'){
			ProductRegister::model()->findByPk($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
		
		if(isset($_POST['command'], $_POST["ProductRegister"]['id']) && $_POST['command']==='deleteSelectedRegister')
		{
		    foreach ($_POST["ProductRegister"]['id'] as $id){
		        if (!empty($id)){
    		        ProductRegister::model()->findByPk($id)->delete();
		        }
		    }
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}

		if(isset($_POST['command'], $_POST['id'], $_POST['type']) && $_POST['command'] === 'changeState'){
			$model = $this->loadproduct($_POST['id']);
			$model->$_POST['type'] = 1 -  $model->$_POST['type'];
			$model->save();
			$this->refresh();
		}
	}
}
