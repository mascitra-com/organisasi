<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Grup Baru</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('auth/create_group')?>" method="POST">
					<div id="infoMessage"><?php echo $message;?></div>
					<div class="form-group">
						<label for="">Nama Grup</label>
						<?php echo form_input($group_name);?>
					</div>

					<div class="form-group">
						<label for="">Deskripsi Grup</label>
						<?php echo form_input($description);?>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit">Simpan</button>
						<button class="btn btn-default" type="reset">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>