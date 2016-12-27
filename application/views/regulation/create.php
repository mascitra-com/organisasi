<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Regulasi</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('regulation/'.$action)?>" method="POST" enctype="multipart/form-data">
                    <input name="id" type="text" value="<?=isset($regulation['id']) ? $regulation['id'] : ''?>" hidden>
					<div class="form-group">
						<label for="">Judul</label>
						<input name="name" type="text" class="form-control" placeholder="judul regulasi" value="<?=isset($regulation['name']) ? $regulation['name'] : ''?>">
					</div>
					<div class="form-group">
						<label for="">Isi Regulasi</label>
						<textarea name="body" class="form-control" placeholder="isi regulasi"><?=isset($regulation['body']) ? $regulation['body'] : ''?></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Dikeluarkan</label>
								<input name="issued_at" type="date" class="form-control" placeholder="tanggal dikeluarkan" value="<?=isset($regulation['issued_at']) ? $regulation['issued_at'] : ''?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Dikeluarkan Oleh</label>
								<input name="issued_by" type="text" class="form-control" placeholder="dikeluarkan oleh" value="<?=isset($regulation['issued_by']) ? $regulation['issued_by'] : ''?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Upload dokumen</label>
						<input name="file" type="file">
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