<!-- mobile browser scaling -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">

<!-- Load BOOTSTRAP -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">

<!-- Load FONTAWESOME -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/font-awesome.min.css') ?>">

<!-- Load jQuery UI -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.css') ?>">

<!-- Load CUSTOM CSS -->
<?php if (isset($_view['css']) && !empty($_view['css'])): ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $_view['css'] . '.css') ?>">
<?php endif; ?>
<!-- Load CUSTOM CSS -->
<?php if ($_view['page'] == 'gallery/photos/add'): ?>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/dropzone/dropzone.css') ?>">
<?php endif; ?>