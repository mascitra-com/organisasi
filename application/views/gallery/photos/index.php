<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Foto <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
        <a class="btn btn-default pull-right" href="<?= site_url('photos/create') ?>"><i
                    class="fa fa-plus-square fa-fw"></i> Tambah Galeri</a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <form action="<?=site_url('photos/search')?>" method="POST">
                    <td class="text-center">
                        <a href="<?=site_url('photos/refresh')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                    </td>
                    <td width="25%" class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nama Galeri" value="<?= isset($search->name) ?$search->name : '' ?>">
                    </td>
                    <td width="60%" class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Deskripsi Galeri" value="<?= isset($search->description) ?$search->description : '' ?>">
                    </td>
                    <td width="10%">
                        <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> Search</button>
                    </td>
                </form>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($galleries)){ $no = 1 + $number;
                foreach ($galleries as $gallery): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= (strlen($gallery->name) > 50) ? substr($gallery->name, 0, 50).'...' :  $gallery->name ?></td>
                        <td><?= (strlen($gallery->description) > 200) ? substr($gallery->description, 0, 200).'...' :  $gallery->description?></td>
                        <td class="text-nowrap">
                            <a href="<?= site_url('photos/show/') ?>" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                            <a href="<?= site_url('photos/edit/') ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('photos/destroy/') ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; } else { echo '<td colspan="4">Tidak ditemukan Galeri Foto<td>'; } ?>
            </tbody>
        </table>
        <?php $this->load->view('template/dashboard/pagination'); ?>
    </div>
</div>