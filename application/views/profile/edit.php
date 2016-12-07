<form action="<?=site_url('profile/update')?>" method="POST">
    <input type="text" name="id" value="<?=$profile->id?>" hidden>
    <div class="form-group">
        <label for="name">Nama Profil</label>
        <?php echo form_error('name'); ?>
        <input type="text" class="form-control" id="name" name="name" value="<?=$profile->name?>">
    </div>
    <div class="form-group">
        <label for="headline">Judul Profil</label>
        <?php echo form_error('headline'); ?>
        <input type="text" class="form-control" id="headline" name="headline" value="<?=$profile->headline?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Profil</label>
        <?php echo form_error('body'); ?>
        <textarea class="form-control" id="body" name="body"><?=$profile->body?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <a href="<?=site_url('profile')?>" class="btn btn-default">Kembali</a>
</form>