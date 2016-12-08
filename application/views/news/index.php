<a href="<?=site_url('news/create')?>">Tambah Berita Baru</a>
<table class="table">
    <thead>
    <th>No.</th>
    <th>Nama Berita</th>
    <th>Isi Berita</th>
    <th>Aksi</th>
    </thead>
    <tbody>
    <?php if(!empty($newses)): $no=1; foreach ($newses as $news): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$news->name?></td>
            <td><?=$news->body?></td>
            <td><?=$news->news_date?></td>
            <td>
                <a href="<?=site_url('news/show/'.$news->id)?>">Detail</a>
                <a href="<?=site_url('news/edit/'.$news->id)?>">Edit</a>
                <a href="<?=site_url('news/destroy/'.$news->id)?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>