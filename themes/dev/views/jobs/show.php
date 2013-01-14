<div class="content_main">
	<table width="100%">
		<tr>
			<td colspan="4" style="text-align:right"><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/btx.jpg', '应聘该职位'), array('jobs/resume', 'id'=> $model->id))?></td>
		</tr>
		<tr>
			<th><?php echo $model->getAttributeLabel('title');?>：</th><td style="font-weight:bold;font-size:large; color:#666; width:200px"><?php echo $model->title?></td>
			<th><?php echo $model->getAttributeLabel('sex');?>：</th><td><?php echo $model->sex?></td>
		</tr>
		<tr>
			<th><?php echo $model->getAttributeLabel('education');?>：</th><td><?php echo $model->education?></td>
			<th><?php echo $model->getAttributeLabel('place');?>：</th><td><?php echo $model->place?></td>
		</tr>
		<tr>
			<th><?php echo $model->getAttributeLabel('number');?>：</th><td><?php echo $model->number?></td>
			<th><?php echo $model->getAttributeLabel('createtime');?>：</th><td><?php echo $model->createtime?></td>
		</tr>
		<tr>
			<th><?php echo $model->getAttributeLabel('start_date');?>：</th><td><?php echo $model->start_date?></td>
			<th><?php echo $model->getAttributeLabel('end_date');?>：</th><td><?php echo $model->end_date?></td>
		</tr>
		<tr>
			<th><?php echo $model->getAttributeLabel('descript');?>：</th>
			<td colspan="3"><?php echo $model->descript;?></td>
		</tr>

	</table>
</div>
<br />
<div class="center">

	<input type="button" value=" 返回 " onclick="javascript:window.history.go(-1);" class="box_01" />
</div><br>
<style>
th{font-weight: bold; text-align:right; width: 100px; padding:3px}
</style>