<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$_view['title']?></title>
	<!-- Load style/css -->
	<?php $this->load->view('template/_main/styles') ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/template-auth.css')?>">
</head>
<body>
	<!-- Load message -->
	<?php $this->load->view('template/_main/message') ?>

	<div class="container-fluid">
	<?php 
		if(isset($_view['page']) && !empty($_view['page'])):
			$this->load->view($_view['page']);
		endif; 
	?>
	</div>
</body>
<!-- Load javascript -->
<?php $this->load->view('template/_main/javascript') ?>
</html>