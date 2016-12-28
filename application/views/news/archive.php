<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Arsip Berita<?=isset($search) ? '- Hasil Pencarian' : ''?></h3>
                <a href="<?=site_url('news/create')?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> Berita Baru</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <form action="<?=site_url('news/search_archive')?>" method="POST">
                                <td>
                                    <a href="<?=site_url('news/refresh_archive')?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                                </td>
                                <td width="85%" class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Judul Berita" value="<?= isset($search->name) ?$search->name : '' ?>">
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
                <?php if(is_array($articles)){ foreach ($articles as $article): ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img <?= (!empty($article->img_link)) ? "src='".base_url('assets/img/news_img/'.$article->img_link)."'" : "src='".base_url('assets/img/news_img/default/default-2.png')."'" ?> alt="thumbnail" width="100%">
                        </div>
                        <div class="col-md-8">
                            <h3><?=$article->name ?></h3>
                            <p><?=(strlen($article->body) > 254) ? substr($article->body, 0, 254).'...' :  $article->body?><br><a href="<?=site_url('news/show/'.$article->slug)?>">selengkapnya...</a></p>
                            <span class="label label-default"><?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
                            <span class="label label-default"><?=$article->first_name.' '.$article->last_name ?></span>
                        </div>
                        <div class="col-md-2">
                            <a href="<?=site_url('news/edit?slug='.$article->slug)?>" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="<?=site_url('news/destroy?id='.$article->id)?>" onclick="return confirm('Hapus berita?')" class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                <?php endforeach; } else { echo '<div class="col-md-12">Tidak ada berita</div>'; } ?>
                <?php $this->load->view('template/dashboard/pagination'); ?>
            </div>
        </div>
    </div>
</div>
