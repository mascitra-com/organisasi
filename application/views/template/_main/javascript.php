<!-- Load JQUERY -->
<script src="<?=base_url('assets/plugins/jquery/jquery-3.1.1.min.js')?>"></script>

<!-- Load BOOTSRAP -->
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>

<!-- Load CUSTOM JAVASCRIPT -->
<?php if(isset($_view['js']) && !empty($_view['js'])): ?>
<link rel="stylesheet" href="<?=base_url('assets/js/'.$_view['js'].'.js')?>">
<?php endif; ?>