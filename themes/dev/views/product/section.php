<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/product.css" />
<style type="text/css">
.line{
	border-bottom:#ccc 1px dashed; line-height:1px; margin:1px 0px; height:1px; width:600px;
}
</style>
<div id="detail" class="content_main">
       <div id="show" style="font-size:12px;">
       <?php if ($model->issue_message):?>
       <p><strong>尊敬的业主</strong>：</p>
       <div><?php echo nl2br($model->issue_message)?></div>
       <?php endif;?>
	<hr class="clear" style="width:670px;"/>
 
    <?php
	if ($model->sections):
    $this->beginWidget('ext.prettyPhoto.PrettyPhoto', array(
        'id'=>'pretty_photo',
        // prettyPhoto options
        'options'=>array(
            'opacity'=>0.60,
            'modal'=>true,
        ),
    ));
   
    foreach ($model->sections as $section):
    ?>
      <div class="planbg">
            <div class="plancontent">
              <div class="planpic"><a href="<?php echo $section->picture?>">
               <div style="float:left;margin-left:2px;">
              <img class="gray_frame" src="<?php echo $section->thumb?>" width="138" height="128" />
              </div></a></div>
              <p style="margin: 0pt 5px; border-bottom: dashed 1px #ccc;"></p>
              <div class="plandetail">
               <div style="margin-left:2px;">
				<div style="text-align:left;"><span style="font-weight: bold;"><?php echo $section->name?></span></div>
				<div><?php echo nl2br($section->summary);?></div>
				<div style="text-align:left;">发布时间：<?php echo $section->issue_date;?></div>
				</div>
				</div>
            </div>
          </div>
    <?php 
    endforeach;
    $this->endWidget();
    else:?>
	项目正在建设中......
	<?php endif;?>
  </div>
</div>