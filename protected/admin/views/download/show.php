<?php include('_top.php');?>


<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('cate_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->cate->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('icon')); ?>
</th>
    <td><?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>ad_img_big)),$model->icon); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('issuer')); ?>
</th>
    <td><?php echo CHtml::encode($model->issuer); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('issue_date')); ?>
</th>
    <td><?php echo CHtml::encode($model->issue_date); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('url')); ?>
</th>
    <td><?php echo CHtml::encode($model->url); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('download')); ?>
</th>
    <td><?php echo CHtml::encode($model->download); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('sort')); ?>
</th>
    <td><?php echo CHtml::encode($model->sort); ?>
</td>
</tr>
</table>
