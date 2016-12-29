<div class="row">
    <div class="col-md-12 table-responsive table-full-width">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Profil <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
                <a class="btn btn-default btn-sm pull-right" href="<?=site_url('profile/create')?>"><i class="fa fa-plus-square fa-fw"></i><span> Tambah Profil</span></a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <form action="<?=site_url('profile/search')?>" method="POST">
                                <td class="text-center">
                                    <a href="<?=site_url('profile/refresh')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                                </td>
                                <td class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama" value="<?= isset($search->name) ?$search->name : '' ?>">
                                </td>
                                <td class="form-group">
                                    <input type="text" name="headline" class="form-control" placeholder="Judul" value="<?= isset($search->headline) ?$search->headline : '' ?>">
                                </td>
                                <td class="form-group text-center" colspan="2">
                                    <input type="text" name="body" class="form-control" placeholder="Isi" value="<?= isset($search->body) ?$search->body : '' ?>">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> Search</button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <th class="text-center"><i class="fa fa-hashtag"></i></th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th class="text-center">Urutan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="POST" action="<?=site_url('profile/update_pos')?>">
                            <?php if(is_array($profiles)){ $no=1; foreach ($profiles as $profile): ?>
                                <tr>
                                    <td class="text-center"><?=$no++?></td>
                                    <td><?=$profile->name?></td>
                                    <td><?=(strlen($profile->headline) > 100) ? substr($profile->headline, 0, 100).'...' :  $profile->headline?></td>
                                    <td><?= (strlen($profile->body) > 100) ? substr(strip_tags($profile->body), 0, 100).'...' :  $profile->body ?></td>
                                    <td class="text-center">
                                    <button class="btn btn-default" name="pos" value="<?=$profile->id.':'.'0'.':'.$profile->pos?>" <?=($profile->pos == 0) ? '' : '' ?>><i class="fa fa-arrow-up"></i></button>
                                        <button class="btn btn-default" name="pos" value="<?=$profile->id.':'.'1'.':'.$profile->pos?>"><i class="fa fa-arrow-down"></i></button>
                                    </td>
                                    <td class="text-nowrap text-center">
                                        <a class="btn btn btn-default" href="<?=site_url('profile/show/'.$profile->slug)?>"><i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn btn-success" href="<?=site_url('profile/edit/'.$profile->slug)?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn btn-danger" href="<?=site_url('profile/destroy/'.$profile->slug)?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; } else { echo "<td colspan='5'>$profiles<td>"; } ?>
                        </form>
                    </tbody>
                </table>
                <?php $this->load->view('template/dashboard/pagination'); ?>
            </div>
        </div>
    </div>
</div>