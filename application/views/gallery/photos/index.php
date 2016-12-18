<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Foto</h3>
        <a class="btn btn-default pull-right" href="<?= site_url('photos/create') ?>"><i
                    class="fa fa-plus-square fa-fw"></i> Tambah Galeri</a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <td>No.</td>
                <td width="15%">Nama Galeri</td>
                <td>Deskripsi Galeri</td>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($galleries)){ $no = 1;
                foreach ($galleries as $gallery): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $gallery->name ?></td>
                        <td><?= (strlen($gallery->description) > 200) ? substr($gallery->description, 0, 200).'...' :  $gallery->description?></td>
                        <td class="text-nowrap">
                            <a href="<?= site_url('photos/show/' . $gallery->id) ?>" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                            <a href="<?= site_url('photos/edit/' . $gallery->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('photos/destroy/' . $gallery->id) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; } else { echo '<td colspan="4">Tidak ditemukan Galeri Foto<td>'; } ?>
            </tbody>
        </table>
    </div>
</div>