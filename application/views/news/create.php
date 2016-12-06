<form action="<?=site_url('news/store')?>" method="POST">
    <div class="form-group">
        <label for="name">Nama Berita</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>
    <div class="form-group">
        <label for="body">Isi Berita</label>
        <textarea class="form-control" id="body" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>