<div class="container">
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" style="padding-left: 10px;">Berita</span>
			</div>
			<form class="navbar-form navbar-right" role="search" method="POST" action="<?=site_url('homepage/search/news')?>">
				<div class="form-group">
					<select name="filter" class="form-control">
						<option value="newest" <?= (isset($search->filter) && $search->filter === "newest") ? 'selected' : ''?>>Terbaru</option>
						<option value="oldest" <?= (isset($search->filter) && $search->filter === "oldest") ? 'selected' : ''?>>Terlama</option>
						<option value="popular" <?= (isset($search->filter) && $search->filter === "popular") ? 'selected' : ''?>>Terpopuler</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Cari judul berita" name="name" value="<?= isset($search->name) ?$search->name : '' ?>">
				</div>
				<button type="submit" class="btn btn-default">Cari</button>
			</form>
		</div>
	</div>

	<?php if(is_array($articles)){ foreach ($articles as $article): ?>
		<div class="row news-list">
			<div class="col-md-5">
				<img src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="judul berita" class="img-fit" width="100%" height="250px">
			</div>
			<div class="col-md-7">
				<h1 class="news-title"><?=$article->name?></h1>
				<span class="news-date"><i class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
				<span class="news-author"><i class="fa fa-user"></i> <?=$article->first_name.' '.$article->last_name?></span>
				<div class="news-content">
					<p><?=(strlen($article->body) > 254) ? substr($article->body, 0, 254).'...' :  $article->body?></p>
					<a href="<?=site_url('homepage/news_article/'.$article->slug)?>">selengkapnya <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	<?php endforeach; } else{ echo "Berita tidak ditemukan"; }?>
	<nav aria-label="...">
		<ul class="pager">
			<?=$pagination?>
		</ul>
	</nav>
</div>