<?php
/**
 * list.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The auth items list view
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.0.0
 */
 ?>
 <?php if(Yii::app()->user->hasFlash('updateName')): ?>
<div id="messageUpd"
     style="color:red;font-weight:bold;font-size:14px;text-align:center
     ;position:relative;border:solid black 2px;background-color:#DDDDDD"
     >
          <?php echo Yii::app()->user->getFlash('updateName'); ?>
          <?php
          Yii::app()->clientScript->registerScript(
              'myHideEffect',
              '$("#messageUpd").animate({opacity: 0}, 2000).fadeOut(500);',
              CClientScript::POS_READY
          );
          ?>
</div>
 <?php endif; ?>
 <?php echo CHtml::beginForm();?>
<div class="controlPanel">
    <?php echo CHtml::ajaxLink(
                CHtml::image($this->module->getIconsPath().'/create.png',
                Helper::translate('srbac','Create'),
                array('border'=>0,
                  'class'=>'icon','title'=>Helper::translate('srbac','Create'),
                  'border'=>0
                  )
                ),
                array('create'),
                array(
                    'type'=>'POST',
                    'update'=>'#preview',
                    'beforeSend' => 'function(){
                                  $("#preview").addClass("srbacLoading");
                              }',
                    'complete' => 'function(){
                                  $("#preview").removeClass("srbacLoading");
                              }',
                )
    );

    echo Helper::translate('srbac','Search').': &nbsp; ';
    $this->widget('CAutoComplete',
            array(
                'name'=>'name',
                'max'=>10,
                'delay'=>300,
                'matchCase'=>false,
                'url'=>array('autocomplete'),
                'minChars'=>2,
            )
    ); ?>
    <?php
    echo CHtml::imageButton($this->module->getIconsPath().'/preview.png',
                array(
                    'border'=>0,
                    'title'=>Helper::translate('srbac','Search'),
                    'ajax'=>array(
                        'type'=>'POST','url'=>array('list'),'update'=>'#list',
                        'beforeSend' => 'function(){
                                      $("#list").addClass("srbacLoading");
                                  }',
                        'complete' => 'function(){
                                      $("#list").removeClass("srbacLoading");
                                  }',
                    )
                )
    );
    ?>
</div>
<br />
<table class="srbacDataGrid">
  <tr>
    <th><?php echo Helper::translate('srbac','Name');   ?></th>
    <th>
       <?php
       echo CHtml::dropDownList('selectedType',Yii::app()->user->getState("selectedType"),
       AuthItem::$TYPES,
       array(
       'prompt'=>Helper::translate('srbac','All'),
       'ajax'=>array(
       'type'=>'POST',
       'url'=>array('list'),
       'update'=>'#list',
       'beforeSend' => 'function(){
                      $("#list").addClass("srbacLoading");
                  }',
       'complete' => 'function(){
                      $("#list").removeClass("srbacLoading");
                  }',
       )
       )
       );
       ?>
    </th>
    <th colspan="2"><?php echo Helper::translate('srbac','Actions') ?></th>
  </tr>
   <?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::ajaxLink($model->name,
    array('show','id'=>$model->name),
         array('type'=>'POST','update'=>'#preview',
         'beforeSend' => 'function(){
                      $("#preview").addClass("srbacLoading");
                  }',
         'complete' => 'function(){
                      $("#preview").removeClass("srbacLoading");
                  }',
         ), array("title"=>$model->description ? $model->description : $model->name)
         ); ?></td>
    <td><?php echo CHtml::encode(AuthItem::$TYPES[$model->type]); ?></td>
    <td>
         <?php echo CHtml::ajaxLink(
         CHtml::image($this->module->getIconsPath().'/update.png',
         Helper::translate('srbac','Update'),
         array('border'=>0,'title'=>Helper::translate('srbac','Update'))),
         array('update','id'=>$model->name),
         array(
         'type'=>'POST',
         'update'=>'#preview',
         'beforeSend' => 'function(){
                      $("#preview").addClass("srbacLoading");
                  }',
         'complete' => 'function(){
                      $("#preview").removeClass("srbacLoading");
                  }',))?>
    </td>
    <td>
         <?php if ($model->name !=  Helper::findModule('srbac')->superUser) { ?>
           <?php echo CHtml::ajaxLink(
           CHtml::image($this->module->getIconsPath().'/delete.png'
             ,Helper::translate('srbac','Delete'),
           array('border'=>0,'title'=>Helper::translate('srbac','Delete'))),
           array('confirm','id'=>$model->name),
           array(
           'type'=>'POST',
           'update'=>'#preview',
           'beforeSend' => 'function(){
                      $("#preview").addClass("srbacLoading");
                  }',
           'complete' => 'function(){
                      $("#preview").removeClass("srbacLoading");
                  }',
           )); ?>
         <?php } ?>
    </td>
  </tr>
   <?php endforeach; ?>
</table>
 <?php echo CHtml::endForm();?>
<br />
<div class="simple">
   <?php $this->widget('CLinkPager',array(
       'pages'=>$pages,
       'prevPageLabel'=>'<',
       'nextPageLabel'=>'>',
       'maxButtonCount'=>3
   )); ?>
</div>
