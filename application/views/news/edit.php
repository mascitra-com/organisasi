<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Berita</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('news/update/'.$article->id)?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Judul</label>
						<input type="text" class="form-control" name="name" placeholder="Judul berita" value="<?=$article->name?>" required minlength="3" maxlength="100">
					</div>

					<!-- <div class="form-group">
						<label for="published_at">Tanggal Publish</label>
						<input type="date" class="form-control" name="published_at" placeholder="Tanggal Publish" id="published_at" required>
					</div> -->

					<input type="date" name="published_at" value="<?=($article->published_at)?>" min="<?=date('Y-m-d');?>">

					<div class="form-group">
						<label for="">Gambar Thumbnail</label>
						<input type="file" name="img" accept="image/*">
					</div>
					<div class="form-group">
						<label for="">Isi Berita</label>
						<textarea name="body" class="form-control tinymce" rows="10"><?=$article->body?></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit"><i class="fa fa-paper-plane"></i><span> Publish</span></button>
						<button class="btn btn-default" type="submit" name="type" value="draft"><i class="fa fa-save"></i><span> Simpan ke draft</span></button>
						<button class="btn btn-default"><i class="fa fa-refresh"></i><span> Batal</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>