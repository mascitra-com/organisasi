<div class="row">
    <div class="col-md-12 table-responsive table-full-width">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Profil <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
                <a class="btn btn-default btn-sm pull-right" href="<?=site_url('profile/create')?>"><i class="fa fa-plus-square fa-fw"></i><span> Tambah Profil</span></a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td class="text text-center">No.</td>
                            <td width="15%">Nama</td>
                            <td width="20%">Judul</td>
                            <td>Isi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <form action="<?=site_url('profile/search')?>" method="POST">
                        <td>
                            <a href="<?=site_url('profile/refresh')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                        </td>
                        <td class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nama" value="<?= isset($search->name) ?$search->name : '' ?>">
                        </td>
                        <td class="form-group">
                            <input type="text" name="headline" class="form-control" placeholder="Judul" value="<?= isset($search->headline) ?$search->headline : '' ?>">
                        </td>
                        <td class="form-group">
                            <input type="text" name="body" class="form-control" placeholder="Isi" value="<?= isset($search->body) ?$search->body : '' ?>">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                        </td>
                        </form>
                    </tr>
                        <?php if(is_array($profiles)){ $no=1; foreach ($profiles as $profile): ?>
                            <tr>
                                <td class="text text-center"><?=$no++?></td>
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
                <?php $this->load->view('template/dashboard/pagination'); ?>
            </div>
        </div>
    </div>
</div>