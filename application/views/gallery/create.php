<form action="<?= site_url('gallery/store') ?>" method="POST" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="type_id" value="<?= $type ?>"><br>
    <label for="">Nama</label>
    <input class="form-control" type="text" name="name"><br>
    <label for="">
        Link &nbsp;
        <?php if ($type == 2): ?>
            <small>( Pada link Youtube : https://www.youtube.com/watch?v=Ex4mPl4L1nk - hanya inputkan kode Ex4mPl4L1nk saja pada kolom dibawah ini )</small>
        <?php endif; ?>
    </label>
    <input class="form-control" type="text" name="link">
    <input type="file" name="files"><br>
    <label for="">Deskripsi</label>
    <textarea name="description" class="form-control"></textarea><br>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>