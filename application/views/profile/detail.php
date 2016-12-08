<div class="panel panel-success">
    <div class="panel-heading">
        <div class="h3 panel-title">Detail profil</div>
    </div>
    <div class="panel-body">
        <table class="table ">
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
        <a href="<?=site_url('profile')?>" class="btn btn-default">Kembali</a>
    </div>
</div>
