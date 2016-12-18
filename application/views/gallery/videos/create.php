<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Foto</h3>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <span style="color: red">*</span> Harus di isi! <span style="color: red">**</span> Pilih Salah Satu!
        <form action="<?= site_url('gallery/photos/' . $action) ?>" method="POST" enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="type_id" value="1"><br>
            <input class="form-control" type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>"><br>
            <label for="">Nama</label> <span style="color: red">*</span>
            <input class="form-control" type="text" name="name"
                   value="<?= isset($data->name) ? $data->name : '' ?>"><br>
            <label for="">
                Link <span style="color: red">**</span>
                <small>( Pada link Youtube : https://www.youtube.com/watch?v=Ex4mPl4L1nk - hanya inputkan kode
                    Ex4mPl4L1nk saja pada kolom dibawah ini )
                </small>
            </label>
            <input class="form-control" type="text" name="link"
                   value="<?= isset($data->link) ? $data->link : '' ?>"><br>
            <label for="">Upload File <span style="color: red">**</span>
                <small>( Jika di isi maka file ini yang akan digunakan. Bukan link di atas )</small>
            </label>
            <input type="file" name="files"><br>
            <label for="">Deskripsi</label>
            <textarea name="description" class="form-control tinymce"
                      rows="5"><?= isset($data->description) ? $data->description : '' ?></textarea><br>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
