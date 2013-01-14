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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('registrant')); ?>
</th>
    <td><?php echo CHtml::encode($model->registrant); ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>
</th>
    <td><?php echo CHtml::encode($model->phone); ?>
</td>
</tr>
<?php $insured = array(1 => '购铺', 0 => '租铺')?>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('insured')); ?>
</th>
    <td><?php echo $insured[$model->insured]; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('message')); ?>
</th>
    <td><?php echo nl2br($model->message); ?>
</td>
</tr>
</table>
