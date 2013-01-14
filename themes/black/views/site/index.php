<div id="banner">
<?php if(!empty($ads)) {?>
	<div id="play_text">
		<ul>
		<?php foreach($ads as $key => $ad){?>
			<li><?php echo $key+1?></li>
		<?php }?>
		</ul>
	</div>
	<div id="play_list">
		<?php foreach($ads as $model){
			
			 echo CHtml::link(CHtml::image($model->icon,$model->title),$model->url);
			
		}	?>
	</div>
<?php }?>
</div>
<div id="contain01">
<div id="index_left">
	<div class="title-bg"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title1.jpg" /></div>
	<div>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="284" height="310">
          <param name="movie" value="<?php echo Yii::app()->theme->baseUrl?>/stream/map.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="transparent" />
          <embed wmode="transparent" src="<?php echo Yii::app()->theme->baseUrl?>/stream/map.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="284" height="310"></embed>
        </object>
	</div><!--
	<div class="title-bg" style="border-top: 1px solid #ccc;"><span class="portlet-title">重点项目</span></div>
	<div style="padding:4px; text-align: center"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/yjhk01.jpg" />&nbsp;&nbsp;
	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/yjhk02.jpg" /></div>
--></div>

<div id="index_center">
	<div id="index_content">
<?php
$tabs = array();
$menus = tree::model()->findByPK(2)->getTree();
unset($menus[0]);
foreach ($menus as $item){
    $tabs[] = array('title'=>$item->name, 'url'=> Yii::app()->createUrl('notice/top', array('cate_id' => $item->id, 'limit' => 6)));
}

$this->widget('application.extensions.slajaxtabs.SlAjaxTabs', array('tabs'=>$tabs));
?>
	</div>
</div>

<style type="text/css">
a{TEXT-DECORATION:none}
a:link {color: #0066cc;}
a:visited {color: #0066cc}
a:hover {color: #d00608;}
a:active{color:#0066CC}

</style>

<div id="index_right" style="margin-top:5px;">
	<ul id="zc_bg">
		<li><a href="/index.php/content/biz?id=20">项目开发</a></li>
		<li><a href="/index.php/notice/biz?cate_id=76">招商合作</a></li>
		<li><a href="/index.php/notice/biz?cate_id=77">招标采购</a></li>
	</ul>
	<div><a href="http://www.huakegroup.com/index.php/newspaper" target="_self"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title2.gif" /></a></div>
	<div class="title-bg" style="border-top: 1px solid #ccc;"><span class="portlet-title">电子杂志</span></div>
	<div style="padding:4px; text-align: center; padding:13px;">
	<div style=" float:left; "><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/an01.jpg" /></div>
	<div style=" float:left;width:76; line-height:25px; padding: 0 0 0 6px;">
	<a href="http://www.huakegroup.com/index.php/manual" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/ls02.jpg" /><br/><span>华科集团手册</span></a></div>
	<div style=" float:left; width:76; line-height:25px; padding: 0 6px 0 6px;">
	<a href="http://www.huakegroup.com/index.php/product/picture?id=80" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/ls01.jpg" /><br/><span>华科国际楼书</span></a>
	</div>
	<div style=" float:left;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmp/an02.jpg" /></div>
	</div>
</div>
</div>

<?php 
$floatAd = ad::model()->find(array('condition' => 'cate_id=83'));
if ($floatAd):
?>
<script type="text/javascript" src="/video/jquery.adFloat.js?" /></script>
<DIV id='div_float' style='Z-INDEX:100; LEFT:0px; POSITION:absolute; TOP:124px;'>
	<a href='<?php echo $floatAd->url?>' title='<?php echo $floatAd->title?>' target='_self'>
		<img src='<?php echo $floatAd->icon?>' width='237' height='172' border='0' />
	</a>
	<a href='javascript:'><img onclick='javascript:$("#div_float").hide();' src='/video/close.gif' width='25' height='25' border='0' vspace='3'></a>
</DIV>


<script type="text/javascript">
$(function() {
    $("#div_float").adFloat({ width: 237, height: 200, top: 30, left: 20 });
})
</script>
<?php 
endif;
?>
