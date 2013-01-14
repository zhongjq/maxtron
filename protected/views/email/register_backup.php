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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?>
</th>
    <td><?php echo CHtml::encode($model->genderOptions[$model->gender]); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('passport_type')); ?>
</th>
    <td><?php echo CHtml::encode($model->passport_type); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('passport')); ?>
</th>
    <td><?php echo CHtml::encode($model->passport); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>
</th>
    <td><?php echo CHtml::encode($model->phone); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('insured')); ?>
</th>
    <td><?php echo $model->insured; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('property_count')); ?>
</th>
    <td><?php echo $model->property_count; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('requirement')); ?>
</th>
    <td><?php echo $model->requirement; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('address')); ?>
</th>
    <td><?php echo $model->address; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('message')); ?>
</th>
    <td><?php echo nl2br($model->message); ?>
</td>
</tr>
</table>
