
<div id="nk-content-wrp" class="nk-homepage-wrapper">
	<div title="ncsearch-content-start" class="hide-dn"></div>
	<div id="nk-product-fullwidth-carousel" class="nk-fullwidth-carousel-container">
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

	<div class="nk-js-carousel-pagination-position">
		<ul id="nk-hero-pagination" class="nk-product-detail-carousel-flexible-pagination">
			<li><div id="nk-carousel-tooltip-1" class="nk-carousel-tooltip-container"><div class="nk-carousel-tooltip"></div></div><a href="#"><img src="//r.nokia.com/s/8/assets/images/nokia/blank.gif" width="16" height="16" alt=""/></a></li>
			</ul>
	</div>

<div id="nk-fullwidth-carousel-arrow-left" class="nk-squircle-arrow nk-squircle-arrow-pos-left ">
		        <div class="nk-squircle-arrow-point nk-squircle-arrow-left">
		        	</div>        
		        <div class="nk-squircle-arrow-base nk-squircle-arrow-base-left"></div>
		    </div>    
		<div id="nk-fullwidth-carousel-arrow-right" class="nk-squircle-arrow nk-squircle-arrow-pos-right ">
		    	<div class="nk-squircle-arrow-point nk-squircle-arrow-right">
					        </div>
			    		<div class="nk-squircle-arrow-base nk-squircle-arrow-base-right"></div>
					</div>
		<script>
		    // Create instance of arrows UI
		    var nkArrows = new nk.ui.c0089();
			nkArrows.init("#nk-fullwidth-carousel-arrow-left", "#nk-fullwidth-carousel-arrow-right", "nk-squircle-arrow", true, "", "", true, false);
		</script>
	</div>


<script>

// Autoplay is ON, but will only activiate if there is an auto play and the user click on it.
var carousel = new nk.ui.m005();

carousel.init("nk-hero",1,"nk-fullwidth-carousel-arrow-left","nk-fullwidth-carousel-arrow-right", true, true, "", "", "", 8, nkArrows); 
carousel.autoPlay("nk-hero");
carousel.alignPagination(".nk-js-carousel-pagination-position", 960);

var carouselObj = $("#nk-hero").data('jcarousel');

	$('#nk-autoplay').bind('click', function(){		
		carouselObj.next();
		carouselObj.startAuto(carouselObj.options.scrollSec);
	});


/* If you have absolute position or negative margin on your elements, remember to add HALF of its height to make it perfectly center.
 * HERO CAROUSEL:
 * cta button - height 25px absolute position,
 * If your page have no subnav and carousel go half way up behind the main nav, there is negative margin 20px on parent element,
 * so 5px height is missing.
 * half that so 3px for the hidden space.
 */


	alignContainerVertically (".nk-verticalheight", ".nk-fullwidth-carousel-prod-description", 3);
</script>
<div class="nk-clear-both"></div>
<div class="nk-col-lc nk-all-border">
	<div class="nk-drop-shadow nk-below-carousel" id="nk-lower-promo-teasers">
<?php foreach ($digest as $m):?>
<div id="nk-prombox2075080" class="nk-teaser nk-link-div" style="background-image: url('<?=$m->icon?>');">
	<h2><?=$m->title;?></h2>
	<div class="nk-teaser-subheading"><?=$m->summary;?></div>
	<a href="#" data-intc="na-fw-ilc-na-nokia_promo_home_2050_buy-na-home-cn-zh-2075080">
<div id="nk-prombox2075080-arrow" class="nk-support-arrow nk-support-arrow-pos-right nk-arrow-blue">
    	<div class="nk-support-arrow-point nk-support-arrow-right">
			        </div>
	    		<div class="nk-support-arrow-mid nk-right">
		        		<span id="nk-prombox2075080-arrow-text">Read More</span>
					</div>
				<div class="nk-support-arrow-base nk-support-arrow-base-right"></div>
			</div>
</a>
<script>
    // Create instance of arrows UI
    var nkArrows = new nk.ui.c0089();
	nkArrows.init("", "#nk-prombox2075080-arrow", "nk-support-arrow", true, "", "#nk-prombox2075080", false, false);
</script></div>
<?php endforeach;?>
</div>
<div class='nk-clear-both'></div>
<script>
	nk.ui.c0138.init();
</script><div class="nk-clear-both"></div>
</div>

<div title="ncsearch-content-end" class="hide-dn"></div>
	</div>