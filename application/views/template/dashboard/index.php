<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=(isset($_view['title']))?$_view['title']:'Organisasi'?></title>
	<?php $this->load->view('template/_main/styles') ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/template-dashboard.css')?>">
	<script type="text/javascript">var title;</script>
</head>
<body>
	<?php $this->load->view('template/_main/message'); ?>
	<div class="container-fluid display-table">
		<div class="row display-table-row">
			<!-- LOAD SIDEBAR -->
			<?php $this->load->view('template/dashboard/sidebar'); ?>			
			<!-- MAIN CONTENT -->
			<div class="col-sm-11 col-md-10 display-table-cell top">
				<!-- LOAD NAVBAR -->
				<?php $this->load->view('template/dashboard/navbar'); ?>
				<div id="content">
					<!-- BREADCRUMP -->
					<?php $this->load->view('template/dashboard/breadcrump') ?>
					<!-- LOAD PAGE -->
					<?php 
					if(isset($_view['page']) && !empty($_view['page'])):
						$this->load->view($_view['page']);
					endif;
					?>
				</div>
				<!-- LOAD FOOTER -->
				<?php $this->load->view('template/dashboard/footer') ?>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('template/_main/javascript') ?>
<script src="<?=base_url('assets/js/template-dashboard.js')?>"></script>
</html>