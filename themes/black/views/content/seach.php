<div class="new_products" style="width:95%; margin: 15px">
	<?php if ($empty):?>
	请输入<strong style="color:red">关键字</strong>进行搜索
	<?php endif;?>
	<?php if (!$models['product'] && !$models['news'] && !$models['biz'] && !$models['job']):?>
	暂无关键字 <strong style="color:red"><?php echo $_GET['keyword']?></strong> 相关内容
	<?php endif;?>
	<?php if ($models['product']):?>
	<ul id="notice">
		<?php foreach($models['product'] as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label($model->phone,'',array('class'=>'notice_time')).'[华科产品] '.$model->title,array('product/show','id'=>$model->id)); ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
	<?php if ($models['news']):?>
	<ul id="notice">
		<?php foreach($models['news'] as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label(date('Y-m-d',strtotime($model->datetime)),'',array('class'=>'notice_time')).'[新闻中心] '.$model->title,array('notice/show','id'=>$model->id)); ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
	<?php if ($models['biz']):?>
	<ul id="notice">
		<?php foreach($models['biz'] as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label(date('Y-m-d',strtotime($model->datetime)),'',array('class'=>'notice_time')).'[商务合作] '.$model->title,array('notice/view','id'=>$model->id)); ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
	<?php if ($models['job']):?>
	<ul id="notice">
		<?php foreach($models['job'] as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label(date('Y-m-d',strtotime($model->createtime)),'',array('class'=>'notice_time')).'[招聘信息] '.$model->title,array('jobs/show','id'=>$model->id)); ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
</div>

