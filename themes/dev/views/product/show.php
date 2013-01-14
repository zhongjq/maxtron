<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/product.css" />
<div class="content_main">
	<div style="height: 120px">
	<!--
	<?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>product_img, 'style' => 'margin-right: 8px', 'align' => 'left')),$model->title); ?>
	-->

	<div style="float:left;width:202px;height:121px;border:solid #CCCCCC 1px; text-align:center;">
	<div style="margin-left:0px;margin-top:2px;">
	
	<?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
    <!--
    <?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>product_img, 'style' => 'margin-right: 10px', 'align' => 'left')),$model->title); ?>
	-->
	</div>
	</div>
	
	<div style="font-weight: bolder; font-size:14px; margin-left:20px; float:left;"><span style="color: #d11113"><?php echo $model->title;?></span><br />
	<?php echo $model->summary;?><br>
	<?php if ($model->phone):?>
	<span style="color: #d11113; font-size: 14;">接待中心电话：<?php echo $model->phone;?></span>
	<?php endif;?>
    <br />
    <br />
	</div>
	</div>
	<hr class="clear" />
	<div>
	<?php echo $model->content;?><br/>
	</div>
       <?php
    $this->beginWidget('ext.prettyPhoto.PrettyPhoto', array(
        'id'=>'image_photo',
    	'htmlOptions' => array('class' => 'rollBox'),
        // prettyPhoto options
        'options'=>array(
            'opacity'=>0.60,
            'modal'=>true,
        ),
    ));
    ?>
    <span onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()" class="img1" hidefocus="true"></span>
    <div class="Cont" id="ISL_Cont"><div class="ScrCont">
        <div id="List1">
            <?php foreach ($model->images as $image):?>
            <div class="pic">
            <a href="<?php echo $image->filename?>"><img src="<?php echo $image->thumb;?>" width="185" height="118" /></a>
            </div>
            <?php endforeach;?>
        </div>
        <div id="List2"></div>
    </div></div>
    <span onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()" class="img2" hidefocus="true" style="float:left; margin-left:635px; margin-top:-120px;"></span>
    <?php $this->endWidget();?>
    
</div>
<div class="clearfix"></div>

<script type="text/javascript">
//图片滚动列表 mengjia 070816
var Speed = 10; //速度(毫秒)
var Space = 10; //每次移动(px)
var PageWidth = 205; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;

$(function(){
    GetObj("List2").innerHTML = GetObj("List1").innerHTML;
    GetObj('ISL_Cont').scrollLeft = fill;
});

function GetObj(objName){
	if(document.getElementById){
		return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName);
    }
}
function AutoPlay(){ //自动滚动
    clearInterval(AutoPlayObj);
    AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',5000); //间隔时间
}
function ISL_GoUp(){ //上翻开始
    if(MoveLock) return;
    clearInterval(AutoPlayObj);
    MoveLock = true;
    MoveTimeObj = setInterval('ISL_ScrUp();',Speed);
}
function ISL_StopUp(){ //上翻停止
    clearInterval(MoveTimeObj);
    if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0){
    Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth);
    CompScr();
    }else{
    MoveLock = false;
    }
    //AutoPlay();
}
function ISL_ScrUp(){ //上翻动作
    if(GetObj('ISL_Cont').scrollLeft <= 0){
        GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth;
    }
    GetObj('ISL_Cont').scrollLeft -= Space ;
}
function ISL_GoDown(){ //下翻
    clearInterval(MoveTimeObj);
    if(MoveLock) return;
    clearInterval(AutoPlayObj);
    MoveLock = true;
    ISL_ScrDown();
    MoveTimeObj = setInterval('ISL_ScrDown()',Speed);
}
function ISL_StopDown(){ //下翻停止
    clearInterval(MoveTimeObj);
    if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0 ){
    Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill;
    CompScr();
    }else{
    MoveLock = false;
    }
    //AutoPlay();
}
function ISL_ScrDown(){ //下翻动作
    if(GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth){
        GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;
    }
    GetObj('ISL_Cont').scrollLeft += Space ;
}
function CompScr(){
    var num;
    if(Comp == 0){MoveLock = false;return;}
    if(Comp < 0){ //上翻
    if(Comp < -Space){
        Comp += Space;
        num = Space;
        }else{
        num = -Comp;
        Comp = 0;
    }
    GetObj('ISL_Cont').scrollLeft -= num;
    	setTimeout('CompScr()',Speed);
    }else{ //下翻
    if(Comp > Space){
        Comp -= Space;
        num = Space;
    }else{
        num = Comp;
        Comp = 0;
    }
    GetObj('ISL_Cont').scrollLeft += num;
    	setTimeout('CompScr()',Speed);
    }
}
</script>