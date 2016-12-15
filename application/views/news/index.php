<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Daftar Berita Aktif</h3>
                <a href="<?=site_url('news/create')?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Berita Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php for($i=0;$i<3;$i++): ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?=base_url('assets/img/default.png')?>" alt="thumbnail" width="100%">
                        </div>
                        <div class="col-md-8">
                            <h3>Judul Berita</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestias debitis labore 
                                similique voluptatibus quibusdam nostrum, aspernatur necessitatibus sapiente numquam. Adipisci sunt, dolor laudantium perferendis.
                                <br><a href="<?=site_url('news/show')?>">selengkapnya...</a>
                            </p>
                            <span class="label label-default">18-12-2016</span>
                            <span class="label label-default">admin abc</span>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-xs btn-primary">aktif</a>
                            <a href="#" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
