<form action="<?=site_url('profile/update')?>" method="POST">
    <input type="text" value="<?= $profile->id ?>" name="id" hidden>
    <div class="form-group">
        <label for="name">Nama Profil</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $profile->name ?>">
    </div>
    <div class="form-group">
        <label for="headline">Judul Profil</label>
        <input type="text" class="form-control" id="headline" name="headline" value="<?= $profile->headline ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Profil</label>
        <textarea class="form-control" id="body" name="body"><?= $profile->body ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>