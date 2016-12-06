<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=(isset($_view['title']))?$_view['title']:'Organisasi'?></title>
	<?php $this->load->view('template/_main/styles') ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/template-dashboard.css')?>">
</head>
<body>
	<div class="container-fluid display-table">
		<div class="row display-table-row">
			<!-- LOAD SIDEBAR -->
			<?php $this->load->view('template/dashboard/sidebar'); ?>
			
			<!-- MAIN CONTENT -->
			<div class="col-md-10 display-table-cell top">
				<!-- LOAD NAVBAR -->
				<?php $this->load->view('template/dashboard/navbar'); ?>
				<!-- LOAD FOOTER -->
				<?php $this->load->view('template/dashboard/footer') ?>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('template/_main/javascript') ?>
</html>