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

<div id="nk-pc-filters-container" class="prodcatalogue-filters">
	<h2 class="title"><span>SERIES</span></h2>
    	<ul>
			<li><a href="#" rel="nofollow"><span class="nk-icon"></span>Mgseries<span></span>
	</a>
</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li>
	<li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li><li class="nk-selected"><span class="nk-icon"></span><span>Smartphones</span>
	</li>
	</ul>
</div> 
    
<div class="new_products" style="float:left; width:740px; margin-left:20px">

    <?php foreach($models as $n=>$model): ?>
    <!-- 
        <div class="new_prod_box <?php echo $n%2?'even':'odd';?>">
            <div class="prod_bg">
                <?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small)),array('show','id'=>$model->id)); ?>
            </div>
            <?php echo CHtml::link($model->title,array('product/show','id'=>$model->id)); ?>
        </div>
        
	-->

	<div class="content_main" style="float:left; width:130px; text-align:center;">
	<div style="margin-left:0px;margin-top:30px; height:220px">
	
	<?php echo CHtml::link(CHtml::image($model->icon,$model->title,array('class'=>product_img_small, 'style' => 'width:120px')),array('show','id'=>$model->id)); ?>
	</div>
	<div style="font-weight: bolder; font-size:14px; float:left;margin-left:20px;"><span style="color: #d11113"><?php echo $model->title;?></span><br />
	<?php echo $model->summary;?><br>
    <?php if ($model->phone):?>
	<span style="color: #d11113; font-size: 14;">接待中心电话：<?php echo $model->phone;?></span>
    <?php endif;?>
	</div>
	</div>

    <?php endforeach; ?>

</div>
<div class="clear"></div>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>