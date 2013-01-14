<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/product.css" />
<div class="content_main">
	<?php if ($model->ebook_picture):?>
	<div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/dzl.jpg" /></div>
	<div style="height: 120px; float:left;margin-left:40px;margin-top:-120px;">	
	<?php echo CHtml::link(CHtml::image($model->ebook_picture,$model->ebook_name,array('class'=>product_img, 'style' => 'margin-right: 8px', 'align' => 'left')),$model->ebook_url, array('target' => '_blank')); ?>
	</div>
	
	<div style="height:90px;float:left;margin-left:240px;margin-top:-110px;font-weight:bold; font-size: larger;">
	<?php echo $model->ebook_name;?>
	<br/>

	<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/tmp/down.jpg" />', $model->ebook_download);?>
	<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/tmp/ln.jpg" />', $model->ebook_url, array('target' => '_blank'));?>
	</div>
	<hr class="clear" />
	<?php endif;?>
	<?php if ($model->newspapers):?>
    <div style="float:left;  margin-top:10px;">
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/bgz.jpg"  />
	</div>
    <?php
    $this->beginWidget('ext.prettyPhoto.PrettyPhoto', array(
        'id'=>'newspaper_photo',
    	'htmlOptions' => array('class' => 'rollBox'),
        // prettyPhoto options
        'options'=>array(
            'opacity'=>0.60,
            'modal'=>true,
        ),
    ));
    ?>
    <span onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()" class="img1" hidefocus="true" style="float:left; margin-top:15px;"></span>
    <div class="Cont" id="ISL_Cont"><div class="ScrCont">
        <div id="List1">
            <?php foreach ($model->newspapers as $newspaper):?>
            <div class="pic">
            <a href="<?php echo $newspaper->filename?>"><img src="<?php echo $newspaper->thumb;?>" width="185" height="118" /></a>
            </div>
            <?php endforeach;?>
        </div>
        <div id="List2"></div>
    </div></div>
    <span onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()" class="img2" hidefocus="true" style="float:left; margin-left:635px; margin-top:-125px;"></span>
    <?php $this->endWidget();?>
	<hr class="clear" />
    <script type="text/javascript">
    $(function(){
        GetObj("List2").innerHTML = GetObj("List1").innerHTML;
        GetObj('ISL_Cont').scrollLeft = fill;
    });
    </script>
	<?php endif;?>
	<?php if ($model->images):?>
    <div style="float:left; margin-top:10px;">
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/xgt.jpg"  />
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
    <span onmousedown="ISL_GoUp2()" onmouseup="ISL_StopUp2()" onmouseout="ISL_StopUp2()" class="img1" hidefocus="true"  style="float:left; margin-top:15px;"></span>
    <div class="Cont" id="ISL_Cont2"><div class="ScrCont">
        <div id="List3">
            <?php foreach ($model->images as $image):?>
            <div class="pic">
            <a href="<?php echo $image->filename?>"><img src="<?php echo $image->thumb;?>" width="185" height="118" /></a>
            </div>
            <?php endforeach;?>
        </div>
        <div id="List4"></div>
    </div></div>
    <span onmousedown="ISL_GoDown2()" onmouseup="ISL_StopDown2()" onmouseout="ISL_StopDown2()" class="img2" hidefocus="true" style="float:left; margin-left:635px; margin-top:-125px;"></span>
    <?php $this->endWidget();?>
    <script type="text/javascript">
    $(function(){
        GetObj("List4").innerHTML = GetObj("List3").innerHTML;
        GetObj('ISL_Cont2').scrollLeft = fill;
    });
    </script>
    <?php endif;?>
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
//GetObj("ISL_Cont").onmouseover = function(){clearInterval(AutoPlayObj);}
//GetObj("ISL_Cont").onmouseout = function(){AutoPlay();}
//AutoPlay();
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




var MoveLock2 = false;
var MoveTimeObj2;
var Comp2 = 0;
var AutoPlayObj2 = null;

function AutoPlay2(){ //自动滚动
    clearInterval(AutoPlayObj2);
    AutoPlayObj2 = setInterval('ISL_GoDown2();ISL_StopDown2();',5000); //间隔时间
}
function ISL_GoUp2(){ //上翻开始
    if(MoveLock2) return;
    clearInterval(AutoPlayObj2);
    MoveLock2 = true;
    MoveTimeObj2 = setInterval('ISL_ScrUp2();',Speed);
}
function ISL_StopUp2(){ //上翻停止
    clearInterval(MoveTimeObj2);
    if(GetObj('ISL_Cont2').scrollLeft % PageWidth - fill != 0){
        Comp2 = fill - (GetObj('ISL_Cont2').scrollLeft % PageWidth);
        CompScr2();
    }else{
    	MoveLock2 = false;
    }
    //AutoPlay2();
}
function ISL_ScrUp2(){ //上翻动作
    if(GetObj('ISL_Cont2').scrollLeft <= 0){
        GetObj('ISL_Cont2').scrollLeft = GetObj('ISL_Cont2').scrollLeft + GetObj('List3').offsetWidth;
    }
    GetObj('ISL_Cont2').scrollLeft -= Space;
}
function ISL_GoDown2(){ //下翻
    clearInterval(MoveTimeObj2);
    if(MoveLock2) return;
    clearInterval(AutoPlayObj2);
    MoveLock2 = true;
    ISL_ScrDown2();
    MoveTimeObj2 = setInterval('ISL_ScrDown2()',Speed);
}

function ISL_StopDown2(){ //下翻停止
    clearInterval(MoveTimeObj2);
    if(GetObj('ISL_Cont2').scrollLeft % PageWidth - fill != 0 ){
    	Comp2 = PageWidth - GetObj('ISL_Cont2').scrollLeft % PageWidth + fill;
        CompScr2();
    }else{
    	MoveLock2 = false;
    }
    //AutoPlay2();
}
function ISL_ScrDown2(){ //下翻动作
    if(GetObj('ISL_Cont2').scrollLeft >= GetObj('List3').scrollWidth){
        GetObj('ISL_Cont2').scrollLeft = GetObj('ISL_Cont2').scrollLeft - GetObj('List3').scrollWidth;
    }
    GetObj('ISL_Cont2').scrollLeft += Space ;
}

function CompScr2(){
    var num;
    if(Comp2 == 0){MoveLock2 = false;return;}
    if(Comp2 < 0){ //上翻
        if(Comp2 < -Space){
            Comp2 += Space;
            num = Space;
        }else{
            num = -Comp2;
            Comp2 = 0;
        }
    	GetObj('ISL_Cont2').scrollLeft -= num;
    	setTimeout('CompScr2()',Speed);
    }else{ //下翻
        if(Comp2 > Space){
            Comp2 -= Space;
            num = Space;
        }else{
            num = Comp2;
            Comp2 = 0;
        }
    	GetObj('ISL_Cont2').scrollLeft += num;
    	setTimeout('CompScr2()',Speed);
    }
}

</script>