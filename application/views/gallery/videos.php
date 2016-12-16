<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Video</h3>
        <a class="btn btn-default pull-right" href="<?= site_url('gallery/videos/create') ?>"><i
                    class="fa fa-plus-square fa-fw"></i> Tambah Video</a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <?php if (is_array($videos)) {
            $i = 2;
            $j = 3;
            $k = count($videos); ?>
            <?php foreach ($videos as $video): ?>
                <?php if ($i % 2 == 0) {
                    echo '<div class="row section">';
                } ?>
                <div class="col-xs-12 col-sm-6">
                    <div class="thumbnail">
                        <iframe width="480" height="315" style="margin-left: 5pt;margin-top: 5pt"
                                src="https://www.youtube.com/embed/<?= $video->link ?>?controls=1">
                        </iframe>
                        <div class="caption">
                            <h3 class="title"><?= $video->name ?> </h3>
                            <p><?= substr($video->description, 0, 30) ?>...</p>
                            <p>
                                <a href="#" class="btn btn-default">Detail</a>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="<?= site_url('gallery/destroy/video/' . $video->id) ?>" class="btn btn-danger">Hapus</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if ($i == $j || $i == ($k + 1)) {
                    echo '</div>';
                    $j += 2;
                } ?>
                <?php $i++; endforeach; ?>
        <?php } else { ?>
            <?= $videos ?>
        <?php } ?>
    </div>
</div>