<h2>产品中心 - 登记信息</h2>

<div class="actionBar">
<?php
echo CHtml::link('返回',array('register'));
?>
</div>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('product_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->product->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo CHtml::encode($model->createtime); ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>
</th>
    <td><?php echo CHtml::encode($model->phone); ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('insured')); ?>
</th>
    <td><?php echo $model->insuredOptions[$model->insured]; ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('message')); ?>
</th>
    <td><?php echo nl2br($model->message); ?>
</td>
</tr>
</table>
