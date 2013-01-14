<div style="width:95%; margin-left:15px;margin-top:15px;">
<?php
$tabs = array(
    'tab1'=>array(
          'title'=>'招标采购流程',
          'view'=>'flow',
    ),
    'tab2'=>array(
          'title'=>'招标采购信息',
          'view'=>'biz',
    ),
);

$this->widget('system.web.widgets.CTabView',
array(
    'tabs'=>$tabs,
    'viewData'=>array('models'=>$models),
    'cssFile'=>Yii::app()->theme->baseUrl .'/css/tabs/style.css',
));
?>
</div>