<?php include('_top.php');?>
<?php 
echo CHtml::beginForm("", "post", array("id"=>"myForm"));
echo CHtml::link('删除选中', 'javascript:deleteChecked();');
echo CHtml::hiddenField('command', 'deleteSelectedRegister');
?>
<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo CHtml::checkBox('checkAll')?></th>
    <th><?php echo $sort->link('id'); ?></th>
    <th>登记项目</th>
    <th><?php echo $sort->link('registrant'); ?></th>
    <th><?php echo $sort->link('phone'); ?></th>
    <th><?php echo $sort->link('createtime'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::activeCheckBox($model, 'id[]', array('value' => $model->id, 'id' => 'check_'.$model->id)); ?></td>
    <td><?php echo CHtml::link($model->id,array('view','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::link($model->product->title,array('show','id'=>$model->product->id)); ?></td>
    <td><?php echo CHtml::link(CHtml::encode($model->registrant),array('view','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->phone); ?></td>
    <td><?php echo $model->createtime; ?></td>
    <td>
      <?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'deleteRegister','id'=>$model->id),
      	  'confirm'=>"确认删除? #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php echo CHtml::endForm(); ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<script language="javascript">
function deleteChecked()
{
	if ($("tbody :checked").length == 0){
		alert('请选择要删除的记录');
		return false;
	}
    // need a confirmation before submiting
    if (confirm('确定要删除所选记录?')){
      $("#myForm").submit();
    }
}
 
  $(document).ready(function(){
    // powerful jquery ! Clicking on the checkbox 'checkAll' change the state of all checkbox  
    $('[name="checkAll"]').click(function () {
      $("input[type='checkbox']:not([disabled='disabled'])").prop('checked', this.checked);
    });
  });
  </script>