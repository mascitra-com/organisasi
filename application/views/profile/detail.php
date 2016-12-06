<table class="table">
    <tr>
        <th>Nama Profil</th>
        <td><?= $profile->name ?></td>
    </tr>
    <tr>
        <th>Judul Profil</th>
        <td><?= $profile->headline ?></td>
    </tr>
    <tr>
        <th>Isi Profil</th>
        <td><?= $profile->body ?></td>
    </tr>
</table>
<a href="<?=site_url('profile')?>">Kembali</a>
