<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Tulis Berita</h3>
			</div>
			<div class="panel-body">
				<form action="<?=site_url('news/store')?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Judul</label>
						<?php echo form_error('name'); ?>
						<input id="title-name" type="text" class="form-control" name="name" placeholder="Judul berita" value="<?= (isset($article['name'])) ? $article['name'] : ''; ?>" required minlength="3" maxlength="100">
						<span id="title-msg"></span>
					</div>

					<!-- <div class="form-group">
						<label for="published_at">Tanggal Publish</label>
						<input type="date" class="form-control" name="published_at" placeholder="Tanggal Publish" id="published_at" required>
					</div> -->

					<div class="form-group">
						<label for="published_at">Tanggal Publish</label>
						<input type="date" name="published_at" value="<?= (isset($article['published_at'])) ? $article['published_at'] : ''; ?>" min="<?=date('Y-m-d');?>">
					</div>

					<div class="form-group">
						<label for="img">Gambar Thumbnail</label>
						<input type="file" name="img" accept="image/*" value="<?= (isset($article['img'])) ? $article['img'] : ''; ?>">
					</div>
					<div class="form-group">
						<label for="body">Isi Berita</label>
						<textarea name="body" class="form-control tinymce" rows="10"><?= (isset($article['body'])) ? $article['body'] : ''; ?></textarea>
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
