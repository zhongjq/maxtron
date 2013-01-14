<div class="yiiForm content_main">
<?php if (Yii::app()->user->hasFlash('register-submited')):?>
<div class="success"><?php echo Yii::app()->user->getFlash('register-submited');?></div>
<?php endif;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-register-form',
	'enableAjaxValidation'=>true,
    'clientOptions'=>array('validateOnChange'=>false),
)); ?>

	<p style="text-indent: 30px;">带 <span class="required">*</span> 的字段为必填</p>

	<div class="simple">
		<?php echo $form->labelEx($model,'registrant'); ?>
		<?php echo $form->textField($model,'registrant'); ?>
		<?php echo $form->error($model,'registrant'); ?>
	</div>



	<div class="simple">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
	

	

	<div class="simple">
		<?php echo $form->labelEx($model,'insured'); ?>
		<?php echo $form->radioButtonList($model,'insured', array(1 => '购铺', 0 => '租铺'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'no-label'))); ?>
		<?php echo $form->error($model,'insured'); ?>
	</div>

	
	<div class="simple">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>


	<div class="action">
		<?php echo CHtml::submitButton('提交信息'); ?>
		<?php echo CHtml::resetButton('取消'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->