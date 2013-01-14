<?php
function cut_sense($matne_harf, $l_harf ,$return=1) {
    if ( strlen($matne_harf) > $l_harf){
        $end='...';
    }else{
        $end='';
    }
    if ( function_exists('mb_strcut') ){
        $matne_harf = mb_strcut ( $matne_harf, 0 , $l_harf , "UTF-8" );
    }else{
        $matne_harf =substr($matne_harf, 0, $l_harf);
    }
$text=''.$matne_harf.''.$end.'';
    if ( $return == 1){
        return $text;
    }else{
        print $text;
    }
}

?>

<style type="text/css">
a{TEXT-DECORATION:none}
a:link {color: #0066cc;}
a:visited {color: #0066cc}
a:hover {color: #d00608;}
a:active{color:#0066CC}

</style>
<?php 
if ($models){
?>

<div style="padding:10px 10px 0 10px; line-height: 1.5em; clear: both;">
<?php echo CHtml::image($model->icon, $model->title, array('width' => 120, 'height' => 125, 'align' => 'left', 'style'=> 'float:left; padding:0 10px'));?>
    <div><?php echo CHtml::link(cut_sense(strip_tags($model->title), 65), array('show','id'=>$model->id), array('style' => ' font-weight: bolder;')); ?><br />
    <span><?php echo $model->datetime;?></span><br/><br/>
    <?php echo CHtml::link(cut_sense(strip_tags($model->content), 200), array('show','id'=>$model->id));?><br>
    <div style="text-align: right;"><?php echo CHtml::link(">>详细", array('show','id'=>$model->id), array('style' => 'color:red'));?><br><br></div></div>


<div class="new_products">
	<ul id="notice">
		<?php foreach($models as $n=>$model): ?>
			<li class="post" id="post-<?php echo $model->id;?>">
				<?php echo CHtml::link( CHtml::label(date('Y-m-d',strtotime($model->datetime)),'',array('class'=>'notice_time')).cut_sense(strip_tags($model->title), 60),array('show','id'=>$model->id)); ?>
			</li>		
		<?php endforeach; ?>
	</ul>
	<div style="line-height:2em; text-align:right"><?php echo CHtml::link("点击查看更多{$model->cate->name}>>", array('/notice', 'cate_id' => $model->cate_id));?></div>
</div>

</div>
<?php }?>