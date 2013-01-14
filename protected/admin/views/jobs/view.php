<?php include('_top.php');?>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('job_id')); ?>
</th>
	<td><?php echo CHtml::encode($model->post->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
	<td><?php echo CHtml::encode($model->createtime); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('applicant')); ?>
</th>
	<td><?php echo CHtml::encode($model->applicant); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>
</th>
	<td><?php echo CHtml::encode($model->phone); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?>
</th>
	<td><?php echo CHtml::encode($model->genderOptions[$model->gender]); ?>
</td>
</tr>


<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('work_ex')); ?>
</th>
	<td><?php echo nl2br(CHtml::encode($model->work_ex)); ?>
</td>
</tr>
</table>


