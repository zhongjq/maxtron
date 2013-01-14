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
          
         <table class="tbl12" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center"><span 
            class="td01">
            <?php echo $form->labelEx($model,'job_id'); ?>
		<?php echo $form->dropDownList($model,'job_id', array('' => '请选择')+CHtml::listData(jobs::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model,'job_id'); ?>
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
                <?php echo $form->labelEx($model,'birthday'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                 <?php echo $form->textField($model,'birthday'); ?>
<!--		<?php echo $form->error($model,'birthday'); ?>-->
		 <?php $this->widget('application.extensions.JSCal2.SCalendar',
                array(
                'inputField'=>'JobsResume_birthday',
        		'trigger'=>"JobsResume_birthday",
                'ifFormat'=>'%Y-%m-%d',
        
            ));
            ?>
                </span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'native'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                 <?php echo $form->textField($model,'native'); ?>
<!--		        <?php echo $form->error($model,'native'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'landscape'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->dropDownList($model,'landscape',$model->landscapeOptions); ?>
<!--		          <?php echo $form->error($model,'landscape'); ?>-->
                </span></td>
                
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'wedding'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                  <?php echo $form->dropDownList($model,'wedding',$model->weddingOptions); ?>
<!--		<?php echo $form->error($model,'wedding'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'cer_type'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->dropDownList($model,'cer_type',$model->cerTypeOptions); ?>
<!--		<?php echo $form->error($model,'cer_type'); ?>-->
                </span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'cer_num'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                  <?php echo $form->textField($model,'cer_num'); ?><!--
		        <?php echo $form->error($model,'cer_num'); ?>
                --></span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'working_age'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->dropDownList($model,'working_age',$model->workingAgeOptions); ?><!--
		        <?php echo $form->error($model,'working_age'); ?>
                --></span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'education'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                  <?php echo $form->dropDownList($model,'education',$model->educationOptions); ?>
<!--		<?php echo $form->error($model,'education'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'address'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->textField($model,'address'); ?>
<!--		<?php echo $form->error($model,'address'); ?>-->
                </span></td>
                
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'email'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                 <?php echo $form->textField($model,'email'); ?>
<!--		<?php echo $form->error($model,'email'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'phone'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                 <?php echo $form->textField($model,'phone'); ?>
<!--		<?php echo $form->error($model,'phone'); ?>-->
                </span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'tall'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                 <?php echo $form->textField($model,'tall'); ?>
<!--		<?php echo $form->error($model,'tall'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'school'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                  <?php echo $form->textField($model,'school'); ?>
<!--		<?php echo $form->error($model,'school'); ?>-->
                </span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'professional'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                  <?php echo $form->textField($model,'professional'); ?>
<!--		<?php echo $form->error($model,'professional'); ?>-->
                </span></td>
              </tr>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'hope_wage'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                 <?php echo $form->textField($model,'hope_wage'); ?>
<!--		<?php echo $form->error($model,'hope_wage'); ?>-->
                </span></td>
                <td valign="center" width="138"><span class="td02">
                <?php echo $form->labelEx($model,'p_company'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                 <?php echo $form->textField($model,'p_company'); ?>
<!--		<?php echo $form->error($model,'p_company'); ?>-->
                </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td><table class="tbl14" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'p_post'); ?>
		
                </span></td>
                <td class="td03" valign="center" width="579"><span class="td02">
                  <?php echo $form->textField($model,'p_post'); ?>
		<?php echo $form->error($model,'p_post'); ?>
                </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td><table class="tbl13" border="0" cellspacing="0" cellpadding="0" width="695">
            <tbody>
              <tr height="30">
                <td valign="center" width="113"><span class="td01">
                <?php echo $form->labelEx($model,'p_wage'); ?>
		
                </span></td>
                <td valign="center" width="226"><span class="td02">
                 <?php echo $form->textField($model,'p_wage'); ?>
		<?php echo $form->error($model,'p_wage'); ?>
                </span></td>
                <td valign="center" width="138"><span class="td02"></span></td>
                <td class="td03" valign="center" width="213"><span class="td02">
                 
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
                 <?php echo $form->textArea($model,'work_ex', array('rows'=>6, 'cols'=>50)); ?>
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
            <?php echo $form->labelEx($model,'edu_ex'); ?>
	
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
                 <?php echo $form->textArea($model,'edu_ex', array('rows'=>6, 'cols'=>50)); ?>
                </span></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        
        
      </tbody>
    </table>


</div>

	
	
	<div class="action">
		<?php echo CHtml::submitButton('提交简历'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->