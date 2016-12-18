<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Foto</h3>
        <a class="btn btn-default pull-right" href="<?= site_url('gallery/photos/create') ?>"><i
                    class="fa fa-plus-square fa-fw"></i> Tambah Galeri</a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <td>No.</td>
                <td>Nama Galeri</td>
                <td>Deskripsi Galeri</td>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($galleries)): $no = 1;
                foreach ($galleries as $gallery): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $gallery->name ?></td>
                        <td><?= $gallery->description ?></td>
                        <td class="text-nowrap">
                            <a href="<?= site_url('gallery/photos/show/' . $gallery->id) ?>" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                            <a href="<?= site_url('gallery/photos/edit/' . $gallery->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('gallery/photos/destroy/' . $gallery->id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>