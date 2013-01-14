<style>
<!--

.hkImg{
	width:182px; height:138px; border:solid 1px #CCCCCC; float:left;
}
.hktxt{
	float:left; width:150px; height:138px; margin-right:200px; font-size:12px; 
}
.hkb{
	float:left; width:350px; margin-left:40px; margin-top:30px; 
}
.hkbcontainer{
	float:left; width:700px;
}
-->
</style>



<div class="new_products">

    <?php foreach($models as $n=>$model): ?>
        <div class="new_prod_box <?php echo $n%2?'even':'odd';?>" style="width:400px;">        	       	
            <div class="prod_bg" style="float:left;margin-left:0px;">
                <?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)), $model->url,  array('target' => '_blank')); ?>
            </div>
           
             <div style="text-align:left; flot:left;margin-left:220px; margin-top:10px;">
           <p><strong> <?php echo CHtml::link($model->title, $model->url, array('target' => '_blank')); ?></strong></p>         

    		<p>主办：华科集团</p>
    		<p>发布时间：2012-02-05</p>
    		<p style="margin-top:5px;">
    		<img src="/themes/black/images/tmp/down.jpg" width="71" height="22" />
    		</p>
    		<p style="float:left;margin-top:5px;">
			<?php echo CHtml::link('<img src="/themes/black/images/tmp/ln.jpg" width="71" height="22" />', $model->url, array('target' => '_blank')); ?>
    		</p>
            
            </div>
        </div>
                  
    <?php endforeach; ?>

    <div style="text-align: right; line-height: 3em; clear:both; margin-right:45px;"><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
</div>
<div class="clear"></div>

