<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/dataTables.bootstrap.min.css'); ?>">

<?php 
	foreach($crud['css_files'] as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>