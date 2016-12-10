<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Grup</h3>
			</div>
			<div class="panel-body">
				<div id="infoMessage"><?php echo $message;?></div>
				<form action="<?=current_url()?>" method="post">
					<div class="form-group">
						<label for="">Nama Grup</label>
						<?php echo form_input($group_name);?>
					</div>
					<div class="form-group">
						<label for="">Deskripsi Grup</label>
						<?php echo form_input($group_description);?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Simpan</button>
						<button type="reset" class="btn btn-default">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>