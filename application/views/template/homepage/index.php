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

	<?php if ($_view['page'] == 'homepage/gallery-album'): ?>
		<div class="modal fade" tabindex="-1" role="dialog" id="img-preview">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">preview</h4>
					</div>
					<div class="modal-body">
						<img id="img-besar" src="<?=base_url('assets/img/default-2.png')?>" alt="img" width="100%">
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php endif ?>

</body>
<?php $this->load->view('template/_main/javascript') ?>
<script src="<?=base_url('assets/js/template-homepage.js')?>"></script>
</html>