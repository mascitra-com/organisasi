<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Info Website</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="">Nama Website</label>
								<input type="text" class="form-control" placeholder="nama website">
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="">Akronim</label>
								<input type="text" class="form-control" placeholder="akronim website">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea class="form-control" placeholder="deskripsi website"></textarea>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea class="form-control" placeholder="alamat kantor"></textarea>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="">Telpon</label>
								<input type="text" class="form-control" placeholder="telpon">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="">Telpon (alternatif)</label>
								<input type="text" class="form-control" placeholder="telpon alternatif">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" class="form-control" placeholder="email">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="">Kode Pos</label>
								<input type="text" class="form-control" placeholder="kode pos">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Logo</label>
						<input type="file">
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