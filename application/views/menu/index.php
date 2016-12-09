<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Menu</h3>
                <a class="btn btn-default btn-sm pull-right" href="<?=site_url('menu/create')?>"><i class="fa fa-plus-circle"></i> Menu Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Link</td>
                            <td>Deskripsi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($menus)): $no=1; foreach ($menus as $menu): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$menu->nama_menu?></td>
                                <td><?=$menu->link?></td>
                                <td><?=$menu->deskripsi_menu?></td>
                                <td class="text-nowrap">
                                    <a class="btn btn-xs btn-default" href="<?=site_url('menu/edit/'.$menu->id)?>"><i class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-xs btn-danger" href="<?=site_url('menu/destroy/'.$menu->id)?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>