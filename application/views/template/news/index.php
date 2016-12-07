<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= (isset($_view['title'])) ? $_view['title'] : 'Berita' ?></title>
    <?php $this->load->view('template/_main/styles') ?>
</head>
<body>
<?php if($message = $this->session->flashdata('message')): ?><div class="alert alert-<?=$message[1]?>" role="alert"><?=$message[0]?></div><?php endif; ?>
<?php
if (isset($_view['page'])):
    $this->load->view($_view['page']);
endif;
?>
</body>
<?php $this->load->view('template/_main/javascript') ?>
</html>