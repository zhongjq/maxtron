<?php
/**
 * MainMenu is a widget displaying main menu items.
 *
 * The menu items are displayed as an HTML list. One of the items
 * may be set as active, which could add an "active" CSS class to the rendered item.
 *
 * To use this widget, specify the "items" property with an array of
 * the menu items to be displayed. Each item should be an array with
 * the following elements:
 * - visible: boolean, whether this item is visible;
 * - label: string, label of this menu item. Make sure you HTML-encode it if needed;
 * - url: string|array, the URL that this item leads to. Use a string to
 *   represent a static URL, while an array for constructing a dynamic one.
 * - pattern: array, optional. This is used to determine if the item is active.
 *   The first element refers to the route of the request, while the rest
 *   name-value pairs representing the GET parameters to be matched with.
 *   When the route does not contain the action part, it is treated
 *   as a controller ID and will match all actions of the controller.
 *   If pattern is not given, the url array will be used instead.
 */
class MainSidebar extends CWidget
{
	public $items=array();

	public function run()
	{
		$items=array();
		$controller=$this->controller;
		$action=$controller->action;
		
		if($controller->id == 'download'){
            $cate_id = 12;
			$criteria=new CDbCriteria;
			$criteria->condition = "cate_id = $cate_id";
			$criteria->order = "sort desc";
			$content = content::model()->findAll($criteria);
			foreach($content as $tree)
			{
				$message .= '<dd>'.CHtml::link($tree->title,array('/content/culture','id'=>$tree->id)).'</dd>';
			}
			$message .= '<dd'.(Yii::app()->request->getParam('cate_id') == '80' ? ' class = "show"' : '').'>'.CHtml::link('集团手册',array('/manual')).'</dd>';
			$message .= '<dd'.(Yii::app()->request->getParam('cate_id') == '79' ? ' class = "show"' : '').'>'.CHtml::link('华科报',array('/newspaper')).'</dd>';
			$message = '<dl>'.$message.'</dl>';
		}elseif($controller->id == 'jobs'){
		    $cate_id = 13;
			$criteria=new CDbCriteria;
			$criteria->condition = "cate_id = $cate_id";
			//$criteria->condition = $cate_id = Yii::app()->request->getParam('id') ? 
            //"cate_id = $cate_id" : "icon='{$action->id}'";
			$criteria->order = "sort desc";
			$content = content::model()->findAll($criteria);
			foreach($content as $tree){
				$class_name = $tree->id == $_GET['id'] ? ' class = "show"' : '';
				$message .= '<dd'.$class_name.'>'.CHtml::link($tree->title,array('/content/hr','id'=>$tree->id)).'</dd>';
			}
			$message .= $action->id != 'resume' ? '<dd class = "show">' : '<dd>';
			$message .= CHtml::link('招聘信息',array('/jobs')).'</dd>';
			$message .= $action->id == 'resume' ? '<dd class = "show">' : '<dd>';
			$message .= CHtml::link('在线应聘',array('/jobs/resume')).'</dd>';
			$message = '<dl>'.$message.'</dl>';
		}elseif($controller->id == 'site' && $action->id == 'page'){
		    
			$message .= '<dt>走进华科</dt>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('集团简介', array('/site/page','view'=>'intro')).'</dd>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('董事长致辞', array('/site/page','view'=>'intro')).'</dd>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('华科之路', array('/site/page','view'=>'intro')).'</dd>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('发展战略', array('/site/page','view'=>'intro')).'</dd>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('经营理念', array('/site/page','view'=>'intro')).'</dd>';
			$message .= '<dd'.$class_name.'>'.CHtml::link('社会责任', array('/site/page','view'=>'intro')).'</dd>';
			
			$message = '<dl>'.$message.'</dl>';
		}elseif($controller->id == 'content'){
		    $biz = '';
		    $act = $action->id;
			switch($action->id){
				case 'about':$cate_id = 11;break;
				case 'hr':
				    $cate_id = 13;
				    $biz = '<dd>'.CHtml::link('招聘信息',array('/jobs')).'</dd>';
				    $biz .= '<dd>'.CHtml::link('在线应聘',array('/jobs/resume')).'</dd>';
				    break;
				case 'culture':
				    $cate_id = 12;
                    $biz .= '<dd>'.CHtml::link('集团手册',array('/manual')).'</dd>';
                    $biz .= '<dd>'.CHtml::link('华科报',array('/newspaper')).'</dd>';
				    break;
				case 'biz':
				    $cate_id = 14;
					$root = tree::model()->findByPK(9);
                    //$message .= '<dt>'.CHtml::encode($root->name).'</dt>';
        			
        			$tree2 = $root->getTree();
        			foreach($tree2 as $key => $subtree)
        			{
        				$biz .= $this->printNestedTree($subtree);
        			}
				    break;
				case 'honor':$cate_id = 12;break;
				
				case 'seach':$act = 'other';
			    case 'other':$cate_id = 78;break;
			}
			
			$criteria=new CDbCriteria;
			$criteria->condition = "cate_id = $cate_id";
			//$criteria->condition = $cate_id = Yii::app()->request->getParam('id') ? 
            //"cate_id = $cate_id" : "icon='{$action->id}'";
			$criteria->order = "sort desc";
			$content = content::model()->findAll($criteria);
			foreach($content as $tree)
			{
				$class_name = $tree->id == $_GET['id'] ? ' class = "show"' : '';
				$message .= '<dd'.$class_name.'>'.CHtml::link($tree->title,array('/content/'.$act,'id'=>$tree->id)).'</dd>';
			}
			
			$message = '<dl>'.$message.$biz.'</dl>';
		}elseif ($controller->id == 'product'){
		    if ($action->id != 'list'){
		        $model = product::model()->findByPk($_GET['id']);
    			$message .= '<dd'.($action->id == 'show' ? ' class = "show"' : '').'>'.CHtml::link('项目介绍', array('/product/show','id' => $_GET['id'])).'</dd>';
    			$message .= '<dd'.($action->id == 'picture' ? ' class = "show"' : '').'>'.CHtml::link('项目图册下载', array('/product/picture','id' => $_GET['id'])).'</dd>';
    			if ($model->sellout == 0){
    			    $message .= '<dd'.($action->id == 'section' ? ' class = "show"' : '').'>'.CHtml::link('工期发布', array('/product/section','id' => $_GET['id'])).'</dd>';
    			    $message .= '<dd'.($action->id == 'register' ? ' class = "show"' : '').'>'.CHtml::link('诚意登记', array('/product/register','id' => $_GET['id'])).'</dd>';
    			}
		    }else{
    		    $cate_id = 4;
    			//$root = tree::model()->findByPK($cate_id);
    			//$message .= '<dt>'.CHtml::encode($root->name).'</dt>';
    			$criteria=new CDbCriteria;
    			
        		if(!empty($_GET['keyword']))
        		{
        			$keyword = $_GET['keyword'];
        			$criteria->condition .= " title like '%$keyword%'";
        		}
    			$criteria->order = "sort desc";
    			$criteria->addCondition("state=1");
    		    $products = product::model()->findAll($criteria);
    			foreach($products as $tree){
    				$class_name = $tree->id == $_GET['id'] ? ' class = "show"' : '';
    				$message .= '<dd'.$class_name.'>'.CHtml::link($tree->title,array('/product/show','id'=>$tree->id)).'</dd>';
    			}
		    }

			$message = '<dl>'.$message.'</dl>';
		}
		else
		{
			if($controller->id == 'notice')
			{
				$cate_id = Yii::app()->request->getParam('cate_id') ? Yii::app()->request->getParam('cate_id') : 2;
				$cate_id = 2;
			}
			else
			{
				$cate_id = Yii::app()->request->getParam('cate_id') ? Yii::app()->request->getParam('cate_id') : 4;
				
			}
			
			if ($action->id == 'biz' || $action->id == 'view'){
			    $cate_id = 9;
    			$criteria=new CDbCriteria;
    			$criteria->condition = "cate_id = 14";
    			//$criteria->condition = $cate_id = Yii::app()->request->getParam('id') ? 
                //"cate_id = $cate_id" : "icon='{$action->id}'";
    			$criteria->order = "sort desc";
    			$content = content::model()->findAll($criteria);
    			foreach($content as $tree)
    			{
    				$class_name = $tree->id == $_GET['id'] ? ' class = "show"' : '';
    				$message .= '<dd'.$class_name.'>'.CHtml::link($tree->title,array('/content/biz','id'=>$tree->id)).'</dd>';
    			}
			}
			
			
			$root = tree::model()->findByPK($cate_id);
            //$message .= '<dt>'.CHtml::encode($root->name).'</dt>';

			if($root->level == 3)
			{
				$root = $root->getParentNode();
			}
			
			$tree2 = $root->getTree();
			foreach($tree2 as $key => $subtree)
			{
				$message .= $this->printNestedTree($subtree);
			}
			$message = '<dl>'.$message.'</dl>';
		}

		echo $message;
	}

	private function printNestedTree($tree)
	{
		$url = '/notice/biz';
		if($this->controller->id == 'product')
		{
			$url = '/product';
		    $cate_id = $this->controller->cate_id;
			$class_name = $tree->id == $cate_id ? ' class = "show"' : '';
		}


		if($this->controller->id == 'notice')
		{
			$cate_id = $this->controller->cate_id;
			$class_name = $tree->id == $cate_id ? ' class = "show"' : '';
			$url = $this->controller->action->id == 'biz' || $this->controller->action->id == 'view' ? '/notice/biz': '/notice';
		}

		if($tree->level == '2')
		{
			$data = '<dd'.$class_name.'>'.CHtml::link($tree->name,array($url,'cate_id'=>$tree->id)).'</dd>';
		}
		elseif($tree->level == '3')
		{
		    $data = '<dd'.$class_name.'>'.CHtml::link($tree->name,array($url,'cate_id'=>$tree->id)).'</dd>';
		}
		return $data;
	}

}
