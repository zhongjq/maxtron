<?php
	$action = $this->action->id;
?>
<h2><?php echo $action == 'resume' ? '应聘信息' : '招聘中心'?></h2>

<div class="actionBar">
<?php
    if($action != 'resume' && $action != 'view'){
	    echo CHtml::link('添加',array('create'));
    }
	if($action == 'show')
		echo CHtml::link('修改',array('update','id'=>$model->id)) . CHtml::linkButton('删除',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除?'));
	if($action == 'create' OR $action == 'update' OR $action == 'show' )
		echo CHtml::link('返回',array('admin'));
		
	if($action == 'view')
	    echo CHtml::link('返回',array('resume'));
?>
</div>

<?php if($action == 'admin'){ ?>
<div class="actionBar">
	<?php echo CHtml::beginForm(); ?>
		<div>
			职位分类:<?php echo CHtml::dropDownList('cate_id', $_POST['cate_id'], $this->cate_list,array('prompt'=>'请选择分类'));?>
			职位名称:<input type="input" name="title" value="<?php echo $_POST['title']?>" />
			<input type="submit" value="搜索" />
		</div>
	<?php echo CHtml::endForm(); ?>
</div>
<?php }?>
