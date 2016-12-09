<form action="<?=site_url('gallery/store')?>" method="POST" enctype="multipart/form-data">
	<input class="form-control" type="hidden" name="type_id" value="<?=$type?>"><br>
	<label for="">Nama</label>
	<input class="form-control" type="text" name="name"><br>
	<label for="">Link</label>
	<input class="form-control" type="text" name="link">
	<input type="file" name="files"><br>
	<label for="">Deskripsi</label>
	<textarea name="description" class="form-control"></textarea><br>
	<button class="btn btn-primary" type="submit">Simpan</button>
</form>