<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=(isset($_view['title']))? $_view['title'] : 'Organisasi'?></title>
	<?php $this->load->view('template/_main/styles') ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/template-homepage.css')?>">
	<script type="text/javascript">
		var base_url = '<?=base_url()?>';
		var site_url = '<?=site_url()?>';
	</script>
</head>
<body>
	<?php $this->load->view('template/_main/message')?>
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