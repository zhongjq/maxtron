
<div class="new_products">
    <?php foreach($models as $n=>$model): ?>
        <div class="new_prod_box <?php echo $n%2?'even':'odd';?>" style="float:left">        	       	
            <div class="prod_bg" style="float:left;margin-left:0px;">
                <?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)), $model->url,  array('target' => '_blank')); ?>
            </div>
           
           <div style="text-align:left; float:left;margin-left:10px; margin-top:10px;">
           <p><strong> <?php echo CHtml::link($model->title, $model->url, array('target' => '_blank')); ?></strong></p>         

    		<p><?php echo $model->getAttributeLabel('issuer'); ?>：<?php echo $model->issuer; ?></p>
    		<p><?php echo $model->getAttributeLabel('issue_date'); ?>：<?php echo $model->issue_date; ?></p>
    		<p style="margin-top:5px;">
    		<?php echo CHtml::link('<img src="/themes/black/images/tmp/down.jpg" width="71" height="22" />', $model->download); ?>
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

