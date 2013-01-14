<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/zptable.css" />
<div class="yiiForm content_main">
<?php if (Yii::app()->user->hasFlash('apply-submited')):?>
<div class="success"><?php echo Yii::app()->user->getFlash('apply-submited');?></div>
<?php endif;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-resume-form',
	'enableAjaxValidation'=>false,
    'clientOptions'=>array('validateOnChange'=>false),
)); ?>
<div class="tianbiao_s">
    <table style="MARGIN-BOTTOM: 0px; OVERFLOW: hidden" id="wordresume1" border="0" 
cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>
          
          <table class="tbl12" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center"><span 
            class="red">请您填写完整信息（包括教育经历、工作经历，联系电话等）。 </span></td>
              </tr>
            </tbody>
          </table>
          
         <table class="tbl13" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
            <?php echo $form->labelEx($model,'job_id'); ?>
            </span></td>
            <td valign="center" class="td03"><span class="td02">
		<?php echo $form->dropDownList($model,'job_id', array('' => '请选择')+CHtml::listData(jobs::model()->findAll(), 'id', 'title')); ?>
<!--		<?php echo $form->error($model,'job_id'); ?>-->
             </span></td>
              </tr>
            </tbody>
          </table>
          
          </td>
        </tr>
        <tr>
          <td><table class="tbl13" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'applicant'); ?>
		</span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->textField($model,'applicant'); ?>
<!--		<?php echo $form->error($model,'applicant'); ?>-->
                </span></td>
                <td valign="center" width="138"><span class="td02">	
                <?php echo $form->labelEx($model,'gender'); ?>
		
</span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                  <?php echo $form->radioButtonList($model,'gender', $model->genderOptions, array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'no-label'))); ?>
                </span></td>
              </tr>

              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'phone'); ?>
                </span></td>
                <td colspan="3" class="td03" valign="center"><span class="td02">
                 <?php echo $form->textField($model,'phone'); ?>
<!--		<?php echo $form->error($model,'phone'); ?>-->
                </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>

      
        <tr>
          <td><table class="tbl12" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center"><span 
        class="td04">
         <?php echo $form->labelEx($model,'work_ex'); ?>
        </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td><table class="tbl12" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="92">
                <td valign="center"><span class="td04">
                 <?php echo $form->textArea($model,'work_ex', array('rows'=>6, 'cols'=>78)); ?>
                </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td style="border: 1px solid #DFDFDF;">
            <div class="action">
            	<?php echo CHtml::submitButton('提交简历'); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>


</div>

	

<?php $this->endWidget(); ?>

</div><!-- form -->