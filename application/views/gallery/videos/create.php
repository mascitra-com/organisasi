<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><?=($action == 'store') ? 'Tambah' : 'Edit'?> Video</h3>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <span style="color: red">*</span> Harus di isi!
        <form action="<?= site_url('videos/' . $action) ?>" method="POST" enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>"><br>
            <?php if($action == 'store'):?>
                <input class="form-control" type="hidden" name="link" value="<?= isset($data->link) ? $data->id : '' ?>"><br>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-8">
                    <label for="">Nama</label> <span style="color: red">*</span>
                    <input class="form-control" type="text" name="name"
                           value="<?= isset($data->name) ? $data->name : '' ?>" required><br>
                </div>
            </div>
            <?php if($action == 'store'):?>
            <label>Pilih salah satu dari opsi di bawah ini :</label> <span style="color: red">*</span>
            <div style="margin-top: 1em">
                <div class="row">
                    <div class="col-md-2"><input type="radio" name="type" onclick="document.getElementById('files').disabled = false; document.getElementById('link').disabled = true;" <?= isset($data->link) ? '' : 'checked' ?> > <b>Upload File</b></div>
                    <div class="col-md-10">
                        <input type="file" name="files" id="files" accept="video/*" <?= isset($data->link) ? 'disabled' : '' ?>>
                    </div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-md-2"><input type="radio" name="type" onclick="document.getElementById('link').disabled = false; document.getElementById('files').disabled = true;" <?= isset($data->link) ? 'checked' : '' ?>> <b>Link</b></div>
                    <div class="col-md-6">
                        <input class="form-control" id="link" type="text" name="link" value="<?= isset($data->link) ? $data->link : '' ?>" <?= isset($data->link) ? '' : 'disabled' ?>>
                        <label>
                            <small>Hanya mendukung link dari Youtube.<br/> Contoh - https://www.youtube.com/watch?v=eX4mPl3_v1d30
                            </small>
                        </label>
                    </div>
                </div>
            </div>
            <?php endif; ?><br/>
            <label for="">Deskripsi</label>
            <textarea name="description" class="form-control tinymce"
                      rows="5"><?= isset($data->description) ? $data->description : '' ?></textarea><br>
            <a class="btn btn-default" href="<?=site_url('videos')?>">Kembali</a>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
