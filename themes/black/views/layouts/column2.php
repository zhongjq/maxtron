<?php $this->beginContent('/layouts/main'); ?>
<div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner/<?php echo Yii::app()->controller->id;?>-<?php echo Yii::app()->controller->action->id;?>.jpg" /></div>
<div id="contain">
	<div id="sidebar">
		<div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/menu-title/<?php echo Yii::app()->controller->id;?>-<?php echo Yii::app()->controller->action->id;?>.jpg" /></div>
		<?php $this->widget('application.components.MainSidebar');?>
		<br/>
		<a href="http://www.huakegroup.com/index.php/newspaper" target="_self"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title2.gif" /></a>
		<br/>
		<a href="http://www.huakegroup.com/group.html" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hkg.jpg" /></a>
	</div>
	<!--end of sidebar-->
	<div id="primary">
        <div class="title-bg"><span class="portlet-title"><?php echo end($this->breadcrumbs);?></span>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            	'links'=>$this->breadcrumbs,
            )); ?></div>
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="clear"></div>

</div>
<?php $this->endContent(); ?>