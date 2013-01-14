<?php include('_top.php');?>
<style type="text/css">
img {
    padding:5px;
    margin:5px;
    border:1px solid #d5d5d5;
}

div.thumb {
    float:left;
}

div.caption {
	text-align:center;
    font-size:10px;
}
</style>

<input type="button" id="browseServer1" value="添加报广折页" style="display:none" />
<input type="button" id="browseServer2" value="添加效果图"/>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>

<script type="text/javascript">
$(document).ready(function(){
    $("#browseServer1").bind("click", function(){
        var finder = new CKFinder('/ckfinder/');
        finder.selectActionFunction = addPaper;
        finder.DisableThumbnailSelection = true;
        finder.popup();
    });
    $("#browseServer2").bind("click", function(){
        var finder = new CKFinder('/ckfinder/');
        finder.selectActionFunction = addImage;
        finder.DisableThumbnailSelection = true;
        finder.popup();
    });
});
function addPaper(fileUrl, data){
	var sFileName = this.getSelectedFile().name,
	thumbUrl = this.getSelectedFile().getThumbnailUrl();
	$.post('addImage', {'filename': fileUrl, 'thumb': thumbUrl, 'type':1, 'product_id':<?php echo $model->id?>}, function(json){
		$('#newspapers').append($('<div class="thumb">' +
	        '<img src="' + thumbUrl + '" />' +
	        '<div class="caption">' +
                '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a>' +
	        '</div>' +
	    '</div>'));
	}, 'json');
}

function addImage(fileUrl, data){
	var sFileName = this.getSelectedFile().name;
	thumbUrl = this.getSelectedFile().getThumbnailUrl();
	$.post('addImage', {'filename': fileUrl, 'thumb': thumbUrl, 'type':2, 'product_id':<?php echo $model->id?>}, function(json){
		$('#images').append($('<div class="thumb">' +
	        '<img src="' + thumbUrl + '" />' +
	        '<div class="caption">' +
                '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a>' +
	        '</div>' +
	    '</div>'));
	}, 'json');
}
</script>
<tr style="display:none">
    <th class="label" style="vertical-align: middle;">报广折页</th>
    <td id="newspapers">
    <?php foreach ($model->newspapers as $newpager):?>
		<div class="thumb">
            <img src="<?php echo $newpager->thumb?>" width="180" height="120"/>
            <div class="caption">
            	<a href="<?php echo $newpager->filename?>" target="_blank"><?php echo pathinfo($newpager->filename, PATHINFO_BASENAME)?></a>
            	<?php echo CHtml::link('删除',"#", array("submit"=>'',
            	'params'=>array('command'=>'delImage','id'=>$newpager->id),
            	'confirm' => '确定要删除? #'.pathinfo($newpager->filename, PATHINFO_BASENAME))); ?>
            </div>
    	</div>
    <?php endforeach;?>
    </td>
</tr>

<tr>
    <th class="label" style="vertical-align: middle;">效果图</th>
    <td id="images">
    <?php foreach ($model->images as $image):?>
		<div class="thumb">
            <img src="<?php echo $image->thumb?>" width="180" height="120"/>
            <div class="caption">
            	<a href="<?php echo $image->filename?>" target="_blank"><?php echo pathinfo($image->filename, PATHINFO_BASENAME)?></a>
            	<?php echo CHtml::link('删除',"#", array("submit"=>'',
            	'params'=>array('command'=>'delImage','id'=>$image->id),
            	'confirm' => '确定要删除? #'.pathinfo($image->filename, PATHINFO_BASENAME))); ?>
            </div>
    	</div>
    <?php endforeach;?>
    </td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('icon')); ?></th>
    <td><?php echo CHtml::link(CHtml::image($model->icon,$model->icon,array('class'=>'product_img_small')),$model->icon); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('cate_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->cate->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('summary')); ?>
</th>
    <td><?php echo CHtml::encode($model->summary); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>
</th>
    <td><?php echo CHtml::encode($model->phone); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
</th>
    <td><?php echo $model->content; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->createtime)); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('updatetime')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->updatetime)); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('top')); ?>
</th>
    <td><?php echo CHtml::encode($model->top); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('digest')); ?>
</th>
    <td><?php echo CHtml::encode($model->digest); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('state')); ?>
</th>
    <td><?php echo CHtml::encode($model->state); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('sort')); ?>
</th>
    <td><?php echo CHtml::encode($model->sort); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('date')); ?>
</th>
    <td><?php echo CHtml::encode($model->date); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('hit')); ?></th>
    <td><?php echo CHtml::encode($model->hit); ?></td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('issue_message')); ?></th>
    <td><?php echo CHtml::encode(nl2br($model->issue_message)); ?></td>
</tr>
</table>
