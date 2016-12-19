<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Regulasi</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="form-group">
						<label for="">Judul</label>
						<input type="text" class="form-control" placeholder="judul regulasi">
					</div>
					<div class="form-group">
						<label for="">Isi Regulasi</label>
						<textarea class="form-control" placeholder="isi regulasi"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Dikeluarkan</label>
								<input type="date" class="form-control" placeholder="tanggal dikeluarkan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Dikeluarkan Oleh</label>
								<input type="text" class="form-control" placeholder="dikeluarkan oleh">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Upload dokumen</label>
						<input type="file">
					</div>
					<br>
					<div class="form-group">
						<button class="btn btn-default" type="submit">
							<i class="fa fa-save"></i>
							<span>Simpan</span>
						</button>
						<button class="btn btn-default" type="reset">
							<i class="fa fa-refresh"></i>
							<span>Batal</span>
						</button>
						<a class="btn btn-default" href="<?=site_url('regulation')?>">
							<i class="fa fa-arrow-left"></i>
							<span>Kembali</span>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>