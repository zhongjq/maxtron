<div class="new_products" style="width:95%; margin-left:15px;margin-top:15px;">
	<ul id="notice">
		<?php foreach($models as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label(date('Y-m-d',strtotime($model->datetime)),'',array('class'=>'notice_time')).$model->title,array('view','id'=>$model->id)); ?>
			</li>		
		<?php endforeach; ?>
		<br/>
	<br/>
	<br/>
	</ul>
	
	<div style="text-align: right; line-height: 3em"><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
</div>

