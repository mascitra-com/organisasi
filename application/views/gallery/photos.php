<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Foto</h3>
        <a class="btn btn-default pull-right" href="<?= site_url('gallery/photos/create') ?>"><i
                    class="fa fa-plus-square fa-fw"></i> Tambah Foto</a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <?php if (is_array($photos)) {
            $i = 4;
            $j = 7;
            $k = count($photos); ?>
            <?php foreach ($photos as $photo): ?>
                <?php if ($i % 4 == 0) {
                    echo '<div class="row section">';
                } ?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="<?= $photo->link ?>" alt="Foto" class="news-thumbnail">
                        <div class="caption">
                            <h3 class="title"><?= $photo->name ?> </h3>
                            <p><?= substr($photo->description, 0, 30) ?>...</p>
                            <p>
                                <a href="#" class="btn btn-default">Detail</a>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="<?= site_url('gallery/destroy/photo/' . $photo->id) ?>" class="btn btn-danger">Hapus</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if ($i == $j || $i == ($k + 3)) {
                    echo '</div>';
                    $j += 4;
                } ?>
                <?php $i++; endforeach; ?>
        <?php } else { ?>
            <?= $photos ?>
        <?php } ?>
    </div>
</div>