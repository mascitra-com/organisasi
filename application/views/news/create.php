<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Tulis Berita</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="form-group">
						<label for="">Judul</label>
						<input type="text" class="form-control" name="title" placeholder="Judul berita" required>
					</div>
					<div class="form-group">
						<label for="">Tanggal Publish</label>
						<input type="date" class="form-control" name="date_published" placeholder="Tanggal Publish" required>
					</div>
					<div class="form-group">
						<label for="">Gambar Thumbnail</label>
						<input type="file" name="gambar">
					</div>
					<div class="form-group">
						<label for="">Isi Berita</label>
						<textarea name="content" class="form-control tinymce" rows="10"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-default"><i class="fa fa-paper-plane"></i><span> Publish</span></button>
						<button class="btn btn-default"><i class="fa fa-save"></i><span> Simpan ke draft</span></button>
						<button class="btn btn-default"><i class="fa fa-refresh"></i><span> Batal</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>