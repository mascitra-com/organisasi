<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Galeri Video</h3>
        <a class="btn btn-default pull-right" href="<?= site_url('videos/create') ?>"><i
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
                        <?php if (!strpos($video->link, '.')) { ?>
                            <iframe width="480" height="315" style="margin-left: 5pt;margin-top: 5pt"
                                    src="https://www.youtube.com/embed/<?= $video->link ?>?controls=1">
                            </iframe>
                        <?php } else { ?>
                            <video src="<?= $video->link ?>" controls width="480" height="315"
                                   style="margin-left: 5pt;margin-top: 5pt">
                                Sorry, your browser doesn't support embedded videos,
                                but don't worry, you can <a href="<?= $video->link ?>">Download It</a>
                                and watch it with your favorite video player!
                            </video>
                        <?php } ?>
                        <div class="caption">
                            <h3 class="title"><?= $video->name ?> </h3>
                            <p><?= (strlen($video->description) > 100) ? substr($video->description, 0, 100).'...' :  $video->description?></p>
                            <hr>
                                <button class="btn btn-info" onclick="detail(<?=$video->id?>)"><i class="fa fa-info-circle"></i> Detail</button>
                            <a href="<?= site_url('videos/destroy/' . $video->id) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash" ></i> Hapus</a>
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
<div id="detailModal" class="modal fade" role='dialog' data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="name"></h3>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function detail(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=site_url('videos/show?id=')?>" + id,
            success: function (data) {
                console.log(data);
                $("#name").text(data.name);
                $("#desc").text(data.description);
            }
        });
        $("#detailModal").modal();
    }
</script>