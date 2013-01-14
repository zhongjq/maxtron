<style>
.clearline {
	float:left;BORDER-BOTTOM: #dcdcdc 1px solid; HEIGHT: 2px; margin-left:0px; width:680px; margin-top:15px; margin-bottom:15px
}
</style>
<div class="new_products">

    <?php foreach($models as $n=>$model): ?>
    <!-- 
        <div class="new_prod_box <?php echo $n%2?'even':'odd';?>">
            <div class="prod_bg">
                <?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
            </div>
            <?php echo CHtml::link($model->title,array('product/show','id'=>$model->id)); ?>
        </div>
        
	-->

	<div class="content_main" style="height:100px;">
	<div style="height: 120px;">
	<div style="float:left;width:202px;height:120px;border:solid #CCCCCC 1px; text-align:center;">
	<div style="margin-left:0px;margin-top:2px;">
	
	<?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
    <!--
    <?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>product_img, 'style' => 'margin-right: 10px', 'align' => 'left')),$model->title); ?>
	-->
	</div>
	</div>
	<div style="font-weight: bolder; font-size:14px; float:left;margin-left:20px;"><span style="color: #d11113"><?php echo $model->title;?></span><br />
	<?php echo $model->summary;?><br>
    <?php if ($model->phone):?>
	<span style="color: #d11113; font-size: 14;">接待中心电话：<?php echo $model->phone;?></span>
    <?php endif;?>
	</div>
	<div class="clearline"></div>
	</div>
	
	</div>

    <?php endforeach; ?>

</div>
<div class="clear"></div>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>