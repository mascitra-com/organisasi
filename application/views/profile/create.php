<form action="<?=site_url('profile/store')?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Profil</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>
    <div class="form-group">
        <label for="headline">Judul Profil</label>
        <input type="text" class="form-control" id="headline" name="headline" placeholder="">
    </div>
    <div class="form-group">
        <label for="body">Isi Profil</label>
        <textarea class="form-control" id="body" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>