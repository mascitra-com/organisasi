<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Daftar Berita Aktif</h3>
                <a href="<?=site_url('news/create')?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Berita Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <?php for($i=0;$i<3;$i++): ?>
                        <tr>
                            <td><img src="<?=base_url('assets/img/default.png')?>" alt="thumbnail" class="img-thumb"></td>
                            <td>
                                <h3>Judul Berita</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestias debitis labore similique voluptatibus quibusdam nostrum, aspernatur necessitatibus sapiente numquam. Adipisci sunt, dolor laudantium perferendis.</p>
                                <span class="label label-default">18-12-2016</span>
                                <span class="label label-default">admin abc</span>
                            </td>
                            <td class="text-nowrap vcenter">
                                <a href="#" class="btn btn-xs btn-primary">aktif</a>
                                <a href="#" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
