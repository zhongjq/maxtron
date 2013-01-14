<div class="center">
	<div style="font-weight:bold; font-size:large; text-align:center;color:#333">
	<?php echo CHtml::encode($model->title); ?>
	</div>
	<div style="text-align:center;color:#333;margin-top:8px;">发布时间：
	<?php echo CHtml::encode($model->datetime); ?><br/>
	</div>
</div>

<div class="content_main">
	<?php echo $model->content;?><br/>
</div>

<div class="center">
	<input type="button" value=" 返回 " onclick="javascript:window.history.go(-1);" class="box_01" name="button2"/>
</div><br>