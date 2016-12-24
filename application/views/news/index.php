<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Daftar Berita <?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
                <a href="<?=site_url('news/create')?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> Berita Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <form action="<?=site_url('news/search')?>" method="POST">
                                <td>
                                    <a href="<?=site_url('news/refresh')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                                </td>
                                <td width="60%" class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Judul Berita" value="<?= isset($search->name) ?$search->name : '' ?>">
                                </td>
                                <td width="15%" class="form-group">
                                    <select class="form-control" name="type">
                                        <option value="all" <?= (isset($search->type) && $search->type === "all") ? 'selected' : ''?>>Semua</option>
                                        <option value="active" <?= (isset($search->type) && $search->type === "active") ? 'selected' : ''?>>Aktif</option>
                                        <option value="unactive" <?= (isset($search->type) && $search->type === "unactive") ? 'selected' : ''?>>Tidak Aktif</option>
                                    </select>
                                </td>
                                <td width="15%" class="form-group">
                                    <select class="form-control" name="published_at">
                                        <option value="newest" <?= (isset($search->published_at) && $search->published_at === "newest") ? 'selected' : ''?>>Terbaru</option>
                                        <option value="oldest" <?= (isset($search->published_at) && $search->published_at === "oldest") ? 'selected' : ''?>>Terlama</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                                </td>
                            </form>
                        </tr>
                    </thead>
                </table>
                <?php $no =0; if(is_array($articles)){ foreach ($articles as $article): $no++;?>
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?=$article->img_link?>" alt="thumbnail" width="100%">
                    </div>
                    <div class="col-md-8">
                        <h3><?=$article->name ?></h3>
                        <p><?=(strlen($article->body) > 254) ? substr($article->body, 0, 254).'...' :  $article->body?><br><a href="<?=site_url('news/show/'.$article->slug)?>">selengkapnya...</a></p>
                        <span class="label label-default"><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
                        <span class="label label-default"><?=$article->first_name.' '.$article->last_name ?></span>
                    </div>
                    <div class="col-md-2">
                        <button id="<?='news-trigger'.$no?>" class="btn btn-xs <?=($article->type == 'active') ? 'btn-primary': 'btn-danger'?>" onclick="update_type(<?=$article->id?>,<?=$no?>,<?="'".$article->name."'"?>)">
                            <?=($article->type == 'active') ? 'aktif': 'tidak aktif'?></button>
                            <a href="<?=site_url('news/edit?slug='.$article->slug)?>" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-default" href="<?=site_url('news/move_to_archive?slug='.$article->slug)?>" onclick="return confirm('Pindah berita ke arsip?')"><i class="fa fa-archive"></i></a>
                        </div>
                    </div>
                <?php endforeach; } else { echo '<div class="col-md-12">Tidak ada berita</div>'; } ?>
                <?php $this->load->view('template/dashboard/pagination'); ?>
            </div>
        </div>
    </div>
</div>
