<?php

class NoticeController extends Controller
{

	const PAGE_SIZE=16;
	public $defaultAction='list';

	private $_model;
	public $title;
	public $cate_id;
	
	public function init(){
	    parent::init();
	}
	
	/**
	 * This method is invoked right before an action is to be executed (after all possible filters.)
	 * You may override this method to do last-minute preparation for the action.
	 * @param CAction $action the action to be executed.
	 * @return boolean whether the action should be executed.
	 */
	public function beforeAction($action){
	    if ($action->id == 'biz' || $action->id == 'view'){
	        $this->breadcrumbs[] =  '商务合作';
	    }else{
	        $this->breadcrumbs['新闻中心'] = array('/notice');
	    }
	    
	    return parent::beforeAction($action);
	}
	
	public function actionBiz(){
		$criteria=new CDbCriteria;
		$this->title = '商务合作';
        $criteria->order = 'top desc, datetime desc';
		if(!empty($_GET['cate_id']))
		{
			$this->cate_id  = $cate_id = $_GET['cate_id'];
			$cate = tree::model()->findByPk($cate_id);
			if(!empty($cate))
			{
				//分类标题
				$this->breadcrumbs[] = $this->title = $cate->name;
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
		}

		if(!empty($_POST['keyword']))
		{
			$this->title = 'search';
			$keyword = $_POST['keyword'];
			$criteria->condition .= " title like '%$keyword%'";
		}
		$pages=new CPagination(notice::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=notice::model()->findAll($criteria);

		$this->render($cate_id == 77 ? 'stock' : 'biz',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	public function actionList()
	{
		$criteria=new CDbCriteria;
		$this->title = array('新闻中心');
        $criteria->order = 'top desc, datetime desc';
		if(empty($_GET['cate_id'])){
			$_GET['cate_id'] = 2;
		}

		if(!empty($_GET['cate_id']))
		{
			$this->cate_id  = $cate_id = $_GET['cate_id'];
			$cate = tree::model()->findByPk($cate_id);
			if(!empty($cate))
			{
				//分类标题
				if ($_GET['cate_id'] != 2){
				    $this->breadcrumbs[] = $this->title = $cate->name;
				}
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
		}

		if(!empty($_POST['keyword']))
		{
			$this->title = 'search';
			$keyword = $_POST['keyword'];
			$criteria->condition .= " title like '%$keyword%'";
		}
		$pages=new CPagination(notice::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=notice::model()->findAll($criteria);
		$this->render('index',array(
			'models'=>$models,
			'pages'=>$pages,
		));

	}
	
	public function actionTop($limit, $cate_id){
        $criteria=new CDbCriteria;
        
		if(!empty($_GET['cate_id'])){
		    $cate_id = $_GET['cate_id'];
		    $model = notice::model()->find(array('condition' => "digest=1 and cate_id={$cate_id}", 'order' => 'datetime desc'));
			$criteria->condition = "cate_id = $cate_id";
		    if ($model){
		        $criteria->condition .= " and id<>{$model->id}";
		    }
			$criteria->limit = $limit;
			$criteria->order = 'top desc, datetime desc';
			$models = notice::model()->findAll($criteria);
			$this->renderPartial('top', array('models' => $models, 'model' => $model));
		}
	}
	
    public function actionView(){
        $this->actionShow();
    }
    
	public function actionShow()
	{
		$model = $this->loadnotice();
		$this->cate_id = $model->cate_id;
		$cate = tree::model()->findByPk($this->cate_id);
		$this->breadcrumbs[] = $cate->name;
		$this->render('show',array('model'=>$model));
	}

	public function loadnotice($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=notice::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

}
