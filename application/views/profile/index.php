<div class="row">
    <div class="col-md-12 table-responsive table-full-width">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Profil</h3>
                <a class="btn btn-default btn-sm pull-right" href="<?=site_url('profile/create')?>"><i class="fa fa-plus-square fa-fw"></i><span> Tambah Profil</span></a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td width="15%">Nama</td>
                            <td width="20%">Judul</td>
                            <td>Isi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($profiles)){ $no=1; foreach ($profiles as $profile): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$profile->name?></td>
                                <td><?=$profile->headline?></td>
                                <td><?= (strlen($profile->body) > 200) ? substr($profile->body, 0, 200).'...' :  $profile->body?></td>
                                <td class="text-nowrap">
                                    <a class="btn btn-xs btn-default" href="<?=site_url('profile/show?id='.$profile->id)?>"><i class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-xs btn-success" href="<?=site_url('profile/edit?id='.$profile->id)?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-xs btn-danger" href="<?=site_url('profile/destroy?id='.$profile->id)?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; } else { echo "<td colspan='5'>$profiles<td>"; } ?>
                    </tbody>
                </table>
                <?php if (!empty($pagination)): ?>
                    <div class="row">
                        <div class="text-center col-md-10">
                            <?= $pagination ?>
                        </div>
                        <div class="col-md-2">
                            <label>Foto Per Halaman</label>
                            <select name="page" id="page" class="form-control">
                                <option value="10" <?= ($per_page == 10) ? 'selected' : '' ?>>10</option>
                                <option value="25" <?= ($per_page == 25) ? 'selected' : '' ?>>25</option>
                                <option value="50" <?= ($per_page == 50) ? 'selected' : '' ?>>50</option>
                                <option value="75" <?= ($per_page == 75) ? 'selected' : '' ?>>75</option>
                                <option value="100" <?= ($per_page == 100) ? 'selected' : '' ?>>100</option>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>