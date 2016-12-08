<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Tambah Profil</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="<?= site_url('profile/store') ?>" method="POST">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Profil</label>
                <div class="col-sm-10">
                    <?php echo form_error('name'); ?>
                    <input type="text" class="form-control" id="name" name="name" value="<?= (isset($profile['name'])) ? $profile['name'] : ''; ?>" placeholder="nama profil" required>
                </div>
            </div>
            <div class="form-group">
                <label for="headline" class="col-sm-2 control-label">Judul Profil</label>
                <div class="col-sm-10">
                    <?php echo form_error('headline'); ?>
                    <input type="text" class="form-control" id="headline" name="headline" value="<?= (isset($profile['headline'])) ? $profile['headline'] : ''; ?>" placeholder="judul profil" required>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-2 control-label">Isi Profil</label>
                <div class="col-sm-10">
                    <?php echo form_error('body'); ?>
                    <textarea class="form-control" id="body" name="body" placeholder="isi profil"><?= (isset($profile['headline'])) ? $profile['headline'] : ''; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>