<?php header("Content-type: text/xml"); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'?>
<body>
	<?php foreach ($models as $model):?>
	<item>
        <title><?php echo $model->title; ?></title>
        <icon><?php echo $model->icon; ?></icon>
        <url><?php echo $model->url; ?></url>
    </item>
    <?php endforeach;?>
</body>
