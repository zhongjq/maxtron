<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo Yii::app()->params['keywords']; ?>">
<meta name="description" content="<?php echo Yii::app()->params['description']; ?>">
<meta name="author" content="huanghuibin@gmail.com"/>
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->
<title><?php echo Yii::app()->params['sitename']; ?></title>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cms.js" type="text/javascript"></script>
</head>
<body>



<div id="warp">
	<div id="header">
		<div id="logo">
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="124" height="123" title="华科集团">
              <param name="movie" value="<?php echo Yii::app()->theme->baseUrl?>/stream/logo.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <embed wmode="transparent" src="<?php echo Yii::app()->theme->baseUrl?>/stream/logo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="124" height="123"></embed>
            </object>
		</div>
		<div id="header_right">
    		<div id="right_top">
    			<div id="search_top">
    				<?php echo CHtml::beginForm(array('product/list'), 'get', array('style' => 'float: left')); ?>
    				<input type="text" onfocus="this.value=''" size="18" value="项目关键字" class="T4_box" name="keyword"/>
    				 <input type="button" border="0" align="absmiddle" value="搜索" alt="Search Products" name="search" class="screnBtn" />
    				
    				<span style="color:#9EAFC9">合作商</span> <span style="color:#9EAFC9">| &nbsp;投资商 <span style="color:#9EAFC9">|</span> 求职者
    				<?php echo CHtml::endForm(); ?>
    				
    			</div>
    		</div>
            <?php 
            $criteria=new CDbCriteria;
            
            $criteria->order = "sort desc";
            
            $aboutItems = $newsItems = $hrItems = $cultureItems = $bizItems = array();
            
            $criteria->condition = "cate_id = 11";
            $menus = content::model()->findAll($criteria);
            foreach ($menus as $item){
                $aboutItems[] = array('label'=>$item->title, 'url'=>array('/content/about', 'id' => $item->id));
            }
            
            $criteria->condition = "cate_id = 12";
            $menus = content::model()->findAll($criteria);
            foreach ($menus as $item){
                $cultureItems[] = array('label'=>$item->title, 'url'=>array('/content/culture', 'id' => $item->id));
            }
            
            $criteria->condition = "cate_id = 13";
            $menus = content::model()->findAll($criteria);
            foreach ($menus as $item){
                $hrItems[] = array('label'=>$item->title, 'url'=>array('/content/hr', 'id' => $item->id));
            }
            
            $criteria->condition = "cate_id = 14";
            $menus = content::model()->findAll($criteria);
            foreach ($menus as $item){
                $bizItems[] = array('label'=>$item->title, 'url'=>array('/content/biz', 'id' => $item->id));
            }
            
            
            $menus = tree::model()->findByPK(2)->getTree();
            unset($menus[0]);
            foreach ($menus as $item){
                $newsItems[] = array('label'=>$item->name, 'url'=>array('/notice', 'cate_id' => $item->id));
            }

			$criteria=new CDbCriteria;
			$criteria->order = "sort desc";
		    $menus = product::model()->findAll($criteria);
            foreach ($menus as $item){
                $productItems[] = array('label'=>$item->title, 'url'=>array('/product/show', 'id' => $item->id));
            }

            $this->widget('application.extensions.mbmenu.MbMenu',array(
                'cssFile' => Yii::app()->theme->baseUrl . '/css/mbmenu/style.css',
                'items'=>array(
                array('label'=>'首页', 'url'=>array('/site/index')),
                array('label'=>'走进华科',
                  'items' => $aboutItems
                ),
                array('label'=>'华科产品', 'url'=>array('/product'),
                  'items' => $productItems
                ),
                array('label'=>'新闻中心', 'url'=>array('/notice/list'), 'items'=>$newsItems),
                array('label'=>'华科文化',
                  'items'=>$cultureItems,
                  ),
                array('label'=>'人力资源',
                  'items'=>$hrItems,
                  ),
                array('label'=>'商务合作',
                  'items'=>$bizItems,
                  ),
                ),
            )); ?>
		</div>
		<div class="clear"></div>
		<?php /*$this->widget('application.components.MainMenu',array(
			'items'=>array(
		        //array('label'=>'HOME', 'url'=>array('/site')),
                array('label'=>'走进华科', 'url'=>array('/content/about')),
				
				array('label'=>'华科产品', 'url'=>array('/product/index')),
				
				array('label'=>'新闻中心', 'url'=>array('/notice')),
				array('label'=>'华科文化', 'url'=>array('/content/culture')),
				array('label'=>'人力资源', 'url'=>array('/content/')),
				array('label'=>'商务合作', 'url'=>array('/content/')),
				//array('label'=>'NEW PRODUCTS', 'url'=>array('/product/new')),
				//array('label'=>'SERVICE', 'url'=>array('/content/service')),
				//array('label'=>'CONTACT US', 'url'=>array('/content/contact')),
			),
		)); */?>
	</div>
	<?php echo $content; ?>
</div>
<div id="footer" style="color:#333333">
	<div id="contact_bottom" style="float:left; width:450px">
	   <?php echo Yii::app()->params['footer_address']; ?>
	</div>
	<div id="nav_bottom" style="float:right;">
		<div ><a>疑问及解答 </a> | <a>站点地图</a> | <a>联系我们</a> | <a>免责声明</a></div>
		<div id="copyright" ><?php echo Yii::app()->params['copyright']; ?></div>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="/video/left.js" /></script>
<!-- 统计代码开始 -->
<!-- smartstat start -->
<script language="JavaScript" src="http://www.3000ad.cn/xm/tj/smart-stats.asp?id=7" type="text/JavaScript"></script>
<!-- smartstat end -->
<!-- 统计代码结束 -->
