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
                <td width="20%">Nama Galeri</td>
                <td>Deskripsi Galeri</td>
                <td>Aksi</td>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($galleries)){ $no = 1 + $number;
                foreach ($galleries as $gallery): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= (strlen($gallery->name) > 50) ? substr($gallery->name, 0, 50).'...' :  $gallery->name?></td>
                        <td><?= (strlen($gallery->description) > 200) ? substr($gallery->description, 0, 200).'...' :  $gallery->description?></td>
                        <td class="text-nowrap">
                            <a href="<?= site_url('photos/show?id=' . $gallery->id) ?>" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                            <a href="<?= site_url('photos/edit?id=' . $gallery->id) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('photos/destroy?id=' . $gallery->id) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; } else { echo '<td colspan="4">Tidak ditemukan Galeri Foto<td>'; } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="text-center col-md-10">
                <?= $pagination ?>
            </div>
            <div class="col-md-2">
                <label>Galeri Per Halaman</label>
                <select name="page" id="page" class="form-control">
                    <option value="10" <?= ($per_page == 10) ? 'selected' : '' ?>>10</option>
                    <option value="25" <?= ($per_page == 25) ? 'selected' : '' ?>>25</option>
                    <option value="50" <?= ($per_page == 50) ? 'selected' : '' ?>>50</option>
                    <option value="100" <?= ($per_page == 100) ? 'selected' : '' ?>>100</option>
                    <option value="200" <?= ($per_page == 200) ? 'selected' : '' ?>>200</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    $('#page').change(function (e) {
        var total = $("#page").val();
        window.location = '<?=site_url('photos/index?per_page=')?>'+total;
    })
</script>