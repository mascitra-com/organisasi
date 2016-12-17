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
                        <img src="<?= $photo->link ?>" alt="Foto" class="img-responsive">
                        <div class="caption">
                            <h3 class="title"><?= $photo->name ?> </h3>
                            <p><?= (!empty($photo->description)) ? substr($photo->description, 0, 30) : 'Tidak ada Deskripsi' ?></p>
                            <p>
                                <button class="btn btn-default" onclick="detail(<?= $photo->id ?>)"><i
                                            class="fa fa-info-circle"></i>
                                </button>
                                <a href="<?=site_url('gallery/edit/photo/'.$photo->id)?>" class="btn btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="<?= site_url('gallery/destroy/photo/' . $photo->id) ?>" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></a>
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
<div id="detailModal" class="modal fade" role='dialog' data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="name"></h3>
            </div>
            <div style="margin: 1em">
                <img src="" id="image" class="img-responsive"><br/>
                <p id="desc"></p>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function detail(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=site_url('gallery/show?id=')?>" + id,
            success: function (data) {
                console.log(data);
                $("#name").html(data.name);
                $('#image').attr('src', data.link);
                $("#desc").html(data.description);
                $("#detailModal").modal();
            }
        });
    }
</script>