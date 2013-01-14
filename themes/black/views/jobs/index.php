<style>
.news_txt_top{
	width:700px; float:left; FONT-SIZE: 12px;
}
.news_txt_top dt {
	LINE-HEIGHT: 30px; HEIGHT: 36px; margin-left:0px;
	background-color:#ececec;
	BORDER-BOTTOM: #dcdcdc 1px solid;
}
.news_txt_top dd {
	BORDER-BOTTOM: #dcdcdc 1px solid; LINE-HEIGHT: 30px; PADDING-LEFT: 0px; HEIGHT: 30px; margin-left:0px; width:700px;
}
.news_txt_top dd a {
	DISPLAY: block; FLOAT: left; COLOR: #29232d; TEXT-DECORATION: none
}
.news_txt_top dd a:hover {
	COLOR: #0033cc;
}
.news_txt_top dd span {
	FLOAT: left; 
}
#news_line {
	BORDER-BOTTOM: #f1f4f7 3px solid
}
</style>
<div class="new_products news_txt_top" style="width:95%; margin-left:15px;margin-top:15px;">
    <dl>
      	<?php $model = new jobs;?>
		<dt style="font-weight:bold">
		<span style="MARGIN: 0px 70px 0px 70px"><?php echo $model->getAttributeLabel('title'); ?></span>
		<span style="MARGIN-left: 30px"><?php echo $model->getAttributeLabel('education'); ?></span>
        <span style="margin-left:50px;"><?php echo $model->getAttributeLabel('number'); ?></span>
        <span style="margin-left:50px;"><?php echo $model->getAttributeLabel('place'); ?></span>
        <span style="margin-left:100px;"><?php echo $model->getAttributeLabel('start_date'); ?></span>
    	</dt>
    	<?php if(!$models):?><dd style="text-align: center">暂无招聘信息！</dd><?php endif;?>
    <?php foreach($models as $n=>$model): ?>
       <dd>
       <a href="<?php echo $this->createUrl('jobs/show',array('id'=>$model->id));?>">
       <span style="margin-left:40px; width:150px;"><?php echo CHtml::encode($model->title); ?></span>
       <span style="margin-left:35px; width:50px;"><?php echo CHtml::encode($model->education); ?></span>
       <span style="margin-left:50px; width:30px;"><?php echo CHtml::encode($model->number); ?></span>
       <span style="margin-left:70px; width:80px;"><?php echo CHtml::encode($model->place); ?></span>
       <span style="margin-left:10px; width:150px; text-align:center"><?php echo CHtml::encode($model->start_date); ?></span>
    	</a>
       </dd>
    <?php endforeach; ?>
     </dl>
	<div style="text-align: right; line-height: 3em"><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
<br><span class="title" style="font-size:18px;">联系方式</span>
<div style="font-size:14px; line-height: 2em">
办公电话：0662-6888099<br>
联系人：刘女士<br>
联系地址：广东省阳江市广雅路268号</address>
</div>
