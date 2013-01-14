<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo Yii::app()->params['keywords']; ?>">
<meta name="description" content="<?php echo Yii::app()->params['description']; ?>">
<meta name="author" content="huanghuibin@gmail.com"/>
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->
<title><?php echo Yii::app()->params['sitename']; ?></title>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cms.js" type="text/javascript"></script>
<style>
#menu-top ul { list-style: none; margin: 0; padding: 0; }
 
#menu-top ul li { display: block; height: 28px; float: left; overflow: visible; }
#menu-top ul li:hover > ul { display: block; }
 
#menu-top ul li a { float: left; display: block; }
 
#menu-top ul li ul { display: none; position: absolute; top: 100%;
                    background: #000; color: #fff; height: auto;
}
 
#menu-top ul li ul li a { color: #ccc; padding: 4px 14px; display: block; }
 
#menu-top ul li ul li.active a,
#menu-top ul li ul li a:hover { color: #fff; }
</style>
</head>
<body>

<div id="warp">


<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Contact', 'url'=>array('/site/contact'),
                  'items'=>array(
                    array('label'=>'sub 1 contact'),
                    array('label'=>'sub 2 contact'),
                  ),
                ),
                array('label'=>'Test',
                  'items'=>array(
                    array('label'=>'Sub 1', 'url'=>array('/site/page','view'=>'sub1')),
                    array('label'=>'Sub 2',
                      'items'=>array(
                        array('label'=>'Sub sub 1', 'url'=>array('/site/page','view'=>'subsub1')),
                        array('label'=>'Sub sub 2', 'url'=>array('/site/page','view'=>'subsub2')),
                      ),
                    ),
                  ),
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
		<div id="bottomFooter"><a href="<?php echo $this->createUrl('content/other', array('id' => 24))?>">联系我们</a> | <a href="<?php echo $this->createUrl('content/other', array('id' => 25))?>">免责声明</a></div>
		<div id="copyright" style="color:#999"><?php echo Yii::app()->params['copyright']; ?></div>
	</div>
</div>
</body>
</html>



<!-- 统计代码开始 -->
<!-- smartstat start -->
<!--
<script language="JavaScript" src="http://www.3000ad.cn/xm/tj/smart-stats.asp?id=7" type="text/JavaScript"></script>
-->
<!-- smartstat end -->
<!-- 统计代码结束 -->
