<div class="container">
	<div class="row">
		<div class="col-md-12">
			<img src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="judul berita" class="img-fit" width="100%" height="330px">
			<h1 class="news-title"><?=$article->name?></h1>
			<span class="news-date"><i class="fa fa-calendar"></i> <?= mdate('%d %M %Y', strtotime(str_replace('-', '/', $article->published_at))) ?></span>
			<span class="news-author"><i class="fa fa-user"></i> <?=$article->user->first_name.' '.$article->user->last_name?></span>
			<div class="news-content">
				<p><?=$article->body?></p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h1>Berita Terpopuler</h1>
	</div>
	<div class="row" id='popular'>
		<?php if(!empty($popular_articles)){ foreach($popular_articles as $article):?>
			<div class="col-sm-6 col-md-3">
				<a href="<?=site_url('homepage/news_article/'.$article->slug)?>">
					<div class="thumbnail">
						<img class="img-fit" src="<?=base_url('assets/img/news_img/'.check_image($article->img_link,'./assets/img/news_img/','default-2.png'))?>" alt="thumbnail" width="100%" height="100px">
						<div class="caption">
							<h4><?=$article->name?></h4>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; } else{ echo "Tidak ada berita"; }?>
	</div>
	<!-- BANNER FULL -->
	<div class="row section" id="banner-full">
		<div class="col-md-12">
			<img src="<?=$banners[0]?>" alt="banner">
		</div>
	</div>
</div>