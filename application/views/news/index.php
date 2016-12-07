<a href="<?=site_url('news/create')?>">Tambah Berita Baru</a>
<table class="table">
    <thead>
    <th>No.</th>
    <th>Nama Berita</th>
    <th>Isi Berita</th>
    <th>Tanggal Terbit</th>
    <th>Penerbit</th>
    <th>Aksi</th>
    </thead>
    <tbody>
    <?php if(!empty($news)): $no=1; foreach ($news as $new): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$new->name?></td>
            <td><?=$new->body?></td>
            <td><?=$new->created_at?></td>
            <td><?=$new->user->first_name .' '. $new->user->last_name?></td>
            <td>
                <a href="<?=site_url('news/show/'.$new->id)?>">Detail</a>
                <a href="<?=site_url('news/edit/'.$new->id)?>">Edit</a>
                <a href="<?=site_url('news/destroy/'.$new->id)?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>