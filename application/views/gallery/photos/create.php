<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><?= ($action == 'store') ? 'Tambah' : 'Edit' ?> Galeri Foto</h3>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <span style="color: red">*</span> Harus di isi! <span style="color: red">**</span> Pilih Salah Satu!
        <form action="<?= site_url('photos/' . $action) ?>" method="POST" enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>"><br>
            <label for="">Nama</label> <span style="color: red">*</span>
            <input class="form-control" type="text" name="name"
                   value="<?= isset($data->name) ? $data->name : '' ?>"><br>
            <label for="">Deskripsi</label>
            <textarea name="description" class="form-control tinymce"
                      rows="5"><?= isset($data->description) ? $data->description : '' ?></textarea><br>
            <a href="<?= site_url('photos') ?>" class="btn btn-default" type="submit">Kembali</a>
            <button class="btn btn-success" type="submit">Simpan</button>
        </form>
    </div>
</div>