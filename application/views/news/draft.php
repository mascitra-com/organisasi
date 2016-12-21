<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Draft Berita</h3>
                <a href="<?=site_url('news/create')?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> Berita Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php if(!empty($articles)){ foreach ($articles as $article): ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?=$article->img_link?>" alt="thumbnail" width="100%">
                        </div>
                        <div class="col-md-8">
                            <h3><?=$article->name ?></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestias debitis labore 
                                similique voluptatibus quibusdam nostrum, aspernatur necessitatibus sapiente numquam. Adipisci sunt, dolor laudantium perferendis.
                                <br><a href="<?=site_url('news/show')?>">selengkapnya...</a>
                            </p>
                            <span class="label label-default"><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
                            <span class="label label-default"><?=$article->user->first_name.' '.$article->user->last_name ?></span>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-xs btn-primary">aktif</a>
                            <a href="#" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                <?php endforeach; } else { echo '<div class="col-md-12">Tidak ada berita</div>'; } ?>
            </div>
        </div>
    </div>
</div>
