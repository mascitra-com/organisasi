<div class="container">
	<div class="row">
		<div class="col-md-12">
			<img src="<?=$article->img_link?>" alt="judul berita" class="img-fit" width="100%" height="330px">
			<h1 class="news-title"><?=$article->name?></h1>
			<span class="news-date"><i class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
			<span class="news-author"><i class="fa fa-user"></i> <?=$article->user->first_name.' '.$article->user->last_name?></span>
			<div class="news-content">
				<p><?=(strlen($article->body) > 254) ? substr($article['body'], 0, 254).'...' :  $article->body?></p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h1>Berita terkait</h1>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" width="100%" height="100px">
				<div class="caption">
					<h4>Ini judul berita</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" width="100%" height="100px">
				<div class="caption">
					<h4>Ini judul berita</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" width="100%" height="100px">
				<div class="caption">
					<h4>Ini judul berita</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img class="img-fit" src="<?=base_url('assets/img/default-2.png')?>" alt="thumbnail" width="100%" height="100px">
				<div class="caption">
					<h4>Ini judul berita</h4>
				</div>
			</div>
		</div>
	</div>
</div>