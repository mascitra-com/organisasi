<form action="<?= site_url('profile/store') ?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Profil</label>
        <?php echo form_error('name'); ?>
        <input type="text" class="form-control" id="name" name="name" value="<?= (isset($profile['name'])) ? $profile['name'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="headline">Judul Profil</label>
        <?php echo form_error('headline'); ?>
        <input type="text" class="form-control" id="headline" name="headline" value="<?= (isset($profile['headline'])) ? $profile['headline'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Profil</label>
        <?php echo form_error('body'); ?>
        <textarea class="form-control" id="body" name="body"><?= (isset($profile['headline'])) ? $profile['headline'] : ''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>