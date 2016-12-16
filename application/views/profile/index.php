<div class="row">
    <div class="col-md-12 table-responsive table-full-width">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Profil</h3>
                <a class="btn btn-default pull-right" href="<?=site_url('profile/create')?>"><i class="fa fa-plus-square fa-fw"></i><span> data profil</span></a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Judul</td>
                            <td>Isi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($profiles)): $no=1; foreach ($profiles as $profile): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$profile->name?></td>
                                <td><?=$profile->headline?></td>
                                <td><?=$profile->body?></td>
                                <td class="text-nowrap">
                                    <a class="btn btn-xs btn-default" href="<?=site_url('profile/show/'.$profile->id)?>"><i class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-xs btn-success" href="<?=site_url('profile/edit/'.$profile->id)?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-xs btn-danger" href="<?=site_url('profile/destroy/'.$profile->id)?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>