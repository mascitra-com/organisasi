<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Agenda</h3>
            </div>
            <div class="panel-body">
                <form action="<?=site_url('profile/update')?>" method="POST">
                    <input type="text" name="id" value="<?=$profile->id?>" hidden>
                    <div class="form-group">
                        <label for="name">Nama Profil</label>
                        <?php echo form_error('name'); ?>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$profile->name?>" required>
                    </div>
                    <div class="form-group">
                        <label for="headline">Judul Profil</label>
                        <?php echo form_error('headline'); ?>
                        <input type="text" class="form-control" id="headline" name="headline" value="<?=$profile->headline?>" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Isi Profil</label>
                        <?php echo form_error('body'); ?>
                        <textarea class="form-control" id="body" name="body"><?=$profile->body?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <a href="<?=site_url('profile')?>" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>