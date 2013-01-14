<?php

class DownloadController extends Controller
{
	const PAGE_SIZE=8;

	private $cate_id = 10;
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

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
		$root = tree::model()->findByPK($this->cate_id);
		$tree2 = $root->getTree(false);
		$data = CHtml::listData($tree2, 'id', 'name');
		return $data;
	}
	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		$this->render('show',array('model'=>$this->loadcontent()));
	}

	/**
	 * Lists all models.
	 */
	public function actionList($cate_id=79)
	{
		$this->breadcrumbs[] = '华科文化';
		$this->breadcrumbs[] = ($cate_id == 79) ? '华科报' : '集团手册';
		$criteria=new CDbCriteria;
		$criteria->condition = 'cate_id = '. $cate_id;
		
		$pages=new CPagination(Download::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Download::model()->findAll($criteria);
		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadcontent($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Download::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
