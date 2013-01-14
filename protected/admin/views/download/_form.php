<div class="yiiForm">
<p>
带 <span class="required">*</span> 的项目为必填
</p>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'download-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="simple<?php echo !empty($_GET['id']) ? ' hidden':''?>">
		<?php echo $form->labelEx($model,'cate_id'); ?>
		<?php echo $form->dropDownList($model,'cate_id',$this->cate_list); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php echo $form->textField($model,'icon',array('size'=>40,'maxlength'=>255,'id'=>'xFilePath')); ?>
		<input type="button" id="browseServer" value="上传图片"/>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'download'); ?>
		<?php echo $form->textField($model,'download',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'issuer'); ?>
		<?php echo $form->textField($model,'issuer',array('size'=>40,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php echo $form->textField($model,'issue_date'); ?>
	</div>
    <?php $this->widget('application.extensions.JSCal2.SCalendar',
        array(
        'inputField'=>"Download_issue_date",
		'trigger'=>"Download_issue_date",
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
	</div>

	<div class="action">
		<?php echo CHtml::submitButton($model->isNewRecord ? '修改' : '添加'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->