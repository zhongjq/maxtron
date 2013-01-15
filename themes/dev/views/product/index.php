<style>
.clearline {
	float:left;BORDER-BOTTOM: #dcdcdc 1px solid; HEIGHT: 2px; margin-left:0px; width:680px; margin-top:15px; margin-bottom:15px
}
</style>
<div id="nk-subnav-sections" class="nk-snav-container nk-snav-container-var3 nk-b-border nk-snav-gradient nk-no-filter nk-snav-attached nk-drop-shadow">
    <div id="nk-section-title" class="nk-section-title">Products</div>
	<ul>
	    <li class="">
				<a href="/us-en/products/lumia/" style="max-width: none;"><span style="display: block; margin-top: 13px;">Lumia Family</span></a></li>
        <li class="">
				<a href="/us-en/products/att/" style="max-width: none;"><span style="display: block; margin-top: 13px;">AT&amp;T Phones</span></a></li>
        <li class="">
				<a href="/us-en/products/verizon/" style="max-width: none;"><span style="display: block; margin-top: 13px;">Verizon Phones</span></a></li>
        <li class="">
				<a href="/us-en/products/t-mobile/" style="max-width: none;"><span style="display: block; margin-top: 13px;">T-Mobile Phones</span></a></li>
        </ul>
    <div class="nk-clear-both"></div>
</div>

<div id="nk-pc-filters-container" class="nk-prodcatalogue-filters">
	<h2 class="nk-pc-t-border"><span>Style</span></h2>
    	<ul class="nk-filter-radio">
			<li class=""><a href="?action=catalogsearch#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>All mobile phones</span>
	<img src="//i.nokia.com/image/view/-/152828/data/1/-/Filter-Image-basic.png" alt="All mobile phones" title="All mobile phones">
	</a>
</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	<img src="//i.nokia.com/image/view/-/152830/data/1/-/Filter-Image-smart.png" alt="Smartphones" title="Smartphones">
	</li></ul>
    <h2><span>Input type</span></h2>
    	<ul class="nk-filter-checkbox">
			<li><a href="?action=catalogsearch&amp;ps=smartphone&amp;ittouchscreen=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Touch screen</span>
	</a>
</li><li class=""><a href="?action=catalogsearch&amp;ps=smartphone&amp;itkeyboard=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Keyboard</span>
	</a>
</li><li><a href="?action=catalogsearch&amp;ps=smartphone&amp;ittouch_and_type=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Touch and Type</span>
	</a>
</li></ul>
    <h2><span>Features</span></h2>
    	<ul class="nk-filter-checkbox">
			<li><a href="?action=catalogsearch&amp;ps=smartphone&amp;featuresgps_navigation=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>GPS Navigation</span>
	</a>
</li><li><a href="?action=catalogsearch&amp;ps=smartphone&amp;featuresemail=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Email</span>
	</a>
</li><li><a href="?action=catalogsearch&amp;ps=smartphone&amp;featuresinternet_browser=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Internet browser</span>
	</a>
</li><li><a href="?action=catalogsearch&amp;ps=smartphone&amp;featuresnfc=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>NFC</span>
	</a>
</li></ul>
    <h2><span>Family</span></h2>
    	<ul class="nk-filter-checkbox">
			<li><a href="?action=catalogsearch&amp;ps=smartphone&amp;productfamilylumia=on#nk-main_menu_component" rel="nofollow"><span class="nk-icon"></span><span>Lumia</span>
	</a>
</li></ul>
    <div id="nk-reset-filters"><span></span><a href="?action=catalogsearch#nk-main_menu_component">Reset all filters</a></div></div>
    
    
<div class="new_products">

    <?php foreach($models as $n=>$model): ?>
    <!-- 
        <div class="new_prod_box <?php echo $n%2?'even':'odd';?>">
            <div class="prod_bg">
                <?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
            </div>
            <?php echo CHtml::link($model->title,array('product/show','id'=>$model->id)); ?>
        </div>
        
	-->

	<div class="content_main" style="height:100px;">
	<div style="height: 120px;">
	<div style="float:left;width:202px;height:120px;border:solid #CCCCCC 1px; text-align:center;">
	<div style="margin-left:0px;margin-top:2px;">
	
	<?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
    <!--
    <?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>product_img, 'style' => 'margin-right: 10px', 'align' => 'left')),$model->title); ?>
	-->
	</div>
	</div>
	<div style="font-weight: bolder; font-size:14px; float:left;margin-left:20px;"><span style="color: #d11113"><?php echo $model->title;?></span><br />
	<?php echo $model->summary;?><br>
    <?php if ($model->phone):?>
	<span style="color: #d11113; font-size: 14;">接待中心电话：<?php echo $model->phone;?></span>
    <?php endif;?>
	</div>
	<div class="clearline"></div>
	</div>
	
	</div>

    <?php endforeach; ?>

</div>
<div class="clear"></div>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>