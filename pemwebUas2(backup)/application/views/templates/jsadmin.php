<script src="<?= base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
<script src="<?= base_url('/assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('/assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php 
	foreach($crud['js_files'] as $file): ?>
        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>