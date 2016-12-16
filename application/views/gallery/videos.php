<a href="<?= site_url('gallery/videos/create') ?>">Tambah Video</a><br/>
<?php if (is_array($videos)) {
    foreach ($videos as $video): ?>
        <?= dump($video) ?> <br/>
    <?php endforeach;
} else {
    echo $videos;
} ?>
