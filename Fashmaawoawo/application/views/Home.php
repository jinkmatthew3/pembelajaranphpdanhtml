<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php 
	//foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php //echo $file; ?>" />
	<?php //endforeach; ?>
	
	<?php 
	//foreach($js_files as $file): ?>
        <script src="<?php //echo $file; ?>"></script>
    <?php //endforeach; ?>
</head>

<?php
//echo $output;
?>
 -->


<!DOCTYPE html>
<html>
<head>
	<?php 
	foreach($crud['css_files'] as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body>
	<!-- <?php// echo $header ?> -->
	<div class="row" style="margin-top: 100px;">
		<div class="col-md-12"><?php echo $crud['output']; ?></div>
	</div>

	<!-- <?php echo $footer; ?> -->
	<?php 
	foreach($crud['js_files'] as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html> 