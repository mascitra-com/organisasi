<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Foto</h3>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <span style="color: red">*</span> Harus di isi!
        <form action="<?= site_url('videos/' . $action) ?>" method="POST" enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>"><br>
            <label for="">Nama</label> <span style="color: red">*</span>
            <input class="form-control" type="text" name="name"
                   value="<?= isset($data->name) ? $data->name : '' ?>"><br>
            <label>Pilih salah satu dari opsi di bawah ini :</label> <span style="color: red">*</span>
            <div style="margin-top: 1em">
                <div class="row">
                    <div class="col-md-2"><input type="radio" name="type" onclick="document.getElementById('files').disabled = false; document.getElementById('link').disabled = true;" checked> <b>Upload File</b></div>
                    <div class="col-md-10">
                        <input type="file" name="files" id="files">
                    </div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-md-2"><input type="radio" name="type" onclick="document.getElementById('link').disabled = false; document.getElementById('files').disabled = true;"> <b>Youtube Link</b></div>
                    <div class="col-md-10">
                        <input class="form-control" id="link" type="text" name="link" value="<?= isset($data->link) ? $data->link : '' ?>" disabled>
                        <label>
                            <small>( Pada link Youtube : https://www.youtube.com/watch?v=Ex4mPl4L1nk - hanya inputkan kode Ex4mPl4L1nk saja pada kolom dibawah ini )
                            </small>
                        </label>
                    </div>
                </div>
            </div><br/>
            <label for="">Deskripsi</label>
            <textarea name="description" class="form-control tinymce"
                      rows="5"><?= isset($data->description) ? $data->description : '' ?></textarea><br>
            <a class="btn btn-default" href="<?=site_url('videos')?>">Kembali</a>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
