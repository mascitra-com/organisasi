<form action="<?=site_url('news/update')?>" method="POST">
    <input type="text" value="<?= $news->id ?>" name="id" hidden>
    <div class="form-group">
        <label for="name">Nama Berita</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $news->name ?>">
    </div>
    <div class="form-group">
        <label for="body">Isi Berita</label>
        <textarea class="form-control" id="body" name="body"><?= $news->body ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <a href="<?=site_url('news')?>" class="btn btn-default">Kembali</a>
</form>