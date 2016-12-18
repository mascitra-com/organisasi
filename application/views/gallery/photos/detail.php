<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body" style="padding: 25px;">
                <h1 class="title"><?= $galleries->name ?></h1>
                <span class="label label-default"><i class="fa fa-calendar"></i> 12 Desember 2016</span>
                <span class="label label-default"><i class="fa fa-user"></i> Oleh Admin</span><br/>
                <div style="margin: 1em 0em">
                    <a class="btn btn-success" href="<?= site_url('gallery/photos/add/' . $galleries->id) ?>"><i
                                class="fa fa-plus-square fa-fw"></i> Tambah Foto</a>
                    <div style="margin-top: 1em">
                        <?php if (isset($photos) && !empty($photos)) {
                            $i = 4;
                            $j = 7;
                            $k = count($photos); ?>
                            <?php foreach ($photos as $photo): ?>
                                <?php if ($i % 4 == 0) {
                                    echo '<div class="row section">';
                                } ?>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <button class="thumbnail" onclick="detail(<?= $photo->id ?>)">
                                        <img src="<?= $photo->link ?>" alt="Foto" class="img-responsive">
                                    </button>
                                </div>
                                <?php if ($i == $j || $i == ($k + 3)) {
                                    echo '</div>';
                                    $j += 4;
                                } ?>
                                <?php $i++; endforeach; ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <a href="<?= site_url('gallery/photos') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
        </div>
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
                <img src="" class="img-responsive" id="image">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function detail(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=site_url('gallery/photos/show_image?id=')?>" + id,
            success: function (data) {
                console.log(data);
                $("#image").attr('src'.data.link);
                $("#detailModal").modal();
            }
        });
    }
</script>