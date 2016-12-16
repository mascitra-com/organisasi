<a href="<?= site_url('gallery/photos/create') ?>" class="btn btn-default">Tambah Foto</a>
<?php if (is_array($photos)) { $i=4; $j=7; $k = count($photos); ?>
    <?php foreach ($photos as $photo): ?>
        <?php if($i % 4 == 0) { echo '<div class="row section">';} ?>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="thumbnail">
                <img src="<?= $photo->link ?>" alt="Foto" class="news-thumbnail">
                <div class="caption">
                    <h3 class="title"><?= $photo->name ?> </h3>
                    <p><?= substr($photo->description, 0, 30) ?>...</p>
                    <p>
                        <a href="#" class="btn btn-default">Detail</a>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="<?=site_url('gallery/destroy/photo/'.$photo->id)?>" class="btn btn-danger">Hapus</a>
                    </p>
                </div>
            </div>
        </div>
        <?php if($i == $j || $i == ($k + 3)) { echo '</div>'; $j += 4;} ?>
    <?php $i++; endforeach;?>
<?php } else { ?>
    <?= $photos ?>
<?php } ?>