<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=(isset($_view['title']))? $_view['title'] : 'Organisasi'?></title>
	<?php $this->load->view('template/_main/styles') ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/template-homepage.css')?>">
</head>
<body>

	<?php
		$this->load->view('template/homepage/navbar');
		
		if(isset($_view['page'])):
			$this->load->view($_view['page']);
		endif;

		$this->load->view('template/homepage/footer');
	?>

</body>
<?php $this->load->view('template/_main/javascript') ?>
</html>