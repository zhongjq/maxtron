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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
	<td><?php echo CHtml::encode($model->email); ?>
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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('birthday')); ?>
</th>
	<td><?php echo CHtml::encode($model->birthday); ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('native')); ?>
</th>
	<td><?php echo CHtml::encode($model->native); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('tall')); ?>
</th>
	<td><?php echo CHtml::encode($model->tall); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('landscape')); ?>
</th>
	<td><?php echo CHtml::encode($model->landscape); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('wedding')); ?>
</th>
	<td><?php echo CHtml::encode($model->wedding); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('cer_type')); ?>
</th>
	<td><?php echo CHtml::encode($model->cer_type); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('cer_num')); ?>
</th>
	<td><?php echo CHtml::encode($model->cer_num); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('working_age')); ?>
</th>
	<td><?php echo CHtml::encode($model->working_age); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('education')); ?>
</th>
	<td><?php echo CHtml::encode($model->education); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('school')); ?>
</th>
	<td><?php echo CHtml::encode($model->school); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('school')); ?>
</th>
	<td><?php echo CHtml::encode($model->school); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('professional')); ?>
</th>
	<td><?php echo CHtml::encode($model->professional); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('hope_wage')); ?>
</th>
	<td><?php echo CHtml::encode($model->hope_wage); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('p_company')); ?>
</th>
	<td><?php echo CHtml::encode($model->p_company); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('p_post')); ?>
</th>
	<td><?php echo CHtml::encode($model->p_post); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('p_wage')); ?>
</th>
	<td><?php echo CHtml::encode($model->p_wage); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('address')); ?>
</th>
	<td><?php echo CHtml::encode($model->address); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('p_post')); ?>
</th>
	<td><?php echo CHtml::encode($model->p_post); ?>
</td>
</tr>
<tr>
	<th class="label">工作经历
</th>
	<td><?php echo nl2br(CHtml::encode($model->work_ex)); ?>
</td>
</tr>
<tr>
	<th class="label">教育培训经历
</th>
	<td><?php echo nl2br(CHtml::encode($model->edu_ex)); ?>
</td>
</tr>
</table>


