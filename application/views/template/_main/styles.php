<!-- Load BOOTSTRAP -->
<link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>">

<!-- Load FONTAWESOME -->
<link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome/css/font-awesome.min.css')?>">

<!-- Load CUSTOM CSS -->
<?php if(isset($_view['css']) && !empty($_view['css'])): ?>
<link rel="stylesheet" href="<?=base_url('assets/css/'.$_view['css'].'.css')?>">
<?php endif; ?>