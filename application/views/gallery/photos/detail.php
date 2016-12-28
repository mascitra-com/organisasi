<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body" style="padding: 25px;">
                <h1 class="title"><?= $galleries->name ?></h1>
                <p><?= $galleries->description ?></p>
                <span class="label label-default"><i
                            class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $galleries->created_at))) ?></span>
                <span class="label label-default"><i class="fa fa-user"></i> Oleh Admin</span><br/>
                <form action="<?= site_url('photos/remove_multiple/'.$galleries->slug) ?>" method="POST">
                    <div style="margin: 1em 0em">
                        <div style="margin-top: 1em">
                            <?php if (is_array($photos)) { $photos_id = 1;?>
                            <div class="col-md-12">
                                <input type="checkbox" id="select_all" style="margin: 10px 10px"/> Pilih Semua
                            </div>
                                <?php foreach ($photos as $photo): ?>
                                    <?php if ($i % 4 == 0) {
                                        echo '<div class="row section">';
                                    } ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="thumb">
                                            <input id="link-<?= $photos_id ?>" value="<?= $photo->link ?>" hidden/>
                                            <a class="thumbnail" href="#"
                                               onclick="detail('photo-<?= $photos_id ?>')">
                                                <img src="<?= $photo->link ?>" alt="Foto" class="img-responsive"
                                                     height="158" id="photo-<?=$photos_id++?>"/>
                                            </a>
                                            <input type="checkbox" class="checkbox" name="check_list[]"
                                                   value="<?= $photo->name ?>"/>
                                        </div>
                                    </div>
                                    <?php if ($i == $j || $i == ($k + 3)) {
                                        echo '</div>';
                                        $j += 4;
                                    } ?>
                                    <?php $i++; endforeach; ?>
                            <?php } else {
                                echo "<h3 class='text-center'>$photos</h3>";
                            } ?>
                        </div>
                    </div>
                    <?php $this->load->view('template/dashboard/pagination'); ?>
                    <div class="form-group" style="margin-top:1em;">
                        <a href="<?= site_url('photos') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                            Kembali</a>
                        <?php if (is_array($photos)) : ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                            <small>( Gunakan Checkbox di pojok kiri atas pada tiap foto )</small>
                        <?php endif; ?>
                        <a class="btn btn-success pull-right"
                           href="<?= site_url('photos/add/' . $galleries->slug) ?>"><i
                                    class="fa fa-plus-square fa-fw"></i> Tambah Foto</a>
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
                <div class="modal-body carousel slide" id="myCarousel" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="" class="photo_link" target="_blank" id="link"><img src="" alt="Foto" id="photo"
                                                                                         class="img-responsive center-block"></a>
                        </div>
                    </div>
                    <a class="left carousel-control" onclick="prev()" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" onclick="next()" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-info photo_link pull-left" download>Download</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
