<style>
<!--
.dataGrid {
	border-width: 1px;
	border-style: solid;
	border-collapse: separate;
	border-spacing: 0;
	width: 99%;
	margin: 0;
	-moz-border-radius: 4px;
	-khtml-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	background-color:#FFFFFF;
	border-color:#DFDFDF;
}
.dataGrid .label {
    width:120px;
}
.dataGrid * {
	word-wrap: break-word;
}

.dataGrid a {
	text-decoration: none;
}

.dataGrid td,
.dataGrid th {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-color:#DFDFDF;
	vertical-align: text-top;
	line-height:1.3em;
	padding:7px 7px 8px;
	text-align:left;
}
-->
</style>
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
	<th class="label">工作经历
</th>
	<td><?php echo nl2br(CHtml::encode($model->work_ex)); ?>
</td>
</tr>

</table>