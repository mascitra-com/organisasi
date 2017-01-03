<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Info Website</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('setting/info_update')?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="website_name">Nama Website</label>
								<?php echo form_error('website_name'); ?>
								<input type="text" class="form-control" name="website_name" placeholder="nama website" value="<?= (isset($info['website_name'])) ? $info['website_name'] : ''; ?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="acronym">Akronim</label>
								<?php echo form_error('acronym'); ?>
								<input type="text" class="form-control" name="acronym" placeholder="akronim website" value="<?= (isset($info['acronym'])) ? $info['acronym'] : ''; ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="description">Deskripsi</label>
						<?php echo form_error('description'); ?>
						<textarea class="form-control" name="description" placeholder="deskripsi website"><?= (isset($info['description'])) ? $info['description'] : ''; ?></textarea>
					</div>
					<div class="form-group">
						<label for="office_address">Alamat</label>
						<?php echo form_error('office_address'); ?>
						<textarea class="form-control" name="office_address" placeholder="alamat kantor"><?= (isset($info['office_address'])) ? $info['office_address'] : ''; ?></textarea>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="phone">Telpon</label>
								<?php echo form_error('phone'); ?>
								<input type="text" class="form-control" name="phone" placeholder="telpon" value="<?= (isset($info['phone'])) ? $info['phone'] : ''; ?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="phone_alt">Telpon (alternatif)</label>
								<?php echo form_error('phone_alt'); ?>
								<input type="text" class="form-control" name="phone_alt" placeholder="telpon alternatif" value="<?= (isset($info['phone_alt'])) ? $info['phone_alt'] : ''; ?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="email">Email</label>
								<?php echo form_error('email'); ?>
								<input type="text" class="form-control" name="email" placeholder="email" value="<?= (isset($info['email'])) ? $info['email'] : ''; ?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="postal_code">Kode Pos</label>
								<?php echo form_error('postal_code'); ?>
								<input type="text" class="form-control" name="postal_code" placeholder="kode pos" value="<?= (isset($info['postal_code'])) ? $info['postal_code'] : ''; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="website_name">Facebook</label>
								<?php echo form_error('facebook'); ?>
								<input type="text" class="form-control" name="facebook" placeholder="nama username facebook" value="<?= (isset($info['facebook'])) ? $info['facebook'] : ''; ?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="acronym">Twitter</label>
								<?php echo form_error('twitter'); ?>
								<input type="text" class="form-control" name="twitter" placeholder="nama username twitter" value="<?= (isset($info['twitter'])) ? $info['twitter'] : ''; ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="logo_link">Logo</label>
						<input type="file" name="logo_link" accept="image/*">
					</div>
					<br>
					<div class="form-group">
						<button class="btn btn-default" type="submit">
							<i class="fa fa-save"></i>
							<span>Simpan</span>
						</button>
						<a href="<?=site_url('setting/info')?>" class="btn btn-default">
							<i class="fa fa-refresh"></i>
							<span>Segarkan</span>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>