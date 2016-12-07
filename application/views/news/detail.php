<table class="table">
    <tr>
        <th>Nama Berita</th>
        <td><?= $news->name ?></td>
    </tr>
    <tr>
        <th>Isi berita</th>
        <td><?= $news->body ?></td>
    </tr>
    <tr>
        <th>Tanggal Terbit</th>
        <td><?= $news->created_at ?></td>
    </tr>
    <tr>
        <th>Penerbit</th>
        <td><?=$news->user->first_name .' '. $news->user->last_name?></td>
    </tr>
</table>
<a href="<?=site_url('news')?>" class="btn btn-default">Kembali</a>
