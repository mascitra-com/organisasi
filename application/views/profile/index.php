<a href="<?=site_url('profile/create')?>">Tambah Data Profil</a>
<table class="table">
    <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php if(!empty($profiles)): $no=1; foreach ($profiles as $profile): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$profile->name?></td>
            <td><?=$profile->headline?></td>
            <td><?=$profile->body?></td>
            <td>
                <a href="<?=site_url('profile/show/'.$profile->id)?>">Detail</a>
                <a href="<?=site_url('profile/edit/'.$profile->id)?>">Edit</a>
                <a href="<?=site_url('profile/destroy/'.$profile->id)?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>