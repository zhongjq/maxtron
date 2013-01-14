<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-section-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">带 <span class="required">*</span> 的项目为必填</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary', array('rows'=>6, 'cols'=>50)); ?>
	</div>
	<div class="simple">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php echo $form->textField($model,'issue_date', array('rows'=>6, 'cols'=>50)); ?>
	</div>
    <?php $this->widget('application.extensions.JSCal2.SCalendar',
        array(
        'inputField'=>'ProductSection_issue_date',
		'trigger'=>"ProductSection_issue_date",
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->textField($model,'picture', array('size'=>40,'maxlength'=>255,'id'=>'xxFilePath')); ?>
		<input type="button" id="browseFinder" value="上传图片"/>
		<?php echo $form->hiddenField($model,'thumb', array('id'=>'xxThumb')); ?>
	</div>


	<div class="action">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加工期' : '修改工期'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
    $("#browseFinder").bind("click", function(){
        var finder = new CKFinder('/ckfinder/');
        finder.selectActionFunction = addPicture;
        finder.DisableThumbnailSelection = true;
        finder.popup();
    });
});
function addPicture(fileUrl, data){
	$('#xxFilePath').val(fileUrl);
	$('#xxThumb').val(this.getSelectedFile().getThumbnailUrl());
}
</script>