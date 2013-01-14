<?php
/**
 * manage.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The auth items main administration page
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.0.0
 */
 ?>
<?php if(!$full){
    $this->renderPartial("frontpage");
?>
<div id="wizardButton" style="text-align:left" class="controlPanel marginBottom">
  <?php echo CHtml::ajaxLink(
                CHtml::image($this->module->getIconsPath().'/admin.png',
                    Helper::translate('srbac','Manage AuthItem'),
                    array('class'=>'icon',
                      'title'=>Helper::translate('srbac','Manage AuthItem'),
                      'border'=>0
                      )
                )." " .
                ($this->module->iconText ?
                Helper::translate('srbac','Manage AuthItem') :
                ""),
                array('manage','full'=>true),
                array(
                    'type'=>'POST',
                    'update'=>'#wizard',
                    'beforeSend' => 'function(){
                                      $("#wizard").addClass("srbacLoading");
                                  }',
                    'complete' => 'function(){
                                      $("#wizard").removeClass("srbacLoading");
                                  }',
                ),
                array(
                    'name'=>'buttonManage',
                    'onclick'=>"$(this).css('font-weight', 'bold');$(this).siblings().css('font-weight', 'normal');",
                )
            );
  ?>
<?php echo CHtml::ajaxLink(
                CHtml::image($this->module->getIconsPath().'/wizard.png',
                Helper::translate('srbac','Autocreate Auth Items'),
                array('class'=>'icon',
                  'title'=>Helper::translate('srbac','Autocreate Auth Items'),
                  'border'=>0
                  )
                )." " .
                ($this->module->iconText ?
                Helper::translate('srbac','Autocreate Auth Items') :
                ""),
                array('auto'),
                array(
                    'type'=>'POST',
                    'update'=>'#wizard',
                    'beforeSend' => 'function(){
                                      $("#wizard").addClass("srbacLoading");
                                  }',
                    'complete' => 'function(){
                                      $("#wizard").removeClass("srbacLoading");
                                  }',
                ),
                array(
                    'name'=>'buttonAuto',
                    'onclick'=>"$(this).css('font-weight', 'bold');$(this).siblings().css('font-weight', 'normal');",
                )
            );
  ?>
</div>
<br />
<?php } ?>
<div id="wizard">
  <table class="srbacDataGrid" align="center">
    <tr>
      <th width="50%"><?php echo Helper::translate("srbac","Auth items");?></th>
      <th><?php echo Helper::translate('srbac','Actions')?></th>
    </tr>
    <tr>
      <td valign="top" align="center">
        <div id="list">
            <?php echo $this->renderPartial('manage/list', array(
                    'models'=>$models,
                    'pages'=>$pages,
                    'sort'=>$sort,
                    )); ?>
        </div>
      </td>
      <td valign="top">
        <div id="preview">

        </div>
      </td>
    </tr>
  </table>
</div>