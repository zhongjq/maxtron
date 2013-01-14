<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl.'/css/slAjaxTabs.css'); ?>
<div id="tabsB">
<ul>
<?php foreach($tabs as $i=>$tab){
	echo '<li><a id="tabB'.($i+1).'" href="#"><span>'.$tab['title'].'</span></a></li>';
} ?>
</ul>
</div>
<div id="preloader">
<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/loading.gif') ?>载入数据...</div>
<div id="tabcontent"></div>
<script type="text/javascript">
var pageUrl = new Array();	
<?php foreach($tabs as $i=>$tab){		
echo 'pageUrl['.($i+1).'] ="'.$tab['url'].'";' ;		
} ?>
function loadTab(id){
	if (pageUrl[id].length > 0){ 
		$("#preloader").show();
		$.ajax({
			url: pageUrl[id], 
			cache: false,
			success: function(message){			            	
				$("#tabcontent").empty().append(message);
				$("#preloader").hide();             
			}
		});			        
	}
}
$(document).ready(function(){
	$("#preloader").hide(); 
<?php foreach($tabs as $i=>$tab){	
	echo '$("#tabB'.($i+1).'").click(function(){';
	echo '$(".selected").removeClass("selected");';
	echo '$("#tabB'.($i+1).'").toggleClass("selected");';
	echo 'loadTab('.($i+1).');';
	echo '});';	
} 
	if(count($tabs)>0){
		echo '$("#tabB1").click();';
	}
?>
});
</script>
